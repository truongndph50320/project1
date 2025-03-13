<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm sản phẩm | Protech Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page Title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Title -->

                    <!-- Form Add Product -->
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Sản Phẩm</h4>
                                    </div><!-- End card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Form Start -->
                                            <form action="?act=products/create" method="POST" enctype="multipart/form-data">
                                                <!-- Product Name & Brand -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="name" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="brand" class="form-label">Hãng</label>
                                                            <select class="form-select" id="brand" name="brand" required>
                                                                <option selected disabled>Chọn hãng</option>
                                                                <option value="Dell">Dell</option>
                                                                <option value="HP">HP</option>
                                                                <option value="Lenovo">Lenovo</option>
                                                                <option value="Asus">Asus</option>
                                                                <option value="Acer">Acer</option>
                                                                <option value="Apple">Apple</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Category & Price -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="danh_mucs" class="form-label">Danh Mục</label>
                                                            <select class="form-select" id="danh_mucs"
                                                                name="category_id" required>
                                                                <option selected disabled>Chọn danh mục</option>
                                                                <?php foreach ($categories as $category) : ?>
                                                                    <option value="<?php echo $category['id']; ?>">
                                                                        <?php echo $category['ten_danh_muc']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Giá</label>
                                                            <input type="text" class="form-control" id="price" name="price" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Stock Quantity & Status -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="stock_quantity" class="form-label">Số lượng trong kho</label>
                                                            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select class="form-select" id="status" name="status" required>
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1">Còn hàng</option>
                                                                <option value="0">Hết hàng</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- RAM & Storage -->
                                                <div class="row">
                                                    <!-- RAM -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="ram" class="form-label">Dung lượng RAM</label>
                                                                <select class="form-select" id="ram" name="ram" required>
                                                                    <option selected disabled>Chọn dung lượng RAM</option>
                                                                    <option value="4GB">4GB</option>
                                                                    <option value="8GB">8GB</option>
                                                                    <option value="16GB">16GB</option>
                                                                    <option value="32GB">32GB</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="storage" class="form-label">Dung lượng bộ nhớ</label>
                                                            <select class="form-select" id="storage" name="storage" required>
                                                                <option selected disabled>Chọn dung lượng bộ nhớ</option>
                                                                <option value="256GB">256GB</option>
                                                                <option value="512GB">512GB</option>
                                                                <option value="1TB">1TB</option>
                                                                <option value="2TB">2TB</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Color & Image -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="color" class="form-label">Màu sắc</label>
                                                            <select class="form-select" id="color" name="color" required>
                                                                <option selected disabled>Chọn màu sắc</option>
                                                                <option value="Đen">Đen</option>
                                                                <option value="Bạc">Bạc</option>
                                                                <option value="Vàng">Vàng</option>
                                                                <option value="Xanh">Xanh</option>
                                                                <option value="Trắng">Trắng</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="image_url" class="form-label">Hình ảnh</label>
                                                                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                    <!-- Description -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Mô tả sản phẩm</label>
                                                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-danger">Thêm sản phẩm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div><!-- End form preview -->
                                    </div><!-- End card-body -->
                                </div><!-- End card -->
                            </div><!-- End h-100 -->
                        </div><!-- End col -->
                    </div><!-- End row -->
                </div><!-- End container-fluid -->
            </div><!-- End page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Protech Hub.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">Design & Develop by YourName</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div><!-- End main content -->

        <!-- Back to top button -->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>

        <!-- Preloader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <!-- Customizer -->
        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
                data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin  mdi-cog-outline fs-22'></i>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?php
        require_once "views/layouts/libs_js.php";
        ?>

        <?php if (isset($_SESSION['message'])): ?>
            <script>
                Swal.fire({
                    title: '<?php echo $_SESSION['message']['title']; ?>',
                    text: '<?php echo $_SESSION['message']['text']; ?>',
                    icon: '<?php echo $_SESSION['message']['icon']; ?>',
                });
                <?php unset($_SESSION['message']); ?>
            </script>
        <?php endif; ?>
</body>

</html>