<?php
/*
 * http://api.netcube.com.au/projects/netcube/echosign/getDocumentTest.php
 */

// header('Content-Type: text/plain');
error_reporting ( E_ALL );
ini_set ( 'display_errors', 1 );
// var_dump($_SERVER);die;

/*
 * Setup variables start
 * Change these before testing
 * http://localhost/Temp/echosign-api-php-master/examples/document/sendDocument.php
 */
$api_key = 'XEM38J46E7N5L4G'; // Novatel Telecommunications Pty Ltd

include ('./Autoloader.php');
date_default_timezone_set ( 'Australia/Melbourne' );

$ESLoader = new SplClassLoader ( 'EchoSign', realpath ( __DIR__ . '/./lib' ) . '/' );
$ESLoader->register ();

$client = new SoapClient ( EchoSign\API::getWSDL () );
$api = new EchoSign\API ( $client, $api_key );
$resultString = "";

$return 						= array ();
$return_json_array 				= array ();
$return_json_array['result'] 	= "OK";

 
if (true) { 	
 	$aapt['action'] 		= "getNetCubeHubDBInfo"; 	
 	$result_url				= "http://api.netcube.com.au/projects/includes/interface.php"; 	
 	$ch = curl_init(); 	curl_setopt($ch,CURLOPT_URL,$result_url ); 	
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
 	
  	$con = mysql_connect ( $host_ip, $db_user_name, $db_user_password );
  	if (! $con) {
  		$return_json_array['result'] 	= "NOK";
	   	$return_json_array['info'] 		= "Failed to connect to MySQL: " . mysql_error ();
	   	echo "<h2 id='result' name='result'>" . json_encode($return_json_array) . "</h2>";
	   	die ();
  	}
	mysql_select_db ( $db_name, $con );
	mysql_query ( "SET NAMES 'utf8'" );
  
	/* execute the SQL query and return records
  	$sql = "SELECT * from web_onlineOrderInfo 
  			where	documentKey != '' AND documentCategory != 'none' AND status != 'Cancelled' AND 
  					(documentStatus = 'OUT_FOR_APPROVAL' OR documentStatus = 'OUT_FOR_SIGNATURE' OR documentStatus IS NULL OR documentStatus = '') 
  			order by orderNumber desc"; */
  	$sql = "SELECT * from web_onlineOrderInfo 
  			where	 documentKey != '' AND documentCategory = 'adobesign' AND status != 'Cancelled' AND 
  					(documentStatus != 'APPROVED' AND documentStatus != 'SIGNED' OR documentStatus IS NULL OR documentStatus = '') 
  			order by orderNumber desc";
  	if ($result = mysql_query ( $sql )) {
		while ( $row = mysql_fetch_assoc ( $result ) ) {
	   		$return [] = $row;
		}
  	}
	mysql_free_result ( $result );
	//echo "<pre>"; var_dump($return); echo "</pre>"; die;
}
 
