<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Danh sách sản phẩm <?php foreach ($amounts as $amount) extract($amount); ?>(<?= $so_luong ?>)</h2>
                    <ul class="title-panel-right">
                        <a href="index.php" class="btn-title-panel-right">Thêm mới</a>
                        <a href="index.php?btn_delete_all" id="delete_all" class="btn-delete-all">Xóa tất cả</a>
                    </ul>
                </div>
                <!-- <ul class="pagination">
                    <li><a class="pre" href="?btn_list&page_no=0"><i class="fa-solid fa-backward"></i></a></li>
                    <li><a href="?btn_list&page_no=<?= $_SESSION['page_no'] - 1 ?>">&lt;&lt;</a></li>
                    <li><a href="?btn_list&page_no=<?= $_SESSION['page_no'] + 1 ?>">&gt;&gt;</a></li>
                    <li><a class="next" href="?btn_list&page_no=<?= $_SESSION['page_count'] - 1 ?>"><i class="fa-solid fa-forward"></i></a></li>
                </ul> -->
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="sort">STT</th>
                                <th>Hình ảnh</th>
                                <th class="hide">Mã sản phẩm</th>
                                <th>Tên đồng hồ</th>
                                <th class="hide">Đơn giá</th>
                                <th class="hide">Giảm giá</th>
                                <th class="sort">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($products) > 0) {
                                $i = 1;
                                foreach ($products as $product) {
                                    extract($product); ?>
                                    <tr>
                                        <td><label for="checkbox_see_more" class="td-see-more"><i class="fa-solid fa-plus see-more show"></i> <i class="fa-solid fa-minus no-see-more"></i><span><?= $i ?></span></label></td>
                                        <td class="td-img"><img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $hinh ?>" alt=""></td>
                                        <td class="hide"><?= $ma_sp ?></td>
                                        <td><?= $ten_sp ?></td>
                                        <td class="hide"><?= $don_gia ?> đ</td>
                                        <td class="hide"><?= $giam_gia ?>%</td>
                                        <td>
                                            <a title="Sửa" href="index.php?btn_edit&ma_sp=<?= $ma_sp ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="Xoá" id="delete" href="index.php?btn_delete&ma_sp=<?= $ma_sp ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Mã sản phẩm:</span>
                                                    <span class="span-data"><?= $ma_sp ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Đơn giá:</span>
                                                    <span class="span-data"><?= $don_gia ?> đ</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Giảm giá:</span>
                                                    <span class="span-data"><?= $giam_gia ?>%</span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="7">Danh sách trống</td>
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
</body>

<script>
    // CHECK DELETE
    const checkDelete = document.querySelectorAll("#delete");
    checkDelete.forEach(function(checkDelete) {
        checkDelete.addEventListener('click', function(event) {
            const mess = confirm("Bạn có chắc chắn muốn xoá sản phẩm này không?");
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
