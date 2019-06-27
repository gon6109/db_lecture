<html>
    <head>
        <title>ログイン</title>
    </head>
    <body>
        <h1>ログイン</h1>
        <form action="login_user.php" method="POST">
            <div>メールアドレス<input type="text" name="email"></div>
            <div>パスワード<input type="password" name="pass"></div>
            <div><input type="submit" name="Login"></div>
        </form>
        <p>ログインできるユーザは<a href="login_manager_form.php">ここ</a>から確認できます</p>
    </body>
</html>