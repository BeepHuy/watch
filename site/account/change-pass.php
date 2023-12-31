<?php
require '../../global.php';
require '../../dao/customer.php';
require '../../dao/type.php';

check_login();

extract($_REQUEST);

if (exist_param("btn_change")) {
    if ($mat_khau2 != $mat_khau3) {
        $MESSAGE = "Xác nhận mật khẩu mới không đúng!";
    } else {
        $user = khach_hang_select_by_id($ma_kh);
        if ($user) {
            if ($user['mat_khau'] == $mat_khau) {
                try {
                    khach_hang_change_password($ma_kh, $mat_khau2);
                    $MESSAGE = "Đổi mật khẩu thành công!";
                    if (isset($MESSAGE) && !empty($MESSAGE)) {
                        echo '<script>var updateSuccess = true;</script>';
                    }
                } catch (Exception $exc) {
                    $MESSAGE = "Đổi mật khẩu thất bại !";
                }
            } else {
                $MESSAGE = "Sai mật khẩu cũ!";
            }
        } else {
            $MESSAGE = "Sai mã đăng nhập!";
        }
    }
}

$types = loai_select_all();
$VIEW = "account/change-pass-form.php";
require '../layoutSmall.php';