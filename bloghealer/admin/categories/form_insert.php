<?php require '../check_super_admin_login.php';
require '../connect.php';
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
      <?php include '../components/header_index.php' ?>
      <!-- MAIN -->
      <div id="backToTop"></div>
      <div class="grid box--cushion-navbar"></div>
      <main class="container">
        <div class="grid wide sidePadding-16" style="display:flex; margin-top:50px;">
          <?php
          include '../menu.php';
          ?>
          <form method="post" action="process_insert.php" class="sidePadding-16" id="form-signup" enctype="multipart/form-data">
            <a href="../root/index.php" class="spr__logo">
              <img src="../../assets/icons/spiderum-logo.png" alt="spiderum-logo">
            </a>
            <label for="category-name" class="info">
              <span class="title">Tên chuyên mục</span>
              <input id="category-name" type="text" name="cateName" placeholder="Tên chuyên mục" onkeyup="convertCate(this)">
              <input id="name-convert" type="hidden" name="nameConvert" value="">
            </label>
            <label for="img--category">
              <span class="title">Chọn ảnh chủ đề</span>
              <input type="file" name="image" id="img--category">
            </label>
            <input type="submit" value="Thêm" class="btn btn-primary">

          </form>



        </div>
      </main>
      <!-- FOOTER -->
      <?php include '../components/footer_index.php' ?>
      <!-- end FOOTER -->
    </div>
    <button class="btn__backToTop bg-blue-500 hover:bg-blu-600">
      <a href="#backToTop">
        <i class="fa-solid fa-angle-up"></i>
      </a>
    </button>
  </div>
  <!-- Import Js -->
  <script src="../../assets/fontawesome/js/all.js"></script>
  <script src="../../assets/js/lodash.js"></script>
  <script src="../../assets/js/index.js"></script>
</body>

</html>