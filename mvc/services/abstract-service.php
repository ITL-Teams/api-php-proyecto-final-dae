<?php

require_once 'service.php';
require_once 'services/exceptions/not_a_json.php';
require_once 'services/exceptions/not_input_found.php';
require_once 'services/exceptions/unexecutable_service.php';

abstract class AbstractService implements Services\Service
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

    public function getId() { 
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

    protected function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    protected function decode($string)
    {
        if(!$this->isJson($string))
            throw new NotJsonException();

        return json_decode($string, true);
    }

    protected function encode($string)
    {
        return json_encode($string);
    }
}