$count = sizeof( $return );
date_default_timezone_set ( 'Australia/Melbourne' );
$filename = "log/GetSignedDocuments-" . date ( "Y" ) . "-" . date ( "F" ) . ".log";
file_put_contents ( $filename, date ( "l jS \of F Y h:i:s A" ) . "\r\n", FILE_APPEND | LOCK_EX );
file_put_contents ( $filename, "=============================================================================\r\n", FILE_APPEND | LOCK_EX );
if ($count > 0) {
	$order_array = array();
	for($i = 0; $i < $count && $i < 30; $i ++) {
		$order_array['orderNumber']			= $return [$i] ["orderNumber"];
		$order_array['customerId']			= $return [$i] ["customerId"];
		$order_array['documentCategory']	= $return [$i] ["documentCategory"];
		$order_array['documentKey']			= $return [$i] ["documentKey"];
		$order_array['documentStatus']		= $return [$i] ["documentStatus"];
		$order_array['dealer']				= $return [$i] ["dealer"];
		$order_array['fullName']			= ucwords ( $return [$i] ["firstName"] . " " . $return [$i] ["lastName"] );
		$order_array['email']				= $return [$i] ["email"];
		$function_result					= check_down_echosign ( 	$filename, $api, 
																		$return [$i] ["orderNumber"], 
																		$return [$i] ["customerId"], 
																		$return [$i] ["documentKey"], 
																		$return [$i] ["dealer"], 
																		$return [$i] ["documentStatus"], 
																		ucwords ( $return [$i] ["firstName"] . " " . $return [$i] ["lastName"] ), 
																		$return [$i] ["email"] );
		if (substr_count($function_result, "The signed PDF file name") == 0) {
			$return_json_array[$order_array['documentStatus']][] 	= $order_array;
		}
		$resultString = $resultString . $function_result;
	}
	file_put_contents ( $filename, "=============================================================================\r\n\r\n\r\n", FILE_APPEND | LOCK_EX );
} 
else {
	file_put_contents ( $filename, "Nothing to be fetched!\r\n", FILE_APPEND | LOCK_EX );
	$resultString = $resultString . "Nothing to be fetched!";
	file_put_contents ( $filename, "=============================================================================\r\n\r\n\r\n", FILE_APPEND | LOCK_EX );
}

$return_json_array['result'] 	= "OK";
echo "<h2 id='result' name='result'>" . json_encode($return_json_array) . "</h2>";
mysql_close ( $con );


