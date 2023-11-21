<?php
require '../../global.php';
require '../../dao/type.php';

check_login();

extract($_REQUEST);

if (exist_param("add")) {
    try {
        loai_insert($ten_loai);
        unset($ten_loai, $ma_loai);
    } catch (Exception $exc) {
        $MESSAGE = 'Thêm mới thất bại!';
    }
    $VIEW = header("location: $ROOT_URL/admin/type/index.php?btn_list");
} else if (exist_param('btn_list')) {
    $types = loai_select_all();
    $amounts = amount_type();
    $VIEW = 'type/list.php';
} else {
    $VIEW = 'type/new.php';
}

require '../layout.php';
