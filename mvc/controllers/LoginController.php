<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/UserDAO.php';

class LoginController extends Auth
{
    private $userDao;
    public function __construct()
    {
        $this->userDao = new UserDAO;
    }

    public function show(){
        $this->afterLogin();
        require_once 'views/layouts/login.php';
    }

    public function logout()
    {
        @session_start();
        unset($_SESSION['user_email']);
        unset($_SESSION['user_type']);
        header("Location: $GLOBALS[path]");
    }

    public function authUsser(
        $email,
        $password)
    {
        $this->afterLogin();
        
        if (empty($email )||
            empty($password) )
        {
            error(400, 'Bad request');
            return;
        }

        $user=$this->userDao->findEmail($email);

        if (empty($user))
        {
            error (401, "Unauthorized", "Not valid credentials");
        }
        else if ($password==$user->getPassword())
        {
            session_start();
            $_SESSION['user_email'] = $user->getEmail();
            $_SESSION['user_type']  = $user->getUserType();
            header("Location: $GLOBALS[path]/user/home");
        }
        else
        {
            error (501, "usario no encontrado");
        } 
    } 
}