<?php
session_start();
$_SESSION['activePage'] = "account.php";
if(empty($_SESSION['activeLoginUser'])) {
	print "<script>window.location=\"index.php\"</script>";
	die;
}
require 'etc/configuration.php';
include ("header.php");
$db = new DB_Function();
$listing = $db->getCurrentOperators($_SESSION['activeLoginUser']);
$db = new DB_Function();
$accountListing = $db->readAccountListingFromDB($_SESSION['activeLoginUser']);
//var_dump($listing);
?>


<div class="container" style="margin-top: 1%;">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-lg-3" style="align:left">
			<div class="table-responsive" style="max-height: 600px; width: 100%; margin: 0; overflow-y: auto;">
		    <table class="table table-bordered table-hover">
				<tbody>
					<?php 
			        	for ($i=0; $i < count($accountListing); $i++) {
							$rowArray = $accountListing[$i];
							
							$rowString  = "";
							if ($rowArray["status"] == "valid") {
								$rowString .= "<tr class='success'>";
								$rowString .= "<td><i class='fa fa-fw fa-check-square fa-lg'></i> " . $rowArray["name"] . "</td>";
								$rowString .= "<td onclick=\"updateAccountStatus('" . $rowArray["ID"] . "','" . $rowArray["name"] . "','disabled')\">" . "<button type='button' class='btn btn-warning btn-xs' id='" . $rowArray["ID"] . "'" . ">Disable</button>" . "</td>";
							}
							else {
								$rowString .= "<tr class=''>";
								$rowString .= "<td><i class='fa fa-fw fa-times-circle fa-lg'></i> " . $rowArray["name"] . "</td>";
								$rowString .= "<td onclick=\"updateAccountStatus('" . $rowArray["ID"] . "','" . $rowArray["name"] . "','valid')\">" . "<button type='button' class='btn btn-success btn-xs' id='" . $rowArray["ID"] . "'" . ">Enable</button>" . "</td>";
							}
							$rowString .= "</tr>";
							echo $rowString;
						}
					?>
				</tbody>
		    </table>
			</div>
		</div>
	<div class="col-xs-12 col-sm-8 col-lg-9">
	  <div id="externalRemittance">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<h1 class="panel-title">Maintain operator accounts by [<?php echo $_SESSION['activeLoginUser'];?>]</h1>
		  </div>
		  <div class="panel-body">
		  	<div class="table-responsive" style="max-height: 225px; width: 100%; margin: 0; overflow-y: auto;">
		  	<table class="table table-bordered table-hover">
		        <thead>
		            <tr class="info">
		                <th>Index</th>
		                <th>Operator ID</th>
		                <th>Operator Name</th>
		                <th>Operator Status</th>
		                <th>Maintence Action</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php 
		        	for ($i=0; $i < count($listing); $i++) {
						$rowArray = $listing[$i];
						if ($_SESSION['activeLoginUser'] == $rowArray["userName"] || $_SESSION['activeLoginUser'] == "administrator") {
							$rowString  = "<tr class='warning'>";
							$rowString .= "<td>" . ($i+1) . "</td>";
							$rowString .= "<td>" . $rowArray["UserNameID"] . "</td>";
							$rowString .= "<td>" . $rowArray["userName"] . "</td>";
							$rowString .= "<td>" . $rowArray["status"] . "</td>";
							if ($_SESSION['activeLoginUser'] != "administrator") {
								$rowString .= "<td>
											<button type='submit' class='btn btn-primary btn-sm' onclick=\"setOperatorPassword('" . $rowArray["UserNameID"] . "','" . $rowArray["userName"] . "')\">Change Password</button>
										</td>";
							}
							else if ($rowArray["userName"] == "administrator") {
								$rowString .= "<td>
											<button type='submit' class='btn btn-primary btn-sm' onclick=\"setOperatorPassword('" . $rowArray["UserNameID"] . "','" . $rowArray["userName"] . "')\">Change Password</button>
											&nbsp; &nbsp;
											<button type='submit' disabled class='btn btn-success btn-sm' onclick=\"setOperatorstatus('" . $rowArray["UserNameID"] . "','" . $rowArray["userName"] . "','" . $rowArray["status"]  . "')\">Change Status</button>
										</td>";
							}
							else {
								$rowString .= "<td>
											<button type='submit' class='btn btn-primary btn-sm' onclick=\"setOperatorPassword('" . $rowArray["UserNameID"] . "','" . $rowArray["userName"] . "')\">Change Password</button>
											&nbsp; &nbsp;
											<button type='submit' class='btn btn-success btn-sm' onclick=\"setOperatorstatus('" . $rowArray["UserNameID"] . "','" . $rowArray["userName"] . "','" . $rowArray["status"]  . "')\">Change Status</button>
										</td>";
							}
							echo $rowString;
						}
					}
		        	?>
		        </tbody>
		    </table>
		    </div>
		  </div>
		  <div class="panel-footer" class="table-responsive" style="max-height: 305px; width: 100%; margin: 0; overflow-y: auto;">
		  
		  	<?php if ($_SESSION['activeLoginUser'] != "administrator") {?>
				<div class="jumbotron" id="formChangeOperatorPassword" style="display: none">
			  	<form class="form-horizontal" action="./parameter_dump.php" onsubmit="return changeOperatorPassword()">
				  <div class="form-group" >
				  	<h1 align="center" style="margin-top:0;padding-bottom:15px">Change password</h1>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Operator ID</b></span>
						  <input type="text" class="form-control" name="inputChangeOperatorPasswordID" id="inputChangeOperatorPasswordID" placeholder="Operator ID">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Operator Name</b></span>
						  <input type="text" class="form-control" name="inputChangeOperatorPasswordName" id="inputChangeOperatorPasswordName" placeholder="Operator Name">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>New Password</b></span>
						  <input type="password" class="form-control" name="inputChangeOperatorPasswordPassword" id="inputChangeOperatorPasswordPassword" placeholder="New Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Repeat Password</b></span>
						  <input type="password" class="form-control" name="inputChangeOperatorPasswordPassword2" id="inputChangeOperatorPasswordPassword2" placeholder="Repeat Password">
						</div>
					</div>
				  </div>
				  <div class="form-group" >
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button type="submit" class="btn btn-primary form-control">Change Operator Password</button>
					  </div>
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button onclick="$('#inputChangeOperatorPassworCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Change Password</button>
					  </div>
					  <h2 name="generateChangeOperatorPasswordResult" id="generateChangeOperatorPasswordResult">Result: none</h2>
					  <input type="hidden" name="inputChangeOperatorPassworCancelTag" id= "inputChangeOperatorPassworCancelTag" value="" />
				  </div>
				</form>	  
			</div>
			<?php } else {?>
			
		  	<div class="jumbotron" id="formGenerateNewOperatorAccount" style="display: block">
			  	<form class="form-horizontal" action="./parameter_dump.php" onsubmit="return generateNewOperatorAccount()">
				  <div class="form-group" >
				  	<h1 align="center" style="margin-top:0;padding-bottom:15px">Create new operator</h1>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Operator Name</b></span>
						  <input type="text" class="form-control" name="inputOperatorName" id="inputOperatorName" placeholder="Operator Name">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Enter Password</b></span>
						  <input type="password" class="form-control" name="inputOperatorPassword" id="inputOperatorPassword" placeholder="Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Repeat Password</b></span>
						  <input type="password" class="form-control" name="inputOperatorPassword2" id="inputOperatorPassword2" placeholder="Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>Select Status</b></span>
							<select class="form-control" onchange="setComponentValue(this.value,'inputCreateFromOperatorStatusList')">
							  <option value="">Select status</option>
							  <option value="valid">Valid to login</option>
							  <option value="locked">Locked temporarily</option>
							  <option value="removed">Removed forever</option>
							  <option value="reserved">Reserved for future</option>
							</select>
							<input type="hidden" name="inputCreateFromOperatorStatusList" id="inputCreateFromOperatorStatusList" value="">
						</div>
					</div>
				  </div>
				  <div class="form-group" >
				  		<div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button type="submit" class="btn btn-primary form-control">Create New Operator</button>
						</div>
						<div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button onclick="$('#inputNewOperatorAccountCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Create Operator</button>
						</div>
				  		<h2 name="generateNewOperatorAccountResult" id="generateNewOperatorAccountResult">Result: none</h2>
				  		<input type="hidden" name="inputNewOperatorAccountCancelTag" id= "inputNewOperatorAccountCancelTag" value="" />
					</div>
				</form>	  
			</div>
			
			<div class="jumbotron" id="formChangeOperatorPassword" style="display: none">
			  	<form class="form-horizontal" action="./parameter_dump.php" onsubmit="return changeOperatorPassword()">
				  <div class="form-group" >
				  	<h1 align="center" style="margin-top:0;padding-bottom:15px">Change operator password</h1>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Operator ID</b></span>
						  <input type="text" class="form-control" name="inputChangeOperatorPasswordID" id="inputChangeOperatorPasswordID" placeholder="Operator ID">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Operator Name</b></span>
						  <input type="text" class="form-control" name="inputChangeOperatorPasswordName" id="inputChangeOperatorPasswordName" placeholder="Operator Name">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>New Password</b></span>
						  <input type="password" class="form-control" name="inputChangeOperatorPasswordPassword" id="inputChangeOperatorPasswordPassword" placeholder="New Password">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Repeat Password</b></span>
						  <input type="password" class="form-control" name="inputChangeOperatorPasswordPassword2" id="inputChangeOperatorPasswordPassword2" placeholder="Repeat Password">
						</div>
					</div>
				  </div>
				  <div class="form-group" >
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button type="submit" class="btn btn-primary form-control">Change Operator Password</button>
					  </div>
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button onclick="$('#inputChangeOperatorPassworCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Change Password</button>
					  </div>
					  <h2 name="generateChangeOperatorPasswordResult" id="generateChangeOperatorPasswordResult">Result: none</h2>
					  <input type="hidden" name="inputChangeOperatorPassworCancelTag" id= "inputChangeOperatorPassworCancelTag" value="" />
				  </div>
				</form>	  
			</div>
			
			<div class="jumbotron" id="formChangeOperatorStatus" style="display: none">
			  	<form class="form-horizontal" action="./CommunicationWithDB.php" onsubmit="return changeOperatorStatus()">
				  <div class="form-group" >
				  	<h1 align="center" style="margin-top:0;padding-bottom:15px">Change operator status</h1>
				  	<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Operator ID</b></span>
						  <input type="text" class="form-control" name="inputChangeOperatorStatusID" id="inputChangeOperatorStatusID" placeholder="Operator ID">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Operator Name</b></span>
						  <input type="text" class="form-control" name="inputChangeOperatorStatusName" id="inputChangeOperatorStatusName" placeholder="Operator Name">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
						  <span class="input-group-addon"><b>Current Status</b></span>
						  <input type="text" class="form-control" name="inputChangeOperatorStatusPrevious" id="inputChangeOperatorStatusPrevious" placeholder="Current Status">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
					  	<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>Change Status</b></span>
							<select class="form-control" onchange="setComponentValue(this.value,'inputFromOperatorStatusList')">
							  <option value="">Select status</option>
							  <option value="valid">Valid to login</option>
							  <option value="locked">Locked temporarily</option>
							  <option value="removed">Removed forever</option>
							  <option value="reserved">Reserved for future</option>
							</select>
							<input type="hidden" name="inputFromOperatorStatusList" id="inputFromOperatorStatusList" value="">
						</div>
					</div>
				   </div>
				   <div class="form-group" >
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button type="submit" class="btn btn-primary form-control">Change Operator Status</button>
					  </div>
					  <div class="col-xs-12 col-md-6" style="padding-bottom:15px">
					  		<button onclick="$('#inputChangeOperatorStatusCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);" class="btn btn-warning form-control">Cancel Change Status</button>
					  </div>
					  <h2 name="generateChangeOperatorStatusResult" id="generateChangeOperatorStatusResult">Result: none</h2>
					  <input type="hidden" name="inputChangeOperatorStatusCancelTag" id= "inputChangeOperatorStatusCancelTag" value="" />
					</div>
				</form>	  
			</div>
			
		  </div>
		  <?php }?>
		</div><!-- /.col-lg-6 -->		
	  </div>
	</div>
	</div>
</div>


<?php
include ("footer.php");
?>