function check_down_echosign($filename, $api, $index, $customerId, $document_key, $dealer, $documentStatus, $name, $email) {
	global $return_json_array;
	$dealerFirstThree = "";
	$resultString = "";
	if (! empty ( $dealer )) {
	  $dealerFirstThree = strtolower ( substr ( $dealer, 0, 3 ) );
	}
	 
	try {
		$result = $api->getDocumentInfo ( $document_key );
		$status = $result->documentInfo->status;
	
		file_put_contents ( $filename, "The document status of user ID($dealer) " . $index . " (" . $document_key . ") is " . $status . "\r\n", FILE_APPEND | LOCK_EX );
		$resultString = "" . $index . " / " . $customerId . " ($name / $email)";
		$resultString = $resultString . " status($status) document_key($document_key)&&";
		//$resultString = $resultString . " document_key(" . $document_key . ")&&";
	  
		if (! empty ( $dealer ) && $dealerFirstThree == "nc-" && $documentStatus != 'OUT_FOR_APPROVAL') {
			$options = new EchoSign\Options\GetDocumentsOptions ();

	    	$result = $api->getDocuments ( $document_key, $options );
	    	// var_dump($result);
	    	$errorCode = $result->getDocumentsResult->errorCode;
	    	if ($errorCode == "OK") {
			    if (true) {
				    // $pdffilename = $_SERVER['DOCUMENT_ROOT'] . "/files/" . $index . "_contract.pdf";
				    $pdffilename = $_SERVER ['DOCUMENT_ROOT'] . "/projects/netcube/echosign/log/" . $index . ".pdf";
				    file_put_contents ( $pdffilename, $result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX );
				    file_put_contents ( $filename, "The signed PDF file name: " . $pdffilename . "\r\n", FILE_APPEND | LOCK_EX );
				    $resultString = $resultString . "The signed PDF file name: " . $pdffilename . "&&";
		     	}
		     
				if (file_exists ( $pdffilename )) {
					// connect and login to FTP server
					$ftp_server = "14.137.150.88";
					$ftp_conn = ftp_connect ( $ftp_server ) or die ( "Could not connect to $ftp_server" );
					if (! $ftp_conn) {
						$return_json_array['result'] 	= "NOK";
				       	$return_json_array['info'] 		= "Failed to connect to $ftp_server";
				       	echo "<h2 id='result' name='result'>" . json_encode($return_json_array) . "</h2>";
				       	die ();
					}
		      		$login = ftp_login ( $ftp_conn, "centernetcubecom", "MpwGvI7UfPe0" );
		      		$server_file = $index . ".pdf";
					// open local file
					$local_file = $pdffilename;
					$fp = fopen ( $local_file, "r" );
		      
					if (ftp_fput ( $ftp_conn, "/public_html/order_form/pdf/" . $index . ".pdf", $fp, FTP_BINARY )) {
						$resultString = $resultString . "Successfully uploaded $local_file" . "&&";
					} 
					else {
						$resultString = $resultString . "Error uploading $local_file" . "&&";
					}
					// close this connection and file handler
					ftp_close ( $ftp_conn );
					fclose ( $fp );
					
					// change_database_status($index);
					$sql = "UPDATE web_onlineOrderInfo SET documentStatus ='OUT_FOR_APPROVAL' where documentKey = '$document_key'";
					mysql_query ( $sql );
				}
			}
		}
		else if ($status == "SIGNED" || $status == "APPROVED") {
			// SIGNED OUT_FOR_SIGNATURE
			$options = new EchoSign\Options\GetDocumentsOptions ();
	   
		    $result = $api->getDocuments ( $document_key, $options );
		    // var_dump($result);
		    $errorCode = $result->getDocumentsResult->errorCode;
		    if ($errorCode == "OK") {
				if (true) {
					// $pdffilename = $_SERVER['DOCUMENT_ROOT'] . "/files/" . $index . "_contract.pdf";
					$pdffilename = $_SERVER ['DOCUMENT_ROOT'] . "/projects/netcube/echosign/log/" . $index . ".pdf";
					file_put_contents ( $pdffilename, $result->getDocumentsResult->documents->DocumentContent->bytes, FILE_APPEND | LOCK_EX );
					file_put_contents ( $filename, "The signed PDF file name: " . $pdffilename . "\r\n", FILE_APPEND | LOCK_EX );
					$resultString = $resultString . "The signed PDF file name: " . $pdffilename . "&&";
				}
	     
				if (file_exists ( $pdffilename )) {
					// connect and login to FTP server
					$ftp_server = "14.137.150.88";
					$ftp_conn = ftp_connect ( $ftp_server ) or die ( "Could not connect to $ftp_server" );
					if (! $ftp_conn) {
						$return_json_array['result'] 	= "NOK";
				       	$return_json_array['info'] 		= "Failed to connect to $ftp_server";
				       	echo "<h1 id='result' name='result'>" . json_encode($return_json_array) . "</h1>";
						die ();
					}
					$login = ftp_login ( $ftp_conn, "centernetcubecom", "MpwGvI7UfPe0" );
					$server_file = $index . ".pdf";
					// open local file
					$local_file = $pdffilename;
					$fp = fopen ( $local_file, "r" );
		      
		      		if (ftp_fput ( $ftp_conn, "/public_html/order_form/pdf/" . $index . ".pdf", $fp, FTP_BINARY )) {
		       			$resultString = $resultString . "Successfully uploaded $local_file" . "&&";
		      		} 
		      		else {
		       			$resultString = $resultString . "Error uploading $local_file" . "&&";
		      		}
		      		// close this connection and file handler
		      		ftp_close ( $ftp_conn );
		      		fclose ( $fp );
		     
		     		// change_database_status($index);
				    $sql = "UPDATE web_onlineOrderInfo SET documentStatus ='$status' where documentKey = '$document_key'";
				    mysql_query ( $sql );
				}
			}
		}
		else if ( (is_null($documentStatus) || empty($documentStatus)) && $status == "OUT_FOR_SIGNATURE") {
		  	// execute the SQL query and return records
		  	$sql = "UPDATE web_onlineOrderInfo SET documentStatus ='$status' where documentKey = '$document_key'";
		  	mysql_query ( $sql );
		}
	}
	catch ( Exception $e ) {
		$resultString = "" . $index . "($name)";
		$resultString = $resultString . " " . $e->getMessage () . "&&";
		// echo "<h2 id='result' name='result'>$resultString</h2>"; die;
	}
	return $resultString;
}

?>