<?php
require '../../global.php';
require '../../dao/goods.php';
require '../../dao/type.php';

extract($_REQUEST);

// Truy vấn mặt hàng theo mã
$product = san_pham_select_by_id($ma_sp);
extract($product);
$sameProducts = san_pham_select_by_loai($ma_loai);
$types = loai_select_all();
san_pham_tang_so_luot_xem($ma_sp);

extract($product);

$VIEW = "goods/detail-ui.php";

require '../layoutSmall.php';
?>
<!--  -->