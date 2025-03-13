<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protech Hub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>

        .navbar-nav .nav-link:hover {
            color: red !important;
        }

        footer {
            padding: 10px 0;
            font-size: 14px;
        }

        footer h5 {
            font-size: 16px;
        }

        footer p,
        footer ul li {
            margin-bottom: 5px;
        }

        footer .social-icons a {
            font-size: 16px;
        }

        /* Đảm bảo tất cả các card có chiều cao cố định */
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Hình ảnh chiếm toàn bộ chiều rộng của card */
        .card img {
            max-height: 180px;
            /* Giới hạn chiều cao hình ảnh */
            object-fit: cover;
            /* Cắt ảnh vừa khung */
            width: 100%;
        }

        /* Căn giữa nội dung trong card */
        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Khoảng cách giữa các nút */
        .card .btn {
            margin-top: 5px;
        }

        .tp_background {
            background: #ffffff !important
        }

        .tp_text_color {
            color: #1939bc !important
        }

        

        .tp_product_name,
        .tp_product_name>a {
            color: #1939bc !important
        }

        .tp_product_price {
            color: #1939bc !important
        }

        .tp_title {
            color: #1939bc !important
        }

        .tp_title,
        .tp_title>span {
            background: #ffffff !important
        }

        .tp_header {
            background: #1939bc !important
        }

        .tp_menu {
            background: #ffffff !important
        }

        .tp_menu .tp_menu_item.active,
        .tp_menu .tp_menu_item.active>a {
            color: #ffffff !important
        }

        .tp_menu .tp_menu_item {
            color: #1939bc !important
        }

        .tp_menu .tp_menu_item:hover,
        .tp_menu .tp_menu_item>a:hover {
            color: #000000 !important
        }

        .tp_banner_main {
            display: block !important
        }

        .tp_product_new {
            display: block !important
        }

        .tp_product_hot {
            display: block !important
        }

        .tp_product_betseller {
            display: block !important
        }

        .tp_product_category_box {
            display: block !important
        }

        .tp_product_discount {
            display: block !important
        }

        .tp_product_detail .tp_product_detail_price {
            color: #1939bc !important
        }

        .tp_product_detail .tp_product_detail_name {
            color: #000000 !important
        }

        .tp_product_category .tp_product_category_filter_attribute {
            display: none !important
        }

        .tp_product_category .tp_product_category_filter_brand {
            display: none !important
        }

        .tp_product_category .tp_product_category_filter_category {
            display: block !important
        }

        .tp_product_category .tp_product_category_filter_price {
            display: none !important
        }

        img {
            max-width: 100%;
        }

        img.lazyload {
            opacity: 0.001;
            object-fit: scale-down !important;
        }

        .fb-customerchat>span>iframe.fb_customer_chat_bounce_out_v2 {
            max-height: 0 !important;
        }

        .fb-customerchat>span>iframe.fb_customer_chat_bounce_in_v2 {
            max-height: calc(100% - 80px) !important;
        }

        /* Cập nhật bố cục của phần chi tiết sản phẩm */
        .product-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            /* Khoảng cách giữa ảnh và thông tin */
            align-items: flex-start;
        }

        /* Ảnh sản phẩm */
        .image-container {
            flex: 1 1 40%;
            /* Ảnh chiếm 40% chiều rộng */
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        /* Thông tin sản phẩm */
        .info-container {
            flex: 1 1 50%;
            /* Thông tin chiếm 50% chiều rộng */
            padding: 20px;
        }

        /* Cập nhật các phần tử con bên trong info-container */
        .info-container h1 {
            font-size: 24px;
            color: #1939bc;
            margin-bottom: 20px;
        }

        .info-container .price {
            font-size: 20px;
            color: #1939bc;
            margin-bottom: 20px;
        }

        .size-selector,
        .quantity-selector {
            margin-bottom: 20px;
        }

       
    </style>
    <script src="https://pos.nvnstatic.net/cache/location.vn.js?v=241115_150026" defer></script>
    <script src="https://web.nvnstatic.net/js/lazyLoad/lazysizes.min.js" async></script>
    <style>
        /* Cơ bản reset CSS */
        .related-products {
            max-height: 400px;
            /* Chiều cao cố định cho phần sản phẩm liên quan */
            overflow-y: auto;
            /* Thêm thanh cuộn dọc khi nội dung vượt quá chiều cao */
            margin-top: 20px;
            /* Thêm khoảng cách giữa phần mô tả sản phẩm và sản phẩm liên quan */
        }

        .san-pham-lien-quan {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .san-pham {
            flex: 1 1 30%;
            /* Mỗi sản phẩm chiếm 30% chiều rộng */
            border: 1px solid #ddd;
            /* Đường viền cho mỗi sản phẩm */
            padding: 10px;
            text-align: center;
            background-color: #f7f7f7;
        }

        .san-pham img {
            max-width: 100%;
            height: auto;
        }

       
        /* Cập nhật bố cục của phần chi tiết sản phẩm */
        .product-detail {
            display: flex;
            gap: 30px;
            /* Khoảng cách giữa ảnh và thông tin */
            align-items: flex-start;
            /* Căn chỉnh các phần tử theo chiều dọc */
            justify-content: space-between;
            /* Cân chỉnh đều giữa ảnh và thông tin */
        }

        /* Ảnh sản phẩm */
        .image-container {
            flex: 1 1 40%;
            /* Ảnh chiếm 40% chiều rộng */
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        /* Thông tin sản phẩm */
        .info-container {
            flex: 1 1 55%;
            /* Thông tin chiếm 55% chiều rộng */
            padding: 20px;
        }

        /* Cập nhật các phần tử con bên trong info-container */
        .info-container h1 {
            font-size: 24px;
            color: #1939bc;
            margin-bottom: 20px;
        }

        .info-container .price {
            font-size: 20px;
            color: #1939bc;
            margin-bottom: 20px;
        }

        .size-selector,
        .quantity-selector {
            margin-bottom: 20px;
        }

      

        /* Cập nhật phần sản phẩm liên quan */






        .san-pham img {
            max-width: 100%;
            height: auto;
        }

        /* Bố cục phần bình luận */
        .comment-section {
            margin-top: 30px;
        }

        .comment-section h3 {
            font-size: 20px;
            color: #1939bc;
            margin-bottom: 15px;
        }

        .comment-form {
            margin-top: 15px;
        }

        .comment-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .comment-form button {
            background-color: #1939bc;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        .comment-form button:hover {
            background-color: #155a9e;
        }

        /* Bố cục chi tiết sản phẩm */
        .product-detail {
            display: flex;
            gap: 30px;
            /* Khoảng cách giữa ảnh và thông tin */
            align-items: flex-start;
            /* Căn chỉnh các phần tử theo chiều dọc */
            justify-content: space-between;
            /* Cân chỉnh đều giữa ảnh và thông tin */
        }


        /* Thông tin sản phẩm */
        .info-container {
            flex: 1 1 55%;
        }

        /* Form bình luận */
        .comment-section {
            margin-top: 30px;
        }

        .comment-form {
            margin-bottom: 20px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comment-form button {
            background-color: #1939bc;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .comment-form button:hover {
            background-color: #155a9e;
        }

        /* Hiển thị bình luận */
        .comments-list {
            margin-top: 30px;
        }

        .comment-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .comment-item p {
            font-size: 14px;
            color: #333;
        }

        .san-pham img {
            width: 300px;
            height: auto;
        }

        .san-pham h3 {
            font-size: 20px;
            margin: 10px 0;
        }

        button {
            background-color: #1939bc;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #155a9e;
        }

        .comment-header {
            display: flex;
            align-items: center;
        }

        .avatar {
            width: 40px;
            /* Điều chỉnh kích thước avatar */
            height: 40px;
            border-radius: 50%;
            /* Để avatar có hình tròn */
            margin-right: 10px;
            /* Khoảng cách giữa avatar và tên */
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php require_once 'layout/header.php' ?>


    <!-- Product Detail Section -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center">
                <!-- Product Card -->
                <!-- <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm mx-auto">
                        <img src="admin/<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $product['name'] ?></h5>
                            <p class="card-text text-success fw-bold text-center"><?= $product['price'] ?> vnđ</p>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-around">
                            <button class="btn btn-primary">Thêm giỏ hàng</button>
                            <a href="?act=Chitietsanpham&id=<?= $product['product_id'] ?>" class="btn btn-danger">Mua</a>
                        </div>
                    </div>
                </div> -->
                <!-- Kết thúc card -->
            </div>
        </div>
    </section>

    <div class="product-detail">
        <!-- Ảnh sản phẩm bên trái -->
        <div class="image-container">
            <img src="admin/<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>">
        </div>

        <!-- Thông tin sản phẩm bên phải -->
        <div class="info-container">
                <h1><?= $product['name'] ?></h1>
                <p class="price">Giá: <?= $product['price'] ?> VND</p>
                <p class="description">Mô tả sản phẩm:<?= $product['description'] ?></p>
                <button class="btn btn-dark">Mua ngay</button>
                <form id="addToCartForm" class="btn">
                <input type="hidden" name="id" value="<?php echo $product['product_id']; ?>"> <!-- ID sản phẩm -->
                <input type="hidden" name="name" value="<?php echo $product['name']; ?>"> <!-- Tên sản phẩm -->
                <input type="hidden" name="img" value="<?php echo $product['image_url']; ?>"> <!-- Ảnh sản phẩm -->
                <input type="hidden" name="price" value="<?php echo $product['price']; ?>"> <!-- Giá sản phẩm -->
                <button type="button" id="addToCartBtn" class="btn btn-dark" style="width: 245px">Thêm vào giỏ hàng</button>
            </form>
        </div>
        
    </div>



    <!-- Comment Section -->
    <section class="py-4">
        <div class="container">
            <h4 class="mb-4">Comments</h4>
            <!-- Comment Form -->
            <div id="commentFormContainer" class="mb-4" style="display: none;">
                <form>
                    <div class="mb-3">
                        <label for="commentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="commentName" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="commentContent" class="form-label">Comment</label>
                        <textarea class="form-control" id="commentContent" rows="4" placeholder="Write your comment here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>

            <!-- Prompt to Buy -->
            <div id="buyPrompt" class="alert alert-warning">
                You must purchase by clicking the <strong>Buy Now</strong> button to be able to write a review.
            </div>
            <div>
                <h5>All Comments</h5>
                <div class="border p-3 mb-3">
                    <h6 class="mb-1">Gia Bảo <small class="text-muted">- 20 Nov 2024</small></h6>
                    <p class="mb-0">Sản phẩm này thật tuyệt vời! Rất đáng mua.</p>
                </div>
                <div class="border p-3 mb-3">
                    <h6 class="mb-1">Hoàng Sông<small class="text-muted">- 19 Nov 2024</small></h6>
                    <p class="mb-0">Tính năng tuyệt vời, nhưng giá có thể thấp hơn.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Products Section -->
    <section class="py-5">
        <div class="container">
            <h3 class="mb-4 text-center">Top Categories</h3>
            <div class="row justify-content-center">
                <?php foreach ($products as $product): ?>
                    <div class="col-6 col-md-2 mb-4 d-flex flex-column align-items-center">
                        <img src="admin/<?= $product['image_url'] ?>" class="img-fluid mb-2" alt="" style="max-height: 100px;">
                        <p class="mb-1"><strong><?= $product['name'] ?></strong></p>
                        <p class="text-muted"><?= $product['price'] ?>vnđ</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <?php require_once 'layout/footer.php' ?>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <!-- JavaScript -->
    <script>
        document.getElementById('addToCartBtn').addEventListener('click', function () {
                            // Lấy dữ liệu từ form
                            const form = document.getElementById('addToCartForm');
                            const id = form.querySelector('input[name="id"]').value;
                            const name = form.querySelector('input[name="name"]').value;
                            const img = form.querySelector('input[name="img"]').value;
                            const price = form.querySelector('input[name="price"]').value;

                            fetch('./function/add-to-cart.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: `id=${id}&name=${name}&img=${img}&price=${price}`,
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Thành công!',
                                        text: 'Sản phẩm đã được thêm vào giỏ hàng.',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                } else {
                                    // Hiển thị thông báo lỗi
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Lỗi!',
                                        text: data.message || 'Đã xảy ra lỗi khi thêm sản phẩm.',
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi!',
                                    text: 'Không thể thêm sản phẩm vào giỏ hàng.',
                                });
                                console.error('Lỗi:', error);
                            });
                        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>