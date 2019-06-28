<?php

require_once('env.php');
require_once('head.php');

require_once('check_user.php');
CheckUser(true);

?>

<html>
    <head>
        <?php CreateHead('ユーザ追加'); ?>
    </head>
    <body>
        <?php require_once('header.php'); ?>
        <h1>ユーザ追加</h1>
        <form action="add_user.php" method="POST">
            <div>名前<input type="text" name="name"></div>
            <div>メールアドレス<input type="text" name="email"></div>
            <div><input type="submit" name="追加"></div>
        </form>
    </body>
</html>