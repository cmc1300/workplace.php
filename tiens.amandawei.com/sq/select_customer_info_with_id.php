<?php
require_once '../class/MysqliDb.php';
//echo json_encode($_REQUEST);

$action 		= trim($_REQUEST['action']);
$id		 		= trim($_REQUEST['customerid']);
$output_array 	= array();
$tableArray		= array();

if ($action != "select_customer_info_with_id1") {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get correct action code";
	echo json_encode($output_array);
	die;
}

die;

$netcubehub_db	= new MysqliDb ( "127.0.0.1","amam8224_amanda","xgp_950254", "amam8224_mouse" );
if ($netcubehub_db == NULL)
{
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "Fail to connect Amanda database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);
	die;
}
else {
	//var_dump($netcubehub_db); die;
}
//mysql_select_db("tenpayco_merkpay",$con);
//mysql_query("SET NAMES 'utf8'");

if (!empty($full_name)) {
	if (empty($selectSQL)) {
		$selectSQL 	= "full_name LIKE '%$full_name%'";
	}
	else {
		$selectSQL 	= $selectSQL . " AND " . "full_name LIKE '%$full_name%'";
	}
}
if (!empty($mobile)) {
	if (empty($selectSQL)) {
		$selectSQL 	= "mobile LIKE '$mobile' OR phone LIKE '$mobile'";
	}
	else {
		$selectSQL 	= $selectSQL . " AND " . "mobile LIKE '$mobile' OR phone LIKE '$mobile'";
	}
}

/*
$output_array['info'] 	= $selectSQL;
echo json_encode($output_array);
die;*/

try {
	$netcubehub_db		-> where($selectSQL);
	$tableArray			= $netcubehub_db -> get("customer_info");
}
catch (Exception $e) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= $e->getMessage();
	echo json_encode($output_array);
	die;
}

if ($tableArray 	== NULL) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "no matched customer found";
	echo json_encode($output_array);
	die;
}
$output_array['result']	= "OK";
$output_array['info'] 	= sizeof($tableArray) . " customers have been selected successfully";
$output_array['array']	= $tableArray;
echo json_encode($output_array);
die;

?>