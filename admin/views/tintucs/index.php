<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
    <!-- Include CSS files -->
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

        <div class="vertical-overlay"></div>

        <!-- Start main content here -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- Page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Danh sách tin tức</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách tin tức</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Danh Sách Tin Tức</h4>
                                        <a href="?act=tintucs/create" class="btn btn-soft-success material-shadow-none">
                                            <i class="ri-add-circle-line align-middle me-1"></i> Thêm Tin Tức
                                        </a>
                                    </div><!-- end card header -->
                                    <!-- Search form -->
                                    <form method="GET" action="">
                                        <input type="hidden" name="act" value="tintucs">
                                        <!-- Đảm bảo có tham số act -->
                                        <div class="input-group mb-3">
                                            <input type="text" name="keyword" class="form-control"
                                                placeholder="Tìm kiếm tin tức"
                                                value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
                                            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </form>
                                    <!-- End Search form -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-nowrap align-middle mb-0 table text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Ảnh</th>
                                                            <th scope="col">Tiêu Đề</th>
                                                            <th scope="col">Ngày Tạo</th>
                                                            <th scope="col">Trạng Thái</th>
                                                            <th scope="col">Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $stt = 1;
                                                        foreach ($tintucs as $tintuc): ?>
                                                            <tr>
                                                                <td><?php echo $stt++; ?></td>
                                                                <td>
                                                                    <img src="<?= BASE_URL . $tintuc['hinh_anh'] ?>" alt="" width="100px">
                                                                    <!-- <img src="./uploads/1731231382Screenshot 2024-09-25 175035.png" alt=""> -->
                                                                </td>
                                                                <td><?php echo $tintuc['tieu_de']; ?></td>
                                                                <td><?php echo $tintuc['ngay_tao']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($tintuc['trang_thai'] == 1) { ?>
                                                                        <span class="badge bg-success">Hiện thị</span>
                                                                    <?php
                                                                    } else { ?>
                                                                        <span class="badge bg-danger">Không hiện thị</span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="d-flex justify-content-center hstack gap-3 flex-wrap">
                                                                        <!-- Sửa -->
                                                                        <a href="?act=tintucs/edit&id=<?php echo $tintuc['id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-edit-2-line"></i>
                                                                        </a>

                                                                        <!-- Xóa -->
                                                                        <a href="?act=tintucs/delete&id=<?php echo $tintuc['id']; ?>"
                                                                            class="link-danger"
                                                                            onclick="return confirm('Bạn có chắc chắn xóa không?');">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div> <!-- end .h-100-->

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
                                Design & Develop by Themesbrand
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

    <!-- Include JS files -->
    <?php require_once "views/layouts/libs_js.php"; ?>

</body>

</html>