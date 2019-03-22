<?php

require_once 'class/MysqliDb.php';
//echo json_encode($_REQUEST);

/*
$action 		= trim($_REQUEST['action']);
$id		 		= trim($_REQUEST['customerid']);
$output_array 	= array();
$table_array		= array();

if ($action != "select_customer_info_with_id1") {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get correct action code";
	echo json_encode($output_array);
	die;
}

die;*/

$netcubehub_db	= new MysqliDb ( "127.0.0.1","amam8224_amanda","xgp_950254", "amam8224_mouse" );
if ($netcubehub_db == NULL)
{
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "Fail to connect Amanda database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);
	die;
}


$tiens_distributor_table = "tiens_distributor_au";
try {
	$netcubehub_db		-> where("1=1");
	$table_array			= $netcubehub_db -> get($tiens_distributor_table);
}
catch (Exception $e) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= $e->getMessage();
	echo json_encode($output_array);
	die;
}

if ($table_array 	== NULL) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "no matched customer found";
	echo json_encode($output_array);
	die;
}

/* */
foreach($table_array as $array) {
	//echo json_encode($array);
	$distributor_id 	= trim($array['distributor_id']);
	$full_name			= trim($array['full_name']);
	$email				= trim($array['email']);
	echo "$distributor_id: $full_name's email is $email <br>";
	
	$to 				= $email;
	$subject 			= "Tiens ANZ commission will go out next week";
	$txt 				= "
							<html>
							<head>
							<title>Tiens ANZ commission will go out next week</title>
							</head>
							<body>
							<p>
								Dear $full_name,<br><br>
								Due to the week long public holiday in China this week (mid-Autumn festival) commission will go out next week. This is due to commission calculations being done in our China Head Office. We apologise for any inconvenience this might cause.<br><br>
								Many thanks, <br>Tiens Australia & New Zealand
							</p>
							</body>
							</html>
							";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: customercare.au@tiens.com";
	
	mail($to,$subject,$txt,$headers);
} 


$tiens_distributor_table = "tiens_distributor_nz";
try {
	$netcubehub_db		-> where("1=1");
	$table_array			= $netcubehub_db -> get($tiens_distributor_table);
}
catch (Exception $e) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= $e->getMessage();
	echo json_encode($output_array);
	die;
}

if ($table_array 	== NULL) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "no matched customer found";
	echo json_encode($output_array);
	die;
}

/* */
foreach($table_array as $array) {
	//echo json_encode($array);
	$distributor_id 	= trim($array['distributor_id']);
	$full_name			= trim($array['full_name']);
	$email				= trim($array['email']);
	echo "$distributor_id: $full_name's email is $email <br>";

	$to 				= $email;
	$subject 			= "Tiens ANZ commission will go out next week";
	$txt 				= "
	<html>
	<head>
	<title>Tiens ANZ commission will go out next week</title>
	</head>
	<body>
	<p>
	Dear $full_name,<br><br>
	Due to the week long public holiday in China this week (mid-Autumn festival) commission will go out next week. This is due to commission calculations being done in our China Head Office. We apologise for any inconvenience this might cause.<br><br>
	Many thanks, <br>Tiens Australia & New Zealand
	</p>
	</body>
	</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: customercare.nz@tiens.com";

	mail($to,$subject,$txt,$headers);
}


/* 
$output_array['result']	= "OK";
$output_array['info'] 	= sizeof($table_array) . " customers have been selected successfully";
$output_array['array']	= $table_array;
echo json_encode($output_array);*/

die;
?>