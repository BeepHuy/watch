<?php
if (!empty($MESSAGE) && $MESSAGE == 'Đăng ký thành công!') {
    echo '<script>
            Swal.fire({
                title: "Đăng ký thành công!",
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function() {
                window.location.href = "./login.php?btn_register";;
            }, 1000);
        </script>';
} else if (!empty($message) && $message == 'Tên đăng nhập đã tồn tại!') {
    echo '<script>
            Swal.fire({
                title: "Tên đăng nhập đã tồn tại!",
                icon: "error",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
} else {
    echo "<h5 class='notifications'>$MESSAGE</h5>";
}
?>
<style>
    .control-imageI {
        width: 100%;
        position: relative;
    }

    #previewImage {
        object-fit: cover;
        position: absolute;
        display: none;
        width: 40px;
        height: 33px;
        border-radius: 5px;
        top: 2px;
        right: 7px;
        bottom: 0;
        z-index: 2;
        display: none;
    }
</style>
<title>Register</title>

<body>
    <div class="grid wide">
        <div class="wrapper-login">
            <form id="form-register" action="register.php" method="post" class="main-login" enctype="multipart/form-data">
                <h2 class="title-login">Đăng ký</h2>
                <div class="form-group">
                    <label class="label-control" for="username">Tên đăng nhập <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="ma_kh" type="text" placeholder="Tên đăng nhập" id="username">
                </div>
                <div class="form-group">
                    <label class="label-control" for="name">Họ và tên <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="ten_kh" type="text" placeholder="Họ và tên" id="name">
                </div>
                <div class="form-group">
                    <label class="label-control" for="password">Mật khẩu <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau" type="password" placeholder="Mật khẩu" id="password">
                </div>
                <div class="form-group">
                    <label class="label-control" for="rePassword">Xác nhận mật khẩu <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="mat_khau2" type="password" placeholder="Xác nhân mật khẩu" id="rePassword">
                </div>
                <div class="form-group">
                    <label class="label-control" for="photo">Hình ảnh <strong>*</strong></label>
                    <div class="control-imageI">
                        <input type="file" class="form-control" name="up_hinh" id="photo" onchange="displayImage(this)">
                        <br>
                        <img id="previewImage" src="#" alt="Preview">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label-control" for="sdt">Số điện thoại <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="sdt" type="text" placeholder="Số điện thoại" id="sdt">
                </div>
                <div class="form-group">
                    <label class="label-control" for="address">Địa chỉ <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="dia_chi" type="text" placeholder="Địa chỉ" id="address">
                </div>
                <div class="form-group">
                    <label class="label-control" for="email">Email <strong style="color: red;">*</strong></label>
                    <input class="form-control" name="email" type="email" placeholder="Email" id="email">
                </div>
                <input type="hidden" value="0" name="vai_tro">
                <div class="form-btn">
                    <input class="btn-submit" name="btn_register" type="submit" value="Đăng ký">
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    function displayImage(input) {
        var preview = document.getElementById('previewImage');
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'inline-block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    };
</script>
<script>
    $(document).ready(function() {
        $("#form-register").validate({
            rules: {
                "ma_kh": {
                    required: true
                },
                "mat_khau": {
                    required: true,
                    minlength: 6
                },
                "mat_khau2": {
                    required: true,
                    equalTo: "#password",
                },
                "ten_kh": {
                    required: true
                },
                "sdt": {
                    required: true,
                    number: true
                },
                "dia_chi": {
                    required: true
                },
                "email": {
                    required: true,
                    email: true
                },
                "up_hinh": {
                    required: true,
                },
            },

            messages: {
                "ma_kh": {
                    required: "</br>Tên đăng nhập không dược để trống!"
                },
                "ten_kh": {
                    required: "</br>Họ tên không được để trống!"
                },
                "mat_khau": {
                    required: "</br>Mật khẩu không được để trống!",
                    minlength: "</br>Mật khẩu ít nhất 6 kí tự!"
                },
                "mat_khau2": {
                    required: "</br>Xác nhận mật khẩu không được để trống!",
                    equalTo: "</br>Mật khẩu không trùng khớp"
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