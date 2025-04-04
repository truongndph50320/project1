<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm  khuyến mãi | ProtechHub</title>
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
                                <h4 class="mb-sm-0">Quản lý khuyến mãi</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm khuyến mãi</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Khuyến Mãi</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=khuyenmais/create" method="POST"  >
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ten_khuyen_mai" class="form-label">Tên khuyến mãi</label>
                                                            <input type="text" class="form-control" id="ten_khuyen_mai"
                                                                name="ten_khuyen_mai" value="<?php echo $_SESSION['old_data']['ten_khuyen_mai'] ?? ''; ?>">
                                                                <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ten_khuyen_mai']) ? $_SESSION['errors']['ten_khuyen_mai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ma_khuyen_mai" class="form-label">Mã khuyến mãi</label>
                                                            <input type="text" class="form-control" id="ma_khuyen_mai"
                                                                name="ma_khuyen_mai" value="<?php echo $_SESSION['old_data']['ma_khuyen_mai'] ?? ''; ?>" >
                                                                <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ma_khuyen_mai']) ? $_SESSION['errors']['ma_khuyen_mai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_tri" class="form-label">Gía trị</label>
                                                            <input type="numberFomat" class="form-control" id="gia_tri"
                                                                name="gia_tri" value="<?php echo $_SESSION['old_data']['gia_tri'] ?? ''; ?>" >
                                                                <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['gia_tri']) ? $_SESSION['errors']['gia_tri'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="mo_ta" class="form-label">Mô tả</label>
                                                            <input type="text" class="form-control" id="mo_ta"
                                                                name="mo_ta" value="<?php echo $_SESSION['old_data']['mo_ta'] ?? ''; ?>">
                                                                <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                                                            <input type="date" class="form-control" id="ngay_bat_dau"
                                                                name="ngay_bat_dau"  value="<?php echo $_SESSION['old_data']['ngay_bat_dau'] ?? ''; ?>">
                                                                <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ngay_bat_dau']) ? $_SESSION['errors']['ngay_bat_dau'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                                                            <input type="date" class="form-control" id="ngay_ket_thuc"
                                                                name="ngay_ket_thuc" value="<?php echo $_SESSION['old_data']['ngay_ket_thuc'] ?? ''; ?>">
                                                                <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ngay_ket_thuc']) ? $_SESSION['errors']['ngay_ket_thuc'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="trang_thai" class="form-label">Trạng
                                                                thái</label>
                                                            <select class="form-select" id="trang_thai"
                                                                name="trang_thai" >
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1" <?php echo (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '1') ? 'selected' : ''; ?>>Hoạt động</option>
                                                                <option value="2" <?php echo (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '2') ? 'selected' : ''; ?>>Không hoạt động</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-danger">Thêm khuyến mãi</button>
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
                        </script> © ProtechHub.
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

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>
</body>

</html>