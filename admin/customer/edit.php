<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Cập nhật thông tin khách hàng</h2>
                    <ul class="title-panel-right">
                        <a href="index.php" class="btn-title-panel-right">Thêm mới</a>
                    </ul>
                </div>
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <form id="form" action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="id_customer">Mã khách hàng <strong>*</strong></label>
                            <input class="form-control readonly" readonly type="text" name="ma_kh" id="id_customer" placeholder=" " value="<?= $ma_kh ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name_customer">Tên khách hàng <strong>*</strong></label>
                            <input type="text" class="form-control" name="ten_kh" id="name_customer" placeholder=" " value="<?= $ten_kh ?>"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pass_customer">Mật khẩu <strong>*</strong></label>
                            <input type="password" class="form-control" name="mat_khau" id="pass" placeholder=" " value="<?= $mat_khau ?>"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="confirm_pass_customer">Xác nhận mật khẩu <strong>*</strong></label>
                            <input type="password" class="form-control" name="mat_khau2" id="confirm_pass_customer" placeholder=" " value="<?= $mat_khau ?>"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pic_customer">Hình ảnh <strong>*</strong></label>
                            <input type="file" class="form-control" name="up_hinh" id="pic_customer"> <br>
                        </div>
                        <span class="update-pic"><?= $hinh ?></span>
                        <div class="form-group">
                            <label class="control-label" for="tel_customer">Di động <strong>*</strong></label>
                            <input type="text" class="form-control" name="sdt" id="tel_customer" placeholder=" " value="<?= $sdt ?>"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address_customer">Địa chỉ <strong>*</strong></label>
                            <input type="text" class="form-control" name="dia_chi" id="address_customer" placeholder=" " value="<?= $dia_chi ?>"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email_customer">Email <strong>*</strong></label>
                            <input type="email" class="form-control" name="email" id="email_customer" placeholder=" " value="<?= $email ?>"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Vai trò <strong>*</strong></label>
                            <div class="border-radio">
                                <input type="radio" class="form-control-radio" name="vai_tro" value="0" <?php echo !$vai_tro ? 'checked' : '' ?> id="customer"><label for="customer">Khách hàng</label>
                                <input type="radio" class="form-control-radio" name="vai_tro" value="1" <?php echo $vai_tro ? 'checked' : '' ?> id="admin"> <label for="admin">Nhân viên</label>
                            </div>
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