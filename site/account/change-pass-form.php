<style>
.update-success-message {
    display: none;
    background-color: #4CAF50;
    color: #fff;
    text-align: center;
    padding: 0px 20px;
    position: fixed;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}
</style>

<body>
    <div class="grid wide">
        <div class="wrapper-login">
            <form id="form-change" action="change-pass.php" method="post" class="main-login">
                <h2 class="title-login">Đổi mật khẩu</h2>
                <div class="form-group">
                    <label class="label-control" for="username">Tên đăng nhập <strong
                            style="color: red;">*</strong></label>
                    <input class="form-control" name="ma_kh" type="text" placeholder="Tên đăng nhập" id="username">
                </div>
                <div class="form-group">
                    <label class="label-control" for="pass-old">Mật khẩu cũ <strong
                            style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau" type="password" placeholder="Mật khẩu cũ" id="pass-old">
                </div>
                <div class="form-group">
                    <label class="label-control" for="pass-new">Mật khẩu mới <strong
                            style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau2" type="password" placeholder="Mật khẩu mới"
                        id="pass-new">
                </div>
                <div class="form-group">
                    <label class="label-control" for="repass">Xác nhận mật khẩu mới <strong
                            style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau3" type="password" placeholder="Xác nhận mật khẩu mới"
                        id="repass">
                </div>
                <div class="form-btn">
                    <input class="btn-submit" name="btn_change" type="submit" value="Đổi mật khẩu">
                </div>
            </form>
            <div id="update-success-message" class="update-success-message">
                <p><?php echo $MESSAGE; ?></p>
            </div>
        </div>
    </div>
</body>

<script>
$(document).ready(function() {
    $("#form-change").validate({
        rules: {
            "ma_kh": {
                required: true
            },
            "mat_khau": {
                required: true,
            },
            "mat_khau2": {
                required: true,
                minlength: 6
            },
            "mat_khau3": {
                required: true,
                equalTo: "#pass-new",
            }
        },

        messages: {
            "ma_kh": {
                required: "</br>Tên đăng nhập không dược để trống!"
            },
            "mat_khau": {
                required: "</br>Mật khẩu cũ không được để trống!"
            },
            "mat_khau2": {
                required: "</br>Mật khẩu mới không được để trống!",
                minlength: "</br>Mật khẩu mới ít nhất 6 kí tự!"
            },
            "mat_khau3": {
                required: "</br>Xác nhận mật khẩu mới không được để trống!",
                equalTo: "</br>Xác nhận mật khẩu mới không trùng khớp",
            }
        }
    });
});
</script>

<?php if (isset($MESSAGE) && !empty($MESSAGE)): ?>
<script>
$(document).ready(function() {
    $("#update-success-message").fadeIn().delay(1500).fadeOut();
    if (typeof updateSuccess !== 'undefined' && updateSuccess) {
        setTimeout(function() {
            window.location.href = '../main-page/index.php';
        }, 3000);
    }
});
</script>
<?php endif; ?>