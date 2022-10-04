<?php require '../check_super_admin_login.php';
require '../connect.php';
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quản lý chuyên mục</title>
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
        <div class="grid wide sidePadding-16">

          <a href="form_insert.php" id="add--cate">
            <h3>Thêm chuyên mục</h3>
          </a>
          <?php
          $sql = "SELECT * FROM categories";
          $result = mysqli_query($connect, $sql);
          ?>
          <table border="1" width="100%" cellspacing="0" class="table-list">
            <tr>
              <?php $ordinal = 0; ?>
              <th>Stt</th>
              <th>ID</th>
              <th>Tên chuyên mục</th>
              <th>Convert name</th>
              <th>Ảnh</th>
              <th>Thao tác</th>
              <th>Thao tác</th>
            </tr>
            <?php foreach ($result as $each) : ?>
              <tr>
                <td><?php echo ++$ordinal; ?></td>
                <td><?php echo $each['category_id'] ?></td>
                <td><?php echo $each['category_name'] ?></td>
                <td><?php echo $each['category_convert'] ?></td>
                <td>
                  <img style="height: 100px; object-fit:cover;" src="../../assets/images/categories/<?php echo $each['category_image'] ?>" alt="">
                </td>
                <td><a href="form_update.php?id=<?php echo $each['category_id'] ?>" class="action">Sửa</a></td>
                <td><a href="process_delete.php?id=<?php echo $each['category_id'] ?>" class="action">Xoá</a></td>
              </tr>
            <?php endforeach; ?>
          </table>
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