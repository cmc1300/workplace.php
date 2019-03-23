<?php
/*
 * http://api.netcube.com.au/projects/netcube/echosign/websiteGetDueDiligenceInfoBasedOnEmersion.php?emersionId=1397234
 */
require_once '../../includes/class/MysqliDb.php';
header ( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set('Australia/Melbourne');

$output_array 		= array();
$output_count		= 0;
$array				= array();
$table_name			= "web_due_diligence_info";
$message 			= "<pre>";
$emersionId 		= "";
$emersionName		= "";
$emersionEmail		= "";
$emersionStatus		= "";
$emersionCreation	= "";
$orderNumber		= "";
$source				= "";
$documentKey		= "";
$documentStatus		= "";
$documentKey2		= "";
$documentStatus2	= "";
$documentKeySync	= "";
$syncStatus			= "";
$syncInfoJson		= "";
$processStatus		= "";

$firstName			= "";
$lastName			= "";
$dateOfBirth		= "";
$email				= "";
$telephone			= "";
$mobile				= "";
$contact			= "";
$contact_count		= 0;
$address			= "";
$unit 				= "";
$streetNumber		= "";
$streetName 		= "";
$suburb 			= "";
$state 				= "";
$postcode 			= "";
/*		*/
if ( isset($_REQUEST['emersionId']) && is_numeric($_REQUEST['emersionId']) ) {
	$emersionId = trim($_REQUEST['emersionId']);
}
else {
	$output_array[$output_count]['index']	= "result";
	$output_array[$output_count]['value']	= "NOK";
	$output_count++;
	$output_array[$output_count]['index'] 	= 'info';
	$output_array[$output_count]['value'] 	= "Fail to get the mandatory parameter emersionId";
	$output_count++;
	echo json_encode($output_array);	die;
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
	$output_array[$output_count]['index']	= "result";
	$output_array[$output_count]['value']	= "NOK";
	$output_count++;
	$output_array[$output_count]['index'] 	= 'info';
	$output_array[$output_count]['value'] 	= "Fail to connect NetCube database: " . $netcubehub_db->getLastError();
	$output_count++;
	echo json_encode($output_array);	die;
}


/*		*/
$netcubehub_db						-> where("emersionId", $emersionId);
$web_due_diligence_info_Array		= $netcubehub_db -> get("web_due_diligence_info");
if ($web_due_diligence_info_Array 	== NULL) {
	$output_array[$output_count]['index']	= "result";
	$output_array[$output_count]['value']	= "NOK";
	$output_count++;
	$output_array[$output_count]['index'] 	= 'info';
	$output_array[$output_count]['value'] 	= "$emersionId not found in table web_due_diligence_info";
	$output_count++;
	echo json_encode($output_array);	die;
}
else {
	$emersionName		= $web_due_diligence_info_Array[0]['emersionName'];
	$output_array[$output_count]['index']	= "Customer Name";
	$output_array[$output_count]['value']	= $emersionName;
	$output_count++;
	
	$emersionEmail		= $web_due_diligence_info_Array[0]['emersionEmail'];
	$output_array[$output_count]['index']	= "Customer Email";
	$output_array[$output_count]['value']	= $emersionEmail;
	$contact_count		= $output_count;
	$output_count++;	
	
	$emersionStatus		= $web_due_diligence_info_Array[0]['emersionStatus'];
	$output_array[$output_count]['index']	= "Customer Status";
	$output_array[$output_count]['value']	= $emersionStatus;
	$output_count++;
	
	$emersionCreation	= $web_due_diligence_info_Array[0]['emersionCreation'];
	$output_array[$output_count]['index']	= "Customer Creation";
	$output_array[$output_count]['value']	= $emersionCreation;
	$output_count++;
	
	$orderNumber		= $web_due_diligence_info_Array[0]['orderNumber'];
	$output_array[$output_count]['index']	= "Customer Order Number";
	$output_array[$output_count]['value']	= $orderNumber;
	$output_count++;
	
	$source				= $web_due_diligence_info_Array[0]['source'];
	/*		
	$output_array[$output_count]['index']	= "Customer Source";
	$output_array[$output_count]['value']	= $source;
	$output_count++;*/
	
	$documentKey		= $web_due_diligence_info_Array[0]['documentKey'];
	/*
	$output_array[$output_count]['index']	= "Customer Document Key";
	$output_array[$output_count]['value']	= $documentKey;
	$output_count++;*/
	
	$documentStatus		= $web_due_diligence_info_Array[0]['documentStatus'];
	/*
	$output_array[$output_count]['index']	= "Customer Document Status";
	$output_array[$output_count]['value']	= $documentStatus;
	$output_count++;*/
	
	$documentKeySync	= $web_due_diligence_info_Array[0]['documentKeySync'];
	if (empty($documentKey) || is_null($documentKey)) {
		$documentKey	= $documentKeySync;
	}
	
	$syncStatus			= $web_due_diligence_info_Array[0]['syncStatus'];
	$syncInfoJson		= $web_due_diligence_info_Array[0]['syncInfoJson'];
	$processStatus		= $web_due_diligence_info_Array[0]['processStatus'];
}


if ($source == "web_onlineOrderInfo") {
	
	$netcubehub_db					-> where("orderNumber", $orderNumber);
	$netcubehub_db 					-> orderBy("orderNumber", "desc");
	$web_onlineOrderInfo_Array		= $netcubehub_db -> get("web_onlineOrderInfo");
	$source							= "web_onlineOrderInfo";
	if ($web_onlineOrderInfo_Array 	!= NULL) {
		$firstName			= $web_onlineOrderInfo_Array[0]['firstName'];
		$lastName			= $web_onlineOrderInfo_Array[0]['lastName'];
		$dateOfBirth		= $web_onlineOrderInfo_Array[0]['dateOfBirth'];
		$email				= $web_onlineOrderInfo_Array[0]['email'];
		$telephone			= $web_onlineOrderInfo_Array[0]['telephone'];
		$mobile				= $web_onlineOrderInfo_Array[0]['mobile'];
		$contact			= $mobile;
		if (empty($contact) || is_null($contact)) {
			$contact		= $telephone;
		}
		$output_array[$contact_count]['index']	= "Customer Email / Contact";
		$output_array[$contact_count]['value']	= $emersionEmail . " / " . $contact;
		$address			= ucwords(strtolower($web_onlineOrderInfo_Array[0]['address']));
		$address			= str_replace(" Nsw "," NSW ",$address);
		$address			= str_replace(" Vic "," VIC ",$address);
		$address			= str_replace(" Tas "," TAS ",$address);
		$address			= str_replace(" Wa "," WA ",$address);
		$address			= str_replace(" Sa "," SA ",$address);
		$address			= str_replace(" Act "," ACT ",$address);
		$address			= str_replace(" Nt "," NT ",$address);
		$address			= str_replace(" Qld "," QLD ",$address);
		$output_array[$output_count]['index']	= "Customer Address";
		$output_array[$output_count]['value']	= $address;
		$output_count++;
		$documentKey2		= $web_onlineOrderInfo_Array[0]['documentKey'];
		$documentStatus2	= $web_onlineOrderInfo_Array[0]['documentStatus'];
		if (is_null($documentStatus2) || empty($documentStatus2) ) {
			$documentStatus2	= "OUT_FOR_SIGNATURE";
		}
		if ($documentStatus2 == "APPROVED" || $documentStatus2 == "SIGNED") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKey2;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus2;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://14.137.150.88/~centernetcubecom/order_form/pdf/" . $orderNumber . ".pdf";
			$output_count++;
		}
		else if ($documentStatus == "APPROVED" || $documentStatus == "SIGNED") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKeySync;		//$documentKey;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $documentStatus . "/" . $orderNumber . ".pdf";
			$output_count++;
		}
		else if ($processStatus=="OK" && ($documentStatus == "OUT_FOR_SIGNATURE" || $documentStatus == "OUT_FOR_APPROVAL")) {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKeySync;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= "SIGNED";
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/SIGNED/" . $orderNumber . ".pdf";
			$output_count++;
		}
		else if ($documentStatus == "OUT_FOR_SIGNATURE" || $documentStatus == "OUT_FOR_APPROVAL") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKey2;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus2;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $documentStatus2 . "/" . $orderNumber . ".pdf";
			$output_count++;
		}
	}
	else {

	}
}

