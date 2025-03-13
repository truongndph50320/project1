<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/UsersController.php';
require_once './controllers/KhuyenMaiController.php';
require_once 'admin/controllers/LienHeController.php';
require_once './controllers/cartcontroller.php';
require_once './controllers/productController.php';
// require_once 'admin/controllers/ProductController.php';
require_once 'admin/controllers/DashboardController.php';
require_once 'admin/controllers/UserController.php';
require_once 'admin/controllers/DanhMucController.php';
require_once 'admin/controllers/TinTucController.php';
require_once 'admin/controllers/LienHeController.php';
require_once './controllers/KhuyenMaiController.php';
require_once 'admin/controllers/TrangThaiController.php';
require_once 'admin/controllers/DonHangController.php';
require_once 'admin/controllers/AuthController.php';



// Require toàn bộ file Models
require_once 'models/product.php';
require_once 'models/Users.php';
require_once 'models/TinTuc.php';
require_once 'models/KhuyenMai.php';
require_once 'models/cart.php';
require_once 'admin/models/LienHe.php';
require_once './models/Users.php';
require_once 'admin/models/User.php';
require_once 'admin/models/DanhMuc.php';
require_once './models/KhuyenMai.php';
require_once './models/cart.php';
require_once 'admin/models/TrangThai.php';
require_once 'admin/models/DonHang.php';
require_once 'admin/models/Auth.php';




// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->index(),
    // 'product'          => (new HomeController())->productByCategory(), // xử lý theo brand

    //  'show'    => (new HomeController())->show($_GET['id']), 
    // 'cart' => (new HomeController())->cart($_GET['id'] ?? 0),
    'register' => (new UsersController())->register(),
    'login' => (new UsersController())->login(),
    'logout' => (new UsersController())->logout(),
    'lien_he/create'         => (new LienHeController())->create(),
    'lien_he'         => (new HomeController())->lienHe(),
    'tin_tuc'         => (new HomeController())->TinTuc(),
    'khuyen_mai' => (new KhuyenMaiController())->listPromotions(),
    'detail_tintucs'    => (new HomeController())->detailTinTuc($_GET['id'] ?? 0),
    'them-gio-hang' => (new CartController)->createCart(),
    'view-cart' => (new CartController)->viewCart(),
    'pay' => (new CartController)->viewPay(),
    'dat-hang' => (new CartController)->postOrder(),
    'finish' => (new CartController())->viewFinish(),
    'huy-don-hang' => (new CartController())->huyDonHang(),
    'chi-tiet-don-hang' => (new CartController())->chiTietDonHang(),
    'updateQuantity' => (new CartController())->updateQuantity(),
    'send-mail' => (new CartController)->sendMail(),
    'deleteSelectedProducts' => (new CartController)->deleteItem(),
    'chi-tiet-san-pham' => (new HomeController())->detailSanPham($_GET['id'] ?? 0),
    'binhluan/create' => (new CartController())->creatBinhLuan(),
    'show'      => (new UsersController())->show($_SESSION['id'] ?? 0),
    'update_profile'        => (new UsersController())->edit($_GET['id'] ?? 0),
    'update_pass'        => (new UsersController())->editpass($_GET['id'] ?? 0),
    'product'          => (new HomeController())->productByCategory(), // xử lý theo brand
    'search'            => (new HomeController())->search($_GET['search']),
    'products/search'   => (new ProductController())->search($_GET['query'] ?? '')
    
};