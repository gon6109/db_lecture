<?php

require_once('env.php');

function GetStatusName($id)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8");
    $sql = 'select * from status where  id = ' . $id;
    if ($res = $conn->query($sql)) {
        $result = $res->fetch_assoc()['name'];
    } else {
        $result = null;
    }
    $conn->close();
    return $result;
}