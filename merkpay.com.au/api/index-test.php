<?php
?>
<!--  
<h1>Test portals via Merkpay</h1>
<a href="http://api.netcube.com.au/projects/netcube/Merkpay/exchangeratequery.php" target="_blank">Query Exchange Rate</a>
<br><br>
<a href="http://api.netcube.com.au/projects/netcube/Merkpay/payment.php?attach=attach12345678&body=body12345678&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11" target="_blank">Accomplish Payment via MerkPay</a>
<br><br>
<a href="http://api.netcube.com.au/projects/netcube/Merkpay/payment2.php?attach=attach12345678&body=body12345678&buyer_id=12345678&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11" target="_blank">Accomplish Payment via MerkPay2</a>
<br><br>
<a href="http://api.netcube.com.au/projects/netcube/Merkpay/verifynotifyid.php?notify_id=12345678" target="_blank">Verify Payment using notify_id</a>
-->

<h1>Tenpay portals via Merkpay</h1>
<?php 
	$exchangeratequery	= "http://api.merkpay.com.au/northbound/tenpay/exchangeratequery.php?merchantId=123456&fee_type=AUD";
	$payment1 			= "http://api.merkpay.com.au/northbound/tenpay/payment.php?mode=display&merchantId=123456&attach=attach12345678&body=body12345678&buyer_id=12345678&fee_type=AUD&goods_tag=goods_tag&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11";
	$payment2 			= "http://api.merkpay.com.au/northbound/tenpay/payment.php?mode=run&merchantId=123456&attach=attach12345678&body=body12345678&buyer_id=12345678&fee_type=AUD&goods_tag=goods_tag&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11";
	$verifynotifyid 	= "http://api.merkpay.com.au/northbound/tenpay/verifynotifyid.php?notify_id=12345678&merchantId=123456";
?>
<h2>Northbound portals between Merchant and Merkpay</h2>
<!--  -->
<a href="<?php echo $exchangeratequery;?>" target="_blank"><p><?php echo $exchangeratequery;?></p></a>
<a href="<?php echo $payment1;?>" target="_blank"><p><?php echo $payment1;?></p></a>
<a href="<?php echo $payment2;?>" target="_blank"><p><?php echo $payment2;?></p></a>
<a href="<?php echo $verifynotifyid;?>" target="_blank"><p><?php echo $verifynotifyid;?></p></a>

<h2>Southbound portals between Merkpay and Tenpay</h2>
<?php 
	$exchangeratequery	= "http://api.merkpay.com.au/southbound/tenpay/exchangeratequery.php?fee_type=AUD";
	$payment 			= "http://api.merkpay.com.au/southbound/tenpay/payment.php?attach=attach12345678&body=body12345678&out_trade_no=out_trade_no12345678&partner_name=partner_name12345678&partner_no=partner_no12345678&product_fee=110&transport_fee=11";
	$verifynotifyid 	= "http://api.merkpay.com.au/southbound/tenpay/verifynotifyid.php?notify_id=12345678";
?>
<a href="<?php echo $exchangeratequery;?>" target="_blank"><p><?php echo $exchangeratequery;?></p></a>
<a href="<?php echo $verifynotifyid;?>" target="_blank"><p><?php echo $verifynotifyid;?></p></a>

<br>

<h1>WeChat portals via Merkpay</h1>
<?php 
	$micropay1			= "http://api.merkpay.com.au/northbound/wechat/micropay.php?currency=AUD&mode=display&merchantId=123456&attach=attach12345678&auth_code=130414766970369705&desc=descOfProduct&detail=detailInfo&device_info=013467007045764&goods_tag=goods_tag&order_amount=123&out_trade_no=out_trade_no12345678";
	$micropay2			= "http://api.merkpay.com.au/northbound/wechat/micropay.php?currency=AUD&mode=run&merchantId=123456&attach=attach12345678&auth_code=130414766970369705&desc=descOfProduct&detail=detailInfo&device_info=013467007045764&goods_tag=goods_tag&order_amount=123&out_trade_no=out_trade_no12345678";
	$orderquery1		= "http://api.merkpay.com.au/northbound/wechat/orderquery.php?merchantId=123456&transaction_id=1007830019201509220955876383";
	$orderquery2		= "http://api.merkpay.com.au/northbound/wechat/orderquery.php?merchantId=123456&out_trade_no=20150922141225864AT123456";
?>
<h2>Northbound portals between Merchant and Merkpay</h2>
<a href="<?php echo $micropay1;?>" target="_blank"><p><?php echo $micropay1;?></p></a>
<a href="<?php echo $micropay2;?>" target="_blank"><p><?php echo $micropay2;?></p></a>
<a href="<?php echo $orderquery1;?>" target="_blank"><p><?php echo $orderquery1;?></p></a>
<a href="<?php echo $orderquery2;?>" target="_blank"><p><?php echo $orderquery2;?></p></a>

<h2>Southbound portals between Merkpay and WeChat</h2>
<?php 
	$micropay			= "http://api.merkpay.com.au/southbound/wechat/micropay.php?attach=attach12345678&auth_code=130414766970369705&desc=descOfProduct&detail=detailInfo&device_info=013467007045764&goods_tag=goods_tag&order_amount=123&out_trade_no=out_trade_no12345678";
	$orderquery1		= "http://api.merkpay.com.au/southbound/wechat/orderquery.php?transaction_id=1007830019201509220955876383";
	$orderquery2		= "http://api.merkpay.com.au/southbound/wechat/orderquery.php?out_trade_no=20150922141225864AT123456";
?>
<!--  
<a href="<?php echo $micropay;?>" target="_blank"><p><?php echo $micropay;?></p></a>
-->
<a href="<?php echo $orderquery1;?>" target="_blank"><p><?php echo $orderquery1;?></p></a>
<a href="<?php echo $orderquery2;?>" target="_blank"><p><?php echo $orderquery2;?></p></a>


