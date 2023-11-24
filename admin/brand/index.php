<?php require '../../global.php';
require '../../dao/brand.php';

check_login();

extract($_REQUEST);

if (exist_param("add")) {
    try {
        hang_insert($ten_hang);
        unset($ten_hang, $ma_hang);
    } catch (Exception $exc) {
        $MESSAGE = 'Thêm mới thất bại!';
    }
    $VIEW = header("location: $ROOT_URL/admin/brand/index.php?btn_list");
} else {
    $VIEW = 'brand/new.php';
}

require '../layout.php';
