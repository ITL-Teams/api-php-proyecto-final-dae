<?php

require_once 'service-decorator.php';

class SharedService extends ServiceDecorator
{
    public function __construct($service)
    {
        parent::__construct($service);
    }

    public function executeService($input) {
        $this->getService()->executeService($input);
    }
}