<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NetCube TV Monitor</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    
<script>
$(function() {
    setTimeout(function(){ window.location.href = './index.php'; }, 
    	    60000);
});
</script>    
</head>

<body style='padding-top: 30px'>

<div class="container">
	<div class="row">

<?php
$TVChannelStateSource = "fromFile";		// fromFile fromDatabase

if ($TVChannelStateSource == "fromFile") {
	$file = fopen("/tmp/monitor","r");
	//$file = fopen("channel.list","r");
	
	while(! feof($file)) {
		$websitename = trim(fgets($file));
		$websitename = str_replace("\"","",$websitename);
		$websitestate = trim(fgets($file));
		//echo $websitename . ": " . $websitestate . "<br>";continue;
		
		if(!empty($websitename)) {
			echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3' style='padding-bottom: 10px'>";
			echo "<div class='btn-group' role='group'>";
			echo "<div class='input-group'>";
			echo "<input type='text' class='form-control' " . "value='" . $websitename . "'>";
			if (strtolower($websitestate) == "work") {
				echo "<span class='input-group-addon label-success' style='width:75px'>WORK</span>";
			}
			else {
				echo "<span class='input-group-addon label-danger' style='width:75px'>DOWN</span>";
			}
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
		
		/*
		if(!empty($line)) {
			$lineArray = explode(",",$line);
			$websitename = trim($lineArray[1]);
			$websitestate = trim($lineArray[2]);
			//echo $websitename . " " . $websitestate . "<br />";
	
			echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3' style='padding-bottom: 10px'>";
			echo "<div class='btn-group' role='group'>";
			echo "<div class='input-group'>";
			echo "<input type='text' class='form-control' " . "value='" . $websitename . "'>";
			if (strtolower($websitestate) == "up") {
				echo "<span class='input-group-addon label-success' style='width:75px'>UP</span>";
			}
			else if (strtolower($websitestate) == "off") {
				echo "<span class='input-group-addon label-warning' style='width:75px'>OFF</span>";
			}
			else {
				echo "<span class='input-group-addon label-danger' style='width:75px'>DOWN</span>";
			}
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}*/
	}
	fclose($file);
}
else if ($TVChannelStateSource == "fromDatabase") {

	$con=mysqli_connect("localhost","broadcast02","Wze31FUTZ5","tvmonitor");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql="SELECT * FROM checktv order by channel";
	$result=mysqli_query($con,$sql);
	
	while( ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) != NULL) {
			$websitename = trim($row['channel']);
			$websitestate = trim($row['status']);
	
			echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3' style='padding-bottom: 10px'>";
			echo "<div class='btn-group' role='group'>";
			echo "<div class='input-group'>";
			echo "<input type='text' class='form-control' " . "value='" . $websitename . "'>";
			if (strtolower($websitestate) == "up") {
				echo "<span class='input-group-addon label-success' style='width:75px'>UP</span>";
			}
			else if (strtolower($websitestate) == "off") {
				echo "<span class='input-group-addon label-warning' style='width:75px'>OFF</span>";
			}
			else {
				echo "<span class='input-group-addon label-danger'  style='width:75px'>DOWN</span>";
			}
			echo "</div>";
			echo "</div>";
			echo "</div>";
	}
	
	// Free result set
	mysqli_free_result($result);
	mysqli_close($con);
}
?>

	</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>