<body>
    <div class="grid wide">
        <div class="wrapper-login">
            <form id="form-change" action="change-pass.php" method="post" class="main-login">
                <h2 class="title-login">Đổi mật khẩu</h2>
                <?php echo "<h5>$MESSAGE</h5>"; ?>
                <div class="form-group">
                    <label class="label-control" for="username">Tên đăng nhập <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="ma_kh" type="text" placeholder="Tên đăng nhập" id="username">
                </div>
                <div class="form-group">
                    <label class="label-control" for="pass-old">Mật khẩu cũ <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau" type="password" placeholder="Mật khẩu cũ" id="pass-old">
                </div>
                <div class="form-group">
                    <label class="label-control" for="pass-new">Mật khẩu mới <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau2" type="password" placeholder="Mật khẩu mới" id="pass-new">
                </div>
                <div class="form-group">
                    <label class="label-control" for="repass">Xác nhận mật khẩu mới <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau3" type="password" placeholder="Xác nhận mật khẩu mới" id="repass">
                </div>
                <div class="form-btn">
                    <input class="btn-submit" name="btn_change" type="submit" value="Đổi mật khẩu">
                </div>
            </form>
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