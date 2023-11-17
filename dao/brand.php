<?php
require_once '../../pdo.php';

// THÊM HÃNG
function hang_insert($ten_hang)
{
    $sql = "INSERT INTO hang(ten_hang) VALUES(?)";
    return execute($sql, $ten_hang);
}

// CẬP NHẬT HÃNG
function hang_update($ma_hang, $ten_hang)
{
    $sql = "UPDATE hang SET ten_hang=? WHERE ma_hang=?";
    return execute($sql, $ten_hang, $ma_hang);
}

// XOÁ HÃNG
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

// XOÁ TẤT CẢ HÃNG
function hang_delete_all()
{
    $sql = "DELETE FROM hang";
    return execute($sql);
}

// LẤY TẤT CẢ HÃNG
function hang_select_all()
{
    $sql = "SELECT * FROM hang ORDER BY ma_hang DESC";
    return query_all($sql);
}

// LẤY HÃNG THEO ID
function hang_select_by_id($ma_hang)
{
    $sql = "SELECT * FROM hang WHERE ma_hang=?";
    return query_one($sql, $ma_hang);
}

// KIỂM TRA HÃNG CÓ TỒN TẠI HAY KHÔNG
function hang_exist($ma_hang)
{
    $sql = "SELECT count(*) FROM hang WHERE ma_hang=?";
    return query_value($sql, $ma_hang) > 0;
}

// TỔNG SỐ LƯỢNG
function amount_brand()
{
    $sql = "SELECT count(*) so_luong FROM hang";
    return query_all($sql);
}
