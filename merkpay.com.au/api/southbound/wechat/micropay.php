<?php
/*	
	http://api.merkpay.com.au/southbound/wechat/micropay.php?attach=attach12345678&auth_code=130414766970369705&desc=descOfProduct&detail=detailInfo&
	device_info=013467007045764&goods_tag=goods_tag&order_amount=123&out_trade_no=out_trade_no12345678

appid=wx6907630eadb944b9
attach=attach12345678
auth_code=130414766970369705
currency=AUD
desc=descOfProduct
	detail=detailInfo
device_info=013467007045764
	goods_tag=goods_tag
mch_id=1268435201
	nonce_str=strtoupper(generateRandomString(32))
order_amount=123
out_trade_no=out_trade_no12345678
spbill_create_ip=14.137.150.239
	time_expire=20150901200000
	time_start=20150901100000
*/

header('content-type:text/plain; charset=utf-8');

$parameter	= "";
{
	$merchantId	= trim($_REQUEST['merchantId']);
	$mch_id		= "1221929001";	//1268435201	1218057401
	$key		= "7e2d8b15e4cabc4aaec1207ba72686b1";	//7e2d8b15e4cabc4aaec1207ba72686b1	1090f25ea8a1591682e3c60774d1e9a6
}

{
	$appid		= "wx6907630eadb944b9";
	$parameter	= $parameter . "appid=$appid&";
}

if (isset($_REQUEST['attach'])) {
	$attach		= trim($_REQUEST['attach']);
	$parameter	= $parameter . "attach=$attach&";
}
else {
	$attach		= "";
}

if (isset($_REQUEST['auth_code'])) {
	$auth_code	= trim($_REQUEST['auth_code']);
	$parameter	= $parameter . "auth_code=$auth_code&";
}
else {
	$auth_code	= "";
}

if (isset($_REQUEST['currency'])) {
	$currency	= trim($_REQUEST['currency']);
	$parameter	= $parameter . "currency=$currency&";
}
else {
	$currency	= "AUD";
	$parameter	= $parameter . "currency=$currency&";
}

if (isset($_REQUEST['desc'])) {
	$desc		= trim($_REQUEST['desc']);
	$parameter	= $parameter . "desc=$desc&";
}
else {
	$desc		= "";
}

if (isset($_REQUEST['detail'])) {
	$detail		= trim($_REQUEST['detail']);
	$parameter	= $parameter . "detail=$detail&";
}
else {
	$detail		= "";
}

if (isset($_REQUEST['device_info'])) {
	$device_info= trim($_REQUEST['device_info']);
	$parameter	= $parameter . "device_info=$device_info&";
}
else {
	$device_info= "";
}

if (isset($_REQUEST['goods_tag'])) {
	$goods_tag	= trim($_REQUEST['goods_tag']);
	$parameter	= $parameter . "goods_tag=$goods_tag&";
}
else {
	$goods_tag	= "";
}

{
	$parameter	= $parameter . "mch_id=$mch_id&";
}

{
	$nonce_str	= strtoupper(generateRandomString(32));
	$parameter	= $parameter . "nonce_str=$nonce_str&";
}

if (isset($_REQUEST['order_amount'])) {
	$order_amount= trim($_REQUEST['order_amount']);
	$parameter	= $parameter . "order_amount=$order_amount&";
}
else {
	$order_amount= "";
}

if (isset($_REQUEST['out_trade_no'])) {
	$out_trade_no= trim($_REQUEST['out_trade_no']);
	$parameter	= $parameter . "out_trade_no=$out_trade_no&";
}
else {
	$out_trade_no= "";
}

if (isset($_REQUEST['spbill_create_ip'])) {
	$spbill_create_ip= trim($_REQUEST['spbill_create_ip']);
	$parameter	= $parameter . "spbill_create_ip=$spbill_create_ip&";
}
else {
	$spbill_create_ip= trim($_SERVER['REMOTE_ADDR']);
	$parameter	= $parameter . "spbill_create_ip=$spbill_create_ip&";
}

{
	$time_start = trim($_REQUEST["time_start"]);
	$time_expire= trim($_REQUEST["time_expire"]);
	$parameter	= $parameter . "time_expire=$time_expire&";
	$parameter	= $parameter . "time_start=$time_start";
}

// $sign = $parameter . "&key=7e2d8b15e4cabc4aaec1207ba72686b1";
// key = 7e2d8b15 e4cabc4a aec1207b a72686b1
$sign = $parameter . "&key=$key";
//echo $sign . "\n";
$sign = strtoupper(md5($sign));

