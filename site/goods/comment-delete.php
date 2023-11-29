<?php 
require "../../global.php";
require "../../dao/comment.php";

// check_login();

extract($_REQUEST);

    if(exist_param("btn_delete")){
        try {
            binh_luan_delete($ma_bl);
        } 
        catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    header("location: $ROOT_URL/site/goods/detail.php?ma_sp=$ma_sp")
?>


