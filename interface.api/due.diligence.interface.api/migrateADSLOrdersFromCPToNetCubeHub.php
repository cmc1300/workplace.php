<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/migrateADSLOrdersFromCPToNetCubeHub.php
 */
require_once '../../includes/class/MysqliDb.php';

$cp_ADSL_row_count 			= -1;
$cp_ADSL_succ_count 		= 0;
$cp_ADSL_order_null_count	= 0;
$cp_ADSL_order_test_count	= 0;
$cp_ADSL_succ_count 		= 0;
$onlineOrderTable 			= "web_cp_adsl_onlineOrderInfo";
$CPOrderTable 				= "zy_order";

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db == NULL) {
	echo("Failed to connect NetCube database: " . $netcubehub_db->getLastError() . "<br>");
	die;
}
if (true) {
	$netcubehub_db 	-> where("1 = 1");
	$netcubehub_db 	-> delete($onlineOrderTable);
}

$cp_db 		= new MysqliDb("103.26.62.234","cpnetcub","f78e5dF","cpnetcub_cp");
if ($cp_db == NULL) {
	echo("Failed to connect CP database: " . $cp_db->getLastError() . "<br>");
	die;
}
$cp_db 		-> where("1 = 1");
$cp_db 		-> orderBy("orderNo", "desc");
//$cp_array	= $cp_db -> getOne($CPOrderTable);
$cp_array	= $cp_db -> get($CPOrderTable);
if ($cp_array == NULL) {
	echo("Error when selecting table $CPOrderTable: " . $cp_db->getLastError() . "<br>");
	die;
}
//echo "<pre>";	echo sizeof($cp_array) . " "; var_dump($cp_array);	echo "</pre>"; die;

