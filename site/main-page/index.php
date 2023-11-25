<!DOCTYPE html>
<html lang="en">
<body>
    <div class="wrapper">
        <!-- HEADER -->
        <header class="header">
        <?php require '../layout/header.php'; ?>
        </header>

        <!-- BANNER -->
        <?php require '../layout/banner.php'; ?>

        <!-- CONTAINER -->
        <div class="container">
            <?php require './homepage.php'; ?>
        </div>

        <!-- FOOTER -->
        <footer class="footer-wrapper">
            <?php require '../layout/footer.php'; ?>
        </footer>
    </div>
</body>
</html>