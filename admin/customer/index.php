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
        $MESSAGE = 'Thêm mới thành công';
    } catch (Exception $exc) {
        $MESSAGE = 'Thêm mới thất bại';
    }
    echo "<script>toastr.success('$MESSAGE', 'Thêm thành công');</script>";

    $VIEW = header("location: $ROOT_URL/admin/customer/index.php?btn_list");
} else if (exist_param("btn_update")) {
    $up_hinh = save_file("up_hinh", "$IMAGE_DIR/img-admin/img-users/");
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;
    try {
        khach_hang_update($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro);
        $MESSAGE = 'Cập nhật thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    echo "<script>toastr.success('$MESSAGE', Cập nhật thành công');</script>";
    $VIEW = header("location: $ROOT_URL/admin/customer/index.php?btn_list");
} else if (exist_param("btn_delete")) {
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
} else if (exist_param("btn_edit")) {
    $customer = khach_hang_select_by_id($ma_kh);
    extract($customer);
    $VIEW = "customer/edit.php";
} else if (exist_param("btn_list")) {
    $customers = khach_hang_select_all();
    $amounts = amount_customer();
    $VIEW = "customer/list.php";
} else {
    $VIEW = "customer/new.php";
}

require "../layout.php";
?>
<!--  -->