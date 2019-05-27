<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/finalDueDiligenceSyncEmersion.php?emersionId=1397234
 */
require_once '../../includes/class/MysqliDb.php';

/*		*/
if ( isset($_REQUEST['emersionId']) && is_numeric($_REQUEST['emersionId']) ) {
	$emersionId = trim($_REQUEST['emersionId']);
}
else {
	echo "<h2 id='result' name='result'>Fail to get the mandatory parameter emersionId</h2>";
	die;
} 

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db == NULL) {
	echo 	"<h2 id='result' name='result'>" .
			"Fail to connect NetCube database: " . $netcubehub_db->getLastError() .
			"</h2>";
	die;
}

echo "<pre>";

$netcubehub_db				-> where("emersionId", $emersionId);
$netcubehub_db 				-> orderBy("emersionId", "desc");
$web_due_diligence_infoArray= $netcubehub_db -> get("web_due_diligence_info");
if ($web_due_diligence_infoArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"$emersionId not found in table web_due_diligence_info" .
			"</h2>";
	die;
}
var_dump($web_due_diligence_infoArray); //die;

$uploaded				= false;
$message				= "";
$orderNumber			= $web_due_diligence_infoArray[0]['orderNumber'];
$syncStatus				= $web_due_diligence_infoArray[0]['syncStatus'];
$documentStatus			= $web_due_diligence_infoArray[0]['documentStatus'];


if ( $syncStatus == 'unique' ) {
	if ( !empty($orderNumber) && preg_match('/^\d+$/', $orderNumber)) {
		$aapt['action']			= "check_if_file_existed_on_depot";
		$aapt['order_number']	= $orderNumber;
		$result_url				= "http://api.netcube.com.au/projects/netcube/wamp/function.php";
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$result_url );
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
		$output 				= curl_exec($ch);
		/*	*/
		$outputArray 			= json_decode($output, true);
		if (true) {		//if ($documentStatus == "OUT_FOR_APPROVAL") {
			$outputArray['result'] = "NO";
		}
		var_dump($outputArray); //die;
		if ($outputArray['result'] == "OK") {
			//var_dump($outputArray);
			$info				= $outputArray['info'];
			$message 			= "emersionId $emersionId($syncStatus): contract file $info is already on the ftp server";
			$table_Data 		= array (
				"processStatus"		=> "OK",
				"processInfoJson"	=> json_encode(array(result=>"OK", info=>$message))
			);
			$netcubehub_db		-> where("emersionId", $emersionId);
			$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
		}
		else if ($outputArray['result'] == "NO") {
			//var_dump($outputArray);
			$documentKey		= $web_due_diligence_infoArray[0]['documentKey'];
			if ( empty($documentKey) ) {
				$documentKey	= $web_due_diligence_infoArray[0]['documentKeySync'];
			}
			
			if (!empty($documentKey)) {
				$aapt['syncStatus']		= "unique";
				$aapt['order_number']	= $orderNumber;
				$aapt['documentKey']	= $documentKey;
				$result_url				= "http://api.netcube.com.au/projects/netcube/echosign/getDocument_due_diligence.php";
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,$result_url );
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
				$output 			= curl_exec($ch);
				$outputArray 		= json_decode($output, true);
				var_dump($outputArray); //die;
				if ($outputArray['result'] == "OK") {
					$info				= $outputArray['info'];
					$message 			= "emersionId $emersionId($syncStatus): $info";
					$table_Data 		= array (
							"processStatus"		=> "OK",
							"documentStatus"	=> $outputArray['status'],
							"processInfoJson"	=> json_encode(array(result=>"OK", status=>$outputArray['status'], info=>$message))
					);
					$netcubehub_db		-> where("emersionId", $emersionId);
					$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
				}
				else {
					$info				= $outputArray['info'];
					$message 			= "emersionId $emersionId($syncStatus): $info";
					$table_Data 		= array (
							"processStatus"		=> "NOK",
							"documentStatus"	=> $outputArray['status'],
							"processInfoJson"	=> json_encode(array(result=>"NOK", status=>$outputArray['status'], info=>$message))
					);
					$netcubehub_db		-> where("emersionId", $emersionId);
					$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
				}
			}
			else {
				$message = "emersionId $emersionId($syncStatus): error due to empty document key";
				$table_Data 			= array (
						"processStatus"		=> "NOK",
						"processInfoJson"	=> json_encode(array(result=>"NOK", info=>$message))
				);
				$netcubehub_db		-> where("emersionId", $emersionId);
				$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
			}
		}
		else {
			$info				= $outputArray['info'];
			$message 			= "error due to $info";
			$table_Data 		= array (
					"processStatus"		=> "NOK",
					"processInfoJson"	=> json_encode(array(result=>"NOK", info=>$message))
			);
			$netcubehub_db		-> where("emersionId", $emersionId);
			$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
		}
	}
	else {
		$message = "emersionId $emersionId($syncStatus): error due to invalid order number $orderNumber";
		$table_Data 			= array (
				"processStatus"		=> "NOK",
				"processInfoJson"	=> json_encode(array(result=>"NOK", info=>$message))
		);
		$netcubehub_db			-> where("emersionId", $emersionId);
		$netcubehub_db			-> update("web_due_diligence_info", $table_Data);
	}
}


