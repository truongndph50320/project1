    
    <!--blog area start-->
    <?php
require_once './views/layout/header.php';
?>

    <div class="blog_page_section blog_nosidebar mt-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog_wrapper ">
                        <div class="blog_header">
                            <h1>Tin Tức</h1>
                        </div>
                        <?php
                        $stt = 1;
                        $tintuc = new TinTuc();
                        $tintucs = $tintuc->getAll();
                        foreach ($tintucs as $tintuc): ?>
                            <article class="d-flex justify-content-center align-items-center  mt-5">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="?act=detail_tintucs&id=<?php echo $tintuc['id']; ?>"><img src="admin/uploads/<?= $tintuc['hinh_anh'] ?>" alt="" width="100%"></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h3><a href="?act=detail_tintucs&id=<?php echo $tintuc['id']; ?>"><?php echo $tintuc['tieu_de']; ?></a></h3>
                                        <div class="blog_meta">
                                            <span class="author">Posted by : <a href="#">admin</a> / </span>
                                            <span class="post_date">On : <a href="#"><?php echo $tintuc['ngay_tao']; ?></a></span>
                                        </div>
                                       
                                        <footer class="readmore_button">
                                                <a href="?act=detail_tintucs&id=<?php echo $tintuc['id']; ?>">read more</a>
                                            </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->

    <!--blog pagination area start-->
    <!-- <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--blog pagination area end-->

    <!--footer area start-->
    <!-- <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p>We are a team of designers and developers that
                                    create high quality HTML Template, Woocommerce, Shopify Theme.</p>
                                <p><span>Address</span> Your address goes here.</p>
                                <p><span>Mobile: </span><a href="tel:0123456789">0123456789</a> – <a
                                        href="tel:0123456789">0123456789</a> </p>
                                <p><span>Support: </span><a href="mailto:demo@example.com">demo@example.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="blog.html">Delivery Information</a></li>
                                    <li><a href="contact.html">Privacy Policy</a></li>
                                    <li><a href="services.html">Terms & Conditions</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Gift Certificates</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>My Account</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="wishlist.html">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                    <li><a href="faq.html">International Orders</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Follow Us</h3>
                            <div class="footer_social_link">
                                <ul>
                                    <li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a class="instagram" href="#" title="instagram"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li><a class="rss" href="#" title="rss"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                            <div class="subscribe_form">
                                <h3>Join Our Newsletter Now</h3>
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off"
                                        placeholder="Your email address..." />
                                    <button id="mc-submit">Subscribe!</button>
                                </form>
                                <--mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                <!-- </div><! mailchimp-alerts end
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p class="copyright-text">&copy; 2022 <a href="index.html">Junko</a>. Made with <i
                                    class="fa fa-heart text-danger"></i> by <a href="https://hasthemes.com/"
                                    target="_blank">HasThemes</a> </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-end">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>  -->
    <!--footer area end-->
    <?php
require_once './views/layout/footer.php';
?>
    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>