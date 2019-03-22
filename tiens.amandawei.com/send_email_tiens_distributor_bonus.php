<?php

/*
 * http://amandawei.com/tiens/maintenance/send_email_tiens_distributor_bonus.php?state=AU&&filename=20171016090910
 * http://amandawei.com/tiens/maintenance/send_email_tiens_distributor_bonus.php?state=NZ&&filename=20171016090910
 */


require_once 'class/MysqliDb.php';
//echo json_encode($_REQUEST);

$tiens_distributor_bonus_table 	= "tiens_distributor_bonus_test";
$tiens_distributor_info_table 	= "tiens_distributor_info";
$filename 					= trim($_REQUEST ['filename']);
$state	 					= strtoupper(trim($_REQUEST ['state']));
if (empty($filename) || empty($state) || ($state!="AU" && $state!="NZ")) {
	echo "Failed to get expected input parameters";
	die;
}
$filename 	= trim($_REQUEST ['filename']) . ".csv";


/* */
$file = fopen($filename, 'r');
if (!$file) {
	echo "Failed to open file $filename";
	die;
}
$line = fgetcsv($file);

while (($line = fgetcsv($file)) !== FALSE) {
	$period				= trim($line[1]);
	$distributor_id 	= trim($line[4]);
	$bonus_aud			= number_format(trim($line[8]),2) + number_format(trim($line[9]),2);
	$bonus_aud			= number_format($bonus_aud + 0,2);
	//print_r($line); echo "<br>";
	echo "distributor_id:$distributor_id bonus_aud:$bonus_aud<br>";
	
	/*
	$aapt['state'] 			= $state;
	$aapt['distributor_id'] = $distributor_id;
	$result_url				= "http://amandawei.com/tiens/maintenance/get_tiens_distributor_bonus_detail.php";
	$ch 					= curl_init();
	curl_setopt($ch,CURLOPT_URL,$result_url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
	$output 				= curl_exec($ch);*/
	$output 				= get_tiens_distributor_bonus_detail($state, $distributor_id);
	echo "get_tiens_distributor_bonus_detail.php: $output<br>";

	$returnArray 			= json_decode($output, true);
	$result					= $returnArray['result'];
	if ($result== "NOK") {
		echo "Something wrong: " . trim($returnArray['info']);	continue;
	}
	else if ($result== "OK") {
		//if ($distributor_id != "83921009" && $distributor_id != "83921005") continue;
		$full_name					= $returnArray['full_name'];
		$email						= $returnArray['email'];
		$weekly_bonus_to_ewallet	= $returnArray['weekly_bonus_to_ewallet'];
		$weekly_bonus_to_bank		= $returnArray['weekly_bonus_to_bank'];
		$monthly_bonus_to_ewallet	= $returnArray['monthly_bonus_to_ewallet'];
		$monthly_bonus_to_bank		= $returnArray['monthly_bonus_to_bank'];
		echo 	"sending email: $state/$distributor_id/$full_name/$email/$period/$bonus_aud " . 
				"$weekly_bonus_to_ewallet/$weekly_bonus_to_bank/$monthly_bonus_to_ewallet/$monthly_bonus_to_bank<br><br>";
		send_email_to_distributor(	$state, $distributor_id, $full_name, $email, $period, $bonus_aud,
				$weekly_bonus_to_ewallet, $weekly_bonus_to_bank, $monthly_bonus_to_ewallet, $monthly_bonus_to_bank);
	}
}

die;

