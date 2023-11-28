<?php
require '../../global.php';
require '../../dao/customer.php';

check_login();

extract($_REQUEST);

if (exist_param('add')) {
    $up_hinh = save_file("hinh", "$IMAGE_DIR/img-admin/img-users/");
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'user.png';
    try {
        khach_hang_insert($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro);
        unset($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro);
    } catch (Exception $exc) {
        $MESSAGE = 'Thêm mới thất bại';
    }
    $VIEW = header("location: $ROOT_URL/admin/customer/index.php?btn_list");
} else {
    $VIEW = "customer/new.php";
}

require "../layout.php";
