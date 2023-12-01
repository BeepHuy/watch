<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Danh sách bình luận</h2>
                </div>
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="sort">STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số bình luận</th>
                                <th class="hide">Mới nhất</th>
                                <th class="hide">Cũ nhất</th>
                                <th class="sort">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (count($comments) > 0) {
                                foreach ($comments as $comment) {
                                    extract($comment);                                 ?>
                                    <tr>
                                        <td><label for="checkbox_see_more" class="td-see-more"><i class="fa-solid fa-plus see-more show"></i> <i class="fa-solid fa-minus no-see-more"></i><span><?= $i ?></span></label></td>
                                        <td><?= ucfirst($ten_sp); ?></td>
                                        <td><?= $so_luong; ?></td>
                                        <td class="hide"><?= $moi_nhat ?></td>
                                        <td class="hide"><?= $cu_nhat ?></td>
                                        <td><a title="Chi tiết" href="/watch/admin/comment/index.php?ma_sp=<?= $ma_sp; ?>"><i class="fa-solid fa-circle-info"></i></a></td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Ngày bình luận mới nhất:</span>
                                                    <span class="span-data"><?= $moi_nhat ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Ngày bình luận cũ nhất:</span>
                                                    <span class="span-data"><?= $cu_nhat ?></span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="6">Danh sách trống</td>
                                </tr>
                            <?php }
                            ?>
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