<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <div class="detail-commentt">
                        <h2>Chi tiết bình luận (<?= ucfirst($comments[0]['ten_sp']); ?>)</h2>
                    </div>
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
                                        <td>
                                            <a title="Xoá" id="delete" data-NoiDbl="<?= $noi_dung ?>" href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>&ma_sp=<?= $ma_sp ?>"><i class="fa-solid fa-trash"></i></a>
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
    <!-- modal -->
    <div class="confirmModal">
        <div id="confirmationModal" class="modal">
            <div class="modal-content">
                <p id="modalText"></p>
                <button id="confirmDelete">Xác nhận</button>
                <button id="cancelDelete">Hủy</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // CHECK DELETE
            const checkDelete = document.querySelectorAll("#delete");
            checkDelete.forEach(function(checkDelete) {
                checkDelete.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Hiển thị modal
                    const modal = document.getElementById('confirmationModal');
                    const modalText = document.getElementById('modalText');
                    const NoiDbl = checkDelete.getAttribute('data-NoiDbl');
                    modal.style.display = 'block';
                    modalText.innerHTML = `Bạn có muốn xoá bình luận *${NoiDbl}* không?`;

                    // Xác nhận xoá khi nút xác nhận được nhấn
                    document.getElementById('confirmDelete').addEventListener('click', function() {
                        window.location.href = checkDelete.href;
                    });

                    // Ẩn modal khi nút Hủy được nhấn
                    document.getElementById('cancelDelete').addEventListener('click', function() {
                        modal.style.display = 'none';
                    });
                });
            });

            // CHECK DELETE ALL
            const checkDeleteAll = document.querySelector("#delete_all");
            checkDeleteAll.addEventListener('click', function(event) {
                event.preventDefault();

                // Hiển thị modal
                const modal = document.getElementById('confirmationModal');
                const modalText = document.getElementById('modalText');
                modal.style.display = 'block';
                modalText.innerHTML = 'Bạn có chắc chắn muốn xoá tất cả không?';

                // Xác nhận xoá khi nút xác nhận được nhấn
                document.getElementById('confirmDelete').addEventListener('click', function() {
                    window.location.href = checkDeleteAll.href;
                });

                // Ẩn modal khi nút Hủy được nhấn
                document.getElementById('cancelDelete').addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            });
        });
    </script>
</body>