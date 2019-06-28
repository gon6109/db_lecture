<?php

require_once('head.php');
session_regenerate_id(true);

session_start();
if (array_key_exists('ID', $_SESSION) && !$_SESSION['MANAGER']) {
    session_destroy();
} elseif (array_key_exists('ID', $_SESSION)) {
    $url = './manager.php';
    header('Location: ' . $url, true, 301);
    exit;
}


?>

<html>
    <head>
        <?php CreateHead('管理者ログイン'); ?>
    </head>
    <body>
        <?php require_once('header.php'); ?>
        <h1>
            管理者ログイン
        </h1>
        <form action="login_manager.php" method="POST">
            <div>メールアドレス<input type="text" name="email"></div>
            <div>パスワード<input type="password" name="pass"></div>
            <div><input type="submit" name="Login"></div>
        </form>
        <p>テスト用にadmin/adminで入れます</p>
    </body>
</html>