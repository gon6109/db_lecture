<?php

require_once('env.php');

session_start();

if ($_POST['pass'] != $_POST['repass'])
{
    $url = './update_user_form.php';
    header('Location: ' . $url, true, 301);
    exit;
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'update user set name ="'. $_POST['name'] . '", mail_address ="'. $_POST['email'] . '", password = "' . $_POST['pass'] . '" where id = ' . $_SESSION['ID'] . ';';
$conn->query($sql);

$conn->close();

$url = './menu.php';
header('Location: ' . $url, true, 301);
exit;
