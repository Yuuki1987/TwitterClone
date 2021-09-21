<?php
///////////////////////////////////////
// サインアウトコントローラー 
//ログアウトボタンを押した際にデータを受け取り、Modelに処理してログイン画面に遷移
//そのためView画面は不要のため無し
///////////////////////////////////////
 
// 設定を読み込み
include_once '../config.php';
// 便利な関数を読み込む
include_once '../util.php';
 
// ユーザー情報をセッションから削除
deleteUserSession();
 
// ログイン画面に遷移
header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
exit;