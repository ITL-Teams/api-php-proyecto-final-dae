<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/ServiceDAO.php';

class ServicesController extends Auth
{
	private $serviceDao;

	public function __construct()
    {
        $this->needLogin();
        $this->serviceDao = new ServiceDAO;
    }
    
	public function show()
	{
		$services = $this->serviceDao->findByUser($_SESSION['user_email']);
		require_once 'views/services/services.php';
	}
}