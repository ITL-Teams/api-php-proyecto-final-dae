<?php

require_once 'services/PublicService.php';
require_once 'services/PrivateService.php';
require_once 'services/SharedService.php';

class PrivacyFactory
{
	public function __invoke($service, $executableService, $access_key)
	{
		$service_privacy = $service->getPrivacy();

		if($service_privacy == 'public')
			return new PublicService($executableService);

		if($service_privacy == 'private')
		{
			$private_service = new PrivateService($executableService);
			$private_service->setAccessKey($access_key);
			return $private_service;
		}

		if($service_privacy == 'shared')
		{
			$shared_service = new SharedService($executableService);
			$shared_service->setAccessKey($access_key);
			return $shared_service;
		}
	}
}