<?php
if (isset($_SESSION['vai_tro']) && $_SESSION['vai_tro'] === 0) {
    header('Location: admin?act=loginsuccess');
}
require_once 'layout/header.php';
?>

<br>
<div class="cart-main-wrapper section-padding">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <!-- Thông tin sản phẩm đơn hàng -->
                <div class="col-lg-8">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color: #1E90FF; text-align:center;">
                                    <th colspan="5">Thông tin sản phẩm</th>
                                </tr>
                            </thead>
                            <tr class="text-center">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            <tbody class="text-center">
                                <?php if (!empty($orderItems)): ?>
                                    <?php foreach ($orderItems as $item): ?>
                                        <tr>
                                            <td><img src="admin/<?= $item['image_url'] ?>" alt="Product Image" width="100px;"></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= number_format($item['price'], 0, '.', ',') ?>đ</td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td><?= number_format($item['thanh_tien'], 0, '.', ',') ?>đ</td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Không có sản phẩm trong đơn hàng này.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <!-- Thông tin đơn hàng -->
                <div class="col-lg-4">
                    <div class="cart-table table-responsive">
                    <table class="table table-bordered">
    <thead>
        <tr style="background-color: #1E90FF; text-align:center;">
            <th colspan="2">Thông tin đơn hàng</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <td style="text-align: left;">Mã đơn hàng: <?php echo $thong_tins[0]['ma_don_hang']; ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Ngày đặt: <?php echo $thong_tins[0]['ngay_dat']; ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Tên người nhận: <?php echo $thong_tins[0]['ten_nguoi_nhan']; ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Email người nhận: <?php echo $thong_tins[0]['email_nguoi_nhan']; ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Số điện thoại người nhận: <?php echo $thong_tins[0]['sdt_nguoi_nhan']; ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Địa chỉ người nhận: <?php echo $thong_tins[0]['dia_chi_nguoi_nhan']; ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Ghi chú: <?php echo $thong_tins[0]['ghi_chu']; ?></td>
        </tr>
        <tr>
            <td style="text-align: left;">Trạng thái: <?php echo $thong_tins[0]['ten_trang_thai']; ?></td>
        </tr>
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'layout/footer.php';

?>
<style>

</style>