<?php
require_once "../../global.php";
require_once "../../dao/statistic.php";

check_login();
$VIEW = "main-page/chart.php";

$bills = thong_ke_don_hang_all();
$products = thong_ke_san_pham_all();
$customers = thong_ke_khach_hang_all();
$comments = thong_ke_binh_luan_all();
$productsOfType = thong_ke_san_pham();

require "../layout.php";
?>
<!--  -->