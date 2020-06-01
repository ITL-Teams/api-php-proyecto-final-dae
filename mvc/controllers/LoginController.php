<?php
require_once 'models/db/dao/UserDAO.php';
class LoginController
{
  private $userDao;
  public function __construct()
  {
    $this->userDao = new UserDAO;
  }
	public function show(){
    require_once 'views/layouts/login.php';

  }

  public function authUsser(
          $email,
          $password)
        {
          if (empty($email )||
               empty($password) ){

            error(400, 'Bad request');
  return;

          }
 $user=$this->userDao->findEmail($email);
if (empty($user)){
  error (500, "usario no encontrado");

}else if ($password==$user->getPassword()){
  $_SESSION['user_email']=$user->getEmail();
  require_once "views/home.php";

}
  else {
    error (501, "usario no encontrado");
  } 


        } 
}
