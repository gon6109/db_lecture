<?php

require_once('env.php');

?>

<html>
    <head>
        <title>タスク追加</title>
    </head>
    <body>
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
$sql = 'select * from user';
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
            <div><input type="submit" name="追加"></div>
        </form>
    </body>
</html>