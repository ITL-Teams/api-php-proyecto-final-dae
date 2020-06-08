<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/UserDAO.php';

class AccountController extends Auth
{
    private $userDao;

    public function __construct()
    {
        $this->needLogin();
        $this->userDao = new UserDAO;
    }

    public function show()
    {
        @session_start();
        $user_info = $this->userDao->findEmail($_SESSION['user_email']);
        require_once 'views/account.php';
    }

    public function saveComment($email, $comment)
    {
        if(empty($email) || 
           empty ($comment))
        {
            error(400, 'Bad Request');
            return;
        }

        $comment = new Contact($email, $comment);
        $this->contactDao->create($comment);

        require_once 'views/contact/comment-sent.php';
    }
}