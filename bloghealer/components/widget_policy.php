<?php
require './admin/connect.php';
$cateId = $_GET['id'];
$sql = "SELECT * FROM categories WHERE category_id  = '$cateId'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 1) {
  $each = mysqli_fetch_array($result);
}
?>
<div class="sidebar-container">
  <div class="widget policy">
    <h1 class="title"><?php echo $each['category_name']; ?></h1>
    <div>
      <strong>nội dung cho phép</strong>
      <p>
        Các nội dung thể hiện góc nhìn, quan điểm đa chiều về các vấn đề kinh tế, văn hoá – xã hội trong và ngoài nước.
      </p>
      <strong>quy định</strong>
      <ul>
        <li>
          Những nội dung không thuộc phạm trù của danh mục sẽ bị nhắc nhở và xoá (nếu không thay đổi thích hợp)
        </li>
        <li>
          Nghiêm cấm spam, quảng cáo
        </li>
        <li>
          Nghiêm cấm post nội dung 18+ hay những quan điểm cực đoan liên quan tới chính trị - tôn giáo
        </li>
        <li>
          Nghiêm cấm phát ngôn thiếu văn hoá và đả kích cá nhân.
        </li>
        <li>
          Nghiêm cấm bài đăng không ghi rõ nguồn nếu đi cóp nhặt.
        </li>
      </ul>
    </div>
    <button class="btn btn__follow">theo dõi</button>
  </div>
</div>