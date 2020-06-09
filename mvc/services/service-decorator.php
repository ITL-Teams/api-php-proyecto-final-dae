<?php

require_once 'service.php';

abstract class ServiceDecorator implements Services\Service
{
    private $service;
    private $access_key;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function setAccessKey($access_key)
    {
    	$this->access_key = $access_key;
    }

    public function getAccessKey()
    {
        return $this->access_key;
    }

    protected function getService()
    {
        return $this->service;
    }
}