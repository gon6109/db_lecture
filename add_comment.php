<?php

require_once('check_user.php');
CheckUser(false);

require_once('env.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'insert into comment(comment,task_id,user_id) values("' . $_POST['comment'] . '",'. $_POST['task_id'] .','. $_SESSION['ID'] . ");";

alert_log($_POST);

if ($conn->query($sql))
{
    $conn->close();
    $url = './detail_task.php?id='. $_POST['task_id'];
    header('Location: ' . $url, true, 301);
    exit;
}
else
{
    $conn->close();
    $url = './detail_task.php?id='. $_POST['task_id'];
    header('Location: ' . $url, true, 301);
    exit;
}