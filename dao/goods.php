<?php
    require_once '../../pdo.php';

    // THÊM SẢN PHẨM
    function san_pham_insert($ten_sp, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hang, $ma_loai, $so_luot_xem){
        $sql = "INSERT INTO san_pham(ten_sp, don_gia, giam_gia, hinh, mo_ta, ma_hang, ma_loai, so_luot_xem) VALUES (?,?,?,?,?,?,?,?)";
        execute($sql, $ten_sp, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hang, $ma_loai, $so_luot_xem);   
    }

    // CẬP NHẬT SẢN PHẨM
    function san_pham_update($ma_sp, $ten_sp, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hang, $ma_loai){
        $sql = "UPDATE san_pham SET ten_sp=?, don_gia=?, giam_gia=?, hinh=?, mo_ta=?, ma_hang=?, ma_loai=? WHERE ma_sp=?";
        execute($sql, $ten_sp, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hang, $ma_loai, $ma_sp);
    }
    
    // XOÁ SẢN PHẨM
    function san_pham_delete($ma_sp){
        $sql = "DELETE FROM san_pham WHERE ma_sp=?";
        if(is_array($ma_sp)){
            foreach ($ma_sp as $ma) {
                execute($sql, $ma);
            }
        }
        else{
            execute($sql, $ma_sp);
        }
    }

    // XOÁ TẤT CẢ SẢN PHẨM
    function san_pham_delete_all(){
        $sql = "DELETE FROM san_pham";
        return execute($sql);
       
    }

    // LẤY TẤT CẢ SẢN PHẨM
    function san_pham_select_all(){
        $sql = "SELECT san_pham.*, loai.* FROM san_pham JOIN loai on san_pham.ma_loai=loai.ma_loai ORDER BY san_pham.ma_sp DESC";
        return query_all($sql);
    }

    // LẤY SẢN PHẨM THEO ID
    function san_pham_select_by_id($ma_sp){
        $sql = "SELECT * FROM san_pham WHERE ma_sp=?";
        return query_one($sql, $ma_sp);
    }

    // LẤY SẢN PHẨM ĐƯỢC GIẢM GIÁ
    function san_pham_select_giam_gia(){
        $sql = "SELECT san_pham.*, loai.* FROM san_pham JOIN loai on loai.ma_loai=san_pham.ma_loai WHERE giam_gia > 0";
        return query_all($sql);
    }
    
    // KIỂM TRA SỰ TỒN TẠI CỦA SẢN PHẨM
    function san_pham_exist($ma_sp){
        $sql = "SELECT count(*) FROM san_pham WHERE ma_sp=?";
        return query_value($sql, $ma_sp) > 0;
    }
    
    // LẤY SẢN PHẨM THEO LOẠI
    function san_pham_select_by_loai($ma_loai){
        $sql = "SELECT san_pham.*, loai.* FROM san_pham JOIN loai on san_pham.ma_loai=loai.ma_loai WHERE loai.ma_loai=?";
        return query_all($sql, $ma_loai);
    }
        
    // LẤY SẢN PHẨM THEO TÊN
    function san_pham_select_keyword($keyword){
        $sql = "SELECT * FROM san_pham JOIN loai ON loai.ma_loai=san_pham.ma_loai WHERE ten_sp LIKE ? OR ten_loai LIKE ?";
        return query_all($sql, '%'.$keyword.'%', '%'.$keyword.'%');
    }
    
    // TĂNG SỐ LƯỢT XEM CỦA HÀNG HOÁ
    function san_pham_tang_so_luot_xem($ma_hh){
        $sql = "UPDATE san_pham SET so_luot_xem = so_luot_xem + 1 WHERE ma_sp=?";
        execute($sql, $ma_hh);
    }
    
    // LẤY SẢN PHẨM NHIỀU LƯỢT XEM NHẤT
    function san_pham_select_so_luot_xem(){
        $sql = "SELECT * FROM san_pham JOIN loai on loai.ma_loai=san_pham.ma_loai WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 8";
        return query_all($sql);
    }

    // PHÂN TRANG
    function san_pham_select_page(){
        if(!isset($_SESSION['page_no'])){
            $_SESSION['page_no'] = 0;
        }
        if(!isset($_SESSION['page_count'])){
            $row_count = query_value("SELECT count(*) FROM san_pham");
            $_SESSION['page_count'] = ceil($row_count/ 1000);
        }
        if(exist_param("page_no")){
            $_SESSION['page_no'] = $_REQUEST['page_no'];
        }
        if($_SESSION['page_no'] < 0){
            $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
        }
        if($_SESSION['page_no'] >= $_SESSION['page_count']){
            $_SESSION['page_no'] = 0;
        }
        $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC LIMIT ".$_SESSION['page_no'].", 1000";
        return query_all($sql);
    }

    // TỔNG SỐ LƯỢNG
    function amount_goods(){
        $sql = "SELECT count(*) so_luong FROM san_pham";
        return query_all($sql);
    }
?>