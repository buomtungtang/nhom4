<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
    <div class="homepage">
        <form method="post" action="process_signup.php" class="sidePadding-16" id="form-signup">
            <a href="./index.php" class="spr__logo">
                <img src="./assets/icons/spiderum-logo.png" alt="">
            </a>
            <label for="fullname" class="info">
                <span class="title">Tên của bạn:</span>
                <input id="fullname" type="text" name="fullName" placeholder="Tên của bạn">
            </label>
            <label for="email" class="info">
                <span class="title">Email:</span>
                <input id="email" type="text" name="email" placeholder="email@example.com">
            </label>
            <label for="username" class="info">
                <span class="title">Tên đăng nhập:</span>
                <input id="username" type="text" name="username" placeholder="username">
            </label>
            <label for="password" class="info">
                <span class="title">Mật khẩu:</span>
                <input id="password" type="password" name="password" placeholder="Mật khẩu">
            </label>
            <label for="repassword" class="info">
                <span class="title">Xác nhận lại mật khẩu:</span>
                <input id="repassword" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                <span class="notify-error">*Mật khẩu không khớp</span>
            </label>
            <!-- 
            <label for="address" class="info">
                <span class="title">Địa chỉ:</span>
                <textarea id="address" type="text" name="address" placeholder="" rows="3"></textarea>
            </label> -->
            <div class="form__footer">
                <p>
                    <span class="title">Bạn đã có tài khoản?</span>
                    <a href="./signin.php" class="nav__signin">Đăng nhập</a>
                </p>
                <input type="submit" value="Gửi" class="btn btn-primary">
            </div>
        </form>

    </div>
    <!-- Import Js -->
    <script src="./assets/fontawesome/js/all.js"></script>
    <script src="./assets/js/lodash.js"></script>
    <script src="./assets/js/index.js"></script>
</body>

</html>