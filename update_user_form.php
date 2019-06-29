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
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">
                            <h1 class="title is-3">
                                ユーザ設定
                            </h1>
                            <form class="content" action="update_user.php" method="POST">
                                <div class="field">
                                    <label class="label">名前</label>
                                    <div class="control">
                                        <input class="input" type="text" name="name" value="<?php print(GetUserName($_SESSION['ID'])); ?>">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">メールアドレス</label>
                                    <div class="control">
                                       <input class="input" type="text" name="email" value="<?php print(GetEmail($_SESSION['ID']));?>">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">パスワード</label>
                                    <div class="control">
                                        <input class="input" type="password" name="pass">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">パスワード再入力</label>
                                    <div class="control">
                                        <input class="input" type="password" name="repass">
                                    </div>
                                </div>
                                <div class="field"><input class="button is-link" type="submit" value="変更"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>