function send_email_to_distributor(	$state, $distributor_id, $full_name, $email, $period, $bonus_aud,
									$weekly_bonus_to_ewallet, $weekly_bonus_to_bank, $monthly_bonus_to_ewallet, $monthly_bonus_to_bank) {
	
	$to 				= $email;
	//$to 				= "cmc1300xu@gmail.com";	// cmc1300xu@gmail.com  stephen@tiens.com  john1@tiens.com
	if ($bonus_aud >= 50) {
		if (strlen($period) == 6) {
			$subject 			= "Tiens ANZ monthly commission $period paid to your bank account";
		}
		else if (strlen($period) == 8) {
			$subject 			= "Tiens ANZ weekly commission $period paid to your bank account";
		}
	}
	else if ($bonus_aud < 50) {
		if (strlen($period) == 6) {
			$subject 			= "Tiens ANZ monthly commission $period paid to your E-Wallet";
		}
		else if (strlen($period) == 8) {
			$subject 			= "Tiens ANZ weekly commission $period paid to your E-Wallet";
		}
	}
	
	$table				= "<table style='width:100%' border='1' style='display: block'>";
	$table				.= "<tr> <td>Name</td> <td>$full_name</td> </tr>";
	$table				.= "<tr> <td>Distributor ID</td> <td>$distributor_id</td> </tr>";
	if (strlen($period) == 6) {
		$table			.= "<tr> <td>Commission</td> <td>Monthly $period</td> </tr>";
	}
	else if (strlen($period) == 8) {
		$table			.= "<tr> <td>Commission</td> <td>Weekly $period</td> </tr>";
	}
	if ($state == 'AU') {
		$table			.= "<tr> <td>Amount</td> <td>AU$ $bonus_aud</td> </tr>";
	}
	else if ($state == 'NZ') {
		$table			.= "<tr> <td>Amount</td> <td>NZ$ $bonus_aud</td> </tr>";
	}
	if ($bonus_aud >= 50) {
		$table			.= "<tr> <td>Paid To</td> <td>Your Bank Account</td> </tr>";
	}
	else if ($bonus_aud < 50) {
		$table			.= "<tr> <td>Paid To</td> <td>B2C Website E-Wallet</td> </tr>";
	}
	if ($state == 'AU') {
		$table			.= "<tr> <td>Weekly Commission (Accumulated)</td> 
							<td>
								AU$ $weekly_bonus_to_ewallet has been paid to your E-Wallet
								<br>
								AU$ $weekly_bonus_to_bank has been paid to your bank account
							</td> 
							</tr>";
		$table			.= "<tr> <td>Monthly Commission (Accumulated)</td>
							<td>
								AU$ $monthly_bonus_to_ewallet has been paid to your E-Wallet
								<br>
								AU$ $monthly_bonus_to_bank has been paid to your bank account
							</td>
							</tr>";
	}
	else if ($state == 'NZ') {
		$table			.= "<tr> <td>Weekly Commission (Accumulated)</td>
							<td>
								NZ$ $weekly_bonus_to_ewallet has been paid to your E-Wallet
								<br>
								NZ$ $weekly_bonus_to_bank has been paid to your bank account
							</td>
							</tr>";
		$table			.= "<tr> <td>Monthly Commission (Accumulated)</td>
							<td>
								NZ$ $monthly_bonus_to_ewallet has been paid to your E-Wallet
								<br>
								NZ$ $monthly_bonus_to_bank has been paid to your bank account
							</td>
							</tr>";
	}
	$table				.=	"</table>";
							
	
	$txt 				= "
							<html>
							<head>
								<title>$subject</title>
							</head>
							<body>
							<p>
								Dear $full_name,<br><br>
							</p>";
	$txt 				.= $table;
	$txt 				.= "<br>
							Your commission payment is ready. 
							<br>
							If the amount earned is under $50.00 it will be paid directly into your personal e-wallet, which you can find on your dashboard when you login. Commission amounts over $50.00 will be paid directly into your bank account. 
							<br>
							The money accumulated in the e-wallet can be used against future Tiens product purchases or alternatively the money can be transferred at any time to your nominated bank account (minimum transfer amounts should be $50.00 or over).";
	$txt 				.= "<br>
							<p>
								<br>Congratulations, <br>
								Tiens Australia & New Zealand
							</p>
							</body>
							</html>
							";

	$headers 		= "MIME-Version: 1.0" . "\r\n";
	$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
	if ($state == 'AU') {
		$headers 	.= "From: customercare.au@tiens.com";
	}
	else if ($state == 'NZ') {
		$headers 	.= "From: customercare.nz@tiens.com";
	}
	
	mail($to,$subject,$txt,$headers);
} 


function get_tiens_distributor_bonus_detail($state, $distributor_id) {
	global $tiens_distributor_bonus_table, $tiens_distributor_info_table;
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
	
	
	$tiens_distributor_info_table= "tiens_distributor_info";
	try {
		$netcubehub_db			-> where("state='$state' and distributor_id='$distributor_id'");
		$table_array			= $netcubehub_db -> get($tiens_distributor_info_table);
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
	
	
	try {
		$netcubehub_db			-> where("state='$state' and distributor_id='$distributor_id'");
		$table_array			= $netcubehub_db -> get($tiens_distributor_bonus_table);
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
	//$output_array['array']						= $table_array;
	$output_array['weekly_bonus_to_ewallet']	= number_format($weekly_bonus_to_ewallet . "",2);
	$output_array['weekly_bonus_to_bank']		= number_format($weekly_bonus_to_bank . "",2);
	$output_array['monthly_bonus_to_ewallet']	= number_format($monthly_bonus_to_ewallet . "",2);
	$output_array['monthly_bonus_to_bank']		= number_format($monthly_bonus_to_bank . "",2);
	
	mysqli_close($netcubehub_db);
	return json_encode($output_array);
}

?>