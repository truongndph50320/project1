<?php
class BinhLuanController
{
    private $binhLuanModel;

    public function __construct()
    {
        $this->binhLuanModel = new BinhLuan();
    }

    public function index()
    {
        $binhLuans = $this->binhLuanModel->getAll();
        require_once 'views/binhluans/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Chuẩn bị dữ liệu từ form
                $data = [
                    'san_pham_id' => $_POST['san_pham_id'] ?? null,
                    'tai_khoan_id' => $_POST['tai_khoan_id'] ?? null,
                    'noi_dung' => $_POST['noi_dung'] ?? '',
                    'ngay_dang' => $_POST['ngay_dang'] ?? date('Y-m-d H:i:s'),
                    'trang_thai' => $_POST['trang_thai'] ?? 1,
                ];

                // Thêm bình luận mới
                $this->binhLuanModel->add($data);

                // Thông báo thành công
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Bình luận đã được thêm mới.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Thông báo lỗi
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Không thể thêm bình luận: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=binhluans');
            exit();
        } else {
            require_once 'views/binhluans/add.php';
        }
    }

    public function delete($id)
    {
        try {
            $this->binhLuanModel->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Bình luận đã được xóa.',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa bình luận: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=binhluans');
        exit();
    }
}
?>
