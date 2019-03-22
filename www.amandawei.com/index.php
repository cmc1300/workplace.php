<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amanda website</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>  
</head>

<body style='padding-top: 30px'>

<?php 

if (true) {
	/*
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

	
	mysql_close($con);*/
}
?>

<div class="container">
<div class="row">
	<div class="panel panel-primary">
	
		<div class="panel-heading" style="background-color:#fcf8e3; color:#337ab7">
			<!--<h2 class="text-center">
				<img src="//api.merkpay.com.au/demo/logo.png">&nbsp;NetCube维护系统
			</h2>-->
			<ul class="nav nav-pills nav-justified" style="font-size:20px" >
			  <li id="createcustomer" class="active" onclick="setActiveOne('createcustomer');">
			  	<a href="javascript:void(0);">添加信息</a>
			  </li>
			  <li id="customerquery" class="" onclick="setActiveOne('customerquery');">
			  	<a href="javascript:void(0);">查询修改</a>
			  </li>
			  <li id="reverse" class="" onclick="setActiveOne('reverse');">
			  	<a href="javascript:void(0);">统计信息</a>
			  </li>
			</ul>
		</div>
		
		
		
	  	<div class="panel-body">
			<div name="divcreatecustomer" id="divcreatecustomer" style="display:block">
		  	<form action="dump.php" method="post" onsubmit="return customer_action_process('divcreatecustomer')">
		  		<input type="hidden" name="action" id="action" value="check_and_insert_new_customer_info" />
				<div class="input-group form-group-lg">
				  <label class="input-group-addon">客户姓名</label>
				  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name" value="">
				  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name" value="">
				</div>
		  	
		    	<div class="input-group form-group-lg" style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="merchantId">联系方式</label>
				  <input type="text" class="form-control" placeholder="mobile" name="mobile" id="mobile" value="">
				  <input type="text" class="form-control" placeholder="phone" name="phone" id="phone" value="">
				  <input type="text" class="form-control" placeholder="email" name="email" id="email" value="">
				  <input type="text" class="form-control" placeholder="other" name="other" id="other" value="">
				</div>
				
				<div class="input-group form-group-lg"  style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="selectIdentity">身份类型</label>
				  <input type="hidden" class="form-control" name="identity" id="identity" value="Chinese">
				  <!--  -->
				  <select id="selectIdentity" class="form-control" onchange="funcSelectIdentity('divcreatecustomer')">
				  	<option value='Chinese'>Chinese</option>
				  	<option value='TR'>TR</option>
				  	<option value='PR'>PR</option>
				  	<option value='Citizen'>Citizen</option>
				  </select>
				</div>
				
				<div class="input-group form-group-lg"  style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="device_info">预算范围</label>
				  <input type="text" class="form-control" placeholder="400" name="budget_bottom" id="budget_bottom" value="">
				  <input type="text" class="form-control" placeholder="600" name="budget_top" id="budget_top" value="">
				</div>
				
				<div class="input-group form-group-lg" style="display: 'table';?>">
				  <label class="input-group-addon" for="desc">意向区域</label>
				  <input type="text" class="form-control" placeholder="Box Hill" name="preferred_area" id="preferred_area" value="">
				</div>
				
				<div class="input-group form-group-lg"  style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="selectProspective">诚意程度</label>
				  <input type="hidden" class="form-control" name="prospective" id="prospective" value="good">
				  <!--  -->
				  <select id="selectProspective" class="form-control" onchange="funcSelectProspective('divcreatecustomer')">
				  	<option value='best'>极其诚意</option>
				  	<option value='better'>较有诚意</option>
				  	<option selected value='good'>较有兴趣</option>
				  	<option value='less'>略有兴趣</option>
				  	<option value='least'>毫无兴趣</option>
				  </select>
				</div>
												
				<div class="input-group form-group-lg">
				  <label class="input-group-addon" for="auth_code">客户信息</label>
				  <textarea style="width:100%" placeholder="客户备注信息" name="comment" id="comment" rows="4" value=""></textarea>
				</div>		
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">添加客户</button>
		  	</form>
		  	</div>
		  	
		  	
		  	<div name="divcustomerquery" id="divcustomerquery" style="display:none">
		  	<form action="dump.php" method="get" onsubmit="return customer_action_process('divcustomerquery')">
				<input type="hidden" name="action" id="action" value="select_matched_customer_info" />
				<div class="input-group form-group-lg">
				  <label class="input-group-addon">客户姓名</label>
				  <input type="text" class="form-control" name="full_name" id="full_name" placeholder="full_name" value="">
				</div>
		  	
		    	<div class="input-group form-group-lg" style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="merchantId">联系方式</label>
				  <input type="text" class="form-control" placeholder="mobile or phone" name="mobile" id="mobile" value="">
				</div>
				
				<div class="input-group form-group-lg" style="display: 'table';?>">
				  <label class="input-group-addon" for="desc">意向区域</label>
				  <input type="text" class="form-control" placeholder="Box Hill" name="preferred_area" id="preferred_area" value="">
				</div>
				
				<div class="input-group form-group-lg"  style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="selectProspective">诚意程度</label>
				  <input type="hidden" class="form-control" name="prospective" id="prospective" value="">
				  <!--  -->
				  <select id="selectProspective" class="form-control" onchange="funcSelectProspective('divcustomerquery')">
				  	<option value=''>全部客户</option>
				  	<option value='best'>极其诚意</option>
				  	<option value='better'>较有诚意</option>
				  	<option value='good'>较有兴趣</option>
				  	<option value='less'>略有兴趣</option>
				  	<option value='least'>毫无兴趣</option>
				  </select>
				</div>
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">查询客户</button>
		  	</form>
		  	</div>
		  	
		  	
		  	<div name="divreverse" id="divreverse" style="display:none">
		  	<form action="dump.php" method="get" target="_blank">
				<div class="input-group">
				  <label class="input-group-addon">Under Construction</label>
				  
				</div>
		  	
				<button type="submit" disabled class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">统计信息</button>
		  	</form>
		  	</div>
	  	</div>
	  	
	  	
	  	
	  	<div class="panel-footer">
	  		<h1>
	  			<span class="label label-warning" id="msgFieldVerifyError" style="display: none"></span>
	  		</h1>
	  		
	  		<h1>
	  			<span class="label label-success" id="msgCustomerCreatedOK" style="display: none"></span>
	  		</h1>
	  	
	  		<table class="table table-bordered table-hover" id="tableOfRecords" style="display: none">
				<?php 
					echo "
						<tr class='success'>
						</tr>\n";
				?>
			</table>
			
			<div name="divdetailedCustomerInfo" id="divdetailedCustomerInfo" style="display:none">
		  	<form action="dump.php" method="post" onsubmit="return customer_action_process('divdetailedCustomerInfo')">
		  		<input type="hidden" name="action" id="action" value="update_existing_customer_info" />
		  		<input type="hidden" name="id" id="id" value="" />
				<div class="input-group form-group-lg">
				  <label class="input-group-addon">客户姓名</label>
				  <input type="text" class="form-control" name="first_name" id="first_name" value="">
				  <input type="text" class="form-control" name="last_name" id="last_name" value="">
				</div>
		  	
		    	<div class="input-group form-group-lg" style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="merchantId">联系方式</label>
				  <input type="text" class="form-control" disabled name="mobile" id="mobile" value="">
				  <input type="text" class="form-control" name="phone" id="phone" value="">
				  <input type="text" class="form-control" name="email" id="email" value="">
				  <input type="text" class="form-control" name="other" id="other" value="">
				</div>
				
				<div class="input-group form-group-lg"  style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="selectIdentity">身份类型</label>
				  <input type="hidden" class="form-control" name="identity" id="identity" value="Chinese">
				  <!--  -->
				  <select id="selectIdentity" class="form-control" onchange="funcSelectIdentity('divdetailedCustomerInfo')">
				  	<option value='Chinese'>Chinese</option>
				  	<option value='TR'>TR</option>
				  	<option value='PR'>PR</option>
				  	<option value='Citizen'>Citizen</option>
				  </select>
				</div>
				
				<div class="input-group form-group-lg"  style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="device_info">预算范围</label>
				  <input type="text" class="form-control" name="budget_bottom" id="budget_bottom" value="">
				  <input type="text" class="form-control" name="budget_top" id="budget_top" value="">
				</div>
				
				<div class="input-group form-group-lg" style="display: 'table';?>">
				  <label class="input-group-addon" for="desc">意向区域</label>
				  <input type="text" class="form-control" name="preferred_area" id="preferred_area" value="">
				</div>
				
				<div class="input-group form-group-lg"  style="display: <?php echo 'table';?>">
				  <label class="input-group-addon" for="selectProspective">诚意程度</label>
				  <input type="hidden" class="form-control" name="prospective" id="prospective" value="good">
				  <!--  -->
				  <select id="selectProspective" class="form-control" onchange="funcSelectProspective('divdetailedCustomerInfo')">
				  	<option value='best'>极其诚意</option>
				  	<option value='better'>较有诚意</option>
				  	<option selected value='good'>较有兴趣</option>
				  	<option value='less'>略有兴趣</option>
				  	<option value='least'>毫无兴趣</option>
				  </select>
				</div>
												
				<div class="input-group form-group-lg">
				  <label class="input-group-addon" for="auth_code">客户信息</label>
				  <textarea style="width:100%" name="comment" id="comment" rows="4" value=""></textarea>
				</div>		
				
				<button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px">修改信息</button>
			</form>
		  	</div>
		</div>
	</div>
</div>
</div>

<?php 
if ( false ) {
	echo "<pre>";
	echo "PHP SESSION:<br> ";
	//var_dump($_SESSION);
	echo "</pre>";
}
?>
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