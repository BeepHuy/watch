<?php
    if(isset($_SESSION['user'])){
        require 'login-info-mobile.php';
    }
    else{
        $ma_kh = get_cookie("ma_kh");
        $mat_khau = get_cookie("mat_khau");
        require 'login-form-mobile.php';
    }
?>
