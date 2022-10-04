<?php
$id = $_SESSION['id'];
// require '../admin/connect.php';
$sql = "SELECT name FROM admin WHERE id = '$id'";
$getName = mysqli_query($connect, $sql);
if (mysqli_num_rows($getName) == 1) {
  $eachName = mysqli_fetch_array($getName);
}
// $sqlProfile  = "SELECT * FROM profiles WHERE acc_id = '$accId'";
// $queryProfile = mysqli_query($connect,$sqlProfile);
// if(mysqli_num_rows($queryProfile)==1){
//   $profile = mysqli_fetch_array($queryProfile);
// }
// mysqli_close($connect);
?>
<ul class="header__acount items-center">
  <li class="navbar--item navbar--messages hideOnMPc hideOnTablet hideOnMobile">
    <a href="#" class="">
      <div class="navbarToggle toggle spr__icon">
        <i class="fa-regular fa-envelope"></i>
      </div>
    </a>
  </li>
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
  <li class="navbar--item items-center" id="btn--new-post">
    <a href="../../post/write-post.php" class="btn navbar--newPost spr__icon items-center">
      <span class="post--icon items-center hideOnTablet hideOnMobile">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.8078 0.583886C15.7681 0.385981 15.6134 0.231295 15.4155 0.191701C12.699 -0.351482 9.86035 0.275982 7.62715 1.91294C7.58043 1.94716 7.53821 1.99178 7.50693 2.03859C7.39572 2.20515 7.42275 2.30678 7.42275 2.92571L7.29125 2.79421C7.09903 2.60193 6.78838 2.59853 6.592 2.78652C6.52666 2.84906 6.77472 2.60187 3.01284 6.36368C2.35969 7.01684 1.99998 7.88517 1.99998 8.8087V13.2923L0.14646 15.1458C-0.0488199 15.3411 -0.0488199 15.6576 0.14646 15.8529C0.34174 16.0482 0.6583 16.0481 0.853548 15.8529L2.70706 13.9994H7.19069C8.11427 13.9994 8.98261 13.6397 9.6357 12.9865L10.3316 12.2907C10.6888 12.1835 10.8107 11.7281 10.541 11.4584L10.1395 11.0569C11.4484 11.0569 11.4317 11.0736 11.5689 11.0097C11.7713 10.9817 11.9345 10.8329 11.984 10.6383C13.23 9.39232 14.3895 8.39126 15.2536 6.29368C16.0282 4.41314 16.1758 2.42334 15.8078 0.583886ZM12.3949 8.8132L11.193 10.015H8.99689C8.83717 9.975 8.66199 10.0148 8.53396 10.1345C8.26149 10.3067 8.22224 10.6854 8.44736 10.9105L9.37248 11.8356L8.92861 12.2795C8.46439 12.7437 7.84718 12.9994 7.19072 12.9994H3.70706L12.3535 4.35301C12.5487 4.15776 12.5487 3.84117 12.3535 3.64592C12.1582 3.45068 11.8416 3.45068 11.6464 3.64592L2.99997 12.2923V8.8087C2.99997 8.15226 3.25569 7.53505 3.71993 7.07077L6.93678 3.85399C7.6094 4.52657 7.64806 4.61129 7.87996 4.63067C8.13455 4.65285 8.3674 4.47811 8.41411 4.22364C8.42649 4.15642 8.42274 4.25676 8.42274 2.57406C10.3048 1.27513 12.6299 0.750259 14.8871 1.11248C15.3332 3.8897 14.461 6.74709 12.3949 8.8132Z" fill="#303133"></path>
        </svg>
      </span>
      <span class="post--text-des">viết bài</span>
    </a>
  </li>
  <li class="navbar--item navbar--user">
    <button class="navbarToggle toggle items-center cursor-pointer btnDrop" onclick="navbarDropdown()" style="
                            background-image: url('../../vendors/avatar/<?php if (!empty($profile['avatar'])) {
                                                                          echo $profile['avatar'];
                                                                        } else {
                                                                          echo "bg_gray_default.jpg";
                                                                        } ?>');
                          "></button>
    <!-- dropdown -->
    <div class="dropdown navbar__dropdown active cursor-pointer">
      <div class="dropdown--inner">
        <div class="dropdown--content">
          <div class="item navbar__user--detail">
            <div class="avatar">
              <img src="../../vendors/avatar/<?php if (!empty($profile['avatar'])) {
                                                echo $profile['avatar'];
                                              } else {
                                                echo "bg_gray_default.jpg";
                                              } ?>" alt="avatar" />
            </div>
            <div class="navbar__user--info">
              <h6 class="displayname"><?php echo $_SESSION['name']; ?></h6>
              <span class="username"><?php echo "@" . $_SESSION['name']; ?></span>
              <a href="../../user/nguoi-dung.php" class="btn">xem trang cá nhân</a>
            </div>
          </div>
          <div class="separator"></div>
          <a href="../../post/write-post.php" class="item item-mobile">
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