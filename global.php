<?php
    session_start();

    // Định nghĩa url được sử dụng trong website
    $ROOT_URL = "/watch";
    $CONTENT_URL = "$ROOT_URL/content";
    $ADMIN_URL = "$ROOT_URL/admin";
    $SITE_URL = "$ROOT_URL/site";

    // Định nghĩa đường dẫn ảnh
    $IMAGE_DIR = $_SERVER["DOCUMENT_ROOT"] . "$ROOT_URL/content/images";

    $VIEW = 'index.php';
    $MESSAGE = '';

    // fieldname là tên tham số cần kiểm tra
    // return boolean true tồn tại
    // KIỂM TRA SỰ TỒN TẠI CỦA MỘT THAM SỐ REQUEST
    function exist_param($fieldname) {
        return array_key_exists($fieldname, $_REQUEST);
    }

    // $fieldname là tên trường file
    // $target_dir thư mục lưu file
    // return tên file upload
    // LƯU FILE UPLOAD VÀO THƯ MỤC  
    function save_file($fieldname, $target_dir) {
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
        return $file_name;
    }

    //  $name là tên cookie
    //  $value là giá trị cookie
    //  int $day là số ngày tồn tại cookie
    // TẠO COOKIE
    function add_cookie($name, $value, $day) {
        setcookie($name, $value, time() + (86400 * $day), "/");
    }

    // $name là tên cookie
    // XOÁ COOKIE
    function delete_cookie($name){
        add_cookie($name, "", -1);
    }

    // $name là tên cookie
    // return giá trị của cookie
    // ĐỌC GIÁ TRỊ COOKIE
    function get_cookie($name){
        return $_COOKIE[$name]??'';
    }

    // Kiểm tra đăng nhập và vai trò sử dụng.
    // Các php trong admin hoặc php yêu cầu phải được đăng nhập mới được
    // phép sử dụng thì cần thiết phải gọi hàm này trước
    function check_login(){
        global $SITE_URL;
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['vai_tro'] == 1){
                return;
            }
            if(strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE){
                return;
            }
        }
        $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
        header("location: $SITE_URL/account/login.php");
    }
?>