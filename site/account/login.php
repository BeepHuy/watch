<?php
require '../../global.php';
require '../../dao/customer.php';
require '../../dao/type.php';

extract($_REQUEST);

if(exist_param("btn_login")){
    $user = khach_hang_select_by_id($ma_kh);
    if($user){
        if($user['mat_khau'] == $mat_khau){
            $MESSAGE = "Đăng nhập thành công!";
            
            if(exist_param("remember")){
                add_cookie("ma_kh", $ma_kh, 30);
                add_cookie("mat_khau", $mat_khau, 30);
            }
            else{
                delete_cookie("ma_kh");
                delete_cookie("mat_khau");
            }
            $_SESSION["user"] = $user;
            
            if(isset($_SESSION['request_uri'])){
                header("location: " . $_SESSION['request_uri']);
            }
        }
        else{
            $MESSAGE = "Sai mật khẩu!";
        }
    }
    else{
        $MESSAGE = "Sai tên đăng nhập!";
    }
}
else{
    if(exist_param("btn_logoff")){
        session_unset();
    }
    $ma_kh = get_cookie("ma_kh");
    $mat_khau = get_cookie("mat_khau");
}

$VIEW = "login-form.php";
$types = loai_select_all();
require '../layoutSmall.php';
