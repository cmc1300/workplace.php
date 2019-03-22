<?php

/*
 * http://amandawei.com/tiens/maintenance/export_table_distributor_bonus/export_to_table_tiens_distributor_bonus.php?state=AU&&filename=AU_201710
 * http://amandawei.com/tiens/maintenance/export_table_distributor_bonus/export_to_table_tiens_distributor_bonus.php?state=NZ&&filename=NZ_201709
 */

require_once '../class/MysqliDb.php';
//echo json_encode($_REQUEST);

$tiens_distributor_table 	= "tiens_distributor_bonus_test";
$filename 					= trim($_REQUEST ['filename']);
$state	 					= strtoupper(trim($_REQUEST ['state']));
if (empty($filename) || empty($state) || ($state!="AU" && $state!="NZ")) {
	echo "Failed to get expected input parameters";
	die;
}
$filename 	= trim($_REQUEST ['filename']) . ".csv";

$netcubehub_db	= new MysqliDb ( "127.0.0.1","amam8224_amanda","xgp_950254", "amam8224_mouse" );
if ($netcubehub_db == NULL)
{
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "Fail to connect Amanda database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);
	die;
}
else {
	//var_dump($netcubehub_db); die;
}

/* */
$file = fopen($filename, 'r');
if (!$file) {
	echo "Failed to open file $filename";
	die;
}
$line = fgetcsv($file);

while (($line = fgetcsv($file)) !== FALSE) {	
	$distributor_id 	= trim($line[4]);
	//$full_name 		= ucwords(strtolower($line[1]));
	$period				= trim($line[1]);
	$period				= str_pad($period,8,"0");
	$type				= trim($line[3]);
	$bonus_usd			= number_format(trim($line[6]),2);
	$usd_aud_rate		= number_format(trim($line[7]),2);
	$bonus_aud			= number_format(trim($line[8]),2) + number_format(trim($line[9]),2);
	$batch_number		= trim($line[0]);
	$bank_bsb			= trim($line[19]);
	$bank_account		= trim($line[18]);
	$bank_name			= ucwords(strtolower($line[5]));
	$comment			= "$bank_bsb/$bank_account/$bank_name";
	print_r($line);
	echo "<br>";
	echo "distributor_id: $distributor_id period: $period type:$type batch_number:$batch_number<br>";
	echo "bonus_usd: $bonus_usd($usd_aud_rate) bonus_aud:$bonus_aud comment:$comment<br><br>";
	//continue;
   
   $table_Data = Array (
   		"distributor_id"	=> $distributor_id,
   		"state"				=> $state,
   		"period"			=> $period,
   		"type"				=> $type,
   		"bonus_usd"			=> $bonus_usd,
   		"usd_aud_rate"		=> $usd_aud_rate,
   		"bonus_aud"			=> $bonus_aud,
   		"batch_number"		=> $batch_number,
   		"comment"			=> $comment
   		);
   if (!$netcubehub_db->insert($tiens_distributor_table, $table_Data)) {
   		echo("Failed to insert table $tiens_distributor_table: " . $netcubehub_db->getLastError() . "<br>");
   		die;
   }
    
}

mysqli_close($netcubehub_db);
fclose($file);
die;
?>