<?php

require_once 'models/Contact.php';

class ContactController
{
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
		$comment->create();
		
		require_once 'views/contact/comment-sent.php';
	}
}