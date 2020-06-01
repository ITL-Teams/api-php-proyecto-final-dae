<?php
require_once 'models/db/dao/UserDAO.php';

class RegisterController
{
	private $userDao;
	public function __construct()
	{
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

  $token = "aaa"; 

   $user= new User(
   	$mail,
   	$password,
   	$name,
    $token

   );
   $this->userDao->create($user);
   require_once 'views/contact/comment-sent.php';
}
}
