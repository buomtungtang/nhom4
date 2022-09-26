<?php session_start();
require './admin/connect.php';
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ - Spiderum</title>
  <meta name="description" content="Mạng Xã Hội Chia Sẻ Quan Điểm - Kiến Thức Hàng Đầu Việt Nam" />
  <!-- Import Css -->
  <link rel="stylesheet" href="./assets/css/base.css" />
  <link rel="stylesheet" href="./assets/css/grid.css" />
  <link rel="stylesheet" href="./assets/fontawesome/css/all.css" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/dropdown.css" />
  <link rel="stylesheet" href="./assets/css/components.css" />
  <link rel="stylesheet" href="./assets/css/responsive.css" />
  <link rel="shortcut icon" href="./assets/icons/spiderum.png" />
</head>

<body>
  <div class="app-root">
    <div class="homepage">
      <!-- HEADER -->
      <?php include './components/header_index.php'; ?>
      <!-- end FOOTER -->
      <!-- MAIN -->
      <div id="backToTop"></div>
      <div class="grid box--cushion-navbar"></div>

      <?php
      $page = 1;
      if (isset($_GET['trang'])) {
        $page = $_GET['trang'];
      }

      if (isset($_GET['search'])) {
        $search = $_GET['search'];
      }

      $numberPost = "SELECT COUNT(*) FROM posts
WHERE post_title LIKE '%$search%' OR post_content LIKE '%$search%'
";
      $qrNumPost = mysqli_query($connect, $numberPost);
      $numPost = mysqli_fetch_array($qrNumPost);
      $posts = $numPost['COUNT(*)'];
      $numPostPerPage = 10;
      $numPage = ceil($posts / $numPostPerPage);
      $skipPost = $numPostPerPage * ($page - 1);

      $qrSearch = "SELECT 
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
    WHERE posts.post_title LIKE '%$search%' OR posts.post_content LIKE '%$search%'
    ORDER BY posts.post_created_at
    LIMIT $numPostPerPage OFFSET $skipPost
  ";
      $getSearch = mysqli_query($connect, $qrSearch);
      // print_r($getSearch);
      // die();
      if (!mysqli_num_rows($getSearch)) {
        echo "Không có kết quả phù hợp...";
      }
      ?>

      <main class="container">
        <div class="grid wide sidePadding-16">
          <div class="banner-top">
            <a href="#" class="banner">
              <img src="./vendors/images/banner_buoc_ra_the_gioi.jpeg" alt="Buoc-ra-the-gioi" />
            </a>
          </div>
        </div>
        <!-- <div class="wrapper__head grid">
        <?php //include './components/post_trending.php' 
        ?>  
        </div> -->
        <div class="col grid wide sidePadding-16 main__content">
          <div>
            <table>
              <?php
              foreach ($getSearch as $resultSearch) :
              ?>
                <tr>
                  <td>
                    <li class="post">
                      <a href="./post/post.php?post=<?php echo $resultSearch['post_name']; ?>&idPost=<?php echo $resultSearch['post_id']; ?>" class="post--image-represent">
                        <img src="./vendors/thumbnails/<?php echo $resultSearch['post_image']; ?>" alt="" />
                      </a>
                      <div class="details-breif">
                        <div class="post--info items-center">
                          <div class="post--info-general">
                            <a href="./chuyen-muc.php?category=<?php echo $resultSearch['category_convert']; ?>&id=<?php echo $resultSearch['category_id']; ?>" class="topicName"><?php echo $resultSearch['category_name']; ?></a>
                            <span class="readingTime">5 phút đọc</span>
                          </div>
                          <a href="#" class="savePost spr__icon" title="Click để lưu bài viết">
                            <i class="fa-regular fa-bookmark"></i>
                          </a>
                        </div>
                        <div class="navbar-title">
                          <a href="./post/post.php?post=<?php echo $resultSearch['post_name']; ?>&idPost=<?php echo $resultSearch['post_id']; ?>" class="navbar--post">
                            <h2 class="post--title">
                              <?php echo $resultSearch['post_title']; ?>
                            </h2>
                          </a>
                          <p class="post__content-des">
                            <?php echo $resultSearch['post_description']; ?>
                          </p>
                        </div>
                        <div class="post--details items-center">
                          <a href="./user/nguoi-dung.php?username=<?php echo $resultSearch['username']; ?>" class="detail-avatar">
                            <img src="./vendors/avatar/<?php echo $resultSearch['avatar']; ?>" alt="" />
                          </a>
                          <div class="items-center card-details">
                            <div class="card-author items-center">
                              <a href="./user/nguoi-dung.php?username=<?php echo $resultSearch['username']; ?>" class="author-name"><?php echo $resultSearch['face_name']; ?></a>
                              <span class="createdAt"><?php echo $resultSearch['post_created_at']; ?></span>
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
                                <span class="amount amount-comment"><?php if(isset($resultSearch['comment_count'])){echo $resultSearch['comment_count'];}else{echo "0";} ?></span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
          <div class="pagination">
            <ul class="list-unstyled">
              <?php for ($i = 1; $i <= $numPage; $i++) { ?>
                <li>
                  <a href="?trang=<?php echo $i ?>&search=<?php echo $search; ?>" class="pagi-page active">
                    <?php echo $i ?>
                  </a>
                </li>
                <!-- <a href="#" class="pagi-page"
                      >Tiếp<i class="fa-solid fa-angles-right"></i
                    ></a> -->
              <?php } ?>
            </ul>
          </div>
        </div>
      </main>
      <!-- end MAIN -->
      <!-- FOOTER -->
      <?php include './components/footer_index.php' ?>
      <!-- end FOOTER -->
    </div>
    <button class="btn__backToTop bg-blue-500 hover:bg-blu-600">
      <a href="#backToTop">
        <i class="fa-solid fa-angle-up"></i>
      </a>
    </button>
  </div>
  <!-- Import Js -->
  <script src="./assets/fontawesome/js/all.js"></script>
  <script src="./assets/js/lodash.js"></script>
  <script src="./assets/js/index.js"></script>
</body>

</html>