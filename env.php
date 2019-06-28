<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 's1811424');
define('DB_USER', 's1811424');
define('DB_PASS', 's1811424new');

function console_log($data)
{
    echo '<script>';
    echo 'console.log('. json_encode($data) .')';
    echo '</script>';
}

function alert_log($data)
{
    echo '<script>';
    echo 'alert('. $data .')';
    echo '</script>';
}


?>
