<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Thêm sản phẩm mới</h2>
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
                            <label class="control-label" for="id_product">Mã sản phẩm</label>
                            <input class="readonly form-control" type="text" name="ma_sp" id="id_product" readonly value="Auto number">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name_product">Tên sản phẩm <strong>*</strong></label>
                            <input type="text" class="form-control" name="ten_sp" id="name_product" placeholder=" "> <br>
                            <label for="" class="label-field">Tên sản phẩm</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price_product">Đơn giá <strong>*</strong></label>
                            <input type="text" class="form-control" name="don_gia" id="price_product" placeholder=" "> <br>
                            <label for="" class="label-field">Giá</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="discount_product">Giảm giá <strong>*</strong></label>
                            <input type="text" class="form-control" name="giam_gia" id="discount_product" placeholder=" "> <br>
                            <label for="" class="label-field">%</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pic_product">Hình ảnh <strong>*</strong></label>
                            <input type="file" class="form-control" name="hinh" id="pic_product"> <br>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_brand">Mã hãng <strong>*</strong></label>
                            <select name="ma_hang" id="id_brand">
                                <?php
                                foreach ($hang_select_list as $hang) { ?>
                                    <option value="<?= $hang['ma_hang'] ?>"><?= $hang['ten_hang'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_type">Mã loại <strong>*</strong></label>
                            <select name="ma_loai" id="id_type">
                                <?php
                                foreach ($loai_select_list as $loai) { ?>
                                    <option value="<?= $loai['ma_loai'] ?>"><?= $loai['ten_loai'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="describe_product">Mô tả <strong>*</strong></label>
                            <textarea name="mo_ta" id="describe_product" rows="5" placeholder=" "></textarea> <br>
                            <script>
                                CKEDITOR.replace('describe_product');
                            </script>
                            <!-- <label for="" class="label-field">Mô tả</label> -->
                        </div>
                        <input class="readonly" hidden type="text" name="so_luot_xem" value="0">
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
                "ten_sp": {
                    required: true
                },
                "don_gia": {
                    required: true,
                    number: true,
                    digits: true
                },
                "giam_gia": {
                    required: true,
                    number: true,
                    // digits: true,
                    max: 100
                },
                "hinh": {
                    required: true,
                },
            },

            messages: {
                "ten_sp": {
                    required: "</br>Tên sản phẩm không dược để trống!"
                },
                "don_gia": {
                    required: "</br>Đơn giá không được để trống!",
                    number: "</br>Đơn giá phải là số!",
                    digits: "</br>Đơn giá phải là số dương!"
                },
                "giam_gia": {
                    required: "</br>Giảm giá không được để trống!",
                    number: "</br>Giảm giá phải là số!",
                    // digits: "</br>Giảm giá phải là số dương!"
                    max: "</br>Bạn phải nhập từ 0 - 100 (%)!",
                },
                "hinh": {
                    required: "</br>Hình ảnh không được để trống!"
                }
            }
        });
    });
</script>