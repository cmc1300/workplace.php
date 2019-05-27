<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/isOnlineOrderBasedOnEmersion.php?customerId=1397234
 * http://api.netcube.com.au/projects/netcube/wamp/isOnlineOrderBasedOnEmersion.php
 */
require_once '../../includes/class/MysqliDb.php';

/*
if ( isset($_REQUEST['customerId']) && is_numeric($_REQUEST['customerId']) ) {
	$customerId = trim($_REQUEST['customerId']);
}
else {
	echo "<h2 id='result' name='result'>Fail to get the mandatory parameter customerId</h2>";
	die;
} */

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db == NULL) {
	echo 	"<h2 id='result' name='result'>" .
			"Fail to connect NetCube database: " . $netcubehub_db->getLastError() .
			"</h2>";
	die;
}

echo "<pre>";

$web_cp_adsl_onlineOrderInfoArray = array();
$web_cp_adsl_onlineOrderInfoArray = $netcubehub_db -> rawQuery("select orderNumber, email, applicationDate from web_cp_adsl_onlineOrderInfo order by orderNumber desc");
if ($web_cp_adsl_onlineOrderInfoArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to select table web_cp_adsl_onlineOrderInfo" .
			"</h2>";
	die;
}
//var_dump($web_cp_adsl_onlineOrderInfoArray); die;


$web_cp_nbn_onlineOrderInfoArray = array();
$web_cp_nbn_onlineOrderInfoArray = $netcubehub_db -> rawQuery("select orderNumber, email, applicationDate from web_cp_nbn_onlineOrderInfo order by orderNumber desc");
if ($web_cp_nbn_onlineOrderInfoArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to select table web_cp_nbn_onlineOrderInfo" .
			"</h2>";
	die;
}
//var_dump($web_cp_nbn_onlineOrderInfoArray); die;


$web_onlineOrderInfoArray = array();
$web_onlineOrderInfoArray = $netcubehub_db -> rawQuery("select orderNumber, email, applicationDate from web_onlineOrderInfo order by orderNumber desc");
if ($web_onlineOrderInfoArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"Fail to select table web_onlineOrderInfo" .
			"</h2>";
	die;
}
//var_dump($web_onlineOrderInfoArray); die;


$netcubehub_db				-> where("1 = 1");
$netcubehub_db 				-> orderBy("customerId", "desc");
$em_customerListingArray	= $netcubehub_db -> get("em_customerListing");
if ($em_customerListingArray == NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2 id='result' name='result'>" .
			"$orderNumber not found in table em_customerListing" .
			"</h2>";
	die;
}
//var_dump($em_customerListingArray); die;


$notFoundRecord_count 	= 0;
$matched 				= false;
$file 					= fopen("emersion.csv","w");
for ($loop=0; $loop<sizeof($em_customerListingArray); $loop++) {
	$matched 			= false;
	$customerId			= "";
	$customerName		= "";
	$customerEmail		= "";
	$customerCreatedDate= "";
	$emailOfEmersion 	= strtolower(trim($em_customerListingArray[$loop]['customerEmail']));
	if ($emailOfEmersion == "cmc1300@hotmail.com") {
		continue;
	}
	
	/*		*/
	for ($i=0; $i<sizeof($web_cp_adsl_onlineOrderInfoArray) && !$matched; $i++) {
		$email = strtolower(trim($web_cp_adsl_onlineOrderInfoArray[$i]['email']));
		if ($emailOfEmersion == $email) {
			$matched = true;
		}
	}
	
	/*		*/
	for ($i=0; $i<sizeof($web_cp_nbn_onlineOrderInfoArray) && !$matched; $i++) {
		$email = strtolower(trim($web_cp_nbn_onlineOrderInfoArray[$i]['email']));
		if ($emailOfEmersion == $email) {
			$matched = true;
		}
	}
	
	/*		*/
	for ($i=0; $i<sizeof($web_onlineOrderInfoArray) && !$matched; $i++) {
		$email = strtolower(trim($web_onlineOrderInfoArray[$i]['email']));
		if ($emailOfEmersion == $email) {
			$matched = true;
		}
	}
	
	if (!$matched) {
		$customerId			= $em_customerListingArray[$loop]['customerId'];
		$customerName		= $em_customerListingArray[$loop]['customerName'];
		$customerEmail		= $em_customerListingArray[$loop]['customerEmail'];
		$customerCreatedDate= $em_customerListingArray[$loop]['customerCreatedDate'];
		$notFoundRecord_count++;
		fputcsv($file,explode(',',"$customerId,$customerName,$customerEmail,$customerCreatedDate"));
		echo "$loop: Emersion Id($customerId) name:($customerName) Email:($customerEmail) Creation Date:($customerCreatedDate) <br>";
	}
}

echo "</pre>";
echo "<h2 id='result' name='result'>" . "$notFoundRecord_count records not found" . "</h2>";
?>