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
    <title>LOGIN / Twitter Clone</title>
    <meta name="description" content="ログイン画面です">
</head>
 
<body class="signup text-center">
    <main class="form-signup">
        <form action="sign-in.php" method="post">
            <img src="../Views/img/logo-white.svg" alt="" class="logo-white">
            <h1>Twitter Cloneにログイン</h1>
            <input type="email" class="form-control" name="email" placeholder="メールアドレス" required autofocus>
            <input type="password" class="form-control" name="password" placeholder="パスワード" required>
            <button class="w-100 btn btn-lg" type="submit">LOGIN</button>
            <p class="mt-3 mb-2"><a href="sign-up.php">SIGN-UP</a></p>
            <p class="mt-2 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>
 <?php include_once('../Views/common/foot.php'); ?>