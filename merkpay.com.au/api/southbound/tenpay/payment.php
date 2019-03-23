<?php
/*	
	http://api.merkpay.com.au/payment2.php?attach=attach12345678&body=body12345678&buyer_id=12345678&goods_tag=goods_tag&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11

attach=attach12345678
bank_type=DEFAULT
body=body12345678
buyer_id=12345678
fee_type=AUD
goods_tag=goods_tag
notify_url=http://api.merkpay.com.au/payment_notify_url.php
out_trade_no=out_trade_no12345678
partner=1221929001/1218057401
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

$parameter = "";
{
	$merchantId	= trim($_REQUEST['merchantId']);
}

if (isset($_REQUEST['attach'])) {
	$attach		= trim($_REQUEST['attach']);
	$parameter	= $parameter . "attach=$attach&";
}
else {
	$attach		= "";
}

if (isset($_REQUEST['bank_type'])) {
	$bank_type	= trim($_REQUEST['bank_type']);
	$parameter	= $parameter . "bank_type=$bank_type&";
}
else {
	$bank_type	= "DEFAULT";
	$parameter	= $parameter . "bank_type=$bank_type&";
}

if (isset($_REQUEST['body'])) {
	$body		= trim($_REQUEST['body']);
	$parameter	= $parameter . "body=$body&";
}
else {
	$body		= "";
}

if (isset($_REQUEST['buyer_id'])) {
	$buyer_id	= trim($_REQUEST['buyer_id']);
	$parameter	= $parameter . "buyer_id=$buyer_id&";
}
else {
	$buyer_id	= "";
}

if (isset($_REQUEST['fee_type'])) {
	$fee_type	= trim($_REQUEST["fee_type"]);
	$parameter	= $parameter . "fee_type=$fee_type&";
}
else {
	$fee_type	= "AUD";
	$parameter	= $parameter . "fee_type=$fee_type&";
}

if (isset($_REQUEST['goods_tag'])) {
	$goods_tag	= trim($_REQUEST["goods_tag"]);
	$parameter	= $parameter . "goods_tag=$goods_tag&";
}
else {
	$goods_tag	= "";
}

{
	$notify_url	= "http://api.merkpay.com.au/payment_notify_url.php";
	$parameter	= $parameter . "notify_url=$notify_url&";
}

if (isset($_REQUEST['out_trade_no'])) {
	$out_trade_no= trim($_REQUEST['out_trade_no']);
	$parameter	= $parameter . "out_trade_no=$out_trade_no&";
}
else {
	$out_trade_no= "";
}

{
	$partner	= "1218057401";
	$parameter	= $parameter . "partner=$partner&";
}

if (isset($_REQUEST['partner_name'])) {
	$partner_name= trim($_REQUEST['partner_name']);
	$parameter	= $parameter . "partner_name=$partner_name&";
}
else {
	$partner_name= "";
}

if (isset($_REQUEST['partner_no'])) {
	$partner_no	= trim($_REQUEST['partner_no']);
	$parameter	= $parameter . "partner_no=$partner_no&";
}
else {
	$partner_no= "";
}

if (isset($_REQUEST['product_fee'])) {
	$product_fee= trim($_REQUEST['product_fee']);
	$parameter	= $parameter . "product_fee=$product_fee&";
}
else {
	$product_fee= "";
}

if (isset($_REQUEST['return_url'])) {
	$return_url	= urldecode(trim($_REQUEST["return_url"]));
	$parameter	= $parameter . "return_url=$return_url&";
}
else {
	$return_url	= "http://api.merkpay.com.au/payment_return_url.php";
	$parameter	= $parameter . "return_url=$return_url&";
}

if (isset($_REQUEST['spbill_create_ip'])) {
	$spbill_create_ip= trim($_REQUEST["spbill_create_ip"]);
	$parameter	= $parameter . "spbill_create_ip=$spbill_create_ip&";
}
else {
	$spbill_create_ip= trim($_SERVER['REMOTE_ADDR']);
	$parameter	= $parameter . "spbill_create_ip=$spbill_create_ip&";
}

{
	$time_start = trim($_REQUEST["time_start"]);
	$time_expire = trim($_REQUEST["time_expire"]);
	$parameter	= $parameter . "time_expire=$time_expire&";
	$parameter	= $parameter . "time_start=$time_start&";
}

if (isset($_REQUEST['trade_way'])) {
	$trade_way	= trim($_REQUEST["trade_way"]);
}
else {
	$trade_way	= "1";
}
if (isset($_REQUEST['transport_fee'])) {
	$transport_fee= trim($_REQUEST['transport_fee']);
	$total_fee	= 0 + $product_fee + $transport_fee;
	$parameter	= $parameter . "total_fee=$total_fee&";
	$parameter	= $parameter . "trade_way=$trade_way&";
	$parameter	= $parameter . "transport_fee=$transport_fee";
}
else {
	$transport_fee= "";
	$total_fee	= 0 + $product_fee;
	$parameter	= $parameter . "total_fee=$total_fee&";
	$parameter	= $parameter . "trade_way=$trade_way";
}

// $sign = $parameter . "&key=7e2d8b15e4cabc4aaec1207ba72686b1";
// key = 7e2d8b15 e4cabc4a aec1207b a72686b1
$sign = $parameter . "&key=1090f25ea8a1591682e3c60774d1e9a6";
$sign = strtoupper(md5($sign)) . "";

if (true) {
	// set URL and other appropriate options
	$url = "https://gw.tenpay.com/intl/gateway/pay.htm?" . $parameter . "&sign=$sign";
	if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
		echo $url; 
		die;
	}
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
}

if (true) {
	$con = mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table tenpayPaymentTransactions: " . mysql_error();
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");

	$notify_url		= mysql_real_escape_string($notify_url);
	$sql = "UPDATE `tenpayPaymentTransactions`
	SET `sign` = '$sign', `notify_url` = '$notify_url', `partner` = '$partner'
	where id = " . trim($_REQUEST['rowId']);
	//echo $sql; die;
	$result = mysql_query($sql);
	if (!$result)
	{
		echo "Failed to save into table tenpayPaymentTransactions: " . mysql_error();
		die;
	}

	mysql_close($con);
}

?>