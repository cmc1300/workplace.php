<?php 
/*	
	http://api.netcube.com.au/northbound/tenpay/verifynotifyid.php?merchantId=123456&notify_id=12345678
*/	
	$aapt['merchantId']			= trim($_REQUEST['merchantId']);
	$aapt['notify_id']			= trim($_REQUEST['notify_id']);
	
	$result_url="http://api.merkpay.com.au/southbound/tenpay/verifynotifyid.php";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$result_url );
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
	$output = curl_exec($ch);
	
	header('Content-type: text/xml');
	echo $output;
?>