<?php
    require_once '../../pdo.php';

    // THÊM KHÁCH HÀNG
    function khach_hang_insert($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro){
        $sql = "INSERT INTO khach_hang(ma_kh, ten_kh, mat_khau, hinh, sdt, dia_chi, email, vai_tro) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return execute($sql, $ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro==1);
    }
    
    // CẬP NHẬT KHÁCH HÀNG
    function khach_hang_update($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro){
        $sql = "UPDATE khach_hang SET ten_kh=?,mat_khau=?,hinh=?,sdt=?,dia_chi=?,email=?, vai_tro=? WHERE ma_kh=?";
        return execute($sql, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro==1, $ma_kh);
    }
    
    // XOÁ KHÁCH HÀNG
    function khach_hang_delete($ma_kh){
        $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
        if(is_array($ma_kh)){
            foreach ($ma_kh as $ma) {
                return execute($sql, $ma);
            }
        }
        else{
            return execute($sql, $ma_kh);
        }
    }

    // XOÁ TẤT CẢ KHÁCH HÀNG
    function khach_hang_delete_all(){
        $sql = "DELETE FROM khach_hang";
        return execute($sql);
       
    }
    
    // LẤY TẤT CẢ KHÁCH HÀNG
    function khach_hang_select_all(){
        $sql = "SELECT * FROM khach_hang";
        return query_all($sql);
    }
    
    // LẤY KHÁCH HÀNG THEO ID
    function khach_hang_select_by_id($ma_kh){
        $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
        return query_one($sql, $ma_kh);
    }
    
    // KIỂM TRA SỰ TỒN TẠI CỦA KHÁCH HÀNG
    function khach_hang_exist($ma_kh){
        $sql = "SELECT count(*) FROM khach_hang WHERE ma_kh=?";
        return query_value($sql, $ma_kh) > 0;
    }
    
    // LẤY KHÁCH HÀNG THEO VAI TRÒ
    function khach_hang_select_by_role($vai_tro){
        $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
        return query_all($sql, $vai_tro);
    }
    
    // THAY ĐỔI MẬT KHẨU KHÁCH HÀNG
    function khach_hang_change_password($ma_kh, $mat_khau_moi){
        $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
        execute($sql, $mat_khau_moi, $ma_kh);
    }

    // TỔNG SỐ LƯỢNG
    function amount_customer(){
        $sql = "SELECT count(*) so_luong FROM khach_hang";
        return query_all($sql);
    }
?>