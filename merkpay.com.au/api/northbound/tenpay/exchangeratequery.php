<?php 
/*
	http://api.netcube.com.au/northbound/tenpay/exchangeratequery.php?merchantId=123456&fee_type=AUD
*/

	$aapt['merchantId']			= trim($_REQUEST['merchantId']);
	if (isset($_REQUEST['fee_type'])) {
		$aapt['fee_type']		= trim($_REQUEST['fee_type']);
	}
	else {
		$aapt['fee_type']		= "AUD";
	}
	
	$result_url="http://api.merkpay.com.au/southbound/tenpay/exchangeratequery.php";
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