<?php
require './admin/connect.php';
// $like = $_POST['like'];
// if (empty($like)) {
//     $like = 1;
// } else {
//     $like += 1;
// }
// $sql = "UPDATE posts SET upvote = $like WHERE post_id = '93'";
// $result = mysqli_query($connect, $sql);

// comment
if (isset($_POST['submitComment'])) {

    $postId = $_POST['idpost'];
    $accId = $_POST['iduser'];
    $comment = addslashes($_POST['comment']);

    $sql = "SELECT post_name FROM posts WHERE post_id = '$postId'";
    $qrGetName = mysqli_query($connect, $sql);
    if (mysqli_num_rows($qrGetName) == 1) {
        $eachName = mysqli_fetch_array($qrGetName)[0];
    }

    $sql = "INSERT INTO comments(post_id,acc_id,comment_content)
    VALUES ('$postId', '$accId','$comment')
    ";
    mysqli_query($connect, $sql);

    $sql = "SELECT COUNT(*) FROM comments WHERE post_id = '$postId'";
    $qr = mysqli_query($connect, $sql);
    $numCom = mysqli_fetch_array($qr)[0];

    $sql = "UPDATE posts SET comment_count = '$numCom'  WHERE post_id = '$postId'";
    $qr = mysqli_query($connect, $sql);
}


$error = mysqli_error($connect);
mysqli_close($connect);
header("location:./post/post.php?post=$eachName&idPost=$postId");
