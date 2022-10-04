<?php require '../check_admin_login.php';
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
          <?php include '../menu.php' ?>
          <h2 style="display:flex; width:100%; justify-content: center; margin-bottom:.75rem;">Thống kê bài viết</h2>
          <?php
          ?>
          <table border="1" width="100%" cellspacing="0" class="table-list">
            <tr>
              <?php $ordinal = 0; ?>
              <th>Stt</th>
              <th>Chuyên mục thống kê</th>
              <th>Tiêu đề</th>
              <th>Tác giả</th>
              <th>Series</th>
              <th>Trạng thái</th>
              <th>Lượt xem</th>
              <th>Lượt ủng hộ (upvote)</th>
              <th>Lượt phản đối (downvote)</th>
            </tr>
            <tr>
              <td><?php echo ++$ordinal; ?></td>
              <td><?php echo "Bài viết xem nhiều nhất"; ?></td>
              <?php
              $sql = "SELECT profiles.face_name, posts.*
      FROM posts 
      INNER JOIN profiles
      ON posts.acc_id = profiles.acc_id
      ORDER BY view DESC LIMIT 1";
              $result = mysqli_query($connect, $sql);
              foreach ($result as $each) : ?>
                <td>
                  <a href="../../post/post.php?post=<?php echo $each['post_name'] ?>&idPost=<?php echo $each['post_id']; ?>">
                    <?php echo $each['post_title']; ?>
                  </a>
                </td>
                <td>
                  <?php echo $each['face_name']; ?>
                </td>
                <td>
                  <?php echo $each['series']; ?>
                </td>
                <td>
                  <?php echo $each['post_status']; ?>
                </td>
                <td>
                  <?php echo $each['view']; ?>
                </td>
                <td>
                  <?php echo $each['upvote']; ?>
                </td>
                <td>
                  <?php echo $each['downvote']; ?>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?php echo ++$ordinal; ?></td>
              <td><?php echo "Bài viết nhiều like nhất"; ?></td>
              <?php
              $sql = "SELECT profiles.face_name, posts.*
      FROM posts 
      INNER JOIN profiles
      ON posts.acc_id = profiles.acc_id
      ORDER BY upvote DESC LIMIT 1";
              $result = mysqli_query($connect, $sql);
              foreach ($result as $each) : ?>
                <td>
                  <a href="../../post/post.php?post=<?php echo $each['post_name'] ?>&idPost=<?php echo $each['post_id']; ?>">
                    <?php echo $each['post_title']; ?>
                  </a>
                </td>
                <td>
                  <?php echo $each['face_name']; ?>
                </td>
                <td>
                  <?php echo $each['series']; ?>
                </td>
                <td>
                  <?php echo $each['post_status']; ?>
                </td>
                <td>
                  <?php echo $each['view']; ?>
                </td>
                <td>
                  <?php echo $each['upvote']; ?>
                </td>
                <td>
                  <?php echo $each['downvote']; ?>
                </td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?php echo ++$ordinal; ?></td>
              <td><?php echo "Bài viết bất đồng nhiều nhất"; ?></td>
              <?php
              $sql = "SELECT profiles.face_name, posts.*
      FROM posts 
      INNER JOIN profiles
      ON posts.acc_id = profiles.acc_id
      ORDER BY downvote DESC LIMIT 1";
              $result = mysqli_query($connect, $sql);
              foreach ($result as $each) : ?>
                <td>
                  <a href="../../post/post.php?post=<?php echo $each['post_name'] ?>&idPost=<?php echo $each['post_id']; ?>">
                    <?php echo $each['post_title']; ?>
                  </a>
                </td>
                <td>
                  <?php echo $each['face_name']; ?>
                </td>
                <td>
                  <?php echo $each['series']; ?>
                </td>
                <td>
                  <?php echo $each['post_status']; ?>
                </td>
                <td>
                  <?php echo $each['view']; ?>
                </td>
                <td>
                  <?php echo $each['upvote']; ?>
                </td>
                <td>
                  <?php echo $each['downvote']; ?>
                </td>
              <?php endforeach; ?>
            </tr>


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