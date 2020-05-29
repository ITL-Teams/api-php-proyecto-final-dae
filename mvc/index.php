<?php

// Controller dependencies
require_once 'controllers/MainPage.php';

// Route dispatcher
if(isset($_SERVER['PATH_INFO']))
	$url = $_SERVER['PATH_INFO'];
else
	$url = '/';

switch ($url)
{
	case '/':
		$controller = new Controller\MainPage;
		$controller->show();
	break;

	default:
		http_response_code(404);
		echo "404 NOT FOUND";
}
