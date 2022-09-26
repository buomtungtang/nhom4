<?php
require '../admin/connect.php';
$postId = $_GET['idPost'];
$getPost = "SELECT * FROM posts WHERE post_id = '$postId'
  ";
$qrGetPost = mysqli_query($connect, $getPost);
if (mysqli_num_rows($qrGetPost) == 1) {
  $post = mysqli_fetch_array($qrGetPost);
}
?>
<li class="post">
  <a href="./post/post.php?post=<?php echo $post['post_name']; ?>&id=<?php echo $post['post_id']; ?>" class="post--image-represent">
    <img src="./vendors/thumbnails/<?php echo $post['post_image']; ?>" alt="" />
  </a>
  <div class="details-breif">
    <div class="post--info items-center">
      <div class="post--info-general">
        <a href="#" class="topicName"><?php echo $post['category_name']; ?></a>
        <span class="readingTime">5 phút đọc</span>
      </div>
      <a href="#" class="savePost spr__icon" title="Click để lưu bài viết">
        <i class="fa-regular fa-bookmark"></i>
      </a>
    </div>
    <div class="navbar-title">
      <a href="./post/May-tinh-luong-tu-ki-1-Nguon-goc-cua-may-tinh-luong-tu.php" class="navbar--post">
        <h2 class="post--title">
          <?php echo $post['post_title']; ?>
        </h2>
      </a>
      <p class="post__content-des">
        <?php echo $post['post_description']; ?>
      </p>
    </div>
    <div class="post--details items-center">
      <a href="../user/nguoi-dung.php?name=<?php echo $post['username']; ?>" class="detail-avatar">
        <img src="./vendors/avatar/meo_hung.jpg" alt="" />
      </a>
      <div class="items-center card-details">
        <div class="card-author items-center">
          <a href="#" class="author-name">Mèo Hung</a>
          <span class="createdAt"><?php echo $post['post_created_at']; ?></span>
        </div>
        <div class="items-center interactions">
          <button class="items-center action-likePost">
            <span class="spr__icon">
              <i class="fa-regular fa-heart"></i>
            </span>
            <span class="amount amount-like">30</span>
          </button>
          <a href="#" class="items-center action-commentPost">
            <span class="spr__icon">
              <i class="fa-regular fa-comment-dots"></i>
            </span>
            <span class="amount amount-comment">12</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</li>