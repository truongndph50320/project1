<?php
class TrangThai
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM trang_thai_don_hangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM trang_thai_don_hangs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

  
    

    public function update($id, $data)
    {
        $sql = "UPDATE trang_thai_don_hangs SET ten_trang_thai = :ten_trang_thai
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM trang_thai_don_hangs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    public function search($keyword)
    {
       $sql = "SELECT * FROM trang_thai_don_hangs WHERE ten_trang_thai LIKE :keyword OR ten_trang_thai LIKE :keyword";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute(['keyword' => '%' . $keyword . '%']);
       
       // Kiểm tra kết quả tìm kiếm
       $results = $stmt->fetchAll();
       var_dump($results); // Thêm dòng này để kiểm tra kết quả
       return $results;
   }
}
