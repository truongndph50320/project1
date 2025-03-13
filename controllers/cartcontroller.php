<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CartController
{
     public $cartModel;
     public $sanphamModel;
     public $userModel;
     public function __construct()
     {
          $this->cartModel = new CartModel();
          $this->userModel = new Users();
     }

     public function createCart()
     {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {

               if (!isset($_SESSION['id'])) {
                    header('Location:' . BASE_URL . '?act=login');
                    exit();
               }
               $nguoi_dung_id = $_SESSION['id'];
               $so_luong = $_POST['so_luong'];
               $san_pham_id = $_POST['san_pham_id'];




               $id_cart = $this->cartModel->getIdCart($nguoi_dung_id);
               // $id_cart sẽ nhận được mảng id và tai_khoan_id của user đó
               // lấy id giỏ hàng
               // var_dump($id_cart);
               // die;

               if (!$id_cart) {
                    // nếu kh có giỏ tạo giỏ mới
                    $id_cart = $this->cartModel->insertCart($nguoi_dung_id);
               } else {
                    $id_cart = $id_cart[0]['id'];
               }


               // kiểm tra xem sp đã có trong giỏ chưa
               $exitsProduct = $this->cartModel->checkProductCart($id_cart, $san_pham_id);
               // $cartItem = $this->cartModel->getCartItemById($cartId);
               $viewCarts = $this->cartModel->getViewCart($nguoi_dung_id);
               // var_dump($viewCarts[0]['so_luong_gio_hang']).die;

               if ($exitsProduct) {
                    // nếu có cập nhật số lượng
                    if ($viewCarts[0]['so_luong_gio_hang'] == $viewCarts[0]['so_luong_san_pham']) {
                         echo "<script>alert('Quá số lượng kho'); window.location.href='" . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id . "';</script>";
                    } else {
                         $this->cartModel->updateCartQuantity($id_cart, $san_pham_id, $so_luong);
                         echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công!'); window.location.href='" . BASE_URL . "';</script>";
                    }
               } else {
                    //nếu chưa có sản phẩm thì thêm
                    $this->cartModel->insertDetailCart($id_cart, $san_pham_id, $so_luong);
                    echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công!'); window.location.href='" . BASE_URL . "';</script>";
               }


               exit();
          }
     }
     //

     public function viewCart()
     {

          if (!isset($_SESSION['id'])) {
               header("Location:" . BASE_URL . '?act=login');
               exit();
          }


          $nguoi_dung_id = $_SESSION['id'];


          $viewCarts = $this->cartModel->getViewCart($nguoi_dung_id);

          if (isset($_GET['total'])) {

               $total = $_GET['total'];
          } else {

               $total = $this->cartModel->getCartTotal($nguoi_dung_id);
          }


          require_once 'views/cart.php';
     }

     //
     public function updateQuantity()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               // Lấy dữ liệu gửi từ AJAX
               $data = json_decode(file_get_contents('php://input'), true);
               // var_dump($data);
               // die;
               $cartId = $data['cartId']; // lấy id từ bên json trả về
               $change = $data['change']; // số lượng khi tăng là 1 còn giảm sẽ là -1

               // Kiểm tra session đăng nhập tồn tạ chưa
               if (!isset($_SESSION['id'])) {
                    echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập để cập nhật giỏ hàng']);
                    exit;
               }

               // Lấy thông tin sản phẩm từ giỏ hàng
               $cartItem = $this->cartModel->getCartItemById($cartId);
               if (!$cartItem) {
                    echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
                    exit;
               }

               // Tính toán số lượng mới
               $newQuantity = $cartItem['so_luong_gio_hang'] + $change;

               // Kiểm tra số lượng hợp lệ
               if ($newQuantity < 1) {
                    echo json_encode(['success' => false, 'message' => 'Số lượng phải lớn hơn 0']);
                    exit;
               }
               if ($newQuantity > $cartItem['     ']) {
                    echo json_encode([
                         'success' => false,
                         'message' => 'Quá số lượng kho.',
                         'current_quantity' => $cartItem['so_luong_gio_hang'] // Trả về số lượng hiện tại
                    ]);
                    exit;
               }

               // Cập nhật số lượng sản phẩm
               $this->cartModel->updateProductQuantity($cartId, $newQuantity);

               // Tính lại giá trị tổng cộng
               $newTotalPrice = $newQuantity * $cartItem['gia_san_pham'];
               $cartTotal = $this->cartModel->getCartTotal($cartItem['gio_hang_id']);

               // Phản hồi kết quả về AJAX
               echo json_encode([
                    'success' => true,
                    'newQuantity' => $newQuantity,
                    'newTotalPrice' => $newQuantity * $newTotalPrice,
                    'cartTotal' => $cartTotal
               ]);
               exit;
          }
     }

     public function viewPay()
     {
          $user = $this->userModel->getUserById($_SESSION['id']);
          if (!isset($_SESSION['id'])) {
               header("Location:" . BASE_URL . '?act=login');
               exit();
          }
          $user_id = $_SESSION['id'];
          // var_dump($user_id);
          // die;
          $cart_item = $this->cartModel->getCartItem($user_id);
          // var_dump($cart_item);
          // die;
          require_once './views/pay.php';
     }



     public function postOrder()
     {

          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $user_id = $_SESSION['id'];
               $ma_don_hang = 'DH' . rand(1000, 9999);
               $ten_nguoi_nhan = isset($_POST['ten_nguoi_nhan']) ? $_POST['ten_nguoi_nhan'] : '';
               $sdt_nguoi_nhan = isset($_POST['sdt_nguoi_nhan']) ? $_POST['sdt_nguoi_nhan'] : '';
               $email_nguoi_nhan = isset($_POST['email_nguoi_nhan']) ? $_POST['email_nguoi_nhan'] : '';
               $dia_chi_nguoi_nhan = isset($_POST['dia_chi_nguoi_nhan']) ? $_POST['dia_chi_nguoi_nhan'] : '';
               $ngay_dat = isset($_POST['ngay_dat']) ? $_POST['ngay_dat'] : date('Y-m-d H:i:s');
               $ghi_chu = isset($_POST['ghi_chu']) ? $_POST['ghi_chu'] : '';

               // Tính tổng tiền giỏ hàng
               $tong_tien = 0;
               $cart_items = $this->cartModel->getCartItem($user_id);
               foreach ($cart_items as $item) {
                    $tong_tien += $item['so_luong_gio_hang'] * $item['price'];
               }
               $tong_tien += 30000; // Phí ship

               // Trạng thái và phương thức thanh toán
               $trang_thai_thanh_toan_id = 1; // Chưa thanh toán
               $trang_thai_don_hang_id = 1;  // Mới đặt hàng
               $phuong_thuc_thanh_toan_id = 1; // Thanh toán khi nhận hàng (COD)

               // Lưu thông tin đơn hàng
               $order_id = $this->cartModel->insertOrder(
                    $user_id,
                    $ma_don_hang,
                    $ten_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $email_nguoi_nhan,
                    $dia_chi_nguoi_nhan,
                    $ngay_dat,
                    $tong_tien,
                    $ghi_chu,
                    $trang_thai_thanh_toan_id,
                    $trang_thai_don_hang_id,
                    $phuong_thuc_thanh_toan_id
               );

               // Lưu chi tiết đơn hàng
               foreach ($cart_items as $item) {
                    $san_pham_id = $item['san_pham_id'];
                    $quantity = $item['so_luong_gio_hang'];
                    $price = $item['price'];
                    $subtotal = $quantity * $price;

                    $this->cartModel->insertOrderDetail(
                         $order_id,
                         $san_pham_id,
                         $price,
                         $quantity,
                         $subtotal
                    );
                    $this->cartModel->deleteAll();

                    $this->cartModel->updateSoLuong($san_pham_id, $quantity);
               }



               // Điều hướng về trang hoàn tất
               header("Location:" . BASE_URL . '?act=finish');
               exit();
          }
     }

     //

     public function deleteItem()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedItems']) && !empty($_POST['selectedItems'])) {

               // var_dump($_POST);
               // die;
               // var_dump($_POST['selectedItems']);
               // exit;
               // lấy ds id cần xóa

               $selectedItems = $_POST['selectedItems'];

               foreach ($selectedItems as $itemId) {
                    // var_dump($itemId);
                    // die;
                    $this->cartModel->deleteItem($itemId);
               }
               $nguoi_dung_id = $_SESSION['id'];
               // tính lại tổng tiền nếu xóa
               $total = $this->cartModel->getCartTotal($nguoi_dung_id);
               // header("Location:" . BASE_URL . '?act=view-cart&total=' . $total);
               // exit();
               echo "<script>
               alert(\"Xóa sản phẩm thành công!\");
               window.location.href=\"" . BASE_URL . "?act=view-cart&total=" . $total . "\";
             </script>";
               exit();
          }
     }

     //
     public function viewFinish()
     {
          $nguoi_dung_id = $_SESSION['id'];
          $viewEnds = $this->cartModel->getOrderDetail($nguoi_dung_id);
          // echo "<pre>";
          // print_r($viewEnds);
          // echo "</pre>";
          // exit;



          require_once './views/endpay.php';
     }

     public function chiTietDonHang()
     {
          $nguoi_dung_id = $_SESSION['id'];
          // $viewEnds = $this->cartModel->getOrderDetail($nguoi_dung_id);
          $order_id = isset($_GET['id']) ? $_GET['id'] : null;
          $thong_tins =  $this->cartModel->getOrderDetails($order_id);
          // var_dump($thong_tins).die;
          $orderItems = $this->cartModel->getOrderItemsByOrderId($order_id);
          require_once './views/chiTietDonHang.php';
     }

     public function sendMail()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $order_ids = $_POST['order_ids'] ?? [];
               if (empty($order_ids)) {
                    echo "Lỗi: Không có mã đơn hàng nào được gửi.";
                    return;
               }

               foreach ($order_ids as $order_id) {
                    // Lấy thông tin đơn hàng
                    $order_info = $this->cartModel->getOrderById($order_id);
                    if (!$order_info) {
                         echo "Không tìm thấy thông tin đơn hàng cho ID: $order_id.<br>";
                         continue;
                    }

                    $order_fall = $this->cartModel->getOrderDetails($order_id);
                    if (!$order_fall || !isset($order_fall[0])) {
                         echo "Không tìm thấy chi tiết đơn hàng cho ID: $order_id.<br>";
                         continue;
                    }

                    $email = $order_info['email_nguoi_nhan'];
                    $subject = "Xác nhận đơn hàng của bạn";

                    // Tạo nội dung email với CSS inline
                    $content = "<html><head><meta charset='UTF-8'><title>Xác nhận đơn hàng</title>";
                    $content .= "<style>
                            body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
                            .email-container { max-width: 600px; margin: 0 auto; background-color: #fff; border-radius: 8px; padding: 20px; }
                            .email-header { text-align: center; padding-bottom: 20px; border-bottom: 2px solid #ddd; margin-bottom: 20px; }
                            .email-header img { width: 150px; }
                            .email-header h1 { font-size: 24px; color: #333; }
                            .order-details { margin-bottom: 20px; }
                            .order-details h2 { font-size: 20px; color: #333; margin-bottom: 10px; }
                            .order-details ul { list-style: none; padding: 0; }
                            .order-details li { font-size: 16px; color: #555; margin-bottom: 10px; }
                            .order-details li strong { color: #333; }
                            .footer { text-align: center; font-size: 14px; color: #888; margin-top: 20px; }
                            .footer a { color: #007bff; text-decoration: none; }
                          </style></head><body>";

                    $content .= "<div class='email-container'>
                            <div class='email-header'>
                                <img src='https://t4.ftcdn.net/jpg/02/77/43/25/360_F_277432530_peLp2WAlSLVtwV3h4tzFG8BhvruFrPwW.jpg' alt='PhoneStore'>
                                <h1>Xác nhận đơn hàng của bạn</h1>
                            </div>";

                    $content .= "<div class='order-details'>
                            <h2>Thông tin đơn hàng:</h2>
                            <ul>";

                    // Loop through each item in the order to add it to the email
                    foreach ($order_fall as $item) {
                         // Add order details for each item in the order
                         $content .= "<li><strong>Mã đơn hàng:</strong> {$item['ma_don_hang']}</li>";
                         $content .= "<li><strong>Người nhận:</strong> {$item['ten_nguoi_nhan']}</li>";
                         $content .= "<li><strong>Địa chỉ:</strong> {$item['dia_chi_nguoi_nhan']}</li>";
                         $content .= "<li><strong>Sản phẩm:</strong> {$item['ten_san_pham']} x {$item['so_luong']}</li>";
                         $content .= "<li><strong>Thành tiền:</strong> " . number_format($item['thanh_tien'], 0, ',', '.') . " đ</li>";

                         // Map status ID to status text
                         $statusText = '';
                         $buttonColor = ''; // To store button color
                         
                         switch ($item['trang_thai_don_hang_id']) {
                             case 1:
                                 $statusText = 'Chờ xác nhận';
                                 $buttonColor = '#ffc107'; // Yellow (waiting)
                                 break;
                             case 2:
                                 $statusText = 'Đã xác nhận';
                                 $buttonColor = '#28a745'; // Green (confirmed)
                                 break;
                             case 3:
                                 $statusText = 'Đang giao';
                                 $buttonColor = '#17a2b8'; // Blue (in transit)
                                 break;
                             case 4:
                                 $statusText = 'Đã giao';
                                 $buttonColor = '#007bff'; // Blue (delivered)
                                 break;
                             case 5:
                                 $statusText = 'Đã nhận hàng';
                                 $buttonColor = '#007f5f'; // Dark green (received)
                                 break;
                             
                             default:
                             $statusText = 'Đã hủy';
                             $buttonColor = '#dc3545'; // Red (canceled)
                             break;
                         }
                         
                         $content .= "<li><strong>Trạng thái:</strong>
                <button style='background-color: $buttonColor; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;'>
                    $statusText
                </button>
             </li>";
                         
                    $content .= "</ul></div>
                        <div class='footer'>
                            <p>Cảm ơn bạn đã mua sắm tại <a href='https://yourwebsite.com'>PhoneStore</a></p>
                            <p>Để biết thêm thông tin hoặc hỗ trợ, vui lòng liên hệ với chúng tôi qua email: <a href='mailto:support@yourwebsite.com'>PhoneStore@gmail.com</a></p>
                        </div>
                    </div>
                </body></html>";

                    // Gửi email
                    
               }
          }
     }
}


     public function huyDonHang()
     {
          if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $this->cartModel->huyDonHang($id);
               header('Location: ?act=finish');
          }
     }

     public function creatBinhLuan(){
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              if (!isset($_SESSION['id'])) {
                  die("Bạn cần đăng nhập để bình luận.");
              }
          
              $id = $_SESSION['id'];
              $san_pham_id = $_POST['san_pham_id'];
              $binh_luan = $_POST['binh_luan'];
          
              // Kiểm tra dữ liệu đầu vào
              if (empty($binh_luan) || empty($san_pham_id)) {
                  die("Dữ liệu không hợp lệ.");
              }
              else{
                  $san_pham_id = $this->sanphamModel->createBinhLuan($id, $san_pham_id, $binh_luan);
              
                  // Sau khi tạo bình luận thành công, chuyển hướng về trang chi tiết sản phẩm
                  header("Location:?act=chi-tiet-san-pham&id=". $_POST['san_pham_id']);
  
              }
              // Thêm bình luận vào cơ sở dữ liệu
              // $stmt = $conn->prepare("INSERT INTO comments (user_id, product_id, content) VALUES (?, ?, ?)");
              // $stmt->bind_param("iis", $user_id, $product_id, $content);
          
              // if ($stmt->execute()) {
              //     echo "Bình luận đã được thêm.";
              // } else {
              //     echo "Lỗi: " . $stmt->error;
              // }
          }
      }
}
