<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh sách đơn hàng</title>
    <!-- Include CSS files -->
    <?php require_once "views/layouts/libs_css.php"; ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Đơn hàng: <?= $donHang['ma_don_hang'] ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    // Define color based on order status
                                    $backgroundColor = '#6C757D'; // Default dark grey
                                    $textColor = '#ffffff';
                                    switch ($donHang['trang_thai_don_hang_id']) {
                                        case 1:
                                            $backgroundColor = '#FFB300';
                                            break;
                                        case 2:
                                            $backgroundColor = '#17A2B8';
                                            break;
                                        case 3:
                                            $backgroundColor = '#007BFF';
                                            break;
                                        case 4:
                                            $backgroundColor = '#343A40';
                                            break;
                                        case 5:
                                            $backgroundColor = '#28A745';
                                            break;
                                        case 6:
                                            $backgroundColor = '#DC3545';
                                            break;
                                    }
                                    ?>

                                    <!-- Displaying the alert with the dynamic color -->
                                    <div class="alert" style="background-color: <?= $backgroundColor ?>; color: <?= $textColor ?>; font-size: 18px; border-radius: 8px; padding: 15px;" role="alert">
                                        <p><strong>Trạng thái:</strong> <?= $donHang['ten_trang_thai']; ?></p>
                                    </div>

                                    <!-- Main content -->
                                    <div class="invoice p-4 mb-4" style="border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                                        <!-- title row -->
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <h4>
                                                <i class="fas fa-laptop"></i> Shop bán Laptop Protech <span style="color: red;">Hub</span>
                                                </h4>
                                                <h5 class="float-end">
                                                    Ngày đặt:
                                                    <?php
                                                    $originalDate = $donHang['ngay_dat'];
                                                    $dateTime = new DateTime($originalDate);
                                                    echo $dateTime->format('d-m-Y H:i:s');
                                                    ?>
                                                </h5>
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <!-- First column for Customer's Info -->
                                            <div class="col-sm-4 invoice-col">
                                                <strong>Thông tin người đặt</strong>
                                                <address>
                                                    <strong><?= htmlspecialchars($donHang['ho_va_ten']) ?></strong><br>
                                                    Phone: <?= htmlspecialchars($donHang['sdt']) ?><br>
                                                    Email: <?= htmlspecialchars($donHang['email']) ?>
                                                </address>
                                            </div>

                                            <!-- Second column for Receiver's Info -->
                                            <div class="col-sm-4 invoice-col">
                                                <strong>Thông tin người nhận</strong>
                                                <address>
                                                    <strong><?= htmlspecialchars($donHang['ten_nguoi_nhan']) ?></strong><br>
                                                    Email: <?= htmlspecialchars($donHang['email_nguoi_nhan']) ?><br>
                                                    Phone: <?= htmlspecialchars($donHang['sdt_nguoi_nhan']) ?><br>
                                                    Địa chỉ: <?= htmlspecialchars($donHang['dia_chi_nguoi_nhan']) ?>
                                                </address>
                                            </div>

                                            <!-- Third column for Invoice Info -->
                                            <div class="col-sm-4 invoice-col">
                                                <strong>Thông tin đơn hàng</strong>
                                                <address>
                                                    <strong><?= htmlspecialchars($donHang['ma_don_hang']) ?></strong><br>
                                                    Tổng tiền: <?= htmlspecialchars(number_format($donHang['tong_tien'], 0, ',', '.')) ?> VND<br>
                                                    Ghi chú: <?= htmlspecialchars($donHang['ghi_chu']) ?><br>
                                                  
                                                    Phương thức thanh toán: <?= htmlspecialchars($donHang['ten_phuong_thuc']) ?> <br>
                                                    Trạng thái thanh toán: <?= htmlspecialchars($donHang['ten_thanh_toan']) ?><br>
                                                </address>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped table-bordered" style="border-radius: 8px; overflow: hidden;">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Đơn giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($sanPhamDonHang as $index => $sanPham) : ?>
                                                        <tr>
                                                            <td><?= $index + 1 ?></td>
                                                            <td><?= $sanPham['name'] ?></td>
                                                            <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?> VND</td>
                                                            <td><?= $sanPham['so_luong'] ?></td>
                                                            <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?> VND</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="table-responsive">
                                                <table class="table" style="font-size: 16px;">
                                                    <tr>
                                                        <th style="width:50%">Thành tiền:</th>
                                                        <td>
                                                            <?php
                                                            $tong_tien = 0;
                                                            foreach ($sanPhamDonHang as $sanPham) {
                                                                $tong_tien += $sanPham['thanh_tien'];
                                                            }
                                                            echo number_format($tong_tien, 0, ',', '.') . " VND";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Vận chuyển:</th>
                                                        <td>30.000 VND</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tổng tiền:</th>
                                                        <td>
                                                            <?php echo number_format($tong_tien + 30000, 0, ',', '.') . " VND"; ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->

                        <!-- Back Button -->
                        <div class="row mb-3">
                            <div class="col text-end">
                                <button onclick="window.history.back();" class="btn btn-primary" style="border-radius: 8px;">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </button>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <footer class="footer" style="background-color: #f1f1f1; padding: 10px 0;">
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

    </div>

    <!-- Start back-to-top -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!-- End back-to-top -->

    <!-- Preloader -->
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