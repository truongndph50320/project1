<?php
class BinhLuan
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM binh_luans";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM binh_luans WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function add($data)
    {
        $sql = "INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai) 
                VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, :ngay_dang, :trang_thai)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }


    public function delete($id)
    {
        $sql = "DELETE FROM binh_luans WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
?>
