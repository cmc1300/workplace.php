<?php
/*	
	http://api.merkpay.com.au/northbound/tenpay/payment.php?merchantId=123456&attach=attach12345678&body=body12345678&buyer_id=12345678&fee_type=AUD&goods_tag=goods_tag&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11

merchantId=123456
attach=attach12345678
body=body12345678
buyer_id=12345678
goods_tag=goods_tag
out_trade_no=out_trade_no12345678
partner_name=partner_name12345678
partner_no=partner_no12345678
product_fee=110
transport_fee=11
*/
header('content-type:text/plain;');

{
	$merchantId			= trim($_REQUEST['merchantId']);
	$bank_type			= "DEFAULT";
	$return_url			= "http://api.merkpay.com.au/payment_return_url.php";
	$spbill_create_ip	= trim($_SERVER['REMOTE_ADDR']);
	$trade_way			= "1";
}

if (isset($_REQUEST['attach'])) {
	$attach		= trim($_REQUEST['attach']);
}
else {
	$attach		= "";
}

if (isset($_REQUEST['body'])) {
	$body		= trim($_REQUEST['body']);
}
else {
	$body		= "";
}

if (isset($_REQUEST['buyer_id'])) {
	$buyer_id	= trim($_REQUEST['buyer_id']);
}
else {
	$buyer_id	= "";
}

if (isset($_REQUEST['fee_type'])) {
	$fee_type	= trim($_REQUEST['fee_type']);
}
else {
	$fee_type	= "";
}

if (isset($_REQUEST['goods_tag'])) {
	$goods_tag	= trim($_REQUEST["goods_tag"]);
}
else {
	$goods_tag	= "";
}

if (isset($_REQUEST['out_trade_no'])) {
	$out_trade_no= trim($_REQUEST['out_trade_no']);
}
else {
	$out_trade_no= "";
}

if (isset($_REQUEST['partner_name'])) {
	$partner_name= trim($_REQUEST['partner_name']);
}
else {
	$partner_name= "";
}

if (isset($_REQUEST['partner_no'])) {
	$partner_no	= trim($_REQUEST['partner_no']);
}
else {
	$partner_no= "";
}

if (isset($_REQUEST['product_fee'])) {
	$product_fee= trim($_REQUEST['product_fee']);
}
else {
	$product_fee= "";
}

{
	date_default_timezone_set('Asia/Shanghai');
	$time = new Datetime();
	$time_start = $time->format('YmdHis');
	$time = date_add($time, date_interval_create_from_date_string('2 hours'));
	$time_expire = $time->format('YmdHis');
}

if (isset($_REQUEST['transport_fee'])) {
	$transport_fee= trim($_REQUEST['transport_fee']);
	$total_fee	= 0 + $product_fee + $transport_fee;
}
else {
	$transport_fee= "";
	$total_fee	= 0 + $product_fee;
}

$aapt = array();
if (true) {
	$con = mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table tenpayPaymentTransactions: " . mysql_error();
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");
	
	$s_return_url		= mysql_real_escape_string($return_url);
	$sql = "INSERT INTO `tenpayPaymentTransactions`(
			`merchantId`, `bank_type`, `body`, `attach`, `return_url`, 
			`buyer_id`, `out_trade_no`, `total_fee`, 
			`fee_type`, `spbill_create_ip`, `time_start`, `time_expire`, `transport_fee`, 
			`product_fee`, `goods_tag`, `partner_no`, `partner_name`, `trade_way`) 
			VALUES (
			'$merchantId', '$bank_type', '$body', '$attach', '$s_return_url', 
			'$buyer_id', '$out_trade_no', $total_fee, 
			'$fee_type', '$spbill_create_ip', '$time_start', '$time_expire', $transport_fee, 
			$product_fee, '$goods_tag', '$partner_no', '$partner_name', $trade_way)";
	//echo $sql; die;
	$result 		= mysql_query($sql);
	$aapt['rowId']	= mysql_insert_id();
	if (!$result)
	{
		echo "Failed to save into table tenpayPaymentTransactions: " . mysql_error();
		die;
	}
	
	mysql_close($con);
}

if (true) {
	$aapt['mode']			= trim($_REQUEST['mode']);
	$aapt['merchantId']		= trim($_REQUEST['merchantId']);
	if (isset($_REQUEST['attach'])) {
		$aapt['attach']			= trim($_REQUEST['attach']);
	}
	if (isset($_REQUEST['body'])) {
		$aapt['body']			= trim($_REQUEST['body']);
	}
	if (isset($_REQUEST['buyer_id'])) {
		$aapt['buyer_id']		= trim($_REQUEST['buyer_id']);
	}
	if (isset($_REQUEST['goods_tag'])) {
		$aapt['goods_tag']		= trim($_REQUEST['goods_tag']);
	}
	if (isset($_REQUEST['out_trade_no'])) {
		$aapt['out_trade_no']	= trim($_REQUEST['out_trade_no']);
	}
	if (isset($_REQUEST['partner_name'])) {
		$aapt['partner_name']	= trim($_REQUEST['partner_name']);
	}
	if (isset($_REQUEST['partner_no'])) {
		$aapt['partner_no']		= trim($_REQUEST['partner_no']);
	}
	if (isset($_REQUEST['product_fee'])) {
		$aapt['product_fee']	= trim($_REQUEST['product_fee']);
	}
	if (isset($_REQUEST['transport_fee'])) {
		$aapt['transport_fee']	= trim($_REQUEST['transport_fee']);
	}
	$aapt['spbill_create_ip']	= trim($_SERVER['REMOTE_ADDR']);
	$aapt['return_url']			= urlencode(trim($return_url));
	$aapt['time_expire']		= $time_expire;
	$aapt['time_start']			= $time_start;
	$aapt['fee_type']			= "AUD";
	$aapt['bank_type']			= "DEFAULT";
	$aapt['partner']			= "1221929001";
	$aapt['trade_way']			= "1";
	
	$result_url="http://api.merkpay.com.au/southbound/tenpay/payment.php";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$result_url );
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
	$output = curl_exec($ch);
	
	if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
	}
	else {
		header('Content-type: text/html');
	}
	echo $output;
}

?>