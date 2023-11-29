<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="title-panel">
                    <h2>Danh sách đơn hàng <?php foreach ($amounts as $amount) extract($amount); ?>(<?= $so_luong ?>)</h2>
                </div>
                <div class="content-noList"></div>
                <div class="content-panel">
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="sort">STT</th>
                                <th class="hide">Mã hoá đơn</th>
                                <!-- <th class="hide">Mã khách hàng</th> -->
                                <th>Tên khách hàng</th>
                                <th class="hide">Địa chỉ</th>
                                <th class="hide">Số điện thoại</th>
                                <th class="hide">Email</th>
                                <th>Tổng tiền</th>
                                <th class="sort">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (count($bills) > 0) {
                                foreach ($bills as $bill) {
                                    extract($bill); ?>
                                    <tr>
                                        <td>
                                            <label for="checkbox_see_more" class="td-see-more">
                                                <i class="fa-solid fa-plus see-more show"></i>
                                                <i class="fa-solid fa-minus no-see-more"></i>
                                                <span><?= $i ?></span>
                                            </label>
                                        </td>
                                        <td class="hide"><?= $ma_hd; ?></td>
                                        <!-- <td class="hide"><?= $ma_kh; ?></td> -->
                                        <td><?= $ten_kh; ?></td>
                                        <td class="hide"><?= $dia_chi; ?></td>
                                        <td class="hide"><?= $sdt; ?></td>
                                        <td class="hide"><?= $email; ?></td>
                                        <td><?= number_format($tong_tien, 0, '.', ','); ?> đ</td>
                                        <td><a title="Chi tiết" href="index.php?ma_hd=<?= $ma_hd; ?>"><i class="fa-solid fa-circle-info"></i></a></td>
                                    </tr>
                                    <tr class="tr-child">
                                        <td class="td-child" colspan="4">
                                            <ul>
                                                <li>
                                                    <span class="span-title">Mã hoá đơn:</span>
                                                    <span class="span-data"><?= $ma_hd; ?></span>
                                                </li>
                                                <!-- <li>
                                                        <span class="span-title">Mã khách hàng:</span>
                                                        <span class="span-data"><?= $ma_kh; ?></span>
                                                    </li> -->
                                                <li>
                                                    <span class="span-title">Địa chỉ:</span>
                                                    <span class="span-data"><?= $dia_chi; ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Số điện thoại:</span>
                                                    <span class="span-data"><?= $sdt; ?></span>
                                                </li>
                                                <li>
                                                    <span class="span-title">Email:</span>
                                                    <span class="span-data"><?= $email; ?></span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="8">Danh sách trống</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer>
                <div class="pull-right">
                    <p>WATCH - Hotline/Zalo: 0901749631 - 0705903736</p>
                </div>
            </footer>
        </div>
    </div>
</body>

<script>
    // XEM THÊM KHI TRÊN MOBILE VÀ TABLET
    const trChilds = document.querySelectorAll('.tr-child');
    const iconSeeMores = document.querySelectorAll('.see-more');
    const iconNoSeeMores = document.querySelectorAll('.no-see-more');
    for (let i = 0; i < iconSeeMores.length; i++) {
        iconSeeMores[i].addEventListener('click', function() {
            iconSeeMores[i].classList.remove('show');
            iconSeeMores[i].classList.add('hide');
            trChilds[i].classList.add('tr-child-show');
            iconNoSeeMores[i].classList.add('show');
            iconNoSeeMores[i].addEventListener('click', function() {
                trChilds[i].classList.remove('tr-child-show');
                iconNoSeeMores[i].classList.remove('show');
                iconNoSeeMores[i].classList.add('hide');
                iconSeeMores[i].classList.add('show');
            })
        });
    }
</script>