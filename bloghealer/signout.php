<?php

session_start();
unset($_SESSION['acc_id']);
unset($_SESSION['username']);
setcookie('rememberLogin', null, -1);

header('location:index.php');
