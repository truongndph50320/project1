<?php

class TinTucController
{
    private $tintucModel;

    public function __construct()
    {
        $this->tintucModel = new TinTuc();
    }

    public function index()
    {
        $keyword = $_GET['keyword'] ?? null;
        $tintucs = $keyword 
            ? $this->tintucModel->search($keyword) 
            : $this->tintucModel->getAll();
        
        require_once 'views/tintucs/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tieu_de = trim($_POST['tieu_de']);
            $noi_dung = trim($_POST['noi_dung']);
            $ngay_tao = $_POST['ngay_tao'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề là bắt buộc.';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc.';
            }
            if (empty($ngay_tao)) {
                $errors['ngay_tao'] = 'Ngày tạo là bắt buộc.';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc.';
            }

            // Xử lý tải ảnh
            $file_thumb = null;
            if (!empty($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] === UPLOAD_ERR_OK) {
                try {
                    $file_thumb = $this->uploadFile($_FILES['hinh_anh'], './uploads/');
                } catch (Exception $e) {
                    $errors['hinh_anh'] = $e->getMessage();
                }
            }

            if (empty($errors)) {
                $this->tintucModel->create($tieu_de, $noi_dung, $ngay_tao, $trang_thai, $file_thumb);
                unset($_SESSION['errors'], $_SESSION['old_data']);
                header('Location: ?act=tintucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                $_SESSION['old_data'] = $_POST;
                header('Location: ?act=tintucs/create');
                exit();
            }
        } else {
            require_once 'views/tintucs/create.php';
            unset($_SESSION['errors'], $_SESSION['old_data']);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'tieu_de' => trim($_POST['tieu_de']),
                'noi_dung' => trim($_POST['noi_dung']),
                'trang_thai' => $_POST['trang_thai'],
            ];

            $errors = [];
            if (empty($data['tieu_de'])) {
                $errors['tieu_de'] = 'Tiêu đề là bắt buộc.';
            }
            if (empty($data['noi_dung'])) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc.';
            }
            if (empty($data['trang_thai'])) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc.';
            }

            if (empty($errors)) {
                $this->tintucModel->update($id, $data);
                unset($_SESSION['errors']);
                header('Location: ?act=tintucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=tintucs/edit&id=$id");
                exit();
            }
        } else {
            $tintuc = $this->tintucModel->getById($id);
            require_once 'views/tintucs/edit.php';
            unset($_SESSION['errors']);
        }
    }

    public function delete($id)
    {
        $this->tintucModel->delete($id);
        header('Location: ?act=tintucs');
    }

    private function uploadFile($file, $destinationDir)
    {
        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0777, true);
        }

        $fileName = uniqid() . '_' . basename($file['name']);
        $destination = $destinationDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $fileName;
        } else {
            throw new Exception('Không thể tải lên file.');
        }
    }
}
