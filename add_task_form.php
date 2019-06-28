<?php

require_once('env.php');
require_once('head.php');

?>

<html>
    <head>
        <?php CreateHead('タスク追加'); ?>
    </head>
    <body>
        <?php require_once('header.php') ?>
        <h1>タスク追加</h1>
        <form action="add_task.php" method="POST">
            <div>タイトル<input type="text" name="title"></div>
            <div>進捗<input type="text" name="progress"></div>
            <div>優先度<input type="text" name="priority"></div>
            <div><input type="date" name="deadline"></div>
            <div>担当者
                <select name="user_id">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'select * from user where user_type="GUEST"';
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    print('<option value="' . $row['id'] . '">' . $row['name'] . '</option>');
}
$conn->close();
?>
                </select>
            </div>
            <div>ステータス
                <select name="status_id">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'select * from status';
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    print('<option value="' . $row['id'] . '">' . $row['name'] . '</option>');
}
$conn->close();
?>
                </select>
            </div>
            <div>詳細<textarea  name="detail"></textarea></div>
            <div><input type="submit" name="追加"></div>
        </form>
    </body>
</html>