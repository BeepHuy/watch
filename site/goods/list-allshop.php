<!DOCTYPE html>
<html>
<title>Toàn Bộ Sản phẩm</title>

<body>
    <div class="grid wide">
        <div class="wrapper-root-type">
            <a class="root-type" href="<?= $SITE_URL ?>/main-page?homepage">Trang chủ</a>
            <span class="divider">/</span>
            <span class="root-type-name">Cửa hàng</span>
        </div>
        <div class="gap-element" style="padding-top: 50px;"></div>
        <div class="row no-gutters container-content">
            <?php
            if (count($products) > 0) { ?>
                <?php
                foreach ($products as $product) { ?>
                    <div class="col l-3 m-3 c-6" id="col-product">
                        <a href="<?= $SITE_URL ?>/goods/detail.php?ma_sp=<?= $product['ma_sp'] ?>" class="product-item">
                            <div class="content-product-item">
                                <?php
                                if ($product['giam_gia'] > 0) { ?>
                                    <div class="product-item-discount">
                                        <span>-<?= $product['giam_gia']; ?>%</span>
                                    </div>
                                <?php }
                                ?>
                                <div class="product-item-img">
                                    <img src="<?= $CONTENT_URL ?>/images/img-admin/img-products/<?= $product['hinh']; ?>" alt="">
                                </div>
                                <div class="product-item-name-category">
                                    <p><?= $product['ten_loai']; ?></p>
                                </div>
                                <div class="product-item-name">
                                    <p><?= $product['ten_sp']; ?></p>
                                </div>
                                <div class="product-item-price">
                                    <?php
                                    if ($product['giam_gia'] > 0) { ?>
                                        <del><?= number_format($product['don_gia'], 0, ',', '.');  ?> đ</del>
                                    <?php } ?>
                                    <p><?= number_format($product['don_gia'] - ($product['don_gia'] * ($product['giam_gia'] / 100)), 0, ',', '.'); ?> đ</p>
                                </div>
                            </div>
                        </a>
                    </div> <?php }
                    } else { ?>
        </div>
        <p class="list-product-empty">Không tìm thấy sản phẩm nào!</p>
    <?php } ?>
    </div>
</body>

</html>