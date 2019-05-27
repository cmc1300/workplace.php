<?php
/*
 * http://api.netcube.com.au/projects/netcube/echosign/retrieveEchosignDocumentKeys.php?year=2015&week=5
 */
require_once '../../includes/class/MysqliDb.php';

if ( isset($_REQUEST['year']) && is_numeric($_REQUEST['year']) ) {
	$year = trim($_REQUEST['year']);
}
else {
	$year = "2015";
}
if ( isset($_REQUEST['week']) && is_numeric($_REQUEST['week']) ) {
	$week = trim($_REQUEST['week']);
}
else {
	$week = "0";
}
//echo "$year/$week<br>";

if (intval($year) < 2014) {
	echo "Sorry, Echo-sign system was not born until 2014-Oct!";
	die;
}
else if ( (intval($year) == 2014) && (intval($week) < 40) ) {
	echo "Sorry, Echo-sign system was not born until 2014-Oct!";
	die;
}

$api_key = 'XEM38J46E7N5L4G';		//Novatel Telecommunications Pty Ltd
include('./Autoloader.php');
date_default_timezone_set('Australia/Melbourne');
$ESLoader = new SplClassLoader('EchoSign', realpath(__DIR__.'/./lib').'/');
$ESLoader->register();
$client = new SoapClient(EchoSign\API::getWSDL());
$api = new EchoSign\API($client, $api_key);

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db == NULL) {
	echo("Failed to connect NetCube database: " . $netcubehub_db->getLastError() . "<br>");
	die;
}
$onlineOrderTable = "web_echosignOrderInfo";

$SIGNED 			= 0;
$APPROVED 			= 0;
$OUT_FOR_SIGNATURE	= 0;
$OUT_FOR_APPROVAL 	= 0;
$ABORTED			= 0;

echo "<pre>";
$a['year']	= $year;
$a['week']	= $week;
$result_url	= "http://api.netcube.com.au/projects/netcube/echosign/getDocumentEventsForUser.php";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$result_url );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
$output = curl_exec($ch);
//echo $output; die;

$outputArray= json_decode($output, true);
//var_dump($outputArray); die;
$errorCode		= $outputArray['errorCode'];
$errorMessage	= $outputArray['errorMessage'];
$success		= $outputArray['success'];

if ( $errorCode=='OK' && $success ) {
	/*
	echo "<pre>";
	var_dump($outputArray['documentEventsForUser']['DocumentEventForUser'][0]);
	echo "</pre>";
	*/
}
else {
	echo "Running error: $errorMessage($errorCode)"; die;
}

