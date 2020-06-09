<?php

require_once 'models/db/dao/ServiceDAO.php';
require_once 'services/factories/ServiceFactory.php';
require_once 'services/factories/PrivacyFactory.php';

class ApiController
{
    private $serviceDao;
    private $serviceFactory;
    private $privacyFactory;

    public function __construct()
    {
        $this->serviceDao     = new ServiceDAO;
        $this->serviceFactory = new ServiceFactory;
        $this->privacyFactory = new PrivacyFactory;
    }

    public function __invoke($input)
    {
        $headers = getallheaders();

        if($_SERVER['REQUEST_METHOD'] != 'POST')
            $this->http_error(405);

        if(empty($input))
            $this->http_error(400);

        if(!$this->isJson($input))
            $this->http_error(400);

        $request = json_decode($input);
        $service = $this->getService($request);

        if( $service->getPrivacy() != 'public' &&
           !$this->hasAuthKey($headers))
            $this->http_error(403);

        $executableService = $this->serviceFactory->__invoke($service);
        $executableService = $this->privacyFactory->__invoke($service, $executableService);

        try
        {
            $response = $executableService->executeService($input);
        }
        catch(UnexecutableService $exception)
        {
            $this->http_error(400);
        }

        header('Content-type: application/json; charset=UTF-8');
        echo $response;
    }

    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private function getService($request)
    {
        if(!isset($request->service))
            $this->http_error(400);

        $service = $this->serviceDao->findByService($request->service);

        if($service == null)
            $this->http_error(404);

        return $service;
    }

    private function hasAuthKey($headers)
    {
        if(!isset($headers['Authorization']))
            return false;
        return true;
    }

    private function http_error($code)
    {
        http_response_code($code);
        exit;
    }
}