<?php

require_once('env.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'update task set title="' . $_POST['title'] . '",deadline="' . $_POST['deadline'] 
    .'", priority='. $_POST['priority'] .', progress=' . $_POST['progress'] 
    .',user_id=' . $_POST['user_id'] . ',status_id=' . $_POST['status_id'] . ',detail="' . $_POST['detail']. '" where id='. $_POST['task_id'] . ';';

console_log($_POST['detail']);

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