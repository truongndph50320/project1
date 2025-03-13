<?php

class LienHeController
{
    private $lienheModel;

    public function __construct()
    {
        $this->lienheModel = new LienHe();
    }

    public function index()
    {
        // Kiểm tra nếu có từ khóa tìm kiếm
        $keyword = $_GET['keyword'] ?? null;

        // Nếu có từ khóa, thực hiện tìm kiếm
        if ($keyword) {
            $lienhes = $this->lienheModel->search($keyword);
        } else {
            // Nếu không, hiển thị tất cả tin tức
            $lienhes = $this->lienheModel->getAll();
        }
        require_once 'views/lienhes/index.php';
    }

    // public function show($id)
    // {
    //     $lienhe = $this->lienheModel->getById($id);
    //     require_once 'views/lienhes/show.php';
    // }

    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'email' => $_POST['email'],
                'noi_dung' => $_POST['noi_dung'],
                // 'trang_thai' => $_POST['trang_thai'],
                'ten' => $_POST['ten'],
                'sdt' => $_POST['sdt']
            ];

            // Lưu dữ liệu đã nhập vào $_SESSION để giữ lại khi có lỗi
            $_SESSION['old_data'] = $data;

            $errors = [];

            // Kiểm tra và xử lý các lỗi
            if (empty($_POST['ten'])) {
                $errors['ten'] = 'Tên là bắt buộc';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($_POST['noi_dung'])) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc';
            }
            // if (empty($_POST['trang_thai'])) {
            //     $errors['sdt'] = 'Số điện thoại là bắt buộc';
            // }

            // Nếu không có lỗi, thêm dữ liệu vào cơ sở dữ liệu
            if (empty($errors)) {
                $this->lienheModel->create($data);
                unset($_SESSION['errors'], $_SESSION['old_data']); // Xóa dữ liệu sau khi thành công
                header('Location: ?act=/');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=lien_he/create');
                exit();
            }
        }
         else {
            require_once './views/lien_he.php';
            unset($_SESSION['errors'], $_SESSION['old_data']); // Xóa session lỗi và dữ liệu cũ
        }


        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $data = [
        //         'email' => $_POST['email'],
        //         'noi_dung' => $_POST['noi_dung'],
        //         'trang_thai' => $_POST['trang_thai']
        //     ];

        //     $errors = [];
        //     if (empty($_POST['email'])) {
        //         $errors['email'] = 'Email là bắt buộc';
        //     }
        //     if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        //         $errors['email'] = 'Email không hợp lệ';
        //     }            
        //     if (empty($_POST['noi_dung'])) {
        //         $errors['noi_dung'] = 'Nội dung là bắt buộc là băt buộc';
        //     }
        //     if (empty($_POST['trang_thai'])) {
        //         $errors['trang_thai'] = 'Trạng thái là bắt buộc là băt buộc';
        //     }

        //     //Thêm dữ liệu
        //     if (empty($errors)) {
        //         //Nếu không có lỗi thì thêm dữ liệu
        //         //Thêm vào CSDL
        //         $this->lienheModel->create($data);
        //         unset($_SESSION['errors']);
        //         header('Location: ?act=lienhes');
        //         exit();
        //     } else {
        //         $_SESSION['errors'] = $errors;
        //         header('Location: ?act=lienhes/create');
        //         exit();
        //     }   
        // } else {
        //     require_once 'views/lienhes/create.php';
        //     unset($_SESSION['errors']);
        // }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'email' => $_POST['email'],
                'noi_dung' => $_POST['noi_dung'],
                'trang_thai' => $_POST['trang_thai'],
                'ten' => $_POST['ten'],
                'sdt' => $_POST['sdt']
            ];

            $errors = [];
            if (empty($_POST['email'])) {
                $errors['email'] = 'Email là bắt buộc';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($_POST['noi_dung'])) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc là băt buộc';
            }
            if (empty($_POST['trang_thai'])) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc là băt buộc';
            }

            //Thêm dữ liệu
            if (empty($errors)) {
                //Nếu không có lỗi thì thêm dữ liệu
                //Thêm vào CSDL
                $this->lienheModel->update($id, $data);
                unset($_SESSION['errors']);
                header('Location: ?act=lienhes');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=lienhes/edit&id=' . $id);
                exit();
            }
        } else {
            $lienhe = $this->lienheModel->getById($id);
            require_once 'views/lienhes/edit.php';
            unset($_SESSION['errors']);
        }
    }

    public function delete($id)
    {
        $this->lienheModel->delete($id);
        header('Location: ?act=lienhes');
    }
}
