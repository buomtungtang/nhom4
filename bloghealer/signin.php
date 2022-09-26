<?php
session_start();
if (isset($_COOKIE['rememberLogin'])) {
    $token = $_COOKIE['rememberLogin'];
    require 'admin/connect.php';
    $sql = "SELECT * FROM accounts 
        WHERE token = '$token' limit 1";
    $result = mysqli_query($connect, $sql);
    $numberRows = mysqli_num_rows($result);
    if ($numberRows == 1) {
        $each = mysqli_fetch_array($result);
        $_SESSION['acc_id'] = $each['acc_id'];
        $_SESSION['username'] = $each['username'];
    }
}
if (isset($_SESSION['acc_id'])) {
    header('location:index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/signup.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/signup.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="shortcut icon" href="./assets/icons/spiderum.png" />
</head>

<body>
    <?php
    if (isset($_GET['error'])) {
        echo $_GET['error'];
    }
    ?>
    <div class="homepage">
        <form method="post" action="process_signin.php" class="sidePadding-16" id="form-signup">
            <a href="./index.php" class="spr__logo">
                <img src="./assets/icons/spiderum-logo.png" alt="">
            </a>
            <label for="nameLogin" class="info">
                <input id="nameLogin" type="text" name="nameLogin" placeholder="Tên đăng nhập hoặc email" autocomplete="false">
            </label>
            <label for="password" class="info">
                <input id="password" type="password" name="password" placeholder="Mật khẩu" autocomplete="false">
            </label>
            <label for="remember-login" class="remember-login">
                <input id="remember-login" type="checkbox" name="rememberLogin">
                <span>Ghi nhớ đăng nhập</span>
            </label>
            <input type="submit" value="Đăng nhập" class="btn btn-primary">
            <div class="form__footer">
                <p>
                    <span class="title">Không có tài khoản?</span>
                    <a href="./signup.php" class="nav__signin">Đăng ký ngay</a>
                </p>
            </div>
        </form>
    </div>
    <!-- Import Js -->
    <script src="./assets/fontawesome/js/all.js"></script>
    <script src="./assets/js/lodash.js"></script>
    <script src="./assets/js/index.js"></script>
</body>

</html>