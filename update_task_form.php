<?php

require_once("user.php");
require_once("task.php");
require_once("status.php");
session_start();

if (!array_key_exists('ID', $_SESSION) || $_SESSION['MANAGER'])
{
    session_abort();
    $url = './login_user_form.php';
    header('Location: ' . $url, true, 301);
    exit;
}

?>

<html>
    <head>
        <title>タスク編集</title>
    </head>
    <body>
        <h1>タスク編集</h1>
        <form action="update_task.php" method="POST">
            <div>タイトル<input type="text" name="title" value="<?php echo GetTitle($_GET['id']);?>"></div>
            <div>進捗<input type="text" name="progress" value="<?php echo GetProgress($_GET['id']);?>"></div>
            <div>優先度<input type="text" name="priority" value="<?php echo GetPriority($_GET['id']);?>"></div>
            <div>締め切り<input type="date" name="deadline" value="<?php echo GetDeadline($_GET['id']);?>"></div>
            <div>担当者
                <select name="user_id">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'select * from user where user_type="GUEST"';
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    print('<option value="' . $row['id'] . '"'. ($row['id'] == GetUserId($_GET['id']) ? 'selected' : '').'>' . $row['name'] . '</option>');
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
    print('<option value="' . $row['id'] . '"'. ($row['id'] == GetStatusId($_GET['id']) ? 'selected' : '').'>' . $row['name'] . '</option>');
}
$conn->close();
?>
                </select>
            </div>
            <div>詳細<textarea name="detail"><?php echo nl2br(GetDetail($_GET['id'])); ?></textarea></div>
            <input type="hidden" name="task_id" value="<?php echo $_GET['id']; ?>">
            <div><input type="submit" name="追加"></div>
        </form>
    </body>
</html>