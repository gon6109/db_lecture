<?php

require_once("user.php");
session_start();

if (!array_key_exists('ID', $_SESSION) || $_SESSION['MANAGER'])
{
    session_abort();
    $url = './login_user_form.php';
    header('Location: ' . $url, true, 301);
    exit;
}

?>

<html>
    <head>
        <title>ユーザ設定</title>
    </head>
    <body>
        <h1>
            ユーザ設定
        </h1>
        <form action="update_user.php" method="POST">
            <div>名前<input type="text" name="name" value="<?php print(GetUserName($_SESSION['ID'])); ?>"></div>
            <div>メールアドレス<input type="text" name="email" value="<?php print(GetEmail($_SESSION['ID']));?>
"></div>
            <div>パスワード<input type="password" name="pass"></div>
            <div>パスワード再入力<input type="password" name="repass"></div>
            <div><input type="submit" value="変更"></div>
        </form>
    </body>
</html>