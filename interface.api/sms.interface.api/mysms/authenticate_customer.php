<?php
/*
 * http://api.netcube.com.au/projects/netcube/sms/mysms/authenticate_customer.php?customer=boson.huang
 */

require_once '../../../includes/class/MysqliDb.php';

$ret 					= array ();
$ret ['result'] 		= "OK";

$customer 				= "";
if (isset($_REQUEST['customer']) && !empty($_REQUEST['customer'])) {
	$customer			= trim($_REQUEST['customer']);
}
else {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "Failed to get mandatory parameter customer";
	echo json_encode ( $ret );	die ();
}

$aapt['action'] 		= "getNetCubeHubDBInfo";
$result_url				= "http://api.netcube.com.au/projects/includes/interface.php";
$ch 					= curl_init();
curl_setopt($ch,CURLOPT_URL,$result_url );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
$output 				= curl_exec($ch);
$returnArray 			= json_decode($output, true);
$host_ip				= $returnArray['host_ip'];
$db_user_name			= $returnArray['db_user_name'];
$db_user_password		= $returnArray['db_user_password'];
$db_name				= $returnArray['db_name'];
$netcubehub_db 			= new MysqliDb ( $host_ip, $db_user_name, $db_user_password, $db_name );
if ($netcubehub_db == NULL) {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "Failed to connect NetCube database: " . $netcubehub_db->getLastError ();
 	echo json_encode ( $ret );	die ();
}


$netcubehub_db			-> where("username", $customer);
$array					= $netcubehub_db -> get("sms_users");
if ($array 				== NULL) {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "customer $customer can't be found in table sms_users";
	echo json_encode ( $ret );	die ();
}
$id						= $array[0]['id'];
$status					= $array[0]['status'];
if ($status 			!= "active") {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "customer $customer's status is $status";
	echo json_encode ( $ret );	die ();
}


$netcubehub_db			-> where("sms_users_id", $id);
$array					= $netcubehub_db -> get("sms_mysmsAPI");
if ($array 				== NULL) {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "customer $customer can't be found in table sms_mysmsAPI";
	echo json_encode ( $ret );	die ();
}

/*		
echo "<pre>"; var_dump($array[0]); echo "</pre>"; die;
$ret ['sms']['status'] 	= $array[0]['status'];
$ret ['sms']['msisdn'] 	= $array[0]['msisdn'];
$ret ['sms']['password']= $array[0]['password'];
$ret ['sms']['apiKey'] 	= $array[0]['apiKey'];
$ret ['sms']			= $array;
*/

foreach ($array as $item) {
	$status				= $item['status'];
	if ($status == "active") {
		$ret ['sms']['msisdn'] 	= $item['msisdn'];
		$ret ['sms']['password']= $item['password'];
		$ret ['sms']['apiKey'] 	= $item['apiKey'];
		break;
	}
}

echo json_encode($ret);
?>