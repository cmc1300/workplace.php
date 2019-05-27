<?php
session_start();
$_SESSION['activePage'] = "report.php";
if(empty($_SESSION['activeLoginUser'])) {
	print "<script>window.location=\"index.php\"</script>";
	die;
}
require 'etc/configuration.php';
include ("header.php");
$db = new DB_Function();
$accountListing = $db->readAccountListingFromDB($_SESSION['activeLoginUser']);
//var_dump($listing);
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
							$rowString .= "<td onclick=\"readFirstLastRecordListing('" . $rowArray["ID"] . "','" . $rowArray["name"] . "')\">" . $rowArray["name"] . "</td>";
							$rowString .= "</tr>";
							echo $rowString;
						}
					?>
				</tbody>
		    </table>
			</div>
		</div>
		<div class="col-xs-12 col-sm-9 col-lg-10">
		  <div id="externalRemittance">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<h1 class="panel-title" id="reportRecordTitle">Please select one account in the left</h1>
			  	<input type="hidden" name="inputsearchForMatchedRecordsSaveID" id= "inputsearchForMatchedRecordsSaveID" value="" />
			  	<input type="hidden" name="inputsearchForMatchedRecordsSaveName" id= "inputsearchForMatchedRecordsSaveName" value="" />
			  </div>
			  <div class="panel-body" class="table-responsive" style="height: 80px; width: 100%; margin: 0; overflow-y: auto;">
			  
				  <div class="col-xs-12 col-md-4">
				    <div class="input-group">
				      <span class="input-group-addon" id="idRadioBgDailyReport" style="background-color:lightblue">
				        <input type="radio" id="idRadioDailyReport" style="width: 18px;height: 18px; margin:0" checked onclick="selectTypeOfReport('daily')">
				      </span>
				      <label class="form-control" id="idInputDailyReport" style="background-color:lightblue" for="idRadioDailyReport">Daily Report</label>
				    </div><!-- /input-group -->
				  </div>
				  <div class="col-xs-12 col-md-4">
				    <div class="input-group">
				      <span class="input-group-addon" id="idRadioBgWeeklyReport" >
				        <input type="radio" id="idRadioWeeklyReport" style="width: 18px;height: 18px; margin:0" onclick="selectTypeOfReport('weekly')">
				      </span>
				      <label class="form-control" id="idInputWeeklyReport" for="idRadioWeeklyReport">Weekly Report</label>
				    </div><!-- /input-group -->
				  </div>
				  <div class="col-xs-12 col-md-4">
				    <div class="input-group">
				      <span class="input-group-addon" id="idRadioBgMonthlyReport" >
				        <input type="radio" id="idRadioMonthlyReport" style="width: 18px;height: 18px; margin:0" onclick="selectTypeOfReport('monthly')">
				      </span>
				      <label class="form-control" id="idInputMonthlyReport" for="idRadioMonthlyReport">Monthly Report</label>
				    </div><!-- /input-group -->
				  </div>
  
			  </div>
			  <div class="panel-footer">
			  	<div class="table-responsive" style="max-height: 460px; width: 100%; margin: 0; overflow-y: auto;">
			  	<table class="table table-bordered table-hover" id="reportContentOfRecords">
			  		<!--  
			        <thead>
			            <tr class="info">
			                <th>Index</th>
			                <th>Date</th>
			                <th>First record</th>
			                <th>Last record</th>
			                <th>Time lapse</th>
			            </tr>
			        </thead>
			        <tbody>
			        </tbody>
			        -->
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
