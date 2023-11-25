<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../../content/css/css-admin/main.css">
    <link rel="stylesheet" href="../../content/css/css-admin/form.css">
    <link rel="stylesheet" href="../../content/css/css-admin/list.css">
    <link rel="stylesheet" href="../../content/css/css-admin/responsive.css">
    <script src="../../content/js/ckeditor/ckeditor.js"></script>
    <script src="../../content/js/js-admin/main.js"></script>
    <title>QUẢN TRỊ</title>

</head>

<body>
    <div class="container">
        <!-- LAYOUT LEFT -->
        <div class="layout-left hide">
            <div class="sidebar-title">
                <a href="<?= $SITE_URL ?>/main-page?/homepage"><img src="../../content/images/img-admin/logo.png" alt="Logo"></a>
            </div>
            <div class="sidebar-profile">
                <div class="profile-pic">
                    <img src="../../content/images/img-admin/img-users/a_huy.jpg" alt="">
                </div>
                <div class="profile-info">
                    <span>Xin chào</span>
                    <h3>Huy kk</h3>
                </div>
            </div>
            <!-- SIDEBAR MENU -->
            <div class="sidebar-menu">
                <div class="menu-section">
                    <h3>Tổng quan</h3>
                    <!-- PARENTS MENU -->
                    <ul class="nav-side-menu">
                        <li><a href="../main-page/index.php" class="link"><i class="fa-solid fa-house-user"></i>Trang chủ</a></li>
                        <li>
                            <a class="link"><label for="dropdown-product"><i class="fa-solid fa-bars"></i>Sản phẩm<i class="fa-solid fa-caret-down"></i></label></a>
                            <input hidden type="checkbox" id="dropdown-product" class="dropdown-product">
                            <!-- CHILD MENU -->
                            <ul class="nav-child-menu">
                                <li><a href="../type/list.php">Quản lý loại</a></li>
                                <li><a href="../brand/list.php">Quản lý hãng</a></li>
                                <li><a href="../goods/list.php">Quản lý sản phẩm</a></li>
                            </ul>
                        </li>
                        <li><a href="../customer/list.php" class="link"><i class="fa-solid fa-user"></i>Khách hàng</a></li>
                        <li><a href="../comment/list.php" class="link"><i class="fa-solid fa-comment"></i>Bình luận</a></li>
                        <li>
                            <a href="../bill/list.php" class="link"><i class="fa-sharp fa-solid fa-briefcase"></i>Đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- LAYOUT RIGHT -->
        <div class="layout-right">
            <div class="wrap">
                <div class="col">
                    <div class="panel">
                        <div class="title-panel">
                            <h2>Thêm sản phẩm mới</h2>
                        </div>
                        <div class="content-panel">
                            <br>
                            <form id="form" action="./list.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label" for="id_product">Mã sản phẩm</label>
                                    <input class="readonly form-control" type="text" name="ma_sp" id="id_product" readonly value="Auto number">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="name_product">Tên sản phẩm <strong>*</strong></label>
                                    <input type="text" class="form-control" name="ten_sp" id="name_product" placeholder=" "> <br>
                                    <label for="" class="label-field">Tên sản phẩm</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="price_product">Đơn giá <strong>*</strong></label>
                                    <input type="text" class="form-control" name="don_gia" id="price_product" placeholder=" "> <br>
                                    <label for="" class="label-field">Giá</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="discount_product">Giảm giá <strong>*</strong></label>
                                    <input type="text" class="form-control" name="giam_gia" id="discount_product" placeholder=" "> <br>
                                    <label for="" class="label-field">%</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="pic_product">Hình ảnh <strong>*</strong></label>
                                    <input type="file" class="form-control" name="hinh" id="pic_product"> <br>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="id_brand">Mã hãng <strong>*</strong></label>
                                    <select name="ma_hang" id="id_brand">
                                        <option value="mh01">Nike</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="id_type">Mã loại <strong>*</strong></label>
                                    <select name="ma_loai" id="id_type">
                                        <option value="ml01">Giày Nam</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="describe_product">Mô tả <strong>*</strong></label>
                                    <textarea name="mo_ta" id="describe_product" rows="5" placeholder=" "></textarea> <br>
                                    <script>
                                        CKEDITOR.replace('describe_product');
                                    </script>
                                    <!-- <label for="" class="label-field">Mô tả</label> -->
                                </div>
                                <input class="readonly" hidden type="text" name="so_luot_xem" value="0">
                                <div class="form-group-btn">
                                    <button type="submit" name="add" class="btn_success">Lưu lại</button>
                                    <button type="reset" class="btn_success_reset">Nhập lại</button>
                                    <a href="./list.php" class="btn_list">Danh sách</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                "ten_sp": {
                    required: true
                },
                "don_gia": {
                    required: true,
                    number: true,
                    digits: true
                },
                "giam_gia": {
                    required: true,
                    number: true,
                    // digits: true,
                    max: 100
                },
                "hinh": {
                    required: true,
                },
            },

            messages: {
                "ten_sp": {
                    required: "</br>Tên sản phẩm không dược để trống!"
                },
                "don_gia": {
                    required: "</br>Đơn giá không được để trống!",
                    number: "</br>Đơn giá phải là số!",
                    digits: "</br>Đơn giá phải là số dương!"
                },
                "giam_gia": {
                    required: "</br>Giảm giá không được để trống!",
                    number: "</br>Giảm giá phải là số!",
                    // digits: "</br>Giảm giá phải là số dương!"
                    max: "</br>Bạn phải nhập từ 0 - 100 (%)!",
                },
                "hinh": {
                    required: "</br>Hình ảnh không được để trống!"
                }
            }
        });
    });
</script>
