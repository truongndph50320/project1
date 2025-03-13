<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protech Hub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./public/style.css"> -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* style.css */
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-nav .nav-link {
            margin: 0 10px;
        }

        .carousel img {
            width: 100%;
            height: 500px;
            /* Đặt chiều cao cố định */
            object-fit: cover;
            /* Giữ tỷ lệ ảnh và cắt phần thừa */
        }

        
    </style>
</head>


</head>
<body>
<div class="main_header">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="support_info">
                            <p>
                                <i class="bi bi-telephone"></i>
                                HOTLINE: <a href="tel:0123456789">+01234.56789</a>
                            </p>
                        </div>
                    </div>
                    <?php

                    // var_dump($_SESSION).die;   
                    if (isset($_SESSION['isLoggedIn'])) {

                    ?>
                        <div class="col-lg-6 col-md-6">
                            <!-- <img src="./admin/uploads/avatars/hoa2.jpg" alt=""> -->
                            <div class="top_right text-end">
                                <div class="dropdown ms-sm-3 header-item topbar-user">
                                    <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-flex align-items-center">
                                            <span class="text-start ms-xl-2">
                                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                                    <?php echo "Xin chào,{$_SESSION['ho_va_ten']}"; ?>
                                                </span>

                                                <!-- <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?php echo " {$_SESSION['ho_va_ten']}"; ?></span> -->
                                            </span>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->

                                        <a class="dropdown-item" href="?act=show"><i
                                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                                class="align-middle">Thông tin tài khoản</span></a>
                                        <a class="dropdown-item" href="?act=finish"><i
                                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                                class="align-middle">Đơn hàng cá nhân</span></a>
                                        <a class="dropdown-item" href="?act=logout"><i
                                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                                class="align-middle" data-key="t-logout">Đăng xuất</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?php } else { ?>

                <div class="col-lg-6 col-md-6">
                    <div class="top_right text-end">
                        <ul>
                            <li><a href="?act=login"> Đăng nhập </a></li>

                        </ul>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
       <!-- header -->
       <div class="py-2" style="background-color: #405189;">
        <div class="container">
            <div class="row align-items-center justify-content-center"> <!-- Center the content -->
                <!-- Logo -->
                <div class="col-6 col-md-2 text-center">
                    <span class="logo-lg mt-4">
                        <h4 class="display-7 mt-4" style="color: #ffffff !important; display: inline;">Protech </h4>
                        <h4 class="display-7 mt-4" style="color: #ff0000 !important; display: inline;">Hub</h4>
                    </span>
                </div>

                <!-- Search Bar and Icons -->
                <div class="col-6 col-md-8 d-flex align-items-center justify-content-center"> <!-- Center the content -->
                    <!-- Search Bar -->
                    <!-- <form class="d-flex w-75" role="search" onsubmit="searchProducts(event)">
                            <input id="searchInput" class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                            
                        </form> -->

                        <form class="d-flex w-75" role="search" action="" method="get">
                        <input type="hidden" name="act" value="products/search">
                        <input id="searchInput" name="query" class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" require>
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i> <!-- Đây là icon kính lúp -->
                        </button>
                    </form>


                    <!-- Cart Icon -->
                   
                    <!-- Cart Icon -->
                    <!-- Cart Icon -->
                    <a href="?act=view-cart" class="ms-3 text-white position-relative">
                        <i class="fas fa-shopping-cart" style="font-size: 24px;"></i>
                        
                    </a>

                    <!-- Login Button -->
                    <!-- <a href="?act=login" class="ms-3 btn btn-outline-light">Login</a>

                    
                    <a href="?act=logout" class="ms-3 btn btn-outline-light">Logout</a> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?act=/">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?act=product">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?act=lien_he">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?act=tin_tuc">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?act=khuyen_mai">Khuyến mãi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>
</html>