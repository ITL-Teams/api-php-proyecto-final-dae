<?php

class AuthenticationService
{
	public function __construct() {
		autenticar();
	}
}

function autenticar()
{
	if(!isset($_SESSION['token']))
		header('Location: login');
}