else {
	/*		
	if ( !empty($orderNumber) && preg_match('/^\d+$/', $orderNumber)) {
		$aapt['action']			= "check_if_file_existed_on_depot";
		$aapt['order_number']	= $orderNumber;
		$result_url				= "http://api.netcube.com.au/projects/netcube/wamp/function.php";
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$result_url );
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
		$output 				= curl_exec($ch);

		$outputArray 			= json_decode($output, true);
		if ($documentStatus == "OUT_FOR_APPROVAL") {
			$outputArray['result'] = "NO";
		}
		var_dump($outputArray); //die;
		if ($outputArray['result'] == "OK") {
			//var_dump($outputArray);
			$info				= $outputArray['info'];
			$message 			= "emersionId $emersionId($syncStatus): contract file $info is already on the ftp server";
			$table_Data 		= array (
				"processStatus"		=> "OK",
				"processInfoJson"	=> json_encode(array(result=>"OK", info=>$message))
			);
			$netcubehub_db		-> where("emersionId", $emersionId);
			$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
		}
		else if ($outputArray['result'] == "NO") {
			//var_dump($outputArray);
			$documentKey		= $web_due_diligence_infoArray[0]['documentKey'];
			if ( empty($documentKey) ) {
				$documentKey	= $web_due_diligence_infoArray[0]['documentKeySync'];
			}
			
			if (!empty($documentKey)) {
				if ($syncStatus == "suspicious") {
					$aapt['syncStatus']		= "suspicious";
				}
				else {
					$aapt['syncStatus']		= "duplicated";
				}
				$aapt['order_number']	= $orderNumber;
				$aapt['documentKey']	= $documentKey;
				$result_url				= "http://api.netcube.com.au/projects/netcube/echosign/getDocument_due_diligence.php";
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,$result_url );
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
				$output 			= curl_exec($ch);
				$outputArray 		= json_decode($output, true);
				var_dump($outputArray); //die;
				if ($outputArray['result'] == "OK") {
					$info				= $outputArray['info'];
					$message 			= "emersionId $emersionId($syncStatus): $info";
					$table_Data 		= array (
							"processStatus"		=> "OK",
							"documentStatus"	=> $outputArray['status'],
							"processInfoJson"	=> json_encode(array(result=>"OK", status=>$outputArray['status'], info=>$message))
					);
					$netcubehub_db		-> where("emersionId", $emersionId);
					$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
				}
				else {
					$info				= $outputArray['info'];
					$message 			= "emersionId $emersionId($syncStatus): $info";
					$table_Data 		= array (
							"processStatus"		=> "NOK",
							"documentStatus"	=> $outputArray['status'],
							"processInfoJson"	=> json_encode(array(result=>"NOK", status=>$outputArray['status'], info=>$message))
					);
					$netcubehub_db		-> where("emersionId", $emersionId);
					$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
				}
			}
			else {
				$message = "emersionId $emersionId($syncStatus): error due to empty document key";
				$table_Data 			= array (
						"processStatus"		=> "NOK",
						"processInfoJson"	=> json_encode(array(result=>"NOK", info=>$message))
				);
				$netcubehub_db		-> where("emersionId", $emersionId);
				$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
			}
		}
		else {
			$info				= $outputArray['info'];
			$message 			= "error due to $info";
			$table_Data 		= array (
					"processStatus"		=> "NOK",
					"processInfoJson"	=> json_encode(array(result=>"NOK", info=>$message))
			);
			$netcubehub_db		-> where("emersionId", $emersionId);
			$netcubehub_db		-> update("web_due_diligence_info", $table_Data);
		}
	}
	else {
		$message = "emersionId $emersionId($syncStatus): error due to invalid order number $orderNumber";
		$table_Data 			= array (
				"processStatus"		=> "NOK",
				"processInfoJson"	=> json_encode(array(result=>"NOK", info=>$message))
		);
		$netcubehub_db			-> where("emersionId", $emersionId);
		$netcubehub_db			-> update("web_due_diligence_info", $table_Data);
	}*/
}

echo "</pre>";
echo "<h2 id='result' name='result'>" . $message . "</h2>";
?>