<?php
class TinTuc
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tin_tucs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM tin_tucs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($tieu_de, $noi_dung, $ngay_tao, $trang_thai, $hinh_anh)
    {
        $sql = "INSERT INTO tin_tucs (tieu_de, noi_dung, ngay_tao , trang_thai, hinh_anh) 
                VALUES (:tieu_de, :noi_dung, :ngay_tao, :trang_thai, :hinh_anh)";
         $stmt = $this->conn->prepare($sql);

         // Gán giá trị vào các tham số
         $stmt->bindParam(':tieu_de', $tieu_de);
         $stmt->bindParam(':hinh_anh', $hinh_anh);
         $stmt->bindParam(':trang_thai', $trang_thai);
         $stmt->bindParam(':noi_dung', $noi_dung);
         $stmt->bindParam(':ngay_tao', $ngay_tao);
         $stmt->execute();

         
    }

    public function update($id, $data)
    {
        $sql = "UPDATE tin_tucs SET tieu_de = :tieu_de, noi_dung = :noi_dung, trang_thai = :trang_thai
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tin_tucs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Thêm phương thức tìm kiếm
    public function search($keyword)
    {
       $sql = "SELECT * FROM tin_tucs WHERE tieu_de LIKE :keyword OR noi_dung LIKE :keyword";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute(['keyword' => '%' . $keyword . '%']);
       
       // Kiểm tra kết quả tìm kiếm
       $results = $stmt->fetchAll();
       var_dump($results); // Thêm dòng này để kiểm tra kết quả
       return $results;
   }
}
