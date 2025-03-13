<?php

class Product
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Hàm này phải tồn tại và trả về kết nối PDO.
    }

    // Lấy tất cả sản phẩm
    public function getAll()
    {
        $sql = "SELECT product_id, name, price, image_url,category_id,stock_quantity FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getById($id)
    {
        $sql = "SELECT product_id, name, price, description, image_url,category_id,stock_quantity FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy bình luận của sản phẩm
    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = 'SELECT 
                        sp.ma_san_pham AS ma_san_pham,
                        sp.image_url,
                        nd.ten_nguoi_dung,
                        nd.sdt,
                        bl.san_pham_id,
                        bl.binh_luan,
                        bl.ngay_dang,
                        bl.trang_thai,
                        nd.vai_tro,
                        nd.avatar
                    FROM 
                        products sp
                    JOIN 
                        binh_luans bl ON bl.san_pham_id = sp.ma_san_pham
                    LEFT JOIN 
                        nguoi_dungs nd ON bl.nguoi_dung_id = nd.id
                    WHERE 
                        sp.ma_san_pham = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy đánh giá của sản phẩm
    public function getDanhGiaFromSanPham($id)
    {
        try {
            $sql = 'SELECT 
                        sp.ma_san_pham AS ma_san_pham,
                        sp.image_url,
                        nd.ten_nguoi_dung,
                        nd.sdt,
                        dg.san_pham_id,
                        dg.danh_gia,
                        dg.ngay_dang,
                        dg.trang_thai,
                        nd.vai_tro,
                        nd.avatar
                    FROM 
                        products sp
                    JOIN 
                        danh_gia dg ON dg.san_pham_id = sp.ma_san_pham
                    LEFT JOIN 
                        nguoi_dungs nd ON dg.nguoi_dung_id = nd.id
                    WHERE 
                        sp.ma_san_pham = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lọc sản phẩm
    public function filter($orderBy = 1, $danhMucId = null)
    {
        try {
            $sql = "
                SELECT 
                    sp.*, 
                    dm.ten_danh_muc,
                    AVG(dg.danh_gia) AS danh_gia_tb, 
                    COUNT(dg.id) AS so_luong_danh_gia
                FROM 
                    products sp
                LEFT JOIN 
                    danh_gia dg ON sp.ma_san_pham = dg.san_pham_id
                LEFT JOIN 
                    danh_mucs dm ON sp.category_id = dm.id
                WHERE 
                    sp.status = 1
                    AND (dg.trang_thai = 1 OR dg.id IS NULL)
            ";

            if ($danhMucId !== null) {
                $sql .= " AND sp.category_id = :danhMucId";
            }

            $sql .= " GROUP BY sp.ma_san_pham, dm.ten_danh_muc";

            switch ($orderBy) {
                case '2':
                    $sql .= " ORDER BY sp.price ASC";
                    break;
                case '3':
                    $sql .= " ORDER BY sp.price DESC";
                    break;
                case '4':
                    $sql .= " ORDER BY sp.name ASC";
                    break;
                case '5':
                    $sql .= " ORDER BY sp.name DESC";
                    break;
                case '6':
                    $sql .= " ORDER BY danh_gia_tb DESC";
                    break;
                default:
                    $sql .= " ORDER BY sp.ma_san_pham ASC";
                    break;
            }

            $stmt = $this->conn->prepare($sql);

            if ($danhMucId !== null) {
                $stmt->bindParam(':danhMucId', $danhMucId, PDO::PARAM_INT);
            }

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy danh sách đánh giá của sản phẩm
    public function getDanhGia($id)
    {
        try {
            $sql = 'SELECT 
                        dg.san_pham_id,
                        dg.danh_gia,
                        dg.ngay_dang
                    FROM 
                        danh_gia dg
                    WHERE 
                        dg.san_pham_id = :id AND dg.trang_thai = 1';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function danhmuc()
    {
        $sql = "SELECT * FROM danh_mucs";  // Thay `danh_mucs` với tên bảng danh mục của bạn
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductsByCategory($categoryId)
    {
        $sql = "SELECT product_id, name, price, image_url FROM products WHERE category_id = :categoryId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['categoryId' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchProducts($query) {
        try {
            $sql = "SELECT * FROM products WHERE name LIKE :searchTerm";
            $stmt = $this->conn->prepare($sql); // PDO sử dụng prepare()
            $searchTerm = '%' . $query . '%';
            $stmt->bindValue(':searchTerm', $searchTerm, PDO::PARAM_STR); 
            $stmt->execute(); //
    
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $products;
        } catch (PDOException $e) {
            die("Lỗi tìm kiếm sản phẩm: " . $e->getMessage());
        }
    }
}
