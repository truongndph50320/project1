<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Protech Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CSS -->
    <?php require_once "layouts/libs_css.php"; ?>
</head>
<style>
    /* Style for the card header to use flexbox for proper alignment */
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
    }

    /* Style for the date picker to align it to the right and make it look clean */
    #datePicker {
        margin-left: auto;
        /* Align to the right */
        padding: 8px 12px;
        font-size: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        background-color: transparent;
        /* Make background transparent */
        color: #495057;
        /* Dark text color for readability */
        width: auto;
        transition: all 0.3s ease;
        /* Smooth transition on focus */
    }

    /* Add hover effect and focus state for date picker */
    #datePicker:hover,
    #datePicker:focus {
        border-color: #007bff;
        /* Blue border on hover/focus */
        outline: none;
        /* Remove default outline */
        background-color: #f1f1f1;
        /* Slight background change on hover/focus */
    }

    /* Additional styling for the card body */
    .card-body {
        padding: 20px;
    }

    /* Style for the total revenue section */
    .text-center h5 {
        font-size: 20px;
        font-weight: bold;
        color: #343a40;
    }

    /* Style for the h6 in the card header to make it stand out */
    .card-header h6 {
        font-size: 16px;
        /* Larger font size */
        font-weight: bold;
        /* Make it bold */
        margin: 0;
        /* Remove default margin */
        padding-right: 10px;
        /* Add some padding to the right */
    }
</style>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "layouts/header.php";
        require_once "layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay -->
        <div class="vertical-overlay"></div>

        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                                                <p class="text-muted mb-0">Here's what's happening with your store
                                                    today.</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <form action="javascript:void(0);">
                                                    <div class="row g-3 mb-0 align-items-center">
                                                        <div class="col-auto">
                                                            <button type="button"
                                                                class="btn btn-soft-success material-shadow-none">
                                                                <i class="ri-add-circle-line align-middle me-1"></i> Add
                                                                Product
                                                            </button>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button"
                                                                class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn">
                                                                <i class="ri-pulse-line"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            TỔNG DOANH THU</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value"
                                                                data-target="<?php echo $doanhThu; ?>">0</span> ₫
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">THỐNG KÊ ĐƠN
                                                            HÀNG</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            SỐ LƯỢNG ĐƠN HÀNG</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value"
                                                                data-target="<?php echo $donHangs; ?>">0 </span>
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">THỐNG KÊ ĐƠN
                                                            HÀNG</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            TỔNG KHÁCH HÀNG</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value"
                                                                data-target="<?php echo $khachHangs; ?>">0</span>
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">DANH SÁCH KHÁCH
                                                            HÀNG</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p
                                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                            SỐ LƯỢNG SẢN PHẨM</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value"
                                                                data-target="<?php echo $tongSoSanPham; ?>">0</span>
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">XEM</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                            <i class="bx bx-wallet text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Biểu đồ doanh thu theo ngày và trạng thái đơn hàng -->
                                    <div class="row">
                                        <!-- Biểu đồ doanh thu theo ngày -->
                                        <div class="col-lg-8">
                                            <div class="card shadow mb-4">
                                                <div class="card-header bg-secondary text-white">
                                                    <h6 class="m-0 fw-bold">Biểu đồ doanh thu</h6>
                                                    <!-- Thêm ô chọn ngày -->
                                                    <input type="date" id="datePicker">
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="revenue-chart" height="289"></canvas>
                                                    <div class="text-center mt-3">
                                                        <h5>Tổng doanh thu: <span class="text-success">
                                                                <?= number_format($doanhThu, 0, ',', '.') ?> ₫
                                                            </span></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                // Chuyển dữ liệu PHP sang JavaScript
                                                const doanhThuLabels =
                                                    <?= json_encode(array_column($doanhThuTheoNgay, 'ngay')); ?>;
                                                const doanhThuData =
                                                    <?= json_encode(array_column($doanhThuTheoNgay, 'doanh_thu')); ?>;
                                                const doanhThu = <?= $doanhThu; ?>;
                                                const doanhThuTheoNgay =
                                                    <?= json_encode($doanhThuTheoNgay); ?>; // Lưu trữ tất cả dữ liệu doanh thu theo ngày

                                                // Vẽ biểu đồ với Chart.js
                                                const ctx = document.getElementById('revenue-chart').getContext('2d');
                                                const revenueChart = new Chart(ctx, {
                                                    type: 'bar',
                                                    data: {
                                                        labels: doanhThuLabels, // Các ngày
                                                        datasets: [{
                                                            label: 'Doanh thu theo ngày (₫)',
                                                            data: doanhThuData, // Doanh thu
                                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                            borderColor: 'rgba(75, 192, 192, 1)',
                                                            borderWidth: 2
                                                        }]
                                                    },
                                                    options: {
                                                        responsive: true,
                                                        plugins: {
                                                            legend: {
                                                                position: 'top',
                                                            },
                                                            title: {
                                                                display: true,
                                                                text: 'Biểu đồ doanh thu theo ngày'
                                                            }
                                                        },
                                                        scales: {
                                                            y: {
                                                                beginAtZero: true
                                                            }
                                                        }
                                                    }
                                                });

                                                // Lắng nghe sự kiện chọn ngày
                                                document.getElementById('datePicker').addEventListener('change', function(
                                                    event) {
                                                    const selectedDate = event.target.value;

                                                    // Lọc dữ liệu doanh thu theo ngày đã chọn
                                                    const filteredData = doanhThuTheoNgay.filter(item => item
                                                        .ngay === selectedDate);

                                                    if (filteredData.length > 0) {
                                                        // Cập nhật biểu đồ với dữ liệu doanh thu của ngày đã chọn
                                                        revenueChart.data.labels = [selectedDate];
                                                        revenueChart.data.datasets[0].data = [filteredData[0]
                                                            .doanh_thu
                                                        ];
                                                        revenueChart.update();
                                                    } else {
                                                        // Nếu không có dữ liệu cho ngày đó, hiển thị thông báo "Không có dữ liệu"
                                                        revenueChart.data.labels = ['Ngày không có dữ liệu'];
                                                        revenueChart.data.datasets[0].data = [0];
                                                        revenueChart.update();
                                                    }
                                                });
                                            </script>
                                        </div>

                                        <!-- Trạng thái đơn hàng -->
                                        <div class="col-lg-4">
                                            <div class="card shadow mb-4">
                                                <div class="card-header bg-secondary text-white">
                                                    <h6 class="m-0 fw-bold">Trạng thái đơn hàng</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-success table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Trạng thái</th>
                                                                <th>Số lượng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-group-divider">
                                                            <?php foreach ($trangThaiDonHangs as $trangThaiDonHang) {
                                                                $id = $trangThaiDonHang['id'];
                                                                $tenTrangThai = $trangThaiDonHang['ten_trang_thai'];
                                                                $soLuong = isset($trangThaiDonHangCount[$id]) ? $trangThaiDonHangCount[$id] : 0; ?>
                                                                <tr>
                                                                    <td><?= htmlspecialchars($tenTrangThai) ?></td>
                                                                    <td><?= htmlspecialchars($soLuong) ?> ĐƠN HÀNG</td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
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
                </div> <!-- End Page-content -->
            </div> <!-- end main content-->
        </div> <!-- END layout-wrapper -->

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
        <?php require_once "layouts/libs_js.php"; ?>
</body>

</html>