<?php

require_once('env.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'insert into task(title,deadline,priority,progress,user_id,status_id) values("' . $_POST['title'] . '","'. $_POST['deadline'] .'",'. $_POST['priority'] .','.$_POST['progress'] .','. $_POST['user_id'] .','.$_POST['status_id']. ")";

if ($conn->query($sql))
{
    $conn->close();
    $url = './menu.php';
    header('Location: ' . $url, true, 301);
    exit;
}
else
{
    $conn->close();
    $url = './add_task_form.php';
    header('Location: ' . $url, true, 301);
    exit;
}