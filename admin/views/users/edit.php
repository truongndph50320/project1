<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Sửa người dùng | Protech Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý người dùng</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sửa người dùng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Sửa Người Dùng</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Chỉnh sửa form để hỗ trợ tải ảnh -->
                                            <form action="?act=users/edit&id=<?php echo $user['id']; ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ten_nguoi_dung" class="form-label">Tên người
                                                                dùng</label>
                                                            <input type="text" class="form-control" id="ten_nguoi_dung"
                                                                name="ten_nguoi_dung"
                                                                value="<?php echo $user['ten_nguoi_dung']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ho_va_ten" class="form-label">Họ và tên</label>
                                                            <input type="text" class="form-control" id="ho_va_ten"
                                                                name="ho_va_ten"
                                                                value="<?php echo $user['ho_va_ten']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="<?php echo $user['email']; ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="sdt" class="form-label">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="sdt" name="sdt"
                                                                value="<?php echo $user['sdt']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="dia_chi" class="form-label">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="dia_chi"
                                                                name="dia_chi" value="<?php echo $user['dia_chi']; ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="mat_khau" class="form-label">Mật khẩu</label>
                                                            <input type="password" class="form-control" id="mat_khau"
                                                                name="mat_khau"
                                                                placeholder="Nhập mật khẩu mới (nếu thay đổi)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                                            <input type="date" class="form-control" id="ngay_sinh"
                                                                name="ngay_sinh"
                                                                value="<?php echo $user['ngay_sinh']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                                                            <select class="form-select" id="gioi_tinh" name="gioi_tinh"
                                                                required>
                                                                <option
                                                                    <?php echo ($user['gioi_tinh'] == '1') ? 'selected' : ''; ?>
                                                                    value="1">Nam</option>
                                                                <option
                                                                    <?php echo ($user['gioi_tinh'] == '0') ? 'selected' : ''; ?>
                                                                    value="0">Nữ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="avatar" class="form-label">Avatar</label>
                                                            <input type="file" class="form-control" id="avatar"
                                                                name="avatar" accept="image/*">
                                                            <p class="text-muted">Chọn ảnh mới nếu muốn thay đổi</p>
                                                            <?php if ($user['avatar']): ?>
                                                                <div>
                                                                    <p>Ảnh hiện tại:</p>
                                                                    <img src="<?php echo $user['avatar']; ?>"
                                                                        alt="Current Avatar" style="max-width: 150px;">
                                                                </div>
                                                                <!-- Trường ẩn để giữ ảnh cũ -->
                                                                <input type="hidden" name="current_avatar"
                                                                    value="<?php echo $user['avatar']; ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="vai_tro" class="form-label">Vai trò</label>
                                                            <select class="form-select" id="vai_tro" name="vai_tro"
                                                                required>
                                                                <option
                                                                    <?php echo ($user['vai_tro'] == '0') ? 'selected' : ''; ?>
                                                                    value="0">Admin</option>
                                                                <option
                                                                    <?php echo ($user['vai_tro'] == '1') ? 'selected' : ''; ?>
                                                                    value="1">User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="trang_thai" class="form-label">Trạng
                                                                thái</label>
                                                            <select class="form-select" id="trang_thai"
                                                                name="trang_thai" required>
                                                                <option
                                                                    <?php echo ($user['trang_thai'] == '1') ? 'selected' : ''; ?>
                                                                    value="1">Hoạt động</option>
                                                                <option
                                                                    <?php echo ($user['trang_thai'] == '0') ? 'selected' : ''; ?>
                                                                    value="0">Ngừng hoạt động</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-danger">Cập nhật người
                                                                dùng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end .h-100 -->
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Protech Hub.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by YourName
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>
    <?php if (isset($_SESSION['message'])): ?>
        <script>
            Swal.fire({
                title: '<?php echo $_SESSION['message']['title']; ?>',
                text: '<?php echo $_SESSION['message']['text']; ?>',
                icon: '<?php echo $_SESSION['message']['icon']; ?>',
            });
            <?php unset($_SESSION['message']); ?>
        </script>
    <?php endif; ?>
</body>

</html>