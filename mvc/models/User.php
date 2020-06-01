<?php

class user
{
       private $id;
    private $email;
    private $name;
    private $password;
    private $token;

 public function __construct(
        $email,
        $password,
        $name,
        $token
    ) {
        $this->email      = $email;
        $this->name    = $name;
        $this->password = $password;
        $this ->token = $token;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

      public function getPassword() {
        return $this->password;
    }

    public function getToken() {
        return $this->token;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setName($name) {
        $this->name = $name;
    }

  public function setPassword($password) {
        $this->password = $password;
    }
     public function setToken($token) {
        $this->token = $token;
    }


}

