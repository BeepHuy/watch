<?php
require '../../global.php';
require '../../dao/goods.php';
require '../../dao/type.php';

extract($_REQUEST);

if (exist_param("ma_loai")) {
    $products = san_pham_select_by_loai($ma_loai);
    $types = loai_select_all();
    $VIEW = "goods/listed-ui.php";
} else if (exist_param("keywords")) {
    $products = san_pham_select_keyword($keywords);
    $types = loai_select_all();
    $VIEW = "goods/listed-ui.php";
} else if (exist_param("giam_gia")) {
    $products = san_pham_select_giam_gia();
    $types = loai_select_all();
    $VIEW = "goods/listed-ui-giam-gia.php";
} else if (exist_param("continue_shopping")) {
    $products = san_pham_select_all();
    $types = loai_select_all();
    $VIEW = "goods/list-allshop.php";
} else {
    $products = san_pham_select_all();
    $VIEW = "goods/listed-ui.php";
}

require '../layoutSmall.php';
?>
<!--  -->