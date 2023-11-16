<?php
    require_once '../../pdo.php';

    // THÊM BÌNH LUẬN
    function binh_luan_insert($noi_dung, $thoi_gian_bl, $ma_kh, $ma_sp){
        $sql = "INSERT INTO binh_luan(noi_dung, thoi_gian_bl, ma_kh, ma_sp) VALUES (?,?,?,?)";
        execute($sql, $noi_dung, $thoi_gian_bl, $ma_kh, $ma_sp);
    }
    
    // CẬP NHẬT BÌNH LUẬN
    function binh_luan_update($ma_bl, $noi_dung, $thoi_gian_bl, $ma_kh, $ma_sp){
        $sql = "UPDATE binh_luan SET noi_dung=?,thoi_gian_bl=?,ma_sp=?,ma_kh=? WHERE ma_bl=?";
        execute($sql, $noi_dung, $thoi_gian_bl, $ma_kh, $ma_sp, $ma_bl);
    }
    
    // XOÁ BÌNH LUẬN
    function binh_luan_delete($ma_bl){
        $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
        if(is_array($ma_bl)){
            foreach ($ma_bl as $ma) {
                execute($sql, $ma);
            }
        }
        else{
            execute($sql, $ma_bl);
        }
    }

    // XOÁ TẤT CẢ BÌNH LUẬN
    function binh_luan_delete_all($ma_sp){
        $sql = "DELETE FROM binh_luan WHERE ma_sp=?";
        return execute($sql, $ma_sp);
    }
   
    // LẤY TẤT CẢ BÌNH LUẬN
    function binh_luan_select_all(){
        $sql = "SELECT * FROM binh_luan ORDER BY thoi_gian_bl DESC";
        return query_all($sql);
    }
    
    // LẤY BÌNH LUẬN THEO ID
    function binh_luan_select_by_id($ma_bl){
        $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
        return query_one($sql, $ma_bl);
    }
   
    // KIỂM TRA SỰ TỒN TẠI CỦA BÌNH LUẬN
    function binh_luan_exist($ma_bl){
        $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
        return query_value($sql, $ma_bl) > 0;
    }
    
    // LẤY BÌNH LUẬN THEO MÃ HÀNG HOÁ
    function binh_luan_select_by_hang_hoa($ma_sp){
        $sql = "SELECT binh_luan.*, san_pham.ten_sp, khach_hang.ten_kh, khach_hang.hinh, khach_hang.ma_kh FROM binh_luan JOIN san_pham ON san_pham.ma_sp = binh_luan.ma_sp
                JOIN khach_hang on binh_luan.ma_kh = khach_hang.ma_kh WHERE binh_luan.ma_sp=? ORDER BY thoi_gian_bl DESC";
        return query_all($sql, $ma_sp);
    }

    // TỔNG SỐ LƯỢNG
    function amount_comment(){
        $sql = "SELECT count(*) so_luong FROM binh_luan";
        return query_all($sql);
    }
?>