while ( ($cp_ADSL_row_count ++) < (sizeof($cp_array)-1) ) {	
	$firstName	= strtolower(trim($cp_array[$cp_ADSL_row_count]['first_name']));
	$lastName	= strtolower(trim($cp_array[$cp_ADSL_row_count]['last_name']));
	$email		= trim($cp_array[$cp_ADSL_row_count]['email']);
	$address	= trim($cp_array[$cp_ADSL_row_count]['address']);
	if (empty($firstName) && empty($lastName)) {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($firstName == "test" || $firstName == "abc" || $firstName == "testing" || $firstName == "tester" || $firstName == "test xu") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($lastName == "test" || $lastName == "abc" || $lastName == "tester") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($firstName == "ian" && $lastName == "zhou") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($firstName == "song" && $lastName == "wang") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($email == "cmc1300@hotmail.com") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($email == "indika.kumara@netcube.com.au") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($email == "farid@netcube.com.au" || $email == "farid.kakar@novatel.com.au") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($email == "nehal.lad@netcube.com.au") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ($email == "sorry@gmail.com") {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	else if ( empty($address) ) {
		$cp_ADSL_order_test_count ++;
		continue;
	}
	
	$orderNumber = trim($cp_array[$cp_ADSL_row_count]['orderNo']);
	if (empty($orderNumber)) {
		$cp_ADSL_order_null_count ++;
		$orderNumber = "order-ADSL-" . str_pad(strval($cp_ADSL_order_null_count),4,"0",STR_PAD_LEFT);
		//continue;
	}
	
	$dateOfBirth 		= date("Y-m-d", strtotime($cp_array[$cp_ADSL_row_count]['birthdate']));
	$applicationDate	= date("Y-m-d H:i:s", strtotime($cp_array[$cp_ADSL_row_count]['create_time']));
	
	$serviceTermArray = explode(" ", trim($cp_array[$cp_ADSL_row_count]['contract']));
	$serviceTerm = $serviceTermArray[0];
	
	if ( trim($cp_array[$cp_ADSL_row_count]['phone_line_rental']) == "30") {
		$typeOfADSLService = "adsl off-net";
	}
	else if ( trim($cp_array[$cp_ADSL_row_count]['phone_line_rental']) == "20") {
		$typeOfADSLService = "adsl on-net";
	}
	else if ( trim($cp_array[$cp_ADSL_row_count]['phone_line_rental']) == "0") {
		$typeOfADSLService = "adsl lite";
	}
	else {
		$typeOfADSLService = "";
	}
	
	if ( trim($cp_array[$cp_ADSL_row_count]['installation']) == "None. I am able to setup by myself.") {
		$premiumInstallFee = "0.00";
	}
	else if ( trim($cp_array[$cp_ADSL_row_count]['installation']) == "Professional In-Home Installation") {
		$premiumInstallFee = "149.00";
	}
	
	if ( trim($cp_array[$cp_ADSL_row_count]['need_modem']) == "yes") {
		$isModemNeeded = "1";
	}
	else if ( trim($cp_array[$cp_ADSL_row_count]['need_modem']) == "no") {
		$isModemNeeded = "0";
	}
	
	if ( trim($cp_array[$cp_ADSL_row_count]['international_calls_fee']) == "N/A") {
		$internationCallInMinutes = "0";
	}
	else {
		$internationCallInMinutes = str_replace("Min","",trim($cp_array[$cp_ADSL_row_count]['international_calls_fee']));
	}
	
	$web_cp_onlineOrderInfo_Data = Array (
			"orderNumber"			=> $orderNumber,
	//		"customerId"			=> "new",
			"status"				=> "new",
	//		"documentKey"			=> "new",
	//		"documentStatus"		=> "new",
			"title"					=> trim($cp_array[$cp_ADSL_row_count]['title']),
			"firstName"				=> strtolower(trim($cp_array[$cp_ADSL_row_count]['first_name'])),
			"lastName"				=> strtolower(trim($cp_array[$cp_ADSL_row_count]['last_name'])),
			"dateOfBirth"			=> $dateOfBirth,
			"telephone"				=> trim($cp_array[$cp_ADSL_row_count]['phone']),
			"mobile"				=> trim($cp_array[$cp_ADSL_row_count]['mobile']),
			"email"					=> trim($cp_array[$cp_ADSL_row_count]['email']),
			"address"				=> strtolower(trim($cp_array[$cp_ADSL_row_count]['address'])),
			"deliveryAddress"		=> "",
		//	"referral"				=> "new",
		//	"dealer"				=> "new",
		//	"dealerNote"			=> "new",
			"serviceTerm"			=> $serviceTerm,
			"isADSLService"			=> "1",
			"typeOfADSLService"		=> $typeOfADSLService,
		//	"isNBNService"			=> "0",
		//	"typeOfNBNService"		=> "new",
			"fnn"					=> trim($cp_array[$cp_ADSL_row_count]['phone_number']),
		//	"currentServiceProvider"=> "new",
			"applicationDate"		=> $applicationDate,
		//	"promotionCode"			=> "new",
		//	"promotionNote"			=> "new",
		//	"promotionDetailInfo"	=> "new",
			"isExistingNetcubeAccount"=> "0",
			"netCubeAccount"		=> strtolower(trim($cp_array[$cp_ADSL_row_count]['account_text'])),
			"firstMonthFee"			=> trim($cp_array[$cp_ADSL_row_count]['first_month_fee']) + trim($cp_array[$cp_ADSL_row_count]['phone_line_rental']),
			"monthlyFee"			=> trim($cp_array[$cp_ADSL_row_count]['month_fee']) + trim($cp_array[$cp_ADSL_row_count]['phone_line_rental']),
			"setupFee"				=> trim($cp_array[$cp_ADSL_row_count]['setup_fee']),
			"premiumInstallFee"		=> $premiumInstallFee,
			"homePhoneHandsetFee"	=> trim($cp_array[$cp_ADSL_row_count]['home_phone_handset_fee']),
			"isModemNeeded"			=> $isModemNeeded,
			"modemFee"				=> trim($cp_array[$cp_ADSL_row_count]['modem_fee']),
			"modemDeliveryFee"		=> trim($cp_array[$cp_ADSL_row_count]['delivery_fee']),
		//	"modemUpgradeFee"		=> "new",
		//	"domesticCallFee"		=> "new",
		//	"internationalCallFee"	=> "new",
		//	"addonNote"				=> "new",
			"internationCallInMinutes"=> $internationCallInMinutes,
			"paymentMethod"			=> strtolower(trim($cp_array[$cp_ADSL_row_count]['pay_method'])),
		//	"firstMonthPayment"		=> "new",
		//	"identificationInfoType"=> "new",
			"isIdentificationInfoSkipped"=> "1",
		//	"identificationVerifyResult"=> "new",
		//	"emailSentResult"		=> "new",
			"orderSource"			=> "http://netcube.com.au"
	);
	
	if (!$netcubehub_db->insert($onlineOrderTable, $web_cp_onlineOrderInfo_Data)) {
		echo("Failed to insert table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>"); 
		die;
	}
	
	//echo "<pre>";	echo $cp_ADSL_row_count . " "; var_dump($web_cp_onlineOrderInfo_Data);	echo "</pre>"; 
	$cp_ADSL_succ_count ++;
}

echo "Table $CPOrderTable has " . sizeof($cp_array) . " records in all <br>";
echo "Table $CPOrderTable has $cp_ADSL_order_test_count records of test purpose <br>";
echo "Table $CPOrderTable has $cp_ADSL_order_null_count records without order number <br>";
echo "Table $CPOrderTable has $cp_ADSL_succ_count records successfully ported to NetCube Hub <br>";
?>