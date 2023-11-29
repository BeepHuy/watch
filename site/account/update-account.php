<?php
require '../../global.php';
require '../../dao/customer.php';
require '../../dao/type.php';

check_login();

extract($_REQUEST);

if (exist_param("btn_update")) {
    $file_name = save_file("up_hinh", "$IMAGE_DIR/img-admin/img-users/");
    $hinh = $file_name ? $file_name : $hinh;
    try {
        khach_hang_update($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro);
        $MESSAGE = "Cập nhật thông tin thành viên thành công!";
        $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thông tin thành viên thất bại!";
    }
} else {
    extract($_SESSION['user']);
}

$types = loai_select_all();
$VIEW = "update-account-form.php";
require '../layoutSmall.php';
