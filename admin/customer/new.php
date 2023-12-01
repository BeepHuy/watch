<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Thêm mới khách hàng</h2>
                </div>
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <?php
                    if (!empty($MESSAGE) && $MESSAGE == 'Thêm mới thành công!') {
                        echo '<script>
                            Swal.fire({
                                title: "Thêm mới thành công!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function() {
                                window.location.href = "index.php?btn_list";
                            }, 1500);
                        </script>';
                    } else {
                        echo "<h5 class='notifications'>$MESSAGE</h5>";
                    }
                    ?>
                    <form id="form" action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="id_customer">Mã khách hàng <strong>*</strong></label>
                            <input class="form-control" type="text" name="ma_kh" id="id_customer" placeholder=" ">
                            <label for="" class="label-field">Mã khách hàng</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name_customer">Tên khách hàng <strong>*</strong></label>
                            <input type="text" class="form-control" name="ten_kh" id="name_customer" placeholder=" "> <br>
                            <label for="" class="label-field">Tên khách hàng</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pass">Mật khẩu <strong>*</strong></label>
                            <input type="password" class="form-control" name="mat_khau" id="pass" placeholder=" "> <br>
                            <label for="" class="label-field">Mật khẩu</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="confirm_pass_customer">Xác nhận mật khẩu <strong>*</strong></label>
                            <input type="password" class="form-control" name="mat_khau2" id="confirm_pass_customer" placeholder=" "> <br>
                            <label for="" class="label-field">Xác nhận mật khẩu</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pic_customer">Hình ảnh <strong>*</strong></label>
                            <input type="file" class="form-control" name="hinh" id="pic_customer"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tel_customer">Di động <strong>*</strong></label>
                            <input type="text" class="form-control" name="sdt" id="tel_customer" placeholder=" "> <br>
                            <label for="" class="label-field">Di động</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address_customer">Địa chỉ <strong>*</strong></label>
                            <input type="text" class="form-control" name="dia_chi" id="address_customer" placeholder=" "> <br>
                            <label for="" class="label-field">Địa chỉ</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email_customer">Email <strong>*</strong></label>
                            <input type="email" class="form-control" name="email" id="email_customer" placeholder=" "> <br>
                            <label for="" class="label-field">Email</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Vai trò <strong>*</strong></label>
                            <div class="border-radio">
                                <input type="radio" class="form-control-radio" name="vai_tro" id="customer" value="0"> <label for="customer">Khách hàng</label>
                                <input type="radio" class="form-control-radio" name="vai_tro" id="admin" value="1" checked> <label for="admin">Nhân viên</label>
                            </div>
                        </div>
                        <div class="form-group-btn">
                            <button type="submit" name="add" class="btn_success">Lưu lại</button>
                            <button type="reset" class="btn_success_reset">Nhập lại</button>
                            <a href="index.php?btn_list" class="btn_list">Danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                "ma_kh": {
                    required: true
                },
                "ten_kh": {
                    required: true
                },
                "mat_khau": {
                    required: true,
                    minlength: 6
                },
                "mat_khau2": {
                    required: true,
                    equalTo: "#pass",
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
                    email: true
                },
                "hinh": {
                    required: true,
                },
            },

            messages: {
                "ma_kh": {
                    required: "</br>Mã khách hàng không dược để trống!"
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
                    equalTo: "</br>Mật khẩu không trùng khớp!"
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
                "hinh": {
                    required: "</br>Hình ảnh không được để trống!",
                }
            }
        });
    });
</script>