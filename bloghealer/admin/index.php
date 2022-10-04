<!DOCTYPE html>
<html lang="vi-vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="shortcut icon" href="../assets/icons/spiderum.png" />
</head>

<body>
    <div class="homepage">
        <form method="post" action="process_login.php" class="sidePadding-16" id="form-signup">
            <a href="../index.php" class="spr__logo">
                <img src="../assets/icons/spiderum-logo.png" alt="">
            </a>
            <label for="email" class="info">
                <input id="email" type="text" name="email" placeholder="Nhập email của bạn" autocomplete="FALSE">
            </label>
            <label for="password" class="info">
                <input id="password" type="password" name="password" placeholder="Mật khẩu" autocomplete="FALSE">
            </label>
            <input type="submit" value="Đăng nhập" class="btn btn-primary">
        </form>
    </div>
    <!-- Import Js -->
    <script src="../assets/fontawesome/js/all.js"></script>
    <script src="../assets/lodash/lodash.js"></script>
    <script src="../assets/js/index.js"></script>
</body>

</html>