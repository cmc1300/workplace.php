<?php
/*
 *  http://api.netcube.com.au/projects/netcube/echosign/getDocumentStatusUsingEmersionID.php?emersionId=1354398
 * */
require_once '../../includes/class/MysqliDb.php';

$output_array 				= array();
$output_array['status']		= "none";

if ( isset($_REQUEST['emersionId']) && !empty($_REQUEST['emersionId']) ) {
	$emersionId 			= trim($_REQUEST['emersionId']);
}
else {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get the mandatory parameter emersionId";
	echo json_encode($output_array);
	die;
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


$netcubehub_db						-> where("emersionId", $emersionId);
$web_due_diligence_info_Array		= $netcubehub_db -> get("web_due_diligence_info");
if ($web_due_diligence_info_Array 	== NULL) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "$emersionId not found in table nc_customerInfo";
	echo json_encode($output_array);
	die;
}
else {
	$order_number	= $web_due_diligence_info_Array[0]['orderNumber'];
	$source		 	= $web_due_diligence_info_Array[0]['source'];
	$document_key 	= $web_due_diligence_info_Array[0]['documentKey'];
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


$json					= "";
$array_info				= "";
$status					= "";
$array_result			= "NOK";
$table_name				= "web_due_diligence_info";
$file_exists			= false;
if (true) {
		$result 		= $api->getDocumentInfo($document_key);
		$status 		= $result->documentInfo->status;
		echo "<pre>"; var_dump($status); echo "</pre>"; die;
}

?>