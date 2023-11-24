<?php
require '../../global.php';
require '../../dao/brand.php';

check_login();

extract($_REQUEST);

if (exist_param('btn_update')) {
    try {
        hang_update($ma_hang, $ten_hang);
    } catch (Exception $exc) {
        $MESSAGE = 'Cập nhật thất bại!';
    }
    $VIEW = header("location: $ROOT_URL/admin/brand/index.php?btn_list");
} else if (exist_param('btn_edit')) {
    $brand = hang_select_by_id($ma_hang);
    extract($brand);
    $VIEW = 'brand/edit.php';
} else if (exist_param('btn_list')) {
    $brands = hang_select_all();
    $amounts = amount_brand();
    $VIEW = 'brand/list.php';
} else {
    $VIEW = 'brand/new.php';
}
require '../layout.php';
