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
                            <h2>Danh sách khách hàng (2)</h2>
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
                                        <th class="hide">Mã khách hàng</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên khách hàng</th>
                                        <th class="hide">Số điện thoại</th>
                                        <th class="hide">Địa chỉ</th>
                                        <th class="hide">Email</th>
                                        <th class="sort">Công cụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="checkbox_see_more" class="td-see-more"><i class="fa-solid fa-plus see-more show"></i> <i class="fa-solid fa-minus no-see-more"></i><span>1</span></label></td>
                                        <td class="hide">huy kk</td>
                                        <td class="td-img"><img src="../../content/images/img-admin/img-users/a_huy.jpg" alt=""></td>
                                        <td>Huy kk</td>
                                        <td class="hide">076123</td>
                                        <td class="hide">Huy kkk address</td>
                                        <td class="hide">huykk@gmail.com</td>
                                        <td>
                                            <a title="Sửa" href="./edit.php"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="Xoá" id="delete" href=""><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Mã khách hàng:</span>
                                                    <span class="span-data">huy kk</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Số điện thoại:</span>
                                                    <span class="span-data">076321</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Địa chỉ:</span>
                                                    <span class="span-data">huy kk address</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Email:</span>
                                                    <span class="span-data">huykk@gmail.com</span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                <td colspan="8">Danh sách trống</td>
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
        </div>
    </div>
</body>

</html>

<script>
    // CHECK DELETE
    const checkDelete = document.querySelectorAll("#delete");
    checkDelete.forEach(function(checkDelete) {
        checkDelete.addEventListener('click', function(event) {
            const mess = confirm("Bạn có chắc chắn muốn xoá khách hàng này không?");
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

    // XEM THÊM KHI TRÊN MOBILE VÀ TABLET
    const trChilds = document.querySelectorAll('.tr-child');
    const iconSeeMores = document.querySelectorAll('.see-more');
    const iconNoSeeMores = document.querySelectorAll('.no-see-more');
    for (let i = 0; i < iconSeeMores.length; i++) {
        iconSeeMores[i].addEventListener('click', function() {
            iconSeeMores[i].classList.remove('show');
            iconSeeMores[i].classList.add('hide');
            trChilds[i].classList.add('tr-child-show');
            iconNoSeeMores[i].classList.add('show');
            iconNoSeeMores[i].addEventListener('click', function() {
                trChilds[i].classList.remove('tr-child-show');
                iconNoSeeMores[i].classList.remove('show');
                iconNoSeeMores[i].classList.add('hide');
                iconSeeMores[i].classList.add('show');
            })
        });
    }
</script>
