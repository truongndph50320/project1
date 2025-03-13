
<?php
require_once './views/layout/header.php';
?>


    <div class="contact_map mt-60">
        <div class="map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863806019032!2d105.74468687383728!3d21.038134787459313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1732121134169!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>Liên hệ với chúng tôi</h3>
                        <p>Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua email hoặc hotline để được hỗ trợ nhanh chóng!</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Address : Trịnh Văn Bô - Hà Nội.</li>
                            <li><i class="fa fa-envelope-o"> </i> Email: ProtechHub@gmail.com<a
                                    href="mailto:demo@example.com">demo@example.com </a>
                            </li>
                            <li><i class="fa fa-phone"></i> Phone:<a href="tel: 0123456789"> 0123456789 </a> </li>
                        </ul>>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>Thông tin liên lạc của bạn</h3>
                        <form action="?act=lien_he/create" method="POST"
                            enctype="multipart/form-data">
                            <p>
                                <label for="ten" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="ten"
                                    name="ten" value="<?php echo $_SESSION['old_data']['ten'] ?? ''; ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?>
                                </span>
                            </p>
                            <p>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email"
                                    name="email" value="<?php echo $_SESSION['old_data']['email'] ?? ''; ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                                </span>
                            </p>
                            <p>
                                <label for="sdt" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $_SESSION['old_data']['sdt'] ?? ''; ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION['errors']['sdt']) ? $_SESSION['errors']['sdt'] : '' ?>
                                </span>
                            </p>
                            <div class="contact_textarea">
                                <label for="noi_dung" class="form-label">Nội dung</label>
                                <textarea class="form-control" id="noi_dung" name="noi_dung"
                                    rows="3"><?php echo $_SESSION['old_data']['noi_dung'] ?? ''; ?></textarea value="">
                                <span class="text-danger">
                                    <?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
                                </span>
                            </div>
                            <button type="submit"> Gửi</button>
                            <p class="form-messege"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


        <?php
        require_once "./views/layout/footer.php";
        ?>
</body>

</html>