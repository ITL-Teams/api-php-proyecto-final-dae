<?php

require_once 'service-decorator.php';
require_once 'models/db/dao/ServiceDAO.php';
require_once 'models/db/dao/UserDAO.php';

class PrivateService extends ServiceDecorator
{
	private $serviceDao;
	private $userDao;

    public function __construct($service)
    {
        parent::__construct($service);
        $this->userDao    = new UserDAO;
        $this->serviceDao = new ServiceDAO;
    }

    public function executeService($input) {
    	$executableService = $this->getService();
    	$service           = $this->serviceDao->find($executableService->getId());
    	$owner_info        = $this->userDao   ->findEmail($service->getUser());
    	
    	if($owner_info->getToken() != $this->getAccessKey())
    		throw new UnexecutableService("Keys don't match", 403);    		

        return $executableService->executeService($input);
    }
}