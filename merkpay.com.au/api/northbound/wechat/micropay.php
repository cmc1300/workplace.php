<?php
/*	
	http://api.merkpay.com.au/northbound/wechat/micropay.php?merchantId=123456&attach=attach12345678&auth_code=130414766970369705&currency=AUD&desc=descOfProduct&
	detail=detailInfo&device_info=013467007045764&goods_tag=goods_tag&order_amount=123&out_trade_no=out_trade_no12345678&mode=true
	http://api.merkpay.com.au/northbound/wechat/micropay.php?merchantId=123456&attach=attach12345678&auth_code=130414766970369705&currency=AUD&desc=descOfProduct&
	detail=detailInfo&device_info=013467007045764&goods_tag=goods_tag&order_amount=123&out_trade_no=out_trade_no12345678&mode=false

merchantId=123456
attach=attach12345678
auth_code=130414766970369705
desc=descOfProduct
	detail=detailInfo
device_info=013467007045764
	goods_tag=goods_tag
order_amount=123
out_trade_no=out_trade_no12345678
spbill_create_ip=14.137.150.239
	time_expire=20150901200000
	time_start=20150901100000
*/

header('content-type:text/plain; charset=utf-8');

{
	$merchantId			= trim($_REQUEST['merchantId']);
	//$appid				= "wx6907630eadb944b9";
	//$mch_id				= "1268435201";
	//$nonce_str			= strtoupper(generateRandomString(32));
	$spbill_create_ip	= trim($_SERVER['REMOTE_ADDR']);
	
	date_default_timezone_set('Asia/Shanghai');
	$time 				= new Datetime();
	$time_start 		= $time->format('YmdHis');
	$time 				= date_add($time, date_interval_create_from_date_string('2 hours'));
	$time_expire 		= $time->format('YmdHis');
}

if (isset($_REQUEST['attach'])) {
	$attach		= trim($_REQUEST['attach']);
}
else {
	$attach		= "";
}

if (isset($_REQUEST['auth_code'])) {
	$auth_code	= trim($_REQUEST['auth_code']);
}
else {
	$auth_code	= "";
}

if (isset($_REQUEST['currency'])) {
	$currency	= trim($_REQUEST['currency']);
}
else {
	$currency	= "";
}

if (isset($_REQUEST['desc'])) {
	$desc		= trim($_REQUEST['desc']);
}
else {
	$desc		= "";
}

if (isset($_REQUEST['detail'])) {
	$detail		= trim($_REQUEST['detail']);
}
else {
	$detail		= "";
}

if (isset($_REQUEST['device_info'])) {
	$device_info= trim($_REQUEST['device_info']);
}
else {
	$device_info= "";
}

if (isset($_REQUEST['goods_tag'])) {
	$goods_tag	= trim($_REQUEST['goods_tag']);
}
else {
	$goods_tag	= "";
}

if (isset($_REQUEST['order_amount'])) {
	$order_amount= trim($_REQUEST['order_amount']);
}
else {
	$order_amount= "";
}

if (isset($_REQUEST['out_trade_no'])) {
	$out_trade_no= trim($_REQUEST['out_trade_no']);
}
else {
	$out_trade_no= "";
}

$aapt = array();
if (true && (!isset($_REQUEST['mode']) || trim($_REQUEST['mode'])!="display")) {
	$con = mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table tenpayPaymentTransactions: " . mysql_error();
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");

	$s_notify_url		= mysql_real_escape_string($notify_url);
	$s_return_url		= mysql_real_escape_string($return_url);
	$s_desc				= mysql_real_escape_string($desc);
	$s_detail			= mysql_real_escape_string($detail);
	$s_attach			= mysql_real_escape_string($attach);
	$s_goods_tag		= mysql_real_escape_string($goods_tag);
	$sql = "INSERT INTO `weChatPaymentTransactions`(
	`sign`, `device_info`, `nonce_str`,
	`desc`, `detail`, `attach`, `out_trade_no`, `order_amount`,
	`currency`, `spbill_create_ip`, `time_start`, `time_expire`, `goods_tag`,
	`auth_code`, `merchantId`, `generationTime`)
	VALUES (
	'$sign', '$device_info', '$nonce_str',
	'$s_desc', '$s_detail', '$s_attach', '$out_trade_no', $order_amount,
	'$currency', '$spbill_create_ip', '$time_start', '$time_expire', '$s_goods_tag',
	'$auth_code', '$merchantId', CURRENT_TIMESTAMP)";
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

