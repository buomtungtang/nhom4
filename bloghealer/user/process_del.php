<?php
session_start();
require '../admin/connect.php';

$postId = $_GET['id'];

$sqlPath = "SELECT post_image FROM posts WHERE post_id = '$postId'";
$resultPath = mysqli_query($connect, $sqlPath);
if (!isset(mysqli_fetch_array($resultPath)[0])) {
    $pathImg = mysqli_fetch_array($resultPath)[0];
    unlink("../vendors/thumbnails/$pathImg");
}
$sql = "DELETE FROM posts WHERE post_id = '$postId'";
$result = mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:nguoi-dung.php');
