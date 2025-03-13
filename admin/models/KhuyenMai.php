<?php
class KhuyenMai
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM khuyen_mais";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        // Truy vấn lấy khuyến mãi theo ID
        $sql = "SELECT * FROM khuyen_mais WHERE id = :id";
        
        // Chuẩn bị câu truy vấn
        $stmt = $this->conn->prepare($sql);
        
        // Thực thi câu truy vấn
        $stmt->execute(['id' => $id]);
        
        // Trả về kết quả
        return $stmt->fetch();  // Trả về 1 mảng dữ liệu
    }
    


    public function create($data)
    {
        $sql = "INSERT INTO khuyen_mais (ten_khuyen_mai,ma_khuyen_mai,gia_tri,ngay_bat_dau,ngay_ket_thuc, mo_ta, trang_thai) 
                VALUES (:ten_khuyen_mai,:ma_khuyen_mai,:gia_tri,:ngay_bat_dau,:ngay_ket_thuc, :mo_ta, :trang_thai)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE khuyen_mais SET ten_khuyen_mai =:ten_khuyen_mai, ma_khuyen_mai=:ma_khuyen_mai, gia_tri=:gia_tri,
        ngay_bat_dau=:ngay_bat_dau, ngay_ket_thuc=:ngay_ket_thuc, mo_ta = :mo_ta, trang_thai = :trang_thai WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM khuyen_mais WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

     // Thêm phương thức tìm kiếm
     public function search($keyword)
     {
        $sql = "SELECT * FROM khuyen_mais WHERE ten_khuyen_mai LIKE :keyword OR ma_khuyen_mai LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['keyword' => '%' . $keyword . '%']);
        
        // Kiểm tra kết quả tìm kiếm
        $results = $stmt->fetchAll();
        var_dump($results); // Thêm dòng này để kiểm tra kết quả
        return $results;
    }
}
