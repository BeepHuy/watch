<?php
require_once '../../pdo.php';
// KIỂM TRA SỰ TỒN TẠI CỦA KHÁCH HÀNG
if (!function_exists('khach_hang_exist_by_name')) {
    function khach_hang_exist_by_name($ten_kh, $ma_kh = null)
    {
        $sql = "SELECT COUNT(*) FROM khach_hang WHERE ten_kh = ?";

        // Nếu là cập nhật, Hãng bỏ Hãng đang được cập nhật
        if ($ma_kh !== null) {
            $sql .= " AND ma_kh != ?";
            return query_value($sql, $ten_kh, $ma_kh) > 0;
        }

        return query_value($sql, $ten_kh) > 0;
    }
}
// THÊM KHÁCH HÀNG
if (!function_exists('khach_hang_insert')) {
    function khach_hang_insert($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro)
    {
        try {
            // Check if the name already exists
            if (khach_hang_exist_by_name($ten_kh)) {
                throw new Exception('Tên khách hàng đã tồn tại, vui lòng nhập tên khách hàng khác!');
            }

            $sql = "INSERT INTO khach_hang(ma_kh, ten_kh, mat_khau, hinh, sdt, dia_chi, email, vai_tro) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            return execute($sql, $ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro == 1);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

// CẬP NHẬT KHÁCH HÀNG
if (!function_exists('khach_hang_update')) {
    function khach_hang_update($ma_kh, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro)
    {
        try {
            if (khach_hang_exist_by_name($ten_kh, $ma_kh)) {
                throw new Exception('Cập nhật thất bại! Tên Khách hàng đã tồn tại?');
            }
            $sql = "UPDATE khach_hang SET ten_kh=?,mat_khau=?,hinh=?,sdt=?,dia_chi=?,email=?, vai_tro=? WHERE ma_kh=?";
            return execute($sql, $ten_kh, $mat_khau, $hinh, $sdt, $dia_chi, $email, $vai_tro == 1, $ma_kh);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
// XOÁ KHÁCH HÀNG
if (!function_exists('khach_hang_delete')) {
    function khach_hang_delete($ma_kh)
    {
        $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
        if (is_array($ma_kh)) {
            foreach ($ma_kh as $ma) {
                return execute($sql, $ma);
            }
        } else {
            return execute($sql, $ma_kh);
        }
    }
}
// XOÁ TẤT CẢ KHÁCH HÀNG
if (!function_exists('khach_hang_delete_all')) {
    function khach_hang_delete_all()
    {
        $sql = "DELETE FROM khach_hang";
        return execute($sql);
    }
}
// LẤY TẤT CẢ KHÁCH HÀNG
if (!function_exists('khach_hang_select_all')) {
    function khach_hang_select_all()
    {
        $sql = "SELECT * FROM khach_hang";
        return query_all($sql);
    }
}
// LẤY KHÁCH HÀNG THEO ID
if (!function_exists('khach_hang_select_by_id')) {
    function khach_hang_select_by_id($ma_kh)
    {
        $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
        return query_one($sql, $ma_kh);
    }
}
// KIỂM TRA SỰ TỒN TẠI CỦA KHÁCH HÀNG
if (!function_exists('khach_hang_exist')) {
    function khach_hang_exist($ma_kh)
    {
        $sql = "SELECT count(*) FROM khach_hang WHERE ma_kh=?";
        return query_value($sql, $ma_kh) > 0;
    }
}
// LẤY KHÁCH HÀNG THEO VAI TRÒ
if (!function_exists('khach_hang_select_by_role')) {
    function khach_hang_select_by_role($vai_tro)
    {
        $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
        return query_all($sql, $vai_tro);
    }
}
// THAY ĐỔI MẬT KHẨU KHÁCH HÀNG
if (!function_exists('khach_hang_change_password')) {
    function khach_hang_change_password($ma_kh, $mat_khau_moi)
    {
        $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
        execute($sql, $mat_khau_moi, $ma_kh);
    }
}
// TỔNG SỐ LƯỢNG
if (!function_exists('amount_customer')) {
    function amount_customer()
    {
        $sql = "SELECT count(*) so_luong FROM khach_hang";
        return query_all($sql);
    }
}
