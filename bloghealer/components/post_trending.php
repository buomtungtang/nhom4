<?php
require './admin/connect.php';
$getPost = "SELECT 
    posts.post_id,posts.post_title,posts.post_content,posts.post_image,posts.acc_id,categories.category_id,
    posts.series,posts.post_description,posts.post_created_at,posts.post_status,posts.post_name,
    posts.view,posts.upvote,posts.downvote,accounts.username,categories.category_name,categories.category_convert,
    profiles.face_name,profiles.avatar
    FROM posts
    INNER JOIN accounts
    ON posts.acc_id = accounts.acc_id
    INNER JOIN profiles
    ON accounts.acc_id = profiles.acc_id
    INNER JOIN categories
    ON posts.category_id = categories.category_id
    WHERE posts.post_status = 'publish'
    ORDER BY  posts.view DESC, posts.post_created_at DESC
    LIMIT 4 
    ";
$qrPost = mysqli_query($connect, $getPost);
?>
<div class="homepage__trending grid wide sidePadding-16">
  <div class="homepage__trending--title items-center">
    <h2 class="trending-title">nổi bật trong tháng</h2>
    <a href="#" class="trendingTop--link hideOnTablet hideOnMobile">
      Xem TOP 10 bài viết</a>
  </div>
  <ul class="trending-container">
    <?php foreach ($qrPost as $eachPost) : ?>
      <li class="trending-card">
        <a class="post--image-represent" href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>">
          <img src="./vendors/thumbnails/<?php if ($eachPost['post_image']) {
                                            echo $eachPost['post_image'];
                                          } else {
                                            echo "bg_gray_default.jpg";
                                          } ?>" alt="" />
        </a>
        <div class="details-breif">
          <div class="post--info items-center">
            <span class="readingTime">7 phút đọc</span>
            <a href="#" class="savePost spr__icon" title="Click để lưu bài viết">
              <i class="fa-regular fa-bookmark"></i>
            </a>
          </div>
          <div class="navbar-title">
            <a class="navbar--post" href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>">
              <h2 class="post--title">
                <?php echo $eachPost['post_title']; ?>
              </h2>
            </a>
          </div>
          <div class="post--details items-center">
            <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="detail-avatar">
              <img src="./vendors/avatar/<?php echo $eachPost['avatar']; ?>" alt="" />
            </a>
            <div class="card-detais">
              <div class="card-author items-center">
                <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="author-name"><?php echo $eachPost['face_name']; ?></a>
                <span class="createdAt"><?php echo $eachPost['post_created_at']; ?></span>
              </div>
            </div>
          </div>
        </div>
      </li>

    <?php endforeach; ?>
  </ul>
  <!-- link page trending top -->
  <div class="trendingTop--link-tablet hide showOnTabletAndMobile">
    <a href="#" class="trendingTop__link-bottom items-center">
      <span>Xem TOP 10 bài viết</span>
      <i class="fa-solid fa-arrow-right"></i>
    </a>
  </div>
</div>