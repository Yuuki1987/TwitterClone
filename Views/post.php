<?php
//関連する設定を読み込む
include_once('../config.php');

//役立つ関数の読み込み
include_once('../util.php');
 
?>
<!DOCTYPE html>
<html lang="ja">
 
<head>
     <!-- headの読み込み -->
    <?php include_once('../Views/common/head.php'); ?> 
    <title>Tweet / Twitter Clone</title>
    <meta name="description" content="つぶやく画面です">
</head>
 
<body class="home">
    <div class="container">
        <!-- sideの読み込み -->
        <?php include_once('../Views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>つぶやく</h1>
            </div>
 
            <!-- つぶやき投稿エリア -->
            <div class="tweet-post">
                <div class="my-icon">
                    <img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt="">
                </div>
                <div class="input-area">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <textarea name="body" placeholder="いまどうしてる？" maxlength="140"></textarea>
                        <div class="bottom-area">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                            <button class="btn" type="submit">つぶやく</button>
                        </div>
                    </form>
                </div>
            </div>
 
            <!-- 仕切りエリア -->
            <div class="ditch"></div>
        </div>
    </div>
    <?php include_once('../Views/common/foot.php'); ?>
</body>
 
</html>