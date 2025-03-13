<?php
class BienTheController
{
    private $bienTheModel;

    public function __construct()
    {
        $this->bienTheModel = new BienThe();
    }

    public function index()
    {
        // Get all product variants
        $bienThes = $this->bienTheModel->getAll();
        require_once 'views/bienthes/index.php';
    }

    public function show($id)
    {
        // Get product variant by ID
        $bienThe = $this->bienTheModel->getById($id);
        require_once 'views/bienthes/show.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Handle file upload
                if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/bienthes/';
                    $fileName = basename($_FILES['image_url']['name']);
                    $uploadFile = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
                        $image_url = $uploadFile;
                    } else {
                        $image_url = null;
                    }
                }

                $data = [
                    'name' => $_POST['name'],
                    'brand' => $_POST['brand'] ?? '',
                    'category' => $_POST['category'] ?? '',
                    'description' => $_POST['description'] ?? '',
                    'price' => $_POST['price'] ?? 0,
                    'stock_quantity' => $_POST['stock_quantity'] ?? 0,
                    'status' => $_POST['status'] ?? '',
                    'ram' => $_POST['ram'] ?? '',
                    'storage' => $_POST['storage'] ?? '',
                    'color' => $_POST['color'] ?? '',
                    'image_url' => $image_url ?? null,
                    'sku' => $_POST['sku'] ?? ''
                ];

                // Add the new product variant
                $this->bienTheModel->add($data);

                // Set success message
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Biến thể sản phẩm đã được thêm thành công.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Set error message
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Có lỗi xảy ra khi thêm biến thể sản phẩm: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=bienthes');
            exit;
        } else {
            require_once 'views/bienthes/add.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Preserve the current image if no new image is uploaded
                $image_url = $_POST['image_url'] ?? '';

                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $image_url = 'uploads/' . basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], $image_url);
                }

                $data = [
                    'name' => $_POST['name'] ?? '',
                    'brand' => $_POST['brand'] ?? '',
                    'category' => $_POST['category'] ?? '',
                    'description' => $_POST['description'] ?? '',
                    'price' => $_POST['price'] ?? 0,
                    'stock_quantity' => $_POST['stock_quantity'] ?? 0,
                    'status' => $_POST['status'] ?? '',
                    'ram' => $_POST['ram'] ?? '',
                    'storage' => $_POST['storage'] ?? '',
                    'color' => $_POST['color'] ?? '',
                    'image_url' => $image_url,
                    'sku' => $_POST['sku'] ?? ''
                ];

                // Update the product variant
                $this->bienTheModel->edit($id, $data);

                // Set success message
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Biến thể sản phẩm đã được cập nhật.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Set error message
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Không thể cập nhật biến thể sản phẩm: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=bienthes');
            exit;
        } else {
            $bienThe = $this->bienTheModel->getById($id);
            require_once 'views/bienthes/edit.php';
        }
    }

    public function delete($id)
    {
        try {
            // Delete the product variant
            $this->bienTheModel->delete($id);

            // Set success message
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Biến thể sản phẩm đã được xóa.',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Set error message
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa biến thể sản phẩm: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=bienthes');
        exit;
    }
}
?>
