<?php

/*
 * http://amandawei.com/tiens/maintenance/export_table_ex_distributor_info/export_to_table_tiens_ex_distributor_info.php?filename=Database of ex DBs in Australia
 */

require_once '../class/MysqliDb.php';
//echo json_encode($_REQUEST);

$tiens_distributor_table 	= "tiens_ex_distributor_info";
$filename 					= trim($_REQUEST ['filename']);
if (empty($filename)) {
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

$count = 1;
while (($line = fgetcsv($file)) !== FALSE) {
	$ex_distributor_id	= trim($line[0]);
	$full_name 			= ucwords(strtolower($line[1]));
	$ex_level			= trim($line[2]);
   	$level				= trim($line[3]);
   	$ex_honoral_rank	= trim($line[4]);
   	if ($ex_honoral_rank == "0") $ex_honoral_rank = "";
   	$honoral_rank		= trim($line[5]);
   	if ($honoral_rank == "0") $honoral_rank = "";
      
	//print_r($line);
   	echo "$count: $ex_distributor_id $ex_level/$level {$full_name} $ex_honoral_rank:$honoral_rank<br><br>";
   
   $table_Data = Array (
   		"id"				=> $count++,
   		"ex_distributor_id"	=> $ex_distributor_id,
   		"distributor_id"	=> "",
   		"full_name"			=> $full_name,
   		"ex_level"			=> $ex_level,
   		"level"				=> $level,
   		"ex_honoral_rank"	=> $ex_honoral_rank,
   		"honoral_rank"		=> $honoral_rank
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