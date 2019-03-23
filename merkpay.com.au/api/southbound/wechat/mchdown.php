<?php
/*	
	http://api.merkpay.com.au/southbound/wechat/mchdown.php?bill_date=20150922&bill_type=ALL&device_info=013467007045764&mode=display
	http://api.merkpay.com.au/southbound/wechat/mchdown.php?bill_date=20150922&bill_type=SUCCESS&device_info=013467007045764

	appid=wx6907630eadb944b9
	mch_id=1221929001
*/

header('content-type:text/plain;');

$parameter = "";
{
	$appid			= "wx6907630eadb944b9";
	$parameter		= $parameter . "appid=$appid&";
}

if (isset($_REQUEST['bill_date']) && !empty($_REQUEST['bill_date'])) {
	$bill_date		= trim($_REQUEST['bill_date']);
	$parameter		= $parameter . "bill_date=$bill_date&";
}
else {
	$bill_date	= "";
}

if (isset($_REQUEST['bill_type']) && !empty($_REQUEST['bill_type'])) {
	$bill_type		= trim($_REQUEST['bill_type']);
	$parameter		= $parameter . "bill_type=$bill_type&";
}
else {
	$bill_type		= "";
}

if (isset($_REQUEST['device_info']) && !empty($_REQUEST['device_info'])) {
	$device_info	= trim($_REQUEST['device_info']);
	$parameter		= $parameter . "device_info=$device_info&";
}
else {
	$device_info	= "";
}

{
	$mch_id			= "1221929001";	//1268435201	1218057401
	$key			= "7e2d8b15e4cabc4aaec1207ba72686b1";	//7e2d8b15e4cabc4aaec1207ba72686b1	1090f25ea8a1591682e3c60774d1e9a6
	$parameter		= $parameter . "mch_id=$mch_id&";
}

{
	$nonce_str		= strtoupper(generateRandomString(32));
	$parameter		= $parameter . "nonce_str=$nonce_str";
}


date_default_timezone_set('Asia/Shanghai');
$time = new Datetime();
$time_start = $time->format('YmdHis');
$time = date_add($time, date_interval_create_from_date_string('2 hours'));
$time_expire = $time->format('YmdHis');
//echo $parameter; die;
$sign = $parameter . "&key=$key";
$sign = strtoupper(md5($sign));


$xml = '<?xml version="1.0" encoding="UTF-8"?>
    <xml>
	<appid>' . $appid . '</appid>
	<bill_date>' . $bill_date . '</bill_date>
	<bill_type>' . $bill_type . '</bill_type>
	<device_info>' . $device_info . '</device_info>
	<mch_id>' . $mch_id . '</mch_id>
	<nonce_str>' . $nonce_str . '</nonce_str>
	<sign>' . $sign . '</sign>
    </xml>';
if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
	echo $xml; die;
}

// set URL and other appropriate options
$url = "https://payapi.wechat.com/cgi-bin/mchdown.cgi";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // Follow redirects
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Return the HTTP response from the curl_exec function

$response = curl_exec($ch);
curl_close($ch);

header('Content-type: text/plain; charset=utf-8');
echo $response;

function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

?>