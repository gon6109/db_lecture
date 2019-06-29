<?php

require_once('env.php');

function CheckUser($isManager)
{
    session_start();
    
    if (!array_key_exists('ID', $_SESSION))
    {
        console_log('a');
        session_destroy();
        $url = '.';
        header('Location: ' . $url, true, 301);
        exit;
    }
    else if ($_SESSION['MANAGER'] != $isManager)
    {
        if ($isManager)
        {
            console_log('b');
            session_destroy();
            $url = './login_manager_form.php';
            header('Location: ' . $url, true, 301);
            exit;
        }
        else 
        {
            console_log('c');
            session_destroy();
            $url = './login_user_form.php';
            header('Location: ' . $url, true, 301);
            exit;
        }
    }
}