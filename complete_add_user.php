<?php

require_once('env.php');
require_once('head.php');
require_once('check_user.php');
CheckUser(true);

?>

<html>
    <head>
        <?php CreateHead('ユーザ追加完了'); ?>
    </head>
    <body>
        <?php require_once('header.php'); ?>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">
                            <h1 class="title is-3">ユーザ追加完了</h1>
                            <p>メールを送信しました。（今回は、送信機能はないよ</p>
                            <a href="manager.php">管理者ページへもどる</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>