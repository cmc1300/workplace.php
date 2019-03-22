<?php
/*
 * http://api.merkpay.com.au/sq/sq.php?action=getTransOrderListBasedOnMerchant&merchantId=123456
 */

$action = trim($_REQUEST["action"]);

if ($action == "getTransOrderListBasedOnMerchant") {
	var_dump($_REQUEST); die;
	
	$merchantId 	= trim($_REQUEST["merchantId"]);
	$row 			= array();
	$res 			= array();
	$con 			= mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		$res['result']	= "NOK";
		$res['info'] 	= "Failed to connect to table merkpayMerchants: " . mysql_error();
		echo json_encode($res);
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");
	
	$sql 	= "select DISTINCT transaction_id, result_code, transaction_status from weChatPaymentTransactions where merchantId = '$merchantId' AND transaction_id IS NOT NULL order by id desc limit 50";
	$result = mysql_query($sql);
	if (!$result)
	{
		$res['result']	= "NOK";
		$res['info'] 	= "Failed to select table merkpayMerchants: " . mysql_error();
		echo json_encode($res);
		die;
	}
	$merchantMatrix	= array();
	$merchantCount	= 0;
	while ($row = mysql_fetch_assoc($result)) {
		$merchantMatrix[$merchantCount++] = $row;
	}	
	$res['result']		= "POK";
	$res['info'] 		= "1";
	$res['transaction']['count'] 	= $merchantCount;
	$res['transaction']['list'] 	= $merchantMatrix;
	
	$sql 	= "select DISTINCT out_trade_no, result_code, transaction_status from weChatPaymentTransactions where merchantId = '$merchantId' AND out_trade_no IS NOT NULL order by id desc limit 50";
	$result = mysql_query($sql);
	if (!$result)
	{
		$res['result']	= "NOK";
		$res['info'] 	= "Failed to select table merkpayMerchants: " . mysql_error();
		echo json_encode($res);
		die;
	}
	$merchantMatrix	= array();
	$merchantCount	= 0;
	while ($row = mysql_fetch_assoc($result)) {
		$merchantMatrix[$merchantCount++] = $row;
	}
	mysql_close($con);
	$res['result']			= "OK";
	$res['info'] 			= "2";
	$res['trade']['count'] 	= $merchantCount;
	$res['trade']['list'] 	= $merchantMatrix;
	
	echo json_encode($res);
}
else if ($action == "getWeChatPaymentRefundListBasedOnMerchant") {
	$merchantId 	= trim($_REQUEST["merchantId"]);
	$row 			= array();
	$res 			= array();
	$con 			= mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		$res['result']	= "NOK";
		$res['info'] 	= "Failed to connect to table weChatPaymentRefund: " . mysql_error();
		echo json_encode($res);
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");

	$sql 	= "select transaction_id, refund_id, out_trade_no, out_refund_no from weChatPaymentRefund where merchantId = '$merchantId' order by refund_time desc limit 50";
	$result = mysql_query($sql);
	if (!$result)
	{
		$res['result']	= "NOK";
		$res['info'] 	= "Failed to select table weChatPaymentRefund: " . mysql_error();
		echo json_encode($res);
		die;
	}
	$refundMatrix	= array();
	$refundCount	= 0;
	while ($row = mysql_fetch_assoc($result)) {
		$refundMatrix[$refundCount++] = $row;
	}

	mysql_close($con);
	$res['result']				= "OK";
	$res['refund']['count'] 	= $refundCount;
	$res['refund']['list'] 		= $refundMatrix;

	echo json_encode($res);
}


?>