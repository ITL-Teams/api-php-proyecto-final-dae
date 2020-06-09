<?php

require_once 'services/PublicService.php';
require_once 'services/PrivateService.php';
require_once 'services/SharedService.php';

class PrivacyFactory
{
	public function __invoke($service, $executableService)
	{
		$service_privacy = $service->getPrivacy();

		if($service_privacy == 'public')
			return new PublicService($executableService);

		if($service_privacy == 'private')
			return new PrivateService($executableService);

		if($service_privacy == 'shared')
			return new SharedService($executableService);
	}
}