if (true) {
	$xml = '<?xml version="1.0" encoding="UTF-8"?>
    <xml>
		<appid>' . $appid . '</appid>
		<attach>' . $attach . '</attach>
		<auth_code>' . $auth_code . '</auth_code>
		<currency>' . $currency . '</currency>
		<desc>' . $desc . '</desc>
		<detail>' . $detail . '</detail>
		<device_info>' . $device_info . '</device_info>
		<goods_tag>' . $goods_tag . '</goods_tag>
		<mch_id>' . $mch_id . '</mch_id>
		<nonce_str>' . $nonce_str . '</nonce_str>
		<order_amount>' . $order_amount . '</order_amount>
		<out_trade_no>' . $out_trade_no . '</out_trade_no>
		<spbill_create_ip>' . $spbill_create_ip . '</spbill_create_ip>
		<time_expire>' . $time_expire . '</time_expire>
		<time_start>' . $time_start . '</time_start>
		<sign>' . $sign . '</sign>
	</xml>';
	if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
		date_default_timezone_set('Australia/Melbourne');
		$filename = "micropay-" . date("Y") . "-" . date("F") . ".log";
		file_put_contents($filename,date("l jS \of F Y h:i:s A") . " $action \r\n", FILE_APPEND | LOCK_EX);
		file_put_contents($filename,"=============================================================================\r\n", FILE_APPEND | LOCK_EX);
		file_put_contents($filename,"Mode is display \r\n", FILE_APPEND | LOCK_EX);
		file_put_contents($filename,$xml . "\r\n", FILE_APPEND | LOCK_EX);
		file_put_contents($filename,"=============================================================================\r\n", FILE_APPEND | LOCK_EX);
		header('Content-type: text/xml; charset=utf-8');
		echo $xml; die;
	}
	
	// set URL and other appropriate options
	$url = "https://payapi.wechat.com/cgi-bin/micropay.cgi";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // Follow redirects
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Return the HTTP response from the curl_exec function
	
	$response = curl_exec($ch);
	curl_close($ch);
	
	header('Content-type: text/xml; charset=utf-8');
	echo $response;
	//var_dump( $response); die;
	
	//header('Content-type: text/html;');
	$con = mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table weChatPaymentTransactions: " . mysql_error();
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");
	
	$xml=simplexml_load_string($response) or die("Error: Cannot create object");
	$return_code 	= $xml -> return_code;
	$return_msg 	= $xml -> return_msg;
	$result_code 	= $xml -> result_code;
	$err_code 		= $xml -> err_code;
	$err_code_des 	= $xml -> err_code_des;
	$err_code_des 	= mysql_real_escape_string($err_code_des);
	
	$sql = "UPDATE `weChatPaymentTransactions`
	SET `sign` = '$sign', `nonce_str` = '$nonce_str', `mch_id` = '$mch_id', `appid` = '$appid',
	`return_code` = '$return_code', `return_msg` = '$return_msg', `result_code` = '$result_code',
	`err_code` = '$err_code', `err_code_des` = '$err_code_des'";
		
	$openid		 	= $xml -> openid;
	if (!empty($openid) && strlen($openid) != 0) {
		$sql = $sql . ", `openid` = '$openid'";
	}
	$is_subscribe 	= $xml -> is_subscribe;	
	if (!empty($is_subscribe) && strlen($is_subscribe) != 0) {
		if (strtolower($is_subscribe) == "y") {
			$sql = $sql . ", `is_subscribe` = TRUE";
		}
		else if (strtolower($is_subscribe) == "n") {
			$sql = $sql . ", `is_subscribe` = FALSE";
		}
		else {}
	}
	$trade_type	 	= $xml -> trade_type;
	if (!empty($trade_type) && strlen($trade_type) != 0) {
		$sql = $sql . ", `trade_type` = '$trade_type'";
	}
	$bank_type	 	= $xml -> bank_type;
	if (!empty($bank_type) && strlen($bank_type) != 0) {
		$sql = $sql . ", `bank_type` = '$bank_type'";
	}
	$currency	 	= $xml -> currency;
	if (!empty($currency) && strlen($currency) != 0) {
		$sql = $sql . ", `currency` = '$currency'";
	}
	$order_amount 	= $xml -> order_amount;
	if (!empty($order_amount) && strlen($order_amount) != 0) {
		$sql = $sql . ", `order_amount` = $order_amount";
	}
	$customer_payment_amount = $xml -> customer_payment_amount;
	if (!empty($customer_payment_amount) && strlen($customer_payment_amount) != 0) {
		$sql = $sql . ", `customer_payment_amount` = $customer_payment_amount";
	}
	$coupon_amount 	= $xml -> coupon_amount;
	if (!empty($coupon_amount) && strlen($coupon_amount) != 0) {
		$sql = $sql . ", `coupon_amount` = $coupon_amount";
	}
	$discount_amount= $xml -> discount_amount;
	if (!empty($discount_amount) && strlen($discount_amount) != 0) {
		$sql = $sql . ", `discount_amount` = $discount_amount";
	}
	$transaction_id	= $xml -> transaction_id;
	if (!empty($transaction_id) && strlen($transaction_id) != 0) {
		$sql = $sql . ", `transaction_id` = '$transaction_id'";
	}
	$time_end	 	= $xml -> time_end;
	if (!empty($time_end) && strlen($time_end) != 0) {
		$sql = $sql . ", `time_end` = '$time_end'";
	}
	/*		*/
	//print_r($xml);
	$sql = $sql . " where id = " . trim($_REQUEST['rowId']);
}

date_default_timezone_set('Australia/Melbourne');
$filename = "micropay-" . date("Y") . "-" . date("F") . ".log";
file_put_contents($filename,date("l jS \of F Y h:i:s A") . " $action \r\n", FILE_APPEND | LOCK_EX);
file_put_contents($filename,"=============================================================================\r\n", FILE_APPEND | LOCK_EX);
file_put_contents($filename,$sql . "\r\n", FILE_APPEND | LOCK_EX);
file_put_contents($filename,"=============================================================================\r\n", FILE_APPEND | LOCK_EX);

{
	$result 		= mysql_query($sql);
	if (!$result)
	{
		echo "Failed to update table weChatPaymentTransactions: " . mysql_error();
		die;
	}
	
	mysql_close($con);
}

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