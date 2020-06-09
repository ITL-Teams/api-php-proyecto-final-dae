<?php

require_once 'service-decorator.php';

class PublicService extends ServiceDecorator
{
    public function __construct($service)
    {
        parent::__construct($service);
    }

    public function executeService($input) {
        return $this->getService()->executeService($input);
    }
}