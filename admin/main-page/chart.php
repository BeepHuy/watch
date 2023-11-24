<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Số Lượng', { role: 'style' }],
            <?php 
                foreach ($productsOfType as $type) {
                    extract($type); ?>
                    ['<?= ucfirst($ten_loai); ?>', <?= $so_luong ?>, 'fill-color: rgb(0, 0, 0)'], 
            <?php } ?>       
        ]);

        var options = {
            is3D: true,
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_3d'));
        chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div class="wrap">
        <div class="col">
            <div class="panel">
                <div class="content-panel">
                    <!-- STATISTICS -->
                    <div class="statistics">
                        <a href="<?= $ADMIN_URL ?>/bill?btn_list" class="statistics-item">                          
                            <div class="statistics-item-icon">
                                <i class="fa-solid fa-cart-plus"></i>
                            </div>
                            <div class="statistics-item-content">
                                <p>Tổng số đơn hàng</p>
                                <span><?php foreach($bills as $bill) {extract($bill); echo $so_luong; } ?></span>
                            </div>                          
                        </a>
                        <a href="<?= $ADMIN_URL ?>/goods?btn_list" class="statistics-item">
                            <div class="statistics-item-icon">
                                <i class="fa-solid fa-cookie-bite"></i>
                            </div>
                            <div class="statistics-item-content">
                                <p>Tổng số sản phẩm</p>
                                <span><?php foreach($products as $product) {extract($product); echo $so_luong; } ?></span>
                            </div>
                        </a>
                        <a href="<?= $ADMIN_URL ?>/customer?btn_list" class="statistics-item">
                            <div class="statistics-item-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="statistics-item-content">
                                <p>Tổng số khách hàng</p>
                                <span><?php foreach($customers as $customer) {extract($customer); echo $so_luong; } ?></span>
                            </div>
                        </a>
                        <a href="<?= $ADMIN_URL ?>/comment" class="statistics-item">
                            <div class="statistics-item-icon">
                                <i class="fa-sharp fa-solid fa-comments"></i>
                            </div>
                            <div class="statistics-item-content">
                                <p>Tổng số bình luận</p>
                                <span><?php foreach($comments as $comment) {extract($comment); echo $so_luong; } ?></span>
                            </div>
                        </a>
                    </div>

                    <!-- CHART -->
                    <div class="chart">
                        <div class="title-chart">
                            <p>Biểu đồ thống kê số lượng sản phẩm theo loại</p>
                        </div>
                        <div class="main-chart">
                            <div id="columnchart_3d"></div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
