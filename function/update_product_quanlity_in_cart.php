<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ AJAX
    $data = json_decode(file_get_contents('php://input'), true);
    $productId = $data['productId'] ?? null;
    $newQuantity = $data['newQuantity'] ?? 1;

    if ($productId && $newQuantity >= 1) {
        // Tìm sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as &$sanPham) {
            if ($sanPham['id'] == $productId) {
                $sanPham['quantity'] = $newQuantity; // Cập nhật số lượng
                echo json_encode(['success' => true]);
                exit;
            }
        }

        // Nếu không tìm thấy sản phẩm
        echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ.']);
}
?>
