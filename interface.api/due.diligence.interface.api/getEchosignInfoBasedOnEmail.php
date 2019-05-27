<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/getEchosignInfoBasedOnEmail.php?onlineOrderTable=web_cp_adsl_onlineOrderInfo&orderNumber=order-ADSL-0671
 */
require_once '../../includes/class/MysqliDb.php';

$time_interval 			= 3;
$onlineOrderTable 		= "";
$onlineOrderTable_count = 0;
$echosignOrderInfo		= "web_echosignOrderInfo";
$echosignOrderInfo_count= 0;
$cpTVBundleTable 		= "zy_order_entertainment";
$cpTVBundleTable_count 	= 0;
if ( isset($_REQUEST['onlineOrderTable']) && !empty($_REQUEST['onlineOrderTable']) ) {
	$onlineOrderTable = trim($_REQUEST['onlineOrderTable']);
}
else {
	//echo("Fail to get the mandatory parameter email");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to get the mandatory parameter onlineOrderTable" .
			"</h2>";
	die;
}
if ( isset($_REQUEST['orderNumber']) && !empty($_REQUEST['orderNumber']) ) {
	$orderNumber = trim($_REQUEST['orderNumber']);
}
else {
	//echo("Fail to get the mandatory parameter email");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to get the mandatory parameter orderNumber" .
			"</h2>";
	die;
}

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db 	== NULL) {
	//echo("Fail to connect NetCube database: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to connect NetCube database: " . $netcubehub_db->getLastError() .
			"</h2>";
	die;
}

$cp_db 		= new MysqliDb("103.26.62.234","cpnetcub","f78e5dF","cpnetcub_cp");
if ($cp_db 	== NULL) {
	//echo("Failed to connect CP database: " . $cp_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Failed to connect CP database: " . $cp_db->getLastError() .
			"</h2>";
	die;
}

