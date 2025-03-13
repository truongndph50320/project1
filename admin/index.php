<?php
// Bắt đầu session để sử dụng $_SESSION
session_start();

if (!isset($_SESSION['admin'])  && ($_GET['act'] ?? '') !== 'login') {
    header('Location: ?act=login');
    exit();
}
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
require_once 'controllers/UserController.php';
require_once 'controllers/BinhLuanController.php';
require_once 'controllers/BienTheController.php';  // Controller cho sản phẩm
require_once 'controllers/ProductController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/DonHangController.php'; // Controller cho Dashboard
require_once 'controllers/TrangThaiController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/KhuyenMaiController.php';

// Require Models
require_once 'models/User.php';
require_once 'models/BinhLuan.php';
require_once 'models/BienThe.php';  // Model cho sản phẩm
require_once 'models/productModel.php';
require_once 'models/DanhMuc.php';
require_once 'models/Auth.php';
require_once 'models/DonHang.php';
require_once 'models/TrangThai.php';
require_once 'models/TinTuc.php';
require_once 'models/LienHe.php';
require_once 'models/KhuyenMai.php';



// Route
$act = $_GET['act'] ?? '/';

match ($act) {
    // Dashboards
    '/' => (new DashboardController())->index(),

    // Quản lý đăng nhập admin
    'login' => (new AuthController())->login(),
    'logout' => (new AuthController())->logout(),
    'dashboard' => (new DashboardController())->index(),

    // Quản lý sản phẩm
    'products'          => (new ProductController())->index(),
    'products/show'     => (new ProductController())->show($_GET['id'] ?? 0),
    'products/create'   => (new ProductController())->add(),
    'products/delete'   => (new ProductController())->delete($_GET['id'] ?? 0),
    'products/edit'     => (new ProductController())->edit($_GET['id'] ?? 0),

    // Quản lý người dùng
    'users'             => (new UserController())->index(),
    'users/create'      => (new UserController())->add(),
    'users/edit'        => (new UserController())->edit($_GET['id'] ?? 0),
    'users/delete'      => (new UserController())->delete($_GET['id'] ?? 0),
    'users/show'        => (new UserController())->show($_GET['id'] ?? 0),

    // Quản lý bình luận
    'binhluans'         => (new BinhLuanController())->index(),
    'binhluans/create'  => (new BinhLuanController())->add(),
    'binhluans/delete'  => (new BinhLuanController())->delete($_GET['id'] ?? 0),

    // Quản lý biến thể sản phẩm
    'bienthes'          => (new BienTheController())->index(),
    'bienthes/create'   => (new BienTheController())->add(),
    'bienthes/edit'     => (new BienTheController())->edit($_GET['id'] ?? 0),
    'bienthes/delete'   => (new BienTheController())->delete($_GET['id'] ?? 0),
    'bienthes/show'     => (new BienTheController())->show($_GET['id'] ?? 0),

    // Quản lý danh mục sản phẩm
    'danhmucs'          => (new DanhMucController())->index(),
    'danhmucs/create'   => (new DanhMucController())->create(),
    'danhmucs/edit'     => (new DanhMucController())->edit($_GET['id'] ?? 0),
    'danhmucs/delete'   => (new DanhMucController())->delete($_GET['id'] ?? 0),

    
  // // quản lý trạng thái
  'trangthais'             => (new TrangThaiController())->index(),
  'trangthais/edit'        => (new TrangThaiController())->edit($_GET['id'] ?? 0),
  'trangthais/delete'      => (new TrangThaiController())->delete($_GET['id'] ?? 0),

    // //Quản lý đơn hàng
    'don-hang'             => (new DonHangController())->danhSachDonHang(),
    'form-sua-don-hang'      => (new DonHangController())->formEditDonHang(),
    'sua-don-hang'        => (new DonHangController())->postEditDonHang(),
    // 'xoa-don-hang'      => (new DonHangController())->deleteDonHang(),
    'chi-tiet-don-hang'        => (new DonHangController())->detailDonHang(),

    // // quản lý danh mục tin tức
  'tintucs'             => (new TinTucController())->index(),
  'tintucs/create'      => (new TinTucController())->create(),
  'tintucs/edit'        => (new TinTucController())->edit($_GET['id'] ?? 0),
  'tintucs/delete'      => (new TinTucController())->delete($_GET['id'] ?? 0),

  // // quản lý danh mục lien he
  'lienhes'             => (new LienHeController())->index(),
  'lienhes/create'      => (new LienHeController())->create(),
  'lienhes/edit'        => (new LienHeController())->edit($_GET['id'] ?? 0),
  'lienhes/delete'      => (new LienHeController())->delete($_GET['id'] ?? 0),

  // //Quản lý khuyến mãi
  'khuyenmais'             => (new KhuyenMaiController())->index(),
  'khuyenmais/create'      => (new KhuyenMaiController())->create(),
  'khuyenmais/edit'        => (new KhuyenMaiController())->edit($_GET['id'] ?? 0),
  'khuyenmais/delete'      => (new KhuyenMaiController())->delete($_GET['id'] ?? 0),
  'khuyenmais/show'        => (new KhuyenMaiController())->show($_GET['id'] ?? 0),
};


// Kiểm tra và hiển thị thông báo SweetAlert từ $_SESSION['message']
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script>
        Swal.fire({
            title: '{$message['title']}',
            text: '{$message['text']}',
            icon: '{$message['icon']}'
        });
    </script>";
    unset($_SESSION['message']); // Xóa message sau khi hiển thị
}
