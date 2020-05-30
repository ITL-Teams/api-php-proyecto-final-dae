<?php

require_once 'service.php';

abstract class AbstractService implements Service
{
    private $id;
    private $service_name;
    private $description;
    private $code;

    public function __construct(
        $id,
        $service_name,
        $description,
        $code
    )
    {
        $this->id           = $id;
        $this->service_name = $service_name;
        $this->code         = $code;
        $this->description  = $description;
    }

    protected function getId() { 
        return $this->id;
    }

    protected function getServiceName() { 
        return $this->service_name;
    }

    protected function getDescription() { 
        return $this->description;
    }

    protected function getCode() { 
        return $this->code;
    }
}