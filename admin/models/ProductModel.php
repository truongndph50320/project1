<?php
class Product
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Giả sử bạn đã có hàm connectDB() kết nối cơ sở dữ liệu
    }

    // Lấy tất cả sản phẩm
    public function getAll()
    {
        $sql = "SELECT p.*, c.ten_danh_muc 
                FROM products p
                LEFT JOIN danh_mucs c ON p.category_id = c.id"; // Thêm LEFT JOIN với bảng danh_mucs để lấy tên danh mục
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy sản phẩm theo ID
    public function getById($id)
    {
        $sql = "SELECT p.*, c.ten_danh_muc 
                FROM products p
                LEFT JOIN danh_mucs c ON p.category_id = c.id 
                WHERE p.product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Thêm sản phẩm mới
    public function add($data)
    {
        $sql = "INSERT INTO products (ma_san_pham, name, category_id, brand, description, price, stock_quantity, status, ram, storage, color, image_url, sku)
                VALUES (:ma_san_pham, :name, :category_id, :brand, :description, :price, :stock_quantity, :status, :ram, :storage, :color, :image_url, :sku)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    

    // Cập nhật sản phẩm
    public function edit($id, $data)
    {
        // Kiểm tra ảnh mới, nếu không có, giữ ảnh cũ
        $sql = "SELECT image_url FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch();

        // Nếu không có ảnh mới, giữ lại ảnh cũ
        if (empty($data['image_url'])) {
            $data['image_url'] = $product['image_url'];
        }

        // Cập nhật thông tin sản phẩm
        $sql = "UPDATE products SET 
                name = :name,
                brand=:brand,
                category_id = :category_id,
                description = :description,
                price = :price,
                stock_quantity = :stock_quantity,
                status = :status,
                ram = :ram,
                storage = :storage,
                color = :color,
                image_url = :image_url,
                sku = :sku
                WHERE product_id = :id";
        $data['id'] = $id; // Thêm id vào dữ liệu để sử dụng trong câu lệnh WHERE
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Xóa sản phẩm theo ID
    public function delete($id)
    {
        // Xóa sản phẩm khỏi bảng products
        $sql = "DELETE FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function tongSoSanPham()
    {
        $sql = "SELECT COUNT(*) as total FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ? (int)$result['total'] : 0;
    }

    public function getListSanPhamCungDanhMuc($danh_muc_id)
    {
        try {
            $sql = 'SELECT products.*, danh_mucs.ten_danh_muc 
                    FROM products
                    INNER JOIN danh_mucs ON products.danh_muc_id = danh_mucs.id
                    WHERE products.danh_muc_id = :danh_muc_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $danh_muc_id]); // Binding tham số
            return $stmt->fetchAll(); // Lấy toàn bộ dữ liệudu
        } catch (\Throwable $th) {
            echo 'Lỗi: ' . $th->getMessage();
        }
    }

   

}
?>