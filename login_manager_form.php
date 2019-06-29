<?php

require_once('head.php');
session_regenerate_id(true);

session_start();
if (array_key_exists('ID', $_SESSION) && !$_SESSION['MANAGER'])
{
    session_destroy();
    $url = './login_manager_form.php';
    header('Location: ' . $url, true, 301);
    exit;
}
elseif (array_key_exists('ID', $_SESSION)) {
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
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">
                            <h1 class="title is-3">
                                管理者ログイン
                            </h1>
                            <form action="login_manager.php" method="POST">
                                <div class="field">
                                    <label class="label">メールアドレス</label>
                                    <div class="control">
                                        <input class="input" type="text" name="email">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">パスワード</label>
                                    <div class="control">
                                        <input class="input" type="password" name="pass">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="button is-link" type="submit" value="Login">
                                    </div>
                                </div>
                            </form>
                            <p>テスト用にadmin/adminで入れます</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>