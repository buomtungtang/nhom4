<?php
$fullname = $_POST['fullName'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// check pass
if($repassword !== $password){
    session_start();
    $_SESSION['error'] = 'Mật khẩu không khớp. Bạn vui lòng kiểm tra lại.';
    header('location:signup.php');
    exit;
}
// 

require('admin/connect.php');

$sql = "SELECT count(*) FROM accounts WHERE acc_email = '$email'";
$result = mysqli_query($connect, $sql);
$numberRows = mysqli_fetch_array($result)['count(*)'];
if ($numberRows == 1) {
    session_start();
    $_SESSION['error'] = 'Email đã được dùng! Hãy chọn email khác.';
    header('location:signup.php');
    exit;
}
// check username
$sql = "SELECT count(*) FROM accounts WHERE username = '$username'";
$result = mysqli_query($connect, $sql);
$numberRows = mysqli_fetch_array($result)['count(*)'];
if ($numberRows == 1) {
    session_start();
    $_SESSION['error'] = 'Tên đăng nhập này đã tồn tại! Hãy chọn một tên khác nhé!';
    header('location:signup.php');
    exit;
}
// 
$sql = "INSERT INTO accounts(username, password, acc_fullname, acc_email)
VALUES ('$username','$password','$fullname','$email')
";
mysqli_query($connect, $sql);

$sql = "SELECT acc_id FROM accounts WHERE acc_email = '$email'";
$result = mysqli_query($connect, $sql);
$accId = mysqli_fetch_array($result)['acc_id'];

$sql = "INSERT INTO profiles(acc_id)
VALUES ('$accId')
";
mysqli_query($connect, $sql);

session_start();
$_SESSION['acc_id'] = $accId;
$_SESSION['username'] = $username;
mysqli_close($connect);
header('location:index.php');
