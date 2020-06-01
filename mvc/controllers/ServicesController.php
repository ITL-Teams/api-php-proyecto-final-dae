<?php

require_once 'auth/Auth.php';

class ServicesController extends Auth
{
	public function __construct()
    {
        $this->needLogin();
    }
    
	public function show()
	{
		$services = [];
		require_once 'views/services/services.php';
	}
}