<?php
require 'Slim/Slim.php';
require 'connect/Connect.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


$app->post('/register', function () use ($app) {
	$response = array();
	
	$tag=$app->request->post('tag');
	$device = $app->request->post('deviceID');
	$code = $app->request->post('code');
	
	$db=new DbConnect();
	
	//$link=$db->connect();
	$result=$db->createUser($device, $tag, $code);
	
	$response["message"]="$result";
	echoRespnse(200, $response);
	
});

function echoRespnse($status_code, $response) {
		$app = \Slim\Slim::getInstance();
		// Http response code
		$app->status($status_code);
	
		// setting response content type to json
		$app->contentType('application/json');
	
		echo json_encode($response);
	}

	$app->run();
?>