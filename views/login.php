<?php
require_once "./views/layout/header.php";
?>
<div class="customer_login mt-60">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Login area -->
            <div class="col-lg-6 col-md-8">
                <div class="border rounded p-4 shadow">
                    <h2 class="text-center mb-4">Đăng nhập</h2>
                    
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['message']) . '</div>';
                        unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị để tránh lặp lại
                    }
                    ?>

                    <?php if (!empty($_SESSION['errors'])): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($_SESSION['errors'] as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="ten_nguoi_dung" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="ten_nguoi_dung"
                                name="ten_nguoi_dung" value="<?php echo $_SESSION['old_data']['ten_nguoi_dung'] ?? ''; ?>">
                            <span class="text-danger">
                                <?= !empty($_SESSION['errors']['ten_nguoi_dung']) ? $_SESSION['errors']['ten_nguoi_dung'] : '' ?>
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
                        <!-- <?php if (isset($_SESSION['error'])) { ?>
                            <div class="text-danger text-center mb-3">SAI TÀI KHOẢN HOẶC MẬT KHẨU</div>
                            <?php unset($_SESSION['error']); ?>
                        <?php } ?> -->
                        <button type="submit" class="btn btn-primary w-100 mb-3">Đăng nhập</button>
                        <div class="text-center">
                            <p class="mb-0">Bạn chưa có tài khoản?
                                <a href="?act=register" class="register-link">Đăng ký</a>
                            </p>
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