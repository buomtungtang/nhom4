<?php
require './admin/connect.php';

$page = 1;
if (isset($_GET['trang'])) {
  $page = $_GET['trang'];
}


$numberPost = "SELECT COUNT(*) FROM posts";
$qrNumPost = mysqli_query($connect, $numberPost);
$numPost = mysqli_fetch_array($qrNumPost);
$posts = $numPost['COUNT(*)'];
$numPostPerPage = 10;
$numPage = ceil($posts / $numPostPerPage);
$skipPost = $numPostPerPage * ($page - 1);

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
    WHERE posts.post_status = 'publish' AND RAND()
    ORDER BY posts.post_created_at
    LIMIT $numPostPerPage OFFSET $skipPost
        ";
$qrPost = mysqli_query($connect, $getPost);
?>
<ul class="feed__gallery" id = "post__for-you">
  <?php foreach ($qrPost as $eachPost) : ?>
    <?php
    //$postId = $eachPost['post_id'];
    // include "../components/post_link.php?idPost=$postId";
    //fopen("./components/post_link.php?idPost=$postId","r");
    ?>
    <li class="post">
      <a href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="post--image-represent">
        <img src="./vendors/thumbnails/<?php if ($eachPost['post_image']) {
                                          echo $eachPost['post_image'];
                                        } else {
                                          echo "bg_gray_default.jpg";
                                        } ?>" alt="" />
      </a>
      <div class="details-breif">
        <div class="post--info items-center">
          <div class="post--info-general">
            <a href="./chuyen-muc.php?category=<?php echo $eachPost['category_convert']; ?>&id=<?php echo $eachPost['category_id']; ?>" class="topicName"><?php echo $eachPost['category_name']; ?></a>
            <span class="readingTime">5 phút đọc</span>
          </div>
          <a href="#" class="savePost spr__icon" title="Click để lưu bài viết">
            <i class="fa-regular fa-bookmark"></i>
          </a>
        </div>
        <div class="navbar-title">
          <a href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="navbar--post">
            <h2 class="post--title">
              <?php echo $eachPost['post_title']; ?>
            </h2>
          </a>
          <p class="post__content-des">
            <?php echo $eachPost['post_description']; ?>
          </p>
        </div>
        <div class="post--details items-center">
          <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="detail-avatar">
            <img src="./vendors/avatar/<?php echo $eachPost['avatar']; ?>" alt="" />
          </a>
          <div class="items-center card-details">
            <div class="card-author items-center">
              <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="author-name"><?php echo $eachPost['face_name']; ?></a>
              <span class="createdAt"><?php echo $eachPost['post_created_at']; ?></span>
            </div>
            <div class="items-center interactions">
              <button class="items-center action-likePost">
                <span class="spr__icon">
                  <i class="fa-regular fa-heart"></i>
                </span>
                <span class="amount amount-like"><?php echo $eachPost['upvote']; ?></span>
              </button>
              <a href="#" class="items-center action-commentPost">
                <span class="spr__icon">
                  <i class="fa-regular fa-comment-dots"></i>
                </span>
                <span class="amount amount-comment"><?php if(isset($eachPost['comment_count'])){echo $eachPost['comment_count'];}else{echo "0";} ?></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </li>

  <?php endforeach; ?>
</ul>
<!-- post latest -->
<?php
$getPost = "SELECT 
posts.*,accounts.username,categories.category_name,categories.category_convert,
profiles.face_name,profiles.avatar
FROM posts
INNER JOIN accounts
ON posts.acc_id = accounts.acc_id
INNER JOIN profiles
ON accounts.acc_id = profiles.acc_id
INNER JOIN categories
ON posts.category_id = categories.category_id
WHERE posts.post_status = 'publish'
ORDER BY posts.post_created_at DESC
LIMIT $numPostPerPage OFFSET $skipPost
    ";
$qrPost = mysqli_query($connect, $getPost);
?>
<ul class="feed__gallery" id = "post__latest">
  <?php foreach ($qrPost as $eachPost) : ?>
    <?php
    //$postId = $eachPost['post_id'];
    // include "../components/post_link.php?idPost=$postId";
    //fopen("./components/post_link.php?idPost=$postId","r");
    ?>
    <li class="post">
      <a href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="post--image-represent">
        <img src="./vendors/thumbnails/<?php if ($eachPost['post_image']) {
                                          echo $eachPost['post_image'];
                                        } else {
                                          echo "bg_gray_default.jpg";
                                        } ?>" alt="" />
      </a>
      <div class="details-breif">
        <div class="post--info items-center">
          <div class="post--info-general">
            <a href="./chuyen-muc.php?category=<?php echo $eachPost['category_convert']; ?>&id=<?php echo $eachPost['category_id']; ?>" class="topicName"><?php echo $eachPost['category_name']; ?></a>
            <span class="readingTime">5 phút đọc</span>
          </div>
          <a href="#" class="savePost spr__icon" title="Click để lưu bài viết">
            <i class="fa-regular fa-bookmark"></i>
          </a>
        </div>
        <div class="navbar-title">
          <a href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="navbar--post">
            <h2 class="post--title">
              <?php echo $eachPost['post_title']; ?>
            </h2>
          </a>
          <p class="post__content-des">
            <?php echo $eachPost['post_description']; ?>
          </p>
        </div>
        <div class="post--details items-center">
          <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="detail-avatar">
            <img src="./vendors/avatar/<?php echo $eachPost['avatar']; ?>" alt="" />
          </a>
          <div class="items-center card-details">
            <div class="card-author items-center">
              <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="author-name"><?php echo $eachPost['face_name']; ?></a>
              <span class="createdAt"><?php echo $eachPost['post_created_at']; ?></span>
            </div>
            <div class="items-center interactions">
              <button class="items-center action-likePost">
                <span class="spr__icon">
                  <i class="fa-regular fa-heart"></i>
                </span>
                <span class="amount amount-like"><?php echo $eachPost['upvote']; ?></span>
              </button>
              <a href="#" class="items-center action-commentPost">
                <span class="spr__icon">
                  <i class="fa-regular fa-comment-dots"></i>
                </span>
                <span class="amount amount-comment"><?php if(isset($eachPost['comment_count'])){echo $eachPost['comment_count'];}else{echo "0";} ?></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </li>

  <?php endforeach; ?>
</ul>