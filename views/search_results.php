<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Tìm Kiếm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/search_results.css">
</head>
<body>
    <section>
        <?php require_once 'layout/header.php'; ?>
    </section>

    <div class="container my-5">
        <h2 class="mb-4 text-primary">Kết quả tìm kiếm: "<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>"</h2>

        <?php if (empty($products)): ?>
            <p class="text-danger">Không tìm thấy sản phẩm nào phù hợp.</p>
        <?php else: ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="admin/<?= $product['image_url']; ?>" class="card-img-top img-fluid" alt="<?= $product['name']; ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text">Giá: <strong><?php echo number_format($product['price']); ?> VND</strong></p>
                                <a href="?act=chi-tiet-san-pham&id=<?php echo $product['product_id']; ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <section>
        <?php require_once 'layout/footer.php'; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>