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
    ORDER BY RAND()
    LIMIT 5 
        ";
$qrPost = mysqli_query($connect, $getPost);
?>

<div class="widget interested">
  <h3 class="title">có thể bạn quan tâm</h3>
  <ul class="interested-list">
    <?php foreach ($qrPost as $eachPost) : ?>
      <li class="interested-card">
        <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="detail-avatar">
          <img src="./vendors/avatar/<?php echo $eachPost['avatar']; ?>" alt="">
        </a>
        <div class="content-short">
          <a href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>">
            <h1 class="title">
              <?php echo $eachPost['post_title']; ?>
            </h1>
          </a>
          <div class="author">
            <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="author--name"><?php echo $eachPost['face_name']; ?></a>
            <span class="createdAt"><?php echo $eachPost['post_created_at']; ?></span>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>