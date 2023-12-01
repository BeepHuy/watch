<?php
require_once '../../pdo.php';

// KIỂM TRA SỰ TỒN TẠI CỦA TÊN Hãng
if (!function_exists('hang_exist_by_name')) {
    function hang_exist_by_name($ten_hang, $ma_hang = null)
    {
        $sql = "SELECT COUNT(*) FROM hang WHERE ten_hang = ?";

        // Nếu là cập nhật, Hãng bỏ Hãng đang được cập nhật
        if ($ma_hang !== null) {
            $sql .= " AND ma_hang != ?";
            return query_value($sql, $ten_hang, $ma_hang) > 0;
        }

        return query_value($sql, $ten_hang) > 0;
    }
}
// THÊM HÃNG
if (!function_exists('hang_insert')) {
    function hang_insert($ten_hang)
    {
        try {
            // Check if the name already exists
            if (hang_exist_by_name($ten_hang)) {
                throw new Exception('Tên hãng đã tồn tại, vui lòng nhập tên hãng khác!');
            }

            $sql = "INSERT INTO hang(ten_hang) VALUES(?)";
            return execute($sql, $ten_hang);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

// CẬP NHẬT HÃNG
if (!function_exists('hang_update')) {
    function hang_update($ma_hang, $ten_hang)
    {
        try {
            // Check if the name already exists excluding the current record
            if (hang_exist_by_name($ten_hang, $ma_hang)) {
                throw new Exception('Cập nhật thất bại! Tên hãng đã tồn tại?');
            }

            $sql = "UPDATE hang SET ten_hang=? WHERE ma_hang=?";
            return execute($sql, $ten_hang, $ma_hang);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

// XOÁ HÃNG
if (!function_exists('hang_delete')) {
    function hang_delete($ma_hang)
    {
        $sql = "DELETE FROM hang WHERE ma_hang=?";
        if (is_array($ma_hang)) {
            foreach ($ma_hang as $ma) {
                return execute($sql, $ma);
            }
        } else {
            return execute($sql, $ma_hang);
        }
    }
}
// XOÁ TẤT CẢ HÃNG
if (!function_exists('hang_delete_all')) {
    function hang_delete_all()
    {
        $sql = "DELETE FROM hang";
        return execute($sql);
    }
}

// LẤY TẤT CẢ HÃNG
if (!function_exists('hang_select_all')) {
    function hang_select_all()
    {
        $sql = "SELECT * FROM hang ORDER BY ma_hang DESC";
        return query_all($sql);
    }
}
// LẤY HÃNG THEO ID
if (!function_exists('hang_select_by_id')) {
    function hang_select_by_id($ma_hang)
    {
        $sql = "SELECT * FROM hang WHERE ma_hang=?";
        return query_one($sql, $ma_hang);
    }
}

// KIỂM TRA HÃNG CÓ TỒN TẠI HAY KHÔNG
if (!function_exists('hang_delete')) {
    function hang_exist($ma_hang)
    {
        $sql = "SELECT count(*) FROM hang WHERE ma_hang=?";
        return query_value($sql, $ma_hang) > 0;
    }
}
// TỔNG SỐ LƯỢNG
if (!function_exists('amount_brand')) {
    function amount_brand()
    {
        $sql = "SELECT count(*) so_luong FROM hang";
        return query_all($sql);
    }
}
