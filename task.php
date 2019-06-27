<?php

require_once('env.php');

function GetTitle($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['title'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetCreateDate($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['create_date'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetUpdateDate($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['update_date'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetDeadline($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['deadline'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetPriority($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['priority'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetProgress($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['progress'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetUserId($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['user_id'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetStatusId($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['status_id'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetDetail($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from task where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['detail'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}