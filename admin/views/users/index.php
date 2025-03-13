<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <!-- Include CSS files -->
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
                                <h4 class="mb-sm-0">Danh sách người dùng</h4>

                                
                                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách người dùng</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh Sách Người Dùng</h4>
                                        <a href="?act=users/create" class="btn btn-soft-success material-shadow-none">
                                            <i class="ri-add-circle-line align-middle me-1"></i> Thêm Người Dùng
                                        </a>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-nowrap align-middle mb-0 table text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Ảnh Đại Diện</th>
                                                            <th scope="col">Tên Tài Khoản</th>
                                                            <th scope="col">Vai Trò</th>
                                                            <th scope="col">Trạng Thái</th>
                                                            <th scope="col">Hành Động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $stt = 1;
                                                        foreach ($users as $user): ?>
                                                            <tr>
                                                                <td><?php echo $stt++; ?></td>

                                                                <td>
                                                                    <img src="<?php echo $user['avatar'] ? $user['avatar'] : 'default-avatar.png'; ?>"
                                                                        alt="Avatar" class="rounded-circle" width="40"
                                                                        height="40">
                                                                </td>
                                                                <td><?php echo $user['ten_nguoi_dung']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($user['vai_tro'] == 0) { ?>
                                                                        <span class="badge bg-danger">Admin</span>
                                                                    <?php
                                                                    } else { ?>
                                                                        <span class="badge bg-info">User</span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($user['trang_thai'] == 1) { ?>
                                                                        <span class="badge bg-success">Hoạt động</span>
                                                                    <?php
                                                                    } else { ?>
                                                                        <span class="badge bg-danger">Ngừng hoạt động</span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="d-flex justify-content-center hstack gap-3 flex-wrap">
                                                                        <!-- Show -->
                                                                        <a href="?act=users/show&id=<?php echo $user['id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-eye-line"></i>
                                                                        </a>
                                                                        <!-- Sửa -->
                                                                        <a href="?act=users/edit&id=<?php echo $user['id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-edit-2-line"></i>
                                                                        </a>

                                                                        <!-- Xóa -->
                                                                        <a href="?act=users/delete&id=<?php echo $user['id']; ?>"
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
                            </script> © Protech Hub.
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