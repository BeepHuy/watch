<!DOCTYPE html>
<html>

<head>
    <title>Toàn Bộ <?php if (count($products) > 0) echo $products[0]['ten_loai']; ?></title>
</head>

<body>
    <div class="grid wide">
        <div class="wrapper-root-type">
            <a class="root-type" href="<?= $SITE_URL ?>/main-page?homepage">Trang chủ</a>
            <span class="divider">/</span>
            <span class="root-type-name"><?php if (count($products) > 0) echo $products[0]['ten_loai']; ?></span>
        </div>
        <div class="gap-element" style="padding-top: 50px;"></div>

        <div class="row no-gutters container-content">
            <?php
            $productsPerPage = 8;
            $totalProducts = count($products);
            $totalPages = ceil($totalProducts / $productsPerPage);
            $currentPage = isset($_GET['page']) ? max(1, min($totalPages, intval($_GET['page']))) : 1;

            $start = ($currentPage - 1) * $productsPerPage;
            $end = min($start + $productsPerPage, $totalProducts);

            if ($totalProducts > 0) {
                for ($i = $start; $i < $end; $i++) {
                    $product = $products[$i];
            ?>
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
                    </div>
                <?php
                }
            } else {
                ?>
                <p class="list-product-empty">Không tìm thấy sản phẩm nào!</p>
            <?php
            }
            ?>
        </div>

        <!-- Thêm phân trang -->
        <div class="pagination">
            <?php if ($totalPages > 1) : ?>
                <?php if ($currentPage > 1) : ?>
                    <a href="?page=<?= $currentPage - 1 ?>&ma_loai=<?= $ma_loai ?>">Prev</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?page=<?= $i ?>&ma_loai=<?= $ma_loai ?>" <?= $i == $currentPage ? 'class="active"' : '' ?>><?= $i ?></a>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <a href="?page=<?= $currentPage + 1 ?>&ma_loai=<?= $ma_loai ?>">Next</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>