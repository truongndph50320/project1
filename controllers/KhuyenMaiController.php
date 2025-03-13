<?php


class KhuyenMaiController
{
    private $khuyenmaiModel;

    public function __construct()
    {
        // Khởi tạo đối tượng KhuyenMai
        $this->khuyenmaiModel = new KhuyenMai();
    }

    // Phương thức để lấy và hiển thị danh sách khuyến mãi
    public function listPromotions()
    {
        // Lấy dữ liệu từ model
        $khuyenmais = $this->khuyenmaiModel->getAllKhuyenMai();

        // Kiểm tra nếu không có dữ liệu
        if (!$khuyenmais) {
            $khuyenmais = [];  // Nếu không có dữ liệu, truyền mảng rỗng vào view
        }

        // Gửi dữ liệu đến view
        include 'views/khuyen_mai.php';
    }
}
