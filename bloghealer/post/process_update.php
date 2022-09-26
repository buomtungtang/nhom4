<?php
session_start();
$accId = $_SESSION['acc_id'];
$postId = $_GET['idPost'];
$postTitle = addslashes($_POST['post_title']);
$postContent = addslashes($_POST['post_content']);
$postDes = addslashes($_POST['desOfPost']);
$tag = addslashes($_POST['tag']);
$postSeries = $_POST['postSeries'];
$postCate = $_POST['category_id'];
$postName = $_POST['nameConvert'];
$image = $_FILES['postImage'];
// $createdAt = date("d/m/Y");
require '../admin/connect.php';

echo "$posTitle";

if (isset($_POST['update'])) {
    if (!empty($postTitle)) {
        $sql = "UPDATE posts SET post_title = '$postTitle' WHERE post_id = '$postId'";
        mysqli_query($connect, $sql);
    }
    if (!empty($postName)) {
        $sql = "UPDATE posts SET post_name = '$postName' WHERE post_id = '$postId'";
        mysqli_query($connect, $sql);
    }
    if (!empty($postContent)) {
        $sql = "UPDATE posts SET post_content = '$postContent' WHERE post_id = '$postId'";
        mysqli_query($connect, $sql);
    }
    if (!empty($postDes)) {
        $sql = "UPDATE posts SET post_description = '$postDes' WHERE post_id = '$postId'";
        mysqli_query($connect, $sql);
    }
    if (!empty($tag)) {
        $sql = "UPDATE posts SET post_tag = '$tag' WHERE post_id = '$postId'";
        mysqli_query($connect, $sql);
    }
    if (!empty($postSeries)) {
        $sql = "UPDATE posts SET series = '$postSeries' WHERE post_id = '$postId'";
        mysqli_query($connect, $sql);
    }
    if (!empty($postCate)) {
        $sql = "UPDATE posts SET category_id = '$postCate' WHERE post_id = '$postId'";
        mysqli_query($connect, $sql);
    }
    if (!empty(explode('.', $image['name'])[0])) {
        $getImg = "SELECT post_image FROM posts WHERE post_id = '$postId'";
        $qrPath = mysqli_query($connect, $getImg);
        if (mysqli_num_rows($qrPath) == 1) {
            $oldPath = mysqli_fetch_array($qrPath)[0];
        }
        $folder = '../vendors/thumbnails/';
        $fileExtension = explode('.', $image['name'])[1];
        $fileName = explode('.', $image['name'])[0] . time() . '.' . $fileExtension;
        $pathFile = $folder . $fileName;
        move_uploaded_file($image["tmp_name"], $pathFile); {
            unlink("../vendors/avatar/$oldPath");
        }
        $change = "UPDATE posts SET post_image = '$fileName' WHERE post_id = '$postId'";
        mysqli_query($connect, $change);
    }
}

$getInfo = "SELECT * FROM posts WHERE post_id = '$postId'";
$qrGetInfo = mysqli_query($connect, $getInfo);
if (mysqli_num_rows($qrGetInfo) == 1) {
    $post = mysqli_fetch_array($qrGetInfo);
}
$id = $postId;
$postName = $post['post_name'];
$error = mysqli_error($connect);
mysqli_close($connect);
if (empty($error)) {
    header("location:post.php?post=$postName&idPost=$id");
} else {
    header("location:cai-dat.php?&error=lỗi truy vấn!");
}
//
