<!DOCTYPE html>
<html>
<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Cập nhật loại giày</h2>
                    <ul class="title-panel-right">
                        <a href="index.php" class="btn-title-panel-right">Thêm mới</a>
                    </ul>
                </div>
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <?php 
                        echo "<h5 class='notifications'>$MESSAGE</h5>";
                    ?>
                    <form id="form" action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="id_type">Mã loại</label>
                            <input class="readonly form-control" type="text" name="ma_loai" id="id_type" readonly value="<?= $ma_loai ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name_type">Tên loại <strong>*</strong></label>
                            <input type="text" class="form-control" name="ten_loai" id="name_type" placeholder=" " value="<?= $ten_loai ?>"> <br>
                        </div>
                        <div class="form-group-btn">
                            <button type="submit" name="btn_update" class="btn_success">Cập nhật</button>
                            <button type="reset" class="btn_success_reset">Nhập lại</button>
                            <a href="index.php?btn_list" class="btn_list">Danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                'ten_loai': {
                    required: true,
                }
            },

            messages: {
                'ten_loai': {
                    required: "</br>Tên loại không được để trống!"
                } 
            }
        });
    });
</script>
