<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/ServiceDAO.php';

class EditServiceController extends Auth
{
    private $serviceDao;

    public function __construct()
    {
        $this->needLogin();
        $this->needPremium();
        $this->serviceDao = new ServiceDAO;
    }

    public function show($service_name)
    {
        try
        {
            $service = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);

            if(!$service)
                throw new Exception("Service not found");
        }
        catch(Exception $exception)
        {
            error(403, "Forbidden", $exception->getMessage());
            exit;
        }

        require_once 'views/services/edit-service.php';
    }

    public function updateService(
        $service_id,
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
           empty($service_code)        ||
           empty($service_id)
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

        try
        {
            $service = new Service(
                $service_type,
                $service_privacy,
                $service_name,
                $service_description,
                $service_code,
                $_SESSION['user_email']
            );
            $service->setId($service_id);

            $this->serviceDao->update($service);

            header("Location: $GLOBALS[path]/user/services");

        }catch(ExistingService $exception)
        {
            $this->badRequest('You already have this service name registered');
        }
    }

    private function badRequest($description)
    {
        $redirect_message = "<strong>Try Again. </strong>You'll be redirected in 5 seconds";
        header('refresh:5; url=../create');
        error(400, 'Bad Request',"$description<br>$redirect_message");
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