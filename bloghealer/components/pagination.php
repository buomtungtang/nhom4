<!-- <div class="pagination">
                  <ul class="list-unstyled">
                    <li><button class="pagi-page active">1</button></li>
                    <li><button class="pagi-page">2</button></li>
                    <li><button class="pagi-page">3</button></li>
                    <li><button class="pagi-page">4</button></li>
                    <li><button class="pagi-page">5</button></li>
                    <li><button class="pagi-page">6</button></li>
                    <li><button class="pagi-page">7</button></li>
                    <li><button class="pagi-page">8</button></li>
                    <li><button class="pagi-page">9</button></li>
                    <li><button class="pagi-page">10</button></li>
                    <a href="#" class="pagi-page"
                      >Tiếp<i class="fa-solid fa-angles-right"></i
                    ></a>
                  </ul>
                </div> -->
<div class="pagination">
  <ul class="list-unstyled">
    <?php for ($i = 1; $i <= $numPage; $i++) { ?>
      <li>
        <a href="?trang=<?php echo $i ?>" class="pagi-page <?php if ($i == $_GET['trang']) {
                                                              echo " active";
                                                            }
                                                            if(!isset($_GET['trang'])&&($i ==1)){ echo " active";}
                                                            ?>">
          <?php echo $i ?>
        </a>
      </li>
      <!-- <a href="#" class="pagi-page"
                      >Tiếp<i class="fa-solid fa-angles-right"></i
                    ></a> -->
    <?php } ?>
  </ul>
</div>