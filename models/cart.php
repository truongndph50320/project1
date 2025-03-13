<?php
class CartModel
{
     public $conn;

     public function __construct()
     {
          $this->conn = connectDB();
     }

     public function insertCart($nguoi_dung_id)
     {
          $sql = "INSERT INTO gio_hangs(tai_khoan_id) VALUE(:tai_khoan_id)";
          $stmt = $this->conn->prepare($sql);

          $stmt->execute([
               ':tai_khoan_id' => $nguoi_dung_id
          ]);
          $cart_id = $this->conn->lastInsertId();
          // var_dump($cart_id);
          // die;

          return $cart_id;
     }
     public function getCartItemById($cartId)
     {
          $sql = "SELECT chi_tiet_gio_hangs.so_luong AS so_luong_gio_hang, products.price, products.stock_quantity AS so_luong_san_pham, products.products_id AS san_pham_id
            FROM chi_tiet_gio_hangs
            INNER JOIN products ON chi_tiet_gio_hangs.san_pham_id = products.product_id
            WHERE chi_tiet_gio_hangs.id = :cartId";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':cartId' => $cartId]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     //
     public function insertDetailCart($cart_id, $san_pham_id, $so_luong)
     {
          $sql = "INSERT INTO chi_tiet_gio_hangs(gio_hang_id,san_pham_id,so_luong) VALUE(:gio_hang_id,:san_pham_id,:so_luong)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':gio_hang_id' => $cart_id,
               ':san_pham_id' => $san_pham_id,
               ':so_luong' => $so_luong
          ]);

