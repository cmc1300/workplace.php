<?php
session_start();
$_SESSION['activePage'] = "search.php";
if(empty($_SESSION['activeLoginUser'])) {
	print "<script>window.location=\"index.php\"</script>";
	die;
}
require 'etc/configuration.php';
include ("header.php");
$loginName = $_SESSION['activeLoginUser'];
$db = new DB_Function();
$accountListing = $db->readAccountListingFromDB($_SESSION['activeLoginUser']);
//var_dump($accountListing);
?>


<div class="container" style="margin-top: 1%;">
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-lg-2" style="align:left">
			<div class="table-responsive" style="max-height: 600px; width: 100%; margin: 0; overflow-y: auto;">
		    <table class="table table-bordered table-hover">
				<tbody>
					<?php 
			        	for ($i=0; $i < count($accountListing); $i++) {
							$rowArray = $accountListing[$i];
							if ($rowArray["status"] != "valid") {
								continue;
							}
							$rowString  = "<tr class='success'>";
							$rowString .= "<td onclick=\"updateSearchIDandName('" . $rowArray["ID"] . "','" . $rowArray["name"] . "')\">" . $rowArray["name"] . "</td>";
							$rowString .= "</tr>";
							echo $rowString;
						}
					?>
				</tbody>
		    </table>
			</div>
		</div>
		<div class="col-xs-12 col-sm-9 col-lg-10">
		  <div id="externalRemittance" >
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<h1 class="panel-title" id="attendanceSearchTitle">Please select one account in the left</h1>
			  </div>
			  <div class="panel-body" class="table-responsive" style="max-height: 180px; width: 100%; margin: 0; overflow-y: auto;">
			  	<form class="form-horizontal" action="./parameter_dump.php" onsubmit="return searchForMatchedRecords()">
				  <div class="form-group" >
					<div class="col-xs-12 col-md-4">
						<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>From year</b></span>
							<select class="form-control" onchange="setComponentValue(this.value,'inputFromYearList')">
							  <option value="2015">2015</option>
							  <option <?php if (date("Y")=="2016") echo "selected";?> value="2016">2016</option>
							  <option <?php if (date("Y")=="2017") echo "selected";?> value="2017">2017</option>
							  <option <?php if (date("Y")=="2018") echo "selected";?> value="2018">2018</option>
							</select>
							<input type="hidden" name="inputFromYearList" id="inputFromYearList" value="<?php echo date("Y");?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>From month</b></span>
							<select class="form-control" onchange="setComponentValue(this.value,'inputFromMonthList')">
							  <option value="01" <?php if (date("m")=="01") echo "selected";?>>Jan</option>
							  <option value="02" <?php if (date("m")=="02") echo "selected";?>>Feb</option>
							  <option value="03" <?php if (date("m")=="03") echo "selected";?>>Mar</option>
							  <option value="04" <?php if (date("m")=="04") echo "selected";?>>Apr</option>
							  <option value="05" <?php if (date("m")=="05") echo "selected";?>>May</option>
							  <option value="06" <?php if (date("m")=="06") echo "selected";?>>Jun</option>
							  <option value="07" <?php if (date("m")=="07") echo "selected";?>>Jul</option>
							  <option value="08" <?php if (date("m")=="08") echo "selected";?>>Aug</option>
							  <option value="09" <?php if (date("m")=="09") echo "selected";?>>Sep</option>
							  <option value="10" <?php if (date("m")=="10") echo "selected";?>>Oct</option>
							  <option value="11" <?php if (date("m")=="11") echo "selected";?>>Nov</option>
							  <option value="12" <?php if (date("m")=="12") echo "selected";?>>Dec</option>
							</select>
							<input type="hidden" name="inputFromMonthList" id="inputFromMonthList" value='<?php echo date("m");?>'>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>From day</b></span>
							<input type="text" class="form-control numbersOnly" name="inputFromDate" id="inputFromDate" value='01' size="2" maxlength="2" placeholder="Start day">
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>Until year</b></span>
							<select class="form-control" onchange="setComponentValue(this.value,'inputTillYearList')">
							  <option value="2015">2015</option>
							  <option <?php if (date("Y")=="2016") echo "selected";?> value="2016">2016</option>
							  <option <?php if (date("Y")=="2017") echo "selected";?> value="2017">2017</option>
							  <option <?php if (date("Y")=="2018") echo "selected";?> value="2018">2018</option>
							</select>
							<input type="hidden" name="inputTillYearList" id="inputTillYearList" value="<?php echo date("Y");?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>Until month</b></span>
							<select class="form-control" onchange="setComponentValue(this.value,'inputTillMonthList')">
							  <option value="01" <?php if (date("m")=="01") echo "selected";?>>Jan</option>
							  <option value="02" <?php if (date("m")=="02") echo "selected";?>>Feb</option>
							  <option value="03" <?php if (date("m")=="03") echo "selected";?>>Mar</option>
							  <option value="04" <?php if (date("m")=="04") echo "selected";?>>Apr</option>
							  <option value="05" <?php if (date("m")=="05") echo "selected";?>>May</option>
							  <option value="06" <?php if (date("m")=="06") echo "selected";?>>Jun</option>
							  <option value="07" <?php if (date("m")=="07") echo "selected";?>>Jul</option>
							  <option value="08" <?php if (date("m")=="08") echo "selected";?>>Aug</option>
							  <option value="09" <?php if (date("m")=="09") echo "selected";?>>Sep</option>
							  <option value="10" <?php if (date("m")=="10") echo "selected";?>>Oct</option>
							  <option value="11" <?php if (date("m")=="11") echo "selected";?>>Nov</option>
							  <option value="12" <?php if (date("m")=="12") echo "selected";?>>Dec</option>
							</select>
							<input type="hidden" name="inputTillMonthList" id="inputTillMonthList" value='<?php echo date("m");?>'>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="input-group" style="padding-bottom:15px">
							<span class="input-group-addon"><b>Until day</b></span>
							<input type="text" class="form-control numbersOnly" name="inputTillDate" id="inputTillDate" value='<?php echo date("d");?>' size="2" maxlength="2" placeholder="End day">
						</div>
					</div>
					
					<div class="col-xs-12 col-md-6">
						<button type="submit" name="btnsearchForMatchedRecords" id="btnsearchForMatchedRecords" class="btn btn-primary form-control">Submit Record Query</button>
					</div>
					<div class="col-xs-12 col-md-6">
				  		<button onclick="$('#inputsearchForMatchedRecordsCancelTag').val('True'); setTimeout(function(){location.reload();}, 500);"class="btn btn-warning form-control">Cancel Record Query</button>
					</div>
					<input type="hidden" name="inputsearchForMatchedRecordsSaveID" id= "inputsearchForMatchedRecordsSaveID" value="" />
					<input type="hidden" name="inputsearchForMatchedRecordsCancelTag" id= "inputsearchForMatchedRecordsCancelTag" value="" />
				  </div>
				</form>	  
			  </div>
			  <div class="panel-footer">
			  	<div class="table-responsive" style="max-height: 360px; width: 100%; margin: 0; overflow-y: auto;">
			  	<table class="table table-bordered table-hover" id="contentOfRecords">
			        <thead>
			            <tr  class="info">
			                <th>Index</th>
			                <th>Tag</th>
			                <th>Date</th>
			                <th>Time</th>
			                <th>Comments</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php 
			        	for ($i=0; $i < count($attendanceRecords); $i++) {
							$rowArray = $attendanceRecords[$i];
							$rowString  = "<tr class='warning'>";
							$rowString .= "<td>" . ($i+1) . "</td>";
							$rowString .= "<td>" . $rowArray["tag"] . "</td>";
							$rowString .= "<td>" . $rowArray["weekday"] . "</td>";
							$rowString .= "<td>" . $rowArray["date"] . "</td>";
							$rowString .= "<td>" . $rowArray["time"] . "</td>";
							$rowString .= "<td>" . $rowArray["comments"] . "</td>";
							echo $rowString;
						}
			        	?>
			        </tbody>
			    </table>
			    </div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</div>

<?php
include ("footer.php");
?>