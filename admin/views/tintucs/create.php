<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm tin tức | PhoneStore</title>
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
                                <h4 class="mb-sm-0">Quản lý tin tức</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm tin tức</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Tin Tức</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Chỉnh sửa form để hỗ trợ tải ảnh -->
                                            <form action="?act=tintucs/create" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Ảnh</label>
                                                            <input type="file" class="form-control" name="hinh_anh" placeholder="Chọn file" value="<?php echo $_SESSION['old_data']['hinh_anh'] ?? ''; ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['hinh_anh']) ? $_SESSION['errors']['hinh_anh'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="tieu_de" class="form-label">Tiêu đề
                                                                </label>
                                                                <input type="text" class="form-control" id="tieu_de"
                                                                    name="tieu_de" value=" <?php echo $_SESSION['old_data']['tieu_de'] ?? ''; ?>">
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION['errors']['tieu_de']) ? $_SESSION['errors']['tieu_de'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="noi_dung" class="form-label">Nội dung</label>
                                                                <textarea class="form-control" id="noi_dung" name="noi_dung"
                                                                    rows="3"><?php echo $_SESSION['old_data']['noi_dung'] ?? ''; ?></textarea>
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="mb-3">
                                                                    <label for="ngay_tao" class="form-label">Ngày tạo</label>
                                                                    <input type="date" class="form-control" id="ngay_tao"
                                                                        name="ngay_tao" value="<?php echo $_SESSION['old_data']['ngay_tao'] ?? ''; ?>">
                                                                    <span class="text-danger">
                                                                        <?= !empty($_SESSION['errors']['ngay_tao']) ? $_SESSION['errors']['ngay_tao'] : '' ?>
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
                                                                        name="trang_thai">
                                                                        <option selected disabled>Chọn trạng thái</option>
                                                                        <option <?php echo (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '1') ? 'selected' : ''; ?> value="1">Hiện Thị</option>
                                                                        <option <?php echo (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '2') ? 'selected' : ''; ?> value="2">Không Hiện Thị</option>
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
                                                                    <button type="submit" class="btn btn-danger">Thêm tin
                                                                        tức</button>
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