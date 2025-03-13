<?php

class HomeController
{
    public $modelSanPham;
    public $modelTinTuc;
    public $modelUsers;

    public function __construct()
    {
        $this->modelSanPham = new Product();
        $this->modelTinTuc = new TinTuc();
        $this->modelUsers = new Users();
    }

    public function index()
    {
        $products = $this->modelSanPham->getAll(); // Lấy tất cả sản phẩm, bao gồm đường dẫn ảnh
        require_once "./views/home.php"; // View hiển thị danh sách sản phẩm
    }

    // Trang chi tiết sản phẩm
    public function show($id)
    {
        $products = $this->modelSanPham->getAll();
        $product = $this->modelSanPham->getById($id); // Lấy chi tiết sản phẩm theo ID, bao gồm đường dẫn ảnh
        require_once "./views/show.php"; // View hiển thị chi tiết sản phẩm
    }



   
    // public function search($search) {
    //     // echo("abcd");
    //     $search = $_GET['search'];
    //     $products = $this->productModel->search($search);

    //     // var_dump($products);
    //     require_once "./views/home.php";

    // }
    // public function Chitietsanpham($id){
    //     $products = $this->productModel->Chitietsanpham($id);
    //     require_once "./views/Chitietsanpham.php";
    // }

    public function detailSanPham($id)
    {
        if (empty($id)) {
            echo "Sản phẩm không tồn tại!";
            return;
        }
        // $this->sanpham = new SanPham();
        $sanphams = $this->modelSanPham->getById($id);

        $listDanhGia = $this->modelSanPham->getDanhGiaFromSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        // $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamCungDanhMuc($sanphams['danh_muc_id']);


        // var_dump($listSanPhamCungDanhMuc).die;
        require_once "./views/detailSanPham.php";
    }

    public function productByCategory()
{
    $danhMucs = $this->modelSanPham->danhmuc(); // Lấy danh sách danh mục
    $categoryId = $_GET['danhmucId'] ?? null; // Lấy danh mục được chọn (nếu có)

    if ($categoryId) {
        $products = $this->modelSanPham->getProductsByCategory($categoryId); // Lấy sản phẩm theo danh mục
    } else {
        $products = $this->modelSanPham->getAll(); // Hiển thị tất cả sản phẩm nếu không chọn danh mục
    }

    require_once './views/product.php';
}

public function search($query) {
    // Gọi model để lấy danh sách sản phẩm dựa trên từ khóa
    $productModel = new Product();
    $products = $productModel->searchProducts($query);

    // Truyền dữ liệu sản phẩm vào view
    include './views/products/search_results.php';
}

    public function login()
    {
        require_once "./view/login.php";
    }

    public function register()
    {
        require_once "./views/register.php";
    }

    public function  detailTinTuc()
    {
        $id = $_GET['id'];
        // Lấy thông tin chi tiết của danh mục
        $tintucs = $this->modelTinTuc->getById($id);
        // Đổ dữ liệu ra form
        require_once './views/detail_tintuc.php';
    }

    public function  lienHe()
    {
        require_once './views/lien_he.php';
    }

    public function TinTuc()
    {
        require_once "./views/tin_tuc.php";
    }

    public function listPromotions()
    {
        require_once "./views/khuyen_mai.php";
    }
}
