<?php
/*	
	http://api.merkpay.com.au/northbound/wechat/refundquery.php?merchantId=123456&out_trade_no=20150929151936594AT123456
	http://api.merkpay.com.au/northbound/wechat/refundquery.php?merchantId=123456&transaction_id=1005740019201509291031436210

merchantId=123456
out_trade_no=20150929151936594AT123456
transaction_id=1005740019201509291031436210
*/

if (true) {
	$con = mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table weChatPaymentRefund: " . mysql_error();
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
		echo "Failed to select table weChatPaymentRefund: " . mysql_error();
		die;
	}
	$row = mysql_fetch_assoc($result);
	if (!$row) {
		echo "Failed to select from table weChatPaymentRefund: " . mysql_error();
	}
	mysql_close($con);
	$desc		 	= trim($row['desc']);
	$currency	 	= trim($row['currency']);
	$order_amount 	= trim($row['order_amount']);
	$device_info 	= trim($row['device_info']);
	$transaction_id = trim($row['transaction_id']);
	$out_trade_no 	= trim($row['out_trade_no']);
	$out_refund_no	= trim($row['out_trade_no']);
	$order_amount 	= trim($row['order_amount']);
	$refund_amount 	= trim($row['customer_payment_amount']);
	$currency 		= trim($row['currency']);
}


	$aapt['mode']			= trim($_REQUEST['mode']);
	$merchantId				= trim($_REQUEST['merchantId']);
	$aapt['merchantId']		= $merchantId;
if (isset($_REQUEST['transaction_id']) && !empty($_REQUEST['transaction_id'])) {
	$aapt['transaction_id']	= $_REQUEST['transaction_id'];
	$index					= $_REQUEST['transaction_id'];
}
else if (isset($_REQUEST['out_trade_no']) && !empty($_REQUEST['out_trade_no'])) {
    $aapt['out_trade_no']	= $_REQUEST['out_trade_no'];
    $index					= $_REQUEST['out_trade_no'];
}

$result_url="http://api.merkpay.com.au/southbound/wechat/refundquery.php";
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
$device_info	 		 	= $xml -> device_info;
$transaction_id 		 	= $xml -> transaction_id;
$out_trade_no	 			= $xml -> out_trade_no;
$currency 		 			= $xml -> currency;
$order_amount	 			= $xml -> order_amount;
$refund_amount	 			= $xml -> refund_amount;
$customer_refund_amount		= $xml -> customer_refund_amount;
$coupon_refund_amount		= $xml -> coupon_refund_amount;
$discount_refund_amount		= $xml -> discount_refund_amount;
$refund_count				= $xml -> refund_count;

for ($i = 0; $i < $refund_count + 0; $i++) {
	foreach($xml->children() as $child)	{
		$getName = $child->getName();
		//echo $child->getName() . ": " . $child . "<br>";
		if (substr_count($getName,"_$i") == 1) {
			$refund[$i][str_replace("_$i","",$getName)]	 = $child . "";
		}
	}
}
//var_dump($refund);
?>

<div class="container" style="margin-top: 1%;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12" style="align:left">
			<h2>查询退款（<?php echo $index;?>）返回结果</h2>
			<div class="table-responsive" style="max-height: 600px; max-width: 800px; margin: 0; overflow-y: auto;">
		    <table class="table table-bordered table-hover">
				<tbody>
					<?php 
						$rowString  	 	 = "<tr class='info'>" . "<td>退款订单编号</td>" . "<td>" . $index . "</td>" . "</tr>";
						$rowString  	 	.= "<tr class='info'>" . "<td>退款商品描述</td>" . "<td>" . $currency . ($order_amount/100) . " " . $desc . "</td>" . "</tr>";
						$isUpdateDatabase	 = false;
					/*		*/
					if ($return_code == "FAIL") {
						$rowString  	.= "<tr class='info'>" . "<td>查询退款结果</td>" . "<td>请求失败：$return_msg</td>" . "</tr>";
					}
					else if ($return_code == "SUCCESS") {
						if ($result_code == "FAIL") {
							$rowString  .= "<tr class='info'>" . "<td>查询退款结果</td>" . "<td>请求失败：" . $err_code . "（" . $err_code_des . "）" . "</td>" . "</tr>";
						}
						else if ($result_code == "SUCCESS") {
							$isUpdateDatabase = true;
							$rowString  .= "<tr class='info'>" . "<td>查询退款结果</td>" . "<td>" . "退款申请接收成功，退款状态：" . $refund[0]['refund_status'] . "</td>" . "</tr>";
						}
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
	
	for ($i = 0; $i < $refund_count + 0; $i++) {
		$refund_id 		= $refund[$i]['refund_id'];
		$refund_channel	= $refund[$i]['refund_channel'];
		$coupon_info 	= $refund[$i]['coupon_info'];
		$refund_status 	= $refund[$i]['refund_status'];
		$sql = "update `weChatPaymentRefund` 
				set `refund_channel` = '$refund_channel', `coupon_info` = '$coupon_info', `refund_status` = '$refund_status' 
				where `transaction_id` = '$transaction_id' and `refund_id` = '$refund_id'";
		$result = mysql_query($sql);
		if (!$result)	{
			echo "Failed to select table weChatPaymentRefund: " . mysql_error();
			die;
		}
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