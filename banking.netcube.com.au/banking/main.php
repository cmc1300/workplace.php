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
$history = $db->readTransactionHistory($_SESSION['activeLoginUser']);
//var_dump($history);
?>


<div class="container" style="margin-top: 1%;">
	<div class="row">
	<div class="col-lg-12" style="align:left">
	  <div id="externalRemittance">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		  	<h1 class="panel-title">History records submitted by [<?php echo $_SESSION['activeLoginUser'];?>]</h1>
		  </div>
		  <div class="panel-body">
		  	<div class="table-responsive" style="max-height: 470px; width: 100%; margin: 0; overflow-y: auto;">
		  	<table class="table table-bordered table-hover">
		        <thead>
		            <tr  class="info">
		                <th>Index</th>
		                <th>Order ID</th>
		                <th>Source Account</th>
		                <th>Target Account</th>
		                <th>Amount</th>
		                <th>Result</th>
		                <th>Transaction details</th>
		                <th>Timestamp</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php 
		        	for ($i=0; $i < count($history); $i++) {
						$rowArray = $history[$i];
						$rowString  = "<tr class='warning'>";
						$rowString .= "<td>" . ($i+1) . "</td>";
						$rowString .= "<td>" . $rowArray["orderID"] . "</td>";
						$rowString .= "<td>" . $rowArray["bankLoginName"] . "</td>";
						$rowString .= "<td>" . $rowArray["name"] . "/" . $rowArray["bank_bsb"] . "/" . $rowArray["bank_account"] . "/" . $rowArray["bank_desc"] . "</td>";
						$rowString .= "<td>" . $rowArray["amount"] . "</td>";
						$rowString .= "<td>" . $rowArray["tag"] . "</td>";
						$rowString .= "<td>" . $rowArray["result"] . "</td>";
						$rowString .= "<td>" . $rowArray["timestamp"] . "</td>";
						echo $rowString;
					}
		        	?>
		        </tbody>
		    </table>
		    </div>
		  </div>
		  <div class="panel-footer">
		  </div>
		</div><!-- /.col-lg-6 -->
	  </div>
	</div>
	</div>
</div>


<!--  
<div class="row">
<div class="col-lg-3 col-md-6 clear"></div>
<div class="col-lg-8 col-md-6">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Transaction details</th>
                <th>Amount</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>Carter</td>
                <td>johncarter@mail.com</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Peter</td>
                <td>Parker</td>
                <td>peterparker@mail.com</td>
            </tr>
            <tr>
                <td>3</td>
                <td>John</td>
                <td>Rambo</td>
                <td>johnrambo@mail.com</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
-->
<?php
include ("footer.php");
?>