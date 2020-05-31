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
            error(400, 'Bad Request');
            return;
        }

        $service = new Service(
            $service_type,
            $service_privacy,
            $service_name,
            $service_description,
            $service_code
        );

        $this->serviceDao->create($service);

        require_once 'views/contact/comment-sent.php';
    }
}