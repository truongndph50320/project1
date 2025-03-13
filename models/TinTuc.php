<?php
class TinTuc
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tin_tucs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Thêm kiểu trả về là mảng liên kết
    }

    public function getById($id)
    {
        // Sử dụng câu lệnh chuẩn bị và bind tham số để tránh SQL Injection
        $sql = "SELECT * FROM tin_tucs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // bindParam an toàn
        $stmt->execute();
        
        // Sử dụng fetch() vì bạn chỉ muốn 1 bản ghi
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về 1 bản ghi duy nhất
    }
}

