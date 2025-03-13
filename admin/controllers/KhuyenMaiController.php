<?php

class KhuyenMaiController
{
    private $khuyenmaiModel;

    public function __construct()
    {
        $this->khuyenmaiModel = new KhuyenMai();
    }

    public function index()
    {
        // Kiểm tra nếu có từ khóa tìm kiếm
        $keyword = $_GET['keyword'] ?? null;

        // Nếu có từ khóa, thực hiện tìm kiếm
        if ($keyword) {
            $khuyenmais = $this->khuyenmaiModel->search($keyword);
        } else {
            // Nếu không, hiển thị tất cả tin tức
            $khuyenmais = $this->khuyenmaiModel->getAll();
        }
        require_once 'views/khuyenmais/index.php';
    }
    public function show($id)
    {
        // Fetch promotion by ID
        $khuyenmai = $this->khuyenmaiModel->getById($id);

        // Ensure data is returned before passing to view
        if ($khuyenmai) {
            require_once 'views/khuyenmais/show.php';
        } else {
            // Handle the case where no data was found (optional)
            echo "Khuyến mãi không tồn tại.";
        }
    }



    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten_khuyen_mai' => $_POST['ten_khuyen_mai'],
                'ma_khuyen_mai' => $_POST['ma_khuyen_mai'],
                'gia_tri' => $_POST['gia_tri'],
                'ngay_bat_dau' => $_POST['ngay_bat_dau'],
                'ngay_ket_thuc' => $_POST['ngay_ket_thuc'],
                'mo_ta' => $_POST['mo_ta'],
                'trang_thai' => $_POST['trang_thai']
            ];
            $_SESSION['old_data'] = $data;
            $errors = [];
            if (empty($_POST['ten_khuyen_mai'])) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi là băt buộc';
            }
            if (empty($_POST['ma_khuyen_mai'])) {
                $errors['ma_khuyen_mai'] = 'Mã khuyến mãi là bắt buộc là băt buộc';
            }
            if (empty($_POST['gia_tri'])) {
                $errors['gia_tri'] = 'Giá trị là bắt buộc.';
            } elseif (!is_numeric($_POST['gia_tri'])) {
                $errors['gia_tri'] = 'Giá trị chỉ được phép là số.';
            }
            if (empty($_POST['ngay_bat_dau'])) {
                $errors['ngay_bat_dau'] = 'Ngày bắt đầu là bắt buộc là băt buộc';
            }
            if (empty($_POST['ngay_ket_thuc'])) {
                $errors['ngay_ket_thuc'] = 'Ngày kết thúc là bắt buộc là băt buộc';
            }
            if (empty($_POST['mo_ta'])) {
                $errors['mo_ta'] = 'Mô tả là bắt buộc là băt buộc';
            }
            if (empty($_POST['trang_thai'])) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc là băt buộc';
            }

            //Thêm dữ liệu
            if (empty($errors)) {
                //Nếu không có lỗi thì thêm dữ liệu
                //Thêm vào CSDL
                $this->khuyenmaiModel->create($data);
                unset($_SESSION['errors'], $_SESSION['old_data']); 
                header('Location: ?act=khuyenmais');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=khuyenmais/create');
                exit();
            }
        } else {
            require_once 'views/khuyenmais/create.php';
            unset($_SESSION['errors'], $_SESSION['old_data']); 
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten_khuyen_mai' => $_POST['ten_khuyen_mai'],
                'ma_khuyen_mai' => $_POST['ma_khuyen_mai'],
                'gia_tri' => $_POST['gia_tri'],
                'ngay_bat_dau' => $_POST['ngay_bat_dau'],
                'ngay_ket_thuc' => $_POST['ngay_ket_thuc'],
                'mo_ta' => $_POST['mo_ta'],
                'trang_thai' => $_POST['trang_thai']
            ];

            $errors = [];
            if (empty($_POST['ten_khuyen_mai'])) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi là băt buộc';
            }
            if (empty($_POST['ma_khuyen_mai'])) {
                $errors['ma_khuyen_mai'] = 'Mã khuyến mãi là bắt buộc là băt buộc';
            }
            if (empty($_POST['gia_tri'])) {
                $errors['gia_tri'] = 'Giá trị là bắt buộc là băt buộc';
            }
            if (empty($_POST['ngay_bat_dau'])) {
                $errors['ngay_bat_dau'] = 'Ngày bắt đầu là bắt buộc là băt buộc';
            }
            if (empty($_POST['ngay_ket_thuc'])) {
                $errors['ngay_ket_thuc'] = 'Ngày kết thúc là bắt buộc là băt buộc';
            }
            if (empty($_POST['mo_ta'])) {
                $errors['mo_ta'] = 'Mô tả là bắt buộc là băt buộc';
            }
            if (empty($_POST['trang_thai'])) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc là băt buộc';
            }

            //Thêm dữ liệu
            if (empty($errors)) {
                //Nếu không có lỗi thì thêm dữ liệu
                //Thêm vào CSDL
                $this->khuyenmaiModel->update($id, $data);
                unset($_SESSION['errors']);
                header('Location: ?act=khuyenmais');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=khuyenmais/edit&id='.$id);
                exit();
            }

        } else {
            $khuyenmai = $this->khuyenmaiModel->getById($id);
            require_once 'views/khuyenmais/edit.php';
            unset($_SESSION['errors']);
        }
    }


    public function delete($id)
    {
        $this->khuyenmaiModel->delete($id);
        header('Location: ?act=khuyenmais');
    }
}
