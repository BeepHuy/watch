<?php
require "../../global.php";
require "../../dao/bill.php";
require "../../dao/statistic.php";

check_login();

extract($_REQUEST);

if (exist_param("ma_hd")) {
    if (exist_param("btn_delete")) {
        try {
            cthd_delete($ma_cthd, $ma_hd);
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    if (exist_param("btn_delete_all")) {
        try {
            cthd_delete_all($ma_hd);
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    if (exist_param("btn_delete_all")) {
        try {
            cthd_delete_all($ma_hd);
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    $bills = cthd_select_by_hoa_don($ma_hd);
    if (count($bills) == 0) {
        $bills = thong_ke_don_hang();
        $amounts = amount_bill();
        $VIEW = "bill/list.php";
    } else {
        $VIEW = "bill/detailbill.php";
    }
} else {
    $bills = thong_ke_don_hang();
    $amounts = amount_bill();
    $VIEW = "bill/list.php";
}
require "../layout.php";
?>
<!--  -->