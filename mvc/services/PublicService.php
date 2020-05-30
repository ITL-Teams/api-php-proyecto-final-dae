<?php

require_once 'service-decorator.php';

class PublicService extends ServiceDecorator
{
    public function __construct($service)
    {
        parent::__construct($service);
    }

    public function executeService() {
        echo "Este es un servicio publico";
        $this->getService()->executeService();
    }
}