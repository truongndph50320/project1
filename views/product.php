<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm theo danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'layout/header.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar for Categories -->
            <div class="col-md-3">
                <!-- Sidebar Header -->
                <div class="mb-4">
                    <h4 class="text-uppercase fw-bold text-primary p-3 border rounded-3 shadow-sm">Danh mục</h4>
                </div>
                <!-- Category List -->
                <div class="list-group">
                    <?php foreach ($danhMucs as $danhMuc): ?>
                        <a href="?act=product&danhmucId=<?= $danhMuc['id'] ?>"
                            class="list-group-item list-group-item-action 
                                  <?php echo isset($_GET['danhmucId']) && $_GET['danhmucId'] == $danhMuc['id'] ? 'active' : ''; ?>">
                            <?= $danhMuc['ten_danh_muc'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Products Section -->
            <div class="col-md-9">
            <h4 class="text-uppercase fw-bold text-primary p-3 border rounded-3 shadow-sm">Danh Sách Sản Phẩm</h4>
                <div class="row">
                    <?php if ($products): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-6 col-md-4 mb-4">
                                <div class="card h-100 shadow-sm d-flex flex-column">
                                    <!-- Shrinked Image with consistent height -->
                                    <img src="admin/<?= $product['image_url'] ?>" class="card-img-top img-fluid" alt="<?= $product['name'] ?>" style="object-fit: contain; height: 180px;">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                                        <p class="card-text text-muted"><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</p>
                                        <a href="?act=show&id=<?= $product['product_id'] ?>" class="btn btn-primary mt-auto">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Không có sản phẩm nào trong danh mục này.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <?php include 'layout/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>