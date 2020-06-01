<?php

require_once 'models/db/dao/ServiceDAO.php';
require_once 'services/implementation/RegexService.php';

class TestServiceController
{
    private $serviceDao;

    public function __construct()
    {
        $this->serviceDao = new ServiceDAO;
    }

	public function show($service_name)
	{
		if(empty($service_name))
		{
             $this->badRequest('You must provide a valid service name');
		}

        $service = $this->serviceDao->findByName("example@example.com", $service_name);

		require_once 'views/services/test-service.php';
	}

	public function execute($service_name)
	{
		@session_start();
		try
		{
			if(!isset($_SESSION['user_email']))
				throw new Exception();
				
            $service = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);
		}
		catch(Exception $exception)
        {
        	error(403, "Forbidden");
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

    private function badRequest($description)
    {
        $redirect_message = "<strong>Try Again. </strong>You'll be redirected in 5 seconds";
        error(400, 'Bad Request',"$description<br>$redirect_message");
        header('refresh:5; url=../services');
        exit;
    }
}