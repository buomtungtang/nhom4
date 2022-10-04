<?php
    $connect = mysqli_connect('localhost','root','','bloghealer');
    mysqli_set_charset($connect, 'utf8');
    if(!$connect){
        die('Kết nối không thành công'.mysqli_connect_error());
    }
