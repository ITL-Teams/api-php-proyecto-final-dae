<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/ServiceDAO.php';

class SharedServiceController extends Auth
{
    private $serviceDao;

    public function __construct()
    {
        $this->needLogin();
        $this->serviceDao = new ServiceDAO;
    }

	public function show($service_name)
	{
		if(empty($service_name))
			error(400, 'Bad Request', 'Service name is required');

		try
		{
            $service = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);

            if(empty($service))
            	throw new Exception("Not service found");
		}
		catch(Exception $exception)
		{
            error(403, 'Forbidden',$exception->getMessage());
		}
		
		require_once 'views/services/shared-service.php';
	}
}