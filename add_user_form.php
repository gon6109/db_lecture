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
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">
                            <h1 class="title is-3">ユーザ追加</h1>
                            <form class="content" action="add_user.php" method="POST">
                                <div class="field">
                                    <label class="label">名前</label>
                                    <div class="control">
                                        <input class="input" type="text" name="name">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">メールアドレス</label>
                                    <div class="control">
                                        <input class="input" type="text" name="email">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="button is-link" type="submit" value="追加">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>