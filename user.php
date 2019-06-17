<?php

require_once('env.php');

function GetUserName($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from user where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['name'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetEmail($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from user where  id = ' . $id;
    $res = $conn->query($sql);
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['mail_address'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetUserType($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from user where  id = ' . $id;
    $res = $conn->query($sql);
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['user_type'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}