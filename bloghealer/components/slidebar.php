<div class="main-carousel">
    <?php $arrPost = "SELECT posts.*,categories.category_name,accounts.username,categories.category_convert, profiles.face_name,profiles.avatar
                FROM posts
    INNER JOIN accounts
    ON posts.acc_id = accounts.acc_id
    INNER JOIN profiles
    ON accounts.acc_id = profiles.acc_id
    INNER JOIN categories
    ON posts.category_id = categories.category_id
    WHERE RAND() AND posts.post_status = 'publish'
    LIMIT 6
                ";
    $qrPost = mysqli_query($connect, $arrPost);
    foreach ($qrPost as $eachPost) :
    ?>
        <div class="carousel-cell">
            <div class="post">
                <a href="../post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>" class="post--image-represent">
                    <img src="../vendors/thumbnails/<?php if ($eachPost['post_image']) {
                                                        echo $eachPost['post_image'];
                                                    } else {
                                                        echo "bg_gray_default.jpg";
                                                    } ?>" alt="">
                </a>
                <div class="details-breif">
                    <div class="post--info items-center">
                        <div class="post--info-general">
                            <a href="../chuyen-muc.php?category=<?php echo $eachPost['category_convert']; ?>&id=<?php echo $eachPost['category_id']; ?>" class="topicName">
                                <?php echo $eachPost['category_name']; ?>
                            </a>
                        </div>
                    </div>
                    <div class="navbar-title">
                        <a class="navbar--post" href="../post/post.php?post=<?php echo $eachPost['post_name']; ?>&idPost=<?php echo $eachPost['post_id']; ?>">
                            <h2 class="post--title"><?php echo $eachPost['post_title']; ?></h2>
                        </a>
                    </div>
                    <div class="post--details items-center">
                        <div class="items-center card-details">
                            <div class="card-author items-center">
                                <a href="../user/nguoi-dung.php?username=<?php echo $eachPost['username']; ?>" class="author-name"><?php echo $eachPost['face_name']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>