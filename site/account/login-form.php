<!DOCTYPE html>
<html lang="en">
<body>
    <div class="grid wide">
        <div class="wrapper-login">
            <form id="form-login-main" action="login.php" method="post" class="main-login">
                <h2 class="title-login">Đăng nhập</h2>
                <?php echo "<h5>$MESSAGE</h5>"; ?>
                <div class="form-group">
                    <label class="label-control" for="username">Tên đăng nhập <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="ma_kh" type="text" placeholder="Tên đăng nhập" id="username" value="<?= $ma_kh; ?>">
                </div>
                <div class="form-group">
                    <label class="label-control" for="password">Mật khẩu <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau"  type="password" placeholder="Mật khẩu" id="password" value="<?= $mat_khau ?>">
                </div>
                <div class="form-btn">
                    <input class="btn-submit" name="btn_login" type="submit" value="Đăng nhập">
                    <input class="ip-remember" type="checkbox" name="remember" id="remember"> <label class="label-remember" for="remember">Ghi nhớ mật khẩu</label>
                </div>
                <p class="lost-pass"><a href="<?= $SITE_URL ?>/account/forgot-pass.php">Quên mật khẩu?</a></p>
                <p class="register"><a href="<?= $SITE_URL ?>/account/register.php">Đăng ký</a></p>
            </form>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $("#form-login-main").validate({
            rules: {
                "ma_kh": {
                    required: true
                },
                "mat_khau": {
                    required: true,
                }
            },

            messages: {
                "ma_kh": {
                    required: "</br>Tên đăng nhập không dược để trống!"
                },
                "mat_khau": {
                    required: "</br>Mật khẩu không được để trống!",
                    minlength: "</br>Mật khẩu ít nhất 6 kí tự!"
                }
            }
        });
    });
</script>