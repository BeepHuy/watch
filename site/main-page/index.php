<?php
require '../../global.php';
require_once '../../dao/goods.php';
require_once '../../dao/type.php';

if (exist_param("about")) {
    $types = loai_select_all();
    $VIEW = "main-page/about.php";
    require '../layoutSmall.php';
} else if (exist_param("contact")) {
    $types = loai_select_all();
    $VIEW = "main-page/contact.php";
    require '../layoutSmall.php';
} else {
    $types = loai_select_all();
    $products = san_pham_select_all();
    $viewProducts = san_pham_select_so_luot_xem();
    $VIEW = "main-page/homepage.php";
    require '../layout.php';
}
?>
<!--  -->