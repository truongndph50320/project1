<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khuyến mãi</title>
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
                                <h4 class="mb-sm-0">Quản lý khuyến mãi</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách khuyến mãi</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh Sách Khuyến Mãi</h4>
                                        <a href="?act=khuyenmais/create"
                                            class="btn btn-soft-success material-shadow-none">
                                            <i class="ri-add-circle-line align-middle me-1"></i> Thêm Khuyến Mãi
                                        </a>
                                    </div><!-- end card header -->

                                    <!-- Thêm form tìm kiếm -->
                                    <form method="GET" action="">
                                        <input type="hidden" name="act" value="khuyenmais">
                                        <!-- Đảm bảo có tham số act -->
                                        <div class="input-group mb-3">
                                            <input type="text" name="keyword" class="form-control"
                                                placeholder="Tìm kiếm khuyến mãi"
                                                value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
                                            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-nowrap align-middle mb-0 table text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Tên giảm giá</th>
                                                            <th scope="col">Mã giảm giá</th>
                                                            <th scope="col">Gía trị </th>
                                                            <th scope="col">Trạng Thái</th>
                                                            <th scope="col">Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $stt = 1;
                                                        foreach ($khuyenmais as $khuyenmai): ?>
                                                            <tr>
                                                                <td><?php echo $stt++; ?></td>
                                                                <td><?php echo $khuyenmai['ten_khuyen_mai']; ?></td>
                                                                <td><?php echo $khuyenmai['ma_khuyen_mai']; ?></td>
                                                                <td><?php echo $khuyenmai['gia_tri'] . 'đ'; ?></td>


                                                                <td>
                                                                    <?php
                                                                    if ($khuyenmai['trang_thai'] == 1) { ?>
                                                                        <span class="badge bg-success">Hoạt động</span>
                                                                    <?php
                                                                    } else { ?>
                                                                        <span class="badge bg-danger">Không hoạt động</span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="d-flex justify-content-center hstack gap-3 flex-wrap">
                                                                        <a href="?act=khuyenmais/show&id=<?php echo $khuyenmai['id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-eye-line"></i>
                                                                        </a>
                                                                        <!-- Sửa -->
                                                                        <a href="?act=khuyenmais/edit&id=<?php echo $khuyenmai['id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-edit-2-line"></i>
                                                                        </a>

                                                                        <!-- Xóa -->
                                                                        <a href="?act=khuyenmais/delete&id=<?php echo $khuyenmai['id']; ?>"
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
                            </script> © Velzon.
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