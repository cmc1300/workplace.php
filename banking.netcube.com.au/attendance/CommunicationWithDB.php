<?php
session_start();
require 'etc/configuration.php';
$action = $_REQUEST["action"];

function encrypt($message) {
	$secretKey = "Encrypt with PHP Decrypt with Java";
	$initialVector = "0123456789123456";
	
	return base64_encode(
			mcrypt_encrypt(
					MCRYPT_RIJNDAEL_128,
					md5($secretKey),
					$message,
					MCRYPT_MODE_CFB,
					$initialVector
			)
	);
}

if ($action == "updateAttendanceRecords") {
	$ID 	= $_REQUEST["ID"];
	$name 	= $_REQUEST["name"];
	
	$db=new DB_Function();
	$result = $db->readAttendanceRecordsByName($ID);
	echo json_encode($result);
}
if ($action == "readFirstLastRecordListing") {
	$ID 			= $_REQUEST["ID"];
	$name 			= $_REQUEST["name"];
	$reportType 	= $_REQUEST["reportType"];

	$db=new DB_Function();
	$result = $db->readFirstLastRecordListingFromDB($ID,$reportType);
	echo json_encode($result);
}
else if ($action == "generateNewOperatorAccount") {
	$inputOperatorName 					= $_REQUEST["inputOperatorName"];
	$inputOperatorPassword 				= $_REQUEST["inputOperatorPassword"];
	$inputCreateFromOperatorStatusList 	= $_REQUEST["inputCreateFromOperatorStatusList"];

	$db=new DB_Function();
	$result = $db->addUser($inputOperatorName,$inputOperatorPassword,$inputCreateFromOperatorStatusList);
	if ($result) {
		echo "Operator " . $inputOperatorName . " has been created successfully";
	}
}
else if ($action == "checkOperatorPassword") {
	$Username 	= $_REQUEST["Username"];
	$Password 	= $_REQUEST["Password"];

	$db=new DB_Function();
	$result = $db->checkUser($Username, $Password);
	if($result == "valid"){
		$_SESSION['activeLoginUser'] = $Username;			
	}
	echo $result;
}
else if ($action == "changeOperatorPassword") {
	$inputChangeOperatorPasswordName 		= $_REQUEST["inputChangeOperatorPasswordName"];
	$inputChangeOperatorPasswordID 			= $_REQUEST["inputChangeOperatorPasswordID"];
	$inputChangeOperatorPasswordPassword 	= $_REQUEST["inputChangeOperatorPasswordPassword"];

	$db=new DB_Function();
	$result = $db->changeOperatorPassword($inputChangeOperatorPasswordID,$inputChangeOperatorPasswordPassword);
	if ($result) {
		echo "Operator ". $inputChangeOperatorPasswordName . " Password" . " has been changed successfully";
	}
}
else if ($action == "changeOperatorStatus") {
	$inputChangeOperatorStatusName 	= $_REQUEST["inputChangeOperatorStatusName"];
	$inputChangeOperatorStatusID 	= $_REQUEST["inputChangeOperatorStatusID"];
	$inputFromOperatorStatusList 	= $_REQUEST["inputFromOperatorStatusList"];

	$db=new DB_Function();
	$result = $db->changeOperatorStatus($inputChangeOperatorStatusID,$inputFromOperatorStatusList);
	if ($result) {
		echo "Operator " . $inputChangeOperatorStatusName . " status has been changed to " . $inputFromOperatorStatusList . " successfully";
	}
}
else if ($action == "searchForMatchedRecords") {
	$queryStartDate 						= $_REQUEST["queryStartDate"];
	$queryEndDate 							= $_REQUEST["queryEndDate"];
	$inputsearchForMatchedRecordsSaveID		= $_REQUEST["inputsearchForMatchedRecordsSaveID"];
	
	$db=new DB_Function();
	$result = $db->searchForMatchedRecords($queryStartDate,$queryEndDate,$inputsearchForMatchedRecordsSaveID);
	echo json_encode($result);
}
else if ($action == "updateAccountStatus") {
	$ID 		= $_REQUEST["ID"];
	$name 		= $_REQUEST["name"];
	$tag		= $_REQUEST["tag"];

	$db=new DB_Function();
	$result = $db->updateAccountStatus($ID,$name,$tag);
	echo $result;
}
?>