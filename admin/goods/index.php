<?php
require '../../global.php';
require '../../dao/goods.php';
require '../../dao/type.php';
require '../../dao/brand.php';

check_login();

extract($_REQUEST);

if (exist_param("btn_delete")) {
    try {
        san_pham_delete($ma_sp);
        $products = san_pham_select_page();
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/goods/index.php?btn_list");
} else if (exist_param("btn_delete_all")) {
    try {
        san_pham_delete_all();
        $products = san_pham_select_page();
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/goods/index.php?btn_list");
} else if (exist_param("btn_list")) {
    $products = san_pham_select_page();
    $amounts = amount_goods();
    $VIEW = "goods/list.php";
} else {
    $VIEW = "goods/new.php";
}

if ($VIEW == "goods/new.php" || $VIEW == "goods/edit.php") {
    $loai_select_list = loai_select_all();
    $hang_select_list = hang_select_all();
}

require "../layout.php";

