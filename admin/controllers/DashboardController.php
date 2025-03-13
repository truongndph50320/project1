<?php
class DashboardController
{
    public function index()
    {
        $donHangModel = new DonHang();
        $userModel = new User();
        $sanPhamModel = new Product();

        $doanhThu = $donHangModel->tongDoanhThu();
        $donHangs = $donHangModel->tongSoDonHang();
        $trangThaiDonHangs = $donHangModel->getAllTrangThaiDonHang();
        // Lấy ngày hôm nay
        // $ngayHienTai = date('Y-m-d');
        // $doanhThuNgay = $donHangModel->tongDoanhThuNgay($ngayHienTai);
        $doanhThuTheoNgay = $donHangModel->getDoanhThuTheoTungNgay();
        $trangThaiDonHangCount = $donHangModel->getDonHangCountByStatus();
        $tongSoSanPham = $sanPhamModel->tongSoSanPham();
        $khachHangs = $userModel->tongSoNguoiDung();
        require_once "./views/dashboard.php";
    }
}
