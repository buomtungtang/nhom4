<?php
require '../check_super_admin_login.php';

if (empty($_POST['categoryId'])) {
    header('location:form_update.php?error=Phải truyền mã chuyên mục để sửa!');
    exit;
}
$id = $_POST['categoryId'];
if (empty($_POST['cateName'])) {
    header("location:form_update.php?id=$id&error=Phải điền tê thư mục!");
    exit;
}
$cateName = $_POST['cateName'];
$cateImage = $_FILES['cateImage'];
$folder = '../../assets/images/categories/';
$fileExtension = explode('.', $cateImage['name'])[1];
$fileName = explode('.', $cateImage['name'])[0] . time() . '.' . $fileExtension;
$pathFile = $folder . $fileName;
move_uploaded_file($cateImage["tmp_name"], $pathFile);
require '../connect.php';

$sql = "SELECT category_image FROM categories WHERE category_id = '$id'";
$result = mysqli_query($connect, $sql);
$pathImg = mysqli_fetch_array($result)[0];
unlink("../../assets/images/categories/$pathImg");

$sql = "UPDATE categories 
SET 
    category_name = '$cateName',
    category_image = '$fileName'
WHERE
    category_id = '$id'
";
mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);
if (empty($error)) {
    header('location:index.php?success=Sửa thành công!');
} else {
    header("location:form_update.php?id=$id&error=lỗi truy vấn!");
}
