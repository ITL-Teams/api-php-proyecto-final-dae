<?php

class Service
{
    private $id;
    private $type;
    private $privacy;
    private $service_name;
    private $description;
    private $code;
    private $reference;
    private $user;

    public function __construct(
        $type,
        $privacy,
        $service_name,
        $description,
        $code,
        $user
    ) {
        $this->type         = $type;
        $this->privacy      = $privacy;
        $this->service_name = $service_name;
        $this->description  = $description;
        $this->code         = $code;
        $this->user         = $user;
    }

    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }

    public function getPrivacy() {
        return $this->privacy;
    }

    public function getServiceName() {
        return $this->service_name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCode() {
        return $this->code;
    }

    public function getReference() {
        return $this->reference;
    }

    public function getUser() {
        return $this->user;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setPrivacy($privacy) {
        $this->privacy = $privacy;
    }

    public function setServiceName($service_name) {
        $this->service_name = $service_name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setReference($reference) {
        $this->reference = $reference;
    }

    public function setUser($user) {
        $this->user = $user;
    }
}