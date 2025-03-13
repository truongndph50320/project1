<?php
require_once "./views/layout/header.php";
?>

<div class="customer_login mt-60">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Login area -->
            <div class="col-lg-6 col-md-8">
                <div class="border rounded p-4 shadow">
                    <h2 class="text-center mb-4">Đăng ký</h2>

                    <form method="post">
                        <div class="mb-3">
                            <label for="ten_nguoi_dung" class="form-label">Tên người
                                dùng</label>
                            <input type="text" class="form-control" id="ten_nguoi_dung"
                                name="ten_nguoi_dung" value="<?php echo $_SESSION['old_data']['ten_nguoi_dung'] ?? ''; ?>">
                            <span class="text-danger">
                                <?= !empty($_SESSION['errors']['ten_nguoi_dung']) ? $_SESSION['errors']['ten_nguoi_dung'] : '' ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="ho_va_ten" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="ho_va_ten"
                                name="ho_va_ten" value="<?php echo $_SESSION['old_data']['ho_va_ten'] ?? ''; ?>">
                            <span class="text-danger">
                                <?= !empty($_SESSION['errors']['ho_va_ten']) ? $_SESSION['errors']['ho_va_ten'] : '' ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email"
                                name="email" value="<?php echo $_SESSION['old_data']['email'] ?? ''; ?>">
                            <span class="text-danger">
                                <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                            </span>
                        </div>


                        <div class="mb-3">
                            <label for="sdt" class="form-label">Số điện thoại</label>
                            <input type="text"
                                class="form-control <?= !empty($errors['sdt']) ? 'is-invalid' : '' ?>"
                                id="sdt" name="sdt"
                                value="<?= htmlspecialchars($data['sdt'] ?? '') ?>">
                                <span class="text-danger">
                                <?= !empty($_SESSION['errors']['sdt']) ? $_SESSION['errors']['sdt'] : '' ?>
                            </span>
                        </div>


                        <div class="mb-3">
                            <label for="mat_khau" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="mat_khau"
                                name="mat_khau" value="<?php echo $_SESSION['old_data']['mat_khau'] ?? ''; ?>">
                            <span class="text-danger">
                                <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>
                            </span>
                        </div>
                        

                        <div class="mb-3">
                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                            <select class="form-select" id="gioi_tinh" name="gioi_tinh">
                                <option selected disabled>Chọn giới tính</option>
                                <option value="1" <?php echo (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '1') ? 'selected' : ''; ?>>Nam</option>
                                <option value="2" <?php echo (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '2') ? 'selected' : ''; ?>>Nữ</option>
                            </select>
                            <span class="text-danger">
                                <?= !empty($_SESSION['errors']['gioi_tinh']) ? $_SESSION['errors']['gioi_tinh'] : '' ?>
                            </span>
                        </div>
                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="text-danger text-center mb-3">SAI TÀI KHOẢN HOẶC MẬT KHẨU</div>
                            <?php unset($_SESSION['error']); ?>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Đăng ký</button>
                        <div class="text-center">

                            <a href="?act=login" class="register-link">Đăng nhập</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
</div>
<br><br><br><br>
<?php
require_once "./views/layout/footer.php";
?>
</body>

</html>