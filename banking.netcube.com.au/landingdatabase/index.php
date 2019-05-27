<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Basic Tablesorter Demo</title>

	<!-- Demo styling -->
	<link href="docs/css/jq.css" rel="stylesheet">

	<!-- jQuery: required (tablesorter works with jQuery 1.2.3+) -->
	<script src="docs/js/jquery-1.2.6.min.js"></script>

	<!-- Pick a theme, load the plugin & initialize plugin -->
	<link href="dist/css/theme.default.min.css" rel="stylesheet">
	<script src="dist/js/jquery.tablesorter.min.js"></script>
	<script src="dist/js/jquery.tablesorter.widgets.min.js"></script>
	<script>
	$(function(){
		$('table').tablesorter({
			widgets        : ['zebra', 'columns'],
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true
		});
	});
	</script>

<?php 
require 'etc/configuration.php';
$db = new DB_Function();
$accountListing = $db->readAccountListingFromDB();	
?>
	
</head>
<body>
<div class="demo">
	<h1><a href="https://github.com/Mottie/tablesorter">Landing Page Contacts</a></h1>
	<button type="submit" onclick="location.reload();" style="width:200px;height:50px;float:right;"><p style=" font-size: 15px">Refresh this page</p></button>
	<table class="tablesorter">
		<thead>
			<tr>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Code</th>
				<th>Date</th>
				<th>Time</th>
				<th>Weekday</th>
				<th>Client IP</th>
				<th>Form Location</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			   	for ($i=0; $i < count($accountListing); $i++) {
					$rowArray = $accountListing[$i];
					$rowString  = "<tr>";
					$rowString .= "<td>" . $rowArray["name"] . "</td>";
					$rowString .= "<td>" . $rowArray["phone"] . "</td>";
					$rowString .= "<td>" . $rowArray["email"] . "</td>";
					$rowString .= "<td>" . $rowArray["code"] . "</td>";
					$date = DateTime::createFromFormat('Y-m-d H:i:s', $rowArray["creationDate"]);
					$rowString .= "<td>" . $date->format('Y-m-d') . "</td>";
					$rowString .= "<td>" . $date->format('H:i:s') . "</td>";
					$rowString .= "<td>" . $date->format('l') . "</td>";
					$rowString .= "<td>" . $rowArray["clientIP"] . "</td>";
					$rowString .= "<td>" . $rowArray["formTag"] . "</td>";
					$rowString .= "</tr>";
					echo $rowString;
				}
			?>
		</tbody>
	</table>

	<p>End of the page, thanks!</p>

</div>
</body></html>