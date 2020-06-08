<?php

class SharedUser
{
    private $reference;
    private $token;

    public function __construct(
        $reference,
        $token
	)
	{
        $this->reference = $reference;
        $this->token     = $token;
    }

    public function getReference()
    {
    	return $this->reference;
    }

    public function getToken()
    {
    	return $this->token;
    }

    public function setReference($reference)
    {
    	$this->reference = $reference;
    }

    public function setToken($token)
    {
    	$this->token = $token;
    }
}