<?php require '../check_admin_login.php';
require '../connect.php';
?>
<!DOCTYPE html>
<html lang="vi-vn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài viết</title>
    <meta name="description" content="Mạng Xã Hội Chia Sẻ Quan Điểm - Kiến Thức Hàng Đầu Việt Nam" />
    <!-- Import Css -->
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/grid.css" />
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/dropdown.css" />
    <link rel="stylesheet" href="../../assets/css/components.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <link rel="shortcut icon" href="../../assets/icons/spiderum.png" />
</head>

<body>
    <div class="app-root">
        <div class="homepage">
            <?php include '../components/header_index.php' ?>
            <!-- MAIN -->
            <div id="backToTop"></div>
            <div class="grid box--cushion-navbar"></div>
            <main class="container">
                <div class="grid wide sidePadding-16">

                    <!-- <a href="form_insert.php"><h3>Thêm chuyên mục</h3></a> -->
                    <?php
                    require '../menu.php';



                    $sql = "SELECT 
		posts.post_id,posts.post_title,accounts.username,categories.category_name,
        posts.series,posts.post_description,posts.post_created_at,posts.post_status,posts.post_name,
        posts.view,posts.upvote,posts.downvote,accounts.username,categories.category_name
        FROM posts
        INNER JOIN accounts
        ON posts.acc_id = accounts.acc_id
        INNER JOIN categories
        ON posts.category_id = categories.category_id;
        ";
                    $result = mysqli_query($connect, $sql);
                    $ordinal = 0;
                    ?>
                    <h2 style="display:flex; width:100%; justify-content: center; margin-bottom:.75rem;">Quản lý bài viết</h2>
                    <table border="1" cellspacing="0" width="100%" class="table-list">
                        <tr>
                            <th>Stt</th>
                            <th>Mã bài viết</th>
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            <th>Chuyên mục</th>
                            <th>Series</th>
                            <!-- <th>Mô tả</th> -->
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                            <th>Lượt ủng hộ (upvote)</th>
                            <th>Lượt phản đối (downvote)</th>
                            <th>Thao tác</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach ($result as $each) : ?>
                            <tr>
                                <td><?php echo ++$ordinal; ?></td>
                                <td><?php echo $each['post_id'] ?></td>
                                <td>
                                    <a href="../../post/post.php?post=<?php echo $each['post_name']; ?>&idPost=<?php echo $each['post_id']; ?>">
                                        <?php echo $each['post_title'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    echo $each['username'];
                                    ?>
                                </td>
                                <td><?php echo $each['category_name'] ?></td>
                                <td><?php echo $each['series'] ?></td>
                                <!-- <td><?php //echo $each['post_description'] 
                                            ?></td> -->
                                <td><?php echo $each['post_created_at'] ?></td>
                                <td><?php echo $each['post_status'] ?></td>
                                <td><?php echo $each['view'] ?></td>
                                <td><?php echo $each['upvote'] ?></td>
                                <td><?php echo $each['downvote'] ?></td>
                                <!-- <td><a href="process_update.php?id=<?php //echo $each['post_id'] 
                                                                        ?>">Hiện</a></td> -->
                                <td><a href="process_publish.php?id=<?php echo $each['post_id'] ?>" class="action">Publish</a></td>
                                <td><a href="process_delete.php?id=<?php echo $each['post_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá bài viết này?');" class="action">Xoá</a></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </main>
            <?php include '../components/footer_index.php' ?>
        </div>
    </div>
    <!-- Import Js -->
    <script src="../../assets/fontawesome/js/all.js"></script>
    <script src="../../assets/js/lodash.js"></script>
    <script src="../../assets/js/index.js"></script>
</body>

</html>