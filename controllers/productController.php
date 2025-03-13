<?php
    class ProductController{
        public function __construct(){
            $this->productModel = new Product();
        }
        public function search($query) {
            // Gọi model để lấy danh sách sản phẩm dựa trên từ khóa
            $productModel = new Product();
            $products = $productModel->searchProducts($query);
    
            // Truyền dữ liệu sản phẩm vào view
            include './views/search_results.php';
        }
    }

?>