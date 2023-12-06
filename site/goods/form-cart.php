<?php
// hien thij so luong san pham
if (!empty($_SESSION['cart'])) {
    $sql = "SELECT * FROM san_pham WHERE ma_sp IN(" . implode(",", array_keys($_SESSION['cart'])) . ")";
    $products = query_all($sql);
}
if (isset($_GET['order'])) {
    if (isset($_POST['order_click'])) {
        $sql = "SELECT * FROM san_pham WHERE ma_sp IN(" . implode(",", array_keys($_POST['quantity'])) . ")";
        $products = query_all($sql);
        $total = 0;
        foreach ($products as $product) {
            $order_products[$product['ma_sp']] = $product;
            $don_gia = $product['don_gia'] - ($product['don_gia'] * ($product['giam_gia'] / 100));
            $so_luong = $_POST['quantity'][$product['ma_sp']];
            $total += $don_gia * $so_luong;
        }
        // Thêm đơn hàng vào bảng hóa đơn
        $insertBill = "INSERT INTO hoa_don (ma_hd, ten_kh, dia_chi, sdt, email, tong_tien, ngay_mua) VALUES (NULL, '" . $_POST['ten_kh'] . "', '" . $_POST['dia_chi'] . "', '" . $_POST['sdt'] . "', '" . $_POST['email'] . "', '" . $total . "', current_timestamp())";
        $conn = connection();
        $conn->exec($insertBill);
        $orderId = $conn->lastInsertId();

        $insert_string = "";
        foreach ($products as $key => $product) {
            $so_luong = $_POST['quantity'][$product['ma_sp']];
            $thanh_tien = ($product['don_gia'] - ($product['don_gia'] * ($product['giam_gia'] / 100))) * $so_luong;
            $insert_string .= "(NULL, '" . $product['ten_sp'] . "', '" . $product['don_gia'] . "', '" . $product['giam_gia'] . "', '" . $so_luong . "', '" . $don_gia * $so_luong . "', '" . $product['ma_sp'] . "', '$orderId')";
            if ($key != count($products) - 1) {
                $insert_string .= ",";
            }
        }
        // Thêm mới vào bảng chi tiết hóa đơn
        $insertBillDetail = "INSERT INTO chi_tiet_hoa_don (ma_cthd, ten_sp, don_gia, giam_gia, so_luong, thanh_tien, ma_sp, ma_hd) VALUES $insert_string";
        $conn->exec($insertBillDetail);
        unset($_SESSION['cart']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Thanh Toán Đơn Hàng</title>

<body>
    <div class="form-cart">
        <div class="grid wide">
            <?php if (isset($_SESSION['cart'])) { ?>
                <div class="row no-gutters">
                    <div class="col l-12 m-12 c-12">
                        <?php
                        if (!isset($_SESSION['user'])) { ?>

                            <p class="user-have-account"><a href="<?= $SITE_URL ?>/account/login.php">Đăng nhập để thanh
                                    toán <i class="fas fa-user"></i></a> |


                                <a href="<?= $SITE_URL ?>/account/register.php" class="user-have-account">Đăng
                                    ký <i class="fa-solid fa-pen-to-square"></i> </a>
                            </p>

                        <?php } ?>
                    </div>
                </div>
                <form id="form-cart" action="cart.php?order=submit" class="form-checkout" method="post">
                    <div class="row no-gutters">
                        <div class="col l-7 m-12 c-12">
                            <?php if (isset($_SESSION['user'])) { ?>
                                <div class="wrapper-custommer-detail">
                                    <div class="customer-detail">
                                        <h3>Thông tin thanh toán</h3>
                                        <?php if (isset($_SESSION['user'])) { ?>
                                            <div class="form-checkout-group">
                                                <!-- <input type="text" hidden name="ma_kh" id="ten_kh" value="<?= $_SESSION['user']['ma_kh'] ?>"> -->
                                                <label for="ten_kh">Tên <strong style="color: red;">*</strong></label>
                                                <input type="text" name="ten_kh" id="ten_kh" value="<?= $_SESSION['user']['ten_kh'] ?>">
                                            </div>
                                            <div class="form-checkout-group">
                                                <label for="sdt">Số điện thoại <strong style="color: red;">*</strong></label>
                                                <input type="text" name="sdt" id="sdt" value="">
                                            </div>
                                            <div class="form-checkout-group">
                                                <label for="dia_chi">Địa chỉ <strong style="color: red;">*</strong></label>
                                                <input type="text" name="dia_chi" id="dia_chi" value="">
                                            </div>
                                            <div class="form-checkout-group">
                                                <label for="email">Email <strong style="color: red;">*</strong></label>
                                                <input type="email" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>">
                                            </div>

                                        <?php } else { ?>
                                            <div class="form-checkout-group">
                                                <!-- <input type="text" hidden name="ma_kh" value="khách chưa đăng nhập"> -->
                                                <label for="ten_kh">Tên <strong style="color: red;">*</strong></label>
                                                <input type="text" name="ten_kh" id="ten_kh">
                                            </div>
                                            <div class="form-checkout-group">
                                                <label for="sdt">Số điện thoại <strong style="color: red;">*</strong></label>
                                                <input type="text" name="sdt" id="sdt">
                                            </div>
                                            <div class="form-checkout-group">
                                                <label for="dia_chi">Địa chỉ <strong style="color: red;">*</strong></label>
                                                <input type="text" name="dia_chi" id="dia_chi">
                                            </div>
                                            <div class="form-checkout-group">
                                                <label for="email">Email <strong style="color: red;">*</strong></label>
                                                <input type="email" name="email" id="email">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div style="text-align:center;">
                                    <img src="<?= $CONTENT_URL ?>/images/img-site/payment-method.png " alt="" width="350px" height="350px">
                                </div>


                            <?php } ?>

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
                                            <?php
                                            $tong = 0;
                                            foreach ($products as $product) {
                                                $don_gia = $product['don_gia'] - ($product['don_gia'] * ($product['giam_gia'] / 100));
                                                $so_luong = $_SESSION['cart'][$product['ma_sp']]; ?>
                                                <tr class="cart-item">
                                                    <td class="product-name-your-bill"> <?= $product['ten_sp'] ?>
                                                        <strong class="product-quantity-your-bill">× <?= $so_luong; ?></strong>
                                                        <input type="text" hidden name="quantity[<?= $product['ma_sp']; ?>]" value="<?= $so_luong; ?>">
                                                    </td>
                                                    <td class="product-total-your-bill">
                                                        <?= number_format($don_gia * $so_luong, 0, '.', ',') ?> <span style="text-decoration: underline;">đ</span>
                                                    </td>
                                                </tr>
                                            <?php
                                                $tong += $don_gia * $so_luong;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Tạm tính</th>
                                                <td class="product-total-your-bill">
                                                    <?= number_format($tong, 0, '.', ',') ?><span style="text-decoration: underline;">đ</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                <td class="product-total-your-bill">
                                                    <?= number_format($tong, 0, '.', ',') ?><span style="text-decoration: underline;">đ</span></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <?php if (isset($_SESSION['user'])) { ?>
                                        <div class="btn-order">
                                            <button type="submit" name="order_click">Đặt hàng</button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <p class="buy-success">Đặt hàng thành công</p>
            <?php } ?>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#form-cart").validate({
            rules: {
                "ten_kh": {
                    required: true
                },
                "sdt": {
                    required: true,
                    number: true,
                },
                "dia_chi": {
                    required: true,
                },
                "email": {
                    required: true,
                    email: true
                }
            },

            messages: {
                "ten_kh": {
                    required: "</br>Họ tên không được để trống!"
                },
                "sdt": {
                    required: "</br>Số điện thoại không được để trống!",
                    number: "</br>Số điện thoại phải là số!"
                },
                "dia_chi": {
                    required: "</br>Địa chỉ không được để trống!",
                },
                "email": {
                    required: "</br>Email không được để trống!",
                    email: "</br>Email không đúng định dạng!"
                },
            }
        });
    });
</script>