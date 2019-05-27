<?php

$aapt['action'] 		= "getNetCubeHubDBInfo";
$result_url				= "http://api.netcube.com.au/projects/includes/interface.php";
$ch = curl_init();
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
/*		*/
define('DB_HOST', $host_ip);
define('DB_NAME', 'bankingn_ICTManager');
define('DB_USER', $db_user_name);
define('DB_PASSWORD',$db_user_password);

/*
define('DB_HOST', '103.26.63.246');
define('DB_NAME', 'bankingn_banking');
define('DB_USER','bankingn_real');
define('DB_PASSWORD','_0U_+LTm25fA');
*/

//another PW: nqnu][0EXb&6
//another PW 2:_0U_+LTm25fA

?>