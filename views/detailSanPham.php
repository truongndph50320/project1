<!-- Thêm jQuery và ElevateZoom -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.elevateweb.co.uk/wp-content/themes/elevatezoom/elevatezoom/jquery.elevatezoom.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


<?php
require_once 'layout/header.php';
?>


<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                        <li>Chi tiết sản phẩm </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product_details mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <!-- Hình ảnh chính -->
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1"
                                src="admin/<?= $sanphams['image_url'] ?>"
                                data-zoom-image="admin/<?= $sanphams['image_url'] ?>"
                                alt="Hình ảnh sản phẩm"
                                width="400px" height="500px">
                        </a>
                    </div>

                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">

                    <h1><?= $sanphams['name'] ?></h1>

                    <div class=" product_ratting">
                        <ul>
                            <li class="review">
                                <?php $countDanhGia = count($listDanhGia) ?>
                                <a href="#"> <?= $countDanhGia . 'Đánh giá' ?> </a>
                            </li>
                        </ul>

                    </div>
                    <div class="price_box">
                        
                        <h3 class="old_price"><?= number_format($sanphams['price'], 0, ',', '.') ?>đ</h3>


                    </div>
                    <div class="product_desc">
                        <p><?= $sanphams['description'] ?> </p>
                    </div>



                    <div class=" product_d_action">
                        <ul>
                            <li>
                                <a href="#" title="Add to wishlist">


                                    <i class="fas fa-warehouse"></i> Trong kho: <?= $sanphams['stock_quantity'] ?>


                                </a>

                                
                                    </li>

                        </ul>
                    </div>
                    


                    </form>
                    <div class="product_variant quantity">
                        <form method="post" action="<?= '?act=them-gio-hang' ?>" onsubmit="return validateQuantity()">


                            <input type="hidden" name="san_pham_id" value="<?= $sanphams['product_id'] ?>">
                            <input type="hidden" name="nguoi_dung_id" value="<?= $_SESSION['id'] ?? '' ?>">


                            <input type="number" name="so_luong" id="quantity" value="1" min="1" max="<?= $sanphams['stock_quantity'] ?>">


                            <button type="submit" >Thêm vào giỏ hàng</button>

                        </form>



                    </div>
                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i>
                                    Like</a></li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a>
                            </li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i>
                                    save</a></li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i>
                                    share</a></li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i>
                                    linked</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="product_d_info mb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Mô tả chi tiết</a>
                            </li>
                            <li>
                                <?php $countBinhLuan = count($listBinhLuan) ?>
                                <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                    aria-selected="false">Bình luận (<?= $countBinhLuan ?>)</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Đánh giá (<?= $countDanhGia ?>)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <!-- Mô tả chi tiết sản phẩm -->
                                <p id="product-description">
                                    <?= nl2br($sanphams['description']) ?>
                                </p>
                                <button id="toggle-description" class="btn btn-primary">Xem thêm</button>
                            </div>
                        </div>

                        <script>
                            // JavaScript để điều khiển việc xem thêm và ẩn bớt
                            document.getElementById('toggle-description').addEventListener('click', function() {
                                var description = document.getElementById('product-description');
                                var button = document.getElementById('toggle-description');

                                // Kiểm tra xem mô tả có bị ẩn hay không
                                if (description.style.maxHeight === '100px') {
                                    description.style.maxHeight = 'none'; // Hiển thị toàn bộ mô tả
                                    button.textContent = 'Ẩn bớt'; // Thay đổi văn bản nút
                                } else {
                                    description.style.maxHeight = '100px'; // Ẩn bớt mô tả
                                    button.textContent = 'Xem thêm'; // Thay đổi văn bản nút
                                }
                            });
                        </script>

                        <style>
                            #product-description {
                                overflow: hidden;
                                max-height: 100px;
                                /* Giới hạn chiều cao mặc định */
                                transition: max-height 0.3s ease;
                                /* Hiệu ứng khi thay đổi chiều cao */
                            }
                        </style>


                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2><?= $countBinhLuan ?> Bình luận</h2>
                                <?php foreach ($listBinhLuan as $binhLuan) : ?>

                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="https://banner2.cleanpng.com/20180904/vji/kisspng-avatar-image-computer-icons-likengo-usertesting-index-1713944280859.webp" style="width:60px;">
                                            <!-- <img src="./admin/uploads/avatars/hoa2.jpg" alt=""> -->
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <!-- Hiển thị tên người dùng -->
                                                <p><?= isset($binhLuan['ten_nguoi_dung']) ? $binhLuan['ten_nguoi_dung'] : 'Khách vãng lai' ?> -

                                                    <?php
                                                    // Chuyển đổi thời gian ngày đăng từ chuỗi thành đối tượng DateTime
                                                    $ngayDang = new DateTime($binhLuan['ngay_dang']);
                                                    $now = new DateTime(); // Thời gian hiện tại

                                                    // Tính toán sự khác biệt giữa thời gian hiện tại và thời gian đăng
                                                    $interval = $now->diff($ngayDang);

                                                    // Kiểm tra và hiển thị sự khác biệt
                                                    if ($interval->y > 0) {
                                                        echo "{$interval->y} năm trước";
                                                    } elseif ($interval->m > 0) {
                                                        echo "{$interval->m} tháng trước";
                                                    } elseif ($interval->d > 0) {
                                                        echo "{$interval->d} ngày trước";
                                                    } elseif ($interval->h > 0) {
                                                        echo "{$interval->h} giờ trước";
                                                    } elseif ($interval->i > 0) {
                                                        echo "{$interval->i} phút trước";
                                                    } else {
                                                        echo "Vừa xong";
                                                    }
                                                    ?>
                                                </p>

                                                <!-- Hiển thị nội dung bình luận -->
                                                <span><?= $binhLuan['binh_luan'] ?></span>
                                            </div>

                                        </div>

                                    </div>
                                <?php endforeach; ?>

                                <?php if (isset($_SESSION['id'])): ?>
                                    <div class="product_review_form">
                                        <form action="?act=binhluan/create" method="POST">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="binh_luan">* Bình luận của bạn:</label>
                                                    <input type="hidden" name="san_pham_id" value="<?php echo $san_pham_id['product_id']; ?>">

                                                    <textarea name="binh_luan" id="binh_luan"></textarea>
                                                </div>

                                            </div>
                                            <button type="submit">Gửi</button>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <p>Bạn cần <a href="?act=login" class="text-danger">đăng nhập</a> để bình luận.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2><?= $countDanhGia ?> Đánh giá</h2>
                                <?php foreach ($listDanhGia as $index => $danhgia): ?>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="https://banner2.cleanpng.com/20180904/vji/kisspng-avatar-image-computer-icons-likengo-usertesting-index-1713944280859.webp" style="width:60px;">

                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">

                                                <div class="danh-gia">
                                                    <!-- Hiển thị thông tin khách hàng và thời gian -->
                                                    <p><strong><?= $danhgia['ten_nguoi_dung'] ?></strong> -
                                                        <?php
                                                        $ngayDang = new DateTime($danhgia['ngay_dang']);
                                                        $now = new DateTime(); // Thời gian hiện tại
                                                        $interval = $now->diff($ngayDang);

                                                        if ($interval->y > 0) {
                                                            echo "{$interval->y} năm trước";
                                                        } elseif ($interval->m > 0) {
                                                            echo "{$interval->m} tháng trước";
                                                        } elseif ($interval->d > 0) {
                                                            echo "{$interval->d} ngày trước";
                                                        } elseif ($interval->h > 0) {
                                                            echo "{$interval->h} giờ trước";
                                                        } elseif ($interval->i > 0) {
                                                            echo "{$interval->i} phút trước";
                                                        } else {
                                                            echo "Vừa xong";
                                                        }
                                                        ?>
                                                    </p>

                                                    <!-- Hiển thị sao đánh giá -->
                                                    <div class="sao-danh-gia">
                                                        <?php
                                                        // Hiển thị sao từ 1 đến 5
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $danhgia['danh_gia']) {
                                                                echo '<i class="bi bi-star-fill text-warning"></i>'; // Sao đầy (vàng)
                                                            } else {
                                                                echo '<i class="bi bi-star text-muted"></i>'; // Sao rỗng (xám)
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>

                                    </div>



                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product_area related_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Sản phẩm liên quan </h2>
                </div>
            </div>
        </div>
        <div class="product_carousel product_column5 owl-carousel">
            <?php foreach ($listSanPhamCungDanhMuc as $sanpham): ?>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="<?= '?act=chi-tiet-san-pham&id=' . $sanpham['product_id']; ?>">

                                <img src="admin/<?= $sanpham['image_url'] ?>" alt="Hình ảnh sản phẩm" width="100px">

                            </a>

                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">THÊM VÀO GIỎ HÀNG</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class=""><?= number_format($sanpham['price'], 0, '.', '.') ?>đ</span>
                            </div>
                            <h3 class="product_name">
                                <a href="<?= '?act=chi-tiet-san-pham$id=' . $sanpham['product_id']; ?>"><?= htmlspecialchars($sanpham['name']) ?></a>
                            </h3>
                        </figcaption>
                    </figure>
                </article>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php require_once 'layout/footer.php' ?>


<style>
    .product-details-tab {
        position: relative;
    }

    .single-zoom-thumb {
        margin-top: 10px;
        /* Khoảng cách giữa ảnh chính và album ảnh */
    }

    .s-tab-zoom {
        display: flex;
        justify-content: flex-start;
        /* Dàn đều ảnh nhỏ từ trái sang phải */
        gap: 10px;
        /* Khoảng cách giữa các ảnh nhỏ */
    }

    .s-tab-zoom li {
        list-style: none;
        width: 60px;
        /* Điều chỉnh kích thước ảnh nhỏ */
        height: 60px;
        /* Điều chỉnh kích thước ảnh nhỏ */
        cursor: pointer;
    }

    .s-tab-zoom img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }
