<?php
session_start();
$_SESSION['activePage'] = "profile.php";
if(empty($_SESSION['activeLoginUser'])) {
	print "<script>window.location=\"index.php\"</script>";
	die;
}
require 'etc/configuration.php';
include ("header.php");
$db = new DB_Function();
$listing = $db->getCurrentOperators($_SESSION['activeLoginUser']);
//var_dump($listing);
?>


<div class="container" style="margin-top: 1%;">
	<div class="row">
	<div class="col-lg-12" style="align:left">
	  <div id="externalRemittance">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<h1 class="panel-title">Maintain bank accounts by [<?php echo $_SESSION['activeLoginUser'];?>]</h1>
		  </div>
		  <div class="panel-body">
		  	<div class="table-responsive" style="max-height: 225px; width: 100%; margin: 0; overflow-y: auto;">
		  	<table class="table table-bordered table-hover">
		        <thead>
		            <tr class="info">
		                <th>Index</th>
		                <th>Bank Account ID</th>
		                <th>Bank Account Login</th>
		                <th>Bank User Name</th>
		                <th>Mobile IMEI</th>
		                <th>Bank Account Status</th>
		                <th>Maintence Action</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php 
			            $db = new DB_Function();
			            $listing = $db->getCurrentBankAccounts($_SESSION['activeLoginUser']);
			            $tag = "disabled";
			            if ($_SESSION['activeLoginUser'] == "administrator") {
			            	$tag = "enabled";
			            }
			        	for ($i=0; $i < count($listing); $i++) {
							$rowArray = $listing[$i];
							$rowString  = "<tr class='warning'>";
							$rowString .= "<td>" . ($i+1) . "</td>";
							$rowString .= "<td>" . $rowArray["ID"] . "</td>";
							$rowString .= "<td>" . $rowArray["bankLoginName"] . "</td>";
							$rowString .= "<td>" . $rowArray["bankUserName"] . "</td>";
							$rowString .= "<td>" . $rowArray["IMEI"] . "</td>";
							$rowString .= "<td>" . $rowArray["bankStatus"] . "</td>";
							$rowString .= "<td>
										<button type='submit' " . $tag . " class='btn btn-primary btn-sm' onclick=\"setBankAccountProfile('" . $rowArray["ID"] . "','" . $rowArray["bankLoginName"] . "','" . $rowArray["bankUserName"] . "','" . $rowArray["IMEI"] . "')\">Change Profile</button>
										&nbsp; &nbsp;
										<button type='submit' " . $tag . " class='btn btn-success btn-sm' onclick=\"setBankAccountStatus('" . $rowArray["ID"] . "','" . $rowArray["bankLoginName"] . "','" . $rowArray["bankUserName"] . "','" . $rowArray["bankStatus"]  . "')\">Change Status</button>
									</td>";
							echo $rowString;
						}
			       	?>
		        </tbody>
		    </table>
		    </div>
		  </div>
		  <div class="panel-footer">
			
			<?php if ($_SESSION['activeLoginUser'] != "administrator") {?>
			<div class="jumbotron" id="formGenerateNewBankAccount" style="display: block">
				<div class="form-group" >
					<h2 align="center" style="margin-top:0;padding-bottom:15px">Sorry! Only administrator could access this page!</h2>
				</div>
			</div>
			<?php } else {?>
			
			<div class="jumbotron" id="formGenerateNewBankAccount" style="display: block">
			  	<form class="form-horizontal" action="./parameter_dump.php" onsubmit="return generateNewBankAccount()">
				  <div class="form-group" >
				  	<h1 align="center" style="margin-top:0;padding-bottom:15px">Create new bank account</h1>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank Account Login</b></span>
						  <input type="text" class="form-control numbersOnly" maxlength="8" name="inputBankAccountLogin" id="inputBankAccountLogin" placeholder="Bank Account Login">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank User Name</b></span>
						  <input type="text" class="form-control" name="inputBankUserName" id="inputBankUserName" placeholder="Bank User Name">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Enter Password</b></span>
						  <input type="password" class="form-control" name="inputBankAccountPassword" id="inputBankAccountPassword" placeholder="Enter Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Repeat Password</b></span>
						  <input type="password" class="form-control" name="inputBankAccountPassword2" id="inputBankAccountPassword2" placeholder="Repeat Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Mobile IMEI</b></span>
						  <input type="text" class="form-control numbersOnly" maxlength="20" name="inputBankMobileIMEI" id="inputBankMobileIMEI" placeholder="Mobile IMEI - 20 digits">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					    <div class="input-group">
					      <span class="input-group-addon"><b>Account Status</b></span>
					      <input type="text" disabled class="form-control" name="inputBankAccountStatus" id="inputBankAccountStatus" >
					      <div class="input-group-btn">
					        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					        	Select Status 
					        	<span class="caret"></span>
					        </button>
					        <ul class="dropdown-menu"  role="menu">
					          <li role="presentation" onclick="$('#inputBankAccountStatus').val('valid');">Valid to use</li>
					          <li role="presentation" onclick="$('#inputBankAccountStatus').val('locked');">Locked temporarily</li>
					          <li role="presentation" onclick="$('#inputBankAccountStatus').val('removed');">Removed forever</li>
					          <li role="presentation" onclick="$('#inputBankAccountStatus').val('reserved');">Reserved for future</li>
					        </ul>
					      </div><!-- /btn-group -->
					    </div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
				  </div>
				  <div class="form-group" >
					    <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					      <button type="submit" class="btn btn-primary form-control">Create New Bank Account</button>
					    </div>
					    <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button onclick="$('#inputBankAccountCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Create Account</button>
						</div>
					    <h2 name="generateNewBankAccountResult" id="generateNewBankAccountResult">Result: none</h2>
					    <input type="hidden" name="inputBankAccountCancelTag" id= "inputBankAccountCancelTag" value="" />
				    </div>
				</form>	  
			</div>
			
			<div class="jumbotron" id="formSetBankAccountProfile" style="display: none">
			  	<form class="form-horizontal" action="./parameter_dump.php" onsubmit="return changeBankAccountProfile()">
				  <div class="form-group" >
				  	<h1 align="center" style="margin-top:0;padding-bottom:15px">Change bank account profile</h1>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank Account ID</b></span>
						  <input type="text" class="form-control" name="inputChangeProfileBankAccountLoginID" id="inputChangeProfileBankAccountLoginID" placeholder="Bank Account Login ID">
						</div>
					</div>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank Account Login</b></span>
						  <input type="text" class="form-control" name="inputChangeProfileBankAccountLogin" id="inputChangeProfileBankAccountLogin" placeholder="Bank Account Login">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank User Name</b></span>
						  <input type="text" class="form-control" name="inputChangeProfileBankUserName" id="inputChangeProfileBankUserName" placeholder="Bank User Name">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>New Password</b></span>
						  <input type="password" class="form-control" name="inputChangeProfileBankAccountPassword" id="inputChangeProfileBankAccountPassword" placeholder="Enter Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Repeat Password</b></span>
						  <input type="password" class="form-control" name="inputChangeProfileBankAccountPassword2" id="inputChangeProfileBankAccountPassword2" placeholder="Repeat Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Mobile IMEI</b></span>
						  <input type="text" class="form-control numbersOnly" maxlength="20" name="inputChangeProfileBankMobileIMEI" id="inputChangeProfileBankMobileIMEI" placeholder="Mobile IMEI - 20 digits">
						</div>
					</div>
				  </div>
				  <div class="form-group" >
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button type="submit" class="btn btn-primary form-control">Change Bank Account Profile</button>
					  </div>
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button onclick="$('#inputChangeProfileCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Change Profile</button>
					  </div>
					  <h2 name="generateChangeProfileBankAccountResult" id="generateChangeProfileBankAccountResult">Result: none</h2>
					  <input type="hidden" name="inputChangeProfileCancelTag" id= "inputChangeProfileCancelTag" value="" />
				  </div>
				</form>	  
			</div>
			
			<div class="jumbotron" id="formSetBankAccountStatus" style="display: none">
			  	<form class="form-horizontal" action="./CommunicationWithDB.php" onsubmit="return changeBankAccountStatus()">
				  <div class="form-group" >
				  	<h1 align="center" style="margin-top:0;padding-bottom:15px">Change bank account status</h1>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank Account ID</b></span>
						  <input type="text" class="form-control" name="inputChangeStatusBankAccountLoginID" id="inputChangeStatusBankAccountLoginID" placeholder="Bank Account Login ID">
						</div>
					</div>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank Account Login</b></span>
						  <input type="text" class="form-control" name="inputChangeStatusBankAccountLogin" id="inputChangeStatusBankAccountLogin" placeholder="Bank Account Login">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Bank User Name</b></span>
						  <input type="text" class="form-control" name="inputChangeStatusBankUserName" id="inputChangeStatusBankUserName" placeholder="Bank User Name">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Current Status</b></span>
						  <input type="text" class="form-control" name="inputChangeStatusBankAccountCurStatus" id="inputChangeStatusBankAccountCurStatus" placeholder="Current Status">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Change Status</b></span>
					      <input type="text" disabled class="form-control" name="inputChangeStatusBankAccountStatus" id="inputChangeStatusBankAccountStatus" >
					      <div class="input-group-btn">
					        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					        	Select Status 
					        	<span class="caret"></span>
					        </button>
					        <ul class="dropdown-menu"  role="menu">
					          <li role="presentation" onclick="$('#inputChangeStatusBankAccountStatus').val('valid');">Valid to use</li>
					          <li role="presentation" onclick="$('#inputChangeStatusBankAccountStatus').val('locked');">Locked temporarily</li>
					          <li role="presentation" onclick="$('#inputChangeStatusBankAccountStatus').val('removed');">Removed forever</li>
					          <li role="presentation" onclick="$('#inputChangeStatusBankAccountStatus').val('reserved');">Reserved for future</li>
					        </ul>
					      </div><!-- /btn-group -->
						</div>
					</div>
				   </div>
				   <div class="form-group" >
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button type="submit" class="btn btn-primary form-control" style="padding-bottom:15px">Change Bank Account Status</button>
					  </div>
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button onclick="$('#inputChangeStatusBankAccountCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Change Status</button>
					  </div>
					  <h2 name="generateChangeStatusBankAccountResult" id="generateChangeStatusBankAccountResult">Result: none</h2>
					  <input type="hidden" name="inputChangeStatusBankAccountCancelTag" id= "inputChangeStatusBankAccountCancelTag" value="" />
				  </div>
				</form>	  
			</div>
			<?php }?>
						
		  </div>
		</div><!-- /.col-lg-6 -->
	  </div>
	</div>
	</div>
</div>

<?php
include ("footer.php");
?>
