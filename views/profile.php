<?php
require_once "./views/layout/header.php";
?>

<div class="blog_page_section blog_nosidebar mt-60">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
               
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="blog_wrapper">
                    <div class="blog_header">
                        <h1 class="text-center">Thông Tin Người Dùng</h1>
                    </div>
                </div>

                <!-- Form hiển thị thông tin người dùng -->
                <form>
                    <div class="row">
                        <!-- Avatar section on the left -->
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <p><strong>Avatar</strong></p>
                                <img class="rounded-circle header-profile-user"
                                    src="<?php echo './' . $user['avatar']; ?>"
                                    alt="Avatar" width="220px" height="150px">
                            </div>
                        </div>

                        <!-- User info section on the right -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <p><strong>Tên người dùng:</strong>
                                    <?php echo $user['ten_nguoi_dung']; ?></p>
                            </div>

                            <div class="mb-3">
                                <p><strong>Họ và tên:</strong>
                                    <?php echo $user['ho_va_ten']; ?></p>
                            </div>

                            <div class="mb-3">
                                <p><strong>Email:</strong>
                                    <?php echo $user['email']; ?></p>
                            </div>

                            <div class="mb-3">
                                <p><strong>Số điện thoại:</strong>
                                    <?php echo $user['sdt']; ?></p>
                            </div>

                            <div class="mb-3">
                                <p><strong>Giới tính:</strong>
                                    <?php echo $user['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Update button aligned to the right -->
                   
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .blog_header h1 {
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 600;
    }

    .header-profile-user {
        border: 2px solid #ddd;
        padding: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-size: 16px;
        padding: 10px 20px;
    }

    .text-right {
        text-align: right;
    }

    .mt-60 {
        margin-top: 60px;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }
</style>

<?php
require_once "./views/layout/footer.php";
?>
</body>
</html>
