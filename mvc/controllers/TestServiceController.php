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

	public function execute($service_name, $input)
	{
		@session_start();

		try
		{
            if(!isset($input))
                throw new Exception("Input is required");
				
            $service = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);

            if(empty($service))
                throw new Exception("Service not found");
                
		}
		catch(Exception $exception)
        {
            $this->unexecutable(403, $exception->getMessage());
        }

        $service_executable = new RegexService(
            $service->getId(),
            $service->getServiceName(),
            $service->getDescription(),
            $service->getCode()
        );
        
        try
        {
            $response = $service_executable->executeService($input);
            $this->response($response);
        }
        catch(UnexecutableService $exception)
        {
            $this->unexecutable(403, $exception->getMessage());
        }
	}

    private function unexecutable($code, $message = '')
    {
        http_response_code($code);
        echo "Unexecutable Service : $message";
        exit;
    }

    private function response($response)
    {
        http_response_code(200);
        echo $response;
    }
}