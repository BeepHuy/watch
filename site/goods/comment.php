<!DOCTYPE html>
<html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

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
                                        <?php
                                                    if (isset($_SESSION['user']) == $comment['ma_kh']) { ?>
                                                        <a style="float: right; color: black" id="delete-cm" href="comment-delete.php?btn_delete&ma_bl=<?= $comment['ma_bl'] ?>&ma_sp=<?= $comment['ma_sp'] ?>"><ion-icon name="close-circle-outline"></ion-icon></a>
                                                   <?php }
                                         ?>
                                        <div class="main-comment" style="display: flex;">
                                            <p><?= $comment['noi_dung'] ?></p>
                                          
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

<script>
    $('#delete-cm').click(function(){
  Swal.fire({
  text: 'Xóa thành công',
  icon: 'success',
  confirmButtonText: 'Cool'
})
    })
</script>

<script src="sweetalert2.all.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>