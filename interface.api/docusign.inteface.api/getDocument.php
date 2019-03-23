<?php
/*
 * http://api.netcube.com.au/projects/netcube/docusign/getDocument.php
 */

// header('Content-Type: text/plain');
error_reporting ( E_ALL );
ini_set ( 'display_errors', 1 );
// var_dump($_SERVER);die;

date_default_timezone_set ( 'Australia/Melbourne' );
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
  
  	$sql = "SELECT * from web_onlineOrderInfo 
  			where	 documentKey != '' AND documentCategory = 'docusign' AND status != 'Cancelled' AND 
  					(documentStatus != 'DCS_Completed' OR documentStatus IS NULL OR documentStatus = '') 
  			order by orderNumber desc";
  	if ($result = mysql_query ( $sql )) {
		while ( $row = mysql_fetch_assoc ( $result ) ) {
	   		$return [] = $row;
		}
  	}
	mysql_free_result ( $result );
	//echo "<pre>"; var_dump($return); echo "</pre>"; die;
}

if (sizeof( $return ) > 0) {
	$order_array = array();
	for($i = 0; $i < sizeof( $return ); $i ++) {
		$order_array['orderNumber']			= $return [$i] ["orderNumber"];
		$order_array['customerId']			= $return [$i] ["customerId"];
		$order_array['documentCategory']	= $return [$i] ["documentCategory"];
		$order_array['documentKey']			= $return [$i] ["documentKey"];
		$order_array['documentStatus']		= $return [$i] ["documentStatus"];
		$order_array['dealer']				= $return [$i] ["dealer"];
		$order_array['fullName']			= ucwords ( $return [$i] ["firstName"] . " " . $return [$i] ["lastName"] );
		$order_array['email']				= $return [$i] ["email"];
		$function_result					= check_down_echosign ( 	$return [$i] ["orderNumber"], 
																		$return [$i] ["customerId"], 
																		$return [$i] ["documentKey"], 
																		$return [$i] ["dealer"], 
																		$return [$i] ["documentStatus"], 
																		ucwords ( $return [$i] ["firstName"] . " " . $return [$i] ["lastName"] ), 
																		$return [$i] ["email"] );
		$function_result_array				= explode("/", $function_result);
		$docusign_state_before				= trim($function_result_array[0]);
		$docusign_state_after				= trim($function_result_array[1]);
		$docusign_category					= trim($function_result_array[2]);
		$order_array['result']				= $function_result;
		$order_array['documentStatus']		= $docusign_state_after;
		if ($docusign_state_after != "DCS_Completed") {
			$return_json_array[$docusign_category][] 	= $order_array;
		}
	}
} 
echo "<h2 id='result' name='result'>" . json_encode($return_json_array) . "</h2>";
mysql_close ( $con );


function check_down_echosign($orderNumber, $customerId, $documentKey, $dealer, $documentStatus, $name, $email) {
	global $return_json_array;
	 
	try {
		$a['envelopeId']	= $documentKey;
		$result_url			= "http://api.netcube.com.au/projects/netcube/docusign/api/docusign_get_envelope_status.php";
		$ch 				= curl_init();
		curl_setopt($ch,CURLOPT_URL,$result_url );
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
		$output 			= curl_exec($ch);
		$output 			= trim($output);
		$outputArray 		= json_decode($output, true);
		
		$status 			= "DCS_" . ucwords($outputArray['status']);
		$emailSubject		= $outputArray['emailSubject'];
		$signedOrApproved	= "";
		if (substr_count($emailSubject, "Please review and sign this application form") == 1) {
			$signedOrApproved	= "DCS_Signature";
		}
		else if (substr_count($emailSubject, "Please review this application form") == 1) {
			$signedOrApproved	= "DCS_Approval";
		}
	
		if ($documentStatus == $status ) {
			return $documentStatus . "/" . $status . "/" . $signedOrApproved;
		}
	  
		if ($documentStatus != 'DCS_Completed' && $status == 'DCS_Completed') {
	    	//$result = $api->getDocuments ( $documentKey, $options );
	    	$a['envelopeId']	= $documentKey;
	    	$result_url			= "http://api.netcube.com.au/projects/netcube/docusign/api/docusign_download_document.php";
	    	$ch 				= curl_init();
	    	curl_setopt($ch,CURLOPT_URL,$result_url );
	    	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	    	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
	    	curl_setopt($ch, CURLOPT_POST, 1);
	    	curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
	    	$output 			= curl_exec($ch);
	    	$output 			= trim($output);
	    	$outputArray 		= json_decode($output, true);
	    	
	    	if (isset($outputArray['envelopeId'])) {
				$pdffilename = $_SERVER ['DOCUMENT_ROOT'] . "/projects/netcube/docusign/download/" . $orderNumber . ".pdf"; 
				if (file_exists ( $pdffilename )) {
					// connect and login to FTP server
					$ftp_server = "14.137.150.88";
					$ftp_conn = ftp_connect ( $ftp_server );
					if (! $ftp_conn) {
						$return_json_array['result'] 	= "NOK";
				       	$return_json_array['info'] 		= "Failed to connect to $ftp_server";
				       	echo "<h2 id='result' name='result'>" . json_encode($return_json_array) . "</h2>";
				       	die ();
					}
		      		$login = ftp_login ( $ftp_conn, "centernetcubecom", "MpwGvI7UfPe0" );
		      		$server_file = $orderNumber . ".pdf";
					// open local file
					$local_file = $pdffilename;
					$fp = fopen ( $local_file, "r" );
		      
					if (!ftp_fput ( $ftp_conn, "/public_html/order_form/pdf/" . $orderNumber . ".pdf", $fp, FTP_BINARY )) {
						$return_json_array['result'] 	= "NOK";
						$return_json_array['info'] 		= "Error uploading $local_file";
						echo "<h2 id='result' name='result'>" . json_encode($return_json_array) . "</h2>";
						die ();
					}
					// close this connection and file handler
					ftp_close ( $ftp_conn );
					fclose ( $fp );
					
					// execute the SQL query and return records
					$sql = "UPDATE web_onlineOrderInfo SET documentStatus ='$status' where documentKey = '$documentKey'";
					mysql_query ( $sql );
				}
			}
		}
		else if ($documentStatus != 'DCS_Delivered' && $status == 'DCS_Delivered') {
			// execute the SQL query and return records
			$sql = "UPDATE web_onlineOrderInfo SET documentStatus ='$status' where documentKey = '$documentKey'";
			mysql_query ( $sql );
		}
		else if ($status == "SIGNED" || $status == "APPROVED") {
			
		}
	}
	catch ( Exception $e ) {
		$return_json_array['result'] 	= "NOK";
		$return_json_array['info'] 		= $orderNumber . "($name)" . " " . $e->getMessage ();
		echo "<h2 id='result' name='result'>" . json_encode($return_json_array) . "</h2>";
		die ();
	}
	
	return $documentStatus . "/" . $status . "/" . $signedOrApproved;
}

?>