<?php
require '../../global.php';
require '../../dao/customer.php';

check_login();

extract($_REQUEST);

if (exist_param("btn_update")) {
    $up_hinh = save_file("up_hinh", "$IMAGE_DIR/img-admin/img-users/");
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;
    try {
        khach_hang_update($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro);
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/customer/index.php?btn_list");
}else if (exist_param("btn_edit")) {
    $customer = khach_hang_select_by_id($ma_kh);
    extract($customer);
    $VIEW = "customer/edit.php";
} else {
    $VIEW = "customer/new.php";
}

require "../layout.php";