          return true;
     }
     //
     public function getViewCart($nguoi_dung_id)
     {
          $sql = "SELECT chi_tiet_gio_hangs.so_luong AS so_luong_gio_hang, chi_tiet_gio_hangs.id, products.name,products.stock_quantity AS so_luong_san_pham, products.price, products.image_url
                  FROM chi_tiet_gio_hangs
                  INNER JOIN products ON chi_tiet_gio_hangs.san_pham_id = products.product_id
                  INNER JOIN gio_hangs ON chi_tiet_gio_hangs.gio_hang_id = gio_hangs.id
                  WHERE gio_hangs.tai_khoan_id = :nguoi_dung_id";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':nguoi_dung_id' => $nguoi_dung_id]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }


     //

     public function getIdCart($nguoi_dung_id)
     {
          $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id =" . $nguoi_dung_id;
          // lấy tt gio hang theo tkid=id ng dùng đăng nhập
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }


     public function checkProductCart($id_cart, $san_pham_id)
     {
          $sql = "SELECT 
    cth.san_pham_id,
    cth.gio_hang_id,
    cth.so_luong AS so_luong_gio_hang,
    sp.stock_quantity AS so_luong_san_pham
FROM 
    chi_tiet_gio_hangs cth
JOIN 
    products sp
ON 
    cth.san_pham_id = sp.product_id
WHERE 
    cth.gio_hang_id = :gio_hang_id
    AND cth.san_pham_id = :san_pham_id;
";
          // kiểm tra xem trong chi tiêt cart có ghid và spid = kh
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':gio_hang_id' => $id_cart,
               ':san_pham_id' => $san_pham_id
          ]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     public function updateCartQuantity($id_cart, $san_pham_id, $so_luong)
     {
          $sql = "UPDATE chi_tiet_gio_hangs SET so_luong=so_luong + :so_luong WHERE gio_hang_id=:gio_hang_id AND san_pham_id=:san_pham_id";
          $stmt = $this->conn->prepare($sql);

          $stmt->execute([
               ':gio_hang_id' => $id_cart,
               ':san_pham_id' => $san_pham_id,
               ':so_luong' => $so_luong,

          ]);
          return true;
     }
     //



     public function getCartTotal($nguoi_dung_id)
     {
          $sql = "SELECT SUM(chi_tiet_gio_hangs.so_luong * products.price) AS total FROM chi_tiet_gio_hangs INNER JOIN products ON chi_tiet_gio_hangs.san_pham_id=products.product_id
          INNER JOIN gio_hangs ON chi_tiet_gio_hangs.gio_hang_id=gio_hangs.id WHERE gio_hangs.tai_khoan_id=:nguoi_dung_id";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':nguoi_dung_id' => $nguoi_dung_id
          ]);
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          return $result['total'];
     }
     //
     public function getCartItem($user_id)
     {
          $sql = "SELECT 
    chi_tiet_gio_hangs.id AS chi_tiet_gio_hang_id,
    chi_tiet_gio_hangs.so_luong AS so_luong_gio_hang,
    chi_tiet_gio_hangs.san_pham_id,
    products.name,
    products.price,
    products.image_url
FROM 
    chi_tiet_gio_hangs
INNER JOIN 
    products ON chi_tiet_gio_hangs.san_pham_id = products.product_id
INNER JOIN 
    gio_hangs ON chi_tiet_gio_hangs.gio_hang_id = gio_hangs.id
WHERE 
    gio_hangs.tai_khoan_id = :user_id;
";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':user_id' => $user_id
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function insertOrder($user_id, $ma_don_hang, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ngay_dat, $tong_tien, $ghi_chu, $trang_thai_thanh_toan_id, $trang_thai_don_hang_id, $phuong_thuc_thanh_toan_id)
     {
          $sql = "INSERT INTO don_hangs (nguoi_dung_id, ma_don_hang, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, ghi_chu, trang_thai_thanh_toan_id, trang_thai_don_hang_id, phuong_thuc_thanh_toan_id) 
                 VALUES (:nguoi_dung_id, :ma_don_hang, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ngay_dat, :tong_tien, :ghi_chu, :trang_thai_thanh_toan_id, :trang_thai_don_hang_id, :phuong_thuc_thanh_toan_id)";
          $stmt = $this->conn->prepare($sql);

          $stmt->execute([
               ':nguoi_dung_id' => $user_id,
               ':ma_don_hang' => $ma_don_hang,
               ':ten_nguoi_nhan' => $ten_nguoi_nhan,
               ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
               ':email_nguoi_nhan' => $email_nguoi_nhan,
               ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
               ':ngay_dat' => $ngay_dat,
               ':tong_tien' => $tong_tien,
               ':ghi_chu' => $ghi_chu,
               ':trang_thai_thanh_toan_id' => $trang_thai_thanh_toan_id,
               ':trang_thai_don_hang_id' => $trang_thai_don_hang_id,
               ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
          ]);

          return $this->conn->lastInsertId();
     }

     //


     public function deleteItem($itemId)
     {
          $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id=:item_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':item_id' => $itemId
          ]);
     }

     //
     public function updateProductQuantity($cartId, $newQuantity)
     {
          // Truy vấn SQL để cập nhật số lượng
          $sql = "UPDATE chi_tiet_gio_hangs 
                 SET so_luong = :newQuantity 
                 WHERE id = :cartId";

          $stmt = $this->conn->prepare($sql); // Chuẩn bị truy vấn
          $stmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT); // Bind số lượng
          $stmt->bindParam(':cartId', $cartId, PDO::PARAM_INT); // Bind cartId

          // Thực thi truy vấn và trả về kết quả
          return $stmt->execute();
     }

     //
     public function insertOrderDetail(
          $order_id,
          $san_pham_id,
          $price,
          $quantity,
          $subtotal
     ) {
          $sql = "INSERT INTO chi_tiet_don_hangs(don_hang_id,san_pham_id,don_gia,so_luong,thanh_tien) VALUES(:order_id,:san_pham_id,:don_gia,:so_luong,:thanh_tien)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':order_id' => $order_id,
               ':san_pham_id' => $san_pham_id,
               ':don_gia' => $price,
               ':so_luong' => $quantity,
               ':thanh_tien' => $subtotal
          ]);
          return true;
     }

     //
     public function getOrderDetail($nguoi_dung_id)
     {
          $sql = "SELECT 
                don_hangs.ma_don_hang,
                don_hangs.ngay_dat,
                 don_hangs.email_nguoi_nhan,
               don_hangs.id AS don_hang_id,
                don_hangs.tong_tien,
                don_hangs.phuong_thuc_thanh_toan_id,
                don_hangs.trang_thai_thanh_toan_id,
                don_hangs.trang_thai_don_hang_id,
                chi_tiet_don_hangs.*,
                products.name,
                products.price,
                products.image_url
            FROM 
                chi_tiet_don_hangs
            INNER JOIN 
                don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
            INNER JOIN 
                products ON chi_tiet_don_hangs.san_pham_id = products.product_id
            WHERE 
                don_hangs.nguoi_dung_id = :nguoi_dung_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':nguoi_dung_id' => $nguoi_dung_id
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     //
     public function getOrderById($order_id)
     {
          $sql = "SELECT * FROM don_hangs WHERE id=:order_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':order_id' => $order_id
          ]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }
     //
     public function getOrderDetails($order_id)
     {
          $sql = "SELECT chi_tiet_don_hangs.*, 
       don_hangs.ten_nguoi_nhan,
       don_hangs.ma_don_hang,
       don_hangs.email_nguoi_nhan,
       don_hangs.sdt_nguoi_nhan,
       don_hangs.ghi_chu,
       don_hangs.trang_thai_don_hang_id,
       don_hangs.dia_chi_nguoi_nhan,
       don_hangs.ngay_dat,
       products.name,
       products.image_url,
       trang_thai_don_hangs.ten_trang_thai
FROM chi_tiet_don_hangs
INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
INNER JOIN products ON chi_tiet_don_hangs.san_pham_id = products.product_id
INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id;
";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':don_hang_id' => $order_id
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function getDonHangById($donHangId)
     {
          $sql = "SELECT * FROM don_hangs WHERE id = :id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':id' => $donHangId]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }


     public function uploadTrangThaiDonHang($donHangId, $trangThaiId)
     {
          $sql = "UPDATE don_hangs SET trang_thai_don_hang_id = :trang_thai_don_hang_id WHERE id = :id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':id' => $donHangId,
               ':trang_thai_don_hang_id' => $trangThaiId
          ]);
          return true;
     }

     public function updateSoLuong($san_pham_id, $quantity_sold)
     {
          $sql = "UPDATE products SET stock_quantity = stock_quantity - :quantity_sold WHERE product_id = :san_pham_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               'quantity_sold' => $quantity_sold,
               'san_pham_id' => $san_pham_id
          ]);
     }
     // Truy vấn lấy các sản phẩm từ chi tiết đơn hàng theo order_id
     public function getOrderItemsByOrderId($order_id)
     {
          // Truy vấn lấy các sản phẩm từ chi tiết đơn hàng theo order_id
          $sql = "SELECT 
    chi_tiet_don_hangs.id AS chi_tiet_id, 
    chi_tiet_don_hangs.so_luong, 
    chi_tiet_don_hangs.thanh_tien, 
    products.name, 
    products.price, 
    products.image_url,
    don_hangs.ma_don_hang  -- Thêm trường mã đơn hàng từ bảng don_hangs
FROM 
    chi_tiet_don_hangs
INNER JOIN 
    products ON chi_tiet_don_hangs.san_pham_id = products.product_id
INNER JOIN 
    don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id  -- Kết nối với bảng don_hangs
WHERE 
    chi_tiet_don_hangs.don_hang_id = :order_id;
"; // Điều kiện theo mã đơn hàng

          // Thực hiện truy vấn với tham số
          $stmt = $this->conn->prepare($sql);

          // Đảm bảo rằng bạn liên kết tham số với đúng biến
          $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);

          // Thực thi câu lệnh
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function huyDonHang($id)
     {
          $sql = 'UPDATE don_hangs
            SET trang_thai_don_hang_id = 7
            WHERE id = :id';

          // Dữ liệu cần bind vào câu lệnh SQL
          $data = [
               'id' => $id,
          ];

          // Chuẩn bị câu lệnh
          $stmt = $this->conn->prepare($sql);

          // Thực thi câu lệnh
          $stmt->execute($data);

          return true;
     }
     public function deleteAll()
     {
          $sql = "DELETE FROM chi_tiet_gio_hangs";  // Câu lệnh SQL xóa tất cả dữ liệu trong bảng chi_tiet_gio_hang
          $stmt = $this->conn->prepare($sql);     // Chuẩn bị câu lệnh SQL
          $stmt->execute();                       // Thực thi câu lệnh SQL
          return $stmt->rowCount();                // Trả về số lượng dòng bị ảnh hưởng (xóa thành công)
     }

     public function createBinhLuan($id, $san_pham_id, $binh_luan)
     {
         $sql = "INSERT INTO binh_luans (nguoi_dung_id,san_pham_id, binh_luan,trang_thai) 
         VALUES (:nguoi_dung_id, :san_pham_id, :binh_luan,  1 )";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
             ':san_pham_id' => $san_pham_id,
             ':nguoi_dung_id' => $id,
             ':binh_luan' => $binh_luan,
         ]);
         return true;
     }

     
}
