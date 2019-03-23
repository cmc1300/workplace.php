<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Merkpay Payment Demo</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>  
</head>

<body style='padding-top: 30px'>

<?php 
$display	= "ALL1";	//ALL 
$mode		= "&nbsp;&nbsp;测试模式，显示系统命令但不执行";
if (true) {
	$con 	= mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
	if (!$con)
	{
		echo "Failed to connect to table merkpayMerchants: " . mysql_error();
		die;
	}
	mysql_select_db("tenpayco_merkpay",$con);
	mysql_query("SET NAMES 'utf8'");

	$sql 	= "select * from merkpayMerchants where status = 'valid'";
	$result = mysql_query($sql);
	if (!$result)
	{
		echo "Failed to select table merkpayMerchants: " . mysql_error();
		die;
	}
	$row 	= array();
	$merchantMatrix	= array();
	$merchantCount	= 0;
	while ($row = mysql_fetch_assoc($result)) {
		$merchantMatrix[$merchantCount++] = $row;
	}
	//echo "Matrix size: $merchantCount "; var_dump($merchantMatrix);
	$merchantId 	= trim($merchantMatrix[0]['merchantId']);
	$merchantName	= trim($merchantMatrix[0]['merchantName']);
	$device_info	= trim($merchantMatrix[0]['device_info']);
	
	
	$sql 	= "select * from sampleGoodsList where status = 'valid'";
	$result = mysql_query($sql);
	if (!$result)
	{
		echo "Failed to select table sampleGoodsList: " . mysql_error();
		die;
	}
	$goodsMatrix	= array();
	$goodsCount	= 0;
	while ($row = mysql_fetch_assoc($result)) {
		$goodsMatrix[$goodsCount++] = $row;
	}
	//echo "Matrix size: $goodsCount "; var_dump($goodsMatrix);
	$desc 	= trim($goodsMatrix[0]['desc']);
	$detail	= trim($goodsMatrix[0]['detail']);
	$goods_tag	= trim($goodsMatrix[0]['goods_tag']);
	$order_amount	= trim($goodsMatrix[0]['order_amount']);
	
	$sql 	= "select DISTINCT transaction_id, result_code, transaction_status from weChatPaymentTransactions where merchantId = '$merchantId' AND transaction_id IS NOT NULL order by id desc limit 50";
	$result = mysql_query($sql);
	if (!$result)
	{
		echo "Failed to select table weChatPaymentTransactions: " . mysql_error();
		die;
	}
	$transactionMatrix	= array();
	$transactionCount	= 0;
	while ($row = mysql_fetch_assoc($result)) {
		$transactionMatrix[$transactionCount++] = $row;
	}
	//echo "Matrix size: $transactionCount "; var_dump($transactionMatrix);
	
	$sql 	= "select DISTINCT out_trade_no, result_code, transaction_status from weChatPaymentTransactions where merchantId = '$merchantId' AND out_trade_no IS NOT NULL order by id desc limit 50";
	$result = mysql_query($sql);
	if (!$result)
	{
		echo "Failed to select table weChatPaymentTransactions: " . mysql_error();
		die;
	}
	$out_trade_noMatrix	= array();
	$out_trade_noCount	= 0;
	while ($row = mysql_fetch_assoc($result)) {
		$out_trade_noMatrix[$out_trade_noCount++] = $row;
	}
	//echo "Matrix size: $out_trade_noCount "; var_dump($out_trade_noMatrix);
	
	mysql_close($con);
}
?>

