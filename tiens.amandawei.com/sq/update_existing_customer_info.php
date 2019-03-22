<?php
require_once '../class/MysqliDb.php';
//echo json_encode($_REQUEST);

$action 		= trim($_REQUEST['action']);
$id				= trim($_REQUEST['id']);
$first_name 	= trim(strtolower($_REQUEST['first_name']));
$last_name 		= trim(strtolower($_REQUEST['last_name']));
if (isChineseName($first_name) && isChineseName($first_name)) {
	$full_name	= trim($last_name . $first_name);
}
else {
	$full_name	= trim($first_name . " " . $last_name);
}
$mobile 		= trim($_REQUEST['mobile']);
$phone 			= trim($_REQUEST['phone']);
$email 			= trim(strtolower($_REQUEST['email']));
$other 			= trim($_REQUEST['other']);
$identity 		= trim($_REQUEST['identity']);
$prospective	= trim($_REQUEST['prospective']);
$budget_bottom 	= trim($_REQUEST['budget_bottom']);
$budget_top 	= trim($_REQUEST['budget_top']);
$preferred_area	= trim(strtolower($_REQUEST['preferred_area']));
$comment 		= trim($_REQUEST['comment']);
$output_array 	= array();

if ($action != "update_existing_customer_info") {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "fail to get correct action code";
	echo json_encode($output_array);
	die;
}


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

$customer_info_table = array(
	"first_name" 		=> $first_name,
	"last_name" 		=> $last_name,
	"full_name" 		=> $full_name,
	"mobile" 			=> $mobile,
	"phone" 			=> $phone,
	"email" 			=> $email,
	"other" 			=> $other,
	"identity" 			=> $identity,
	"prospective" 		=> $prospective,
	"budget_bottom" 	=> $budget_bottom,
	"budget_top" 		=> $budget_top,
	"preferred_area"	=> $preferred_area,
	"comment"			=> $comment
);

try {
	$netcubehub_db		-> where("id = $id");
	$id = $netcubehub_db -> update("customer_info", $customer_info_table );
}
catch (Exception $e) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= $e->getMessage();
	echo json_encode($output_array);
	die;
}

$output_array['result']	= "OK";
$output_array['info'] 	= ucwords($full_name) . " has been updated successfully";
$output_array['insert'] = "update record id: $id " . $netcubehub_db->getLastError();
echo json_encode($output_array);
die;


function isChineseName($name) {
	if (preg_match('/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/', $name)) {
		return true;
	} else {
		return false;
	}
}

?>