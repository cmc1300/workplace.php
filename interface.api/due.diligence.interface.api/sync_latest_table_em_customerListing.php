<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/sync_latest_table_em_customerListing.php
 */
require_once '../../includes/class/MysqliDb.php';

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
	echo 	"<h2 id='result' name='result'>" .
			"Fail to connect NetCube database: " . $netcubehub_db->getLastError() .
			"</h2>";
	die;
}

echo "<pre>";

$foundRecord_count			= 0;

$netcubehub_db				-> where("1 = 1");
$netcubehub_db 				-> orderBy("customerId", "desc");
$em_customerListingArray	= $netcubehub_db -> get("em_customerListing");
if ($em_customerListingArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"No records could be found in table em_customerListing" .
			"</h2>";
	die;
}
//var_dump($em_customerListingArray); die;

for ($loop=0; $loop<sizeof($em_customerListingArray); $loop++) {
	$matched 			= false;
	$matched_count		= 0;
	$duplication		= array();
	$date				= "";
	$email				= "";
	$source				= "";
	$orderNumber		= "";
	$documentKey		= "";
	$documentStatus		= "";
	$documentKeySync	= "";
	
	{
		$em_customerListing_date 	= trim($em_customerListingArray[$loop]['customerCreatedDate']);
		$array	= explode(" ", $em_customerListing_date);
		$day	= str_pad($array[0],  2, "0", STR_PAD_LEFT); 
		$month	= $array[1];
		switch ($array[1]) {
			case "Jan":
				$month	= "01";
				break;
			case "Feb":
				$month	= "02";
				break;
			case "Mar":
				$month	= "03";
				break;
			case "Apr":
				$month	= "04";
				break;
			case "May":
				$month	= "05";
				break;
			case "Jun":
				$month	= "06";
				break;
			case "Jul":
				$month	= "07";
				break;
			case "Aug":
				$month	= "08";
				break;
			case "Sep":
				$month	= "09";
				break;
			case "Oct":
				$month	= "10";
				break;
			case "Nov":
				$month	= "11";
				break;
			case "Dec":
				$month	= "12";
				break;	
			default:
				$month	= "00";
		}
		$year	= $array[2];
		$em_customerListing_date = $year . "-" . $month . "-" . $day;
	}
	$em_customerListing_name 	= trim($em_customerListingArray[$loop]['customerName']);
	$em_customerListing_emersion= trim($em_customerListingArray[$loop]['customerId']);
	$em_customerListing_email	= strtolower(trim($em_customerListingArray[$loop]['customerEmail']));
	$em_customerListing_status	= trim($em_customerListingArray[$loop]['status']);
	
	$netcubehub_db					-> where("customerId", $em_customerListing_emersion);
	$netcubehub_db 					-> orderBy("orderNumber", "desc");
	$web_onlineOrderInfo_Array		= $netcubehub_db -> get("web_onlineOrderInfo");
	if ($web_onlineOrderInfo_Array 	!= NULL) {
		$orderNumber				= $web_onlineOrderInfo_Array[0]['orderNumber'];
		$documentKey				= $web_onlineOrderInfo_Array[0]['documentKey'];
		$documentStatus				= $web_onlineOrderInfo_Array[0]['documentStatus'];
		$source						= "web_onlineOrderInfo";
	}
	
	$foundRecord_count = $foundRecord_count + updateDB(	$em_customerListing_emersion, $em_customerListing_name, $em_customerListing_email,
		 		$em_customerListing_status, $em_customerListing_date, $orderNumber, $source,
		 		$documentKey, $documentStatus, "", "", "");
	//echo "$loop: Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($em_customerListing_email) Creation:($em_customerListing_date) <br>";

}

echo "</pre>";
echo "<h2 id='result' name='result'>" . "$foundRecord_count/" . sizeof($em_customerListingArray) . " Emersion customer records processed" . "</h2>";


function updateDB($emersionId, $emersionName, $emersionEmail, $emersionStatus, $emersionCreation, $orderNumber, $source, $documentKey, $documentStatus, $documentKeySync, $syncStatus, $syncInfoJson) {
	
	global $netcubehub_db;
	$table_Data 				= Array (
		"emersionId"			=> $emersionId,
		"emersionName"			=> $emersionName,
		"emersionEmail"			=> $emersionEmail,
		"emersionStatus"		=> $emersionStatus,
		"emersionCreation"		=> $emersionCreation /*,
		"orderNumber"			=> $orderNumber,
		"source"				=> $source,
		"documentKey"			=> $documentKey,
		"documentStatus"		=> $documentStatus,
		"documentKeySync"		=> $documentKeySync,
		"syncStatus"			=> $syncStatus,
		"syncInfoJson"			=> $syncInfoJson*/
	);
	if (!empty($orderNumber)) {
		$table_Data['orderNumber']		= $orderNumber;
	}
	if (!empty($source)) {
		$table_Data['source']			= $source;
	}
	if (!empty($documentKey)) {
		$table_Data['documentKey']		= $documentKey;
		if (empty($documentStatus) || is_null($documentStatus)) {
			$documentStatus				= "OUT_FOR_SIGNATURE";
		}
	}
	if (!empty($documentStatus)) {
		$table_Data['documentStatus']	= $documentStatus;
	}

	$netcubehub_db				-> where("emersionId", $emersionId);
	$table_Array				= $netcubehub_db -> get("web_due_diligence_info");
	if ($table_Array == NULL) {
		if (!$netcubehub_db	-> insert("web_due_diligence_info", $table_Data)) {
			echo 	"<h2 id='result' name='result'>" .
					"Fail to insert table web_due_diligence_info for (" . $emersionId . "/" . $emersionName . "/" . $emersionStatus . "): " . $netcubehub_db->getLastError() .
					"</h2>";
			die;
		}
		return 1;
	}
	else {
		$netcubehub_db		-> where("emersionId", $emersionId);
		if (!$netcubehub_db	-> update("web_due_diligence_info", $table_Data)) {
			echo 	"<h2 id='result' name='result'>" .
					"Fail to update table web_due_diligence_info for (" . $emersionId . "/" . $emersionName . "/" . $emersionStatus . "): " . $netcubehub_db->getLastError() .
					"</h2>";
			die;
		}
		return 0;
	}
}
?>