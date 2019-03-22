<?php
/*
 * http://amandawei.com/tiens/maintenance/send_email_tiens_au_distributor.php
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
	$netcubehub_db		-> where("state='AU'");
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
								最后1天！ 2018天狮澳洲&新西兰分公司壹周年庆祝优惠：只要购买任何保健食品、美容护肤品或保健器械一件，您将获得第二件免费同类产品一件（1 + 1)，多买多送，优惠至2018年8月26日结束。
								<br><br><br>
								Yours sincerely,<br>
								<b>Tiens Bio Tech Australia Pty Ltd.</b><br>
								Level 14, 330 Collins Street Melbourne 3000<br>
								Tel: +61 3 8601 1186<br>
								Email: customercare.au@tiens.com<br>
								Web: http://web.au.tiens.com<br>
								ABN: 16615066058<br>
							</p>
							</body>
							</html>
							";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: customercare.au@tiens.com";
	
	mail($to,$subject,$txt,$headers);
	//break;
} 


mysqli_close($netcubehub_db);
die;

/*
 * 	$txt 				= "
							<html>
							<head>
							<title>NEW PRODUCT NOW AVAILABLE - TIENS KARDI Krill Oil with Sea-buckthorn and TIENS ZINC Capsules</title>
							</head>
							<body>
							<p>
								Dear $full_name,
								<br><br>
								New product TIENS KARDI Krill Oil with Sea-buckthorn and TIENS ZINC Capsules are NOW Available in Australia and New Zealand.
								<br><br>
								Details please visit our company website on http://web.au.tiens.com
								<br>
								or<br>
								click the link: http://web.au.tiens.com/new-product-available-tiens-kardi-krill-oil-and-zinc-capsules
								<br><br><br>
								Yours sincerely,<br>
								<b>Tiens Bio Tech Australia Pty Ltd.</b><br>
								Level 14, 330 Collins Street Melbourne 3000<br>
								Tel: +61 3 8601 1186<br>
								Email: customercare.au@tiens.com<br>
								Web: http://web.au.tiens.com<br>
								ABN: 16615066058<br>
							</p>
							</body>
							</html>
							";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: customercare.au@tiens.com";
	
	mail($to,$subject,$txt,$headers);
	//break;
*/

/*
 * 							<p>
								Dear $full_name,
								<br><br>
								By popular demand and to celebrate New Year, Tiens has decided to extend the Rank Up Promotion for three last months, from 27-Dec-2017 to 26-Mar-2018. 
								<br><br>
								This is the last chance to avail of this amazing offer so ACT NOW!  
								<br><br><br>
								Yours sincerely,<br>
								<b>Tiens Bio Tech Australia Pty Ltd.</b><br>
								Level 14, 330 Collins Street Melbourne 3000<br>
								Tel: +61 3 8601 1186<br>
								Email: customercare.au@tiens.com<br>
								Web: http://web.au.tiens.com<br>
								ABN: 16615066058<br>
							</p>
 */

/*
 *							<p>
								Dear $full_name,
								<br><br>
								Our digestive systems are the basis of our health. Overeating, stress, travel and inadequate sleep are all harmful to our digestive systems. It’s time to get our digestive tract back to normal after the holiday over indulgence.
								<br><br>
								Calcium plays a major role in our bodies, strengthening bones and teeth while assisting in weight management. Lecithin enhances the functions and vitality of the brain, nourishing brain cells and improving memory, while postponing the effects of aging.
								<br><br>
								Limited Special Promotion (27 Jan 2017– 26 Feb 2018): Digest Tablets buy 2 get 2 FREE/Super Calcium buy 3 get 3 FREE. ACT NOW! 
								<br><br><br>
								Yours sincerely,<br>
								<b>Tiens Bio Tech Australia Pty Ltd.</b><br>
								Level 14, 330 Collins Street Melbourne 3000<br>
								Tel: +61 3 8601 1186<br>
								Email: customercare.au@tiens.com<br>
								Web: http://web.au.tiens.com<br>
								ABN: 16615066058<br>
							</p>
							</body>
							</html>
							";
 */

/*
	$to 				= $email;
	//$to 				= "cmc1300xu@gmail.com";	// cmc1300xu@gmail.com  stephen@tiens.com  john1@tiens.com
	$subject 			= "TODAY is the LAST DAY of the promotion Digest Tablet Buy 2 Get 2 Free and Lecithin Buy 3 Get 3 Free";
	
	$txt 				= "
							<html>
							<head>
							<title>TODAY is the LAST DAY of the promotion Digest Tablet Buy 2 Get 2 Free and Lecithin Buy 3 Get 3 Free</title>
							</head>
							<body>
							<p>
								Dear $full_name,
								<br><br>
								Please be reminded that TODAY is the LAST DAY of the month end to place orders. Please review the orders of your downlines and motivate them to place orders as soon as possible. Today is also the LAST DAY of promotions of 'TIENS Digest Tablets Buy 2 Get 2 Free and Tiens Super Calcium Tablets with Lecithin Buy 3 Get 3 Free'. Don't miss this opportunity, ACT NOW!
								<br><br>
								温馨提示：今天是四月月结计算奖金的最后一天了，请提醒下線尽快下单；优惠推广《胃肠舒买二送二，卵磷脂高钙胶囊买三送三》今天也是最后一天，请把握机会，立即行动！
								<br><br><br>
								Yours sincerely,<br>
								<b>Tiens Bio Tech Australia Pty Ltd.</b><br>
								Level 14, 330 Collins Street Melbourne 3000<br>
								Tel: +61 3 8601 1186<br>
								Email: customercare.au@tiens.com<br>
								Web: http://web.au.tiens.com<br>
								ABN: 16615066058<br>
							</p>
							</body>
							</html>
							";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: customercare.au@tiens.com";
 */

?>