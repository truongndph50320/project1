<?php
class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        require_once 'views/users/index.php';
    }

    public function show($id)
    {
        $user = $this->userModel->getById($id);
        require_once 'views/users/show.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Xử lý upload ảnh đại diện
                $avatarPath = null;
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/avatars/';
                    $fileName = time() . '_' . basename($_FILES['avatar']['name']); // Tạo tên file unique
                    $uploadFile = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                        $avatarPath = $uploadFile;
                    }
                }

                // Chuẩn bị dữ liệu
                $data = [
                    'ten_nguoi_dung' => $_POST['ten_nguoi_dung'],
                    'ho_va_ten' => $_POST['ho_va_ten'],
                    'email' => $_POST['email'],
                    'sdt' => $_POST['sdt'],
                    'dia_chi' => $_POST['dia_chi'],
                    'mat_khau' => md5($_POST['mat_khau']),
                    'ngay_sinh' => $_POST['ngay_sinh'],
                    'gioi_tinh' => $_POST['gioi_tinh'],
                    'avatar' => $avatarPath,
                    'vai_tro' => $_POST['vai_tro'],
                    'trang_thai' => $_POST['trang_thai']
                ];

                // Thêm người dùng
                $this->userModel->add($data);

                // Thông báo thành công
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Người dùng đã được thêm thành công.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Thông báo lỗi
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Không thể thêm người dùng: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=users');
            exit();
        } else {
            require_once 'views/users/add.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Xử lý upload ảnh đại diện
                $avatarPath = $_POST['current_avatar']; // Giữ ảnh cũ nếu không upload mới
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/avatars/';
                    $fileName = time() . '_' . basename($_FILES['avatar']['name']); // Tạo tên file unique
                    $uploadFile = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                        // Xóa ảnh cũ nếu có
                        if (!empty($avatarPath) && file_exists($avatarPath)) {
                            unlink($avatarPath);
                        }
                        $avatarPath = $uploadFile;
                    }
                }

                // Chuẩn bị dữ liệu
                $data = [
                    'ten_nguoi_dung' => $_POST['ten_nguoi_dung'],
                    'ho_va_ten' => $_POST['ho_va_ten'],
                    'email' => $_POST['email'],
                    'sdt' => $_POST['sdt'],
                    'dia_chi' => $_POST['dia_chi'],
                    'mat_khau' => md5($_POST['mat_khau']),
                    'ngay_sinh' => $_POST['ngay_sinh'],
                    'gioi_tinh' => $_POST['gioi_tinh'],
                    'avatar' => $avatarPath,
                    'vai_tro' => $_POST['vai_tro'],
                    'trang_thai' => $_POST['trang_thai']
                ];

                // Cập nhật người dùng
                $this->userModel->update($id, $data);

                // Thông báo thành công
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Thông tin người dùng đã được cập nhật.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Thông báo lỗi
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Không thể cập nhật người dùng: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=users');
            exit();
        } else {
            $user = $this->userModel->getById($id);
            require_once 'views/users/edit.php';
        }
    }

    public function delete($id)
    {
        try {
            // Lấy thông tin người dùng để xóa avatar
            $user = $this->userModel->getById($id);
            if (!empty($user['avatar']) && file_exists($user['avatar'])) {
                unlink($user['avatar']); // Xóa ảnh đại diện
            }

            // Xóa người dùng
            $this->userModel->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Người dùng đã được xóa.',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa người dùng: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=users');
        exit();
    }
}
?>
