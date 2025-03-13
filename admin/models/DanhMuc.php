<?php

class DanhMuc
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Giả sử bạn đã có hàm connectDB() kết nối cơ sở dữ liệu
    }

    // Lấy tất cả danh mục
    public function getAll()
    {
        $sql = "SELECT * FROM danh_mucs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy danh mục theo ID
    public function getById($id)
    {
        $sql = "SELECT * FROM danh_mucs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Tạo mới danh mục
    public function create($data)
    {
        $sql = "INSERT INTO danh_mucs (ten_danh_muc) VALUES (:ten_danh_muc)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Cập nhật danh mục
    public function update($id, $data)
    {
        $sql = "UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Xóa danh mục
    public function delete($id)
    {
        $sql = "DELETE FROM danh_mucs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
?>
