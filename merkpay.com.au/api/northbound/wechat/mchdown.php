<?php
/*	
	http://api.merkpay.com.au/northbound/wechat/mchdown.php?merchantId=123456&bill_date=20150922&bill_type=ALL&device_info=013467007045764&mode=display
	merchantId=123456
*/

	$aapt['mode']			= trim($_REQUEST['mode']);
	$aapt['merchantId']		= $_REQUEST['merchantId'];
if (isset($_REQUEST['bill_date']) && !empty($_REQUEST['bill_date'])) {
    $aapt['bill_date']		= $_REQUEST['bill_date'];
}
if (isset($_REQUEST['bill_type']) && !empty($_REQUEST['bill_type'])) {
	$aapt['bill_type']		= $_REQUEST['bill_type'];
}
if (isset($_REQUEST['device_info']) && !empty($_REQUEST['device_info'])) {
	$aapt['device_info']	= $_REQUEST['device_info'];
}

$result_url="http://api.merkpay.com.au/southbound/wechat/mchdown.php";
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
libxml_use_internal_errors(true);
$sxe 			= simplexml_load_string($output);
$rowString		= "";
$summaryString	= "";
if ($sxe) {
	header('Content-type: text/html; charset=utf-8');
	//echo $output;	die;
	$return_code 	= $sxe -> return_code;
	$return_msg 	= $sxe -> return_msg;
	$rowString  	.= "<tr class='info'>" . "<td>下载对帐单失败</td>" . "<td>错误原因：$return_msg</td>" . "</tr>";
}
else {
	header('Content-type: text/html; charset=utf-8');
	$outputArray = explode("\n",$output);
	/*		
	var_dump($outputArray); die;
	$line = trim($outputArray[0]);
	if (!empty($line)) {
		$lineArray 	 = explode(",",$line);
		$rowString  .= 	"<tr class='info'>";
		$rowString  .= 	"<td></td>";
		for ($j = 0; $j < sizeof($lineArray); $j++) {
			$rowString  .= "<td>" . $lineArray[$j] . "</td>";
		}
		$rowString  .= 	"</tr>";
	}*/
	$rowString  .= 	"<tr class='info'>";
		$rowString  .= 	"<td></td>";
		$rowString  .= "<td>" . "交易时间" . "</td>";
		$rowString  .= "<td>" . "微信订单号" . "</td>";
		$rowString  .= "<td>" . "商家订单号" . "</td>";
		$rowString  .= "<td>" . "付款银行" . "</td>";
		$rowString  .= "<td>" . "交易状态" . "</td>";
		$rowString  .= "<td>" . "订单标价币种" . "</td>";
		$rowString  .= "<td>" . "订单标价金额" . "</td>";
		$rowString  .= "<td>" . "用户支付金额" . "</td>";
		$rowString  .= "<td>" . "优惠券金额" . "</td>";
		$rowString  .= "<td>" . "折扣金额" . "</td>";
		$rowString  .= "<td>" . "用户扣款币种" . "</td>";
		$rowString  .= "<td>" . "用户扣款金额" . "</td>";
		$rowString  .= "<td>" . "订单结算币种" . "</td>";
		$rowString  .= "<td>" . "订单结算金额" . "</td>";
		$rowString  .= "<td>" . "交易说明" . "</td>";
		$rowString  .= "<td>" . "商户数据包" . "</td>";
		$rowString  .= "<td>" . "交易类型" . "</td>";
		$rowString  .= "<td>" . "退款申请时间" . "</td>";
		$rowString  .= "<td>" . "退款成功时间" . "</td>";
		$rowString  .= "<td>" . "微信退款单号" . "</td>";
		$rowString  .= "<td>" . "商家退款单号" . "</td>";
		$rowString  .= "<td>" . "退款币种" . "</td>";
		$rowString  .= "<td>" . "退款金额" . "</td>";
		$rowString  .= "<td>" . "用户退款金额" . "</td>";
		$rowString  .= "<td>" . "优惠券退款金额" . "</td>";
		$rowString  .= "<td>" . "折扣退款金额" . "</td>";
		$rowString  .= "<td>" . "退款返还用户币种" . "</td>";
		$rowString  .= "<td>" . "退款返还用户金额" . "</td>";
		$rowString  .= "<td>" . "退款结算币种" . "</td>";
		$rowString  .= "<td>" . "退款结算金额," . "</td>";
		$rowString  .= "<td>" . "退款类型" . "</td>";
		$rowString  .= "<td>" . "汇率" . "</td>";
		$rowString  .= "<td>" . "手续费" . "</td>";
		$rowString  .= "<td>" . "公众账号ID" . "</td>";
		$rowString  .= "<td>" . "商户号" . "</td>";
		$rowString  .= "<td>" . "子商户号" . "</td>";
		$rowString  .= "<td>" . "设备号" . "</td>";
		$rowString  .= "<td>" . "用户标识" . "</td>";
	$rowString  .= 	"</tr>";
	for ($i = 1; $i < sizeof($outputArray)-3; $i++) {
		$line = trim($outputArray[$i]);
		if (!empty($line)) {
			$lineArray 	 = explode(",",$line);
			$rowString  .= 	"<tr class='info'>";
			$rowString  .= 	"<td>$i</td>";
			for ($j = 0; $j < sizeof($lineArray); $j++) {
				$item			 = trim($lineArray[$j]);
				$item			 = str_replace("`","",$item);
				$rowString  .= "<td>" . $item . "</td>";
			}
			$rowString  .= 	"</tr>";
		}
	}
	for ($i = sizeof($outputArray)-3; $i < sizeof($outputArray); $i++) {
		$line = trim($outputArray[$i]);
		if (!empty($line)) {
			$lineArray 	 	 	 = explode(",",$line);
			$summaryString  	.= 	"<tr class='danger'>";
			for ($j = 0; $j < sizeof($lineArray); $j++) {
				$item			 = trim($lineArray[$j]);
				$item			 = str_replace("`","",$item);
				$summaryString  .= "<td>" . $item . "</td>";
			}
			$summaryString  .= 	"</tr>";
		}
	}
}
?>

<div class="container" style="margin-top: 1%;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12" style="align:left">
			<h2>下载对帐单（<?php echo $_REQUEST['bill_date'];?>）</h2>
			<div class="table-responsive" style="max-height: 600px; width: 100%; margin: 0; overflow-y: auto;">
		    <table class="table table-bordered table-hover">
				<tbody>
					<?php echo $rowString;?>
				</tbody>
		    </table>
			</div>
			<br>
			<div class="table-responsive" style="max-height: 600px; width: 100%; margin: 0; overflow-y: auto;">
		    <table class="table table-bordered table-hover">
				<tbody>
					<?php echo $summaryString;?>
				</tbody>
		    </table>
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