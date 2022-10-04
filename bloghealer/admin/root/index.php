<?php
require '../check_admin_login.php';
require '../connect.php';
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ quản trị</title>
  <meta name="description" content="Mạng Xã Hội Chia Sẻ Quan Điểm - Kiến Thức Hàng Đầu Việt Nam" />
  <!-- Import Css -->
  <link rel="stylesheet" href="../../assets/css/base.css" />
  <link rel="stylesheet" href="../../assets/css/grid.css" />
  <link rel="stylesheet" href="../../assets/fontawesome/css/all.css" />
  <link rel="stylesheet" href="../../assets/css/style.css" />
  <link rel="stylesheet" href="../../assets/css/dropdown.css" />
  <link rel="stylesheet" href="../../assets/css/components.css" />
  <link rel="stylesheet" href="../../assets/css/responsive.css" />
  <link rel="shortcut icon" href="../../assets/icons/spiderum.png" />

</head>

<body>
  <div class="app-root">
    <div class="homepage">
      <!-- HEADER -->
      <?php include '../components/header_index.php'; ?>
      <!-- MAIN -->
      <div id="backToTop"></div>
      <div class="grid box--cushion-navbar"></div>
      <main class="container">
        <div class="grid wide sidePadding-16">

          <?php
          include '../menu.php';
          ?>
        </div>
      </main>
      <!-- FOOTER -->
      <?php
      include '../components/footer_index.php';
      ?>
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
  <script src="../../assets/fontawesome/js/all.js"></script>
  <script src="../../assets/lodash/lodash.js"></script>
  <script src="../../assets/js/index.js"></script>
</body>

</html>