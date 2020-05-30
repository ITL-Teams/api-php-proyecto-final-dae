<?php

require_once 'service.php';

abstract class ServiceDecorator implements Service
{
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    protected function getService()
    {
        return $this->service;
    }
}