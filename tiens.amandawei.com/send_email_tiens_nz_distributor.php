<?php
/*
 * http://amandawei.com/tiens/maintenance/send_email_tiens_nz_distributor.php
 */

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


$tiens_distributor_table = "tiens_distributor_info";
try {
	$netcubehub_db		-> where("state='NZ'");
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
	
	if (empty($email)) continue;
	
	$to 				= $email;
	//$to 				= "cmc1300xu@gmail.com";	// cmc1300xu@gmail.com  stephen@tiens.com  john1@tiens.com
	$subject 			= "Last day: 2018 Tiens Anniversary Promotion - Buy 1 Get 1 Free";
	$txt 				= "
							<html>
							<head>
							<title>Last day: 2018 Tiens Anniversary Promotion - Buy 1 Get 1 Free</title>
							</head>
							<body>
							<p>
								Dear $full_name,
								<br><br>
								Last day: until 26 August 2018, when you buy a product from Dietary Supplements, Wellness Equipment or Skin Care, you'll get a second same product Free (1+1). 
								<br>
								Offer available till stocks last.
								<br><br>
								最后1天！ 2018天狮澳洲&新西兰分公司壹周年庆祝优惠：只要购买任何保健食品、美容护肤品或保健器械一件，您将获得第二件免费同类产品一件（1 + 1)，多买多送，优惠至2018年8月26日。
								<br><br><br>
								Yours sincerely,<br>
								<b>Tiens Bio Tech New Zealand Pty Ltd.</b><br>
								Level 9, 45 Queen Street East, Auckland 1010, New Zealand<br>
								Tel: +61 3 8601 1186<br>
								Email: customercare.nz@tiens.com<br>
								Web: http://web.nz.tiens.com<br>
								NZBN: 9429043352517<br>
							</p>
							</body>
							</html>
							";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: customercare.nz@tiens.com";
	
	mail($to,$subject,$txt,$headers);
	//break;
} 


mysqli_close($netcubehub_db);
die;
?>