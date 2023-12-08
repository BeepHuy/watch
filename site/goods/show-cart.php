<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['action'])) {
    function update_cart($add = false)
    {
        foreach ($_POST['quantity'] as $id => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                if ($add) {
                    if (!isset($_SESSION['cart'][$id])) {
                        $_SESSION['cart'][$id] = $quantity;
                    } else {
                        $_SESSION['cart'][$id] += $quantity;
                    }
                } else {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
    }

    switch ($_GET['action']) {
        case "add":
            update_cart(true);
            break;
        case "delete":
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            break;
        case "submit":
            if (isset($_POST['update_click'])) {
                update_cart();
            }
            break;
    }
}
if (!empty($_SESSION['cart'])) {
    $sql = "SELECT * FROM san_pham WHERE ma_sp IN(" . implode(",", array_keys($_SESSION['cart'])) . ")";
    $products = query_all($sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<title>Giỏ Hàng</title>
<style>
    .confirmModal .modal {
        display: none;
    }

    .confirmModal .modal .modal-content {
        box-shadow: 0px 2px 5px 5px #d0fafd8a;
        z-index: 25;
        border: 1px solid #eeee;
        width: 450px;
        height: 150px;
        top: 25%;
        left: 44%;
        text-align: center;
        border-radius: 20px;
        position: absolute;
        background-color: #ffffff;
        padding: 50px 10px 0px 10px;
    }

    .confirmModal .modal button {
        width: 100px;
        color: #ffffff;
        padding: 8px;
        margin: 5px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
    }

    .confirmModal .modal #modalText {
        color: #333;
    }

    .confirmModal .modal #confirmDelete {
        background-color: #26b99a;
    }

    .confirmModal .modal #cancelDelete {
        background-color: #ea2214;
    }
</style>

<body>
    <div class="show-cart">
        <div class="grid wide">
            <div class="row no-gutters">
                <?php
                if (isset($products) && count($products) > 0) { ?>
                    <div class="col l-7 m-12 c-12">
                        <form action="cart.php?action=submit" method="post">
                            <div class="form-show-cart">
                                <table class="tb-form-show-cart">
                                    <thead>
                                        <tr>
                                            <th class="name-product item1">SẢN PHẨM</th>
                                            <th class="price-product c-0 item2">GIÁ</th>
                                            <th class="amount-product item3">SỐ LƯỢNG</th>
                                            <th class="total-product c-0 item4">TẠM TÍNH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tong = 0;

                                        foreach ($products as $product) {
                                            $don_gia = $product['don_gia'] - ($product['don_gia'] * ($product['giam_gia'] / 100));
                                            $so_luong = $_SESSION['cart'][$product['ma_sp']]; ?>
                                            <tr class="tr-product">
                                                <td class="remove-product">
                                                    <a href="cart.php?action=delete&id=<?= $product['ma_sp'] ?>" id="delete">
                                                        <i class="fa-regular fa-circle-xmark"></i>
                                                    </a>
                                                </td>
                                                <td class="img-product"><img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $product['hinh'] ?>" alt=""></td>
                                                <td class="name-product"><a href="<?= $SITE_URL ?>/goods/detail.php?ma_sp=<?= $product['ma_sp'] ?>"><?= $product['ten_sp'] ?></a>
                                                    <p class="l-0 m-0">
                                                        <span class="amount-product-mobile"><?= $so_luong; ?> x</span>
                                                        <span class="price-product-mobile"><?= number_format($don_gia, 0, '.', ',') ?> <span style="text-decoration: underline;">đ</span></span>
                                                    </p>
                                                </td>
                                                <td class="price-product c-0" style="margin-left:30px;"> <?= number_format($don_gia, 0, '.', ','); ?> <span style="text-decoration: underline;">đ</span></td>
                                                <td class="amount-product" style="margin-left:55px;">
                                                    <div class="quantity">
                                                        <!-- <input type="button" value="-" class="btn-minus-quantity is-form"> -->
                                                        <input type="number" name="quantity[<?= $product['ma_sp'] ?>]" class="ip-quantity" id="quantity" step="1" min="0" max="50" value="<?= $so_luong; ?>">
                                                        <!-- <input type="button" value="+" class="btn-plus-quantity is-form"> -->
                                                    </div>
                                                </td>
                                                <td class="total-product c-0" style="margin-left:70px;"><?= number_format($don_gia * $so_luong, 0, '.', ',') ?> <span style="text-decoration: underline;">đ</span></td>
                                            </tr>
                                        <?php
                                            $tong += $don_gia * $so_luong;
                                        } ?>
                                        <tr>
                                            <td class="td-continue-shopping" colspan="6">
                                                <div class="continue-shopping">
                                                    <a href="<?= $SITE_URL ?>/goods/listed.php?continue_shopping" class="button-continue-shopping">← TIẾP TỤC XEM SẢN PHẨM</a>
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
                                        <td><?= number_format($tong, 0, '.', ',') ?> <span style="text-decoration: underline;">đ</span></td>
                                    </tr>
                                    <tr>
                                        <th>Tổng</th>
                                        <td><?= number_format($tong, 0, '.', ',') ?> <span style="text-decoration: underline;">đ</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="checkout">
                                <a href="<?= $SITE_URL ?>/goods/cart.php?btn_form_cart" class="button-checkout">TIẾN HÀNH THANH TOÁN</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col l-12 m-12 c-12">
                        <div class="cart-empty">
                            <p class="mes-cart-empty">Chưa có sản phẩm nào trong giỏ hàng.</p>

                            <p><a href="<?= $SITE_URL ?>/goods/listed.php?continue_shopping" class="back-shop">Quay trở lại cửa hàng</a></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<div class="confirmModal">
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p id="modalText"></p>
            <button id="confirmDelete">Xác nhận</button>
            <button id="cancelDelete">Hủy</button>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // CHECK DELETE
        const checkDelete = document.querySelectorAll("#delete");
        checkDelete.forEach(function(checkDelete) {
            checkDelete.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ 'a'

                // Hiển thị modal
                const modal = document.getElementById('confirmationModal');
                const modalText = document.getElementById('modalText');
                modal.style.display = 'block';
                modalText.innerHTML = 'Bạn thật sự muốn xóa nó sao?';

                // Xác nhận xoá khi nút xác nhận được nhấn
                document.getElementById('confirmDelete').addEventListener('click', function() {
                    window.location.href = checkDelete.href;
                });

                // Ẩn modal khi nút Hủy được nhấn
                document.getElementById('cancelDelete').addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            });
        });
    });
</script>

</html>