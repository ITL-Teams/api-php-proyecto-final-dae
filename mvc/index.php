<?php

// Controller dependencies
require_once 'controllers/MainPageController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/CreateServiceController.php';

// Route dispatcher
if(isset($_SERVER['PATH_INFO']))
	$url = $_SERVER['PATH_INFO'];
else
	$url = '/';

switch ($url)
{
    case '/':
        $controller = new MainPageController;
        $controller->show();
    break;

    case '/contact':
        $controller = new ContactController;
        $controller->show();
    break;

    case '/send-comment':
        $controller = new ContactController;
        $controller->saveComment(
            form('email'),
            form('comment')
        );
    break;

    case '/user/services/create/register':
        $controller = new CreateServiceController;
        $controller->createService(
            //form('service_type'),
            //form('service_privacy'),
            //form('service_name'),
            //form('service_description'),
            //form('service_code'),
            'regex',
            'public',
            'primer regex',
            'numeros binarios',
            '^(10)+$'
        );
    break;

    default:
        error(404, "Not Found");
}

function form($key) {
    if(!isset($_REQUEST[$key]))
        return null;
    return $_REQUEST[$key];
}

function error($code, $message)
{
    http_response_code($code);
    require_once 'views/error.php';
}