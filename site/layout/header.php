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
    <title>WATCH</title>
</head>

<body>
    <div class="grid">
        <!-- HEADER MENU -->
        <div class=" header-menu ">
            <label for="checkbox-res"><i class="fa-solid fa-bars icon-show-menu l-0"></i></label>
            <input hidden type="checkbox" class="checkbox-res" id="checkbox-res">
            <label for="checkbox-res" class="overlay m-0 c-0 l-0"></label>
            <div class="menu-res l-0">
                <label for="checkbox-res" class="icon-close-res"><i class="fa-solid fa-xmark"></i></label>
                <div class="wrapper-search-res">
                    <form action="/goods/listed.php" method="post" class="search-res" enctype="multipart/form-data">
                        <input class=ip-search-res name="keywords" type="text" value="" placeholder="Tìm kiếm...">
                        <button class="submit-search-res" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <!-- MENU RESPONSIVE -->
                <ul class="main-menu-res">
                    <li><a href="/main-page?homepage">Trang chủ</a></li>
                    <li><a href="/main-page?about">Giới thiệu</a></li>
                    <li><a href="/goods/listed.php?continue_shopping">Sản phẩm</a></li>
                    <li><a href="/main-page?contact">Liên hệ</a></li>
                    <li></li>
                </ul>
            </div>
            <div class="logo">
                <a href="../main-page/index.php"><img src="../../content/images/img-admin/logo.png" alt="Logo"></a>
            </div>
            <div class="header-nav m-0 c-0">

                <!-- MAIN MENU -->
                <ul class="main-menu">
                    <li><a href="../main-page/index.php" class="link">Trang chủ</a></li>
                    <li><a href="../main-page/about.php" class="link">Giới thiệu</a></li>
                    <li>
                        <a href="../goods/list-allshop.php" class="link">Sản phẩm</a>
                        <!-- CHILD MENU -->
                        <ul class="child-menu">
                            <li><a href="">Giày Nam</a></li>
                            <li><a href="">Giày Nữ</a></li>
                        </ul>
                    </li>
                    <li><a href="../main-page/contact.php" class="link">Liên hệ</a></li>
                </ul>
            </div>

            <!-- TOOLS -->
            <div class="tools">
                <ul class="tools-item">
                    <li>
                        <a class="icon-search m-0 c-0">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <div class="wrapper-search">
                                <form action="/goods/listed.php" method="post" class="search">
                                    <input class="ip-search" name="keywords" type="text" placeholder="Tìm kiếm...">
                                    <button class="submit-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="../goods/show-cart.php" class="icon-cart"><i title="Giỏ hàng" class="fa-sharp fa-solid fa-basket-shopping"></i></a>
                    </li>
                    <li>
                    <?php
                        if (isset($_SESSION['user'])) {
                            require 'login-info.php';
                        } else {
                            require 'login-form.php';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="../../content/js/search-header.js"></script>
    <script src="../../content/js/js-site/main.js"></script>
    <script src="../../content/js/js-site/slide.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</body>

</html>
