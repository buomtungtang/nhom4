<?php
session_start();
if (!isset($_SESSION['acc_id'])) {
    header('location:../index.php?warning=Hãy đăng nhập trước');
    unset($_GET['warning']);
}
