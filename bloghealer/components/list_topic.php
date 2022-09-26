<div class="hide topic">
  <h2>chủ đề</h2>
  <ul class="categories--mobile">
      <?php
      require './admin/connect.php';
      $sql = "SELECT * FROM categories";
      $arrCate = mysqli_query($connect, $sql);
      foreach ($arrCate as $eachMenu) :
      ?>
    <li class="category--mobile-item">
    <a href="./chuyen-muc.php?category=<?php echo  $eachMenu['category_convert']; ?>&id=<?php echo $eachMenu['category_id']; ?>" class="category--item items-center"><?php echo $eachMenu['category_name']; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
  <button class="btn btn-showMore">Hiển thị thêm</button>
</div>