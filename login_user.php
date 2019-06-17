<?php

require_once('env.php');

session_start();

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $url = './login_user_form.php';
    header('Location: ' . $url, true, 400);
    exit;
}

try {
    $conn = new mysqli("localhost", "s1811424", "s1811424new", "s1811424");
    $conn->set_charset("utf8");
    $sql = 'select * from user where mail_address = "' . $_POST['email'] . '"';
    if ($temp = $conn->query($sql))
        $res = $temp->fetch_assoc();
    else {
        $url = './login_user_form.php';
        header('Location: ' . $url, true, 401);
        exit;
    }
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

if (!isset($res['mail_address'])) {
    $url = './login_user_form.php';
    header('Location: ' . $url, true, 402);
    exit;
}

if (password_verify($_POST['pass'], crypt($res['pass']))) {
    session_regenerate_id(true);
    $_SESSION['ID'] = $res['id'];
    $_SESSION['MANAGER'] = false;

    $url = './menu.php';
    header('Location: ' . $url, true, 301);
    exit;
} else {
    $url = './login_user_form.php';
    header('Location: ' . $url, true, 403);
    exit;
}
