<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../content/css/css-site/main.css">
    <link rel="stylesheet" href="../../content/css/css-site/gridsystem.css">
    <link rel="stylesheet" href="../../content/css/css-site/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <header class="header">
        <?php require '../layout/header.php'; ?>
    </header>
    <div class="show-cart">
        <div class="grid wide">
            <div class="row no-gutters">
                <div class="col l-7 m-12 c-12">
                    <form action="" method="post">
                        <div class="form-show-cart">
                            <table class="tb-form-show-cart">
                                <thead>
                                    <tr>
                                        <th class="name-product" colspan="3">SẢN PHẨM</th>
                                        <th class="price-product c-0">GIÁ</th>
                                        <th class="amount-product">SỐ LƯỢNG</th>
                                        <th class="total-product c-0">TẠM TÍNH</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tr-product">
                                        <td class="remove-product"><a href=""><i class="fa-regular fa-circle-xmark"></i></a></td>
                                        <td class="img-product"><img src="../../content/images/img-admin/img-products/nikeMen01.jpg" alt=""></td>
                                        <td class="name-product"><a href="">CONVERSE CHUCK ALL START</a>
                                            <p class="l-0 m-0">
                                                <span class="amount-product-mobile">1 x</span>
                                                <span class="price-product-mobile">3.000.000 <span style="text-decoration: underline;">đ</span></span>
                                            </p>
                                        </td>
                                        <td class="price-product c-0"> 3.000.000<span style="text-decoration: underline;">đ</span></td>
                                        <td class="amount-product">
                                            <div class="quantity">
                                                <input type="number" name="quantity" class="ip-quantity" id="quantity" step="1" min="0" max="50" value="1">
                                            </div>
                                        </td>
                                        <td class="total-product c-0">3.000.000 <span style="text-decoration: underline;">đ</span></td>
                                    </tr>
                                    <tr>
                                        <td class="td-continue-shopping" colspan="6">
                                            <div class="continue-shopping">
                                                <a href="../goods/list-allshop.php" class="button-continue-shopping">← TIẾP TỤC XEM SẢN PHẨM</a>
                                                <input type="submit" name="update_click" value="CẬP NHẬT GIỎ HÀNG" class="update-shopping">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="col l-5 m-12 c-12">
                    <div class="amount-show-cart">
                        <table class="tb1">
                            <thead>
                                <tr>
                                    <th class="name-product">CỘNG GIỎ HÀNG</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="tb2">
                            <tbody>
                                <tr>
                                    <th>Tạm tính</th>
                                    <td>3.000.000 <span style="text-decoration: underline;">đ</span></td>
                                </tr>
                                <tr>
                                    <th>Tổng</th>
                                    <td>3.000.000<span style="text-decoration: underline;">đ</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="checkout">
                            <a href="./form-cart.php" class="button-checkout">TIẾN HÀNH THANH TOÁN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-wrapper">
        <?php require '../layout/footer.php'; ?>
    </footer>
</body>

</html>