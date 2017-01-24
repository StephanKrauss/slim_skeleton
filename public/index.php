<?php

	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require '../vendor/autoload.php';

	// $logger = new \Monolog\Logger("log");
	// $logger->pushHandler(new \Monolog\Handler\ErrorLogHandler());

	// $logger->addInfo("Something happened");

	$app = new \Slim\App;

	// Container
	$container = $app->getContainer();
	include_once('../src/container.php');

	$app->get('/[{controller}/{action}/]', function (Request $request, Response $response, $params) use($container)
	{
		$templatName = $params['controller'].'.html';

	    $controllerName = $params['controller'].'Controller';
	    $controllerName = ucfirst($controllerName);
	    $controllerName = '\\App\\Controller\\'.$controllerName;

	    $controller = new $controllerName($container);

	    $actionName = $params['action'];
	    $actionName = $actionName.'Action';
	    $result = $controller->$actionName();

		return $this->view->render($response, $templatName, $result);
	});

	$app->map(['POST','PUT','DELETE'], '/[{controller}/{action}/]', function (Request $request, Response $response, $params) use($container){
			$controllerName = $params['controller'].'Controller';
		    $controllerName = ucfirst($controllerName);
		    $controllerName = '\\App\\Controller\\'.$controllerName;

		    $controller = new $controllerName($container);

		    $actionName = $params['action'];
		    $actionName = $actionName.'Action';
		    $result = $controller->$actionName();

			$newResponse = $response->withJson($result);

			return $newResponse;
	});

	$app->run();

