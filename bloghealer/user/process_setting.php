<?php
session_start();
$accId = $_SESSION['acc_id'];
$wallImg = $_FILES['wallImg'];
$avatar = $_FILES['avatar'];
$des = $_POST['description'];
$facename = $_POST['facename'];
$email = $_POST['email'];
$birth = $_POST['birthday'];
$gender = $_POST['gender'];
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$idCard = $_POST['idCard'];
$address = $_POST['address'];
$phone = $_POST['phone'];

require '../admin/connect.php';

$sqlProfile  = "SELECT * FROM profiles WHERE acc_id = '$accId'";
$queryProfile = mysqli_query($connect, $sqlProfile);
if (mysqli_num_rows($queryProfile) == 1) {
  $profile = mysqli_fetch_array($queryProfile);
}

if (isset($_POST['submitMain'])) {
  // if(isset($profile['face_name'])){
  //   $sql = "UPDATE profiles SET face_name = '$facename' WHERE acc_id = '$accId'";
  //   mysqli_query($connect,$sql);
  //   // mysqli_close($connect);
  // }else{
  //   $sql = "INSERT INTO profiles('face_name') VALUES ('$facename') WHERE acc_id = '$accId'";
  //   mysqli_query($connect,$sql);
  // }
  if (!empty($facename)) {
    $sql = "UPDATE profiles SET face_name = '$facename' WHERE acc_id = '$accId'";
    mysqli_query($connect, $sql);
    //mysqli_close($connect);
  }
  if (!empty(explode('.', $wallImg['name'])[0])) {
    $folderWall = '../vendors/avatar/';
    $fileExtensionWall = explode('.', $wallImg['name'])[1];
    $fileNameWall = explode('.', $wallImg['name'])[0] . time() . '.' . $fileExtensionWall;
    $pathFileWall = $folderWall . $fileNameWall;
    move_uploaded_file($wallImg["tmp_name"], $pathFileWall);

    // $getOldWall = "SELECT image_wall FROM profiles WHERE acc_id = '$accId'";
    // $oldWall = mysqli_query($connect,$getOldWall);  
    {
      // $pathWall = mysqli_fetch_array($oldWall)['image_wall'];
      $pathFileWall = $profile['image_wall'];
      unlink("../vendors/avatar/$pathWall");
    }
    $changeWall = "UPDATE profiles SET image_wall = '$fileNameWall' WHERE acc_id = '$accId'";
    mysqli_query($connect, $changeWall);
    // mysqli_close($connect);
  }
  if (!empty(explode('.', $avatar['name'])[0])) {
    $folderAvatar = '../vendors/avatar/';
    $fileExtensionAvatar = explode('.', $avatar['name'])[1];
    $fileNameAvatar = explode('.', $avatar['name'])[0] . time() . '.' . $fileExtensionAvatar;
    $pathFileAvatar = $folderAvatar . $fileNameAvatar;
    move_uploaded_file($avatar["tmp_name"], $pathFileAvatar);

    // $getOldAvatar = "SELECT avatar FROM profiles WHERE acc_id = '$accId'";
    // $oldAvatar = mysqli_query($connect,$getOldAvatar);  
    //if(!empty(mysqli_num_rows($oldAvatar)))
    {
      // $pathAvatar = mysqli_fetch_array($oldAvatar)['avatar'];
      $pathAvatar = $profile['avatar'];
      unlink("../vendors/avatar/$pathAvatar");
    }

    $changeAvatar = "UPDATE profiles SET avatar = '$fileNameAvatar' WHERE acc_id = '$accId'";
    mysqli_query($connect, $changeAvatar);
    //mysqli_close($connect);
    echo $folderAvatar;
    echo $fileExtensionAvatar;
    echo $fileNameAvatar;
    echo $pathAvatar;
  }
  if (!empty($des)) {
    $sql = "UPDATE profiles SET description = '$des' WHERE acc_id = '$accId'";
    mysqli_query($connect, $sql);
    //mysqli_close($connect);
  }
  if (!empty($birth)) {
    $changeBirth = "UPDATE profiles SET birthday = '$birth' WHERE acc_id = '$accId'";
    mysqli_query($connect, $changeBirth);
    //mysqli_close($connect);
  }
  if (!empty($gender)) {
    $changeGender = "UPDATE profiles SET gender = '$gender' WHERE acc_id = '$accId'";
    mysqli_query($connect, $changeGender);
    //mysqli_close($connect);
  }
  if (!empty($idCard)) {
    $sql = "UPDATE profiles SET id_card = '$idCard' WHERE acc_id = '$accId'";
    mysqli_query($connect, $sql);
    //mysqli_close($connect);
  }
  if (!empty($address)) {
    $sql = "UPDATE profiles SET address = '$address' WHERE acc_id = '$accId'";
    mysqli_query($connect, $sql);
    //mysqli_close($connect);
  }
  if (!empty($phone)) {
    $sql = "UPDATE profiles SET phone = '$phone' WHERE acc_id = '$accId'";
    mysqli_query($connect, $sql);
    //mysqli_close($connect);
  }
  // mysqli_query($connect,$sql);
  // $error =mysqli_error($connect);
  // mysqli_close($connect);
  //update email
  $changeEmail = "UPDATE accounts SET acc_email = '$email' WHERE acc_id ='$accId'";
  mysqli_query($connect, $changeEmail);
  //mysqli_close($connect);
  //
  $error = mysqli_error($connect);
  // mysqli_close($connect);
}
// update password
if (isset($_POST['changePass'])) {
  $getPass = "SELECT password FROM accounts WHERE acc_id = '$accId'";
  $queryPass = mysqli_query($connect, $getPass);
  if (mysqli_num_rows($queryPass) == 1) {
    $presentPass = mysqli_fetch_array($queryPass)[0];
  }
  if ($oldpass === $presentPass) {
    $changePass = " UPDATE accounts
    SET password = '$newpass'
    WHERE acc_id = '$accId'
    ";
    mysqli_query($connect, $changePass);
    $error = mysqli_error($connect);
  } else {
    header('location:cai-dat.php?error=Mật khẩu không trùng khớp');
    exit;
  }
  $error = mysqli_error($connect);
}
// remove old image
$error = mysqli_error($connect);
mysqli_close($connect);
if (empty($error)) {
  header('location:cai-dat.php?success=Sửa thành công!');
} else {
  header("location:cai-dat.php?&error=lỗi truy vấn!");
}
// cancel
if (isset($_POST['cancel'])) {
  header('location:caidat.php');
}
