<?php 

require '../../global.php'; 

require '../../dao/goods.php'; 

require '../../dao/type.php'; 

require '../../dao/brand.php'; 

 

check_login(); 

 

extract($_REQUEST); 

 

if (exist_param("add")) { 

  $up_hinh = save_file("hinh", "$IMAGE_DIR/img-admin/img-products/"); 

  $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'product.png'; 

  try { 

    san_pham_insert($ten_sp, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hang, $ma_loai, $so_luot_xem); 

    unset($ten_sp, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hang, $ma_loai, $so_luot_xem); 

  } catch (Exception $exc) { 

    $MESSAGE = "Thêm mới thất bại!"; 

  } 

  $VIEW = header("location: $ROOT_URL/admin/goods/index.php?btn_list"); 

} else { 

  $VIEW = "goods/new.php"; 

} 

 

require "../layout.php"; 

 