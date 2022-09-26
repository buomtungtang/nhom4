<?php session_start();
require '../admin/connect.php';
$postName = $_GET['post'];
$postId = $_GET['idPost'];
$sessionView = 'view_' . $postName;
$viewPost = $_SESSION[$sessionView];
// setcookie($sessionView,$viewPost, time()+15);

if (!isset($_SESSION[$sessionView])) {
  $_SESSION[$sessionView] = 0;
} else {
  $_SESSION[$sessionView] += 1;
}
$sql = "UPDATE posts SET view = $_SESSION[$sessionView] WHERE post_id = '$postId'";
mysqli_query($connect, $sql);
// echo $sessionView;
// echo "views".$viewPost;
// if(isset($_SESSION[$sessionView])){echo "yes";}else{echo "no";}
$getPost = "SELECT 
		    posts.post_id,posts.post_title,posts.post_content,posts.post_image,accounts.username,categories.category_name,
        posts.series,posts.post_description,posts.post_created_at,posts.post_status,posts.post_name,
        posts.view,posts.upvote,posts.downvote,accounts.username,categories.category_name,profiles.avatar
        FROM posts
        INNER JOIN accounts
        ON posts.acc_id = accounts.acc_id
        INNER JOIN categories
        ON posts.category_id = categories.category_id
        INNER JOIN profiles
        ON accounts.acc_id = profiles.acc_id
        WHERE posts.post_id = '$postId' AND posts.post_name = '$postName';
        ";
$qrPost = mysqli_query($connect, $getPost);
if (mysqli_num_rows($qrPost) == 1) {
  $post = mysqli_fetch_array($qrPost);
}
//
// require '../admin/connect.php';
// $getPost = "SELECT * FROM posts WHERE post_id = '$postId' AND post_name = '$postName'";
// $qrPost = mysqli_query($connect,$getPost);
// if(mysqli_num_rows($qrPost)==1){
//   $post = mysqli_fetch_array($qrPost);
// }
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $post['post_title']; ?></title>
  <meta name="description" content="Mạng Xã Hội Chia Sẻ Quan Điểm - Kiến Thức Hàng Đầu Việt Nam" />
  <!-- Import Css -->
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/grid.css">
  <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="../assets/css/flickity.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/categories.css">
  <link rel="stylesheet" href="../assets/css/page_post.css" />
  <link rel="stylesheet" href="../assets/css/dropdown.css" />
  <link rel="stylesheet" href="../assets/css/components.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">
  <link rel="shortcut icon" href="../assets/icons/spiderum.png">
</head>

<body>
  <div class="app-root">
    <div class="homepage">
      <!-- HEADER -->
      <?php include '../components/header_category.php'; ?>
      <!-- MAIN -->
      <div id="backToTop"></div>
      <div class="grid box--cushion-navbar"></div>
      <?php
      ?>

      <main class="sidePadding-16 container page__post">
        <div class="grid wide  auth-container">
          <div class="banner-top">
            <a href="#" class="banner">
              <img src="../vendors/images/hackathon.jpeg" alt="hackathon">
            </a>
          </div>
          <div class="category">
            <a href="#"><?php echo $post['category_name']; ?></a>
          </div>
          <h1 class="title break-word">
            <?php echo $post['post_title']; ?>
          </h1>
          <div class="description">
            <p class="break-word">
              <?php echo $post['post_description']; ?>
            </p>
          </div>
          <div class="details">
            <div class="items-center">
              <a href="#" class="avatar">
                <img src="../vendors/avatar/<?php echo $post['avatar']; ?>" alt="">
              </a>
              <div class="author-info">
                <a href="#" class="username">
                  <strong><?php echo $post['username']; ?></strong>
                </a>
                <span class="createdAt">
                  <?php
                  //echo date("d/m/Y",strtotime($each['post_created_at'])); 
                  $time = strtotime($post['post_created_at']);
                  if ($time == strtotime(date("d/m/Y", time()))) {
                    echo "Hôm nay";
                  } else {
                    if (strtotime('-1 day', strtotime(date("d/m/Y", time()))) == $time) {
                      echo "Hôm qua";
                    } else {
                      if (date("Y", $time) == date("Y")) {
                        echo date("d", $time) . " th " . date("m", $time);
                      } else {
                        echo date("d/m/Y", $time);
                      }
                    }
                  }
                  ?>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="grid wide post-container">
          <div class="post--content">
            <img style="display:block; width:100%;object-fit: cover; margin-bottom:1.25rem;" src="../vendors/thumbnails/<?php if(!empty($post['post_image'])){ echo $post['post_image'];}else{ echo "bg_gray_default.jpg";} ?>" alt="">
            <p><?php echo nl2br($post['post_content']); ?></p>
          </div>

        </div>
        <div class="grid wide sidePadding-16 slidebar-bottom">
          <h4>Bài viết nổi bật khác</h4>
          <?php include '../components/slidebar.php'; ?>
        </div>
        <div class="grid wide sidePadding-16 slidebar-bottom">
          <?php include '../components/comment.php'; ?>
        </div>
      </main>
      <!-- FOOTER -->
      <?php include '../components/footer_category.php'; ?>
      <!-- end FOOTER -->
    </div>
    <button class="btn__backToTop bg-blue-500 hover:bg-blu-600">
      <a href="#backToTop">
        <i class="fa-solid fa-angle-up"></i>
      </a>
    </button>
    <?php mysqli_close($connect); ?>
  </div>
  <!-- Import Js -->
  <script src="../assets/js/flickity.pkgd.min.js"></script>
  <script src="../assets/fontawesome/js/all.js"></script>
  <script src="../assets/js/lodash.js"></script>
  <script src="../assets/js/index.js"></script>
</body>

</html>