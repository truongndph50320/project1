<?php

class UsersController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new Users();
    }

    public function show($id)
    {
        $user = $this->userModel->getUserById($id);

        if ($user) {
            require_once 'views/profile.php';
        } else {
            $_SESSION['error'] = 'Không tìm thấy người dùng';
            header('Location: ?act=/');
            exit();
        }
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ten_nguoi_dung' => $_POST['ten_nguoi_dung'],
                'ho_va_ten' => $_POST['ho_va_ten'],
                'email' => $_POST['email'],
                'sdt' => $_POST['sdt'],
                'sdt' => $_POST['sdt'],
                'time' => time(),
                'mat_khau' => md5($_POST['mat_khau']),
                'gioi_tinh' => $_POST['gioi_tinh'],
            ];

            $_SESSION['old_data'] = $_POST;
            $errors = $this->validateRegistration($data);    

            if (empty($errors)) {
                $this->userModel->register($data);

                $_SESSION['message'] = 'Đăng ký thành công! Vui lòng đăng nhập.';
                // echo $_SESSION['message'];
                die();
                // unset($_SESSION['errors'], $_SESSION['old_data']);
                // header('Location: ?act=login');
                // exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=register');
                // exit();
            }
        } else {
            require_once 'views/register.php';
            unset($_SESSION['errors'], $_SESSION['old_data']);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['old_data'] = $_POST;
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $mat_khau = md5($_POST['mat_khau']);

            $errors = $this->validateLogin($ten_nguoi_dung, $mat_khau);

            if (empty($errors)) {
                $user = $this->userModel->login($ten_nguoi_dung, $mat_khau);

                if ($user) {
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['nguoi_dungs'] = $user;
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['ho_va_ten'] = $user['ho_va_ten'];
                    $_SESSION['avatar'] = $user['avatar'];
                    $_SESSION['mat_khau'] = $user['mat_khau'];
                    unset($_SESSION['errors'], $_SESSION['old_data']);
                    header('Location: ?act=/');
                } else {
                    $errors['login'] = 'Tên người dùng hoặc mật khẩu không chính xác';
                    $_SESSION['errors'] = $errors;
                    header('Location: ?act=login');
                    exit();
                }
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=login');
                exit();
            }
        } else {
            require_once './views/login.php';
            unset($_SESSION['errors'], $_SESSION['old_data']);
        }
    }


    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý upload ảnh
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                // Chỉ định thư mục lưu ảnh
                $uploadDir = 'admin/uploads/avatars/';
                $fileName = basename($_FILES['avatar']['name']);
                $uploadFile = $uploadDir . $fileName;

                // Di chuyển file tải lên vào thư mục đích
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                    $avatarPath = $uploadFile;
                } else {
                    $avatarPath = null; // Xử lý khi upload thất bại
                }
            } else {
                // Giữ nguyên avatar cũ nếu không có file mới
                $avatarPath = $_POST['current_avatar']; // Lấy đường dẫn ảnh cũ từ form
            }

            // Chuẩn bị dữ liệu để lưu vào database
            $data = [
                'ten_nguoi_dung' => $_POST['ten_nguoi_dung'],
                'ho_va_ten' => $_POST['ho_va_ten'],
                'email' => $_POST['email'],
                'sdt' => $_POST['sdt'],
                'dia_chi' => $_POST['dia_chi'],
                'mat_khau' => md5($_POST['mat_khau']),
                'ngay_sinh' => $_POST['ngay_sinh'],
                'gioi_tinh' => $_POST['gioi_tinh'],
                'avatar' => $avatarPath // Lưu đường dẫn ảnh mới hoặc giữ ảnh cũ

            ];


            $errors = [];
            // if (empty($_POST['ten_nguoi_dung'])) {
            //     $errors['ten_nguoi_dung'] = 'Tên người dùng là băt buộc';
            // }
            // if (empty($_POST['ho_va_ten'])) {
            //     $errors['ho_va_ten'] = 'Họ tên là bắt buộc ';
            // }
            if (empty($_POST['email'])) {
                $errors['email'] = 'Email là bắt buộc';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($_POST['sdt'])) {
                $errors['sdt'] = 'Số điện thoại là bắt buộc.';
            } elseif (!preg_match('/^(03|05|07|08|09)[0-9]{8}$/', $_POST['sdt'])) {
                $errors['sdt'] = 'Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại Việt Nam hợp lệ gồm 10 số, bắt đầu bằng 03, 05, 07, 08 hoặc 09.';
            }
            if (empty($_POST['dia_chi'])) {
                $errors['dia_chi'] = 'Địa chỉ mãi là bắt buộc ';
            }
            // if (empty($_POST['mat_khau'])) {
            //     $errors['mat_khau'] = 'Mật khẩu là bắt buộc ';
            // }
            if (empty($_POST['ngay_sinh'])) {
                $errors['ngay_sinh'] = 'Ngày sinh là bắt buộc ';
            }
            if (empty($_POST['gioi_tinh'])) {
                $errors['gioi_tinh'] = 'Giới tính là bắt buộc ';
            }
            // if (empty($_POST['vai_tro'])) {
            //     $errors['vai_tro'] = 'Vai trò là bắt buộc ';
            // }
            // if (empty($_FILES['hinh_anh'])) {
            //     $errors['hinh_anh'] = 'Hình ảnh là bắt buộc ';
            // }
            // if (empty($_POST['trang_thai'])) {
            //     $errors['trang_thai'] = 'Trạng thái là bắt buộc ';
            // }

            //Thêm dữ liệu
            if (empty($errors)) {
                //Nếu không có lỗi thì thêm dữ liệu
                //Thêm vào CSDL
                $this->userModel->update($id, $data);
                unset($_SESSION['errors']);
                header('Location: ?act=show&id=' . $id);
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=update_profile&id=' . $id);
                exit();
            }


            // Cập nhật thông tin người dùng


        } else {
            // Lấy dữ liệu người dùng để hiển thị lên form chỉnh sửa
            $user = $this->userModel->show($id);
            require_once 'views/update_profile.php';
            unset($_SESSION['errors']);
        }
    }

    public function editpass($id)
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = md5($_POST['current_password']);
            $newPassword = md5($_POST['new_password']);
            $confirmPassword = md5($_POST['confirm_password']);
            $id = $_SESSION['id'];
            $user = $this->userModel->getUserById($id);
            
            $_SESSION['form_data'] = $_POST;
            // var_dump($currentPassword).die; 
            // var_dump($user['mat_khau']).die;    
            $errors = [];
            if (empty($currentPassword)) {
                $errors['current_password'] = 'Mật khẩu cũ là bắt buộc.';
            } elseif ($currentPassword !== $user['mat_khau']) {
                $errors['current_password'] = 'Mật khẩu cũ không chính xác.';
            }
            if (empty($newPassword)) {
                $errors['new_password'] = 'Mật khẩu mới là bắt buộc.';
            }
             elseif (strlen($_POST['new_password']) < 8) {
                $errors['new_password'] = 'Mật khẩu mới phải có ít nhất 8 ký tự.';
            }

            if (empty($confirmPassword)) {
                $errors['confirm_password'] = 'Xác nhận mật khẩu là bắt buộc.';
            } elseif ($confirmPassword !== $newPassword) {
                $errors['confirm_password'] = 'Xác nhận mật khẩu không khớp với mật khẩu mới.';
            }


            //Thêm dữ liệu
            if (empty($errors)) {
                //Nếu không có lỗi thì thêm dữ liệu
                //Thêm vào CSDL
               
                $this->userModel->updatepass($id,  $newPassword);
                $_SESSION['success'] = 'Đổi mật khẩu thành công!'; 
                header('Location: ?act=show&id=' . $id);
                unset($_SESSION['errors'], $_SESSION['form_data']);
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                
                header('Location: ?act=update_pass&id=' . $id);
               
                exit();
            }
        } else {
            // Lấy dữ liệu người dùng để hiển thị lên form chỉnh sửa
            $user = $this->userModel->show($id);
            // unset($_SESSION['errors']['form_data']);
            require_once 'views/layout/update_pass.php';
        }
    }

    //     public function editpass($id)
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $data = [
    //             'current_password' => $_POST['current_password'],
    //             'new_password' => $_POST['new_password'],
    //             'confirm_password' => $_POST['confirm_password'],
    //         ];

    //         $errors = [];

    //         // Lấy thông tin người dùng từ cơ sở dữ liệu
    //         $user = $this->userModel->show($id);

    //         // Kiểm tra mật khẩu cũ
    //         if (empty($data['current_password'])) {
    //             $errors['current_password'] = 'Mật khẩu cũ là bắt buộc.';
    //         } elseif (!password_verify($data['current_password'], $user['mat_khau'])) {
    //             $errors['current_password'] = 'Mật khẩu cũ không chính xác.';
    //         }

    //         // Kiểm tra mật khẩu mới
    //         if (empty($data['new_password'])) {
    //             $errors['new_password'] = 'Mật khẩu mới là bắt buộc.';
    //         } elseif (strlen($data['new_password']) < 8) {
    //             $errors['new_password'] = 'Mật khẩu mới phải có ít nhất 8 ký tự.';
    //         }

    //         // Kiểm tra xác nhận mật khẩu
    //         if (empty($data['confirm_password'])) {
    //             $errors['confirm_password'] = 'Xác nhận mật khẩu là bắt buộc.';
    //         } elseif ($data['confirm_password'] !== $data['new_password']) {
    //             $errors['confirm_password'] = 'Xác nhận mật khẩu không khớp với mật khẩu mới.';
    //         }

    //         // Nếu không có lỗi, cập nhật mật khẩu
    //         if (empty($errors)) {
    //             // Mã hóa mật khẩu mới
    //             $hashed_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

    //             // Cập nhật mật khẩu trong cơ sở dữ liệu
    //             $this->userModel->updatepass($id, $hashed_password);

    //             unset($_SESSION['errors']);
    //             header('Location: ?act=/');
    //             exit();
    //         } else {
    //             // Lưu lỗi vào session và chuyển hướng về trang sửa mật khẩu
    //             $_SESSION['errors'] = $errors;
    //             header('Location: ?act=update_pass&id=' . $id);
    //             exit();
    //         }
    //     } else {
    //         // Hiển thị form sửa mật khẩu
    //         $user = $this->userModel->show($id);
    //         // var_dump($user).die;
    //         require_once 'views/layout/update_pass.php';
    //         unset($_SESSION['errors']);
    //     }
    // }

    public function logout()
    {
        session_start();
        session_destroy();
        session_start();
        header('Location: ?act=/');
        exit();
    }

    private function validateRegistration($data)
    {
        $errors = [];
        if (empty($data['ten_nguoi_dung'])) {
            $errors['ten_nguoi_dung'] = 'Tên người dùng là bắt buộc';
        } elseif ($this->userModel->isUserExist($data['ten_nguoi_dung'])) {
            $errors['ten_nguoi_dung'] = 'Tên người dùng đã được sử dụng';
        }

        if (empty($data['ho_va_ten'])) {
            $errors['ho_va_ten'] = 'Họ tên là bắt buộc';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Email là bắt buộc';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email không hợp lệ';
        } elseif ($this->userModel->isEmailExist($data['email'])) {
            $errors['email'] = 'Email đã được sử dụng';
        }

        if (empty($data['sdt'])) {
            $errors['sdt'] = 'Số điện thoại là bắt buộc';
        } elseif (!preg_match('/^(03|05|07|08|09)[0-9]{8}$/', $data['sdt'])) {
            $errors['sdt'] = 'Số điện thoại không hợp lệ. Vui lòng nhập đúng số  (10 chữ số).';
        } elseif ($this->userModel->isPhoneExist($data['sdt'])) {
            $errors['sdt'] = 'Số điện thoại đã được sử dụng';
        }
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['avatar']['tmp_name'];
            $fileName = $_FILES['avatar']['name'];
            $fileSize = $_FILES['avatar']['size'];
            $fileType = $_FILES['avatar']['type'];

            // Kiểm tra loại tệp ảnh (chỉ cho phép ảnh jpg, jpeg, png)
            $allowedTypes = ['image/jpeg', 'image/png'];
            if (!in_array($fileType, $allowedTypes)) {
                $errors['avatar'] = 'Chỉ cho phép tải lên ảnh JPG, JPEG, PNG';
            }

            // Kiểm tra kích thước tệp (giới hạn 2MB)
            if ($fileSize > 2 * 1024 * 1024) {
                $errors['avatar'] = 'Ảnh không được quá 2MB';
            }

            // Nếu không có lỗi, di chuyển ảnh tới thư mục uploads
            if (empty($errors['avatar'])) {
                $uploadDir = './uploads/avatars/';
                $newFileName = time() . '_' . $fileName; // Tạo tên mới cho file để tránh trùng lặp
                $destPath = $uploadDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    // Lưu tên ảnh vào cơ sở dữ liệu (có thể lưu đường dẫn tương đối)
                    $data['avatar'] = $newFileName;
                } else {
                    $errors['avatar'] = 'Lỗi khi tải lên ảnh. Vui lòng thử lại';
                }
            }
        }

        // Kiểm tra và xử lý các lỗi khác (nếu có) và lưu thông tin người dùng vào cơ sở dữ liệu
        if (empty($errors)) {
            // Thực hiện logic lưu thông tin người dùng vào cơ sở dữ liệu
        } else {
            // Lưu lỗi vào session để hiển thị lại trên form
            $_SESSION['errors'] = $errors;
            $_SESSION['old_data'] = $data;
        }

        return $errors;
    }

    private function validateLogin($ten_nguoi_dung, $mat_khau)
    {
        $errors = [];
        if (empty($ten_nguoi_dung)) {
            $errors['ten_nguoi_dung'] = 'Tên người dùng là bắt buộc';
        }
        if (empty($mat_khau)) {
            $errors['mat_khau'] = 'Mật khẩu là bắt buộc';
        }
        return $errors;
    }


    private function validateUpdate($data)
    {
        $errors = [];

        if (empty($data['ten_nguoi_dung'])) {
            $errors['ten_nguoi_dung'] = 'Tên người dùng là bắt buộc';
        }
        if (empty($data['ho_va_ten'])) {
            $errors['ho_va_ten'] = 'Họ tên là bắt buộc';
        }

        if (empty($data['sdt'])) {
            $errors['sdt'] = 'Số điện thoại là bắt buộc';
        } elseif (!preg_match('/^(03|05|07|08|09)[0-9]{8}$/', $data['sdt'])) {
            $errors['sdt'] = 'Số điện thoại không hợp lệ. Vui lòng nhập đúng số  (10 chữ số).';
        }
        if (empty($data['dia_chi'])) {
            $errors['dia_chi'] = 'Địa chỉ là bắt buộc';
        }
        if (empty($data['ngay_sinh'])) {
            $errors['ngay_sinh'] = 'Ngày sinh là bắt buộc';
        }
        if (empty($data['gioi_tinh'])) {
            $errors['gioi_tinh'] = 'Giới tính là bắt buộc';
        }
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['avatar']['tmp_name'];
            $fileName = $_FILES['avatar']['name'];
            $fileSize = $_FILES['avatar']['size'];
            $fileType = $_FILES['avatar']['type'];

            // Kiểm tra loại tệp ảnh (chỉ cho phép ảnh jpg, jpeg, png)
            $allowedTypes = ['image/jpeg', 'image/png'];
            if (!in_array($fileType, $allowedTypes)) {
                $errors['avatar'] = 'Chỉ cho phép tải lên ảnh JPG, JPEG, PNG';
            }

            // Kiểm tra kích thước tệp (giới hạn 2MB)
            if ($fileSize > 2 * 1024 * 1024) {
                $errors['avatar'] = 'Ảnh không được quá 2MB';
            }

            // Nếu không có lỗi, di chuyển ảnh tới thư mục uploads
            if (empty($errors['avatar'])) {
                $uploadDir = './uploads/avatars/';
                $newFileName = time() . '_' . $fileName; // Tạo tên mới cho file để tránh trùng lặp
                $destPath = $uploadDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    // Lưu tên ảnh vào cơ sở dữ liệu (có thể lưu đường dẫn tương đối)
                    $data['avatar'] = $newFileName;
                } else {
                    $errors['avatar'] = 'Lỗi khi tải lên ảnh. Vui lòng thử lại';
                }
            }
        }

        // Kiểm tra và xử lý các lỗi khác (nếu có) và lưu thông tin người dùng vào cơ sở dữ liệu
        if (empty($errors)) {
            // Thực hiện logic lưu thông tin người dùng vào cơ sở dữ liệu
        } else {
            // Lưu lỗi vào session để hiển thị lại trên form
            $_SESSION['errors'] = $errors;
            $_SESSION['old_data'] = $data;
        }
        return $errors;
    }


    private function handleAvatarUpload($file, $currentAvatar)
    {
        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'admin/uploads/avatars/'; // Đảm bảo thư mục này tồn tại trên server
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('avatar_') . '.' . $fileExtension; // Thêm ID duy nhất vào tên file
            $uploadFile = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                return 'uploads/avatars/' . $fileName; // Trả về đường dẫn ảnh mới
            }
        }
        return $currentAvatar; // Nếu không có ảnh mới, giữ ảnh cũ
    }
}
