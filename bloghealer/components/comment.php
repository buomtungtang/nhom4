<?php
    if(isset($_SESSION['acc_id'])){
        $id = $_SESSION['acc_id'];
    }

    require '../admin/connect.php';
    $getCom = "SELECT comments.*,profiles.face_name,profiles.avatar,accounts.username
    FROM comments
    INNER JOIN accounts ON comments.acc_id = accounts.acc_id
    INNER JOIN profiles ON accounts.acc_id = profiles.acc_id
    INNER JOIN posts ON comments.post_id = posts.post_id
    WHERE posts.comment_status = 'open' AND comments.post_id = '$postId'
    ";
    $qrCom = mysqli_query($connect,$getCom);

?>
<div class="container-comment">
    <form method="POST" action="../process_interaction.php" class="form-comment">
        <input type="hidden" name="idpost" value="<?php echo $postId; ?>">
        <input type="hidden" name="iduser" value="<?php echo $id; ?>">
        <input type ="text" class="write-comment" name="comment" placeholder="Hãy chia sẻ cảm nghĩ của bạn về bài viết" />
        <button type="submit" name="submitComment" class="btn">Gửi</button>
    </form>
    <ul class="list-comment">
    <?php foreach ($qrCom as $eachCom) : ?>
        <li class="comment__user">
            <div class="user__info">
                <div class="avatar">
                <a href="../user/nguoi-dung.php?username=<?php echo $eachCom['username']; ?>" class="detail-avatar">
                    <img src="../vendors/avatar/<?php echo $eachCom['avatar']; ?>" alt="" />
                </a>
                </div>
                <div class="details">
                <span class="facename"><?php echo $eachCom['face_name']; ?></span>
                <span class="comment__date"><?php echo $eachCom['comment_date']; ?></span>
                </div>
            </div>
            <p class="comment__content"><?php echo $eachCom['comment_content']; ?></p>
        </li>
    <?php endforeach; ?>
    </ul>
</div>