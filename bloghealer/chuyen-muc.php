<?php session_start();
$cateName = $_GET['category'];
$cateId = $_GET['id'];
require './admin/connect.php';
$sql = "SELECT * FROM categories WHERE category_id  = '$cateId'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 1) {
  $each = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $each['category_name']; ?></title>
  <meta name="description" content="Mạng Xã Hội Chia Sẻ Quan Điểm - Kiến Thức Hàng Đầu Việt Nam" />
  <!-- Import Css -->
  <link rel="stylesheet" href="./assets/css/base.css">
  <link rel="stylesheet" href="./assets/css/grid.css">
  <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="./assets/css/flickity.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/categories.css">
  <link rel="stylesheet" href="./assets/css/dropdown.css">
  <link rel="stylesheet" href="./assets/css/components.css">
  <link rel="stylesheet" href="./assets/css/responsive.css">
  <link rel="shortcut icon" href="./assets/icons/spiderum.png">
</head>

<body>
  <div class="app-root">
    <div class="homepage">
      <!-- HEADER -->
      <?php include './components/header_index.php'; ?>
      <!-- MAIN -->
      <div id="backToTop"></div>
      <div class="grid box--cushion-navbar"></div>
      <main class="container page__category">
        <div class="wrapper__head grid page__category-head">
          <?php include './components/category_head.php'; ?>
        </div>
        <div class="grid wide sidePadding-16">
          <div class="banner-top">
            <a href="#" class="banner">
              <img src="./vendors/images/banner_buoc_ra_the_gioi.jpeg" alt="Buoc-ra-the-gioi">
            </a>
          </div>
        </div>
        <div class=" grid wide sidePadding-16 main__content">
          <?php include './components/list_topic.php'; ?>
          <div class="columns">
            <div class="main__section">
              <?php $getPost = "SELECT posts.*,categories.category_name,accounts.username,categories.category_convert, profiles.face_name,profiles.avatar
                FROM posts
    INNER JOIN accounts
    ON posts.acc_id = accounts.acc_id
    INNER JOIN profiles
    ON accounts.acc_id = profiles.acc_id
    INNER JOIN categories
    ON posts.category_id = categories.category_id
    WHERE posts.category_id = '$cateId'  AND RAND() AND posts.post_status = 'publish'
    LIMIT 1
                ";
              $qrPost = mysqli_query($connect, $getPost);
              foreach ($qrPost as $eachPost) :
              ?>
                <div class="post">
                  <a href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="post--image-represent">
                    <img src="./vendors/thumbnails/<?php if ($eachPost['post_image']) {
                                                      echo $eachPost['post_image'];
                                                    } else {
                                                      echo "bg_gray_default.jpg";
                                                    } ?>" alt="">
                  </a>
                  <div class="details-breif">
                    <div class="post--info items-center">
                      <div class="post--info-general">
                        <a href="./chuyen-muc.php?category=<?php echo $eachPost['category_convert']; ?>&id=<?php echo $eachPost['category_id']; ?>" class="topicName">
                          <?php echo $eachPost['category_name']; ?>
                        </a>
                        <span class="readingTime">7 phút đọc</span>
                      </div>
                      <a href="#" class="savePost spr__icon" title="Click để lưu bài viết">
                        <i class="fa-regular fa-bookmark"></i>
                      </a>
                    </div>
                    <div class="navbar-title">
                      <a class="navbar--post" href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>">
                        <h2 class="post--title"><?php echo $eachPost['post_title']; ?></h2>
                      </a>
                      <p class="post__content-des">
                        <?php echo $eachPost['post_description']; ?>
                      </p>
                    </div>
                    <div class="post--details items-center">
                      <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="detail-avatar">
                        <img src="./vendors/avatar/<?php echo $eachPost['avatar']; ?>" alt="">
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
                            <span class="amount amount-like">12</span>
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
                </div>
              <?php endforeach ?>
              <!--  -->
              <div class="main-carousel">
                <?php $arrPost = "SELECT posts.*,categories.category_name,accounts.username,categories.category_convert, profiles.face_name,profiles.avatar
                FROM posts
    INNER JOIN accounts
    ON posts.acc_id = accounts.acc_id
    INNER JOIN profiles
    ON accounts.acc_id = profiles.acc_id
    INNER JOIN categories
    ON posts.category_id = categories.category_id
    WHERE posts.category_id = '$cateId'  AND RAND() AND posts.post_status = 'publish'
    LIMIT 4
                ";
                $qrPost = mysqli_query($connect, $arrPost);
                foreach ($qrPost as $eachPost) :
                ?>
                  <div class="carousel-cell">
                    <div class="post">
                      <a href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="post--image-represent">
                        <img src="./vendors/thumbnails/<?php if ($eachPost['post_image']) {
                                                          echo $eachPost['post_image'];
                                                        } else {
                                                          echo "bg_gray_default.jpg";
                                                        } ?>" alt="">
                      </a>
                      <div class="details-breif">
                        <div class="post--info items-center">
                          <div class="post--info-general">
                            <a href="./chuyen-muc.php?category=<?php echo $eachPost['category_convert']; ?>&id=<?php echo $eachPost['category_id']; ?>" class="topicName">
                              <?php echo $eachPost['category_name']; ?>
                            </a>
                          </div>
                        </div>
                        <div class="navbar-title">
                          <a class="navbar--post" href="./post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>">
                            <h2 class="post--title"><?php echo $eachPost['post_title']; ?></h2>
                          </a>
                        </div>
                        <div class="post--details items-center">
                          <div class="items-center card-details">
                            <div class="card-author items-center">
                              <a href="./user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="author-name"><?php echo $eachPost['face_name']; ?></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <!--  -->
              <div class="section__feed">
                <div class="feed__content">
                  <!-- filter bar -->
                  <div class="filter-bar items-center">
                    <div class="filter-item"><span class="title-item">dành cho bạn</span></div>
                    <ul class="filter-item filter-option">
                      <li>
                        <a href="#" class="filter-option--item items-center active">
                          <div class="spr__icon">
                            <i class="fa-brands fa-hotjar"></i>
                          </div>
                          <span class="option-title">thịnh hành</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="filter-option--item items-center">
                          <div class="spr__icon">
                            <i class="fa-solid fa-star-half-stroke"></i>
                          </div>
                          <span class="option-title">mới</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="filter-option--item items-center">
                          <div class="spr__icon">
                            <i class="fa-solid fa-fan"></i>
                          </div>
                          <span class="option-title">sôi nổi</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="filter-option--item items-center">
                          <div class="spr__icon">
                            <i class="fa-solid fa-flag"></i>
                          </div>
                          <span class="option-title">top</span>
                        </a>
                      </li>
                    </ul>

                  </div>
                  <!-- end filter bar -->
                  <div class="info-page--index">
                    <small>
                      <em>Trang: 1 / ..</em>
                    </small>
                  </div>
                  <!-- start gallery posst -->
                  <?php include './components/feed_gallery_category.php'; ?>
                  <!-- end gallery post -->
                </div>
              </div>
              <!-- pagination -->
              <?php include './components/pagination.php'; ?>
              <!-- end pagination -->
            </div>
            <!-- sidebar 240722 -->
            <div class="sidebar hideOnMPc hideOnTablet hideOnMobile">
              <div class="sidebar-wrapper">
                <!-- policy -->
                <?php include './components/widget_policy.php'; ?>
                <!-- end fpolicy-->
                <!-- start donate -->
                <div class="sidebar-container">
                  <?php include './components/widget_donate.php'; ?>
                </div>
                <!-- end donate -->
                <!-- start interested -->
                <div class="sidebar-container">
                  <?php include './components/widget_interested.php'; ?>
                </div>
                <div class="sidebar-container sidebar-footer">
                  <ul class="links">
                    <li><a href="./aboutus.php">Về Spiderum</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                    <li><a href="#">Fanpage</a></li>
                  </ul>
                  <span>© 2021 Công ty Cổ phần Felizz.</span>
                </div>
                <!-- end interested -->
              </div>
            </div>
            <!-- end sidebar -->
          </div>
        </div>
      </main>
      <!-- FOOTER -->
      <?php include './components/footer_index.php'; ?>
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
  <script src="./assets/js/flickity.pkgd.min.js"></script>
  <script src="./assets/fontawesome/js/all.js"></script>
  <script src="./assets/js/lodash.js"></script>
  <script src="./assets/js/index.js"></script>
</body>

</html>