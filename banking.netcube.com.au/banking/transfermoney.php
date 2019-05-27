<?php
session_start();
$_SESSION['activePage'] = "transfermoney.php";
if(empty($_SESSION['activeLoginUser'])) {
	print "<script>window.location=\"index.php\"</script>";
	die;
}
include ("header.php");
?>

<?php 
$loginName = $_SESSION['activeLoginUser'];
$_SESSION['firstValidBankAccount'] = -1;
//echo "login: " . $loginName;

function fetchAllBankAccounts($loginName) {

	$con=mysqli_connect("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$sql="SELECT * FROM userBankAccounts,bank_accounts,Users where Users.userName = '$loginName' AND Users.userNameID = userBankAccounts.userNameID AND userBankAccounts.bankLoginNameID = bank_accounts.ID order by bank_accounts.ID";
	
	if ($result=mysqli_query($con,$sql))	  {
	  // Get field information for all fields
	  while ($row=mysqli_fetch_assoc($result)) {
	  	//print_r($row);
	  	//echo "<li class='divider'></li>";
	  	if (strtolower($row['bankStatus']) == "valid") {
	  		//echo "<li><a href='#'>Bank name: " . $row['bankLoginName'] . "  Status: " . $row['Status'] . "</a></li>";
	  		if ($_SESSION['firstValidBankAccount'] == -1) {
	  			$_SESSION['firstValidBankAccount'] = $row['ID'];
	  		}
	  		echo "<option value='" . $row['ID'] . "'>" . $row['bankLoginName'] . ", " . $row['bankUserName'] . ", Status is " . $row['bankStatus'] . "</option>";
	  	}
	  	else {
			//echo "<li class='disabled'><a href='#'>Bank name: " . $row['bankLoginName'] . "  Status: " . $row['Status'] . "</a></li>";
			echo "<option disabled value='" . $row['ID'] . "'>" . $row['bankLoginName'] . ", " . $row['bankUserName'] . ", Status is " . $row['bankStatus'] . "</option>";
		}
	  }
	}
	mysqli_close($con);
}
?>



<div class="container" style="margin-top: 1%;">
	<div class="row">
	<div class="col-lg-12" style="align:left">
	  <div id="externalRemittance">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<h1 class="panel-title">Transfer Money - [<?php echo $loginName;?>]</h1>
		  </div>
		  <div class="panel-body">
		    <form class="form-horizontal" action="./parameter_dump.php" onsubmit="return WriteTransactionToTableOrders()">
			  <div class="form-group" >
				<div class="col-xs-12 col-md-6">
					<div class="input-group" style="padding-bottom:15px">
						<span class="input-group-addon"><b>Customer Name</b></span>
						<input type="text" class="form-control" name="inputClientName" id="inputClientName" placeholder="Client Name">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="input-group" style="padding-bottom:15px">
						<span class="input-group-addon"><b>Bank BSB</b></span>
						<input type="text" class="form-control numbersOnly" name="inputBankBSB" id="inputBankBSB" maxlength="6" placeholder="Bank BSB">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="input-group" style="padding-bottom:15px">
						<span class="input-group-addon"><b>Bank Account</b></span>
						<input type="text" class="form-control numbersOnly" name="inputBankAccount" id="inputBankAccount" placeholder="Bank Account">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="input-group" style="padding-bottom:15px">
						<span class="input-group-addon"><b>Comments</b></span>
						<input type="text" class="form-control" name="inputBankComments" id="inputBankComments" placeholder="Comments">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="input-group" style="padding-bottom:15px" style="display:inline">
						<span class="input-group-addon"><b>Transfer Amount</b></span>
						<input type="text" class="form-control numbersOnly" name="inputAmountBefore" id="inputAmountBefore" placeholder="Transfer Amount">
						<span class="input-group-addon"><b>.</b></span>
						<input type="text" class="form-control numbersOnly" onchange="$('#inputAmountAfter').val(this.value);" size="2" maxlength="2" placeholder="00">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="input-group" style="padding-bottom:15px">
						<span class="input-group-addon"><b>From Bank Account</b></span>
						<select class="form-control" onchange="selectFromBankAccount(this.value)">
						  <?php fetchAllBankAccounts($loginName);?>
						</select>
						<input type="hidden" name="inputFromBankAccount" id="inputFromBankAccount" value="<?php echo $_SESSION['firstValidBankAccount'];?>">
						<input type="hidden" name="InputLoginName" id="InputLoginName" value="<?php echo $loginName;?>" />
						<input type="hidden" name="InputComputerName" id= "InputComputerName" value="" />
						<input type="hidden" name="inputAmountAfter" id= "inputAmountAfter" value="" />
						<input type="hidden" name="inputCancelTag" id= "inputCancelTag" value="" />
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<button type="submit" class="btn btn-primary form-control">Submit Transfer Order</button>
				</div>
				<div class="col-xs-12 col-md-6">
			  		<button onclick="$('#inputCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Transfer Order</button>
				</div>
			  </div>
			  		
			  <div>
			  </div>
			</form>	  
		  </div>
		  <div class="panel-footer">
			  <div class="jumbotron">
				<div class="container-fluid">
					<div class="progress">
					  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 0%">
					    <span class="sr-only">0% Complete (success)</span>
					  </div>
					</div>
				  <h1 name="databaseResult" id="databaseResult">Execution result</h1>
				  <p name="detailedResult1" id="detailedResult1">This is to display detailed info</p>
				  <p name="detailedResult2" id="detailedResult2"></p>
				</div>
			  </div>
		  </div>
		</div><!-- /.col-lg-6 -->
	  </div>
	</div>
	</div>
</div>

<?php
include ("footer.php");
?>