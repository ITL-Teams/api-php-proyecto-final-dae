<?php

require_once 'models/db/dao/ContactDAO.php';

class ContactController
{
	private $contactDao;

	public function __construct()
	{
		$this->contactDao = new ContactDAO;
	}

	public function show()
	{
		require_once 'views/contact/contact.php';
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