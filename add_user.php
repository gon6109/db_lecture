<?php

session_start();

function random($length = 8)
{
    return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

require_once('env.php');

$password = random();

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'insert into user(mail_address, name, password, user_type) values("' . $_POST['email'] . '","'. $_POST['name'] .'","'. $password . '", "GUEST")';

if ($conn->query($sql)) {
    $conn->close();
    $url = './complete_add_user.php';
    header('Location: ' . $url, true, 301);
    exit;
} else {
    $conn->close();
    $url = './manager.php';
    header('Location: ' . $url, true, 301);
    exit;
}
