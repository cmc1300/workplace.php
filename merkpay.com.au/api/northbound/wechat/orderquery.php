<?php
/*	
	http://api.merkpay.com.au/northbound/wechat/orderquery.php?merchantId=123456&out_trade_no=out_trade_no12345678
	http://api.merkpay.com.au/northbound/wechat/orderquery.php?merchantId=123456&transaction_id=013467007045764

merchantId=123456
out_trade_no=out_trade_no12345678
transaction_id=013467007045764
*/

	$aapt['mode']			= trim($_REQUEST['mode']);
	$merchantId				= trim($_REQUEST['merchantId']);
	$aapt['merchantId']		= $merchantId;
if (isset($_REQUEST['out_trade_no']) && !empty($_REQUEST['out_trade_no'])) {
    $aapt['out_trade_no']	= $_REQUEST['out_trade_no'];
    $index					= $_REQUEST['out_trade_no'];
}
if (isset($_REQUEST['transaction_id']) && !empty($_REQUEST['transaction_id'])) {
	$aapt['transaction_id']	= $_REQUEST['transaction_id'];
	$index					= $_REQUEST['transaction_id'];
}

$result_url="http://api.merkpay.com.au/southbound/wechat/orderquery.php";
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

<?php 
header('Content-type: text/html; charset=utf-8');
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
?>

<div class="container" style="margin-top: 1%;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12" style="align:left">
			<h2>订单支付（<?php echo $index;?>）状态查询</h2>
			<div class="table-responsive" style="max-height: 600px; max-width: 800px; margin: 0; overflow-y: auto;">
		    <table class="table table-bordered table-hover">
				<tbody>
					<?php 
					$rowString			= "";
					$isUpdateDatabase	= false;
					/*		*/
					if ($return_code == "SUCCESS") {
						if ($result_code == "SUCCESS") {
							/*
								echo "支付成功！<br>" . "$currency" . ($order_amount/100)  . "已经成功支付，谢谢！<br>";
								$rowString  .= "<tr class='info'>" . "<td>return_code</td>" . "<td>$return_code</td>" . "</tr>";
								$rowString  .= "<tr class='info'>" . "<td>return_msg</td>" . "<td>$return_msg</td>" . "</tr>";
								$rowString  .= "<tr class='info'>" . "<td>result_code</td>" . "<td>$result_code</td>" . "</tr>";
								if ( !(strlen($err_code)==0 && strlen($err_code_des)==0) ) {
									$rowString  .= "<tr class='info'>" . "<td>err_code</td>" . "<td>$err_code</td>" . "</tr>";
									$rowString  .= "<tr class='info'>" . "<td>err_code_des</td>" . "<td>$err_code_des</td>" . "</tr>";
								}
							*/
							if ($trade_state == "SUCCESS") {
								$isUpdateDatabase = true;
								$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "$currency" . ($order_amount/100)  . "已经成功支付！" . "</td>" . "</tr>";
							}
							else if ($trade_state == "REFUND") {
								$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "本次支付已经转入退款！" . "</td>" . "</tr>";
							}
							else if ($trade_state == "NOTPAY") {
								$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "本次支付没有实际付款！" . "</td>" . "</tr>";
							}
							else if ($trade_state == "CLOSED") {
								$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "本次支付已经关闭！" . "</td>" . "</tr>";
							}
							else if ($trade_state == "REVOKED") {
								$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "本次支付已经撤消！" . "</td>" . "</tr>";
							}
							else if ($trade_state == "USERPAYING") {
								$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "支付尚未完成，请继续检查付款状态！" . "</td>" . "</tr>";
							}
							else if ($trade_state == "PAYERROR") {
								$rowString  .= "<tr class='info'>" . "<td>订单支付状态</td>" . "<td>" . "本次支付失败，请重新提交付款申请！" . "</td>" . "</tr>";
							}
							else {

							}

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
							$rowString  .= "<tr class='info'>" . "<td>查询订单状态失败</td>" . "<td>" . $err_code . "（" . $err_code_des . "）" . "</td>" . "</tr>";
						}
					}
					else if ($return_code == "FAIL") {
						$rowString  .= "<tr class='info'>" . "<td>查询订单状态失败</td>" . "<td>$return_msg</td>" . "</tr>";
					}
					
					if (strlen($trade_state_desc) != 0) {
						$rowString  .= "<tr class='info'>" . "<td>后续操作指引</td>" . "<td>$trade_state_desc</td>" . "</tr>";
					}
					echo $rowString;
					?>
				</tbody>
		    </table>
			</div>
		</div>
	</div>
</div>


<?php 
if ($isUpdateDatabase) {
	$con = mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table weChatPaymentTransactions: " . mysql_error();
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");
	$sql = "UPDATE `weChatPaymentTransactions` 
			SET `result_code` = '$result_code', `err_code` = '$err_code', `err_code_des` = '$err_code_des', 
			`openid` = '$openid', `trade_type` = '$trade_type',	
			`trade_state` = '$trade_state', `trade_state_desc` = '$trade_state_desc',`currency` = '$currency',
			`order_amount` = $order_amount, `customer_payment_amount` = $customer_payment_amount, `coupon_amount` = $coupon_amount, 
			`discount_amount` = $discount_amount, `coupon_info` = '$coupon_info'";
	if (isset($_REQUEST['out_trade_no']) && !empty($_REQUEST['out_trade_no'])) {
		$sql = $sql . " where merchantId = '$merchantId' AND out_trade_no = '$index'";
	}
	if (isset($_REQUEST['transaction_id']) && !empty($_REQUEST['transaction_id'])) {
		$sql = $sql . " where merchantId = '$merchantId' AND transaction_id = '$index'";
	}
	
	$result 		= mysql_query($sql);
	if (!$result)
	{
		echo "Failed to update table weChatPaymentTransactions: " . mysql_error();
		die;
	}
	mysql_close($con);
}
?>

	<script src="../../js/function.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
	
</body>
</html>