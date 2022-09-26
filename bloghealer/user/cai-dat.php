<?php
require  '../check_user_login.php';
$accId = $_SESSION['acc_id'];
require '../admin/connect.php';
// $sql = "SELECT accounts.acc_email, accounts.acc_id,
// profiles.face_name,profiles.avatar,profiles.image_wall,profiles.description,profiles.birthday,profiles.gender,profiles.id_card,profiles.phone,profiles.address
// FROM profiles
// INNER JOIN accounts
// ON profiles.acc_id = accounts.acc_id = '$accId';
// ";
$sqlAccount = "SELECT acc_email FROM accounts WHERE acc_id = '$accId'";
$queryAccount = mysqli_query($connect, $sqlAccount);
if (mysqli_num_rows($queryAccount) == 1) {
  $email = mysqli_fetch_array($queryAccount)[0];
}

$sqlProfile = "SELECT * FROM profiles WHERE acc_id = '$accId'";
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
  <title>Cài đặt người dùng</title>
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
      <?php
      // require '../admin/connect.php';

      ?>
      <main class="container page__setting">
        <div class="grid wide sidePadding-16 relative">
          <div class="change__mode-tab">
            <ul class="list-tab">
              <li><a href="#" class="tab">Tài khoản</a></li>
              <li><a href="#" class="tab">Tiểu sử</a></li>
              <li><a href="#" class="tab">Series</a></li>
            </ul>
          </div>
          <form action="process_setting.php" method="POST" id="form__change-profile" enctype="multipart/form-data">
            <div class=" wall-img">
              <img src="<?php if (!empty($profile['image_wall'])) {
                          echo "../vendors/avatar/" . $profile['image_wall'];
                        } else {
                          echo "../vendors/avatar/bg_gray_default.jpg";
                        } ?>" alt="" class="wall__image" id="wall__image">
              <label for="change__wall-img" class="change__wall-img">
                <span class="icon icon-camera">
                  <svg _ngcontent-serverApp-c75="" height="40" viewBox="0 0 1000 1000" width="40" x="0px" y="0px" class="ng-tns-c75-0 ng-star-inserted">
                    <g _ngcontent-serverApp-c75="" fill="#FFF" class="ng-tns-c75-0">
                      <path _ngcontent-serverApp-c75="" d="M336.7,91.7h326.7L745,214.2h122.5c33.8,0,62.7,12.2,86.6,36.5s35.9,53.4,35.9,87.2v448.5c0,33.8-12,62.6-35.9,86.3s-52.8,35.6-86.6,35.6h-735c-33.8,0-62.7-12-86.6-35.9S10,819.6,10,785.8V337.3c0-33.8,12-62.8,35.9-86.9s52.8-36.2,86.6-36.2H255L336.7,91.7z M500,336.7c27.6,0,54.1,5.4,79.3,16.3c25.2,10.8,46.9,25.4,65.1,43.5s32.7,39.9,43.5,65.1c10.8,25.2,16.3,51.6,16.3,79.3c0,27.6-5.4,54.1-16.3,79.3c-10.8,25.2-25.4,46.9-43.5,65.1s-39.9,32.7-65.1,43.5C554.1,739.6,527.6,745,500,745s-54.1-5.4-79.3-16.3c-25.2-10.8-46.9-25.4-65.1-43.5s-32.7-39.9-43.5-65.1s-16.3-51.6-16.3-79.3c0-27.6,5.4-54.1,16.3-79.3c10.8-25.2,25.4-46.9,43.5-65.1s39.9-32.7,65.1-43.5C445.9,342.1,472.4,336.7,500,336.7z M500,418.3c-33.8,0-62.7,12-86.6,35.9s-35.9,52.8-35.9,86.6c0,33.8,12,62.7,35.9,86.6s52.8,35.9,86.6,35.9c33.8,0,62.7-12,86.6-35.9s35.9-52.8,35.9-86.6c0-33.8-12-62.7-35.9-86.6S533.8,418.3,500,418.3z M701.3,295.8l-80.1-122.5H380.4l-81.7,122.5H132.5c-11.3,0-20.9,4-28.9,12.1c-8,8.1-12,17.9-12,29.3v448.5c0,11.3,4,20.9,12,28.9c8,8,17.6,12,28.9,12h735c11.5,0,21.2-3.9,29-11.6c7.9-7.8,11.8-17.3,11.8-28.6V337.9c0-11.5-4-21.4-12.1-29.7c-8.1-8.3-17.7-12.4-28.7-12.4L701.3,295.8L701.3,295.8z" class="ng-tns-c75-0"></path>
                    </g>
                  </svg>
                </span>
                <input type="file" id="change__wall-img" name="wallImg">
                <span>Thay đổi ảnh bìa</span>
              </label>
            </div>
            <div class="acc_setting">
              <div class="setting-avatar">
                <div class="show-avatar">
                  <img src="<?php if (!empty($profile['avatar'])) {
                              echo "../vendors/avatar/" . $profile['avatar'];
                            } else {
                              echo "../vendors/avatar/bg_gray_default.jpg";
                            } ?>" alt="" class="avatar">
                  <label for="change__avatar" class="change__avatar">
                    <span class="icon icon-camera">
                      <svg _ngcontent-serverApp-c75="" height="40" viewBox="0 0 1000 1000" width="40" x="0px" y="0px" class="ng-tns-c75-0 ng-star-inserted">
                        <g _ngcontent-serverApp-c75="" fill="#FFF" class="ng-tns-c75-0">
                          <path _ngcontent-serverApp-c75="" d="M336.7,91.7h326.7L745,214.2h122.5c33.8,0,62.7,12.2,86.6,36.5s35.9,53.4,35.9,87.2v448.5c0,33.8-12,62.6-35.9,86.3s-52.8,35.6-86.6,35.6h-735c-33.8,0-62.7-12-86.6-35.9S10,819.6,10,785.8V337.3c0-33.8,12-62.8,35.9-86.9s52.8-36.2,86.6-36.2H255L336.7,91.7z M500,336.7c27.6,0,54.1,5.4,79.3,16.3c25.2,10.8,46.9,25.4,65.1,43.5s32.7,39.9,43.5,65.1c10.8,25.2,16.3,51.6,16.3,79.3c0,27.6-5.4,54.1-16.3,79.3c-10.8,25.2-25.4,46.9-43.5,65.1s-39.9,32.7-65.1,43.5C554.1,739.6,527.6,745,500,745s-54.1-5.4-79.3-16.3c-25.2-10.8-46.9-25.4-65.1-43.5s-32.7-39.9-43.5-65.1s-16.3-51.6-16.3-79.3c0-27.6,5.4-54.1,16.3-79.3c10.8-25.2,25.4-46.9,43.5-65.1s39.9-32.7,65.1-43.5C445.9,342.1,472.4,336.7,500,336.7z M500,418.3c-33.8,0-62.7,12-86.6,35.9s-35.9,52.8-35.9,86.6c0,33.8,12,62.7,35.9,86.6s52.8,35.9,86.6,35.9c33.8,0,62.7-12,86.6-35.9s35.9-52.8,35.9-86.6c0-33.8-12-62.7-35.9-86.6S533.8,418.3,500,418.3z M701.3,295.8l-80.1-122.5H380.4l-81.7,122.5H132.5c-11.3,0-20.9,4-28.9,12.1c-8,8.1-12,17.9-12,29.3v448.5c0,11.3,4,20.9,12,28.9c8,8,17.6,12,28.9,12h735c11.5,0,21.2-3.9,29-11.6c7.9-7.8,11.8-17.3,11.8-28.6V337.9c0-11.5-4-21.4-12.1-29.7c-8.1-8.3-17.7-12.4-28.7-12.4L701.3,295.8L701.3,295.8z" class="ng-tns-c75-0"></path>
                        </g>
                      </svg>
                    </span>
                    <input type="file" id="change__avatar" name="avatar">
                  </label>
                </div>
                <div class="setting-description">
                  <textarea name="description" id="change__des"><?php if (!empty($profile['description'])) {
                                                                  echo $profile['description'];
                                                                } ?></textarea>
                </div>
              </div>
              <div class="setting-profiles">
                <div class="profile profile-main">
                  <label for="facename">
                    <span class="txt">tên hiển thị</span>
                    <input type="text" name="facename" id="facename" value="<?php if (!empty($profile['face_name'])) {
                                                                              echo $profile['face_name'];
                                                                            } ?>">
                  </label>
                  <label for="email">
                    <span class="txt">email</span>
                    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                  </label>
                  <label for="birth">
                    <span class="txt">ngày sinh</span>
                    <!-- <div class="box-content">
                                <select name="birth-day">
                                    <option value="1">1</option>
                                </select>
                                <select name="birth-month">
                                    <option value="1">1</option>
                                </select>
                                <select name="birth-year">
                                    <option value="1">1</option>
                                </select>
                            </div> -->
                    <input type="date" name="birthday" value="<?php echo $profile['birthday']; ?>">
                  </label>
                  <?php
                  function checked($value, $valueCheck)
                  {
                    if ($value === $valueCheck) {
                      $rs = 'checked="checked"';
                    } else {
                      $rs = '';
                    }
                    return $rs;
                  }
                  ?>
                  <label for="gender">
                    <span class="txt">giới tính</span>
                    <div class="box-content">
                      <label for="male"><input type="radio" value="male" name="gender" checked="checked" id="male" <?php if (!empty($profile['gender'])) {
                                                                                                                      echo checked($profile['gender'], "male");
                                                                                                                    } ?>><span>Nam</span></label>
                      <label for="female"><input type="radio" value="female" name="gender" id="female" <?php if (!empty($profile['gender'])) {
                                                                                                          echo checked($profile['gender'], "female");
                                                                                                        } ?>><span>Nữ</span></label>
                      <label for="other"><input type="radio" value="other" name="gender" id="other" <?php if (!empty($profile['gender'])) {
                                                                                                      echo checked($profile['gender'], "other");
                                                                                                    } ?>><span>Khác</span></label>
                    </div>
                  </label>
                </div>
                <div class="profile setting-password">
                  <button type="button" class="btn btn__change-password" onclick="toggleDrop()">đổi mật khẩu</button>
                  <label for="oldpass">
                    <span class="txt">mật khẩu cũ</span>
                    <input type="password" name="oldpass" id="oldpass" placeholder="*********">
                  </label>
                  <label for="newpass">
                    <span class="txt">mật khẩu mới</span>
                    <input type="password" name="newpass" id="newpass" placeholder="*********">
                  </label>
                  <label for="repass">
                    <span class="txt">nhập lại mật khẩu mới</span>
                    <input type="password" name="repass" id="repass" placeholder="*********">
                  </label>
                  <input type="submit" name="changePass" class="btn btn-primary btn-change-pass" value="Xác nhận">
                </div>
              </div>
            </div>
            <div class="profile profile-main">
              <label for="id_card">
                <span class="txt">số chứng minh thư</span>
                <input type="text" name="idCard" id="id_card" value="<?php if (!empty($profile['id_card'])) {
                                                                        echo $profile['id_card'];
                                                                      } ?>">
              </label>
              <label for="address">
                <span class="txt">địa chỉ</span>
                <input type="text" name="address" id="address" value="<?php if (!empty($profile['address'])) {
                                                                        echo $profile['address'];
                                                                      } ?>">
              </label>
              <label for="phone">
                <span class="txt">số điện thoại</span>
                <input type="text" name="phone" id="phone" value="<?php if (!empty($profile['phone'])) {
                                                                    echo $profile['phone'];
                                                                  } ?>">
              </label>
            </div>
            <div class="setting-profiles action">
              <input type="button" name="cancel" class="btn" value="Huỷ"></input>
              <input type="submit" name="submitMain" class="btn btn-primary" value="Lưu">
            </div>
          </form>
        </div>
      </main>
      <!-- FOOTER -->
      <footer class="footer">
        <div class="grid wide footer__container">
          <!-- footer top -->
          <div class="footer--top">
            <div class="footer--top-logo">
              <img src="../assets/icons/wideLogo.png" alt="">
            </div>
            <ul class="footer--top-menu">
              <li class="footer--top-menu-item">
                <a href="#">điều kiện sử dụng</a>
              </li>
            </ul>
          </div>
          <!-- end footer top -->
          <!-- start footer bottom -->
          <?php include '../components/footer_category.php'; ?>
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
    <?php mysqli_close($connect); ?>
  </div>
  <!-- Import Js -->
  <script src="../assets/fontawesome/js/all.js"></script>
  <script src="../assets/js/index.js"></script>
</body>

</html>