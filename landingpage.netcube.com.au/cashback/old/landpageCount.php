<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 		 		
</head>

<body>

<!-- Offer Conversion: AU CPL - Netcube -->
<iframe src="http://tracking.umdirect.com.au/SLkQ?adv_sub=<?php 
	date_default_timezone_set('Australia/Melbourne');
	$filename = "cashback-" . date("Y") . "-" . date("F") . ".txt";
	file_put_contents($filename,date("l jS \of F Y h:i:s A") . "\n", FILE_APPEND | LOCK_EX);
	file_put_contents($filename,"==============================================================\n", FILE_APPEND | LOCK_EX);
	file_put_contents($filename,$_REQUEST['email'] . "\n\n", FILE_APPEND | LOCK_EX);

	if (!empty($_REQUEST['email'])) {
		echo $_REQUEST['email'];
	}
	else {
		echo "";
	}?>" scrolling="no" frameborder="0" width="1" height="1">
</iframe>
<!-- // End Offer Conversion -->

</body>
</html>