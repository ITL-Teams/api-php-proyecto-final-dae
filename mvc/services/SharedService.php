<?php

require_once 'service-decorator.php';
require_once 'models/db/dao/ServiceDAO.php';
require_once 'models/db/dao/UserDAO.php';

class SharedService extends ServiceDecorator
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

    	if($this->isOwner($owner_info))
    		return $executableService->executeService($input);

    	if(!$this->isInWhiteList($service))
    		throw new UnexecutableService("Keys don't match", 403);

        return $executableService->executeService($input);
    }

    private function isOwner($owner_info)
    {
    	return $owner_info->getToken() == $this->getAccessKey();
    }

    private function isInWhiteList($service_info)
    {
    	$shared_users = $this->serviceDao->findAllShared($service_info);
    	$access_key   = $this->getAccessKey();

    	foreach ($shared_users as $shared_user) 
    	{
    		if($shared_user->getToken() == $access_key)
    			return true;
    	}

    	return false;
    }
}