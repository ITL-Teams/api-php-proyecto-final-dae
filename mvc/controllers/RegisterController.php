<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/UserDAO.php';

class RegisterController extends Auth
{
    private $userDao;
    
    public function __construct()
    {
        $this->afterLogin();
        $this->userDao = new UserDAO;
    }
    
    public function show()
    {
        require_once 'views/layouts/register.php';
    }

    public function registerUser(
        $mail,
        $password,
   	    $name   
    ){
        if (empty($name  )||
    		    empty($mail) ||
    		    empty($password))
        {
	          error(400, 'Bad request');
	          return;
        }

        $token = substr(base64_encode(sha1(mt_rand())), 0, 20);; 

        $user= new User(
   	        $mail,
   	        $password,
   	        $name,
            $token
        );

        $this->userDao->create($user);
        header("Location: $GLOBALS[path]/login");     
    }
}
