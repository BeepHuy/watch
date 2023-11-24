<!DOCTYPE html>
<html lang="en">

<head>
       
    <meta charset="UTF-8">
       
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
       
    <link rel="stylesheet" href="../../content/css/css-site/main.css">
       
    <link rel="stylesheet" href="../../content/css/css-site/gridsystem.css">
       
    <link rel="stylesheet" href="../../content/css/css-site/responsive.css">
        <title>Detail WATCH</title>
</head>

<body>
        <header class="header">
                <?php require '../layout/header.php'; ?>
            </header>
        <div class="detail">
                <div class="grid wide">
                        <div class="row no-gutters">
                                <div class="col l-6 m-12 c-12">
                                        <div class="img-detail">
                                                <div class="slideshow-container">
                                                        <div class="mySlides fade">
                                                                <img
                                    src="../../content/images/img-admin/img-products/converseMen02.png" alt=""
                                    class="imge-detailMain">
                                                            </div>
                                                        <div class="mySlides fade">
                                                                <img
                                    src="../../content/images/img-admin/img-products/converseMen03.png" alt=""
                                    class="imge-detailMain">
                                                            </div>
                                                        <div class="mySlides fade">
                                                                <img
                                    src="../../content/images/img-admin/img-products/converseMen01.png" alt=""
                                    class="imge-detailMain">
                                                            </div>
                                                    </div>
                                                <div style="text-align:center">
                                                        <span class="dot" onclick="currentSlide(1)">
                                                                <img
                                    src="../../content/images/img-admin/img-products/converseMen02.png" alt=""
                                    class="detail-imagess">
                                                            </span>
                                                        <span class="dot" onclick="currentSlide(2)">
                                                                <img
                                    src="../../content/images/img-admin/img-products/converseMen03.png" alt=""
                                    class="detail-imagess">
                                                            </span>
                                                        <span class="dot" onclick="currentSlide(3)">
                                                                <img
                                    src="../../content/images/img-admin/img-products/converseMen01.png" alt=""
                                    class="detail-imagess">
                                                            </span>
                                                    </div>
                                                <div class="product-discount-detail">
                                                        <span>10%</span>
                                                    </div>

                                            </div>

                                    </div>

                                <div class="col l-6 m-12 c-12">

                                        <div class="info-detail">
                                                <h1 class="name-product-detail">Nike Air Force 1 GS BLACK</h1>
                                                <div class="price-detail">
                                                        <del>
                                                                <del>2.700.000 đ</del>
                                                            </del>
                                                        <p>3.000.000 đ</p>
                                                    </div>
                                                <form action="./show-cart.php" method="POST"
                            enctype="multipart/form-data">
                                                        <div class="quantity">
                                                                <input type="button" value="-"
                                    class="btn-minus-quantity is-form">
                                                                <input type="number" name="quantity" class="ip-quantity"
                                    id="quantity" step="1" min="1" max="50" value="1">
                                                                <input type="button" value="+"
                                    class="btn-plus-quantity is-form">
                                                            </div>
                                                        <button class="buy-now">
                                                                <strong>Mua ngay</strong>
                                                                <span>Gọi điện xác nhận và giao hàng tận nơi</span>
                                                            </button>
                                                    </form>
                                                <div class="box-detail">
                                                        <div class="icon-box-detail"><img
                                    src="../../content//images/img-site/icon-freeship-detail.jpg" alt=""></div>
                                                        <p class="text-box-detail">Miễn phí vận chuyển với tất cả các
                                mặt hàng</p>
                                                    </div>
                                                <div class="box-detail">
                                                        <div class="icon-box-detail"><img
                                    src="../../content//images/img-site/icon-insurance-detail.jpg" alt=""></div>
                                                        <p class="text-box-detail">Bảo hành 12 tháng do lỗi nhà sản xuất
                            </p>
                                                    </div>
                                                <div class="box-detail">
                                                        <div class="icon-box-detail"><img
                                    src="../../content//images/img-site/icon-new-detail.jpg" alt=""></div>
                                                        <p class="text-box-detail">Cam kết 100% chính hãng</p>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
        <footer class="footer-wrapper">
                <?php require '../layout/footer.php'; ?>
            </footer>
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