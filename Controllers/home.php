<?php
///////////////////////////////////////
// サインインコントローラー(ログイン)
///////////////////////////////////////
// 設定を読み込み
include_once '../config.php';
// 便利な関数を読み込む
include_once '../util.php';
// ユーザーデータ処理するModelの読み込み
include_once '../Models/users.php';

// ログインチェック
$user = getUserSession();
if (!$user) {
    // ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

// Viewで使用する変数に置き換える（独自ルール）
$view_user = $user;

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

// 画面表示
include_once '../Views/home.php';
