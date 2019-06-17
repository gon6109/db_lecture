<?php

require_once('env.php');

session_start();

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $url = './index.php';
    header('Location: ' . $url, true, 400);
    exit;
}

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from user where user_type = "MANAGER" and mail_address = "' . $_POST['email'] . '"';
    $res = $conn->query($sql);
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

if (!isset($res['email'])) {
    $url = './login_manager_form.php';
    header('Location: ' . $url, true, 401);
    exit;
}

if (password_verify($_POST['password'], $res['password'])) {
    session_regenerate_id(true); 
    $_SESSION['ID'] = $res['id'];
    $_SESSION['MANAGER'] = false;
    
    $url = './manager.php';
    header('Location: ' . $url, true, 301);
    exit;

} else {
    $url = './login_manager_form.php';
    header('Location: ' . $url, true, 401);
    exit;
}

?>