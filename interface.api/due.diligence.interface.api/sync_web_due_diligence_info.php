<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/sync_web_due_diligence_info.php
 * syncStatus	none/empty email	
 * 				none/none matched
 * 				duplicated/unique
 * 				duplicated/none matched
 * 				duplicated/one later
 * 				duplicated/close enough
 * 				suspicious
 * 				unique
 */
require_once '../../includes/class/MysqliDb.php';

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db == NULL) {
	echo 	"<h2 id='result' name='result'>" .
			"Fail to connect NetCube database: " . $netcubehub_db->getLastError() .
			"</h2>";
	die;
}

echo "<pre>";


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

$web_cp_adsl_onlineOrderInfoArray = array();
$web_cp_adsl_onlineOrderInfoArray = $netcubehub_db -> rawQuery("select orderNumber, status, documentKey, documentStatus, documentKeySync, email, applicationDate from web_cp_adsl_onlineOrderInfo order by orderNumber desc");
if ($web_cp_adsl_onlineOrderInfoArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to select table web_cp_adsl_onlineOrderInfo" .
			"</h2>";
	die;
}
//var_dump($web_cp_adsl_onlineOrderInfoArray); die;


$web_cp_nbn_onlineOrderInfoArray = array();
$web_cp_nbn_onlineOrderInfoArray = $netcubehub_db -> rawQuery("select orderNumber, status, documentKey, documentStatus, documentKeySync, email, applicationDate from web_cp_nbn_onlineOrderInfo order by orderNumber desc");
if ($web_cp_nbn_onlineOrderInfoArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to select table web_cp_nbn_onlineOrderInfo" .
			"</h2>";
	die;
}
//var_dump($web_cp_nbn_onlineOrderInfoArray); die;


$web_onlineOrderInfoArray = array();
$web_onlineOrderInfoArray = $netcubehub_db -> rawQuery("select orderNumber, status, documentKey, documentStatus, email, applicationDate from web_onlineOrderInfo order by orderNumber desc");
if ($web_onlineOrderInfoArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to select table web_onlineOrderInfo" .
			"</h2>";
	die;
}
//var_dump($web_onlineOrderInfoArray); die;


