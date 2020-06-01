<?php

require_once 'views/layouts/path.php';

class Auth
{
    protected function afterLogin()
    {
        @session_start();
        if(isset($_SESSION['user_email']))
        {
            header("Location: $GLOBALS[path]/user/home");
            exit;
        }
    }

    protected function needLogin()
    {
    	@session_start();
        if(!isset($_SESSION['user_email'])) 
        {
            header("Location: $GLOBALS[path]/login");
            exit;
        }
    }
}