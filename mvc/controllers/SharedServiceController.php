<?php

require_once 'auth/Auth.php';

class SharedServiceController extends Auth
{
    public function __construct()
    {
        $this->needLogin();
    }

	public function show()
	{
		require_once 'views/services/shared-service.php';
	}
}