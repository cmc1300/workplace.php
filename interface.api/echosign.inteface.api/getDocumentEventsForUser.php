<?php
/*
 *  http://api.netcube.com.au/projects/netcube/echosign/getDocumentEventsForUser.php?year=2015&week=5
 * */

//header('Content-Type: text/plain');

if ( isset($_REQUEST['year']) && is_numeric($_REQUEST['year']) ) {
	$year = trim($_REQUEST['year']);
}
else {
	$year = "2015";
}
if ( isset($_REQUEST['week']) && is_numeric($_REQUEST['week']) ) {
	$week = trim($_REQUEST['week']);
}
else {
	$week = "0";
}
//echo "$year/$week<br>";

if (intval($year) < 2014) {
	echo "Sorry, Echo-sign system was not born until 2014-Oct!";
	die;
}
else if ( (intval($year) == 2014) && (intval($week) < 40) ) {
	echo "Sorry, Echo-sign system was not born until 2014-Oct!";
	die;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$api_key = 'XEM38J46E7N5L4G';		//Novatel Telecommunications Pty Ltd

include('./Autoloader.php');
date_default_timezone_set('Australia/Melbourne');

$ESLoader = new SplClassLoader('EchoSign', realpath(__DIR__.'/./lib').'/');
$ESLoader->register();

$client = new SoapClient(EchoSign\API::getWSDL());
$api = new EchoSign\API($client, $api_key);
/*
 *  Setup variables end
*/

$newyear 	= strtotime("$year/01/01");

if ($week <= 0) {
	$startdate 	= $newyear;
	$startdate 	= str_replace("AED","",$startdate);
	$enddate 	= date("Y-m-dTH:i:s", strtotime("+1 week", $newyear));
	$enddate 	= str_replace("AED","",$enddate);
}

$startdate 	= date("Y-m-dTH:i:s", strtotime("+" . $week . " week", $newyear));
$startdate 	= str_replace("AED","",$startdate);
$startdate 	= str_replace("AES","",$startdate);
$enddate 	= date("Y-m-dTH:i:s", strtotime("+" . (intval($week)+1) . " week", $newyear));
$enddate 	= str_replace("AED","",$enddate);
$enddate 	= str_replace("AES","",$enddate);

//echo "From " . substr($startdate, 0, 10) . " to " . substr($enddate, 0, 10) . "<br><br>";
//echo "From " . $startdate . " to " . $enddate . "<br><br>";

$result = $api->getDocumentEventsForUser($startdate, $enddate);

echo json_encode((array)$result->getDocumentEventsForUserResult);

?>