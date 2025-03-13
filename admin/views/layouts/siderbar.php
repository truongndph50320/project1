<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg mt-4">
                <h1 class="display-7 mt-4" style="color: #ffffff !important; display: inline;">Protech </h1>
                <h1 class="display-7 mt-4" style="color: #ff0000 !important; display: inline;">Hub</h1>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSanPham" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSanPham">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản Lý Sản Phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSanPham">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=products" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=products/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDanhMuc" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDanhMuc">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản Lý Danh Mục</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDanhMuc">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=danhmucs" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=danhmucs/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarNguoiDung" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarNguoiDung">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản Lý Người Dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNguoiDung">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=users" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=users/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBinhLuan" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarBinhLuan">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản Lý Bình Luận</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBinhLuan">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=binhluans" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=binhluans/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDonHang" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDonHang">
                        <i class="fas fa-folder"></i> <span data-key="t-advance-ui">Đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDonHang">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=don-hang" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTrangThai" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTrangThai">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-advance-ui">Trạng thái đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTrangThai">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=trangthais" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách trạng thái đơn hàng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=trangthais/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTinTuc" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTinTuc">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-advance-ui">Tin Tức</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTinTuc">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=tintucs" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách tin tức
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=tintucs/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarlienhes" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarlienhes">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-advance-ui">Liên hệ</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarlienhes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=lienhes" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách liên hệ
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKhuyenMai" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarKhuyenMai">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-advance-ui">Khuyến Mại</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarKhuyenMai">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=khuyenmais" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách khuyến mại
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?act=khuyenmais/create" class="nav-link" data-key="t-nestable-list">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bán hàng</span></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>