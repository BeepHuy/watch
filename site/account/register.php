<?php
require '../../global.php';
require '../../dao/customer.php';
require '../../dao/type.php';

extract($_REQUEST);

if(exist_param("btn_register")){
    if($mat_khau != $mat_khau2){
        $MESSAGE = "Xác nhận mật khẩu không đúng!";
    }
    else if(khach_hang_exist($ma_kh)){
        $MESSAGE = "Tên đăng nhập đã tồn tại!";
    }
    else{
        $file_name = save_file("up_hinh", "$IMAGE_DIR/img-admin/img-users/");
        $hinh = $file_name?$file_name:"user.png";
        try {
            khach_hang_insert($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro);
            $MESSAGE = "Đăng ký thành viên thành công!";
            header("location: $ROOT_URL/site/account/login.php");
        } 
        catch (Exception $exc) {
            $MESSAGE = "Đăng ký thành viên thất bại!";
        }
    }
}
$types = loai_select_all();
$VIEW = "account/register-form.php";
require '../layoutSmall.php';
