<?php
/*	
	http://api.merkpay.com.au/southbound/wechat/orderquery.php?out_trade_no=20150922141225864AT123456
	http://api.merkpay.com.au/southbound/wechat/orderquery.php?transaction_id=1007830019201509220955876383

	appid=wx6907630eadb944b9
	mch_id=1268435201
	nonce_str=strtoupper(generateRandomString(32))
out_trade_no=out_trade_no12345678
transaction_id=013467007045764
*/

header('content-type:text/plain;');

$parameter = "";
{
	$appid			= "wx6907630eadb944b9";
	$parameter		= $parameter . "appid=$appid&";
}

{
	$mch_id			= "1221929001";	//1268435201	1218057401
	$key			= "7e2d8b15e4cabc4aaec1207ba72686b1";	//7e2d8b15e4cabc4aaec1207ba72686b1	1090f25ea8a1591682e3c60774d1e9a6
	$parameter		= $parameter . "mch_id=$mch_id&";
}

{
	$nonce_str		= strtoupper(generateRandomString(32));
	$parameter		= $parameter . "nonce_str=$nonce_str&";
}

if (isset($_REQUEST['transaction_id']) && !empty($_REQUEST['transaction_id'])) {
	$transaction_id	= trim($_REQUEST['transaction_id']);
	$parameter		= $parameter . "transaction_id=$transaction_id";
}
else {
	$transaction_id	= "";
	if (isset($_REQUEST['out_trade_no']) && !empty($_REQUEST['out_trade_no'])) {
		$out_trade_no	= trim($_REQUEST['out_trade_no']);
		$parameter		= $parameter . "out_trade_no=$out_trade_no";
	}
	else {
		$out_trade_no	= "";
	}
}

/*
if (isset($_REQUEST['out_trade_no']) && !empty($_REQUEST['out_trade_no'])) {
	$out_trade_no	= trim($_REQUEST['out_trade_no']);
	$parameter		= $parameter . "out_trade_no=$out_trade_no";
}
else {
	$out_trade_no	= "";
	if (isset($_REQUEST['transaction_id']) && !empty($_REQUEST['transaction_id'])) {
		$transaction_id	= trim($_REQUEST['transaction_id']);
		$parameter		= $parameter . "transaction_id=$transaction_id";
	}
	else {
		$transaction_id	= "";
	}
}*/

date_default_timezone_set('Asia/Shanghai');
$time = new Datetime();
$time_start = $time->format('YmdHis');
$time = date_add($time, date_interval_create_from_date_string('2 hours'));
$time_expire = $time->format('YmdHis');

$sign = $parameter . "&key=$key";
$sign = strtoupper(md5($sign));


$xml = '<?xml version="1.0" encoding="UTF-8"?>
    <xml>
		<appid>' . $appid . '</appid>
		<mch_id>' . $mch_id . '</mch_id>
		<nonce_str>' . $nonce_str . '</nonce_str>
		<out_trade_no>' . $out_trade_no . '</out_trade_no>
		<transaction_id>' . $transaction_id . '</transaction_id>
		<sign>' . $sign . '</sign>
	</xml>';
if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
	echo $xml; die;
}

// set URL and other appropriate options
$url = "https://payapi.wechat.com/cgi-bin/orderquery.cgi";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // Follow redirects
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Return the HTTP response from the curl_exec function

$response = curl_exec($ch);
curl_close($ch);

header('Content-type: text/xml');
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