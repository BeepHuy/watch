<body>
    <div class="grid wide footer-content">
        <div class="row no-gutters">
            <div class="col l-3 m-3 c-12">
                <div class="col-inner">
                    <h2 class="footer-heading">Liên kết</h2>
                    <ul class="footer-list">
                        <li><a href="<?= $SITE_URL ?>/main-page?homepage">Trang chủ</a></li>
                        <li><a href="<?= $SITE_URL ?>/main-page?about">Giới thiệu</a></li>
                        <?php
                        foreach ($types as $type) {
                            extract($type);
                            $href = "$SITE_URL/goods/listed.php?ma_loai=$ma_loai"; ?>
                            <li><a href="<?= $href; ?>"><?= $ten_loai; ?></a></li>
                        <?php } ?>
                        <li><a href="<?= $SITE_URL ?>/main-page?contact">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col l-6 m-6 c-12 middle">
                <div class="col-inner">
                    <div class="footer-logo">
                        <img src="<?= $CONTENT_URL ?>/images/img-site/logo.png" alt="Logo footer">
                    </div>
                    <p class="intro">Chúng tôi luôn không ngừng cố gắng, đem đến cho người tiêu dùng những
                        sản phẩm mới, chất lượng với giá thành phù hợp!
                    </p>
                    <div class="social">
                        <a href="https://www.facebook.com/"><img src="<?= $CONTENT_URL ?>/images/img-site/facebook.png" alt=""></a>
                        <a href="https://www.instagram.com/"><img src="<?= $CONTENT_URL ?>/images/img-site/instagram.png" alt=""></a>
                        <a href="https://www.tiktok.com/foryou"><img src="<?= $CONTENT_URL ?>/images/img-site/tiktok.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col l-3 m-3 c-12">
                <div class="col-inner">
                    <h2 class="footer-heading">Thông tin liên hệ</h2>
                    <div class="footer-contact">
                        <p>Địa chỉ: 137 Nguyễn Thị Thập, Hòa Minh, Liên Chiểu, Đà Nẵng</p>
                        <p>Số điện thoại: 0901749631</p>
                        <p>Email: shopdongho@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="copyright-footer">
                <p>© All rights reserved. Thiết kế website by KiXo Watch</p>
            </div>
        </div>
    </div>
</body>