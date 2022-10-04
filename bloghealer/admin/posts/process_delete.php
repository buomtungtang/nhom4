<?php
require '../check_admin_login.php';

if (empty($_GET['id'])) {
    header('location:form_update.php?error=Phải truyền mã chuyên mục để xoá!');
    exit;
}
$id = $_GET['id'];
require '../connect.php';

// $sql = "SELECT category_image FROM categories WHERE category_id = '$id'";
// $result = mysqli_query($connect,$sql);  
// $pathImg = mysqli_fetch_array($result)[0];
// unlink("../../assets/images/categories/$pathImg");

$sql = "DELETE FROM posts WHERE post_id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php?success=Xoá thành công!');
