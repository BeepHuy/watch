<?php
require_once '../../pdo.php';

// KIỂM TRA SỰ TỒN TẠI CỦA TÊN LOẠI
if (!function_exists('loai_exist_by_name')) {
    function loai_exist_by_name($ten_loai, $ma_loai = null)
    {
        $sql = "SELECT COUNT(*) FROM loai WHERE ten_loai = ?";

        // Nếu là cập nhật, loại bỏ loại đang được cập nhật
        if ($ma_loai !== null) {
            $sql .= " AND ma_loai != ?";
            return query_value($sql, $ten_loai, $ma_loai) > 0;
        }

        return query_value($sql, $ten_loai) > 0;
    }
}
// THÊM LOẠI HÀNG
if (!function_exists('loai_insert')) {
    function loai_insert($ten_loai)
    {
        try {
            // Check if the name already exists
            if (loai_exist_by_name($ten_loai)) {
                throw new Exception('Tên loại đã tồn tại, vui lòng nhập tên loại khác!');
            }

            $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
            return execute($sql, $ten_loai);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

// CẬP NHẬT LOẠI HÀNG
if (!function_exists('loai_update')) {
    function loai_update($ma_loai, $ten_loai)
    {
        try {
            // Check if the name already exists excluding the current record
            if (loai_exist_by_name($ten_loai, $ma_loai)) {
                throw new Exception('Cập nhật thất bại! Tên loại đã tồn tại?');
            }

            $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
            return execute($sql, $ten_loai, $ma_loai);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

// XOÁ LOẠI HÀNG
if (!function_exists('loai_delete')) {
    function loai_delete($ma_loai)
    {
        $sql = "DELETE FROM loai WHERE ma_loai=?";
        if (is_array($ma_loai)) {
            foreach ($ma_loai as $ma) {
                return execute($sql, $ma);
            }
        } else {
            return execute($sql, $ma_loai);
        }
    }
}

// XOÁ TẤT CẢ LOẠI HÀNG
if (!function_exists('loai_delete_all')) {
    function loai_delete_all()
    {
        $sql = "DELETE FROM loai";
        return execute($sql);
    }
}

// LẤY TẤT CẢ LOẠI HÀNG
if (!function_exists('loai_select_all')) {
    function loai_select_all()
    {
        $sql = "SELECT * FROM loai";
        return query_all($sql);
    }
}
// LẤY LOẠI HÀNG THEO ID
if (!function_exists('loai_select_by_id')) {
    function loai_select_by_id($ma_loai)
    {
        $sql = "SELECT * FROM loai WHERE ma_loai=?";
        return query_one($sql, $ma_loai);
    }
}

// KIỂM TRA LOẠI CÓ TỒN TẠI HAY KHÔNG
if (!function_exists('loai_exist')) {
    function loai_exist($ma_loai)
    {
        $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
        return query_value($sql, $ma_loai) > 0;
    }
}
// TỔNG SỐ LƯỢNG
if (!function_exists('amount_type')) {
    function amount_type()
    {
        $sql = "SELECT count(*) so_luong FROM loai";
        return query_all($sql);
    }
}