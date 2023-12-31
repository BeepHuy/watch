<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/css-site/main.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/css-site/gridsystem.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/css-site/responsive.css">
</head>

<body>
    <div class="wrapper">
        <!-- HEADER -->
        <header class="header">
            <?php require 'layout/header.php'; ?>
        </header>

        <!-- BANNER -->
        <?php require 'layout/banner.php'; ?>

        <!-- CONTAINER -->
        <div class="container">
            <?php require $VIEW; ?>
        </div>

        <!-- FOOTER -->
        <footer class="footer-wrapper">
            <?php require 'layout/footer.php'; ?>
        </footer>
    </div>

    <script src="<?= $CONTENT_URL ?>/js/js-site/main.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/js-site/slide.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</body>

</html>