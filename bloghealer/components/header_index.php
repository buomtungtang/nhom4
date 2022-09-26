<header class="bg-white">
  <div class="header grid wide">
    <div class="row no-gutters sidePadding-16 bg-white">
      <div class="grid col l-12">
        <div class="row no-gutters navbar__container items-center">
          <a href="./index.php" class="col l-2 navbar__item navbar__brand">
            <img src="./assets/icons/wideLogo.png" alt="Spiderum" class="hideOnMobile" />
            <img src="./assets/icons/spiderum.png" alt="Spiderum" class="hide showOnMobile" />
          </a>
          <ul class="col navbar__item navbar__social items-center hideOnTablet hideOnMobile">
            <li class="navbar__social--item items-center">
              <a href="https://www.facebook.com/Spiderum" class="navbar__social--link items-center">
                <img src="./assets/icons/facebook.svg" alt="Facebook" />
              </a>
            </li>
            <li class="navbar__social--item items-center">
              <a href="https://www.youtube.com/spiderum" class="navbar__social--link items-center">
                <img src="./assets/icons/youtube.svg" alt="Youtube" />
              </a>
            </li>
            <li class="navbar__social--item items-center">
              <a href="https://anchor.fm/spiderum" class="navbar__social--link items-center">
                <img src="./assets/icons/spotify.svg" alt="Spotify" />
              </a>
            </li>
            <li class="navbar__social--item items-center hideOnMPc hideOnTablet hideOnMobile">
              <a href="https://shopee.vn/spiderum" class="navbar__social--link link--shop items-center color-sepia">
                <img src="./assets/icons/shop.svg" alt="Shop" />
                <span>spider's shop</span>
              </a>
            </li>
          </ul>
          <div class="col navbar__item items-center">
            <button aria-label="Search" class="btn--preSearchToggle navbarToggle toggle spr__icon" onclick="toggleSearch()">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <div class="search">
              <form class="form-search" method="GET" action="tim-kiem.php">
                <button onclick="toggleSearch()"><i class="fa-solid fa-arrow-left-long"></i></button>
                <input type="search" name="search" placeholder="Tìm kiếm theo tiêu đề tác giả hoặc tag" />
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
            </div>
            <?php //include 'navbar_new.php'; 
            ?>
            <?php //include 'header_account.php'; 
            ?>
            <?php
            if (empty($_SESSION['acc_id'])) {
              include 'navbar_new.php';
            } else {
              include 'header_account.php';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="header__wrapper row no-gutters bg-white hideOnMPc hideOnTablet hideOnMobile">
      <div class="col l-12 navbar__categories--wrapper items-center hideOnTablet hideOnMPc hideOnMobile">
        <ul class="navbar__categories--menu sidePadding-16 items-center">
          <?php
          require './admin/connect.php';
          $sql = "SELECT * FROM categories";
          $arrCate = mysqli_query($connect, $sql);
          // $resultFake = $result;
          // $sql = "SELECT * FROM categories";
          // $result = mysqli_query($connect,$sql);
          // $rows = mysqli_fetch_array($result);
          // mysqli_close($connect);
          foreach ($arrCate as $eachMenu) :
          ?>
            <li class="box--item-category">
              <a href="./chuyen-muc.php?category=<?php echo  $eachMenu['category_convert']; ?>&id=<?php echo $eachMenu['category_id']; ?>" class="category--item items-center"><?php echo $eachMenu['category_name']; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="items-center relative">
          <button onclick="categoryDrop()" class="categories--more spr__icon">
            <i class="fa-solid fa-bars"></i>
          </button>
          <ul class="dropdown navbar__categories--sub">
            <?php
            // require './admin/connect.php';
            // $sqll = "SELECT * FROM categories";
            // $resultFake = mysqli_query($connect,$sqll);
            // $rows = mysqli_fetch_array($resultFake);
            // echo count($rows);
            // // mysqli_close($connect);
            foreach ($arrCate as $eachMenu) :
            ?>
              <li class="item">
                <a href="./chuyen-muc.php?category=<?php echo  $eachMenu['category_convert']; ?>&id=<?php echo $eachMenu['category_id']; ?>">
                  <?php echo $eachMenu['category_name']; ?>
                </a>
              </li>

            <?php endforeach; //mysqli_close($connect);
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>