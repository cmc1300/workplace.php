<?php
/*
 * http://api.netcube.com.au/projects/netcube/echosign/apiGetAdobeContractsViaCustomerEmail.php?email=farid.kakar@novatel.com.au
 */
require_once '../../includes/class/MysqliDb.php';
header ( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set('Australia/Melbourne');

$output_array 					= array();
$output_array['result']			= "OK";
$output_count					= 0;
$array							= array();
$customerEmail					= "";
$emersionId 					= "";
$emersionEmail					= "";
$emersionStatus					= "";
$emersionCreation				= "";
$orderNumber					= "";
$documentKey					= "";
$documentStatus					= "";
$documentKeySync				= "";
$allDone						= false;
/*		*/
if ( isset($_REQUEST['email']) && !empty($_REQUEST['email']) ) {
	$customerEmail				= trim(strtolower($_REQUEST['email']));
}
else {
	$output_array['result']		= "NOK";
	$output_array['info'] 		= "Fail to get the mandatory parameter email";
	echo json_encode($output_array);	die;
} 

$aapt['action'] 				= "getNetCubeHubDBInfo";
$result_url						= "http://api.netcube.com.au/projects/includes/interface.php";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$result_url );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
$output 						= curl_exec($ch);
$returnArray 					= json_decode($output, true);
$host_ip						= $returnArray['host_ip'];
$db_user_name					= $returnArray['db_user_name'];
$db_user_password				= $returnArray['db_user_password'];
$db_name						= $returnArray['db_name'];
$netcubehub_db 					= new MysqliDb ( $host_ip, $db_user_name, $db_user_password, $db_name );
if (is_null($netcubehub_db)) {
	$output_array['result']		= "NOK";
	$output_array['info'] 		= "Fail to connect NetCube database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);	die;
}


/*		*/
$netcubehub_db					-> where("emersionEmail", $customerEmail);
$web_due_diligence_info_Array	= $netcubehub_db -> get("web_due_diligence_info");
if (is_null($web_due_diligence_info_Array)) {
	$output_array['result']		= "NOK";
	$output_array['info'] 		= "$emersionId not found in table web_due_diligence_info";
	echo json_encode($output_array);	die;
}

//echo "<pre>"; var_dump($web_due_diligence_info_Array); echo "</pre>"; die;
foreach ($web_due_diligence_info_Array as $web_due_diligence_info) {
	//echo "<pre>"; var_dump($web_due_diligence_info); echo "</pre>"; 
	$emersionId																= $web_due_diligence_info['emersionId'];
	$output_array['list'][$output_count]['emersion']['emersionId']			= $emersionId;
	
	$netcubehub_db															-> where("customerId", $emersionId);
	$em_customerListing_Array												= $netcubehub_db -> get("em_customerListing");	
	$output_array['list'][$output_count]['emersion']['emersionStatus']		= $em_customerListing_Array[0]['status'];
	$output_array['list'][$output_count]['emersion']['emersionCreation']	= $em_customerListing_Array[0]['customerCreatedDate'];
	
	$output_array['list'][$output_count]['emersion']['emersionName']		= $web_due_diligence_info['emersionName'];
	
	$orderNumber															= $web_due_diligence_info['orderNumber'];
	if ( isset($orderNumber) && !empty($orderNumber) && !is_null($orderNumber)) {
		$output_array['list'][$output_count]['order']['orderNumber']		= $orderNumber;
		$output_array['list'][$output_count]['order']['orderDocumentKey']	= "";
		$output_array['list'][$output_count]['order']['orderDocumentStatus']= "";
		$output_array['list'][$output_count]['order']['orderDocumentURL']	= "";
		
		$netcubehub_db														-> where("orderNumber", $orderNumber);
		$web_onlineOrderInfo_Array											= $netcubehub_db -> get("web_onlineOrderInfo");
		if ($web_onlineOrderInfo_Array != NULL) {
			$orderDocumentStatus											= $web_onlineOrderInfo_Array[0]['documentStatus'];
			$orderDocumentKey												= $web_onlineOrderInfo_Array[0]['documentKey'];
			if ( isset($orderDocumentStatus) && !empty($orderDocumentStatus) && !is_null($orderDocumentStatus)) {
				$output_array['list'][$output_count]['order']['orderDocumentKey']	= $orderDocumentKey;
				$output_array['list'][$output_count]['order']['orderDocumentStatus']= $orderDocumentStatus;
				if ($orderDocumentStatus == "SIGNED" || $orderDocumentStatus == "APPROVED") {
					$allDone = true;
					$output_array['list'][$output_count]['order']['orderDocumentURL']= "http://14.137.150.88/~centernetcubecom/order_form/pdf/" . $orderNumber . ".pdf";
				}
			}
		}
	}
	
	if (!$allDone) {
		$dueDiligentCount		= 0;
		$documentKey			= $web_due_diligence_info['documentKey'];
		if ( isset($documentKey) && !empty($documentKey) && !is_null($documentKey) && $orderDocumentKey != $documentKey ) {
			$output_array['list'][$output_count]['dueDocument'][$dueDiligentCount]['dueDocumentKey']		= $documentKey;
			$dueDocumentStatus																				= getAdobeContractStatus($documentKey);
			$output_array['list'][$output_count]['dueDocument'][$dueDiligentCount]['dueDocumentStatus']		= $dueDocumentStatus;
			if ($dueDocumentStatus == "SIGNED" || $dueDocumentStatus == "APPROVED") {
				$output_array['list'][$output_count]['dueDocument'][$dueDiligentCount]['dueDocumentURL']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $dueDocumentStatus . "/" . $orderNumber . ".pdf";;
			}
			$dueDiligentCount ++;
		}
		$documentKeySync		= $web_due_diligence_info['documentKeySync'];
		if ( isset($documentKeySync) && !empty($documentKeySync) && !is_null($documentKeySync) && $orderDocumentKey != $documentKeySync ) {
			$output_array['list'][$output_count]['dueDocument'][$dueDiligentCount]['dueDocumentKey']		= $documentKeySync;
			$dueDocumentStatus																				= getAdobeContractStatus($documentKeySync);
			$output_array['list'][$output_count]['dueDocument'][$dueDiligentCount]['dueDocumentStatus']		= $dueDocumentStatus;
			if ($dueDocumentStatus == "SIGNED" || $dueDocumentStatus == "APPROVED") {
				$output_array['list'][$output_count]['dueDocument'][$dueDiligentCount]['dueDocumentURL']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $dueDocumentStatus . "/" . $orderNumber . ".pdf";;
			}
		}
	}
	
	$output_count ++;
}
echo json_encode($output_array); die;


function getAdobeContractStatus ($documentKey) {
	
	$aapt['format'] 			= "json";
	$aapt['documentKey'] 		= $documentKey;
	$result_url					= "http://api.netcube.com.au/projects/netcube/echosign/displayEchosignContractBasedOnDocumentKey.php";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$result_url );
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
	$output 					= curl_exec($ch);
	$returnArray 				= json_decode($output, true);
	
	$result						= $returnArray['result'];
	$documentStatus				= $returnArray['documentStatus'];
	if ($result == "OK" && !empty($documentStatus) && !is_null($documentStatus)) {
		return $documentStatus;
	}
	else {
		return "";
	}
}
?>