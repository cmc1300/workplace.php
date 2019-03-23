<?php
/*	
 * 	http://api.merkpay.com.au/southbound/wechat/refundquery.php?refund_id=2007830019201510010052230884
 * 	http://api.merkpay.com.au/southbound/wechat/refundquery.php?out_refund_no=20150924142815899AT123456
 * 	http://api.merkpay.com.au/southbound/wechat/refundquery.php?transaction_id=1007830019201509240976112318
 * 	http://api.merkpay.com.au/southbound/wechat/refundquery.php?out_trade_no=20150924142815899AT123456
	
 * 	appid=wx6907630eadb944b9
 * 	mch_id=1268435201
*/

header('content-type:text/plain;  charset=utf-8');

{
	if (isset($_REQUEST['refund_id']) && !empty($_REQUEST['refund_id'])) {
		$index			= trim($_REQUEST['refund_id']);
		$name			= 'refund_id';
	}
	else if (isset($_REQUEST['out_refund_no']) && !empty($_REQUEST['out_refund_no'])) {
		$index			= trim($_REQUEST['out_refund_no']);
		$name			= 'out_refund_no';
	}
	else if (isset($_REQUEST['transaction_id']) && !empty($_REQUEST['transaction_id'])) {
		$index			= trim($_REQUEST['transaction_id']);
		$name			= 'transaction_id';
	}
	else if (isset($_REQUEST['out_trade_no']) && !empty($_REQUEST['out_trade_no'])) {
		$index			= trim($_REQUEST['out_trade_no']);
		$name			= 'out_trade_no';
	}
}

{
	$appid			= "wx6907630eadb944b9";
	$mch_id			= "1221929001";	//1268435201	1218057401
	$key			= "7e2d8b15e4cabc4aaec1207ba72686b1";	//7e2d8b15e4cabc4aaec1207ba72686b1	1090f25ea8a1591682e3c60774d1e9a6
	$nonce_str		= strtoupper(generateRandomString(32));
	
	$parameter 		= "";
	$parameter		= $parameter . "appid=$appid&";
	$parameter		= $parameter . "mch_id=$mch_id&";
	$parameter		= $parameter . "nonce_str=$nonce_str&";
	$parameter		= $parameter . "$name=$index";
}

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
		<' . $name . '>' . $index . '</' . $name . '>
		<sign>' . $sign . '</sign>
	</xml>';
if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
	//echo $parameter . "\n";
	echo $xml; die;
}

// set URL and other appropriate options
$url 		= "https://payapi.wechat.com/cgi-bin/refundquery.cgi";
$ch 		= curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // Follow redirects
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Return the HTTP response from the curl_exec function
$response	= curl_exec($ch);
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