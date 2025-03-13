<?php
class BienThe
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Assumes you have a connectDB function for the database connection
    }

    public function getAll()
    {
        $sql = "SELECT * FROM bien_thes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM bien_thes WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function add($data)
    {
        $sql = "INSERT INTO bien_thes (name, brand, category, description, price, stock_quantity, status, ram, storage, color, image_url, sku)
                VALUES (:name, :brand, :category, :description, :price, :stock_quantity, :status, :ram, :storage, :color, :image_url, :sku)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function edit($id, $data)
    {
        // If no new image is provided, keep the old image_url
        $sql = "SELECT image_url FROM bien_thes WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch();

        // If no new image is uploaded, use the old image_url
        if (empty($data['image_url'])) {
            $data['image_url'] = $product['image_url'];
        }

        $sql = "UPDATE bien_thes SET 
                name = :name,
                brand = :brand,
                category = :category,
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
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM bien_thes WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}

?>
