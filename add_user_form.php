<?php

require_once('env.php');

?>

<html>
    <head>
        <title>ユーザ追加</title>
    </head>
    <body>
        <h1>ユーザ追加</h1>
        <form action="add_user.php" method="POST">
            <div>名前<input type="text" name="name"></div>
            <div>メールアドレス<input type="text" name="email"></div>
            <div><input type="submit" name="追加"></div>
        </form>
    </body>
</html>