<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../../content/css/css-site/main.css">
<link rel="stylesheet" href="../../content/css/css-site/gridsystem.css">
<link rel="stylesheet" href="../../content/css/css-site/responsive.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<body>
    <header class="header">
        <?php require '../layout/header.php'; ?>
    </header>
    <div class="form-cart">
        <div class="grid wide">
            <!-- <div class="row no-gutters">
                <div class="col l-12 m-12 c-12">
                </div>
            </div> -->
            <form id="form-cart" action="" class="form-checkout" method="post">
                <div class="row no-gutters">
                    <div class="col l-7 m-12 c-12">
                        <div class="wrapper-custommer-detail">
                            <div class="customer-detail">
                                <h3>Thông tin thanh toán</h3>
                                <div class="form-checkout-group">
                                    <label for="ten_kh">Tên <strong style="color: red;">*</strong></label>
                                    <input type="text" name="ten_kh" id="ten_kh" value="Hoàng Quang Huy">
                                </div>
                                <div class="form-checkout-group">
                                    <label for="sdt">Số điện thoại <strong style="color: red;">*</strong></label>
                                    <input type="text" name="sdt" id="sdt" value="0914114112">
                                </div>
                                <div class="form-checkout-group">
                                    <label for="dia_chi">Địa chỉ <strong style="color: red;">*</strong></label>
                                    <input type="text" name="dia_chi" id="dia_chi" value="173 Nguyễn Thị Nhi">
                                </div>
                                <div class="form-checkout-group">
                                    <label for="email">Email <strong style="color: red;">*</strong></label>
                                    <input type="email" name="email" id="email" value="huy@gmail.com">
                                </div>
                            </div>
                        </div>
                        <a href="/account/register.php" class="new-account">Tạo tài khoản mới?</a>
                    </div>
                    <div class="col l-5 m-12 c-12">
                        <div class="wrapper-your-bill">
                            <div class="your-bill">
                                <h3>Đơn hàng của bạn</h3>
                                <table class="tb-your-bill">
                                    <thead>
                                        <tr>
                                            <th class="product-name-your-bill">Sản phẩm</th>
                                            <th class="product-total-your-bill">Tạm tính</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="cart-item">
                                            <td class="product-name-your-bill"> CONVERSE CHUCK TAYLOR ALL START
                                                <strong class="product-quantity-your-bill">× 1 </strong>
                                                <input type="text" hidden name="quantity" value="1">
                                            </td>
                                            <td class="product-total-your-bill">
                                                3.000.000 <span style="text-decoration: underline;">đ</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td class="product-total-your-bill">3.000.000<span style="text-decoration: underline;">đ</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng</th>
                                            <td class="product-total-your-bill">3.000.000<span style="text-decoration: underline;">đ</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="btn-order">
                                    <button type="submit" name="order_click">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer-wrapper">
        <?php require '../layout/footer.php'; ?>
    </footer>
</body>

</html>