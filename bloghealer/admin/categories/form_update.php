<?php require '../check_super_admin_login.php';
require '../connect.php';
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Cập nhật chuyên mục</title>
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
          if (empty($_GET['id'])) {
            header('location:index.php?error=Phải truyền id!');
          }
          $id = $_GET['id'];
          include '../menu.php';

          $sql = "SELECT * FROM categories WHERE category_id = '$id'";
          $result = mysqli_query($connect, $sql);
          $each = mysqli_fetch_array($result);
          ?>
          <form method="post" action="process_update.php" class="sidePadding-16" id="form-signup" enctype="multipart/form-data">
            <a href="index.php" class="spr__logo">
              <img src="../../assets/icons/spiderum-logo.png" alt="spiderum-logo">
            </a>
            <input type="hidden" name="categoryId" value="<?php echo $each['category_id'] ?>">
            <label for="category-name" class="info">
              <span class="title">Tên chuyên mục</span>
              <input id="category-name" type="text" name="cateName" value="<?php echo $each['category_name'] ?>" placeholder="Tên chuyên mục">
            </label>
            <input type="file" name="cateImage">
            <input type="submit" value="Sửa" class="btn btn-primary">
          </form>

        </div>
      </main>
      <!-- FOOTER -->
      <footer class="footer">
        <div class="grid wide footer__container">
          <!-- footer top -->
          <div class="footer--top">
            <div class="footer--top-logo">
              <img src="/assets/icons/wideLogo.png" alt="" />
            </div>
            <ul class="footer--top-menu">
              <li class="footer--top-menu-item">
                <a href="#">điều kiện sử dụng</a>
              </li>
            </ul>
          </div>
          <!-- end footer top -->
          <!-- start footer bottom -->
          <div class="footer--bottom">
            <div class="footer--bottom-notes">
              <p><strong>Công ty cổ phần Felizz</strong></p>
              <p>
                Trực thuộc Công ty Cổ Phần Spiderum Việt Nam (Spiderum Vietnam
                JSC)
              </p>
              <p>Người chịu trách nhiệm nội dung: Trần Việt Anh</p>
              <p>
                Giấy phép MXH số 341/GP-TTTT do Bộ TTTT cấp ngày 27 tháng 6
                năm 2016
              </p>
              <br />
              <a href="#" class="dmca-badge">
                <img src="./assets/icons/dmca_protected_16_120.png" alt="dmca-badge" />
              </a>
            </div>
            <div class="footer--bottom-copyright">
              <p><strong>© Copyright 2017-2022</strong></p>
              <p>0946.042.093</p>
              <p>contact@spiderum.com</p>
              <p>
                Tầng 11, tòa nhà HL Tower, lô A2B, phố Duy Tân, phường Dịch
                Vọng Hậu, Cầu Giấy, Hà Nội
              </p>
            </div>
          </div>
          <!-- end footer bottom -->
        </div>
      </footer>
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