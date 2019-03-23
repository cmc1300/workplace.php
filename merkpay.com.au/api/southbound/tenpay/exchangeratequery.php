<?php 
/*
	http://api.netcube.com.au/southbound/tenpay/exchangeratequery.php?fee_type=AUD
*/

//$sign = "fee_type=AUD&input_charset=GBK&partner=1221929001&service_version=1.0&sign_key_index=1&sign_type=MD5&key=7e2d8b15e4cabc4aaec1207ba72686b1";
//$sign = "input_charset=GBK&service_version=1.0&sign_key_index=1&sign_type=MD5&key=7e2d8b15e4cabc4aaec1207ba72686b1";

if (isset($_REQUEST['fee_type'])) {
	$fee_type	= trim($_REQUEST["fee_type"]);
}
else {
	$fee_type	= "AUD";
}
$partner		= "1221929001";
$parameter		= "fee_type=$fee_type&partner=$partner";

$sign 		= $parameter . "&key=7e2d8b15e4cabc4aaec1207ba72686b1";
// key = 7e2d8b15 e4cabc4a aec1207b a72686b1
$sign = strtoupper(md5($sign));	// F9FFF0C259E866935947E82E95AE94FE

//$sign = "input_charset=GBK&service_version=1.0&sign_key_index=1&sign_type=MD5&key=7e2d8b15e4cabc4aaec1207ba72686b1";
//$sign = strtoupper(md5($sign));

// set URL and other appropriate options
$url="https://gw.tenpay.com/intl/gateway/exchangeratequery.xml?$parameter&sign=$sign";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));

$response = curl_exec($ch);
curl_close($ch);
header('Content-type: text/xml');
echo $response;

?>