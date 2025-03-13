<?php
if (isset($_SESSION['vai_tro']) && $_SESSION['vai_tro'] === 0) {
    header('Location: admin?act=loginsuccess');
}
require_once 'layout/header.php';
?>


<section class="order">
    <marquee behavior="">Đặt hàng thành công cảm ơn quý khách</marquee>
    <div class="container mt-5">

        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $displayedOrderIds = []; // Mảng để lưu các mã đơn hàng đã hiển thị
                if (!empty($viewEnds) && is_array($viewEnds)):
                    foreach ($viewEnds as $end):
                        // Kiểm tra xem mã đơn hàng đã được hiển thị chưa
                        if (in_array($end['ma_don_hang'], $displayedOrderIds)) {
                            continue; // Nếu đã hiển thị thì bỏ qua
                        }
                        // Thêm mã đơn hàng vào mảng đã hiển thị
                        $displayedOrderIds[] = $end['ma_don_hang'];
                ?>
                        <tr>
                            <td><?= isset($end['ma_don_hang']) ? $end['ma_don_hang'] : 'N/A' ?></td>
                            <td><?= isset($end['ngay_dat']) ? $end['ngay_dat'] : 'N/A' ?></td>
                            <td><?= isset($end['tong_tien']) ? number_format($end['tong_tien']) . 'đ' : 'N/A' ?></td>
                            <td>
                                <?= isset($end['phuong_thuc_thanh_toan_id'])
                                    ? ($end['phuong_thuc_thanh_toan_id'] == 1
                                        ? 'Thanh toán khi nhận hàng'
                                        : ($end['phuong_thuc_thanh_toan_id'] == 2
                                            ? 'Chuyển khoản'
                                            : 'Phương thức khác'))
                                    : 'N/A' ?>
                            </td>
                            
                            <td>
                                <?= isset($end['trang_thai_don_hang_id'])
                                    ? ($end['trang_thai_don_hang_id'] == 1
                                        ? 'Chờ xác nhận'
                                        : ($end['trang_thai_don_hang_id'] == 2
                                            ? 'Đã xác nhận'
                                            : ($end['trang_thai_don_hang_id'] == 3
                                                ? 'Đang giao'
                                                : ($end['trang_thai_don_hang_id'] == 4
                                                    ? 'Đã giao'
                                                    : ($end['trang_thai_don_hang_id'] == 5
                                                        ? 'Đã nhận hàng'
                                                        : ($end['trang_thai_don_hang_id'] == 6
                                                            ? 'Đã hủy'
                                                            : 'Đã hủy'))))))
                                    : 'N/A' ?>
                            </td>

                            <td>
                                <a href="?act=chi-tiet-don-hang&id=<?= $end['don_hang_id'] ?>" class="btn btn-primary">
                                    Chi tiết đơn hàng
                                </a>

                                <?php if ($end['trang_thai_don_hang_id'] == 1): ?>
                                    <a href="?act=huy-don-hang&id=<?= $end['don_hang_id'] ?>" class="btn btn-danger"
                                        onclick="return confirm('Xác nhận hủy đơn hàng.')">
                                        Hủy đơn
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Không có đơn hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
<br> <br><br><br> <br> <br> <br>
    <style>
         /* Kiểu dáng cho tiêu đề */
         h6 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
            font-weight: bold;
            text-align: center;
        }

        /* Khung container cho từng nhóm email */
        .email-form {
            border: 1px solid #ddd;
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            max-width: 500px;
            margin: 1.5rem auto;
        }

        /* Kiểu chữ cho thông tin */
        .email-form input[type="hidden"] {
            display: none;
        }

        /* Kiểu dáng cho nút gửi email */
        .email-form button {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .email-form button:hover {
            background-color: #0056b3;
        }

        /* Căn chỉnh trung tâm cho toàn bộ phần form */
        .email-form {
            text-align: center;
        }

        /* Thêm hiệu ứng hover cho khung form */
        .email-form:hover {
            border-color: #007bff;
        }

        /* Style tổng thể */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    </style>
    </style>
</section>

<?php
require_once 'layout/footer.php';

?>
<style>
    
</style>