$DocumentArray	= $outputArray['documentEventsForUser']['DocumentEventForUser'];
for ($i=0; $i<sizeof($DocumentArray); $i++) {
	
	$array['name'] 				= $DocumentArray[$i]['name'];
		//"Application Form"   "Credit Check Form"
	$array['actingUserEmail']	= $DocumentArray[$i]['event']['actingUserEmail'];
	$array['actingUserIpAddress']= $DocumentArray[$i]['event']['actingUserIpAddress'];
	$actingUserIpAddress		= $DocumentArray[$i]['event']['actingUserIpAddress'];
	if (is_null($actingUserIpAddress)) {
		$actingUserIpAddress 	= "";
	}
	$array['participantEmail']	= $DocumentArray[$i]['event']['participantEmail'];
	$array['documentKey'] 		= $DocumentArray[$i]['documentKey'];
	$array['date'] 				= $DocumentArray[$i]['event']['date'];
	//$array['type'] 				= $DocumentArray[$i]['event']['type'];
	$array['description'] 		= $DocumentArray[$i]['event']['description'];
	
	if ($array['participantEmail'] == "cmc1300@hotmail.com") {
		unset($array['info']);
		var_dump($array);
		echo("Test email: (" . $array['participantEmail'] . "/" . $array['documentKey'] . ")<br><br>");
		continue;
	}
	
	try {
		$result = $api->getDocumentInfo($array['documentKey']);
		//var_dump($result);
		$size = sizeof($result->documentInfo->participants->ParticipantInfo);
		//echo "size is $size <br>";
		if ( $size > 1 ) {
			$array['info']['ParticipantRole']	= $result->documentInfo->participants->ParticipantInfo[0]->roles->ParticipantRole;
			$array['info']['name']				= $result->documentInfo->participants->ParticipantInfo[0]->name;
			$array['info']['email']				= $result->documentInfo->participants->ParticipantInfo[0]->email;
			$array['info']['documentKey']		= $result->documentInfo->documentKey;
			$array['info']['status'] 			= $result->documentInfo->status;
			$status								= $array['info']['status'];
		}
		else if ( $size == 1 ) {
			$array['info']['ParticipantRole']	= $result->documentInfo->participants->ParticipantInfo->roles->ParticipantRole;
			$array['info']['name']				= $result->documentInfo->participants->ParticipantInfo->name;
			$array['info']['email']				= $result->documentInfo->participants->ParticipantInfo->email;
			$array['info']['documentKey']		= $result->documentInfo->documentKey;
			$array['info']['status'] 			= $result->documentInfo->status;
			$status								= $array['info']['status'];
		}
	}
	catch (Exception $e) {
	    echo 'Caught exception: ' .  $e->getMessage() . "<br>";
	    var_dump($result); die;
	} 
	
	//var_dump($DocumentArray[$i]);
	//var_dump($result->documentInfo->participants->ParticipantInfo[0]); 
	var_dump($array); 	
	
	if ($array['info']['email'] == "cmc1300@hotmail.com") {
		echo("Test email: (" . $array['info']['name'] . "/" . $array['info']['email'] . "/" . $array['info']['documentKey'] . ")<br><br>");
		continue;
	}
	
	if (is_array($array['info']['ParticipantRole'])) {
		$participantRole = implode("/",$array['info']['ParticipantRole']);
	}
	else {
		$participantRole = $array['info']['ParticipantRole'];
	}
	
	$web_echosignOrderInfo_Data = Array (
			"documentKey"			=> $array['info']['documentKey'],
			"orderNumber"			=> "",
			"status"				=> $array['info']['status'],
			"name"					=> $array['info']['name'],
			"email"					=> $array['info']['email'],
			"participantRole"		=> $participantRole,
			"doc_type"				=> $array['name'],
			"actingUserEmail"		=> $array['actingUserEmail'],
			"actingUserIpAddress"	=> $actingUserIpAddress,
			"participantEmail"		=> $array['participantEmail'],
			"date"					=> $array['date'],
			"description"			=> $array['description']
	);
	
	try {
		if (!$netcubehub_db->insert($onlineOrderTable, $web_echosignOrderInfo_Data)) {
			echo("Failed to insert table for (" . $array['info']['name'] . "/" . $array['info']['email'] . "): " . $netcubehub_db->getLastError() . "<br><br>");
			continue;
		}
	}
	catch (Exception $e) {
		//var_dump($array['info']['ParticipantRole']);
		echo "<h2 id='result' name='result'>" . 'Caught exception: ' . $e->getMessage() . "</h2>";
		die;
	}
	
	if ($status == 'SIGNED') {
		$SIGNED++;
	}
	else if ($status == 'OUT_FOR_SIGNATURE') {
		$OUT_FOR_SIGNATURE++;
	}
	else if ($status == 'APPROVED') {
		$APPROVED++;
	}
	else if ($status == 'OUT_FOR_APPROVAL') {
		$OUT_FOR_APPROVAL++;
	}
	else if ($status == 'ABORTED') {
		$ABORTED++;
	}
	echo "<br>";
}
echo "</pre>";

echo "<h2 id='result' name='result'>" . "$year/wk$week:&nbsp;&nbsp;" . "SIGNED($SIGNED)&nbsp;&nbsp;OUT_FOR_SIGNATURE($OUT_FOR_SIGNATURE)&nbsp;&nbsp;APPROVED($APPROVED)&nbsp;&nbsp;OUT_FOR_APPROVAL($OUT_FOR_APPROVAL)&nbsp;&nbsp;ABORTED($ABORTED)&nbsp;&nbsp;of $i records" . "</h2>";
?>