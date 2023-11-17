<?php
    require_once '../../pdo.php';
    
    // XOÁ CHI TIẾT HÓA ĐƠN
    function cthd_delete($ma_cthd){
        $sql = "DELETE FROM chi_tiet_hoa_don WHERE ma_cthd=?";
        if(is_array($ma_cthd)){
            foreach ($ma_cthd as $ma) {
                execute($sql, $ma);
            }
        }
        else{
            execute($sql, $ma_cthd);
        }
    }

    // XOÁ TẤT CẢ CHI TIẾT HÓA ĐƠN TRONG HÓA ĐƠN
    function cthd_delete_all($ma_hd){
        $sql = "DELETE FROM hoa_don WHERE ma_hd=?";
        return execute($sql, $ma_hd);
       
    }
   
    // LẤY TẤT CẢ CHI TIẾT HÓA ĐƠN
    function cthd_select_all(){
        $sql = "SELECT * FROM chi_tiet_hoa_don";
        return query_all($sql);
    }
    
    // LẤY CHI TIẾT HÓA ĐƠN THEO ID
    function cthd_select_by_id($ma_cthd){
        $sql = "SELECT * FROM chi_tiet_hoa_don WHERE ma_cthd=?";
        return query_one($sql, $ma_cthd);
    }
    
    // LẤY CHI TIẾT HÓA ĐƠN THEO HÓA ĐƠN
    function cthd_select_by_hoa_don($ma_hd){
        $sql = "SELECT chi_tiet_hoa_don.*, hoa_don.* FROM chi_tiet_hoa_don JOIN hoa_don ON hoa_don.ma_hd = chi_tiet_hoa_don.ma_hd
                WHERE hoa_don.ma_hd=? ORDER BY chi_tiet_hoa_don.ma_cthd DESC";
        return query_all($sql, $ma_hd);
    }

    // TỔNG SỐ LƯỢNG
    function amount_bill(){
        $sql = "SELECT count(*) so_luong FROM hoa_don";
        return query_all($sql);
    }
?>