<?php

class User
{
       private $id;
    private $email;
    private $name;
    private $password;

 public function __construct(
        $email,
        $password,
        $name
    ) {
       
        $this->email      = $email;
        $this->password    = $password;
        $this->name = $name;
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


}

