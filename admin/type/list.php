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
    <link rel="stylesheet" href="../../content/css/css-admin/list.css">
    <link rel="stylesheet" href="../../content/css/css-admin/form.css">
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
                    <img src="../../content/images/img-admin/img-users/cv_huy.jpg" alt="">
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
                            <h2>Danh sách loại giày (1)</h2>
                            <ul class="title-panel-right">
                                <a href="./new.php" class="btn-title-panel-right">Thêm mới</a>
                                <a href="" id="delete_all" class="btn-delete-all">Xóa tất cả</a>
                            </ul>
                        </div>
                        <div class="content-noList"></div>
                        <div class="content-panel">
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="sort">STT</th>
                                        <th>Tên loại</th>
                                        <th>Mã loại</th>
                                        <th class="sort">Công cụ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Giày Nam</td>
                                        <td>ML01</td>
                                        <td>
                                            <a title="Sửa" href="./edit.php"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="Xoá" id="delete" href=""><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                <td colspan="4">Danh sách trống</td>
                            </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer>
                        <div class="pull-right">
                            <p>WATCH - Hotline/Zalo: 0901749631 - 0705903736</p>
                        </div>
                    </footer>
                </div>
            </div>
</body>

</html>

<script>
    // CHECK DELETE
    const checkDelete = document.querySelectorAll("#delete");
    checkDelete.forEach(function(checkDelete) {
        checkDelete.addEventListener('click', function(event) {
            const mess = confirm("Bạn có chắc chắn muốn xoá loại hàng này không?");
            if (mess == false) {
                event.preventDefault();
            }
        })
    })

    // CHECK DELETE ALL
    const checkDeleteAll = document.querySelector("#delete_all");
    checkDeleteAll.addEventListener('click', function(event) {
        const mess = confirm("Bạn có chắc chắn muốn xoá tất cả không?");
        if (mess == false) {
            event.preventDefault();
        }
    })
</script>