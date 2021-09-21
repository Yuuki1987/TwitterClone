<?php

//関連する設定を読み込む
include_once('../config.php');

//役立つ関数の読み込み
include_once('../util.php');

?>

<!DOCTYPE html>
<html lang="ja">
     <!-- headの読み込み -->
    <?php include_once('../Views/common/head.php'); ?>  
    <title>SIGN-UP / Twitter Clone</title>
    <meta name="description" content="会員登録画面です">
</head>
 
<body class="signup text-center">
    <main class="form-signup">
        <form action="sign-up.php" method="post">
            <img src="../Views/img/logo-white.svg" alt="" class="logo-white">
            <h1>アカウントを作る</h1>
            <input type="text" class="form-control" name="nickname" placeholder="ニックネーム" maxlength="50" required autofocus>
            <input type="text" class="form-control" name="name" placeholder="ユーザー名、例)techis132" maxlength="50" required>
            <input type="email" class="form-control" name="email" placeholder="メールアドレス" maxlength="254" required>
            <input type="password" class="form-control" name="password" placeholder="パスワード" minlength="4" maxlength="128" required>
            <button class="w-100 btn btn-lg" type="submit">SIGN-UP</button>
            <p class="mt-3 mb-2"><a href="sign-in.php">LOGIN</a></p>
            <p class="mt-2 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>
<?php include_once('../Views/common/foot.php'); ?>