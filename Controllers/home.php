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
//ツイートを読み込み等を行うModelsの読み込み
include_once '../Models/tweets.php';

// ログインチェック
$user = getUserSession();
if (!$user) {
    // ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

// Viewで使用する変数に置き換える（独自ルール）
$view_user = $user;
// ツイート一覧
$view_tweets = findTweets($user);



// 画面表示
include_once '../Views/home.php';
