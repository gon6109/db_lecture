<?php

require_once('head.php');

session_start();
if (array_key_exists('ID', $_SESSION) && $_SESSION['MANAGER'])
{
    session_destroy();
    $url = './login_user_form.php';
    header('Location: ' . $url, true, 301);
    exit;
}
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
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">
                            <h1 class="title is-3">
                                ログイン
                            </h1>
                            <form action="login_user.php" method="POST">
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
                            <p>ログインできるユーザは<a href="login_manager_form.php">ここ</a>から確認できます</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>