<?php

require_once('env.php');

require_once('check_user.php');
CheckUser(false);

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'delete from user where  id = ' . $_POST['id'];
$conn->query($sql);

$conn->close();

$url = './manager.php';
header('Location: ' . $url, true, 301);
exit;
