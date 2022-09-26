<?php
$nameLogin = $_POST['nameLogin'];
$password = $_POST['password'];
if (isset($_POST['rememberLogin'])) {
    $rememberLogin = true;
} else {
    $rememberLogin = false;
}

require('admin/connect.php');

$sql = "SELECT * FROM accounts 
WHERE (acc_email = '$nameLogin' AND password = '$password')
    OR (username = '$nameLogin' AND password = '$password')";
$result = mysqli_query($connect, $sql);
$numberRows = mysqli_num_rows($result);

if ($numberRows == 1) {
    echo "Đăng nhập thành công";
    session_start();
    $each = mysqli_fetch_array($result);
    $accId = $each['acc_id'];
    $_SESSION['acc_id'] = $accId;
    $_SESSION['username'] = $each['username'];
    if ($rememberLogin) {
        $token = uniqid('user_', true);
        $sql = "UPDATE accounts 
        SET
        token = '$token';
        WHERE
        acc_id = '$accId';
        ";
        mysqli_query($connect, $sql);
        setcookie('rememberLogin', $token, time() + 86400 * 30);
    }
    // mysqli_close($connect);
}
header('location:signin.php?error=Thông tin đăng nhập không chính xác');
