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
                            <h2>Danh sách đơn hàng (2)</h2>
                        </div>
                        <div class="content-noList"></div>
                        <div class="content-panel">
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="sort">STT</th>
                                        <th class="hide">Mã hoá đơn</th>
                                        <!-- <th class="hide">Mã khách hàng</th> -->
                                        <th>Tên khách hàng</th>
                                        <th class="hide">Địa chỉ</th>
                                        <th class="hide">Số điện thoại</th>
                                        <th class="hide">Email</th>
                                        <th>Tổng tiền</th>
                                        <th class="sort">Công cụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="checkbox_see_more" class="td-see-more">
                                                <i class="fa-solid fa-plus see-more show"></i>
                                                <i class="fa-solid fa-minus no-see-more"></i>
                                                <span>1</span>
                                            </label>
                                        </td>
                                        <td class="hide">hh</td>
                                        <!-- <td class="hide">hh</td> -->
                                        <td>huy kkk</td>
                                        <td class="hide">huy kkk address</td>
                                        <td class="hide">0763110</td>
                                        <td class="hide">huy</td>
                                        <td>3.000.000 đ</td>
                                        <td><a title="Chi tiết" href="./detailbill.php"><i class="fa-solid fa-circle-info"></i></a></td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Mã hoá đơn:</span>
                                                    <span class="span-data">hh</span>
                                                </li>
                                                <!-- <li>
                                                        <span class="span-title">Mã khách hàng:</span>
                                                        <span class="span-data">hh</span>
                                                    </li> -->
                                                <li>
                                                    <span class="span-title">Địa chỉ:</span>
                                                    <span class="span-data">huy kkk address</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Số điện thoại:</span>
                                                    <span class="span-data">0763110</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Email:</span>
                                                    <span class="span-data">kkk@gmail.com</span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="checkbox_see_more" class="td-see-more">
                                                <i class="fa-solid fa-plus see-more show"></i>
                                                <i class="fa-solid fa-minus no-see-more"></i>
                                                <span>2</span>
                                            </label>
                                        </td>
                                        <td class="hide">hh</td>
                                        <!-- <td class="hide">hh</td> -->
                                        <td>huy kkk</td>
                                        <td class="hide">huy kkk address</td>
                                        <td class="hide">0763110</td>
                                        <td class="hide">huy</td>
                                        <td>3.000.000 đ</td>
                                        <td><a title="Chi tiết" href="./detailbill.php"><i class="fa-solid fa-circle-info"></i></a></td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Mã hoá đơn:</span>
                                                    <span class="span-data">hh</span>
                                                </li>
                                                <!-- <li>
                                                        <span class="span-title">Mã khách hàng:</span>
                                                        <span class="span-data">hh</span>
                                                    </li> -->
                                                <li>
                                                    <span class="span-title">Địa chỉ:</span>
                                                    <span class="span-data">huy kkk address</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Số điện thoại:</span>
                                                    <span class="span-data">0763110</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Email:</span>
                                                    <span class="span-data">kkk@gmail.com</span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                            <td colspan="8">Danh sách trống</td>
                                        </tr>    -->
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