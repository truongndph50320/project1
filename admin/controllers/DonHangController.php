<?php
class DonHangController
{
    private $donhangModel;


    public function __construct()
    {

        $this->donhangModel = new DonHang();
    }


    public function danhSachDonHang()
    {
        // Kiểm tra nếu có từ khóa tìm kiếm
        $keyword = $_GET['keyword'] ?? null;

        // Nếu có từ khóa, thực hiện tìm kiếm
        if ($keyword) {
            $listDonHang = $this->donhangModel->search($keyword);
        } else {
            $listDonHang = $this->donhangModel->getAllDonHang();
        }
        require_once 'views/donhang/listDonHang.php';
    }
    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        $donHang = $this->donhangModel->getDetailDonHang($don_hang_id);

        $sanPhamDonHang = $this->donhangModel->getListSpDonHang($don_hang_id);

        $listTrangThaiDonHang = $this->donhangModel->getAllTrangThaiDonHang();
        require_once './views/donhang/detailDonHang.php';
    }



    public function formEditDonHang()
    {
        $id = $_GET['id_don_hang'];
        $donHang = $this->donhangModel->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->donhangModel->getAllTrangThaiDonHang();
        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            // deleteSessionError();
        } else {
            header("Location:?act=don-hang");
            exit();
        }
    }
    public function postEditDonHang()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Clear previous errors
            $_SESSION['errors'] = [];
            $id = $_GET['id_don_hang'];
            // $id = $_POST['id'] ?? '';

            // Trim and sanitize input fields
            // $ten_nguoi_nhan = trim($_POST['ten_nguoi_nhan'] ?? '');
            // $sdt_nguoi_nhan = trim($_POST['sdt_nguoi_nhan'] ?? '');
            // $email_nguoi_nhan = trim($_POST['email_nguoi_nhan'] ?? '');
            // $dia_chi_nguoi_nhan = trim($_POST['dia_chi_nguoi_nhan'] ?? '');
            // $ghi_chu = trim($_POST['ghi_chu'] ?? '');  // fixed extra space in key
            // $trang_thai_don_hang_id = $_POST['trang_thai_don_hang_id'] ?? '';

            $data = [
                'ten_nguoi_nhan' => trim($_POST['ten_nguoi_nhan'] ?? ''),
                'sdt_nguoi_nhan' => trim($_POST['sdt_nguoi_nhan'] ?? ''),
                'email_nguoi_nhan' => trim($_POST['email_nguoi_nhan'] ?? ''),
                'dia_chi_nguoi_nhan' => trim($_POST['dia_chi_nguoi_nhan'] ?? ''),
                'ghi_chu' => trim($_POST['ghi_chu'] ?? ''),
                'trang_thai_don_hang_id' => $_POST['trang_thai_don_hang_id'] ?? ''
            ];
            // Validation
            $errors = [];

            // if (empty($ten_nguoi_nhan)) {
            //     $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
            // }
            // if (empty($sdt_nguoi_nhan)) {
            //     $errors['sdt_nguoi_nhan'] = 'Số điện thoại không được để trống';
            // } elseif (!preg_match('/^[0-9]{10,11}$/', $sdt_nguoi_nhan)) {
            //     $errors['sdt_nguoi_nhan'] = 'Số điện thoại phải có 10-11 chữ số';
            // }
            // if (empty($email_nguoi_nhan)) {
            //     $errors['email_nguoi_nhan'] = 'Email người nhận không được để trống';
            // } elseif (!filter_var($email_nguoi_nhan, FILTER_VALIDATE_EMAIL)) {
            //     $errors['email_nguoi_nhan'] = 'Email không hợp lệ';
            // }
            // if (empty($dia_chi_nguoi_nhan)) {
            //     $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
            // }
            // if (empty($ghi_chu)) {
            //     $errors['ghi_chu'] = 'Ghi chú không được để trống';
            // }
            // if (empty($trang_thai_don_hang_id)) {
            //     $errors['trang_thai_don_hang_id'] = 'Trạng thái đơn hàng không được để trống';
            // }

            // // Check for errors
            // if (!empty($errors)) {
            //     $_SESSION['errors'] = $errors;
            //     header("Location: ?act=sua-don-hang&id_don_hang=" . $id);
            //     exit();
            // }

            // // Update order if no errors
            // $this->donhangModel->updateDonHang(
            //     $id,
            //     $data
            // );

            // // Redirect to orders page
            // header("Location: ?act=don-hang");
            // exit();


            if (empty($errors)) {
                //Nếu không có lỗi thì thêm dữ liệu
                //Thêm vào CSDL
                $this->donhangModel->updateDonHang(
                    $id,
                    $data
                );
                unset($_SESSION['errors']);
                header("Location: ?act=don-hang");
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-sua-don-hang&id_don_hang=" . $id);
                exit();
            }
        }
    }
}