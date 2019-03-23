<?php
/*
 *  http://api.netcube.com.au/projects/netcube/echosign/getDocument.php
 * 	http://14.137.150.89/admin2/admin/ecosignGetInfo/getDocuments.php
 * 	http://admin2.netcube.com.au/admin/ecosignGetInfo/getDocuments.php
 * */

//header('Content-Type: text/plain');

error_reporting(E_ALL);
ini_set('display_errors', 1);
//var_dump($_SERVER);die;

/*
 *  Setup variables start
*  Change these before testing
*  http://localhost/Temp/echosign-api-php-master/examples/document/sendDocument.php
*/
$api_key = 'XEM38J46E7N5L4G';		//Novatel Telecommunications Pty Ltd

include('./Autoloader.php');
date_default_timezone_set('Australia/Melbourne');

$ESLoader = new SplClassLoader('EchoSign', realpath(__DIR__.'/./lib').'/');
$ESLoader->register();

$client = new SoapClient(EchoSign\API::getWSDL());
$api = new EchoSign\API($client, $api_key);
/*
 *  Setup variables end
*/

$result = $api->getMyDocuments();
echo json_encode((array)$result->getMyDocumentsResult);

?>