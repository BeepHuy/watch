<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Thêm link CSS của SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
</head>
<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Danh sách khách hàng <?php foreach ($amounts as $amount) extract($amount); ?>(<?= $so_luong ?>)</h2>
                    <ul class="title-panel-right">
                        <a href="index.php" class="btn-title-panel-right">Thêm mới</a>
                        <a href="index.php?btn_delete_all" id="delete_all" class="btn-delete-all">Xóa tất cả</a>
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
                            <?php
                            $i = 1;
                            if (count($customers) > 0) {
                                foreach ($customers as $customer) {
                                    extract($customer); ?>
                                    <tr>
                                        <td><label for="checkbox_see_more" class="td-see-more"><i class="fa-solid fa-plus see-more show"></i> <i class="fa-solid fa-minus no-see-more"></i><span><?= $i; ?></span></label></td>
                                        <td class="hide"><?= $ma_kh ?></td>
                                        <td class="td-img"><img src="<?= $CONTENT_URL ?>/images/img-admin/img-users/<?= $hinh ?>" alt=""></td>
                                        <td><?= $ten_kh ?></td>
                                        <td class="hide"><?= $sdt ?></td>
                                        <td class="hide"><?= $dia_chi ?></td>
                                        <td class="hide"><?= $email ?></td>
                                        <td>
                                            <a title="Sửa" href="index.php?btn_edit&ma_kh=<?= $ma_kh ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="Xoá" id="delete" href="index.php?btn_delete&ma_kh=<?= $ma_kh ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Mã khách hàng:</span>
                                                    <span class="span-data"><?= $ma_kh ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Số điện thoại:</span>
                                                    <span class="span-data"><?= $sdt ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Địa chỉ:</span>
                                                    <span class="span-data"><?= $dia_chi ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Email:</span>
                                                    <span class="span-data"><?= $email ?></span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="8">Danh sách trống</td>
                                </tr>
                            <?php } ?>
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

    <!-- Thêm script JS của SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script>
        // CHECK DELETE
        const checkDelete = document.querySelectorAll("#delete");
        checkDelete.forEach(function (checkDelete) {
            checkDelete.addEventListener('click', function (event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định
                Swal.fire({
                    title: 'Xác nhận xoá',
                    text: 'Bạn có chắc chắn muốn xoá khách hàng này không?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy bỏ',
                    timer: 5000
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Hành động mặc định khi Đồng ý
                        window.location.href = checkDelete.getAttribute('href');
                    } else {
                        // Người dùng đã chọn Hủy bỏ, có thể thực hiện các hành động khác ở đây (nếu cần)
                    }
                });
            });
        });

        // CHECK DELETE ALL
        const checkDeleteAll = document.querySelector("#delete_all");
        checkDeleteAll.addEventListener('click', function (event) {
            // Sử dụng SweetAlert2 thay vì confirm
            event.preventDefault(); // Ngăn chặn hành động mặc định
            Swal.fire({
                title: 'Xác nhận xoá',
                text: 'Bạn có chắc chắn muốn xoá tất cả không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ',
                timer: 5000
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hành động mặc định khi Đồng ý
                    window.location.href = checkDeleteAll.getAttribute('href');
                } else {
                    // Người dùng đã chọn Hủy bỏ, có thể thực hiện các hành động khác ở đây (nếu cần)
                }
            });
        });

        // XEM THÊM KHI TRÊN MOBILE VÀ TABLET
        const trChilds = document.querySelectorAll('.tr-child');
        const iconSeeMores = document.querySelectorAll('.see-more');
        const iconNoSeeMores = document.querySelectorAll('.no-see-more');
        for (let i = 0; i < iconSeeMores.length; i++) {
            iconSeeMores[i].addEventListener('click', function () {
                iconSeeMores[i].classList.remove('show');
                iconSeeMores[i].classList.add('hide');
                trChilds[i].classList.add('tr-child-show');
                iconNoSeeMores[i].classList.add('show');
                iconNoSeeMores[i].addEventListener('click', function () {
                    trChilds[i].classList.remove('tr-child-show');
                    iconNoSeeMores[i].classList.remove('show');
                    iconNoSeeMores[i].classList.add('hide');
                    iconSeeMores[i].classList.add('show');
                })
            });
        }
    </script>
</body>
</html>
