<?php

require_once("user.php");
require_once('head.php');
require_once('check_user.php');
CheckUser(false);

?>

<html>
    <head>
        <?php CreateHead('ユーザ設定'); ?>
    </head>
    <body>
        <?php require_once('header.php'); ?>
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