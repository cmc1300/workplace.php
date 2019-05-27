<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/checkIfOrderPDFFileExisted.php
 */
require_once '../../includes/class/MysqliDb.php';

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db == NULL) {
	echo("Failed to connect NetCube database: " . $netcubehub_db->getLastError() . "<br>");
	die;
}

$loopCount 			= 0;
$onlineOrderTable 	= "";
while ( ($loopCount) < 2 ) {
	if ($loopCount == 0) {
		$onlineOrderTable 	= "web_cp_adsl_onlineOrderInfo";
	}
	else if ($loopCount == 1) {
		$onlineOrderTable 	= "web_cp_nbn_onlineOrderInfo";
	}
	$loopCount ++;
	echo "<h2>$onlineOrderTable</h2>";
	$table_row_count 	= -1;
	$table_succ_count 	= 0;
	
	$netcubehub_db		-> where("1 = 1");
	$netcubehub_db 		-> orderBy("orderNumber", "asc");
	$table_array		= $netcubehub_db -> get($onlineOrderTable);
	if ($table_array == NULL) {
		echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
		die;
	}
	//echo "<pre>";	echo sizeof($table_array) . " "; var_dump($table_array);	echo "</pre>"; die;
	
	while ( ($table_row_count ++) < (sizeof($table_array)-1) ) {	
		
		$orderNumber 		= trim($table_array[$table_row_count]['orderNumber']);
		$pdfFileForReview	= "";
		
		if (file_exists("netcube.website.depot/contract-credit-$orderNumber.pdf")) {
			$table_succ_count ++;
			$pdfFileForReview = "contract-credit-$orderNumber.pdf";
			echo "contract-credit: $pdfFileForReview" . "<br>";
		}
		else if (file_exists("netcube.website.depot/contract-form-$orderNumber.pdf")) {
			$table_succ_count ++;
			$pdfFileForReview = "contract-form-$orderNumber.pdf";
			echo "contract-form: $pdfFileForReview" . "<br>";
		}
		else if (file_exists("netcube.website.depot/fdf-credit-$orderNumber.fdf")) {
			$table_succ_count ++;
			$pdfFileForReview = "fdf-credit-$orderNumber.fdf";
			echo "fdf-credit: $pdfFileForReview" . "<br>";
		}
		else if (file_exists("netcube.website.depot/fdf-form-$orderNumber.fdf")) {
			$table_succ_count ++;
			$pdfFileForReview = "fdf-form-$orderNumber.fdf";
			echo "fdf-form: $pdfFileForReview" . "<br>";
		}
		
		$web_cp_onlineOrderInfo_Data = Array (
				"orderNumber"			=> $orderNumber,
				"pdfFileForReview"		=> "http://netcube.com.au/depot/" . $pdfFileForReview,
		);
		
		if ( !empty($pdfFileForReview) ) {
			$netcubehub_db		-> where("orderNumber", $orderNumber);
			if (!$netcubehub_db->update($onlineOrderTable, $web_cp_onlineOrderInfo_Data)) {
				echo("Failed to update table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>"); 
				die;
			}
		}
		//echo "<pre>";	echo $table_row_count . " "; var_dump($web_cp_onlineOrderInfo_Data);	echo "</pre>"; 
	}
	
	echo "Table $onlineOrderTable has " . sizeof($table_array) . " records in all <br>";
	echo "Table $onlineOrderTable has $table_succ_count records successfully matched <br>";
}
?>