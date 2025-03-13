<?php
class LienHe
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM lien_hes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM lien_hes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO lien_hes (email, noi_dung,ten,sdt) 
                VALUES (:email, :noi_dung, :ten, :sdt)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE lien_hes SET email = :email, noi_dung = :noi_dung, trang_thai = :trang_thai, ten = :ten, sdt = :sdt
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM lien_hes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function search($keyword)
    {
       $sql = "SELECT * FROM lien_hes WHERE noi_dung LIKE :keyword OR email LIKE :keyword";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute(['keyword' => '%' . $keyword . '%']);
       
       // Kiểm tra kết quả tìm kiếm
       $results = $stmt->fetchAll();
       var_dump($results); // Thêm dòng này để kiểm tra kết quả
       return $results;
   }
}
