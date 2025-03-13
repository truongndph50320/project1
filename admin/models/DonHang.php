<?php
class DonHang
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDonHang()
    {
        $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
                FROM don_hangs
                INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllTrangThaiDonHang()
    {
        $sql = 'SELECT * FROM trang_thai_don_hangs';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function search($keyword)
    {
        $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai 
                FROM don_hangs 
                INNER JOIN trang_thai_don_hangs 
                ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id 
                WHERE ten_nguoi_nhan LIKE :keyword 
                OR ma_don_hang LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll();
    }

    public function getDetailDonHang($id)
    {
        $sql = 'SELECT don_hangs.*, 
                       trang_thai_don_hangs.ten_trang_thai, 
                       nguoi_dungs.ho_va_ten, 
                       nguoi_dungs.email, 
                       nguoi_dungs.sdt, 
                       phuong_thuc_thanh_toan.ten_phuong_thuc,
                       trang_thai_thanh_toan.ten_thanh_toan
                FROM don_hangs
                INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
                INNER JOIN nguoi_dungs ON don_hangs.nguoi_dung_id = nguoi_dungs.id
                INNER JOIN phuong_thuc_thanh_toan ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toan.id
                INNER JOIN trang_thai_thanh_toan ON don_hangs.trang_thai_thanh_toan_id = trang_thai_thanh_toan.id
                WHERE don_hangs.id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();

        // Log error if no result found
        if (!$result) {
            error_log("No order found for ID: $id");
            return null;
        }

        return $result;
    }



    public function getListSpDonHang($id)
    {
        $sql = 'SELECT chi_tiet_don_hangs.*, products.name
                FROM chi_tiet_don_hangs
                INNER JOIN products ON chi_tiet_don_hangs.san_pham_id = products.product_id
                WHERE chi_tiet_don_hangs.don_hang_id = :product_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':product_id' => $id]);
        return $stmt->fetchAll();
    }

    // Update order status
    public function updateOrderStatus($id, $newStatusId)
    {
        $sql = 'UPDATE don_hangs SET trang_thai_don_hang_id = :newStatusId WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':newStatusId' => $newStatusId, ':id' => $id]);
        return $stmt->rowCount(); // Returns the number of affected rows
    }

    public function updateDonHang($id, $data)
    {
        $sql = 'UPDATE don_hangs
        SET ten_nguoi_nhan = :ten_nguoi_nhan,
            sdt_nguoi_nhan = :sdt_nguoi_nhan,
            email_nguoi_nhan = :email_nguoi_nhan,
            dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
            ghi_chu = :ghi_chu,
            trang_thai_don_hang_id = :trang_thai_don_hang_id
        WHERE id = :id';
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);

        $stmt->execute($data);

        return true;
    }

    // public function getAllDonHang()
    // {
    //     $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
    //             FROM don_hangs
    //             INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id';
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    public function getDonHangFromKhachHang($id)
    {
        try {
            $sql = 'SELECT 
                    dh.ma_don_hang AS ma_don_hang,
                    dh.ten_nguoi_nhan,
                    dh.sdt_nguoi_nhan,
                    dh.ghi_chu,
                    dh.dia_chi_nguoi_nhan,
                    dh.tong_tien,
                    nd.ten_nguoi_dung AS ten_nguoi_dung,
                    nd.email,
                    nd.vai_tro
                    -- ctdh.don_gia
                    -- ctdh.thanh_tien
                FROM 
                    don_hangs dh
                JOIN 
                    nguoi_dungs nd ON dh.nguoi_dung_id = nd.id
                -- LEFT JOIN 
                --     chi_tiet_don_hangs ctdh ON dh.id = ctdh.id 
                WHERE 
                    nd.vai_tro = 1 AND dh.nguoi_dung_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    //hàm tính tổng tiền các đơn hàng (tổng doanh thu)
    public function tongDoanhThu()
    {
        $sql = 'SELECT SUM(tong_tien) AS tong_tien FROM don_hangs WHERE trang_thai_thanh_toan_id = 2';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ? (float)$result['tong_tien'] : 0;
    }

    //hàm trả về tổng số đơn hàng
    public function tongSoDonHang()
    {
        $sql = 'SELECT COUNT(*) AS tong_so_don_hang FROM don_hangs';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ? (int)$result['tong_so_don_hang'] : 0;
    }
    // thống kê trạng thái đơn hàng
    public function getDonHangCountByStatus()
    {
        $sql = 'SELECT trang_thai_don_hang_id, COUNT(*) AS so_luong 
                FROM don_hangs 
                GROUP BY trang_thai_don_hang_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    }
    // doanh thu theo ngày
    public function getDoanhThuTheoTungNgay()
    {
        $sql = 'SELECT DATE(ngay_dat) AS ngay, SUM(tong_tien) AS doanh_thu 
            FROM don_hangs WHERE trang_thai_thanh_toan_id = 2
            GROUP BY DATE(ngay_dat)
            ORDER BY DATE(ngay_dat) ASC';  // Sắp xếp theo ngày từ cũ đến mới
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // doanh thu ngày
    // public function tongDoanhThuNgay($ngay)
    // {
    //     $sql = 'SELECT SUM(tong_tien) AS tong_tien 
    //         FROM don_hangs 
    //         WHERE trang_thai_thanh_toan_id = 2 
    //         AND DATE(ngay_dat) = :ngay';  // Thêm điều kiện ngày vào truy vấn
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([':ngay' => $ngay]);
    //     $result = $stmt->fetch();
    //     return $result ? (float)$result['tong_tien'] : 0;
    // }
}
