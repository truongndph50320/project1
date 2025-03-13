<?php
session_start();

// Kiểm tra nếu yêu cầu là POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy các thông tin từ form
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $img = $_POST['img'] ?? null;
    $price = $_POST['price'] ?? null;
    $quantity = $_POST['quantity'] ?? 1;

    // Kiểm tra ID có hợp lệ hay không
    if ($id !== null && is_numeric($id)) {
        // Nếu giỏ hàng chưa tồn tại, khởi tạo giỏ hàng
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        $productExists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] += $quantity; 
                $productExists = true;
                break;
            }
        }

        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
        if (!$productExists) {
            $_SESSION['cart'][] = [
                'id' => (int)$id, // Lưu ID sản phẩm
                'name' => $name,  // Lưu tên sản phẩm
                'img' => $img,    // Lưu ảnh sản phẩm
                'price' => $price, // Lưu giá sản phẩm
                'quantity' => $quantity,   // Số lượng (có thể là 1 hoặc giá trị khác tùy theo form)
            ];
        }

        // Trả về phản hồi JSON (bao gồm giỏ hàng)
        echo json_encode(['success' => true, 'cart' => $_SESSION['cart']]);
    } else {
        // Trả về thông báo lỗi nếu ID không hợp lệ
        echo json_encode(['success' => false, 'message' => 'ID sản phẩm không hợp lệ.']);
    }

    exit();
}