else if ($source == "emersion") {

	if ($syncStatus == "ok" || $processStatus == "OK") {
		if ($documentStatus == "APPROVED" || $documentStatus == "SIGNED") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKey;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $documentStatus . "/" . $orderNumber . ".pdf";
			$output_count++;
		}
		else if ($documentStatus == "OUT_FOR_SIGNATURE" || $documentStatus == "OUT_FOR_APPROVAL") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKey;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus;
			$output_count++;
			/*		*/
			$output_array[$output_count]['index']	= "Customer Contract";
			//$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $documentStatus . "/" . $orderNumber . ".pdf";
			$output_array[$output_count]['value']	= "pdf file to be signed";
			$output_count++;
		}
	}
	else {
		$output_array[$output_count]['index']	= "Customer Error Info";
		$array = json_decode($syncInfoJson, true);
		$output_array[$output_count]['value']	= $array['error'];
		$output_count++;
	}
}

else if ($source == "web_cp_adsl_onlineOrderInfo" || $source == "web_cp_nbn_onlineOrderInfo") {
	if ($syncStatus == "ok" || $processStatus == "OK") {
		if ($documentStatus == "APPROVED" || $documentStatus == "SIGNED") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKey;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $documentStatus . "/" . $orderNumber . ".pdf";
			$output_count++;
		}
		else if ($documentStatus == "OUT_FOR_SIGNATURE" || $documentStatus == "OUT_FOR_APPROVAL") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKey;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus;
			$output_count++;
			/*		*/
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $documentStatus . "/" . $orderNumber . ".pdf";
			$output_count++;
		}
	}
	else if ($documentStatus == "OUT_FOR_SIGNATURE") {
			$output_array[$output_count]['index']	= "Customer Document Key";
			$output_array[$output_count]['value']	= $documentKey;
			$output_count++;
			$output_array[$output_count]['index']	= "Customer Document Status";
			$output_array[$output_count]['value']	= $documentStatus;
			$output_count++;
			/*		*/
			$output_array[$output_count]['index']	= "Customer Contract";
			$output_array[$output_count]['value']	= "http://api.netcube.com.au/projects/netcube/echosign/due_diligence/" . $documentStatus . "/" . $orderNumber . ".pdf";
			$output_count++;
	}
	else {
		$output_array[$output_count]['index']	= "Customer Error Info";
		$array = json_decode($syncInfoJson, true);
		$output_array[$output_count]['value']	= $array['error'];
		$output_count++;
	}
}

$output_array[$output_count]['index']	= "result";
$output_array[$output_count]['value']	= "OK";
$output_count++;
echo json_encode($output_array); die;
?>