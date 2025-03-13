<?php
require_once "./views/layout/header.php";
?>
<div class="blog_page_section blog_nosidebar mt-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog_wrapper ">
                    <div class="blog_header">
                        <h1>Khuyến Mãi</h1>
                    </div>

                </div>
                <!-- khuyến mãi vào đây -->
                <div class="row g-5">
                    <?php foreach ($khuyenmais as $khuyenmai) : ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm h-100 border border-light rounded">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <!-- Tên khuyến mại -->
                                    <h3 class="card-title text-secondary fw-bold">
                                        <?= $khuyenmai['ten_khuyen_mai'] ?>
                                    </h3>
                                    <img src="https://i.imgur.com/ABp0cSl.png" style="width:150px" alt="">

                                    <!-- Mã khuyến mại -->
                                    <!-- <p class="mb-2 text-muted">
                                        <i class="bi bi-calendar-event"></i>
                                    <h4 class="mb-0 fw-bold text-danger fs-5">Mã khuyến mãi:
                                        <?= $khuyenmai['ma_khuyen_mai'] ?>
                                    </h4>
                                    </p> -->
                                    <!-- Thông tin ngày -->
                                    <p class="mb-2 text-muted">
                                        <i class="bi bi-calendar-event"></i>
                                        Bắt đầu: <?= $khuyenmai['ngay_bat_dau'] ?>
                                    </p>
                                    <p class="mb-3 text-muted">
                                        <i class="bi bi-calendar-x"></i>
                                        Kết thúc: <?= $khuyenmai['ngay_ket_thuc'] ?>
                                    </p>
                                    <!-- Nút sao chép -->
                                    <button class="btn btn-sm w-100 mt-auto copy-btn"
                                        style="background-color: #1e90ff; border-color: #1e90ff;"
                                        onclick="copyCode('<?= $khuyenmai['ma_khuyen_mai'] ?>')">
                                        Sao chép mã khuyến mại
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function copyCode(maKhuyenMai) {
        // Tạo textarea tạm thời để sao chép
        var textarea = document.createElement('textarea');
        textarea.value = maKhuyenMai;
        document.body.appendChild(textarea);

        // Chọn và sao chép
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);

        // Hiển thị thông báo
        alert("Đã sao chép mã khuyến mãi: " + maKhuyenMai);
    }
</script>
<style>
    .card-body {
        position: relative;
    }

    .card-body img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        /* To ensure the image doesn't overflow */
        height: auto;
    }
</style>
<?php
require_once "./views/layout/footer.php";
?>
</body>

</html>