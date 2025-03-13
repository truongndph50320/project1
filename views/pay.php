<?php
if (isset($_SESSION['vai_tro']) && $_SESSION['vai_tro'] === 0) {
    header('Location: admin?act=loginsuccess');
}
require_once 'layout/header.php';
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php BASE_URL ?>">Trang chủ</a></li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section mt-60">
    <div class="container">

        <div class="col-12">
            <div class="user-actions">


            </div>
            <div class="user-actions">
                <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Thêm mã giảm giá?
                    <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon"
                        aria-expanded="true">Click Nhập Mã Giảm Gía</a>

                </h3>
                <div id="checkout_coupon" class="collapse" data-bs-parent="#accordion">
                    <div class="checkout_info">
                        <form action="#">
                            <input placeholder="Coupon code" type="text">
                            <button type="submit">Áp dụng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?= '?act=dat-hang' ?>" method="POST">
            <div class="checkout_form">
                <div class="row">
                    <!-- Left side: User Information -->
                    <div class="col-lg-6 col-md-6">
                        <h3>Thông tin người nhận</h3>
                        <div class="row">
                            <div class="col-lg-12 mb-20">
                                <label for="ten_nguoi_nhan" class="required">Tên người nhận<span>*</span></label>
                                <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" placeholder="Tên người nhận" required value="<?php echo $user['ten_nguoi_dung']; ?>" />
                            </div>
                            <div class="col-lg-12 mb-20">
                                <label for="email_nguoi_nhan" class="required">Email<span>*</span></label>
                                <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" placeholder="Email người nhận" required value="<?php echo $user['email']; ?>" />
                            </div>
                            <div class="col-lg-12 mb-20">
                                <label for="sdt_nguoi_nhan" class="required">Số điện thoại<span>*</span></label>
                                <input type="phone" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" placeholder="Số điện thoại" required value="<?php echo $user['sdt']; ?>" />
                            </div>
                            <div class="col-lg-12 mb-20">
                                <label for="dia_chi_nguoi_nhan" class="required">Địa chỉ <span>*</span></label>
                                <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" placeholder="Địa chỉ" required value="<?php echo $user['dia_chi']; ?>"x     />
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="ghi_chu">Ghi chú</label>
                                    <textarea id="ghi_chu" name="ghi_chu" placeholder="Ghi chú đơn hàng của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right side: Order Information -->
                    <div class="col-lg-6 col-md-6">
                        <h3>Thông tin sản phẩm</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalAmount = 0;
                                    foreach ($cart_item as $sanpham):
                                        $itemTotal = $sanpham['so_luong_gio_hang'] * $sanpham['price'];
                                        $totalAmount += $itemTotal;
                                    ?>
                                        <tr>
                                            <td><?= $sanpham['name'] ?> <strong> × <?= $sanpham['so_luong_gio_hang'] ?></strong></td>
                                            <td><?= number_format($itemTotal) ?>đ</td>
                                        </tr>   
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Tổng tiền sản phẩm</strong></td>
                                        <td><strong><?= number_format($totalAmount) ?>đ</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Phí vận chuyển</th>
                                        <td><strong>30,000 đ</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng đơn hàng</th>
                                        <td><strong><?= number_format($totalAmount + 30000) . 'đ' ?><strong></td> 
                                    </tr>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment" type="radio" name="phuong_thuc_thanh_toan_id" value="1" />
                                <label for="payment" data-bs-toggle="collapse" data-bs-target="#method"
                                    aria-controls="method">Thanh toán khi nhận hàng</label>


                            </div>
                            <div class="panel-default">
                                <input id="payment_defult" type="radio" name="phuong_thuc_thanh_toan_id" value="2" />
                                <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult"
                                    aria-controls="collapsedefult">Thanh toán online <img src="assets/img/icon/papyel.png"
                                        alt=""></label>

                                <div id="collapsedefult" class="collapse one" data-bs-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Khách hàng cần thanh toán online.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <button type="submit" onclick="alert('Đặt hàng thành công!')">Tiến hành đặt hàng</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
</div>
<!--Checkout page section end-->


<?php
require_once 'layout/footer.php';

?>