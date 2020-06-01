<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/ServiceDAO.php';
require_once 'services/implementation/RegexService.php';

class TestServiceController extends Auth
{
    private $serviceDao;

    public function __construct()
    {
        $this->needLogin();
        $this->serviceDao = new ServiceDAO;
    }

	public function show($service_name)
	{
        @session_start();

		try
        {
            if(!isset($_SESSION['user_email']))
                throw new Exception("User not logged");
                
            $service = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);

            if(!$service)
                throw new Exception("Service not found");
                
        }
        catch(Exception $exception)
        {
            error(403, "Forbidden", $exception->getMessage());
            exit;
        }

		require_once 'views/services/test-service.php';
	}

	public function execute($service_name)
	{
		@session_start();

		try
		{
			if(!isset($_SESSION['user_email']))
				throw new Exception("User not logged");
				
            $service = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);

            if(!$service)
                throw new Exception("Service not found");
                
		}
		catch(Exception $exception)
        {
        	error(403, "Forbidden", $exception->getMessage());
        	exit;
        }

        $service_executable = new RegexService(
            $service->getId(),
            $service->getServiceName(),
            $service->getDescription(),
            $service->getCode()
        );
        try
        {
            $response = $service_executable->executeService('{"input":"hola"}');
            echo $response;
        }
        catch(UnexecutableService $exception)
        {
            echo "Unexecutable Service";
        }
	}
}