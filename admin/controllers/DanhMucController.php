<?php

class DanhMucController
{
    private $danhmucModel;

    public function __construct()
    {
        $this->danhmucModel = new DanhMuc();
    }

    // Hiển thị danh sách tất cả danh mục
    public function index()
    {
        $danhmucs = $this->danhmucModel->getAll();
        require_once 'views/danhmucs/index.php';
    }

    // Tạo mới danh mục
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'ten_danh_muc' => $_POST['ten_danh_muc'],
                ];

                // Gọi phương thức create để thêm mới vào cơ sở dữ liệu
                $this->danhmucModel->create($data);

                // Thông báo thành công
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Danh mục đã được tạo thành công.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Thông báo lỗi
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Không thể tạo danh mục: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=danhmucs');
            exit();
        } else {
            require_once 'views/danhmucs/add.php';
        }
    }

    // Chỉnh sửa danh mục
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'ten_danh_muc' => $_POST['ten_danh_muc'],
                ];

                // Gọi phương thức update để sửa danh mục
                $this->danhmucModel->update($id, $data);

                // Thông báo thành công
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Danh mục đã được cập nhật.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Thông báo lỗi
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Không thể cập nhật danh mục: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=danhmucs');
            exit();
        } else {
            $danhmuc = $this->danhmucModel->getById($id);
            require_once 'views/danhmucs/edit.php';
        }
    }

    // Xóa danh mục
    public function delete($id)
    {
        try {
            // Gọi phương thức delete để xóa danh mục
            $this->danhmucModel->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Danh mục đã được xóa.',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa danh mục: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=danhmucs');
        exit();
    }
}
?>
