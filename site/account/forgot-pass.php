<?php
require '../../global.php';
require '../../dao/customer.php';
require '../../dao/type.php';

extract($_REQUEST);

if(exist_param("btn_forgot")){
    $user = khach_hang_select_by_id($ma_kh);
    if($user){
        if($user['email'] != $email){
            $MESSAGE = "Sai địa chỉ email!";
        }
        else{
            $MESSAGE = "Mật khẩu của bạn là: " . $user['mat_khau'];
            $VIEW="account/login-form.php";
            global $ma_kh, $mat_khau;
        }
    }
    else{
        $MESSAGE = "Sai tên đăng nhập!";
    }
}

$VIEW="account/forgot-pass-form.php";
$types = loai_select_all();
require '../layoutSmall.php';
