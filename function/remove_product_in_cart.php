<?php
session_start();


$id = $_GET['id'];
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $sanPham) {
        if ($sanPham['id'] == $id) {
            unset($_SESSION['cart'][$key]);
        }
    }
}
$_SESSION['cart'] = array_values($_SESSION['cart']);
$_SESSION['alert'] = 'Xoá sản phẩm khỏi giỏ hàng thành công';
header('Location: ../?act=cart');
?>
