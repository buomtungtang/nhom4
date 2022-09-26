<?php
session_start();
$accId = $_SESSION['acc_id'];
require '../admin/connect.php';
$sql = "SELECT acc_fullname FROM accounts WHERE acc_id = '$accId'";
$getName = mysqli_query($connect, $sql);
if (mysqli_num_rows($getName) == 1) {
  $eachName = mysqli_fetch_array($getName);
}
$sqlProfile  = "SELECT * FROM profiles WHERE acc_id = '$accId'";
$queryProfile = mysqli_query($connect, $sqlProfile);
if (mysqli_num_rows($queryProfile) == 1) {
  $profile = mysqli_fetch_array($queryProfile);
}
mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viết bài mới...</title>
  <meta name="description" content="Mạng Xã Hội Chia Sẻ Quan Điểm - Kiến Thức Hàng Đầu Việt Nam" />
  <!-- Import Css -->
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/grid.css">
  <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/dropdown.css">
  <link rel="stylesheet" href="../assets/css/write_post.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">
  <link rel="shortcut icon" href="../assets/icons/spiderum.png">
</head>

<body>
  <?php
  require '../admin/connect.php';
  ?>
  <div class="app-root">
    <div class="homepage">
      <!-- HEADER -->
      <header class="bg-white">
        <div class="header grid wide">
          <div class="row no-gutters sidePadding-16 bg-white">
            <div class="grid col l-12">
              <div class="row no-gutters navbar__container  items-center">
                <a href="../index.php" class="col l-2 navbar__item navbar__brand">
                  <img src="../assets/icons/wideLogo.png" alt="Spiderum" class="hideOnMobile">
                  <img src="../assets/icons/spiderum.png" alt="Spiderum" class="hide showOnMobile">
                </a>
                <div class="col navbar__item items-center">
                  <ul class="header__acount items-center">
                    <li class="navbar--item navbar--notifications">
                      <button class="navbarToggle toggle spr__icon">
                        <i class="fa-regular fa-bell"></i>
                      </button>
                      <!-- <div class="navbar__dropdown active">
                          <div class="dropdown--inner">
                            <div class="dropdown--head">
                              <h3>Thông báo</h3>
                            </div>
                            <ul class="dropdown--content">
                              <div class="empty">
                                <p>Không có thông báo nào.</p>
                              </div>
                            </ul>
                          </div>
                        </div> -->
                    </li>
                    <li class="navbar--item navbar--user">
                      <button class="navbarToggle toggle items-center cursor-pointer btnDrop" onclick="navbarDropdown()" style="
                            background-image: url('../vendors/avatar/<?php echo $profile['avatar']; ?>');
                          "></button>
                      <!-- dropdown -->
                      <div class="dropdown navbar__dropdown active cursor-pointer">
                        <div class="dropdown--inner">
                          <div class="dropdown--content">
                            <div class="item navbar__user--detail">
                              <div class="avatar">
                                <img src="../vendors/avatar/<?php echo $profile['avatar']; ?>" alt="avatar" />
                              </div>
                              <div class="navbar__user--info">
                                <h6 class="displayname"><?php echo $eachName['acc_fullname']; ?></h6>
                                <span class="username"><?php echo "@" . $_SESSION['username']; ?></span>
                                <a href="../user/nguoi-dung.php?username=<?php echo $_SESSION['username']; ?>" class="btn">xem trang cá nhân</a>
                              </div>
                            </div>
                            <div class="separator"></div>
                            <a href="./post/write-post.php" class="item item-mobile">
                              <span class="spr__icon"><i class="fa-solid fa-feather-pointed"></i></span>
                              <span class="text">Viết bài</span>
                            </a>
                            <a href="#" class="item item-mobile">
                              <span class="spr__icon"><i class="fa-regular fa-envelope"></i></span>
                              <span class="text">Tin nhắn</span>
                            </a>
                            <a href="#" class="item">
                              <span class="spr__icon"><i class="fa-solid fa-pen-to-square"></i></span>
                              <span class="text">bài viết của tôi</span>
                            </a>
                            <a href="#" class="item">
                              <span class="spr__icon"><i class="fa-solid fa-note-sticky"></i></span>
                              <span class="text">nháp của tôi</span>
                            </a>
                            <a href="#" class="item">
                              <span class="spr__icon"><i class="fa-regular fa-bookmark"></i></span>
                              <span class="text">đã lưu</span>
                            </a>
                            <a href="#" class="item">
                              <span class="spr__icon"><i class="fa-solid fa-gear"></i></span>
                              <span class="text">tuỳ chỉnh tài khoản</span>
                            </a>
                            <div class="separator"></div>
                            <a href="../signout.php" class="item">
                              <span class="spr__icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                              <span class="text">đăng xuất</span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- end dropdown -->
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- MAIN -->
      <div id="backToTop"></div>
      <div class="grid box--cushion-navbar"></div>
      <main class="container page__write-post">
        <form action="process_write-post.php" method="post" enctype="multipart/form-data">
          <div class="grid write-post--container">
            <input type="hidden" class="input" value="<?php echo $_SESSION['acc_id']; ?>" name="accId">
            <div class="title cursor-text" id="write__post--title" contenteditable="true" placeholder="Tiêu đề bài viết......." onkeyup="getTitle(this)">
              <input id="name-title" type="text" class="input txt" value="" name="post_title" style="display:none;">
              <input id="name-convert" type="text" name="nameConvert" value="" style="display:none;" class="txt">
            </div>

            <div class="write-post--content">
              <div class="content cursor-text" contenteditable="true" placeholder="Nội dung bài viết" id="write__post--content" onkeyup="getContent(this)">
                <input type="text" id="post_content" class="input txt" value="" name="post_content" style="display: none">
              </div>
            </div>
            <input type="file" name="postImage">
          </div>
          <div class="overlay-front">
            <div class="overlay-front--box">
              <div>
                <div class="post-option">
                  <p class="overlay-front--title">
                    Mô tả bài viết
                    <em class="text-gray">(không bắt buộc)</em>
                  </p>
                  <textarea class="input" name="desOfPost" id="#" cols="30" rows="2"></textarea>
                </div>
                <div class="post-option">
                  <p class="overlay-front--title">
                    Thêm thẻ tag
                    <em class="text-gray">(tối đa 5 thẻ)</em>
                  </p>
                  <textarea class="input" name="tag" id="#" cols="30" rows="2"></textarea>
                </div>
                <div class="post-option">
                  <p class="overlay-front--title">
                    Series
                  </p>
                  <div class="relative">
                    <select class="input input-se" name="postSeries" id="#">
                      <option value="null">-- Chọn Series --</option>
                    </select>
                    <!-- <div class="pointer-down">
                      <i class="fa-solid fa-angle-down"></i>
                    </div> -->
                  </div>
                </div>
                <div class="post-option">
                  <p class="overlay-front--title">
                    Chọn danh mục
                  </p>
                  <?php
                  $sql = "SELECT * FROM categories";
                  $result = mysqli_query($connect, $sql);
                  ?>
                  <div class="relative">
                    <select class="input  input-se" name="category_id" id="">
                      <option value="null">-- Chọn danh mục --</option>
                      <?php foreach ($result as $each) : ?>
                        <option value="<?php echo $each['category_id'] ?>">
                          <?php echo $each['category_name'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <!-- <div class="pointer-down">
                      <i class="fa-solid fa-angle-down"></i>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="items-center modal-footer ">
                <button class="btn btn-comeback" onclick="ToggleVisi()" type="button">quay lại</button>
                <button class="btn btn-primary" type="submit">tạo</button>
              </div>
            </div>
          </div>
          <div class="next-step items-center">
            <button class="btn btn-draft" type="button">đã lưu</button>
            <button class="btn btn-primary" onclick="ToggleVisi()" type="button">Bước tiếp theo</button>
            <a href="#" class="btn btn-workthrough" title="Hướng dẫn viết bài">
              <span class="items-center">?</span>
            </a>
          </div>
        </form>
      </main>
    </div>
    <button class="btn__backToTop bg-blue-500 hover:bg-blu-600">
      <a href="#backToTop">
        <i class="fa-solid fa-angle-up"></i>
      </a>
    </button>
  </div>
  <!-- Import Js -->
  <script src="../assets/fontawesome/js/all.js"></script>
  <script src="../assets/js/lodash.js"></script>
  <script src="../assets/js/index.js"></script>
</body>

</html>