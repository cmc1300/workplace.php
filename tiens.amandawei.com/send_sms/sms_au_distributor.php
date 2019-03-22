<?php
/*
 * http://amandawei.com/tiens/maintenance/send_sms/sms_au_distributor.php?state=AU&&batch=1
 * http://amandawei.com/tiens/maintenance/send_sms/sms_au_distributor.php?state=NZ&&batch=1
 */

require_once '../class/MysqliDb.php';
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

$state	 		= strtoupper(trim($_REQUEST ['state']));
$batch			= trim($_REQUEST['batch']);
$batch			= intval($batch);


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
	$netcubehub_db			-> where("state='$state'");
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
	//die;
}


/* */
$count = 0;
foreach($table_array as $array) {
	$count ++;
	
	if ($count <= ($batch - 1) * 20) continue;
	else if ($count > $batch * 20) break;
		
	//echo json_encode($array);
	$distributor_id 	= trim($array['distributor_id']);
	$full_name			= trim($array['full_name']);
	$arr 				= explode(' ',trim($full_name));
	$first_name			= $arr[0]; 
	$email				= trim($array['email']);
	$mobile				= trim($array['mobile']);
	//if ($distributor_id != '83921058') continue;
	
	$language			= "English";
	try {
		$netcubehub_db			-> where("distributor_id='$distributor_id'");
		$table_more_array		= $netcubehub_db -> get("tiens_distributor_more_info");
	}
	catch (Exception $e) {
		$output_array['result']	= "NOK";
		$output_array['info'] 	= $e->getMessage();
		echo json_encode($output_array);
		die;
	}
	foreach($table_more_array as $more_array) {
		$language		= trim($more_array['language']);
		if (empty($mobile) || is_null($mobile)) {
			$mobile		= trim($more_array['mobile']);
		}
	}
	
	echo "$count: $distributor_id: $full_name's mobile is $mobile, language is $language<br>";
	if (empty($mobile)) continue;
	
	$to		 				= urlencode($mobile);
	//$to		 				= urlencode("61467741379");
	$username 				= urlencode("tiensanz");
	$password 				= urlencode("tiens2017");
	$api_id   				= urlencode("_6eJUMrpTlGT2uPbmyfC6g==");
	if ("English" == "English") {
		//$content		 	= urlencode("Dear $first_name ($distributor_id),\nFESTIVAL PROMOTION.\nDigest Tablets Buy 2 get 2 Free.\nSuper Calcium Tablets Buy 3 get 3 Free.\nLimited time only, ACT NOW!");
		//$content		 	= urlencode("Dear $first_name ($distributor_id),\nTo support Tiens ex-Distributors to rebuild their networks, three levels of support will be offered.\nPlease visit http://web.nz.tiens.com/tiens-ex-db-business-support-program for more information, ACT NOW!");
		//$content		 	= urlencode("Dear $first_name ($distributor_id),\nNEW PRODUCT NOW AVAILABLE - TIENS KARDI Krill Oil with Sea-buckthorn and TIENS ZINC Capsules.\nPlease visit http://web.au.tiens.com/new-product-available-tiens-kardi-krill-oil-and-zinc-capsules for more information, ACT NOW!");
		//$content		 	= urlencode("Dear $first_name ($distributor_id),\nJust 6 days left to benefit from the EOFY BUY 1 GET 1 FREE promotion on ALL TIENS PRODUCTS. Great time to make a personal purchase and introduce new Customers and Distributors to Tiens, ACT NOW!");
		//$content		 	= urlencode("Dear $first_name ($distributor_id),\nLAST CHANCE!\nUntil 26 August 2018, when you buy a product from Dietary Supplement, Wellness Equipment or Skin Care, you'll get a second same product Free (1+1).\nOffer available till stocks last, ACT NOW!");
		$content		 	= urlencode("Dear $first_name ($distributor_id),\nThe Anniversary Buy 1 Get 1 Free offer expires in today. Act now and don't miss out on this opportunity.\nweb.au.tiens.com or web.nz.tiens.com");
		$result_url			= "https://api.clickatell.com/http/sendmsg?api_id=$api_id&user=$username&password=$password&to=$to&text=$content";
	}
	else if ($language == "Mandarin") {
		/*
		$content		 	= mb_convert_encoding("Dear $first_name ($distributor_id),\n11月份业绩奖金计算将于11月26日截止，金卡/白金卡升级推广促销亦将同天结束。仅剩壹天，把握机会，立即行动！","ucs-2","utf-8");
		$result_url			= "https://api.clickatell.com/http/sendmsg?api_id=$api_id&user=$username&password=$password&to=$to&text=$content&unicode=1";
		*/
	}
	$output 				= file_get_contents($result_url);
	echo "$result_url: $output<br><br>";
	sleep(10);
		
	//if ($distributor_id == "83900003") break;
}


mysqli_close($netcubehub_db);
die;
?>
