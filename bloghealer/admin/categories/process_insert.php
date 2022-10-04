<?php
require '../check_super_admin_login.php';

if (empty($_POST['cateName'])) {
    header('location:form_insert.php?error=Phải điền tên chuyên mục!');
    exit;
}
$cateName = $_POST['cateName'];
$nameConvert = $_POST['nameConvert'];
$cateImage = $_FILES['image'];
$folder = '../../assets/images/categories/';
$fileExtension = explode('.', $cateImage['name'])[1];
$fileName = explode('.', $cateImage['name'])[0] . time() . '.' . $fileExtension;
$pathFile = $folder . $fileName;
move_uploaded_file($cateImage["tmp_name"], $pathFile);
require '../connect.php';

$sql = "INSERT INTO categories(category_name,category_convert,category_image)
    VALUES ('$cateName','$nameConvert','$fileName')";
if (mysqli_query($connect, $sql)) {

    echo 'thêm thành công';
} else {
    echo 'Thêm không thành công. Lỗi' . mysqli_error($connect);
}
mysqli_close($connect);

header('location:index.php?success=thêm thành công');
