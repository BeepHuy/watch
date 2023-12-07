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

<head>
    <style>
        .modal__overlay {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            transition: opacity 0.3s ease;
        }

        .modal {
            /* display: none; */
            padding: 20px;
            background-color: #fff;
            padding: 20px 30px;
            position: relative;
            top: 40%;
            width: 30%;
            margin: 0 auto;
        }

        .modal-text {
            margin: 20px 0;
        }

        .modal-button {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .modal-true,
        .modal-false {
            padding: 4px 6px;
            cursor: pointer;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 8px;
            cursor: pointer;
            color: black;
            font-size: 1.2rem;
            border: none;
        }
    </style>
</head>

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
                                            <th class="name-product" colspan="3">SẢN PHẨM</th>
                                            <th class="price-product c-0">GIÁ</th>
                                            <th class="amount-product">SỐ LƯỢNG</th>
                                            <th class="total-product c-0">TẠM TÍNH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tong = 0;

                                        foreach ($products as $product) {
                                            $don_gia = $product['don_gia'] - ($product['don_gia'] * ($product['giam_gia'] / 100));
                                            $so_luong = $_SESSION['cart'][$product['ma_sp']]; ?>
                                            <tr class="tr-product">
                                                <!-- <td class="remove-product">
                                                    <a href="cart.php?action=delete&id=<?= $product['ma_sp'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này không?')">
                                                        <i class="fa-regular fa-circle-xmark"></i>
                                                    </a>
                                                </td> -->
                                                <td class="remove-product">
                                                    <a href="#" onclick="openModal(<?= $product['ma_sp'] ?>)">
                                                        <i class="fa-regular fa-circle-xmark"></i>
                                                    </a>
                                                </td>
                                                <div class="modal__overlay" id="myModal">
                                                    <div class="modal">
                                                        <p class="modal-text">Bạn chắc chắn muốn xóa sản phẩm này không?</p>
                                                        <div class="modal-button">
                                                            <button class="modal-true" onclick="confirmDelete()">Xác nhận</button>
                                                            <button class="modal-false" onclick="closeModal()">Hủy</button>
                                                        </div>
                                                        <button class="modal-close" onClick="closeModal">X</button>
                                                    </div>
                                                </div>
                                                <script>
                                                    function openModal(productId) {
                                                        // Hiển thị modal khi nhấn nút xóa
                                                        document.getElementById('myModal').style.display = 'block';

                                                        // Lưu id sản phẩm vào một trường ẩn để sử dụng khi xác nhận xóa
                                                        document.getElementById('productToDelete').value = productId;
                                                    }

                                                    function closeModal() {
                                                        // Ẩn modal khi nhấn nút Hủy
                                                        document.getElementById('myModal').style.display = 'none';
                                                    }

                                                    function confirmDelete() {
                                                        var productId = document.getElementById('productToDelete').value;

                                                        // Sử dụng Ajax để gửi yêu cầu xóa sản phẩm
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.onreadystatechange = function() {
                                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                                // Xử lý phản hồi từ máy chủ (nếu cần)
                                                                // Có thể làm điều gì đó sau khi xóa thành công, chẳng hạn như làm mới trang hoặc cập nhật danh sách sản phẩm.
                                                            }
                                                        };
                                                        xhr.open('GET', 'cart.php?action=delete&id=' + productId, true);
                                                        xhr.send();

                                                        closeModal(); // Đóng modal sau khi xác nhận xóa
                                                    }
                                                </script>
                                                <input type="hidden" id="productToDelete" value="">
                                                <td class="img-product">
                                                    <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $product['hinh'] ?>" alt="">
                                                </td>
                                                <td class="name-product"><a href="<?= $SITE_URL ?>/goods/detail.php?ma_sp=<?= $product['ma_sp'] ?>"><?= $product['ten_sp'] ?></a>
                                                    <p class="l-0 m-0">
                                                        <span class="amount-product-mobile"><?= $so_luong; ?> x</span>
                                                        <span class="price-product-mobile"><?= number_format($don_gia, 0, '.', ',') ?> <span style="text-decoration: underline;">đ</span></span>
                                                    </p>
                                                </td>
                                                <td class="price-product c-0"> <?= number_format($don_gia, 0, '.', ','); ?> <span style="text-decoration: underline;">đ</span></td>
                                                <td class="amount-product">
                                                    <div class="quantity">
                                                        <!-- <input type="button" value="-" class="btn-minus-quantity is-form"> -->
                                                        <input type="number" name="quantity[<?= $product['ma_sp'] ?>]" class="ip-quantity" id="quantity" step="1" min="0" max="50" value="<?= $so_luong; ?>">
                                                        <!-- <input type="button" value="+" class="btn-plus-quantity is-form"> -->
                                                    </div>
                                                </td>
                                                <td class="total-product c-0"><?= number_format($don_gia * $so_luong, 0, '.', ',') ?> <span style="text-decoration: underline;">đ</span></td>
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

</html>