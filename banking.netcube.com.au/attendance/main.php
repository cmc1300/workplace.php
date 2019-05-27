<?php
session_start();
$_SESSION['activePage'] = "main.php";
//echo "activeLoginUser: " . $_SESSION['activeLoginUser'];
if(empty($_SESSION['activeLoginUser'])) {
	print "<script>window.location=\"index.php\"</script>";
	die;
}
require 'etc/configuration.php';
include ("header.php");
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
							$rowString .= "<td onclick=\"updateAttendanceRecords('" . $rowArray["ID"] . "','" . $rowArray["name"] . "')\">" . $rowArray["name"] . "</td>";
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
			  	<h1 class="panel-title" id="attendanceRecordTitle">Please select one account in the left</h1>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive" style="max-height: 510px; width: 100%; margin: 0; overflow-y: auto;">
			  	<table class="table table-bordered table-hover" id="contentOfRecords">
			        <thead>
			            <tr class="info">
			                <th>Index</th>
			                <th>Tag</th>
			                <th>Date</th>
			                <th>Time</th>
			                <th>Comments</th>
			            </tr>
			        </thead>
			        <tbody>
			        </tbody>
			    </table>
			    </div>
			  </div>
			  <div class="panel-footer">
			  </div>
			</div>
		  </div>
		</div>
	</div>
</div>

<?php
include ("footer.php");
?>