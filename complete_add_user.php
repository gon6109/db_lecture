<?php

require_once('env.php');
require_once('head.php');

?>

<html>
    <head>
        <?php CreateHead('ユーザ追加完了'); ?>
    </head>
    <body>
        <?php require_once('header.php'); ?>
        <h1>ユーザ追加完了</h1>
        <p>メールを送信しました。（今回は、送信機能はないよ</p>
        <p><a href="manager.php">管理者ページへもどる</a></p>
    </body>
</html>