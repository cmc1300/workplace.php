<?php
/*
 * 1. download /public_html/projects/netcube/echosign/due_diligence/SIGNED/* to C:\Jerry.xu\phpworkspace\netcube\website\api.netcube.com.au\projects\netcube\echosign\due_diligence\year2015\source
 * 2. download /public_html/projects/netcube/echosign/due_diligence/APPROVED/* to C:\Jerry.xu\phpworkspace\netcube\website\api.netcube.com.au\projects\netcube\echosign\due_diligence\year2015\source
 * 3. download 14.137.150.88 /public_html/order_form/pdf to C:\Jerry.xu\phpworkspace\netcube\website\api.netcube.com.au\projects\netcube\echosign\due_diligence\year2015\source
 * http://api.netcube.com.au/projects/netcube/echosign/finalcial_year_2015_Hongbin.php
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
	echo 	"<h2 id='result' name='result'>" . "Fail to connect NetCube database: " . $netcubehub_db->getLastError() . "</h2>";
	die;
}

$loopCount 			= 0;
$onlineOrderTable 	= "web_due_diligence_info";

$loopCount ++;
echo "<h2>$onlineOrderTable</h2>";
$table_row_count 	= -1;
$table_succ_count 	= 0;

//$netcubehub_db		-> where("emersionCreation > '2014-07' AND emersionCreation < '2015-07' AND processStatus LIKE  'OK'");
$netcubehub_db		-> where("processStatus LIKE  'OK'");
$netcubehub_db 		-> orderBy("emersionId", "desc");
$table_array		= $netcubehub_db -> get($onlineOrderTable);
if ($table_array == NULL) {
	echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	die;
}
echo "<pre>";	echo sizeof($table_array) . " " . $_SERVER['PHP_SELF']; echo "</pre>"; //die;
//echo "<pre>";	echo sizeof($table_array) . " "; var_dump($table_array);	echo "</pre>"; die;

while ( ($table_row_count ++) < (sizeof($table_array)-1) ) {	
	
	$emersionId			= trim($table_array[$table_row_count]['emersionId']);
	$orderNumber 		= trim($table_array[$table_row_count]['orderNumber']);
	$pdfFileSource		= "";
	$pdfFileDestination	= "";
	
	if (!isset($orderNumber) || empty($orderNumber)) {
		echo "$emersionId has NO contract-file:" . "<br>";
	}
	else if (file_exists("due_diligence/year2015/source/$orderNumber.pdf")) { //  /projects/netcube/echosign/due_diligence/year2015/source/$orderNumber.pdf
		$table_succ_count ++;
		$pdfFileSource 		= "due_diligence/year2015/source/$orderNumber.pdf";
		$pdfFileDestination	= "due_diligence/year2015/contract/$emersionId.pdf";
		//echo "contract-file: $pdfFileSource" . "<br>";
		if (!file_exists($pdfFileDestination)) {
			echo "$emersionId: " . copy($pdfFileSource, $pdfFileDestination). "<br>";
		}
	}
	else {
		$pdfFileSource = "due_diligence/year2015/source/$orderNumber.pdf";
		echo "missing contract-file: $emersionId $pdfFileSource" . "<br>";
	}
	
	/*
	$web_cp_onlineOrderInfo_Data = Array (
			"orderNumber"			=> $orderNumber,
			"pdfFileForReview"		=> "http://netcube.com.au/depot/" . $pdfFileSource,
	);
	
	if ( !empty($pdfFileSource) ) {
		$netcubehub_db		-> where("orderNumber", $orderNumber);
		if (!$netcubehub_db->update($onlineOrderTable, $web_cp_onlineOrderInfo_Data)) {
			echo("Failed to update table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>"); 
			die;
		}
	}*/
}

echo "<br>";
echo "Table $onlineOrderTable has " . sizeof($table_array) . " records in all <br>";
echo "Table $onlineOrderTable has $table_succ_count records successfully matched <br>";
?>