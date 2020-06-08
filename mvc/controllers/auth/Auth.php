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

    protected function needPremium()
    {
        @session_start();
        if(!isset($_SESSION['user_type']))
        {
            error(403, 'Forbidden');
            exit;
        }

        if($_SESSION['user_type'] != 'premium')
        {
            error(403, 'Forbidden', 'You\'re not premium, please uptade your account');
            exit;   
        }
    }
}