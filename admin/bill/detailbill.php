<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Chi tiết hoá đơn</h2>
                    <ul class="title-panel-right">
                        <a href="index.php?btn_delete_all&ma_hd=<?= $bills[0]['ma_hd'] ?>" id="delete_all" class="btn-delete-all">Xóa tất cả</a>
                    </ul>
                </div>
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <form action="index.php?ma_hd=<?= $ma_hd; ?>" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="sort">STT</th>
                                    <th class="hide">Mã hoá đơn chi tiết</th>
                                    <th class="hide">Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th class="hide">Đơn giá</th>
                                    <th class="hide">Giảm giá</th>
                                    <th class="hide">Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th class="hide">Mã hoá đơn</th>
                                    <th class="sort">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($bills as $bill) {
                                    $don_gia2 = $bill['don_gia'] - ($bill['don_gia'] * ($bill['giam_gia'] / 100));
                                    extract($bill); ?>
                                    <tr>
                                        <td>
                                            <label for="checkbox_see_more" class="td-see-more">
                                                <i class="fa-solid fa-plus see-more show"></i>
                                                <i class="fa-solid fa-minus no-see-more"></i>
                                                <span><?= $i ?></span></label>
                                        </td>
                                        <td class="hide"><?= $ma_cthd; ?></td>
                                        <td class="hide"><?= $ma_sp; ?></td>
                                        <td><?= $ten_sp; ?></td>
                                        <td class="hide"><?= number_format($don_gia, 0, '.', ','); ?> đ</td>
                                        <td class="hide"><?= $giam_gia; ?>%</td>
                                        <td class="hide"><?= $so_luong; ?></td>
                                        <td>
                                            <?= number_format($don_gia2 * $so_luong, 0, '.', ',') ?> đ
                                        </td>
                                        <td class="hide"><?= $ma_hd ?></td>

                                        <td>
                                            <a title="Xoá" id="delete" data-tensp="<?= $ten_sp ?>" href="index.php?btn_delete&ma_hd=<?= $ma_hd ?>&ma_cthd=<?= $ma_cthd ?>&ma_sp=<?= $ma_sp ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Mã chi tiết hoá đơn:</span>
                                                    <span class="span-data"><?= $ma_cthd; ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Mã sản phẩm:</span>
                                                    <span class="span-data"><?= $ma_sp; ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Đơn giá:</span>
                                                    <span class="span-data"><?= number_format($don_gia, 0, '.', ','); ?> đ</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Giảm giá:</span>
                                                    <span class="span-data"><?= $giam_gia; ?>%</span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Số lượng:</span>
                                                    <span class="span-data"><?= $so_luong; ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Mã hoá đơn:</span>
                                                    <span class="span-data"><?= $ma_hd; ?></span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
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
                    const Tensp = checkDelete.getAttribute('data-tensp');
                    modal.style.display = 'block';
                    modalText.innerHTML = `Bạn có muốn xoá đơn hàng *${Tensp}* không?`;

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