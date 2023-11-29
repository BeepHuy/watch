<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Chi tiết bình luận (<?= ucfirst($comments[0]['ten_sp']); ?>)</h2>
                    <ul class="title-panel-right">
                        <a href="index.php?btn_delete_all&ma_sp=<?= $comments[0]['ma_sp'] ?>" id="delete_all" class="btn-delete-all">Xóa tất cả</a>
                    </ul>
                </div>
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <form action="index.php?ma_sp=<?= $ma_sp ?>" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="sort">STT</th>
                                    <th>Nội dung</th>
                                    <th class="hide">Ngày bình luận</th>
                                    <th class="hide">Người bình luận</th>
                                    <th class="sort">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($comments as $comment) {
                                    extract($comment); ?>
                                    <tr>
                                        <td><label for="checkbox_see_more" class="td-see-more"><i class="fa-solid fa-plus see-more show"></i> <i class="fa-solid fa-minus no-see-more"></i><span><?= $i ?></span></label></td>
                                        <td><?= ucfirst($noi_dung); ?></td>
                                        <td class="hide"><?= $thoi_gian_bl; ?></td>
                                        <td class="hide"><?= ucwords($ten_kh); ?></td>
                                        <td><a title="Xoá" id="delete" href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>&ma_sp=<?= $ma_sp ?>"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="3">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Ngày bình luận:</span>
                                                    <span class="span-data"><?= $thoi_gian_bl ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Người bình luận:</span>
                                                    <span class="span-data"><?= $ten_kh ?></span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
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