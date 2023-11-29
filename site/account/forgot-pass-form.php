<body>
    <div class="grid wide">
        <div class="wrapper-login">
            <form id="form-forgot" action="forgot-pass.php" method="post" class="main-login">
                <h2 class="title-login">Quên mật khẩu</h2>
                <?php echo "<h5>$MESSAGE</h5>"; ?>
                <div class="form-group">
                    <label class="label-control" for="username">Tên đăng nhập <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="ma_kh" type="text" placeholder="Tên đăng nhập" id="username">
                </div>
                <div class="form-group">
                    <label class="label-control" for="email">Email <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="email" type="email" placeholder="Mật khẩu" id="email">
                </div>
                <div class="form-btn">
                    <input class="btn-submit" name="btn_forgot" type="submit" value="Lấy lại mật khẩu">
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("#form-forgot").validate({
            rules: {
                "ma_kh": {
                    required: true
                },
                "email": {
                    required: true,
                    email: true
                }
            },

            messages: {
                "ma_kh": {
                    required: "</br>Tên đăng nhập không dược để trống!"
                },
                "email": {
                    required: "</br>Email không được để trống!",
                    email: "</br>Email không đúng định dạng!"
                }
            }
        });
    });
</script>