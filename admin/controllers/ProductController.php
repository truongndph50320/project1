<?php
class ProductController
{
    private $productModel;
    private $danhmucModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->danhmucModel = new DanhMuc();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        require_once 'views/products/index.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getById($id);
        require_once 'views/products/show.php';
    }

    public function add()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Generate SKU if not provided
            $sku = $_POST['sku'] ?? $this->generateSku();

            // Generate `ma_san_pham` if not provided
            $ma_san_pham = $_POST['ma_san_pham'] ?? $this->generateMaSanPham();

            // Xử lý tải lên ảnh
            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $fileName = basename($_FILES['image_url']['name']);
                $uploadFile = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
                    $image_url = $uploadFile;
                } else {
                    throw new Exception("Không thể tải lên hình ảnh.");
                }
            } else {
                $image_url = null;
            }

            $data = [
                'ma_san_pham' => $ma_san_pham,
                'name' => $_POST['name'] ?? '',
                'brand' => $_POST['brand'] ?? '',
                'category_id' => $_POST['category_id'] ?? null,
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'stock_quantity' => $_POST['stock_quantity'] ?? 0,
                'status' => $_POST['status'] ?? null,
                'ram' => $_POST['ram'] ?? '',
                'storage' => $_POST['storage'] ?? '',
                'color' => $_POST['color'] ?? '',
                'image_url' => $image_url,
                'sku' => $sku
            ];

            $this->productModel->add($data);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Sản phẩm đã được thêm thành công.',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Có lỗi xảy ra khi thêm sản phẩm: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=products');
        exit;
    } else {
        $categories = $this->danhmucModel->getAll();
        require_once 'views/products/add.php';
    }
}

// Function to generate `ma_san_pham`
private function generateMaSanPham()
{
    // Logic để sinh mã sản phẩm tự động (ví dụ: P + số ngẫu nhiên 4 chữ số)
    return 'P' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
}


    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $image_url = $_POST['image_url'] ?? '';

                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $image_url = 'uploads/' . basename($_FILES['image']['name']);
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_url)) {
                        throw new Exception("Không thể tải lên hình ảnh mới.");
                    }
                }

                $data = [
                    'name' => $_POST['name'] ?? '',
                    'brand' => $_POST['brand'] ?? '',
                    'category_id' => $_POST['category_id'] ?? null,
                    'description' => $_POST['description'] ?? '',
                    'price' => $_POST['price'] ?? 0,
                    'stock_quantity' => $_POST['stock_quantity'] ?? 0,
                    'status' => $_POST['status'] ?? 1,
                    'ram' => $_POST['ram'] ?? '',
                    'storage' => $_POST['storage'] ?? '',
                    'color' => $_POST['color'] ?? '',
                    'image_url' => $image_url,
                    'sku' => $_POST['sku'] ?? '' // You can optionally update SKU during edit if needed
                ];

                $this->productModel->edit($id, $data);

                // Thông báo thành công
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Sản phẩm đã được cập nhật.',
                    'icon' => 'success',
                ];
            } catch (Exception $e) {
                // Thông báo lỗi
                $_SESSION['message'] = [
                    'title' => 'Lỗi!',
                    'text' => 'Không thể cập nhật sản phẩm: ' . $e->getMessage(),
                    'icon' => 'error',
                ];
            }

            header('Location: ?act=products');
            exit;
        } else {
            $product = $this->productModel->getById($id);
            $categories = $this->danhmucModel->getAll();
            require_once 'views/products/edit.php';
        }
    }

    public function delete($id)
    {
        try {
            $this->productModel->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Sản phẩm đã được xóa.',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa sản phẩm: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=products');
        exit;
    }

    // Function to generate SKU
    private function generateSku()
    {
        // Logic to generate a SKU, could be based on product details or random
        return strtoupper(uniqid('SKU-'));
    }

    

    
}
?>
