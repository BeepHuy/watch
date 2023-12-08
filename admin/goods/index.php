<?php
require '../../global.php';
require '../../dao/goods.php';
require '../../dao/type.php';
require '../../dao/brand.php';

check_login();

extract($_REQUEST);

if (exist_param("add")) {
    $up_hinh = save_file("hinh", "$IMAGE_DIR/img-admin/img-products/");
    $hinh_mota1 = isset($_FILES['hinh_mota1']) ? save_file("hinh_mota1", "$IMAGE_DIR/img-admin/img-products/") : '';
    $hinh_mota2 = isset($_FILES['hinh_mota2']) ? save_file("hinh_mota2", "$IMAGE_DIR/img-admin/img-products/") : '';
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'product.png';
    // $hinh_mota1 = strlen($up_hinh1) > 0 ? $up_hinh1 : 'product.png';
    // $hinh_mota1 = strlen($up_hinh2) > 0 ? $up_hinh2 : 'product.png';

    try {
        san_pham_insert($ten_sp, $don_gia, $giam_gia, $hinh, $hinh_mota1, $hinh_mota2, $mo_ta, $ma_hang, $ma_loai, $so_luot_xem);
        unset($ten_sp, $don_gia, $giam_gia, $hinh, $hinh_mota1, $hinh_mota2, $mo_ta, $ma_hang, $ma_loai, $so_luot_xem);
        $MESSAGE = 'Thêm mới thành công!';
        $VIEW = 'goods/new.php';
    } catch (Exception $exc) {
        $MESSAGE = $exc->getMessage();
        $VIEW = 'goods/new.php';
    }
} else if (exist_param("btn_update")) {
    $up_hinh = save_file("up_hinh", "$IMAGE_DIR/img-admin/img-products/");
    $hinh_mota1 = isset($_FILES['hinh_mota1']) ? save_file("hinh_mota1", "$IMAGE_DIR/img-admin/img-products/") : '';
    $hinh_mota2 = isset($_FILES['hinh_mota2']) ? save_file("hinh_mota2", "$IMAGE_DIR/img-admin/img-products/") : '';
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;
    $hinh_mota1 = strlen($hinh_mota1 ?? '') > 0 ? $hinh_mota1 : 'product.png';
    $hinh_mota2 = strlen($hinh_mota2 ?? '') > 0 ? $hinh_mota2 : 'product.png';

    try {
        san_pham_update($ma_sp, $ten_sp, $don_gia, $giam_gia, $hinh, $hinh_mota1, $hinh_mota2, $mo_ta, $ma_hang, $ma_loai);
        $MESSAGE = 'Cập nhật thành công!';
        $VIEW = 'goods/edit.php';
    } catch (Exception $exc) {
        $MESSAGE = $exc->getMessage();
        $goods = san_pham_select_by_id($ma_sp);
        extract($goods);
        $VIEW = 'goods/edit.php';
    }
} else if (exist_param("btn_delete")) {
    try {
        san_pham_delete($ma_sp);
        $products = san_pham_select_page();
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/goods/index.php?btn_list");
} else if (exist_param("btn_delete_all")) {
    try {
        san_pham_delete_all();
        $products = san_pham_select_page();
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW = header("location: $ROOT_URL/admin/goods/index.php?btn_list");
} else if (exist_param("btn_edit")) {
    $product = san_pham_select_by_id($ma_sp);
    extract($product);
    $VIEW = "goods/edit.php";
} else if (exist_param("btn_list")) {
    $products = san_pham_select_page();
    $amounts = amount_goods();
    $VIEW = "goods/list.php";
} else {
    $VIEW = "goods/new.php";
}

if ($VIEW == "goods/new.php" || $VIEW == "goods/edit.php") {
    $loai_select_list = loai_select_all();
    $hang_select_list = hang_select_all();
}

require "../layout.php";
?>
<!--  -->