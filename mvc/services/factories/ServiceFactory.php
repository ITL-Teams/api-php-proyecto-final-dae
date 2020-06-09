<?php

require_once 'services/implementation/RegexService.php';

class ServiceFactory
{
	public function __invoke($service)
	{
		$service_type = $service->getType();
		if($service_type == 'regex')
		{
			return new RegexService(
				$service->getId(),
				$service->getServiceName(),
				$service->getDescription(),
				$service->getCode()
			);
		}
	}
}