$aapt['mode']			= trim($_REQUEST['mode']);
$aapt['merchantId']		= trim($_REQUEST['merchantId']);
if (isset($_REQUEST['attach'])) {
	$aapt['attach']			= trim($_REQUEST['attach']);
}
if (isset($_REQUEST['auth_code'])) {
	$aapt['auth_code']		= trim($_REQUEST['auth_code']);
}
if (isset($_REQUEST['desc'])) {
	$aapt['desc']			= trim($_REQUEST['desc']);
}
if (isset($_REQUEST['detail'])) {
	$aapt['detail']			= trim($_REQUEST['detail']);
}
if (isset($_REQUEST['device_info'])) {
	$aapt['device_info']	= trim($_REQUEST['device_info']);
}
if (isset($_REQUEST['goods_tag'])) {
	$aapt['goods_tag']		= trim($_REQUEST['goods_tag']);
}
if (isset($_REQUEST['order_amount'])) {
	$aapt['order_amount']	= trim($_REQUEST['order_amount']);
}
if (isset($_REQUEST['out_trade_no'])) {
	$aapt['out_trade_no']	= trim($_REQUEST['out_trade_no']);
}
$aapt['spbill_create_ip']	= trim($_SERVER['REMOTE_ADDR']);
$aapt['time_expire']		= $time_expire;
$aapt['time_start']			= $time_start;

$result_url="http://api.merkpay.com.au/southbound/wechat/micropay.php";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$result_url );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
$output = curl_exec($ch);

if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="display") {
	header('Content-type: text/xml; charset=utf-8');
	echo $output;	// $output $aapt
	die;
}
else if (true && isset($_REQUEST['mode']) && trim($_REQUEST['mode'])=="interface") {
	header('Content-type: text/xml; charset=utf-8');
	echo $output;	// $output $aapt
	die;
}
?>

<?php 
	header('Content-type: text/html; charset=utf-8');
	$xml=simplexml_load_string($output) or die("Cannot parse such an object string: $output");
	$return_code 				= $xml -> return_code;
	$return_msg 				= $xml -> return_msg;
	$result_code 				= $xml -> result_code;
	$err_code 					= $xml -> err_code;
	$err_code_des 				= $xml -> err_code_des;
	
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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Merkpay Payment Demo</title>

