<?php
/*
 *  http://api.netcube.com.au/projects/netcube/echosign/getDocument_due_diligence.php?syncStatus=unique&order_number=201508211435119006&documentKey=3AAABLblqZhDSwuXTaBJk4YGNC4KYyTpWnX8tm0mvWQ99ktrayJc3JZzbeL8wlrsSBxzqENBAdB-Ij8wM4u8WWgHA28PS1HTf
 * */
$ftp_server 				= "14.137.150.88";
$output_array 				= array();
$output_array['status']		= "none";

if ( isset($_REQUEST['syncStatus']) && !empty($_REQUEST['syncStatus']) ) {
	$syncStatus 			= trim($_REQUEST['syncStatus']);
}
else {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get the mandatory parameter syncStatus";
	echo json_encode($output_array);
	die;
}

if ( isset($_REQUEST['order_number']) && !empty($_REQUEST['order_number']) ) {
	$order_number 			= trim($_REQUEST['order_number']);
}
else {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get the mandatory parameter order_number";
	echo json_encode($output_array);
	die;
}

if ( isset($_REQUEST['documentKey']) && !empty($_REQUEST['documentKey']) ) {
	$document_key 			= trim($_REQUEST['documentKey']);
}
else {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get the mandatory parameter documentKey";
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

if (true) {
	try {
		$array_info		= "";
		$array_result	= "NOK";
		$result 		= $api->getDocumentInfo($document_key);
		$status 		= $result->documentInfo->status;
		/*	
		var_dump($status); die;*/
				 
		if ($syncStatus == "unique" && ($status == "SIGNED" || $status == "APPROVED"))	{
			//	if ($status == "SIGNED" || $status == "APPROVED")	{
			$options = new EchoSign\Options\GetDocumentsOptions;
			 
			$result = $api->getDocuments($document_key, $options);
			//var_dump($result);
			$errorCode = $result->getDocumentsResult->errorCode;
			if ($errorCode == "OK") {
				if ( true ) {
					$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$status/" . $order_number . ".pdf";
					$array_result	= "OK";
					$array_info 	= "successfully download $status file $pdffilename";
					file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
				}
				
				/*
				if ( false && file_exists($pdffilename) ) {
					// connect and login to FTP server
					$ftp_conn = ftp_connect($ftp_server);
					if (!$ftp_conn)	{
						$output_array['result']	= "NOK";
						$output_array['info'] 	= "error when connecting to $ftp_server";
						echo json_encode($output_array);
						die;
					}
					$login = ftp_login($ftp_conn, "centernetcubecom", "MpwGvI7UfPe0");
					$server_file = $order_number . ".pdf";
					$fp = fopen($pdffilename,"r");
						
					if (ftp_fput($ftp_conn, "/public_html/order_form/pdf/". $order_number . ".pdf", $fp, FTP_BINARY))  {
						$array_result	= "OK";
						$array_info 	= "successfully upload file $pdffilename";
					}
					else {
						$array_info 	= "error when uploading file $pdffilename";
					}
						
					// close this connection and file handler
					ftp_close($ftp_conn);
					fclose($fp);
				}*/
			}
		}
		else if ($syncStatus == "unique" && ($status == "OUT_FOR_SIGNATURE" || $status == "OUT_FOR_APPROVAL"))	{
			//	if ($status == "SIGNED" || $status == "APPROVED")	{
			$options = new EchoSign\Options\GetDocumentsOptions;
		
			$result = $api->getDocuments($document_key, $options);
			//var_dump($result);
			$errorCode = $result->getDocumentsResult->errorCode;
			if ($errorCode == "OK") {
				if ( true ) {
					$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$status/" . $order_number . ".pdf";
					$array_info 	= "successfully download $status file $pdffilename";
					file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
				}
			}
		}
		else if ($syncStatus != "unique")	{
			$options = new EchoSign\Options\GetDocumentsOptions;
		
			$result = $api->getDocuments($document_key, $options);
			//var_dump($result);
			$errorCode = $result->getDocumentsResult->errorCode;
			if ($errorCode == "OK") {
				if ( true ) {
					$pdffilename 	= $_SERVER['DOCUMENT_ROOT'] . "/projects/netcube/echosign/due_diligence/$syncStatus/" . $order_number . ".pdf";
					$array_info 	= "successfully download file $pdffilename";
					file_put_contents($pdffilename,$result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX);
				}
			}
		}
		else {
			$array_info 		= "echosign status is $status";
		}
		$output_array['result']	= $array_result;
		$output_array['status']	= $status;
		$output_array['info'] 	= $array_info;
		echo json_encode($output_array);
		die;
	}
	catch(Exception $e){
		$output_array['result']	= "NOK";
		$output_array['info'] 	= "error due to " . $e->getMessage();
		echo json_encode($output_array);
		die;
	}
}

?>