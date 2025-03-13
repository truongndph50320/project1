<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
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
                                <h4 class="mb-sm-0">Danh sách đơn hàng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh Sách Đơn Hàng</h4>

                                    </div><!-- end card header -->
                                    <!-- Search form -->
                                    <form method="GET" action="">
                                        <input type="hidden" name="act" value="don-hang">
                                        <!-- Đảm bảo có tham số act -->
                                        <div class="input-group mb-3">
                                            <input type="text" name="keyword" class="form-control"
                                                placeholder="Tìm kiếm đơn hàng"
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
                                                            <th scope="col">Mã đơn hàng</th>
                                                            <th scope="col">Tên người nhận</th>
                                                            <th scope="col">Ngày đặt</th>
                                                            <th scope="col">Phương thức thanh toán</th>
                                                            <th scope="col">Trạng Thái đơn hàng</th>
                                                            <th scope="col">Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        foreach ($listDonHang as $index => $donHang): ?>
                                                            <tr>
                                                                <td><?php echo $index + 1 ?></td>
                                                                <td><?php echo $donHang['ma_don_hang']; ?></td>
                                                                <td><?php echo $donHang['ten_nguoi_nhan']; ?></td>
                                                                <td><?php echo $donHang['ngay_dat']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    switch ($donHang['phuong_thuc_thanh_toan_id']) {
                                                                        case 1:
                                                                            echo 'Thanh toán khi nhận hàng';
                                                                            break;
                                                                        case 2:
                                                                            echo 'Thanh toán VNPAY';
                                                                            break;
                                                                        
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    // Mảng ánh xạ trạng thái với các màu khác nhau
                                                                    $trang_thai_colors = [
                                                                        'Chờ xác nhận' => 'btn-warning',
                                                                        'Đã xác nhận' => 'btn-info',
                                                                        'Đang giao' => 'btn-primary',
                                                                        'Đã giao' => 'btn-secondary',
                                                                        'Giao hàng thành công' => 'btn-success',
                                                                        'Giao hàng thất bại' => 'btn-danger',
                                                                        'Đã hủy' => 'btn-dark'
                                                                    ];

                                                                    // Lấy tên trạng thái từ cơ sở dữ liệu
                                                                    $ten_trang_thai = $donHang['ten_trang_thai'];
                                                                    $color_class = isset($trang_thai_colors[$ten_trang_thai]) ? $trang_thai_colors[$ten_trang_thai] : 'btn-secondary';
                                                                    ?>

                                                                    <button class="btn <?php echo $color_class; ?>">
                                                                        <?php echo $ten_trang_thai; ?>
                                                                    </button>
                                                                </td>

                                                                <td>

                                                                    <div
                                                                        class="d-flex justify-content-center hstack gap-3 flex-wrap">
                                                                        <!-- Show -->
                                                                        <a href="?act=chi-tiet-don-hang&id_don_hang=<?php echo $donHang['id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-eye-line"></i>
                                                                        </a>
                                                                        <!-- Sửa -->
                                                                        <a href="?act=form-sua-don-hang&id_don_hang=<?php echo $donHang['id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-edit-2-line"></i>
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