$foundRecord_count 		= 0;
$duplicatedRecord_count = 0;
$duplicatedUnique_count = 0;
$suspiciousRecord_count = 0;
$emptyEmailRecord_count = 0;
$successfulRecord_count = 0;
//$file 				= fopen("emersion.csv","w");
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
	
	if (empty($em_customerListing_email)) {
		$emptyEmailRecord_count ++;
		/*		*/
		 updateDB(	$em_customerListing_emersion, $em_customerListing_name, $em_customerListing_email,
			 		$em_customerListing_status, $em_customerListing_date, "", "",
			 		"", "", "", "none/empty email", "");
		//echo "$loop: Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($em_customerListing_email) Creation:($em_customerListing_date) <br>";
		continue;
	}

	/*		*/
	for ($i=0; $i<sizeof($web_onlineOrderInfoArray); $i++) {
		$email = strtolower(trim($web_onlineOrderInfoArray[$i]['email']));
		if ($em_customerListing_email == $email) {
			$matched 	= true;
			{
				$source				= "onlineOrder";
				$orderNumber		= trim($web_onlineOrderInfoArray[$i]['orderNumber']);
				$status				= trim($web_onlineOrderInfoArray[$i]['status']);
				$date				= trim($web_onlineOrderInfoArray[$i]['applicationDate']);
				$diff				= strtotime($em_customerListing_date . " 23:59:59") - strtotime($date);
				$documentKey		= $web_onlineOrderInfoArray[$i]['documentKey'];
				$documentStatus		= $web_onlineOrderInfoArray[$i]['documentStatus'];
				$documentKeySync	= "";
				if (is_null($documentKey)) 		$documentKey	= ""; 
				if (is_null($documentStatus))	$documentStatus	= ""; 
				$duplication[$matched_count ++] = array("orderNumber" => $orderNumber, "status" => $status, 
													"orderDate" => $date, "orderSource" => $source, 
													"documentKey" => $documentKey, "documentStatus" => $documentStatus, 
													"documentKeySync" => $documentKeySync, "diff" => $diff);
			}
		}
	}
	
	
	/*		*/
	for ($i=0; $i<sizeof($web_cp_adsl_onlineOrderInfoArray); $i++) {
		$email = strtolower(trim($web_cp_adsl_onlineOrderInfoArray[$i]['email']));
		if ($em_customerListing_email == $email) {		
			$matched 	= true;
			{
				$source				= "cp_adsl_onlineOrder";
				$orderNumber		= trim($web_cp_adsl_onlineOrderInfoArray[$i]['orderNumber']);
				$status				= trim($web_cp_adsl_onlineOrderInfoArray[$i]['status']);
				$date				= trim($web_cp_adsl_onlineOrderInfoArray[$i]['applicationDate']);
				$diff				= strtotime($em_customerListing_date . " 23:59:59") - strtotime($date);
				$documentKey		= $web_cp_adsl_onlineOrderInfoArray[$i]['documentKey'];
				$documentStatus		= $web_cp_adsl_onlineOrderInfoArray[$i]['documentStatus'];
				$documentKeySync	= $web_cp_adsl_onlineOrderInfoArray[$i]['documentKeySync'];
				if (is_null($documentKey)) 		$documentKey	= "";
				if (is_null($documentStatus))	$documentStatus	= "";
				if (is_null($documentKeySync)) 	$documentKeySync= "";
				$duplication[$matched_count ++] = array("orderNumber" => $orderNumber, "status" => $status, 
													"orderDate" => $date, "orderSource" => $source, 
													"documentKey" => $documentKey, "documentStatus" => $documentStatus, 
													"documentKeySync" => $documentKeySync, "diff" => $diff);
			}
		}
	}
	
	/*		*/
	for ($i=0; $i<sizeof($web_cp_nbn_onlineOrderInfoArray); $i++) {
		$email = strtolower(trim($web_cp_nbn_onlineOrderInfoArray[$i]['email']));
		if ($em_customerListing_email == $email) {
			$matched 	= true;
			{
				$source				= "cp_nbn_onlineOrder";
				$orderNumber		= trim($web_cp_nbn_onlineOrderInfoArray[$i]['orderNumber']);
				$status				= trim($web_cp_nbn_onlineOrderInfoArray[$i]['status']);
				$date				= trim($web_cp_nbn_onlineOrderInfoArray[$i]['applicationDate']);
				$diff				= strtotime($em_customerListing_date . " 23:59:59") - strtotime($date);
				$documentKey		= $web_cp_nbn_onlineOrderInfoArray[$i]['documentKey'];
				$documentStatus		= $web_cp_nbn_onlineOrderInfoArray[$i]['documentStatus'];
				$documentKeySync	= $web_cp_nbn_onlineOrderInfoArray[$i]['documentKeySync'];
				if (is_null($documentKey)) 		$documentKey	= "";
				if (is_null($documentStatus))	$documentStatus	= "";
				if (is_null($documentKeySync)) 	$documentKeySync= "";
				$duplication[$matched_count ++] = array("orderNumber" => $orderNumber, "status" => $status, 
													"orderDate" => $date, "orderSource" => $source, 
													"documentKey" => $documentKey, "documentStatus" => $documentStatus, 
													"documentKeySync" => $documentKeySync, "diff" => $diff);
			}
		}
	}
	
	if ($matched) {
		$foundRecord_count++;
		//fputcsv($file,explode(',',"$customerId,$customerName,$customerEmail,$customerCreatedDate"));
		if ($matched_count > 1) {
			$duplicatedRecord_count ++;
			
			$loop_time_matched_count				= 0;
			$loop_time_matched_count_location		= 0;
			$loop_time_late_than_order				= 0;
			$loop_time_late_than_order_location 	= 0;
			$loop_time_close_enough_order			= 0;
			$loop_time_close_enough_order_location	= 0;
			
			for ($i=0; $i<$matched_count; $i++) {
				$loop_diff	= strtotime($em_customerListing_date . " 23:59:59") - strtotime($duplication[$i]['orderDate']);
				if ($loop_diff > 0 && $loop_diff < 86400) {
					$loop_time_matched_count_location = $i;
					$loop_time_matched_count ++;
				}
				if ($loop_diff > 0 && $duplication[$i]['status'] != "Cancelled") {
					$loop_time_late_than_order_location = $i;
					$loop_time_late_than_order	++;

				}
				if ($loop_diff > 86400 && $loop_diff < 3*86400 && $duplication[$i]['status'] != "Cancelled") {
					$loop_time_close_enough_order_location = $i;
					$loop_time_close_enough_order	++;
				}
			}
			
			if ($loop_time_matched_count == 1) {
				$duplicatedUnique_count ++;
				$orderNumber	= $duplication[$loop_time_matched_count_location]['orderNumber'];
				$source			= $duplication[$loop_time_matched_count_location]['orderSource'];
				$documentKey	= $duplication[$loop_time_matched_count_location]['documentKey'];
				$documentStatus	= $duplication[$loop_time_matched_count_location]['documentStatus'];
				$documentKeySync= $duplication[$loop_time_matched_count_location]['documentKeySync'];
				$syncStatus		= "duplicated/unique";
				//echo "$loop duplicated unique($loop_time_matched_count_location/$matched_count): Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($matched_count $em_customerListing_email) Creation:($em_customerListing_date) <br>"; var_dump($duplication);
			}
			else if ($loop_time_late_than_order == 1) {
				$duplicatedUnique_count ++;
				$orderNumber	= $duplication[$loop_time_late_than_order_location]['orderNumber'];
				$source			= $duplication[$loop_time_late_than_order_location]['orderSource'];
				$documentKey	= $duplication[$loop_time_late_than_order_location]['documentKey'];
				$documentStatus	= $duplication[$loop_time_late_than_order_location]['documentStatus'];
				$documentKeySync= $duplication[$loop_time_late_than_order_location]['documentKeySync'];
				$syncStatus		= "duplicated/one later";
				//echo "$loop duplicated one later($loop_time_late_than_order_location/$matched_count): Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($matched_count $em_customerListing_email) Creation:($em_customerListing_date) <br>"; var_dump($duplication);
			}
			else if ($loop_time_close_enough_order == 1) {
				$duplicatedUnique_count ++;
				$orderNumber	= $duplication[$loop_time_close_enough_order_location]['orderNumber'];
				$source			= $duplication[$loop_time_close_enough_order_location]['orderSource'];
				$documentKey	= $duplication[$loop_time_close_enough_order_location]['documentKey'];
				$documentStatus	= $duplication[$loop_time_close_enough_order_location]['documentStatus'];
				$documentKeySync= $duplication[$loop_time_close_enough_order_location]['documentKeySync'];
				$syncStatus		= "duplicated/close enough";
				//echo "$loop duplicated close enough($loop_time_close_enough_order_location/$matched_count): Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($matched_count $em_customerListing_email) Creation:($em_customerListing_date) <br>"; var_dump($duplication);
			}
			else {
				$orderNumber	= "";
				$source			= "";
				$documentKey	= "";
				$documentStatus	= "";
				$documentKeySync= "";
				$syncStatus		= "duplicated/none matched";
				//echo "$loop duplicated($loop_time_matched_count/$matched_count): Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($matched_count $em_customerListing_email) Creation:($em_customerListing_date) <br>"; var_dump($duplication);
			}
			/*		*/
			updateDB(	$em_customerListing_emersion, $em_customerListing_name, $em_customerListing_email,
						$em_customerListing_status, $em_customerListing_date, $orderNumber, $source,
						$documentKey, $documentStatus, $documentKeySync, $syncStatus, json_encode($duplication));
		}
		else if ( $matched_count = 1 && $diff < 0 ) {
			$suspiciousRecord_count ++;
			/*		*/
			updateDB(	$em_customerListing_emersion, $em_customerListing_name, $em_customerListing_email,
				 		$em_customerListing_status, $em_customerListing_date, $orderNumber, $source,
				 		$documentKey, $documentStatus, $documentKeySync, "suspicious", json_encode($duplication));
			//echo "$loop suspicious: Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($matched_count $em_customerListing_email) Creation:($em_customerListing_date) <br>"; var_dump($duplication);
		}
		else if ($matched_count = 1) {
			$successfulRecord_count ++;
			/*		*/
			updateDB(	$em_customerListing_emersion, $em_customerListing_name, $em_customerListing_email, 
						$em_customerListing_status, $em_customerListing_date, $orderNumber, $source, 
						$documentKey, $documentStatus, $documentKeySync, "unique", json_encode($duplication));
			//echo "$loop: Emersion($em_customerListing_emersion) name:($em_customerListing_name) Email:($matched_count $em_customerListing_email) Creation:($em_customerListing_date) <br>";	var_dump($duplication);
		}
		else {
			echo "Something impossible has happened for Emersion($em_customerListing_emersion)!";
		}
	}
	else {
		$orderNumber	= "";
		$source			= "";
		$documentKey	= "";
		$documentStatus	= "";
		$documentKeySync= "";
		$syncStatus		= "none/none matched";
		/*		*/
		updateDB(	$em_customerListing_emersion, $em_customerListing_name, $em_customerListing_email,
					$em_customerListing_status, $em_customerListing_date, $orderNumber, $source,
					$documentKey, $documentStatus, $documentKeySync, $syncStatus, "");
	}
}

