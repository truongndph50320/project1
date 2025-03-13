<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Sửa sản phẩm | Protech Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
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
                                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Sửa Sản Phẩm</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Form sửa thông tin sản phẩm -->
                                            <form action="?act=products/edit&id=<?php echo $product['product_id']; ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="name" name="name"
                                                                value="<?php echo $product['name']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="brand" class="form-label">Thương hiệu</label>
                                                            <input type="text" class="form-control" id="brand" name="brand"
                                                                value="<?php echo $product['brand']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="danh_mucs" class="form-label">Danh mục</label>
                                                            <select class="form-select" id="danh_mucs"
                                                                name="category_id" required>
                                                                <?php foreach ($categories as $category): ?>
                                                                    <option value="<?php echo $category['id']; ?>"
                                                                        <?php echo ($product['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                                                        <?php echo $category['ten_danh_muc']; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Giá</label>
                                                            <input type="number" class="form-control" id="price" name="price"
                                                                value="<?php echo $product['price']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ram" class="form-label">RAM</label>
                                                            <input type="text" class="form-control" id="ram" name="ram"
                                                                value="<?php echo $product['ram']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="storage" class="form-label">Bộ nhớ trong</label>
                                                            <input type="text" class="form-control" id="storage" name="storage"
                                                                value="<?php echo $product['storage']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="color" class="form-label">Màu sắc</label>
                                                            <input type="text" class="form-control" id="color" name="color"
                                                                value="<?php echo $product['color']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Ảnh</label>
                                                            <input type="file" class="form-control" id="image"
                                                                name="image" accept="image/*">
                                                            <p class="text-muted">Chọn ảnh mới nếu muốn thay đổi</p>
                                                            <?php if ($product['image_url']): ?>
                                                                <div>
                                                                    <p>Ảnh hiện tại:</p>
                                                                    <img src="<?php echo $product['image_url']; ?>"
                                                                        alt="Current Image" style="max-width: 150px;">
                                                                </div>
                                                                <!-- Trường ẩn để giữ ảnh cũ -->
                                                                <input type="hidden" name="current_image"
                                                                    value="<?php echo $product['image_url']; ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="sku" class="form-label">Mã sản phẩm (SKU)</label>
                                                            <input type="text" class="form-control" id="sku" name="sku"
                                                                value="<?php echo $product['sku']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Trạng thái</label>
                                                                <select class="form-select" id="status" name="status" required>
                                                                    <option value="1" <?php echo ($product['status'] == '1') ? 'selected' : ''; ?>>
                                                                        Còn hàng
                                                                    </option>
                                                                    <option value="0" <?php echo ($product['status'] == '0') ? 'selected' : ''; ?>>
                                                                        Hết hàng
                                                                    </option>
                                                                </select>
                                                                <div class="mt-2">
                                                                    <?php
                                                                    $statusClass = ($product['status'] == '1') ? 'bg-success' : 'bg-danger';
                                                                    $statusText = ($product['status'] == '1') ? 'Còn hàng' : 'Hết hàng';
                                                                    ?>
                                                                    <span class="badge <?php echo $statusClass; ?> p-2"><?php echo $statusText; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- New description and stock quantity fields -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Mô tả</label>
                                                                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $product['description']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="stock_quantity" class="form-label">Số lượng trong kho</label>
                                                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                                                                    value="<?php echo $product['stock_quantity']; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-danger">Cập nhật sản phẩm</button>
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
                        </script> © Protech Hub.
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