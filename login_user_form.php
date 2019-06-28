<?php

require_once('head.php');

session_start();
if (array_key_exists('ID', $_SESSION) && $_SESSION['MANAGER'])
    session_destroy();
else if (array_key_exists('ID', $_SESSION))
{
    $url = './menu.php';
    header('Location: ' . $url, true, 301);
    exit;
}

?>

<html>
    <head>
        <?php CreateHead('ログイン'); ?>
    </head>
    <body>
        <?php require_once('header.php'); ?>
        <h1>ログイン</h1>
        <form action="login_user.php" method="POST">
            <div>メールアドレス<input type="text" name="email"></div>
            <div>パスワード<input type="password" name="pass"></div>
            <div><input type="submit" name="Login"></div>
        </form>
        <p>ログインできるユーザは<a href="login_manager_form.php">ここ</a>から確認できます</p>
    </body>
</html>