echo "</pre>";
echo "<h2 id='result' name='result'>" . "$foundRecord_count/" . sizeof($em_customerListingArray) . " records with emails matched: successful($successfulRecord_count) duplicated($duplicatedUnique_count/$duplicatedRecord_count) suspicious($suspiciousRecord_count)" . "</h2>";


function updateDB($emersionId, $emersionName, $emersionEmail, $emersionStatus, $emersionCreation, $orderNumber, $source, $documentKey, $documentStatus, $documentKeySync, $syncStatus, $syncInfoJson) {
	
	global $netcubehub_db;
	$table_Data 				= Array (
		"emersionId"			=> $emersionId,
		"emersionName"			=> $emersionName,
		"emersionEmail"			=> $emersionEmail,
		"emersionStatus"		=> $emersionStatus,
		"emersionCreation"		=> $emersionCreation,
		"orderNumber"			=> $orderNumber,
		"source"				=> $source,
		"documentKey"			=> $documentKey,
		"documentStatus"		=> $documentStatus,
		"documentKeySync"		=> $documentKeySync,
		"syncStatus"			=> $syncStatus,
		"syncInfoJson"			=> $syncInfoJson
	);

	$netcubehub_db				-> where("emersionId", $emersionId);
	$table_Array				= $netcubehub_db -> get("web_due_diligence_info");
	if ($table_Array == NULL) {
		if (!$netcubehub_db	-> insert("web_due_diligence_info", $table_Data)) {
			echo 	"<h2 id='result' name='result'>" .
					"Fail to insert table web_due_diligence_info for (" . $emersionId . "/" . $emersionName . "/" . $emersionStatus . "): " . $netcubehub_db->getLastError() .
					"</h2>";
			die;
		}
	}
	else {
		$netcubehub_db		-> where("emersionId", $emersionId);
		if (!$netcubehub_db	-> update("web_due_diligence_info", $table_Data)) {
			echo 	"<h2 id='result' name='result'>" .
					"Fail to update table web_due_diligence_info for (" . $emersionId . "/" . $emersionName . "/" . $emersionStatus . "): " . $netcubehub_db->getLastError() .
					"</h2>";
			die;
		}
	}
}
?>