<div class="container">
<div class="row">
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2><img src="//api.merkpay.com.au/demo/logo.png">&nbsp;WeChat payment via Merkpay</h2>
		</div>
		
		
	  	<div class="panel-body">
			<ul class="nav nav-pills nav-justified" style="font-size:20px" >
			  <li id="micropay" class="active" onclick="setActiveOne('micropay');">
			  	<a href="javascript:void(0);">微信支付</a>
			  </li>
			  <li id="orderquery" class="" onclick="setActiveOne('orderquery');">
			  	<a href="javascript:void(0);">查询订单</a>
			  </li>
			  <li id="reverse" class="" onclick="setActiveOne('reverse');">
			  	<a href="javascript:void(0);">撤销支付</a>
			  </li>
			  <li id="refund" class="" onclick="setActiveOne('refund');">
			  	<a href="javascript:void(0);">申请退款</a>
			  </li>
			  <li id="refundquery" class="" onclick="setActiveOne('refundquery');">
			  	<a href="javascript:void(0);">查询退款</a>
			  </li>
			  <li id="mchdown" class="" onclick="setActiveOne('mchdown');">
			  	<a href="javascript:void(0);">下载对账单</a>
			  </li>
			</ul>
	  	</div>
	  	
	  	
	  	<div class="panel-footer">
	  	
	  		<div name="divmicropay" id="divmicropay" style="display:block">
		  	<form action="./northbound/wechat/micropay.php" method="get">
		  		<input type="hidden" name="currency" id="currency" value="AUD" />
		  		<!--  
		  		<div class="input-group" style="display: none">
				  <label class="input-group-addon" for="mode">测试运行模式</label>
				  <input type="text" class="form-control" placeholder="测试运行模式" name="mode" id="mode" value="display">
				</div>
				-->
				<div class="input-group">
				  <label class="input-group-addon">收款商户信息</label>
				  <!--  
				  <input type="text" class="form-control" disabled placeholder="收款商户标识，由Merkpay分配" value="<?php echo $merchantId . " ($merchantName)";?>">
				  -->
				  <select id="selectMerchant" class="form-control" onchange="funcSelectMerchant('divmicropay')">
				  	<?php 
				  	for ($i = 0; $i < $merchantCount; $i++ ) {
						$s_merchantId 	= trim($merchantMatrix[$i]['merchantId']);
						$s_merchantName	= trim($merchantMatrix[$i]['merchantName']);
						$s_device_info	= trim($merchantMatrix[$i]['device_info']);
				  		echo "<option value='" . $s_merchantId . "&%&" . $s_device_info . "&%&" . $s_merchantName . "'>" . $s_merchantId . " ($s_merchantName)";
				  	}
				  	?>
				  </select>
				</div>
		  	
		    	<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="merchantId">收款商户标识</label>
				  <input type="text" class="form-control" placeholder="收款商户标识，由Merkpay分配" name="merchantId" id="merchantId" value="<?php echo $merchantId;?>">
				</div>
				
				<div class="input-group"  style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="attach">收款商户描述</label>
				  <input type="text" class="form-control" placeholder="收款商户描述" name="attach" id="attach" value="<?php echo $merchantName;?>">
				</div>
				
				<div class="input-group"  style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="device_info">扫描设备编号</label>
				  <input type="text" class="form-control" placeholder="扫描设备编号(商户自定义，如门店编号)" name="device_info" id="device_info" value="<?php echo $device_info;?>">
				</div>
				
				<div class="input-group">
				  <label class="input-group-addon">选择订单商品</label>
				  <select id="selectGoods" class="form-control" onchange="funcSelectGoods('divmicropay')">
				  	<?php 
				  	for ($i = 0; $i < $goodsCount; $i++ ) {
						$s_desc 		= trim($goodsMatrix[$i]['desc']);
						$s_detail		= trim($goodsMatrix[$i]['detail']);
						$s_goods_tag	= trim($goodsMatrix[$i]['goods_tag']);
						$s_order_amount	= trim($goodsMatrix[$i]['order_amount']);
				  		echo "<option value='" . $s_desc . "&%&" . $s_detail . "&%&" . $s_goods_tag . "&%&" . $s_order_amount . "'>" . "$s_desc ($s_detail)";
				  	}
				  	?>
				  </select>
				</div>
				
				<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="desc">支付订单描述</label>
				  <input type="text" class="form-control" placeholder="商品或支付单描述，展示给用户" name="desc" id="desc" value="<?php echo $desc;?>">
				</div>
				
				<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="detail">订单商品描述</label>
				  <input type="text" class="form-control" placeholder="商品或支付单详细描述" name="detail" id="detail" value="<?php echo $detail;?>">
				</div>
				<!--  
				<textarea rows="4" class="form-control" name="detail" id="detail">商品或支付单的详细描述： 1.23 Novatel高档路由器，绝对物超所制</textarea>
				-->
				
				<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="goods_tag">商品优惠标记</label>
				  <input type="text" class="form-control" placeholder="商品标记，优惠券功能的参数" name="goods_tag" id="goods_tag" value="<?php echo $goods_tag;?>">
				</div>
				
				<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="order_amount">订单支付金额</label>
				  <input type="text" class="form-control" placeholder="订单支付金额，只能为整数，如金额为$1.28则填写128" name="order_amount" id="order_amount" value="<?php echo $order_amount;?>">
				</div>
				
				<?php 
				date_default_timezone_set('Australia/Melbourne');
				$out_trade_no = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s") . rand(100, 999) . "AT$merchantId";
				?>
				<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="out_trade_no">商户订单编号</label>
				  <input type="text" class="form-control" placeholder="商户系统内部的订单号，可包含字母" name="out_trade_no" id="out_trade_no" value="<?php echo $out_trade_no;?>">
				</div>
								
				<div class="input-group">
				  <label class="input-group-addon" for="auth_code">微信扫描编码</label>
				  <input type="text" class="form-control" placeholder="扫描用户手机的微信条码或者二维码信息，如130414766970369705" name="auth_code" id="auth_code" value="">
				</div>
						
				<div class="checkbox" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				    <label>
				      <input type="checkbox" name="mode" id="mode" value="display"><?php echo $mode;?></input>
				    </label>
				</div>
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">微信支付</button>
		  	</form>
		  	</div>
		  	
		  	
		  	
		  	<div name="divorderquery" id="divorderquery" style="display:none">
		  	<form action="./northbound/wechat/orderquery.php" method="get" target="_blank">
		  		<!--  
		  		<div class="input-group" style="display: none">
				  <label class="input-group-addon" for="mode">测试运行模式</label>
				  <input type="text" class="form-control" placeholder="测试运行模式" name="mode" id="mode" value="run">
				</div>
				-->
				<div class="input-group">
				  <label class="input-group-addon">收款商户信息</label>
				  <!--  
				  <input type="text" class="form-control" disabled placeholder="收款商户标识，由Merkpay分配" value="<?php echo $merchantId . " ($merchantName)";?>">
				  -->
				  <select id="selectMerchant" class="form-control" onchange="funcSelectMerchant('divorderquery')">
				  	<?php 
				  	for ($i = 0; $i < $merchantCount; $i++ ) {
						$s_merchantId 	= trim($merchantMatrix[$i]['merchantId']);
						$s_merchantName	= trim($merchantMatrix[$i]['merchantName']);
						$s_device_info	= trim($merchantMatrix[$i]['device_info']);
				  		echo "<option value='" . $s_merchantId . "&%&" . $s_device_info . "&%&" . $s_merchantName . "'>" . $s_merchantId . " ($s_merchantName)";
				  	}
				  	?>
				  </select>
				</div>
		  	
		    	<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="merchantId">收款商户标识</label>
				  <input type="text" class="form-control" placeholder="收款商户标识，由Merkpay分配" name="merchantId" id="merchantId" value="<?php echo $merchantId;?>">
				</div>
				
				<div class="input-group">
				  <label class="input-group-addon" for="transaction_id">微信订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="微信的订单号，优先使用" name="transaction_id" id="transaction_id" value="1007610019201509220960738024">
				  -->
				  <select name="transaction_id" id="transaction_id" onchange="funcSelectTrade(this,'divorderquery','out_trade_no');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $transactionCount; $i++ ) {
						$s_transaction_id 	= trim($transactionMatrix[$i]['transaction_id']);
				  		echo "<option value='" . $s_transaction_id . "'>" . $s_transaction_id;
				  	}
				  	?>
				  </select>
				</div>
								
				<div class="input-group">
				  <label class="input-group-addon" for="out_trade_no">商户订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="商户系统内部的订单号，可包含字母" name="out_trade_no" id="out_trade_no" value="20150922221321967AT123456">
				  -->
				  <select name="out_trade_no" id="out_trade_no" onchange="funcSelectTrade(this,'divorderquery','transaction_id');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $out_trade_noCount; $i++ ) {
						$s_out_trade_no 	= trim($out_trade_noMatrix[$i]['out_trade_no']);
				  		echo "<option value='" . $s_out_trade_no . "'>" . $s_out_trade_no;
				  	}
				  	?>
				  </select>
				</div>
				
				<div class="checkbox" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				    <label>
				      <input type="checkbox" name="mode" id="mode" value="display"><?php echo $mode;?></input>
				    </label>
				</div>
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">查询订单</button>
		  	</form>
		  	</div>
		  	
		  	
		  	
		  	<div name="divreverse" id="divreverse" style="display:none">
		  	<form action="./northbound/wechat/reverse.php" method="get" target="_blank">
				<div class="input-group">
				  <label class="input-group-addon">收款商户信息</label>
				  <!--  
				  <input type="text" class="form-control" disabled placeholder="收款商户标识，由Merkpay分配" value="<?php echo $merchantId . " ($merchantName)";?>">
				  -->
				  <select id="selectMerchant" class="form-control" onchange="funcSelectMerchant('divreverse')">
				  	<?php 
				  	for ($i = 0; $i < $merchantCount; $i++ ) {
						$s_merchantId 	= trim($merchantMatrix[$i]['merchantId']);
						$s_merchantName	= trim($merchantMatrix[$i]['merchantName']);
						$s_device_info	= trim($merchantMatrix[$i]['device_info']);
				  		echo "<option value='" . $s_merchantId . "&%&" . $s_device_info . "&%&" . $s_merchantName . "'>" . $s_merchantId . " ($s_merchantName)";
				  	}
				  	?>
				  </select>
				</div>
		  	
		    	<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="merchantId">收款商户标识</label>
				  <input type="text" class="form-control" placeholder="收款商户标识，由Merkpay分配" name="merchantId" id="merchantId" value="<?php echo $merchantId;?>">
				</div>
				
				<div class="input-group">
				  <label class="input-group-addon" for="transaction_id">微信订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="微信的订单号，优先使用" name="transaction_id" id="transaction_id" value="1007610019201509220960738024">
				  -->
				  <select name="transaction_id" id="transaction_id" onchange="funcSelectTrade(this,'divreverse','out_trade_no');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $transactionCount; $i++ ) {
						$s_transaction_id 	= trim($transactionMatrix[$i]['transaction_id']);
						$transaction_status	= trim($transactionMatrix[$i]['transaction_status']);
						$result_code		= trim($transactionMatrix[$i]['result_code']);
						if ($result_code == "SUCCESS" && $transaction_status == "none") {
							echo "<option value='" . $s_transaction_id . "'>" . $s_transaction_id;
						}
				  	}
				  	?>
				  </select>
				</div>
								
				<div class="input-group">
				  <label class="input-group-addon" for="out_trade_no">商户订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="商户系统内部的订单号，可包含字母" name="out_trade_no" id="out_trade_no" value="20150922221321967AT123456">
				  -->
				  <select name="out_trade_no" id="out_trade_no" onchange="funcSelectTrade(this,'divreverse','transaction_id');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $out_trade_noCount; $i++ ) {
						$s_out_trade_no 	= trim($out_trade_noMatrix[$i]['out_trade_no']);
						$transaction_status	= trim($out_trade_noMatrix[$i]['transaction_status']);
						$result_code		= trim($out_trade_noMatrix[$i]['result_code']);
						if ($result_code == "SUCCESS" && $transaction_status == "none") {
				  			echo "<option value='" . $s_out_trade_no . "'>" . $s_out_trade_no;
						}
				  	}
				  	?>
				  </select>
				</div>
				
				<div class="checkbox" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				    <label>
				      <input type="checkbox" name="mode" id="mode" value="display"><?php echo $mode;?></input>
				    </label>
				</div>
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">撤销支付</button>
		  	</form>
		  	</div>
		  	
		  	
		  	
		  	<div name="divrefund" id="divrefund" style="display:none">
		  	<form action="./northbound/wechat/refund.php" method="get" target="_blank">
				<div class="input-group">
				  <label class="input-group-addon">收款商户信息</label>
				  <!--  
				  <input type="text" class="form-control" disabled placeholder="收款商户标识，由Merkpay分配" value="<?php echo $merchantId . " ($merchantName)";?>">
				  -->
				  <select id="selectMerchant" class="form-control" onchange="funcSelectMerchant('divrefund')">
				  	<?php 
				  	for ($i = 0; $i < $merchantCount; $i++ ) {
						$s_merchantId 	= trim($merchantMatrix[$i]['merchantId']);
						$s_merchantName	= trim($merchantMatrix[$i]['merchantName']);
						$s_device_info	= trim($merchantMatrix[$i]['device_info']);
				  		echo "<option value='" . $s_merchantId . "&%&" . $s_device_info . "&%&" . $s_merchantName . "'>" . $s_merchantId . " ($s_merchantName)";
				  	}
				  	?>
				  </select>
				</div>
		  	
		    	<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="merchantId">收款商户标识</label>
				  <input type="text" class="form-control" placeholder="收款商户标识，由Merkpay分配" name="merchantId" id="merchantId" value="<?php echo $merchantId;?>">
				</div>
				
				<div class="input-group">
				  <label class="input-group-addon" for="transaction_id">微信订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="微信的订单号，优先使用" name="transaction_id" id="transaction_id" value="1007610019201509220960738024">
				  -->
				  <select name="transaction_id" id="transaction_id" onchange="funcSelectTrade(this,'divrefund','out_trade_no');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $transactionCount; $i++ ) {
						$s_transaction_id 	= trim($transactionMatrix[$i]['transaction_id']);
						$transaction_status	= trim($transactionMatrix[$i]['transaction_status']);
						$result_code		= trim($transactionMatrix[$i]['result_code']);
						if ($result_code == "SUCCESS" && $transaction_status == "none") {
							echo "<option value='" . $s_transaction_id . "'>" . $s_transaction_id;
						}
				  	}
				  	?>
				  </select>
				</div>
								
				<div class="input-group">
				  <label class="input-group-addon" for="out_trade_no">商户订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="商户系统内部的订单号，可包含字母" name="out_trade_no" id="out_trade_no" value="20150922221321967AT123456">
				  -->
				  <select name="out_trade_no" id="out_trade_no" onchange="funcSelectTrade(this,'divrefund','transaction_id');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $out_trade_noCount; $i++ ) {
						$s_out_trade_no 	= trim($out_trade_noMatrix[$i]['out_trade_no']);
						$transaction_status	= trim($out_trade_noMatrix[$i]['transaction_status']);
						$result_code		= trim($out_trade_noMatrix[$i]['result_code']);
						if ($result_code == "SUCCESS" && $transaction_status == "none") {
				  			echo "<option value='" . $s_out_trade_no . "'>" . $s_out_trade_no;
						}
				  	}
				  	?>
				  </select>
				</div>
				
				<div class="checkbox" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				    <label>
				      <input type="checkbox" name="mode" id="mode" value="display"><?php echo $mode;?></input>
				    </label>
				</div>
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">申请退款</button>
		  	</form>
		  	</div>
		  	
		  	
		  	
		  	<div name="divrefundquery" id="divrefundquery" style="display:none">
		  	<?php 
		  	$con 	= mysql_connect("14.137.150.46","tenpayco_merkpay","UAN6IIUS-J4}");
		  	if (!$con)
		  	{
		  		echo "Failed to connect to table merkpayMerchants: " . mysql_error();
		  		die;
		  	}
		  	mysql_select_db("tenpayco_merkpay",$con);
		  	mysql_query("SET NAMES 'utf8'");		  	
		  	
		  	$sql 	= "select DISTINCT transaction_id from weChatPaymentRefund where 1 = 1 limit 50";
		  	$result = mysql_query($sql);
		  	if (!$result)
		  	{
		  		echo "Failed to select table weChatPaymentTransactions: " . mysql_error();
		  		die;
		  	}
		  	$transaction_idRefundMatrix	= array();
		  	$transaction_idRefundCount	= 0;
		  	while ($row = mysql_fetch_assoc($result)) {
		  		$transaction_idRefundMatrix[$transaction_idRefundCount++] = $row;
		  	}
		  	//echo "Matrix size: $transactionCount "; var_dump($transactionMatrix);
		  	
		  	$sql 	= "select DISTINCT out_trade_no from weChatPaymentRefund where 1 = 1 limit 50";
		  	$result = mysql_query($sql);
		  	if (!$result)
		  	{
		  		echo "Failed to select table weChatPaymentTransactions: " . mysql_error();
		  		die;
		  	}
		  	$out_trade_noRefundMatrix	= array();
		  	$out_trade_noRefundCount	= 0;
		  	while ($row = mysql_fetch_assoc($result)) {
		  		$out_trade_noRefundMatrix[$out_trade_noRefundCount++] = $row;
		  	}
		  	//echo "Matrix size: $out_trade_noCount "; var_dump($out_trade_noMatrix);
		  	
		  	mysql_close($con);
		  	?>
		  	<form action="./northbound/wechat/refundquery.php" method="get" target="_blank">
				<div class="input-group">
				  <label class="input-group-addon">收款商户信息</label>
				  <!--  
				  <input type="text" class="form-control" disabled placeholder="收款商户标识，由Merkpay分配" value="<?php echo $merchantId . " ($merchantName)";?>">
				  -->
				  <select id="selectMerchant" class="form-control" onchange="funcSelectMerchant('divrefundquery')">
				  	<?php 
				  	for ($i = 0; $i < $merchantCount; $i++ ) {
						$s_merchantId 	= trim($merchantMatrix[$i]['merchantId']);
						$s_merchantName	= trim($merchantMatrix[$i]['merchantName']);
						$s_device_info	= trim($merchantMatrix[$i]['device_info']);
				  		echo "<option value='" . $s_merchantId . "&%&" . $s_device_info . "&%&" . $s_merchantName . "'>" . $s_merchantId . " ($s_merchantName)";
				  	}
				  	?>
				  </select>
				</div>
		  	
		    	<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="merchantId">收款商户标识</label>
				  <input type="text" class="form-control" placeholder="收款商户标识，由Merkpay分配" name="merchantId" id="merchantId" value="<?php echo $merchantId;?>">
				</div>
				
				<div class="input-group">
				  <label class="input-group-addon" for="transaction_id">微信订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="微信的订单号，优先使用" name="transaction_id" id="transaction_id" value="1007610019201509220960738024">
				  -->
				  <select name="transaction_id" id="transaction_id" onchange="funcSelectTrade(this,'divrefundquery','out_trade_no');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $transaction_idRefundCount; $i++ ) {
						$s_transaction_id 	= trim($transaction_idRefundMatrix[$i]['transaction_id']);
						if (true) {
							echo "<option value='" . $s_transaction_id . "'>" . $s_transaction_id;
						}
				  	}
				  	?>
				  </select>
				</div>
								
				<div class="input-group">
				  <label class="input-group-addon" for="out_trade_no">商户订单编号</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="商户系统内部的订单号，可包含字母" name="out_trade_no" id="out_trade_no" value="20150922221321967AT123456">
				  -->
				  <select name="out_trade_no" id="out_trade_no" onchange="funcSelectTrade(this,'divrefundquery','transaction_id');" class="form-control">
				  	<?php 
				  	echo "<option value=''>--";
				  	for ($i = 0; $i < $out_trade_noRefundCount; $i++ ) {
						$s_out_trade_no 	= trim($out_trade_noRefundMatrix[$i]['out_trade_no']);
						if (true) {
				  			echo "<option value='" . $s_out_trade_no . "'>" . $s_out_trade_no;
						}
				  	}
				  	?>
				  </select>
				</div>
				
				<div class="checkbox" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				    <label>
				      <input type="checkbox" name="mode" id="mode" value="display"><?php echo $mode;?></input>
				    </label>
				</div>
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">查询退款</button>
		  	</form>
		  	</div>
		  	
		  	
		  	
		  	<div name="divmchdown" id="divmchdown" style="display:none">
		  	<form action="./northbound/wechat/mchdown.php" method="get" target="_blank">
		  		<!--  
		  		<div class="input-group" style="display: none">
				  <label class="input-group-addon" for="mode">测试运行模式</label>
				  <input type="text" class="form-control" placeholder="测试运行模式" name="mode" id="mode" value="run">
				</div>
				-->
				<div class="input-group">
				  <label class="input-group-addon">收款商户信息</label>
				  <!--  
				  <input type="text" class="form-control" disabled placeholder="收款商户标识，由Merkpay分配" value="<?php echo $merchantId . " ($merchantName)";?>">
				  -->
				  <select id="selectMerchant" class="form-control" onchange="funcSelectMerchant('divmchdown')">
				  	<?php 
				  	for ($i = 0; $i < $merchantCount; $i++ ) {
						$s_merchantId 	= trim($merchantMatrix[$i]['merchantId']);
						$s_merchantName	= trim($merchantMatrix[$i]['merchantName']);
						$s_device_info	= trim($merchantMatrix[$i]['device_info']);
				  		echo "<option value='" . $s_merchantId . "&%&" . $s_device_info . "&%&" . $s_merchantName . "'>" . $s_merchantId . " ($s_merchantName)";
				  	}
				  	?>
				  </select>
				</div>
		  	
		    	<div class="input-group" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="merchantId">收款商户标识</label>
				  <input type="text" class="form-control" placeholder="收款商户标识，由Merkpay分配" name="merchantId" id="merchantId" value="<?php echo $merchantId;?>">
				</div>
				
				<div class="input-group"  style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				  <label class="input-group-addon" for="device_info">扫描设备编号</label>
				  <input type="text" class="form-control" placeholder="扫描设备编号(商户自定义，如门店编号)" name="device_info" id="device_info" value="<?php echo $device_info;?>">
				</div>
				
				<?php 
				date_default_timezone_set('Australia/Melbourne');
				$bill_date 	= date("Ymd", strtotime("yesterday"));
				?>
				<div class="input-group">
				  <label class="input-group-addon" for="bill_date">选对账单日期</label>
				  <input type="text" class="form-control" placeholder="下载对账单的日期，格式：<?php echo $bill_date;?>" name="bill_date" id="bill_date" value="<?php echo $bill_date;?>">
				</div>
								
				<div class="input-group">
				  <label class="input-group-addon" for="bill_type">选对账单类型</label>
				  <!--  
				  <input type="text" class="form-control" placeholder="ALL/SUCCESS/REFUND/REVOKED" name="bill_type" id="bill_type" value="SUCCESS">
				  -->
				  <select class="form-control" name="bill_type" id="bill_type">
					  <option value="ALL">ALL</option>
					  <option selected value="SUCCESS">SUCCESS</option>
					  <option value="REFUND">REFUND</option>
					  <option value="REVOKED">REVOKED</option>
				  </select>
				</div>
				
				<div class="checkbox" style="display: <?php echo $display == 'ALL' ? 'table': 'none';?>">
				    <label>
				      <input type="checkbox" name="mode" id="mode" value="display"><?php echo $mode;?></input>
				    </label>
				</div>
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">下载对账单</button>
		  	</form>
		  	</div>
	  	</div>
	  	
	  	
	</div>
</div>
</div>

<!-- 
For any issue, please contact with GuoPing Xu(jerry.xu@novatel.com.au)!
-->

	<script src="js/function.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>