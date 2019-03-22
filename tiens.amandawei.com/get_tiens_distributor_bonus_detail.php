<?php

/*
 * http://amandawei.com/tiens/maintenance/get_tiens_distributor_bonus_detail.php?state=AU&&distributor_id=83921009
  */
header("Access-Control-Allow-Origin: *");

require_once 'class/MysqliDb.php';
echo json_encode($_REQUEST);

/*	*/
$state	 		= strtoupper(trim($_REQUEST ['state']));
$distributor_id	= trim($_REQUEST['distributor_id']);
if (empty($distributor_id) || empty($state) || ($state!="AU" && $state!="NZ")) {
	echo "Failed to get expected input parameters";
	die;
}

$output_array 	= array();
$table_array	= array();

$netcubehub_db	= new MysqliDb ( "127.0.0.1","amam8224_amanda","xgp_950254", "amam8224_mouse" );
if ($netcubehub_db == NULL)
{
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "Fail to connect Amanda database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);
	die;
}


$tiens_distributor_table 	= "tiens_distributor_info";
try {
	$netcubehub_db			-> where("state='$state' and distributor_id='$distributor_id'");
	$table_array			= $netcubehub_db -> get($tiens_distributor_table);
	if ($table_array 	== NULL) {
		$output_array['result']	= "NOK";
		$output_array['info'] 	= "no matched customer found";
		echo json_encode($output_array);
		die;
	}
	else {
		$output_array['full_name']	= trim($table_array[0]['full_name']);
		$output_array['mobile']		= trim($table_array[0]['mobile']);
		$output_array['email']		= trim($table_array[0]['email']);
	}
}
catch (Exception $e) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= $e->getMessage();
	echo json_encode($output_array);
	die;
}


$tiens_distributor_table 	= "tiens_distributor_bonus_test";
try {
	$netcubehub_db			-> where("state='$state' and distributor_id='$distributor_id'");
	$table_array			= $netcubehub_db -> get($tiens_distributor_table);
	if ($table_array 	== NULL) {
		$output_array['result']	= "NOK";
		$output_array['info'] 	= "no matched customer found";
		echo json_encode($output_array);
		die;
	}
	else {
		//echo json_encode($table_array); die;
	}
}
catch (Exception $e) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= $e->getMessage();
	echo json_encode($output_array);
	die;
}


/* */
$weekly_bonus_to_ewallet	= 0;
$weekly_bonus_to_bank 		= 0;
$monthly_bonus_to_ewallet	= 0;
$monthly_bonus_to_bank 		= 0;
foreach($table_array as $array) {
	//echo json_encode($array);
	$period 			= trim($array['period']);
	$type	 			= trim($array['type']);
	$bonus_aud			= trim($array['bonus_aud']);
	//echo "$distributor_id: $full_name's email is $email <br>";
	if ($type == "Bank offer") {
		if (substr($period,-2) == "00") {
			$monthly_bonus_to_bank		+= $bonus_aud;
		}
		else {
			$weekly_bonus_to_bank		+= $bonus_aud;
		}
	}
	else if ($type == "Small amount deduction back fund account") {
		if (substr($period,-2) == "00") {
			$monthly_bonus_to_ewallet	+= $bonus_aud;
		}
		else {
			$weekly_bonus_to_ewallet	+= $bonus_aud;
		}
	}
} 


/* */
$output_array['result']						= "OK";
$output_array['info'] 						= sizeof($table_array) . " records have been selected successfully";
//$output_array['array']					= $table_array;
$output_array['weekly_bonus_to_ewallet']	= number_format($weekly_bonus_to_ewallet . "",2);
$output_array['weekly_bonus_to_bank']		= number_format($weekly_bonus_to_bank . "",2);
$output_array['monthly_bonus_to_ewallet']	= number_format($monthly_bonus_to_ewallet . "",2);
$output_array['monthly_bonus_to_bank']		= number_format($monthly_bonus_to_bank . "",2);

echo json_encode($output_array);
die;
?>