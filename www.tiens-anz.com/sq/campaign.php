<?php
require_once '../class/MysqliDb.php';

$output_array 	= array();
//$output_array['result']	= "OK"; $output_array['info'] 	= json_encode($_REQUEST); echo json_encode($output_array); die;

$keyword		= trim($_REQUEST['keyword']);
$name 			= trim(strtolower($_REQUEST['name']));
$name 			= trim(ucwords($name));
$phone 			= trim($_REQUEST['phone']);
$email 			= trim(strtolower($_REQUEST['email']));
$attendee		= trim(strtolower($_REQUEST['attendee']));
$source			= trim(strtolower($_REQUEST['source']));
$comments 		= trim(strtolower($_REQUEST['comments']));

$netcubehub_db	= new MysqliDb ( "127.0.0.1","titi1351_tiens","xgp_950254", "titi1351_tiens" );
if ($netcubehub_db == NULL)
{
	$output_array['result']	= "NOK";
	$output_array['info'] 	= "Fail to connect Amanda database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);
	die;
}


if (!empty($phone)) {
	$netcubehub_db		-> where("keyword = '$keyword' and phone LIKE '$phone'");
	$tableArray			= $netcubehub_db -> get("campaign_register_leads");
	if ($tableArray 	!= NULL) {
		$output_array['result']	= "NOK";
		$output_array['info'] 	= 	"$phone (" . ucwords($name) . ") has already registered, thanks! 已经成功注册，谢谢！";
		echo json_encode($output_array);
		die;
	}
}

if (!empty($phone)) {
	$netcubehub_db		-> where("keyword = '$keyword' and email LIKE '$email'");
	$tableArray			= $netcubehub_db -> get("campaign_register_leads");
	if ($tableArray 	!= NULL) {
		$output_array['result']	= "NOK";
		$output_array['info'] 	= 	"$email (" . ucwords($name) . ") has already registered, thanks! 已经成功注册，谢谢！";
		echo json_encode($output_array);
		die;
	}
}


$customer_info_table = array(
		"keyword" 			=> $keyword,
		"name" 				=> $name,
		"phone" 			=> $phone,
		"email" 			=> $email,
		"attendee" 			=> $attendee,
		"source" 			=> $source,
		"comments"			=> $comments
);

try {
	$id = $netcubehub_db -> insert("campaign_register_leads", $customer_info_table );
}
catch (Exception $e) {
	$output_array['result']	= "NOK";
	$output_array['info'] 	= $e->getMessage();
	echo json_encode($output_array);
	die;
}

$output_array['result']	= "OK";
$output_array['info'] 	= ucwords($name) . " has been registered successfully, thanks! 成功注册，谢谢！";
echo json_encode($output_array);
die;

?>