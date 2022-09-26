<?php session_start(); ?>
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
  <!-- <script src="./assets/js/ajax.js"></script> -->
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
      <main class="container">
        <div class="grid wide sidePadding-16">
          <div class="banner-top">
            <a href="#" class="banner">
              <img src="./vendors/images/banner_buoc_ra_the_gioi.jpeg" alt="Buoc-ra-the-gioi" />
            </a>
          </div>
        </div>
        <div class="wrapper__head grid">
          <?php include './components/post_trending.php' ?>
        </div>
        <div class="col grid wide sidePadding-16 main__content">
          <?php include './components/list_topic.php' ?>
          <div class="columns">
            <div class="main__section">
              <div class="section__feed">
                <div class="feed__content">
                  <!-- filter bar -->
                  <?php include './components/filterbar.php' ?>
                  <!-- end filter bar -->
                  <!-- start gallery posst -->
                  <?php include './components/feed_gallery.php' ?>
                  <!-- end gallery post -->
                </div>
              </div>
              <!-- pagination -->
              <?php include './components/pagination.php' ?>
              <!-- end pagination -->
            </div>
            <!-- sidebar 240722 -->
            <div class="sidebar hideOnMPc hideOnTablet hideOnMobile">
              <div class="sidebar-wrapper">
                <!-- start featured writer -->
                <?php include './components/feature_writer.php' ?>
                <!-- end featured writer -->
                <!-- start good old post -->
                <?php include './components/good_old_post.php' ?>
                <!-- end good old post -->
                <!-- start handbook -->
                <?php include './components/handbook.php' ?>
                <!-- end handbook -->
                <!-- start form  register book  -->
                <?php include './components/register_proofread.php' ?>
                <!-- end form  register book  -->
              </div>
            </div>
            <!-- end sidebar -->
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
  <?php mysqli_close($connect); ?>
  <!-- Import Js -->
  <script src="./assets/fontawesome/js/all.js"></script>
  <script src="./assets/js/lodash.js"></script>
  <script src="./assets/js/jquery-3.6.0.min.js"></script>
  <script src="./assets/js/index.js"></script>
</body>

</html>