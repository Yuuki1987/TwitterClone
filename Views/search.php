<?php
//関連する設定を読み込む
include_once('../config.php');

//役立つ関数の読み込み
include_once('../util.php');
 
///////////////////////////////////////
// ツイート一覧
///////////////////////////////////////
$view_tweets = [
    [
        'user_id' => 1,
        'user_name' => 'Jack_D',
        'user_nickname' => 'ジャックドーシー',
        'user_image_name' => 'jackdorcey_01.jpg',
        'tweet_body' => 'アメリカ合衆国カリフォルニア州サンフランシスコにてTwitter創業。',
        'tweet_image_name' => null,
        'tweet_created_at' => '2006-03-21 14:00:00',
        'like_id' => null,
        'like_count' => 0,
    ],
    [
        'user_id' => 2,
        'user_name' => 'Diablo20210924',
        'user_nickname' => 'ディアブロ２RD公式',
        'user_image_name' => null,
        'tweet_body' => 'ディアブロ２リザレクテッドが９月２４日発売！！',
        'tweet_image_name' => 'db2rd.gif',
        'tweet_created_at' => '2021-08-14 14:00:00',
        'like_id' => 1,
        'like_count' => 1,
    ]
];
 
?>
<!DOCTYPE html>
<html lang="ja">
 
<head>
     <!-- headの読み込み -->
    <?php include_once('../Views/common/head.php'); ?> 
    <title>SEARCH / Twitter Clone</title>
    <meta name="description" content="検索画面です">
</head>
 
<body class="home search text-center">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>検索</h1>
            </div>
 
            <!-- 検索エリア -->
            <form action="search.php" method="get">
                <div class="search-area">
                    <input type="text" class="form-control" placeholder="キーワード検索" name="keyword" value="">
                    <button type="submit" class="btn">検索</button>
                </div>
            </form>
 
            <!-- 仕切りエリア -->
            <div class="ditch"></div>
 
            <!-- つぶやき一覧エリア -->
            <?php if (empty($view_tweets)) : ?>
                <p class="p-3">ツイートがありません</p>
            <?php else : ?>
                <div class="tweet-list">
                    <?php foreach ($view_tweets as $view_tweet) : ?>
                        <!-- tweet一覧の読み込み -->
                        <?php include('../Views/common/tweet.php'); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include_once('../Views/common/foot.php'); ?>
</body>
 
</html>
 