<?php

// Controller dependencies
require_once 'controllers/MainPageController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/CreateServiceController.php';
require_once 'controllers/TestServiceController.php';
require_once 'controllers/SharedServiceController.php';

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

    case '/user/home':
        $controller = new HomeController;
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

    case '/user/services/create':
        $controller = new CreateServiceController;
        $controller->show();
    break;

    case '/user/services/create/register':
        $controller = new CreateServiceController;
        $controller->createService(
            form('type'),
            form('privacy'),
            form('name'),
            form('description'),
            form('code')
        );
    break;

    case '/user/services/create/shared':
        $controller = new SharedServiceController;
        $controller->show();
    break;

    case '/user/services/test':
        $controller = new TestServiceController;
        $controller->show();
    break;

    default:
        error(404, "Not Found");
}

function form($key) {
    if(!isset($_REQUEST[$key]))
        return null;
    return $_REQUEST[$key];
}

function error($code, $message, $description='')
{
    http_response_code($code);
    require_once 'views/error.php';
}