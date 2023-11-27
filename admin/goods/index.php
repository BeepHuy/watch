<?php
require '../../global.php';
require '../../dao/goods.php';
require '../../dao/type.php';
require '../../dao/brand.php';

check_login();

extract($_REQUEST);

 if (exist_param("btn_update")) {
    $up_hinh = save_file("up_hinh", "$IMAGE_DIR/img-admin/img-products/");
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;
    try {
        san_pham_update($ma_sp, $ten_sp, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hang, $ma_loai, $so_luot_xem);
    } catch (Exception $exc) {
        echo $exc->getMessage();
        $MESSAGE = "Cập nhật thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/goods/index.php?btn_list");
} else if (exist_param("btn_edit")) {
    $product = san_pham_select_by_id($ma_sp);
    extract($product);
    $VIEW = "goods/edit.php";
} else {
    $VIEW = "goods/new.php";
}

if ($VIEW == "goods/new.php" || $VIEW == "goods/edit.php") {
    $loai_select_list = loai_select_all();
    $hang_select_list = hang_select_all();
}

require "../layout.php";
