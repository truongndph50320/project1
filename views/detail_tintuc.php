<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/junko/junko/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 05:47:14 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website bán laptop ProtechHub</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logone.png">
    <!-- <div class="logo">
                             <a href="<?= BASE_URL ?>"><img src="assets/img/logo/logone.png" alt=""></a>
                         </div> -->

    <!-- CSS 
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <?php
    require_once "./views/layout/header.php";
    ?>
    <div class="blog_details mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper">
                        <?php
                        $stt = 1;
                        $tintuc = new TinTuc();
                        $tintucs = $tintuc->getById($id);
                        ?>
                        <article class="single_blog">
                            <figure>
                                <div class="post_header">
                                    <h3 class="post_title"><?php echo $tintucs['tieu_de']; ?></h3>
                                    <div class="blog_meta">
                                        <span class="author">Posted by : <a href="#">admin</a> / </span>
                                        <span class="post_date">On : <a href="#"><?php echo $tintucs['ngay_tao']; ?></a> /</span>

                                    </div>
                                </div>
                                <div class="blog_thumb">
                                    <a href="#"><img src="admin/uploads/<?= $tintucs['hinh_anh'] ?>" alt="" width="100%"></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="post_content">
                                        <p><?php echo $tintucs['noi_dung']; ?></p>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>



                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="blog_header">
                            <h3>Tin tức khác</h3>
                        </div>
                        <?php
                        $stt = 1;
                        $tintuc = new TinTuc();
                        $tintucs = $tintuc->getAll();
                        foreach ($tintucs as $tintuc): ?>
                            <article class="d-flex justify-content-center align-items-center  mt-5">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="?act=detail_tintucs&id=<?php echo $tintuc['id']; ?>"><img src="admin/uploads/<?= $tintuc['hinh_anh'] ?>"  alt="" width="100%"></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h3><a href="?act=detail_tintucs&id=<?php echo $tintuc['id']; ?>"><?php echo $tintuc['tieu_de']; ?></a></h3>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


        </div>

        <?php
        require_once "./views/layout/footer.php";
        ?>
</body>

</html>