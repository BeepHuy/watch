<?php
    require_once '../../pdo.php';

    // THỐNG KÊ SẢN PHẨM THEO LOẠI
    function thong_ke_san_pham(){
        $sql = "SELECT loai.ma_loai, loai.ten_loai,
        COUNT(*) so_luong,
        MIN(san_pham.don_gia) gia_min,
        MAX(san_pham.don_gia) gia_max,
        AVG(san_pham.don_gia) gia_avg
        FROM san_pham
        JOIN loai ON loai.ma_loai=san_pham.ma_loai 
        GROUP BY loai.ma_loai, loai.ten_loai";
        return query_all($sql);
    }
   
    // THỐNG KÊ BÌNH LUẬN THEO TỪNG HÀNG HÓA
    function thong_ke_binh_luan(){
        $sql = "SELECT san_pham.ma_sp, san_pham.ten_sp,
        COUNT(*) so_luong,
        MIN(binh_luan.thoi_gian_bl) cu_nhat,
        MAX(binh_luan.thoi_gian_bl) moi_nhat
        FROM binh_luan 
        JOIN san_pham ON san_pham.ma_sp=binh_luan.ma_sp 
        GROUP BY san_pham.ma_sp, san_pham.ten_sp
        HAVING so_luong > 0";
        return query_all($sql);
    }

    // THỐNG KÊ ĐƠN HÀNG
    function thong_ke_don_hang(){
        $sql = "SELECT * FROM hoa_don ORDER BY ma_hd DESC";
        return query_all($sql);
    }

    // THỐNG KÊ SỐ LƯỢNG ĐƠN HÀNG
    function thong_ke_don_hang_all(){
        $sql = "SELECT COUNT(*) so_luong FROM hoa_don";
        return query_all($sql);
    }
    
    // THỐNG KÊ SỐ LƯỢNG SẢN PHẨM
    function thong_ke_san_pham_all() {
        $sql = "SELECT COUNT(*) so_luong FROM san_pham";
        return query_all($sql);
    }

    // THỐNG KÊ SỐ LƯỢNG KHÁCH HÀNG
    function thong_ke_khach_hang_all(){
        $sql = "SELECT COUNT(*) so_luong FROM khach_hang";
        return query_all($sql);
    }

    // THỐNG KÊ SỐ LƯỢNG BÌNH LUẬN
    function thong_ke_binh_luan_all(){
        $sql = "SELECT COUNT(*) so_luong FROM binh_luan";
        return query_all($sql);
    }
?>