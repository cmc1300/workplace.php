<?php 
/*	
	http://api.netcube.com.au/southbound/tenpay/verifynotifyid.php?notify_id=12345678
*/
if (isset($_REQUEST['merchantId'])) {
	$merchantId	= trim($_REQUEST["merchantId"]);
}
else {
	$merchantId	= "";
}
$notify_id		= trim($_REQUEST['notify_id']);
$partner		= "1221929001";
$query_type		= "1";

$parameter		= "notify_id=$notify_id&partner=$partner&query_type=$query_type";
$sign = $parameter . "&key=7e2d8b15e4cabc4aaec1207ba72686b1";
// key = 7e2d8b15 e4cabc4a aec1207b a72686b1
$sign = strtoupper(md5($sign));

// set URL and other appropriate options
$url = "https://gw.tenpay.com/intl/gateway/verifynotifyid.xml?" . $parameter . "&sign=$sign";
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