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

// ログイン結果 失敗の場合はfalseが入る
$try_login_result = null;
 
// メールアドレスとパスワードが入力されている場合
if (isset($_POST['email']) && isset($_POST['password'])) {
    // ログインチェック実行 【Models/users.phpに処理を依頼】
    $user = findUserAndCheckPassword($_POST['email'], $_POST['password']);
 
    // ログインに成功した場合
    if ($user) {
        // ユーザー情報をセッションに保存【util.phpに処理を依頼】
        saveUserSession($user);
 
        // ホーム画面へ遷移
        header('Location: ' . HOME_URL . 'Controllers/home.php');
        exit;
    } else {
        // ログイン結果を失敗にする
        $try_login_result = false;
    }
}



// Viewで使用する変数に置き換える（独自ルール）
$view_try_login_result = $try_login_result;
  
// 画面表示
include_once '../Views/sign-in.php';

