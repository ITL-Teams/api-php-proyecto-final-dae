<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/ServiceDAO.php';
require_once 'models/db/dao/UserDAO.php';


class SharedServiceController extends Auth
{
    private $serviceDao;
    private $userDao;

    public function __construct()
    {
        $this->needLogin();
        $this->needPremium();
        $this->serviceDao = new ServiceDAO;
        $this->userDao = new UserDAO;
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

		$shared_profiles = [];

		if($service->getReference() != null)
		{
			$shared_references = $this->serviceDao->findAllShared($service);
			$shared_profiles   = $this->convertIntoUsers($shared_references); 
		}
		
		require_once 'views/services/shared-service.php';
	}

	public function add($service_name, $shared_email)
	{
		if(empty($service_name))
			error(400, 'Bad Request', 'Service name is required');

		if(empty($shared_email))
			error(400, 'Bad Request', 'You must provide an email in order to share your service');

		if($shared_email == $_SESSION['user_email'])
			error(400, 'Bad Request', 'You don\'t need to share your service with yourself');

		try
		{
            $service          = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);
            $shared_user_info = $this->userDao   ->findEmail($shared_email);

            if(empty($service))
            	throw new Exception("Not service found");

            if(empty($shared_user_info))
            	throw new Exception("That user doesn't exist");
		}
		catch(Exception $exception)
		{
            error(403, 'Forbidden',$exception->getMessage());
		}

		if($service->getReference() == null)
		{
			$service->setReference(substr(base64_encode(sha1(mt_rand())), 0, 40));
			$this->serviceDao->update($service); 
		}

		$sharedProfile = new SharedUser(
			$service         ->getReference(),
			$shared_user_info->getToken()
		);

		$this->serviceDao->addSharedUser($sharedProfile);

		header("Location: $GLOBALS[path]/user/services/create/shared?service=$service_name");
	}

	public function delete($service_name, $user_email)
	{
		if(empty($service_name))
			error(400, 'Bad Request', 'Service name is required');

		if(empty($user_email))
			error(400, 'Bad Request', 'You must provide an email');

		$service   = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);
        $user_info = $this->userDao   ->findEmail($user_email);

        $sharedProfile = new SharedUser(
        	$service  ->getReference(),
        	$user_info->getToken()
        );

        $this->serviceDao->deleteSharedUser($sharedProfile);
		header("Location: $GLOBALS[path]/user/services/create/shared?service=$service_name");
	}

	private function convertIntoUsers($shared_references)
	{
		$users = [];
		foreach ($shared_references as $shared_reference) 
		{
			$user = $this->userDao->findByToken($shared_reference->getToken());
			array_push($users, $user);
		}

		return $users;
	}
}