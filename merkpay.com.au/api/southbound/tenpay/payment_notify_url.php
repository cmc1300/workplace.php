<?php
/*
	http://api.netcube.com.au/projects/netcube/Merkpay/payment_notify_url.php
*/

date_default_timezone_set('Australia/Melbourne');
$filename = "payment_notify_url-" . date("Y") . "-" . date("F") . ".log";
$arr = json_encode($_REQUEST);
file_put_contents($filename,date("l jS \of F Y h:i:s A") . " $action \r\n", FILE_APPEND | LOCK_EX);
file_put_contents($filename,"=============================================================================\r\n", FILE_APPEND | LOCK_EX);
file_put_contents($filename,$arr . "\r\n", FILE_APPEND | LOCK_EX);
file_put_contents($filename,"=============================================================================\r\n\r\n", FILE_APPEND | LOCK_EX);

?>