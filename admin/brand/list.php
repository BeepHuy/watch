<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Danh sách hãng giày <?php foreach ($amounts as $amount) extract($amount); ?>(<?= $so_luong ?>)</h2>
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
                                <th>Tên hãng</th>
                                <th>Mã hãng</th>
                                <th class="sort">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($brands) > 0) {
                                $i = 1;
                                foreach ($brands as $brand) {
                                    extract($brand); ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $ten_hang; ?></td>
                                        <td><?= $ma_hang ?></td>
                                        <td>
                                            <a title="Sửa" href="index.php?btn_edit&ma_hang=<?= $ma_hang; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="Xoá" id="delete" data-tenhang="<?= $ten_hang ?>" href="index.php?btn_delete&ma_hang=<?= $ma_hang ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="4">Danh sách trống</td>
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
                    const tenHang = checkDelete.getAttribute('data-tenhang');
                    modal.style.display = 'block';
                    modalText.innerHTML = `Bạn có muốn xoá hãng *${tenHang}* không?`;

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

</html>