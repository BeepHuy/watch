<!DOCTYPE html>
<html>

<body>
    <div class="wrapper-same-product">
        <div class="title-same-product">
            <h3>Sản phẩm tương tự</h3>
        </div>
        <div class="row no-gutters container-content">
            <?php
            if (count($sameProducts) > 0) { ?>
                <?php
                $i = 1;
                foreach ($sameProducts as $sameProduct) {
                    if ($i == 5) break; ?>
                    <div class="col l-3 m-3 c-6">
                        <a href="<?= $SITE_URL ?>/goods/detail.php?ma_sp=<?= $sameProduct['ma_sp'] ?>" class="product-item">
                            <div class="content-product-item">
                                <?php
                                if ($sameProduct['giam_gia'] > 0) { ?>
                                    <div class="product-item-discount">
                                        <span>-<?= $sameProduct['giam_gia']; ?>%</span>
                                    </div>
                                <?php }
                                ?>
                                <div class="product-item-img">
                                    <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $sameProduct['hinh']; ?>" alt="">
                                </div>
                                <div class="product-item-name-category">
                                    <p><?= $sameProduct['ten_loai']; ?></p>
                                </div>
                                <div class="product-item-name">
                                    <p><?= $sameProduct['ten_sp']; ?></p>
                                </div>
                                <div class="product-item-price">
                                    <?php
                                    if ($sameProduct['giam_gia'] > 0) { ?>
                                        <del><?= number_format($sameProduct['don_gia'], 0, ',', '.');  ?> đ</del>
                                    <?php } ?>
                                    <p><?= number_format($sameProduct['don_gia'] - ($sameProduct['don_gia'] * ($sameProduct['giam_gia'] / 100)), 0, ',', '.'); ?> đ</p>
                                </div>
                            </div>
                        </a>
                    </div> <?php $i++;
                        }
                    } else { ?>
        </div>
        <p class="list-product-empty">Không tìm thấy sản phẩm nào!</p>
    <?php } ?>
    </div>
</body>

</html>