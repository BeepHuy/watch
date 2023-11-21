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
} else if (exist_param('btn_update')) {
    try {
        loai_update($ma_loai, $ten_loai);
    } catch (Exception $exc) {
        $MESSAGE = 'Cập nhật thát bại!';
    }
    $VIEW = header("location: $ROOT_URL/admin/type/index.php?btn_list");
} else if (exist_param('btn_delete')) {
    try {
        loai_delete($ma_loai);
        $types = loai_select_all();
    } catch (Exception $exc) {
        $MESSAGE = 'Xoá thất bại!';
    }
    $VIEW = header("location: $ROOT_URL/admin/type/index.php?btn_list");
} else if (exist_param('btn_delete_all')) {
    try {
        loai_delete_all();
        $types = loai_select_all();
    } catch (Exception $exc) {
        $MESSAGE = 'Xoá thất bại!';
    }
    $VIEW = header("location: $ROOT_URL/admin/type/index.php?btn_list");
} else if (exist_param('btn_edit')) {
    $type = loai_select_by_id($ma_loai);
    extract($type);
    $VIEW = 'type/edit.php';
} else {
    $VIEW = 'type/new.php';
}

require '../layout.php';
