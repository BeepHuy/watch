<?php
    require_once '../../pdo.php';

     // THÊM LOẠI HÀNG
     function loai_insert($ten_loai){
        $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
        return execute($sql, $ten_loai);
    }

    // CẬP NHẬT LOẠI HÀNG
    function loai_update($ma_loai, $ten_loai){
        $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
        return execute($sql, $ten_loai, $ma_loai);
    }

    // XOÁ LOẠI HÀNG
    function loai_delete($ma_loai){
        $sql = "DELETE FROM loai WHERE ma_loai=?";
        if(is_array($ma_loai)){
            foreach ($ma_loai as $ma) {
                return execute($sql, $ma);
            }
        }
        else{
            return execute($sql, $ma_loai);
        }
    }

    // XOÁ TẤT CẢ LOẠI HÀNG
    function loai_delete_all(){
        $sql = "DELETE FROM loai";
        return execute($sql);
       
    }

    // LẤY TẤT CẢ LOẠI HÀNG
    function loai_select_all(){
        $sql = "SELECT * FROM loai";
        return query_all($sql);
    }
    
    // LẤY LOẠI HÀNG THEO ID
    function loai_select_by_id($ma_loai){
        $sql = "SELECT * FROM loai WHERE ma_loai=?";
        return query_one($sql, $ma_loai);
    }

    // KIỂM TRA LOẠI CÓ TỒN TẠI HAY KHÔNG
    function loai_exist($ma_loai){
        $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
        return query_value($sql, $ma_loai) > 0;
    }

    // TỔNG SỐ LƯỢNG
    function amount_type(){
        $sql = "SELECT count(*) so_luong FROM loai";
        return query_all($sql);
    }
?>