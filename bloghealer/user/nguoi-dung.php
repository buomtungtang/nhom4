<?php session_start();
$accId = $_SESSION['acc_id'];
$username = $_GET['username'];
require '../admin/connect.php';
$sql = "SELECT acc_fullname, acc_id FROM accounts WHERE username = '$username'";
$queryName = mysqli_query($connect, $sql);
if (mysqli_num_rows($queryName) == 1) {
  $account = mysqli_fetch_array($queryName);
}
$id = $account['acc_id'];
$sqlProfile  = "SELECT * FROM profiles WHERE acc_id = '$id'";
$queryProfile = mysqli_query($connect, $sqlProfile);
if (mysqli_num_rows($queryProfile) == 1) {
  $profile = mysqli_fetch_array($queryProfile);
}
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang cá nhân <?php if(isset($username)){echo "của ".$username;} ?></title>
  <meta name="description" content="Mạng Xã Hội Chia Sẻ Quan Điểm - Kiến Thức Hàng Đầu Việt Nam" />
  <!-- Import Css -->
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/grid.css">
  <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/categories.css">
  <link rel="stylesheet" href="../assets/css/dropdown.css">
  <link rel="stylesheet" href="../assets/css/user_profile.css">
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
      <?php //echo $id; print_r($profile);die($profile); 
      ?>
      <main class="container page__user-profiles">
        <div class="col grid wide sidePadding-16">
          <div class="relative bgwall">
            <div class="bgwall-content">
              <img src="../vendors/avatar/<?php if (!empty($profile['image_wall'])) {
                                            echo $profile['image_wall'];
                                          } else {
                                            echo "bg_gray_default.jpg";
                                          } ?>" alt="" loading="lazy">
            </div>
          </div>
          <div class="grid relative user__container">
            <div class="grid profiles">
              <div class="relative sidebar">
                <div class="sidebar-wrapper">
                  <div class="widget user">
                    <div class="basic">
                      <div class="user-avatar">
                        <a href="" class="avatar">
                          <img src="../vendors/avatar/<?php if (!empty($profile['avatar'])) {
                                                        echo $profile['avatar'];
                                                      } else {
                                                        echo "bg_gray_default.jpg";
                                                      } ?>" alt="">
                        </a>
                      </div>
                      <h1 class="display-name"><?php if(isset($account['acc_fullname'])){echo $account['acc_fullname'];}?></h1>
                      <span class="username"><?php echo "@" . $username ?></span>
                      <a href="../user/cai-dat.php?username=<?php echo $username; ?>" class="btn btn-setting--user">chỉnh sửa</a>
                    </div>
                    <div class="stats">
                      <div class="item follower">
                        <div class="label">follower</div>
                        <div class="value">0</div>
                      </div>
                      <div class="item following">
                        <div class="label">following</div>
                        <div class="value">0</div>
                      </div>
                      <div class="item spider">
                        <div class="label">spider</div>
                        <div class="value">0</div>
                      </div>
                    </div>
                  </div>
                  <div class="widget donate">
                    <p>
                      Bạn yêu thích cộng đồng
                      <span class="spr__name">Spiderum</span>
                      và muốn nó trở nên lớn mạnh hơn?
                    </p>
                    <a href="#" class="btn btn-primary btn__donate">
                      <i class="fa-solid fa-hand-holding-medical"></i>
                      <span>ủng hộ</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="column grid user__main">
                <div class="widget tabs">
                  <div class="column grid tabs-content">
                    <ul class="tab-list">
                      <li class="tab"><a href="#"><span class="txt">bài viết</span></a></li>
                      <li class="tab"><a href="#"><span class="txt">bài viết đã lưu</span></a></li>
                      <li class="tab"><a href="#"><span class="txt">nháp</span></a></li>
                    </ul>
                    <button class="btn-more spr__icon">
                      <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                  </div>
                </div>
                <div class="widget body">
                  <table class="table-list">
                    <?php
                    $page = 1;
                    $numberPost = "SELECT COUNT(*) FROM posts WHERE acc_id ='$accId'";
                    if ($numberPost) {
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
                          WHERE posts.acc_id = '$accId'
                          ORDER BY posts.post_created_at
                          LIMIT $numPostPerPage OFFSET $skipPost
                          ";
                      $qrPost = mysqli_query($connect, $getPost);
                    ?>
                      <ul class="feed__gallery">
                        <?php foreach ($qrPost as $eachPost) : ?>
                          <tr>
                            <td>
                              <li class="post">
                                <a href="../post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="post--image-represent">
                                  <img src="../vendors/thumbnails/<?php echo $eachPost['post_image']; ?>" alt="" />
                                </a>
                                <div class="details-breif">
                                  <div class="post--info items-center">
                                    <div class="post--info-general">
                                      <a href="../chuyen-muc.php?category=<?php echo $eachPost['category_convert']; ?>&id=<?php echo $eachPost['category_id']; ?>" class="topicName"><?php echo $eachPost['category_name']; ?></a>
                                      <span class="readingTime">5 phút đọc</span>
                                    </div>
                                    <a href="#" class="savePost spr__icon" title="Click để lưu bài viết">
                                      <i class="fa-regular fa-bookmark"></i>
                                    </a>
                                  </div>
                                  <div class="navbar-title">
                                    <a href="../post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="navbar--post">
                                      <h2 class="post--title">
                                        <?php echo $eachPost['post_title']; ?>
                                      </h2>
                                    </a>
                                    <p class="post__content-des">
                                      <?php echo $eachPost['post_description']; ?>
                                    </p>
                                  </div>
                                  <div class="post--details items-center">
                                    <a href="../user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="detail-avatar">
                                      <img src="../vendors/avatar/<?php echo $eachPost['avatar']; ?>" alt="" />
                                    </a>
                                    <div class="items-center card-details">
                                      <div class="card-author items-center">
                                        <a href="../user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="author-name"><?php echo $eachPost['face_name']; ?></a>
                                        <span class="createdAt"><?php echo $eachPost['post_created_at']; ?></span>
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
                                          <span class="amount amount-comment"><?php if(isset($eachPost['comment_count'])){echo $eachPost['comment_count'];}else{echo "0";} ?></span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </td>
                            <td><a href="../post/post_update.php?idPost=<?php echo $eachPost['post_id']; ?>">Sửa</a></td>
                            <td><a href="./process_del.php?id=<?php echo $eachPost['post_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá bài viết này?');">Xoá</a></td>
                          </tr>
                      <?php endforeach;
                      } else {
                        echo "Trống..";
                      } ?>
                      </ul>
                  </table>
                  <?php include '../components/pagination.php' ?>
                </div>
              </div>
            </div>
          </div>
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
  </div>
  <?php mysqli_close($connect); ?>
  <!-- Import Js -->
  <script src="../assets/fontawesome/js/all.js"></script>
  <script src="../assets/js/index.js"></script>
</body>

</html>