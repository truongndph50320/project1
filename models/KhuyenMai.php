<?php
class KhuyenMai
{
    private $conn;

    public function __construct()
    {
        // Kết nối cơ sở dữ liệu
        $this->conn = connectDB();  // Sử dụng hàm kết nối đã tạo
    }

    // Lấy tất cả khuyến mãi
    public function getAllKhuyenMai()
    {
        // Truy vấn SQL để lấy dữ liệu khuyến mãi
        $query = "SELECT ten_khuyen_mai, ma_khuyen_mai, ngay_bat_dau, ngay_ket_thuc FROM khuyen_mais WHERE trang_thai = 1";

        // Thực thi truy vấn
        $stmt = $this->conn->query($query);

        // Kiểm tra kết quả trả về, sử dụng fetchAll() thay vì num_rows
        $khuyenmais = [];
        if ($stmt) {
            // Fetch tất cả các kết quả trả về dưới dạng mảng
            $khuyenmais = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $khuyenmais;
    }
}
