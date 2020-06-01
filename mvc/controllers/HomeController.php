<?php

require_once 'auth/Auth.php';

class HomeController extends Auth
{
	public function __construct()
    {
        $this->needLogin();
    }
    
	public function show()
	{
		require_once 'views/home.php';
	}
}