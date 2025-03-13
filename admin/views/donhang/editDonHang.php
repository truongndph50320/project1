<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Sửa đơn hàng| Protech Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
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
                                <h4 class="mb-sm-0">Quản lý danh mục</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sửa danh mục</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Sửa thông tin đơn hàng: <?= $donHang['ma_don_hang'] ?></h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Chỉnh sửa form để hỗ trợ tải ảnh -->
                                            <form action="?act=sua-don-hang&id_don_hang=<?php echo $donHang['id']; ?>"
                                                method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ten_nguoi_nhan" class="form-label">Tên người nhận</label>
                                                            <input type="text" class="form-control" id="ten_nguoi_nhan"
                                                                name="ten_nguoi_nhan"
                                                                value="<?php echo $donHang['ten_nguoi_nhan']; ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ten_nguoi_nhan']) ? $_SESSION['errors']['ten_nguoi_nhan'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="email_nguoi_nhan" class="form-label">Email</label>
                                                            <input type="text" class="form-control" id="email_nguoi_nhan"
                                                                name="email_nguoi_nhan"
                                                                value="<?php echo $donHang['email_nguoi_nhan']; ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['email_nguoi_nhan']) ? $_SESSION['errors']['email_nguoi_nhan'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="sdt_nguoi_nhan" class="form-label">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="sdt_nguoi_nhan"
                                                                name="sdt_nguoi_nhan"
                                                                value="<?php echo $donHang['sdt_nguoi_nhan']; ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['sdt_nguoi_nhan']) ? $_SESSION['errors']['sdt_nguoi_nhan'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="dia_chi_nguoi_nhan"
                                                                name="dia_chi_nguoi_nhan"
                                                                value="<?php echo $donHang['dia_chi_nguoi_nhan']; ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['dia_chi_nguoi_nhan']) ? $_SESSION['errors']['dia_chi_nguoi_nhan'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ghi_chu" class="form-label">Ghi chú</label>
                                                            <input type="text" class="form-control" id="ghi_chu"
                                                                name="ghi_chu"
                                                                value="<?php echo $donHang['ghi_chu']; ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ghi_chu']) ? $_SESSION['errors']['ghi_chu'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="inputStatus" class="form-label">Trạng thái đơn hàng</label>
                                                            <select name="trang_thai_don_hang_id" id="inputStatus" class="form-control custom-select">
                                                                <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                                                                    <option
                                                                        <?php
                                                                
                                                                        if ($donHang['trang_thai_don_hang_id']  > $trangThai['id']
                                                                         || $donHang['trang_thai_don_hang_id'] == 5
                                                                         || $donHang['trang_thai_don_hang_id'] == 6
                                                                         || $donHang['trang_thai_don_hang_id'] == 7
                                                                         ) {
                                                                            echo 'disabled';
                                                                        }

                                                                        ?>
                                                                        <?= $trangThai['id']  == $donHang['trang_thai_don_hang_id'] ? 'selected' : '' ?>
                                                                        value="<?= $trangThai['id'] ?>">
                                                                        <?= $trangThai['ten_trang_thai'] ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-danger">Cập nhật
                                                                    đơn hàng
                                                                </button>
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
                        </script> © PhoneStore.
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
</body>

</html>