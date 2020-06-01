<?php

require_once 'models/db/dao/ServiceDAO.php';

class CreateServiceController
{
    private $serviceDao;

    public function __construct()
    {
        $this->serviceDao = new ServiceDAO;
    }

    public function show()
    {
        require_once 'views/services/create-service.php';
    }

    public function createService(
        $service_type,
        $service_privacy,
        $service_name,
        $service_description,
        $service_code
    )
    {
        if(empty($service_type)        ||
           empty($service_privacy)     ||
           empty($service_name)        ||
           empty($service_description) ||
           empty($service_code)
        )
        {
            $this->badRequest('All fields must be completed');
        }

        if(!preg_match('/^[A-Za-z]+[A-Za-z0-9]*$/', $service_name))
        {
            $this->badRequest('Service name can only contain letters and numbers');
        }

        if(!$this->validServicePrivacy($service_privacy))
        {
            $this->badRequest('Not valid privacy');   
        }

        if(!$this->validService($service_type))
        {
            $this->badRequest('That service doesn\'t exist');   
        }

        $service = new Service(
            $service_type,
            $service_privacy,
            $service_name,
            $service_description,
            $service_code
        );

        $this->serviceDao->create($service);
    }

    private function badRequest($description)
    {
        $redirect_message = "<strong>Try Again. </strong>You'll be redirected in 5 seconds";
        error(400, 'Bad Request',"$description<br>$redirect_message");
        header('refresh:5; url=../create');
        exit;
    }

    private function validServicePrivacy($service_privacy)
    {
        $privacy = [
            "public",
            "private",
            "shared"
        ];

        return in_array($service_privacy, $privacy);
    }

    private function validService($service_type)
    {
        $services = [
            "regex"
        ];

        return in_array($service_type, $services);
    }
}