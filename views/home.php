<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protech Hub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./public/style.css"> -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* style.css */
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-nav .nav-link {
            margin: 0 10px;
        }

        .carousel img {
            width: 100%;
            height: 500px;
            /* Đặt chiều cao cố định */
            object-fit: cover;
            /* Giữ tỷ lệ ảnh và cắt phần thừa */
        }

        
    </style>
</head>

<body>
<?php require_once 'layout/header.php' ?>


    <!-- Hero Section -->

    <div id="bannerSlide" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="?act=/"><img src="assets/img/logo/banner1.jpg" class="d-block w-100" alt=""></a>
            </div>
            <div class="carousel-item">
                <a href="?act=/"><img src="assets/img/logo/banner5.jpg" class="d-block w-100" alt=""></a>
            </div>
            <div class="carousel-item">
                <a href="?act=/"><img src="assets/img/logo/banner6.jpg" class="d-block w-100" alt=""></a>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerSlide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <br>


    <section class="shipping_area shipping_four mb-70">
    <div class="container">
        <div class="shipping_inner">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Giao Hàng Miễn Phí</h2>
                            <p>Cho các đơn hàng nhất định</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Thanh Toán An Toàn</h2>
                            <p>100% thanh toán bảo mật</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Mua Sắm Tự Tin</h2>
                            <p>Nếu sản phẩm gặp vấn đề</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping last_child">
                        <div class="shipping_icone">
                            <img src="assets/about/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Hỗ Trợ 24/7</h2>
                            <p>Dịch vụ hỗ trợ 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Latest Products Section -->
    <!-- Latest Products Carousel Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="mb-4 text-center">Sản Phẩm Mới Nhất</h3>
            <div id="latestProductsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $chunks = array_chunk($products, 4); // Chia sản phẩm thành từng nhóm 4 cái 
                    ?>
                    <?php foreach ($chunks as $index => $chunk): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <div class="row g-4">
                                <?php foreach ($chunk as $product): ?>
                                    <div class="col-md-3">
                                        <div class="card h-100 border-0 shadow">
                                            <img src="admin/<?= $product['image_url'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" style="height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title text-truncate"><?= $product['name'] ?></h5>
                                                <p class="card-text text-muted"><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</p>
                                            </div>
                                            <div class="card-footer bg-transparent text-center">
                                                <a href="?act=chi-tiet-san-pham&id=<?= $product['product_id'] ?>" class="btn btn-primary w-100">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#latestProductsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#latestProductsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="mb-4 text-center">Sản Phẩm Liên Quan</h3>
            <div class="row g-4">
                <?php if ($products): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <!-- Image Section -->
                                <img src="admin/<?= $product['image_url'] ?>"
                                    class="card-img-top"
                                    alt="<?= htmlspecialchars($product['name']) ?>"
                                    style="object-fit: cover; height: 180px;">
                                <!-- Card Body -->
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-truncate"><?= htmlspecialchars($product['name']) ?></h5>
                                    <p class="price fw-bold text-primary mb-2"><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</p>
                                    <a href="?act=chi-tiet-san-pham&id=<?= $product['product_id'] ?>" class="btn btn-outline-primary mt-auto">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>




    <!-- Footer Section -->
    <?php require_once 'layout/footer.php' ?>
    <!-- Bootstrap JS -->
    <script>
        //         function searchProducts(event) {
        //     event.preventDefault(); // Ngăn chặn gửi form thông thường

        //     const query = document.getElementById('searchInput').value;
        //     fetch(`search.php?query=${query}`)
        //         .then(response => response.json())
        //         .then(products => {
        //             const resultsContainer = document.getElementById('searchResults');
        //             resultsContainer.innerHTML = ''; // Xóa kết quả cũ

        //             // Hiển thị kết quả mới
        //             if (products.length === 0) {
        //                 resultsContainer.innerHTML = '<p class="text-center">No products found.</p>';
        //             } else {
        //                 products.forEach(product => {
        //                     const productCard = `
        //                         <div class="col-6 col-md-3 mb-3">
        //                             <div class="card">
        //                                 <img src="${product.image_url || 'default-image.png'}" class="img-fluid" alt="">
        //                                 <div class="card-body">
        //                                     <p><strong>${product.name}</strong></p>
        //                                     <p>${product.price} vnđ</p>
        //                                     <a href="#" class="btn btn-primary">Buy Now</a>
        //                                 </div>
        //                             </div>
        //                         </div>`;
        //                     resultsContainer.innerHTML += productCard;
        //                 });
        //             }
        //         });
        // }

        
    </script>

<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>