</style>
<script>
    function validateQuantity() {
        const quantity = document.getElementById('quantity').value;
        const stock = <?= $sanphams['so_luong'] ?>;
        if (quantity > stock) {
            alert('Số lượng chọn không thể vượt quá số lượng trong kho!');
            return false;  // Prevent form submission
        }
        return true;
    }
    function addToCart(sanPhamId) {
        // Lấy số lượng từ input
        var soLuong = document.getElementById("so_luong").value;

        // Xây dựng URL với san_pham_id và so_luong
        var url = "<?= '?act=add_cart' ?>";
        // url += "&san_pham_id=" + sanPhamId + "&so_luong=" + soLuong;

        // Chuyển hướng tới URL đó
        window.location.href = '?act=add_cart';
    }
    $(document).ready(function() {
        // Khởi tạo Owl Carousel cho album ảnh
        $("#gallery_01").owlCarousel({
            loop: true, // Lặp lại
            margin: 10, // Khoảng cách giữa các ảnh nhỏ
            nav: true, // Hiển thị nút điều hướng
            dots: false, // Không hiển thị dấu chấm
            responsive: {
                0: {
                    items: 3, // Hiển thị 3 ảnh trên màn hình nhỏ
                },
                600: {
                    items: 4, // Hiển thị 4 ảnh trên màn hình trung bình
                },
                1000: {
                    items: 5, // Hiển thị 5 ảnh trên màn hình lớn
                }
            }
        });

        // Khởi tạo ElevateZoom cho hình ảnh chính
        $('#zoom1').elevateZoom({
            zoomType: 'inner', // Loại zoom (inner, lens...)
            cursor: 'crosshair', // Thay đổi con trỏ khi zoom
        });

        // Cập nhật hình ảnh chính khi click vào album ảnh
        $('.elevatezoom-gallery').on('click', function(e) {
            e.preventDefault();

            // Lấy ảnh mới và ảnh zoom
            var newImage = $(this).attr('data-image');
            var newZoomImage = $(this).attr('data-zoom-image');

            // Cập nhật hình ảnh chính và hình ảnh zoom
            $('#zoom1').attr('src', newImage);
            $('#zoom1').attr('data-zoom-image', newZoomImage);

            // Tái khởi động ElevateZoom sau khi thay đổi ảnh
            $('#zoom1').elevateZoom({
                zoomType: 'inner', // Loại zoom
                cursor: 'crosshair', // Loại con trỏ
            });
        });
    });