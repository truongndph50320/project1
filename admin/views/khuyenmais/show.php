<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Chi tiết khuyến mãi | ProtechHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
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
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý khuyến mãi</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Chi tiết khuyến mãi</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Chi Tiết Khuyến Mãi</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Form hiển thị thông tin khuyến mãi -->
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ten_khuyen_mai" class="form-label">Tên khuyến mãi</label>
                                                            <input type="text" class="form-control" id="ten_khuyen_mai" name="ten_khuyen_mai" value="<?php echo $khuyenmai['ten_khuyen_mai'] ?? ''; ?>" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ma_khuyen_mai" class="form-label">Mã khuyến mãi</label>
                                                            <input type="text" class="form-control" id="ma_khuyen_mai" name="ma_khuyen_mai" value="<?php echo $khuyenmai['ma_khuyen_mai'] ?? ''; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_tri" class="form-label">Giá trị</label>
                                                            <input type="text" class="form-control" id="gia_tri" name="gia_tri" value="<?php echo $khuyenmai['gia_tri'] ?? ''; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ngay_bat_dau" class="form-label">Mô tả</label>
                                                            <input type="text" class="form-control" id="mo_ta" name="mo_ta" value="<?php echo $khuyenmai['mo_ta'] ?? ''; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                                                            <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" value="<?php echo $khuyenmai['ngay_bat_dau'] ?? ''; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ngay_bat_dau" class="form-label">Ngày kết thúc</label>
                                                            <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_bat_dau" value="<?php echo $khuyenmai['ngay_ket_thuc'] ?? ''; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="trang_thai" class="form-label">Trạng
                                                                    thái</label>
                                                                <input type="text" class="form-control" id="trang_thai"
                                                                    name="trang_thai"
                                                                    value="<?php echo $khuyenmai['trang_thai'] == 1 ? 'Hoạt động' : 'Ngừng hoạt động'; ?>"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <a href="?act=khuyenmais" class="btn btn-primary">Quay
                                                                    lại</a>
                                                            </div>
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

    <!-- JAVASCRIPT -->
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>