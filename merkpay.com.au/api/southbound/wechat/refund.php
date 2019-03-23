<?php
/*	
	http://api.merkpay.com.au/southbound/wechat/refund.php?out_trade_no=20150929151936594AT123456
	http://api.merkpay.com.au/southbound/wechat/refund.php?transaction_id=1007830019201509220953721910

	appid=wx6907630eadb944b9
	mch_id=1268435201
	nonce_str=strtoupper(generateRandomString(32))
out_trade_no=20150929151936594AT123456
transaction_id=1005740019201509291031436210
*/

header('content-type:text/plain;  charset=utf-8');

{
	$con = mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table weChatPaymentTransactions: " . mysql_error();
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");
	
	if (isset($_REQUEST['transaction_id']) && !empty($_REQUEST['transaction_id'])) {
		$transaction_id	= trim($_REQUEST['transaction_id']);
		$sql 			= "select * from weChatPaymentTransactions where transaction_id = '$transaction_id' AND result_code = 'SUCCESS' order by id desc limit 1";
		
	}
	else if (isset($_REQUEST['out_trade_no']) && !empty($_REQUEST['out_trade_no'])) {
		$out_trade_no	= trim($_REQUEST['out_trade_no']);
		$sql 			= "select * from weChatPaymentTransactions where out_trade_no = '$out_trade_no' AND result_code = 'SUCCESS' order by id desc limit 1";
	}
	
	$result = mysql_query($sql);
	if (!$result)
	{
		echo "Failed to select table sampleGoodsList: " . mysql_error();
		die;
	}
	$row = mysql_fetch_assoc($result);
	if (!$row) {
		echo "Failed to select from table weChatPaymentTransactions: " . mysql_error();
	}
	mysql_close($con);
	$device_info 	= trim($row['device_info']);
	$transaction_id = trim($row['transaction_id']);
	$out_trade_no 	= trim($row['out_trade_no']);
	$out_refund_no	= trim($row['out_trade_no']);
	$order_amount 	= trim($row['order_amount']);
	$refund_amount 	= trim($row['customer_payment_amount']);
	$currency 		= trim($row['currency']);
	$op_user_id 	= trim($row['merchantId']);
	//var_dump($row); die;
}

{
	$appid			= "wx6907630eadb944b9";
	$mch_id			= "1221929001";	//1268435201	1218057401
	$key			= "7e2d8b15e4cabc4aaec1207ba72686b1";	//7e2d8b15e4cabc4aaec1207ba72686b1	1090f25ea8a1591682e3c60774d1e9a6
	$nonce_str		= strtoupper(generateRandomString(32));
	
	$parameter 		= "";
	$parameter		= $parameter . "appid=$appid&";
	$parameter		= $parameter . "currency=$currency&";
	$parameter		= $parameter . "device_info=$device_info&";
	$parameter		= $parameter . "mch_id=$mch_id&";
	$parameter		= $parameter . "nonce_str=$nonce_str&";
	$parameter		= $parameter . "op_user_id=$op_user_id&";
	$parameter		= $parameter . "order_amount=$order_amount&";
	$parameter		= $parameter . "out_refund_no=$out_refund_no&";
	$parameter		= $parameter . "out_trade_no=$out_trade_no&";
	$parameter		= $parameter . "refund_amount=$refund_amount&";
	$parameter		= $parameter . "transaction_id=$transaction_id";
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
		<device_info>' . $device_info . '</device_info>
		<transaction_id>' . $transaction_id . '</transaction_id>
		<out_trade_no>' . $out_trade_no . '</out_trade_no>
		<out_refund_no>' . $out_refund_no . '</out_refund_no>
		<order_amount>' . $order_amount . '</order_amount>
		<refund_amount>' . $refund_amount . '</refund_amount>
		<currency>' . $currency . '</currency>
		<op_user_id>' . $op_user_id . '</op_user_id>
		<sign>' . $sign . '</sign>
	</xml>';
if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
	//echo $parameter . "\n";
	echo $xml; die;
}

// set URL and other appropriate options
$url 		= "https://payapi.wechat.com/cgi-bin/refund.cgi";
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