echo "<pre>";
for ($i=0; $i<1; $i++) {
	$table = array();
	
	try {
		$netcubehub_db		-> where("orderNumber", $orderNumber);
		$netcubehub_db 		-> orderBy("orderNumber", "asc");
		$table_array		= $netcubehub_db -> get($onlineOrderTable);
		if ($table_array == NULL) {
			//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
			echo 	"<h2 id='result' name='result'>" . 
					"$orderNumber not found in table $onlineOrderTable" . 
					"</h2>";
			die;
		}
		$onlineOrderTable_count							= sizeof($table_array);
		$table[$onlineOrderTable]['orderNumber'] 		= $table_array[0]['orderNumber'];
		$table[$onlineOrderTable]['documentKey'] 		= $table_array[0]['documentKey'];
		$table[$onlineOrderTable]['documentStatus'] 	= $table_array[0]['documentStatus'];
		$table[$onlineOrderTable]['name'] 				= $table_array[0]['firstName'] . " " . $table_array[0]['lastName'];
		$table[$onlineOrderTable]['email'] 				= $table_array[0]['email'];
		$email											= $table_array[0]['email'];
		$table[$onlineOrderTable]['applicationDate']	= $table_array[0]['applicationDate'];
		$onlineOrder_date								= $table_array[0]['applicationDate'];
		
		$netcubehub_db		-> where("email", $email);
		$netcubehub_db 		-> orderBy("id", "asc");
		$table_array		= $netcubehub_db -> get($echosignOrderInfo);
		if ($table_array == NULL) {
			//echo("Error when selecting table $echosignOrderInfo: " . $netcubehub_db->getLastError() . "<br>");
			updateDB($orderNumber, $orderNumber, "", "", "", "none", $table[$onlineOrderTable]['name']);
			echo 	"<h2 id='result' name='result'>" .
					"$email/$orderNumber not found in table $echosignOrderInfo" .
					"</h2>";
			die;
		}
		$echosignOrderInfo_count						= sizeof($table_array);
		if ($echosignOrderInfo_count==1) {
			$table[$echosignOrderInfo]['orderNumber'] 		= $table_array[0]['orderNumber'];
			$table[$echosignOrderInfo]['documentKey'] 		= $table_array[0]['documentKey'];
			$table[$echosignOrderInfo]['status'] 			= $table_array[0]['status'];
			$table[$echosignOrderInfo]['name'] 				= $table_array[0]['name'];
			$table[$echosignOrderInfo]['email'] 			= $table_array[0]['email'];
			$table[$echosignOrderInfo]['date']				= $table_array[0]['date'];
			$echosignInfo_date								= $table_array[0]['date'];
			$table[$echosignOrderInfo]['doc_type']			= $table_array[0]['doc_type'];
			echo "$echosignOrderInfo_count record has been found in table $echosignOrderInfo: $orderNumber/$email<br><br>";
		}
		else {
			for ($i=0; $i<$echosignOrderInfo_count; $i++) {
				$table[$echosignOrderInfo]['orderNumber'] 		= $table_array[$i]['orderNumber'];
				$table[$echosignOrderInfo]['documentKey'] 		= $table_array[$i]['documentKey'];
				$table[$echosignOrderInfo]['status'] 			= $table_array[$i]['status'];
				$table[$echosignOrderInfo]['name'] 				= $table_array[$i]['name'];
				$table[$echosignOrderInfo]['email'] 			= $table_array[$i]['email'];
				$table[$echosignOrderInfo]['date']				= $table_array[$i]['date'];
				$echosignInfo_date								= $table_array[$i]['date'];
				$table[$echosignOrderInfo]['doc_type']			= $table_array[$i]['doc_type'];
				$echosignInfo_date 	= substr($echosignInfo_date, 0 , 19);
				$echosignInfo_date 	= str_replace("T"," ",$echosignInfo_date);
				$diff1				= strtotime($onlineOrder_date) - strtotime($echosignInfo_date);
				if ((abs($diff1 - 25200) <= $time_interval || abs($diff1 - 28800) <= $time_interval)) {
					$echosignOrderInfo_count = 1;
				}
			}
			echo "$echosignOrderInfo_count record has been found in table $echosignOrderInfo: $orderNumber/$email<br><br>";
		}
		
		$cp_db 					-> where("email", $email);
		$cp_db 					-> orderBy("orderNumber", "asc");
		$cp_array				= $cp_db -> get($cpTVBundleTable);
		$cpTVBundleTable_count	= sizeof($cp_array);
		
		$echosignInfo_date 	= substr($echosignInfo_date, 0 , 19);
		$echosignInfo_date 	= str_replace("T"," ",$echosignInfo_date);
		$diff1				= strtotime($onlineOrder_date) - strtotime($echosignInfo_date);
		if ($cpTVBundleTable_count == 0) {
			$diff2	= 0;
			echo $onlineOrder_date . "/" . $echosignInfo_date . "/" . $diff1 . "/" . $diff2 . "<br><br>";
		}
		else if ($cpTVBundleTable_count == 1) {
			$table[$cpTVBundleTable]['orderNumber'] 		= $cp_array[0]['orderNumber'];
			$table[$cpTVBundleTable]['documentKey'] 		= $cp_array[0]['documentKey'];
			$table[$cpTVBundleTable]['dealercode'] 			= $cp_array[0]['dealercode'];
			$table[$cpTVBundleTable]['create_time'] 		= $cp_array[0]['create_time'];
			$cpTVBundleTable_create_time			 		= $cp_array[0]['create_time'];
			$diff2	= strtotime($cpTVBundleTable_create_time) - strtotime($onlineOrder_date);
			echo $onlineOrder_date . "/" . $echosignInfo_date . "/" . $cpTVBundleTable_create_time . "/" . $diff1 . "/" . $diff2 . "<br><br>";
		}
		else {
			for ($i=0; $i<$cpTVBundleTable_count; $i++) {
				$table[$cpTVBundleTable]['orderNumber'] 		= $cp_array[$i]['orderNumber'];
				$table[$cpTVBundleTable]['documentKey'] 		= $cp_array[$i]['documentKey'];
				$table[$cpTVBundleTable]['dealercode'] 			= $cp_array[$i]['dealercode'];
				$table[$cpTVBundleTable]['create_time'] 		= $cp_array[$i]['create_time'];
				$cpTVBundleTable_create_time			 		= $cp_array[$i]['create_time'];
				$diff2	= strtotime($cpTVBundleTable_create_time) - strtotime($onlineOrder_date);
				if ((abs($diff2 - 36000) <= $time_interval || abs($diff2 - 39600) <= $time_interval)) {
					$cpTVBundleTable_count = 1;
				}
			}
			echo $onlineOrder_date . "/" . $echosignInfo_date . "/" . $cpTVBundleTable_create_time . "/" . $diff1 . "/" . $diff2 . "<br><br>";
		}
		echo "$cpTVBundleTable_count record has been found in table $cpTVBundleTable: $orderNumber/$email<br><br>";
		
		if ( strtotime($onlineOrder_date) < strtotime("2014-10-20 00:00:00") ) {
			var_dump($table);
			updateDB($orderNumber, $orderNumber, "", "", "", "none", $table[$onlineOrderTable]['name']);
			echo 	"<h2 id='result' name='result'>" .
					"$email/$orderNumber was generated earlier than EchoSign system was born" .
					"</h2>";
		}
		else if ($onlineOrderTable_count==1 && $echosignOrderInfo_count==1 && $cpTVBundleTable_count == 1 && 
				(abs($diff1 - 25200) <= $time_interval || abs($diff1 - 28800) <= $time_interval) && 
				(abs($diff2 - 36000) <= $time_interval || abs($diff2 - 39600) <= $time_interval) ) {
			var_dump($table);
			updateDB($orderNumber, $table[$cpTVBundleTable]['orderNumber'], $table[$cpTVBundleTable]['documentKey'], $table[$echosignOrderInfo]['status'], $table[$echosignOrderInfo]['documentKey'], "succeed/$diff1/$diff2", $table[$onlineOrderTable]['name']);
			echo 	"<h2 id='result' name='result'>" .
					"Succeed to update table $onlineOrderTable for (" . $diff1 . "/" . $diff2 . "/" . $table[$onlineOrderTable]['name'] . "/" . $email . "/" . $orderNumber . ")" .
					"</h2>";
		}
		else if ( $onlineOrderTable_count==1 && $echosignOrderInfo_count==1 && $cpTVBundleTable_count == 1 && 
				( (abs($diff1 - 25200) >= $time_interval && abs($diff1 - 28800) >= $time_interval) || 
				( (abs($diff2 - 36000) >= $time_interval && abs($diff2 - 39600) >= $time_interval) ) ) ) {
			var_dump($table);
			updateDB($orderNumber, $orderNumber, $table[$cpTVBundleTable]['documentKey'], $table[$echosignOrderInfo]['status'], $table[$echosignOrderInfo]['documentKey'], "suspicious/$diff1/$diff2", $table[$onlineOrderTable]['name']);
			echo 	"<h2 id='result' name='result'>" .
					"Manual checkup for mismatched timestamp (" . $diff1 . "/" . $diff2 . "/" . $table[$onlineOrderTable]['name'] . "/" . $email . "/" . $orderNumber . "/"  . $onlineOrder_date . "/" . $echosignInfo_date . "/" . $cpTVBundleTable_create_time . ")" .
					"</h2>";
		}
		else if ($onlineOrderTable_count==1 && $echosignOrderInfo_count==1 && $cpTVBundleTable_count == 0 &&
				(abs($diff1 - 25200) <= $time_interval || abs($diff1 - 28800) <= $time_interval) ) {
			var_dump($table);
			updateDB($orderNumber, $orderNumber, $table[$onlineOrderTable]['documentKey'], $table[$echosignOrderInfo]['status'], $table[$echosignOrderInfo]['documentKey'], "succeed/$diff1/$diff2", $table[$onlineOrderTable]['name']);
			echo 	"<h2 id='result' name='result'>" .
					"Succeed to update table $onlineOrderTable for (" . $diff1 . "/" . $diff2 . "/" . $table[$onlineOrderTable]['name'] . "/" . $email . "/" . $orderNumber . ")" .
					"</h2>";
		}
		else if ( $onlineOrderTable_count==1 && $echosignOrderInfo_count==1 && $cpTVBundleTable_count == 0 &&
				( (abs($diff1 - 25200) >= $time_interval && abs($diff1 - 28800) >= $time_interval) ) ) {
			var_dump($table);
			updateDB($orderNumber, $orderNumber, $table[$onlineOrderTable]['documentKey'], $table[$echosignOrderInfo]['status'], $table[$echosignOrderInfo]['documentKey'], "suspicious/$diff1/$diff2", $table[$onlineOrderTable]['name']);
			echo 	"<h2 id='result' name='result'>" .
					"Manual checkup for mismatched timestamp (" . $diff1 . "/" . $diff2 . "/" . $table[$onlineOrderTable]['name'] . "/" . $email . "/" . $orderNumber . "/"  . $onlineOrder_date . "/" . $echosignInfo_date . ")" .
					"</h2>";
		}
		else {
			var_dump($table); 
			updateDB($orderNumber, $orderNumber, "", "", "", "duplicated", $table[$onlineOrderTable]['name']);
			echo 	"<h2 id='result' name='result'>" .
					"Manual operation for duplicated keys (" . $table[$onlineOrderTable]['name'] . "/" . $email . "/" . $orderNumber . ")" .
					"</h2>";
		}
		
		die;
	}
	catch (Exception $e) {
	    //echo 'Running exception: ' .  $e->getMessage() . "<br>";
	    echo 	"<h2 id='result' name='result'>" .
	    		"Running exception: " .  $e->getMessage() .
	    		"</h2>";
	    die;
	} 
}
echo "</pre>";

function updateDB($orderNumber, $new_orderNumber, $documentKey, $status, $documentKeySync, $documentKeySyncStatus, $name) {
	global $netcubehub_db, $onlineOrderTable, $email, $orderNumber;
	$onlineOrderTable_Data 			= Array (
			"orderNumber"			=> $new_orderNumber,
			"documentKey"			=> $documentKey,
			"documentStatus"		=> $status,
			"documentKeySync"		=> $documentKeySync,
			"documentKeySyncStatus"	=> $documentKeySyncStatus,
	);
		
	$netcubehub_db		-> where("orderNumber", $orderNumber);
	if (!$netcubehub_db	-> update($onlineOrderTable, $onlineOrderTable_Data)) {
		//echo("Fail to update table $onlineOrderTable for (" . $table[$onlineOrderTable]['name'] . "/" . $email . "): " . $netcubehub_db->getLastError() . "<br>");
		echo 	"<h2 id='result' name='result'>" .
				"Fail to update table $onlineOrderTable for (" . $name . "/" . $email . "/" . $orderNumber . "): " . $netcubehub_db->getLastError() .
				"</h2>";
		die;
	}
}

?>