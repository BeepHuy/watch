<!DOCTYPE html>
<html>

<body>
    <div class="grid wide">
        <div class="wrapper-comment">
            <div class="row no-gutters container-content">
                <div class="col l-12 m-12 c-12">
                    <div class="comments">
                        <h2 class="title-comments">Đánh giá</h2>
                        <!-- HISTORY COMMENT -->
                        <div class="history-comments">
                            <?php
                            require '../../dao/comment.php';
                            if (exist_param('noi_dung')) {
                                $ma_kh = $_SESSION['user']['ma_kh'];
                                $thoi_gian_bl = date_format(date_create(), 'Y-m-d');
                                binh_luan_insert($noi_dung, $thoi_gian_bl, $ma_kh, $ma_sp);
                            }
                            $comments = binh_luan_select_by_hang_hoa($ma_sp);
                            if (count($comments) > 0) {
                                foreach ($comments as $comment) { ?>
                                    <div class="wrapper-user-comment">
                                        <div class="user-comment">
                                            <div class="info-user-comment">
                                                <div class="img-user-comment">
                                                    <img src="<?= $CONTENT_URL ?>/images/img-admin/img-users/<?= $comment['hinh']; ?>" alt="">
                                                    <span class="mark"><i class="fa-solid fa-check"></i></span>
                                                </div>
                                                <div class="name-user-comment">
                                                    <span><?= $comment['ten_kh']; ?></span>
                                                </div>
                                            </div>
                                            <div class="time-user-comment">
                                                <span><?= $comment['thoi_gian_bl']; ?></span>
                                            </div>
                                        </div>
                                        <div class="main-comment">
                                            <p><?= $comment['noi_dung'] ?></p>
                                            <?php
                                            if (isset($_SESSION['user']) == $comment['ma_kh']) { ?>
                                                <a href="comment-delete.php?btn_delete&ma_bl=<?= $comment['ma_bl'] ?>&ma_sp=<?= $comment['ma_sp'] ?>">
                                                    <i class="fa-regular fa-circle-xmark"></i>
                                                </a>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <p class="no-comment">Chưa có đánh giá nào.</p>
                            <?php } ?>
                        </div>

                        <!-- FORM COMMENT -->
                        <?php
                        if (isset($_SESSION['user'])) { ?>
                            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="post">
                                <div class="form-comment-group">
                                    <textarea name="noi_dung" id="" rows="1" placeholder="Viết đánh giá..."></textarea> <br>
                                    <div class="btn-comment">
                                        <input type="reset" class="btn_comment_reset" value="Huỷ">
                                        <input type="submit" class="btn_comment" value="Gửi">
                                    </div>
                                </div>
                            </form>
                        <?php } else { ?>
                            <b class="login-to-comment">Hãy <a href="../account/login.php">Đăng nhập</a> hoặc <a href="../account/register.php">Đăng ký</a> để bình luận về sản phẩm này!</b>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid wide">
        <div class="form-comment">
            <div class="row no-gutters container-content">
                <div class="col l-12 m-12 c-12">
                    <div class="wrapper-reviews">
                        <h2 class="comment-of-product"></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
