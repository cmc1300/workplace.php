<?php

/*
 * http://amandawei.com/tiens/maintenance/export_table_distributor_info/export_to_table_tiens_distributor_info.php?state=AU&&filename=AU_Data
 * http://amandawei.com/tiens/maintenance/export_table_distributor_info/export_to_table_tiens_distributor_info.php?state=NZ&&filename=NZ_Data
 */

require_once '../class/MysqliDb.php';
//echo json_encode($_REQUEST);

$tiens_distributor_table 	= "tiens_distributor_info";
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

$file = fopen($filename, 'r');
if (!$file) {
	echo "Failed to open file $filename";
	die;
}
$line = fgetcsv($file);

while (($line = fgetcsv($file)) !== FALSE) {
   //$line[0] = '1004000018' in first iteration
   $distributor_id 	= trim($line[0]);
   $full_name 		= ucwords(strtolower($line[1]));
   $card			= trim($line[4]);
   $level			= trim($line[5]);
   $joining_period	= trim($line[10]);
   $birthday		= trim($line[11]);
   if (!empty($birthday) && substr_count($birthday,"-")==2) {
   		$birthday_array	= explode("-",$birthday);
   		$birthday_year	= $birthday_array[0];
   		$birthday_month	= $birthday_array[1];
   		$birthday_date	= $birthday_array[2];
   }
   else {
   		$birthday_year	= null;
   		$birthday_month	= null;
   		$birthday_date	= null;
   }
   $email			= trim($line[12]);
   $postcode		= trim($line[17]);
   $mobile			= trim($line[19]);
   if ($state == 'AU') {
		$mobile			= str_replace(" ","",$mobile);
   		$mobile			= str_replace("+","",$mobile);
   		if ($mobile == "0032487807676") {
   			$mobile		= "32487807676";
   		}
   		else if (!strncmp($mobile,"04",2)) {
   			$mobile		= "614" . substr($mobile,2);
   		}
   }
   else if ($state == 'NZ') {
   		$mobile			= str_replace(" ","",$mobile);
   		$mobile			= str_replace("+","",$mobile);
   		if (!strncmp($mobile,"02",2)) {
   			$mobile		= "642" . substr($mobile,2);
   		}
   		else if (!strncmp($mobile,"0064",4)) {
   			$mobile		= "64" . substr($mobile,4);
   		}
   }
   
   print_r($line);
   echo "<br>";
   echo "$state distributor_id: $distributor_id full_name: $full_name email:$email mobile:$mobile <br>";
   echo "card: $card($level) joining_period:$joining_period birthday:$birthday <br><br>";
   
   $table_Data = Array (
   		"distributor_id"	=> $distributor_id,
   		"full_name"			=> $full_name,
   		"state"				=> $state,
   		"card"				=> $card,
   		"level"				=> $level,
   		"email"				=> $email,
   		"postcode"			=> $postcode,
   		"mobile"			=> $mobile,
   		"joining_period"	=> $joining_period,
   		"birthday_year"		=> $birthday_year,
   		"birthday_month"	=> $birthday_month,
   		"birthday_date"		=> $birthday_date
   		);
   if (!$netcubehub_db->insert($tiens_distributor_table, $table_Data)) {
   		echo("Failed to insert table $tiens_distributor_table: " . $netcubehub_db->getLastError() . "<br>");
   		continue;
   }
    
}

mysqli_close($netcubehub_db);
fclose($file);
die;
?>