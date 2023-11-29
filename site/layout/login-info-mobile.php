<body>
    <div class="my-account l-0">
        <p class="name-my-account">Xin chào: <?= $_SESSION['user']['ten_kh'] ?></p>
        <ul class="link-my-account">
            <li><a class="logoff" href="<?= $SITE_URL ?>/account/login.php?btn_logoff"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>
            <li><a class="change-pass" href="<?= $SITE_URL ?>/account/change-pass.php"><i class="fa-sharp fa-solid fa-key"></i>Đổi mật khẩu</a></li>
            <li><a class="update-account" href="<?= $SITE_URL ?>/account/update-account.php"><i class="fa-solid fa-pen-to-square"></i>Cập nhật tài khoản</a></li>
            <?php
            if ($_SESSION['user']['vai_tro'] == TRUE) {
                echo "<li><a class='admin' href='$ADMIN_URL/main-page'><i class='fa-solid fa-screwdriver-wrench'></i>Quản trị website</a></li>";
            }
            ?>
        </ul>
    </div>
</body>