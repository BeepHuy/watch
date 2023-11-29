<?php
require "../../global.php";
require "../../dao/comment.php";
require "../../dao/statistic.php";

check_login();

extract($_REQUEST);

if (exist_param("ma_sp")) {
    if (exist_param("btn_delete")) {
        try {
            binh_luan_delete($ma_bl);
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    if (exist_param("btn_delete_all")) {
        try {
            binh_luan_delete_all($ma_sp);
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    $comments = binh_luan_select_by_hang_hoa($ma_sp);
    if (count($comments) == 0) {
        $comments = thong_ke_binh_luan();
        $VIEW = "comment/list.php";
    } else {
        $VIEW = "comment/detail.php";
    }
} else {
    $comments = thong_ke_binh_luan();
    $VIEW = "comment/list.php";
}
require "../layout.php";
?>
<!--  -->