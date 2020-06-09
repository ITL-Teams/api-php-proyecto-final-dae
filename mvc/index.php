<?php

// Controller dependencies
require_once 'controllers/MainPageController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/CreateServiceController.php';
require_once 'controllers/EditServiceController.php';
require_once 'controllers/TestServiceController.php';
require_once 'controllers/SharedServiceController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/RegisterController.php';
require_once 'controllers/ServicesController.php';
require_once 'controllers/DocumentationController.php';
require_once 'controllers/AccountController.php';
require_once 'controllers/ApiController.php';

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

	 case '/login':
        $controller = new LoginController;
        $controller->show();
    break;

    case '/logout':
        $controller = new LoginController;
        $controller->logout();
    break;
	
	case '/login/authenticate':
        $controller = new LoginController;
        $controller->authUsser(
            form('email'),
            form('password')
        );
    break;

 case '/create-account':
        $controller = new RegisterController;
        $controller->show();
    break;

 case '/create-account/register':
        $controller = new RegisterController;
        $controller->registerUser(
                form ('email'),
                form ('password'),
                form ('name')
            );
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

    case '/user/services/delete':
        $controller = new CreateServiceController;
        $controller->deleteService(form('service'));
    break;

    case '/user/services/create/shared':
        $controller = new SharedServiceController;
        $controller->show(form('service'));
    break;

    case '/user/services/create/shared/create':
        $controller = new SharedServiceController;
        $controller->add(
            form('service'),
            form('email')
        );
    break;

    case '/user/services/create/shared/delete':
        $controller = new SharedServiceController;
        $controller->delete(
            form('service'),
            form('email')
        );
    break;

    case '/user/services/edit':
        $controller = new EditServiceController;
        $controller->show(form('service'));
    break;

    case '/user/services/edit/register':
        $controller = new EditServiceController;
        $controller->updateService(
            form('id'),
            form('type'),
            form('privacy'),
            form('name'),
            form('description'),
            form('code')
        );
    break;

    case '/user/services/test':
        $controller = new TestServiceController;
        $controller->show(form('service'));
    break;

    case '/user/services/test/execute':
        $controller = new TestServiceController;
        $controller->execute(form('service'), form('input'));
    break;

    case '/documentation/regex':
        $controller = new DocumentationController;
        $controller->show();
    break;

    case '/user/services':
        $controller = new ServicesController;
        $controller->show();
    break;

    case '/user/account':
        $controller = new AccountController;
        $controller->show();
    break;

    case '/api/execute':
        $controller = new ApiController;
        $input = file_get_contents('php://input');
        $controller->__invoke($input);
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
    exit;
}