<!DOCTYPE html>
<html lang="en">
<body>
    <div class="grid wide">
        <div class="wrapper-login">
            <form id="form-update" action="update-account.php" method="post" class="main-login" enctype="multipart/form-data">
                <h2 class="title-login">Cập nhật tài khoản</h2>
                <?php echo "<h5>$MESSAGE</h5>"; ?>
                <div class="form-group">
                    <label class="label-control" for="username">Tên đăng nhập <strong style="color: red;">*</strong></label>
                    <input class="form-control readonly" readonly name="ma_kh" type="text" placeholder="Tên đăng nhập" id="username" value="<?= $ma_kh ?>">
                </div>
                <div class="form-group">
                    <label class="label-control" for="name">Họ và tên <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="ten_kh" type="text" placeholder="Họ và tên" id="name" value="<?= $ten_kh ?>">
                </div>
                <div class="form-group">
                    <label class="label-control" for="photo">Hình ảnh <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="up_hinh" type="file" id="photo">
                    <span><?= $hinh ?></span>
                </div>
                <div class="form-group">
                    <label class="label-control" for="sdt">Số điện thoại <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="sdt" type="text" placeholder="Số điện thoại" id="sdt" value="<?= $sdt ?>">
                </div>
                <div class="form-group">
                    <label class="label-control" for="address">Địa chỉ <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="dia_chi" type="text" placeholder="Địa chỉ" id="address" value="<?= $dia_chi ?>">
                </div>
                <div class="form-group">
                    <label class="label-control" for="email">Email <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="email" type="email" placeholder="Email" id="email" value="<?= $email ?>">
                </div>
                <input type="hidden" value="<?= $vai_tro ?>" name="vai_tro">
                <input type="hidden" value="<?= $mat_khau ?>" name="mat_khau">
                <div class="form-btn">
                    <input class="btn-submit" name="btn_update" type="submit" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $("#form-update").validate({
            rules: {
                "ten_kh": {
                    required: true
                },
                "sdt": {
                    required: true,
                    number: true,
                },
                "dia_chi": {
                    required: true,
                },
                "email": {
                    required: true,
                    email:true
                },
                "up_hinh": {
                    required: true,
                },
            },

            messages: {
                "ten_kh": {
                    required: "</br>Họ tên không được để trống!"
                },
                "sdt": {
                    required: "</br>Số điện thoại không được để trống!",
                    number: "</br>Số điện thoại phải là số!"
                }, 
                "dia_chi": {
                    required: "</br>Địa chỉ không được để trống!",
                }, 
                "email": {
                    required: "</br>Email không được để trống!",
                    email: "</br>Email không đúng định dạng!"
                }, 
                "up_hinh": {
                    required: "</br>Hình ảnh không được để trống!",
                }
            }
        });
    });
</script>