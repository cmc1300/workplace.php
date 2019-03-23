<?php
/*	
	http://api.netcube.com.au/projects/netcube/Merkpay/payment.php?attach=attach12345678&body=body12345678&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11
*/
/*
attach=attach12345678
bank_type=DEFAULT
body=body12345678
buyer_id=12345678
fee_type=AUD
goods_tag=goods_tag
notify_url=http://api.merkpay.com.au/payment_notify_url.php
out_trade_no=out_trade_no12345678
partner=1221929001
partner_name=partner_name12345678
partner_no=partner_no12345678
product_fee=110
return_url=http://api.merkpay.com.au/payment_return_url.php
spbill_create_ip=14.137.150.239
time_expire=20150901200000
time_start=20150901100000
total_fee=121
trade_way=1
transport_fee=11
*/

header('content-type:text/plain;');

$attach				= trim($_REQUEST['attach']);
$body				= trim($_REQUEST['body']);
$out_trade_no		= trim($_REQUEST['out_trade_no']);
$partner_name		= trim($_REQUEST['partner_name']);
$partner_no			= trim($_REQUEST['partner_no']);
$product_fee		= trim($_REQUEST['product_fee']);
$transport_fee		= trim($_REQUEST['transport_fee']);
$total_fee			= 0 + $product_fee + $transport_fee;
$spbill_create_ip	= $_SERVER['REMOTE_ADDR'];

date_default_timezone_set('Asia/Shanghai');
$time = new Datetime();
$time_start = $time->format('YmdHis');
$time = date_add($time, date_interval_create_from_date_string('2 hours'));
$time_expire = $time->format('YmdHis');

$parameter =	"attach=$attach&" . 
				"bank_type=DEFAULT&" . 
				"body=$body&" . 
				//"buyer_id=12345678&" . 
				"fee_type=AUD&" . 
				"goods_tag=goods_tag&" . 
				"notify_url=http://api.merkpay.com.au/payment_notify_url.php&" . 
				"out_trade_no=$out_trade_no&" . 
				"partner=1221929001&" . 
				"partner_name=$partner_name&" . 
				"partner_no=$partner_no&" . 
				"product_fee=$product_fee&" . 
				"return_url=http://api.merkpay.com.au/payment_return_url.php&" . 
				"spbill_create_ip=$spbill_create_ip&" . 
				"time_expire=$time_expire&" . 
				"time_start=$time_start&" . 
				"total_fee=$total_fee&" . 
				"trade_way=1&" . 
				"transport_fee=$transport_fee";

$sign = $parameter . "&key=7e2d8b15e4cabc4aaec1207ba72686b1";
// key = 7e2d8b15 e4cabc4a aec1207b a72686b1
$sign = strtoupper(md5($sign));
$url = "https://gw.tenpay.com/intl/gateway/pay.htm?" . $parameter . "&sign=$sign";
//echo $url; die;

// set URL and other appropriate options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));

$response = curl_exec($ch);
curl_close($ch);
header('Content-type: text/html');
echo $response;

?>