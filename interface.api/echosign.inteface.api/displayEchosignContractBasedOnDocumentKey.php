<?php
/*
 *  http://api.netcube.com.au/projects/netcube/echosign/displayEchosignContractBasedOnDocumentKey.php?documentKey=
 *  http://api.netcube.com.au/projects/netcube/echosign/displayEchosignContractBasedOnDocumentKey.php?format=json&documentKey=
 *  
 * */
require_once '../../includes/class/MysqliDb.php';

$documentKey			= "";
$json					= "";
$status					= "";
$pdffilename			= "";
$weblink				= "";
$format					= "";
$output_array 			= array();
$output_array['result']	= "OK";

if ( isset($_REQUEST['documentKey']) && !empty($_REQUEST['documentKey']) ) {
	$documentKey 			= trim($_REQUEST['documentKey']);
}
else {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get the mandatory parameter documentKey";
	echo json_encode($output_array);
	die;
}

if ( isset($_REQUEST['format']) && !empty($_REQUEST['format']) ) {
	$format					= trim(strtolower($_REQUEST['format']));
}


$aapt['action'] 		= "getNetCubeHubDBInfo";
$result_url				= "http://api.netcube.com.au/projects/includes/interface.php";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$result_url );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
$output 				= curl_exec($ch);
$returnArray 			= json_decode($output, true);
$host_ip				= $returnArray['host_ip'];
$db_user_name			= $returnArray['db_user_name'];
$db_user_password		= $returnArray['db_user_password'];
$db_name				= $returnArray['db_name'];
$netcubehub_db 			= new MysqliDb ( $host_ip, $db_user_name, $db_user_password, $db_name );
if ($netcubehub_db == NULL) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "Fail to connect NetCube database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);
	die;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
$api_key = 'XEM38J46E7N5L4G';		//Novatel Telecommunications Pty Ltd

include('./Autoloader.php');
date_default_timezone_set('Australia/Melbourne');

$ESLoader = new SplClassLoader('EchoSign', realpath(__DIR__.'/./lib').'/');
$ESLoader->register();

$client = new SoapClient(EchoSign\API::getWSDL());
$api = new EchoSign\API($client, $api_key);


try {
	$result 		= $api->getDocumentInfo($documentKey);
	$status 		= $result->documentInfo->status;
			 
	$options 		= new EchoSign\Options\GetDocumentsOptions;
	$result 		= $api->getDocuments($documentKey, $options);
	
	if ($format == "json") {
		$output_array['documentKey']	= $documentKey;
		$output_array['documentStatus']	= $status;
		echo json_encode($output_array);	die;
	}
	/*	*/
	echo "documentKey: $documentKey<br>";
	echo "documentStatus: $status<br>";
	//echo "<pre>"; var_dump($result); echo "</pre>";  //die;
	
	$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/" . $documentKey . ".pdf";
	$weblink		= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/". $documentKey . ".pdf";
	file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
	echo "<a href='" . $weblink . " ' target='_blank'>" . $weblink . "</a>";
}
catch(Exception $e){
	$output_array['info'] 	= "error due to " . $e->getMessage();
	$json					= json_encode($output_array);
}


?>