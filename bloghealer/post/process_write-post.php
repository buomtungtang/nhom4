<?php
$accId = $_POST['accId'];
$postTitle = addslashes($_POST['post_title']);
$postContent = nl2br(addslashes($_POST['post_content']));
$postDes = addslashes($_POST['desOfPost']);
$tag = addslashes($_POST['tag']);
$postSeries = $_POST['postSeries'];
$postCate = $_POST['category_id'];
$postName = $_POST['nameConvert'];
// $createdAt = date("d/m/Y");

if (isset($_FILES['postImage'])) {
    $postImage = $_FILES['postImage'];

    $folder = '../vendors/thumbnails/';
    $fileExtension = explode('.', $postImage['name'])[1];
    $fileName = time() . '.' . $fileExtension;
    $pathFile = $folder . $fileName;

    move_uploaded_file($postImage["tmp_name"], $pathFile);
}
include '../admin/connect.php';

$sql = "INSERT INTO posts (acc_id,category_id, series, post_title, post_content, post_image, post_description, post_tag, post_name)
VALUES ('$accId','$postCate','$postSeries','$postTitle','$postContent','$fileName','$postDes','$tag', '$postName')";
// mysqli_query($connect,$sql);
// mysqli_close($connect);

if (mysqli_query($connect, $sql)) {

    echo 'thêm thành công';
} else {
    echo 'Thêm không thành công. Lỗi' . mysqli_error($connect);
}
$getInfo = "SELECT * FROM posts WHERE acc_id = '$accId' AND post_title ='$postTitle'";
$qrGetInfo = mysqli_query($connect, $getInfo);
if (mysqli_num_rows($qrGetInfo) == 1) {
    $post = mysqli_fetch_array($qrGetInfo);
}
$id = $post['post_id'];
mysqli_close($connect);
header("location:post.php?post=$postName&idPost=$id");