<!-- Bootstrap -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body style='padding-top: 30px'>

		<div class="container" style="margin-top: 1%;">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-lg-12" style="align:left">
					<h2>订单（<?php echo $out_trade_no;?>）支付状态</h2>
					<div class="table-responsive" style="max-height: 600px; max-width: 800px; margin: 0; overflow-y: auto;">
				    <table class="table table-bordered table-hover">
						<tbody>
							<?php 
							$rowString  	 = "<tr class='info'>" . "<td>商户订单编号</td>" . "<td>" . $out_trade_no . "</td>" . "</tr>";
							$rowString  	.= "<tr class='info'>" . "<td>订单商品描述</td>" . "<td>" . $desc . "</td>" . "</tr>";
							/*		*/
							if ($return_code == "SUCCESS") {
								if ($result_code == "SUCCESS") {
									$aapt['mode']			= "interface";
									$aapt['merchantId']		= $merchantId;
									$aapt['out_trade_no']	= $out_trade_no;
									$result_url="http://api.merkpay.com.au/southbound/wechat/orderquery.php";
									$ch = curl_init();
									curl_setopt($ch,CURLOPT_URL,$result_url );
									curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
									curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
									curl_setopt($ch, CURLOPT_POST, 1);
									curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
									$output = curl_exec($ch);
										
									$xml=simplexml_load_string($output) or die("Cannot parse such an object string: $output");
									$return_code 				= $xml -> return_code;
									$return_msg 				= $xml -> return_msg;
									$result_code 				= $xml -> result_code;
									$err_code 					= $xml -> err_code;
									$err_code_des 				= $xml -> err_code_des;
									$openid						= $xml -> openid;
									$trade_type					= $xml -> trade_type;
									$trade_state				= $xml -> trade_state;
									$trade_state_desc			= $xml -> trade_state_desc;
									$currency					= $xml -> currency;
									$order_amount				= $xml -> order_amount;
									$customer_payment_amount	= $xml -> customer_payment_amount;
									$coupon_amount				= $xml -> coupon_amount;
									$discount_amount			= $xml -> discount_amount;
									$coupon_info				= $xml -> coupon_info;
									$transaction_id				= $xml -> transaction_id;
									$out_trade_no				= $xml -> out_trade_no;
									$attach						= $xml -> attach;
										
									$rowString   = "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "$currency" . ($order_amount/100)  . "已经成功支付！" . "</td>" . "</tr>";
									$rowString  .= "<tr class='info'>" . "<td>收款商户信息</td>" . "<td>$merchantId - $attach</td>" . "</tr>";
									if (strlen($openid) != 0) {
										$rowString  .= "<tr class='info'>" . "<td>商户用户标识</td>" . "<td>$openid</td>" . "</tr>";
									}
									if (strlen($trade_type) != 0) {
										$rowString  .= "<tr class='info'>" . "<td>订单交易类型</td>" . "<td>$trade_type</td>" . "</tr>";
									}
									$rowString  .= "<tr class='info'>" . "<td>订单交易状态</td>" . "<td>$trade_state</td>" . "</tr>";
									$rowString  .= "<tr class='info'>" . "<td>订单支付金额</td>" . "<td>" . "$currency" . ($order_amount/100)  . "</td>" . "</tr>";
									$rowString  .= "<tr class='info'>" . "<td>用户支付金额</td>" . "<td>" . "$currency" . ($customer_payment_amount/100)  . "</td>" . "</tr>";
									if ($order_amount != $customer_payment_amount) {
										$rowString  .= "<tr class='info'>" . "<td>优惠券的金额</td>" . "<td>$coupon_amount</td>" . "</tr>";
										$rowString  .= "<tr class='info'>" . "<td>优惠券的详情</td>" . "<td>$coupon_info</td>" . "</tr>";
										$rowString  .= "<tr class='info'>" . "<td>平台折扣金额</td>" . "<td>$discount_amount</td>" . "</tr>";
									}
									if (strlen($transaction_id) != 0) {
										$rowString  .= "<tr class='info'>" . "<td>微信订单编号</td>" . "<td>$transaction_id</td>" . "</tr>";
									}
									$rowString  .= "<tr class='info'>" . "<td>商户订单编号</td>" . "<td>$out_trade_no</td>" . "</tr>";
								}
								else if ($result_code == "FAIL") {
									if ($err_code == "USERPAYING") {
										$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "支付尚未完成，请继续检查付款状态！" . "</td>" . "</tr>";
									}
									else if ($err_code == "BANKERROR") {
										$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "银行系统异常，请继续检查付款状态！" . "</td>" . "</tr>";
									}
									else {
										$rowString  .= "<tr class='info'>" . "<td>订单支付失败</td>" . "<td>" . $err_code . "（" . $err_code_des . "）" . "</td>" . "</tr>";
									}
								}
							}
							else if ($return_code == "FAIL") {
								$rowString  .= "<tr class='info'>" . "<td>订单支付失败</td>" . "<td>" . "错误原因：" . $return_msg . "</td>" . "</tr>";
							}
							
							if (strlen($trade_state_desc) != 0) {
								$rowString  .= "<tr class='info'>" . "<td>后续操作指引</td>" . "<td>$trade_state_desc</td>" . "</tr>";
							}
							echo $rowString;
							?>
						</tbody>
				    </table>
					</div>				
					<?php if ($return_code == "SUCCESS" && $result_code == "FAIL" && ($err_code == "USERPAYING" || $err_code == "BANKERROR")) {?>
						<button class="btn btn-primary" type='button' onclick="checkPaymentStatus('<?php echo "$merchantId"?>','<?php echo $out_trade_no;?>')">查询订单支付状态</button>
					<?php } else if ($return_code == "SUCCESS" && $result_code == "SUCCESS") {	?>
						<button class="btn btn-primary" type='button' onclick="window.location='http://api.merkpay.com.au'">Merkpay Homepage</button>
					<?php } else {?>
						<button class="btn btn-primary" type='button' onclick="window.location='http://api.merkpay.com.au'">Merkpay Homepage</button>
					<?php }?>
				</div>
			</div>
		</div>
		
		<div name="divPaymentStatus" id="divPaymentStatus" style="display: none">
			<div class="container" style="margin-top: 1%;">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-lg-12" style="align:left">
						<div class="table-responsive" style="max-height: 600px; max-width: 800px; margin: 0; overflow-y: auto;">
					    <table class="table table-bordered table-hover">
							<tbody>
								<tr class='info'>
									<label type="text" name="paymentStatus" id="paymentStatus"></label>
								</tr>
							</tbody>
					    </table>
						</div>				
					</div>
				</div>
			</div>
		</div>

	<script src="../../js/function.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
	
</body>
</html>