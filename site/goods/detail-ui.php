<!DOCTYPE html>
<html lang="en">
<title>Chi Tiết <?= $ten_sp ?></title>

<body>
    <div class="detail">
        <div class="grid wide">
            <div class="row no-gutters">
                <div class="col l-6 m-12 c-12">
                    <div class="img-detail">
                        <?php
                        if ($giam_gia > 0) { ?>
                            <div class="product-discount-detail">
                                <span>-<?= $giam_gia; ?>%</span>
                            </div>
                        <?php } ?>
                        <div class="slideshow-container">
                            <div class="mySlides fade">
                                <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $hinh ?>" alt="" class="imge-detailMain">
                            </div>
                            <div class="mySlides fade">
                                <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $hinh_mota1 ?>" alt="" class="imge-detailMain">
                            </div>
                            <div class="mySlides fade">
                                <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $hinh_mota2 ?>" alt="" class="imge-detailMain">
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <span class="dot" onclick="currentSlide(1)">
                                <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $hinh ?>" alt="" class="detail-imagess">
                            </span>
                            <span class="dot" onclick="currentSlide(2)">
                                <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $hinh_mota1 ?>" alt="" class="detail-imagess">
                            </span>
                            <span class="dot" onclick="currentSlide(3)">
                                <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $hinh_mota2 ?>" alt="" class="detail-imagess">
                            </span>
                        </div>

                    </div>
                </div>
                <div class="col l-6 m-12 c-12">
                    <!-- <div class="wrapper-root-type">
                        <a class="root-type" href="<?= $SITE_URL ?>/main-page?homepage">Trang chủ</a>
                        <span class="divider">/</span>
                        <span class="root-type-name"><a href="<?= $SITE_URL ?>/goods/detail.php?ma_loai=<?= $ma_loai; ?>"><?= $ten_loai; ?></a></span>
                    </div> -->
                    <div class="info-detail">
                        <h1 class="name-product-detail"><?= $ten_sp ?></h1>
                        <div class="price-detail">
                            <del>
                                <?php
                                if ($giam_gia > 0) { ?>
                                    <del><?= number_format($don_gia, 0, ',', '.');  ?> đ</del>
                                <?php } ?>
                            </del>
                            <p><?= number_format($don_gia - ($don_gia * ($giam_gia / 100)), 0, ',', '.'); ?> đ</p>
                        </div>
                        <form action="cart.php?action=add" method="POST" enctype="multipart/form-data">
                            <div class="quantity">
                                <input type="button" value="-" class="btn-minus-quantity is-form">
                                <input type="number" name="quantity[<?= $ma_sp ?>]" class="ip-quantity" id="quantity" step="1" min="1" max="9999" value="1">
                                <input type="button" value="+" class="btn-plus-quantity is-form">
                            </div>
                            <button class="buy-now">
                                <strong>Mua ngay</strong>
                                <span>Gọi điện xác nhận và giao hàng tận nơi</span>
                            </button>
                        </form>
                        <div class="box-detail">
                            <div class="icon-box-detail"><img src="<?= $CONTENT_URL ?>/images/img-site/icon-freeship-detail.jpg" alt=""></div>
                            <p class="text-box-detail">Miễn phí vận chuyển với tất cả các mặt hàng</p>
                        </div>
                        <div class="box-detail">
                            <div class="icon-box-detail"><img src="<?= $CONTENT_URL ?>/images/img-site/icon-insurance-detail.jpg" alt=""></div>
                            <p class="text-box-detail">Bảo hành 12 tháng do lỗi nhà sản xuất</p>
                        </div>
                        <div class="box-detail">
                            <div class="icon-box-detail"><img src="<?= $CONTENT_URL ?>/images/img-site/icon-new-detail.jpg" alt=""></div>
                            <p class="text-box-detail">Cam kết 100% chính hãng</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB LINKS -->
            <div class="row no-gutters">
                <div class="col l-6 m-12 c-12 col-tabs-links">
                    <div class="wrapper-tab-links">
                        <ul class="tab-links">
                            <li><a href="#tab-description">Mô tả</a></li>
                            <li><a href="#tab-reviews">Đánh giá</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- TAB PANELs -->
            <div class="row no-gutters">
                <div class="col l-12 m-12 c-12">
                    <div class="wrapper-tab-panels">
                        <div id="tab-description" class="tab-content">
                            <?= $mo_ta; ?>
                        </div>
                        <div id="tab-reviews" class="tab-content">
                            <?php require 'comment.php'; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HÀNG CÙNG LOẠI -->
            <?php require 'same-product.php'; ?>
        </div>
    </div>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>

</html>