<?php
/*
 *  http://api.netcube.com.au/projects/netcube/echosign/downloadEchosignContractBasedOnEmersion.php?emersionId=1354398
 *  
 *  http://api.netcube.com.au/projects/netcube/echosign/downloadEchosignContractBasedOnEmersion.php?emersionId=1427958
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
	$documentKeySync= $web_due_diligence_info_Array[0]['documentKeySync'];
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
$array_info2			= "";
$status					= "";
$array_result			= "NOK";
$table_name				= "web_due_diligence_info";
$file_exists			= false;
if (true) {
	try {
		$result 		= $api->getDocumentInfo($document_key);
		$status 		= $result->documentInfo->status;
		/*	*/
		echo "source: $source<br>";
		echo "documentKey: $document_key<br>";
		echo "documentKeyStatus: $status<br>";
		echo "documentKeySync: $documentKeySync<br>";
		//var_dump($status); die;
				 
		if ($source == "web_onlineOrderInfo" && ($status == "OUT_FOR_APPROVAL" || $status == "OUT_FOR_SIGNATURE") && !is_null($documentKeySync) && !empty($documentKeySync))	{
			$result 		= $api->getDocumentInfo($documentKeySync);
			$statusSync		= $result->documentInfo->status;
			echo "documentKeySyncStatus: $statusSync<br>";
			if (($statusSync == "APPROVED" || $statusSync == "SIGNED"))	{
				$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$statusSync/" . $order_number . ".pdf";
				$file_exists	= file_exists($pdffilename);
				if ( $file_exists ) {
					$array_result	= "OK";
					$array_info 	= "$statusSync file $pdffilename has already existing";
				}
				else {
					$options = new EchoSign\Options\GetDocumentsOptions;
					$result = $api->getDocuments($documentKeySync, $options);
					//var_dump($result);
					$errorCode = $result->getDocumentsResult->errorCode;
					if ($errorCode == "OK") {
						$array_result	= "OK";
						$array_info 	= "successfully download $statusSync file $pdffilename";
						file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
					}
					else {
						$array_info 	= "echosign getDocuments result is $errorCode";
					}
				}
			}
			else {
				$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$status/" . $order_number . ".pdf";
				$file_exists	= file_exists($pdffilename);
				if ( $file_exists ) {
					$array_info 	= "$status file $pdffilename has already existing";
				}
				else {
					$options = new EchoSign\Options\GetDocumentsOptions;
					$result = $api->getDocuments($document_key, $options);
					//var_dump($result);
					$errorCode = $result->getDocumentsResult->errorCode;
					if ($errorCode == "OK") {
						$array_info 	= "successfully download $status file $pdffilename";
						file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
					}
					else {
						$array_info 	= "echosign getDocuments result is $errorCode";
					}
				}
				if ($status != $statusSync) {
					$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$statusSync/" . $order_number . ".pdf";
					$file_exists	= file_exists($pdffilename);
					if ( $file_exists ) {
						$array_info2 	= "$statusSync file $pdffilename has already existing";
					}
					else {
						$options = new EchoSign\Options\GetDocumentsOptions;
						$result = $api->getDocuments($documentKeySync, $options);
						//var_dump($result);
						$errorCode = $result->getDocumentsResult->errorCode;
						if ($errorCode == "OK") {
							$array_info2 	= "successfully download $statusSync file $pdffilename";
							file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
						}
						else {
							$array_info2 	= "echosign getDocuments result is $errorCode";
						}
					}
				}
			}
		}
		else if ($source != "emersion" && ($status == "APPROVED" || $status == "SIGNED"))	{
			$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$status/" . $order_number . ".pdf";
			$file_exists	= file_exists($pdffilename);
			if ( $file_exists ) {
				$array_result	= "OK";
				$array_info 	= "$status file $pdffilename has already existing";
			}
			else {
				$options = new EchoSign\Options\GetDocumentsOptions;
				$result = $api->getDocuments($document_key, $options);
				//var_dump($result);
				$errorCode = $result->getDocumentsResult->errorCode;
				if ($errorCode == "OK") {
					$array_result	= "OK";
					$array_info 	= "successfully download $status file $pdffilename";
					file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
				}
				else {
					$array_info 	= "echosign getDocuments result is $errorCode";
				}
			}
		}
		else if ($source == "emersion" && ($status == "APPROVED" || $status == "SIGNED"))	{
			$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$status/" . $order_number . ".pdf";
			$file_exists	= file_exists($pdffilename);
			if ( $file_exists ) {
				$array_result	= "OK";
				$array_info 	= "$status file $pdffilename has already existing";
			}
			else {
				$options = new EchoSign\Options\GetDocumentsOptions;
				$result = $api->getDocuments($document_key, $options);
				//var_dump($result);
				$errorCode = $result->getDocumentsResult->errorCode;
				if ($errorCode == "OK") {
					$array_result	= "OK";
					$array_info 	= "successfully download $status file $pdffilename";
					file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
				}
				else {
					$array_info 	= "echosign getDocuments result is $errorCode";
				}
			}
		}
		else if ($source != "emersion" && ($status == "OUT_FOR_APPROVAL" || $status == "OUT_FOR_SIGNATURE"))	{
			$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$status/" . $order_number . ".pdf";
			$file_exists	= file_exists($pdffilename);
			if ( $file_exists ) {
				$array_info 	= "$status file $pdffilename has already existing";
			}
			else {
				$options = new EchoSign\Options\GetDocumentsOptions;
				$result = $api->getDocuments($document_key, $options);
				//var_dump($result);
				$errorCode = $result->getDocumentsResult->errorCode;
				if ($errorCode == "OK") {
					$array_info 	= "successfully download $status file $pdffilename";
					file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
				}
				else {
					$array_info 	= "echosign getDocuments result is $errorCode";
				}
			}
		}
		else if ($source == "emersion" && ($status == "OUT_FOR_APPROVAL" || $status == "OUT_FOR_SIGNATURE"))	{
				
			$array_info 			= "echosign status is $status";
		}
		else {
			$array_info 			= "source is $source and echosign status is $status";
		}
		
		unset($output_array['status']);
		$output_array['emersion']	= $emersionId;
		$output_array['result']		= $array_result;
		$output_array['status']		= $status;
		$output_array['info'] 		= $array_info;
		if (!empty($array_info2)) {
			$output_array['info2'] 		= $array_info2;
		}
		$json						= json_encode($output_array);
	}
	catch(Exception $e){
		$output_array['result']	= $array_result;
		$output_array['info'] 	= "error due to " . $e->getMessage();
		$json					= json_encode($output_array);
	}
	
	$web_due_diligence_table = Array (
			"documentStatus" 	=> $status,
			"processStatus" 	=> $array_result,
			"processInfoJson"	=> $json
	);
	$netcubehub_db			-> where("emersionId", $emersionId);
	$netcubehub_db			-> update($table_name, $web_due_diligence_table );
	echo "<h2 id='result' name='result'>" . $json . "</h2>";
}

?>