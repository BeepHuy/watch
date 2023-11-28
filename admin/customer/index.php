<?php
require '../../global.php';
require '../../dao/customer.php';

check_login();

extract($_REQUEST);

if (exist_param("btn_delete")) {
    try {
        khach_hang_delete($ma_kh);
        $customers = khach_hang_select_all();
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/customer/index.php?btn_list");
} else if (exist_param("btn_delete_all")) {
    try {
        khach_hang_delete_all();
        $customers = khach_hang_select_all();
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/customer/index.php?btn_list");
} else if (exist_param("btn_list")) {
    $customers = khach_hang_select_all();
    $amounts = amount_customer();
    $VIEW = "customer/list.php";
} else {
    $VIEW = "customer/new.php";
}

require "../layout.php";

