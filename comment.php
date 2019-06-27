<?php

require_once('env.php');

function GetCommentIds($task_id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from comment where task_id = ' . $task_id;
    if ($res = $conn->query($sql)) {
        $result = [];
        while ($temp = $res->fetch_assoc()['id']) {
            $result[] = $temp;
            console_log($result);
        }
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetComment($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from comment where id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['comment'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetCommentCreateDate($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from comment where id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['create_date'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}

function GetCommentUserId($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from comment where id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['user_id'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}