<ul class="menu-admin">
    <li><a href="../categories">Quản lý chuyên mục</a></li>
    <li><a href="../posts">quản lý bài viết </a></li>
    <li><a href="../statistical">Xem thống kê bài viết </a></li>
</ul>
<?php

if (isset($_GET['error'])) {
?>
    <span style='color:red'>
        <?php echo $_GET['error'];
        unset($_GET['error']); ?>
    </span>
<?php }    ?>
<?php
if (isset($_GET['success'])) {
?>
    <span style='color:green'>
        <?php echo $_GET['success'];
        unset($_GET['success']); ?>
    </span>
<?php }    ?>