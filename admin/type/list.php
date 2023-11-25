<!DOCTYPE html>
<html>
<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Danh sách loại giày <?php foreach($amounts as $amount) extract($amount);?>(<?= $so_luong ?>)</h2>
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
                                <th>Tên loại</th>
                                <th>Mã loại</th>
                                <th class="sort">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                if(count($types) > 0) {
                                    foreach ($types as $type) {                                 
                                        extract($type); ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ten_loai ?></td>
                                            <td><?= $ma_loai ?></td>
                                            <td>
                                                <a title="Sửa" href="index.php?btn_edit&ma_loai=<?= $ma_loai ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a title="Xoá" id="delete" href="index.php?btn_delete&ma_loai=<?= $ma_loai ?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++; } } else{ ?>
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
</body>
</html>

<script>
    // CHECK DELETE
    const checkDelete = document.querySelectorAll("#delete");
    checkDelete.forEach(function(checkDelete){
        checkDelete.addEventListener('click', function(event){
            const mess = confirm("Bạn có chắc chắn muốn xoá loại hàng này không?");
            if(mess == false){
            event.preventDefault();
            }
        })
    })

    // CHECK DELETE ALL
    const checkDeleteAll = document.querySelector("#delete_all");
        checkDeleteAll.addEventListener('click', function(event){
        const mess = confirm("Bạn có chắc chắn muốn xoá tất cả không?");
        if(mess == false){
        event.preventDefault();
        }
    })
</script>
