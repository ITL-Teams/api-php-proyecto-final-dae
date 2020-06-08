<?php

class user
{
    private $id;
    private $email;
    private $name;
    private $password;
    private $token;
    private $user_type;

 public function __construct(
        $email,
        $password,
        $name,
        $token,
        $user_type = 'not-premium'
    ) {
        $this->email     = $email;
        $this->name      = $name;
        $this->password  = $password;
        $this->token     = $token;
        $this->user_type = $user_type;
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

    public function getUserType() {
        return $this->user_type;
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
    
    public function setUserType($user_type) {
        $this->user_type = $user_type;
    }
}

