<?php
/*
 * http://api.netcube.com.au/projects/netcube/echosign/getEchosignContractBasedOnEmersion.php?emersionId=1397234
 */
require_once '../../includes/class/MysqliDb.php';

/*		*/
if ( isset($_REQUEST['emersionId']) && is_numeric($_REQUEST['emersionId']) ) {
	$emersionId = trim($_REQUEST['emersionId']);
}
else {
	echo "<h2 id='result' name='result'>Fail to get the mandatory parameter emersionId</h2>";
	die;
} 

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
$netcubehub_db 			= new MysqliDb ( $host_ip, $db_user_name, $db_user_password, $db_name );
if ($netcubehub_db == NULL) {
	echo 	"<h2 id='result' name='result'>" .
			"Fail to connect NetCube database: " . $netcubehub_db->getLastError() .
			"</h2>";
	die;
}





echo "<pre>";
$message 			= "";
$orderNumber		= "";
$firstName			= "";
$lastName			= "";
$dateOfBirth		= "";
$email				= "";
$telephone			= "";
$mobile				= "";
$address			= "";
$applicationDate	= "";
$servicePlan		= "";
$serviceTerm		= "";
$unit 				= "";
$streetNumber		= "";
$streetName 		= "";
$suburb 			= "";
$state 				= "";
$postcode 			= "";
$monthlyPay			= "";
$miniCost			= "";
$firstMonth			= "";
$array				= array();
/*		*/
$netcubehub_db				-> where("emersionId", $emersionId);
$nc_customerInfo_Array		= $netcubehub_db -> get("nc_customerInfo");
if ($nc_customerInfo_Array 	== NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2>" .
			"$emersionId not found in table nc_customerInfo" .
			"</h2>";
	//die;
}
else {
	$firstName		= $nc_customerInfo_Array[0]['firstName'];
	$lastName		= $nc_customerInfo_Array[0]['lastName'];
	$dateOfBirth	= $nc_customerInfo_Array[0]['dateOfBirth'];
	$telephone		= $nc_customerInfo_Array[0]['telephone'];
	$mobile			= $nc_customerInfo_Array[0]['mobile'];
	if (empty($mobile) || is_null($mobile)) {
		if (substr($telephone,0,2) == "04") {
			$mobile	= $telephone;
		}
	}
	$email			= $nc_customerInfo_Array[0]['email'];
	$address		= $nc_customerInfo_Array[0]['address'];
	$applicationDate= $nc_customerInfo_Array[0]['applicationDate'];
	echo "Table nc_customerInfo firstName: $firstName/lastName: $lastName/dateOfBirth: $dateOfBirth/telephone: $telephone/mobile: $mobile/email: $email/address: $address<br>";
	//var_dump($nc_customerInfo_Array);
	echo "<br>";
}


/*		*/
$netcubehub_db				-> where("customerId", $emersionId);
$em_customerListing_Array	= $netcubehub_db -> get("em_customerListing");
if ($em_customerListing_Array 	== NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2>" .
			"$emersionId not found in table em_customerListing" .
			"</h2>";
	//die;
}
else {
	$customerName		= $em_customerListing_Array[0]['customerName'];
	if (empty($firstName) || empty($lastName)) {
		$array			= explode(" ",$customerName,2);
		$firstName		= trim($array[0]);
		$lastName		= trim($array[1]);
	}
	if (empty($email)) {
		$email			= $em_customerListing_Array[0]['customerEmail'];
	}
	if (empty($applicationDate) || $applicationDate == "0000-00-00 00:00:00") {
		$applicationDate = $em_customerListing_Array[0]['customerCreatedDate'];
		$applicationDate = date_format(date_create($applicationDate), 'Y-m-d');
	}
	echo "Table em_customerListing firstName: $firstName/lastName: $lastName/email: $email/applicationDate: $applicationDate<br>";
	//var_dump($em_customerListing_Array);
	echo "<br>";
}


$netcubehub_db				-> where("customerId", $emersionId);
$em_customer_Array			= $netcubehub_db -> get("em_customer");
if ($em_customer_Array 		== NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2>" .
			"$emersionId not found in table em_customer" .
			"</h2>";
	//die;
}
else {
	$customerName		= $em_customer_Array[0]['customerName'];
	if ((empty($customerName) || is_null($customerName)) && empty($firstName) && empty($lastName)) {
		$array			= explode(" ",$customerName,2);
		$firstName		= trim($array[0]);
		$lastName		= trim($array[1]);
	}
	echo "Table em_customer firstName: $firstName/lastName: $lastName<br>";
	//var_dump($em_customer_Array);
	//echo "<br>";
	
	$primaryContactId 			= $em_customer_Array[0]['primaryContactId'];
	$billingContactId			= $em_customer_Array[0]['billingContactId'];
	$netcubehub_db				-> where("contactId", $primaryContactId);
	$em_contact_Array			= $netcubehub_db -> get("em_contact");
	if ($em_contact_Array 		== NULL) {
		//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
		echo 	"<h2>" .
				"$primaryContactId not found in table em_contact" .
				"</h2>";
		//die;
	}
	else {
		for ($i=0; $i < sizeof($em_contact_Array); $i++) {
			if (empty($email)) {
				$email				= $em_contact_Array[$i]['emailAddress'];
			}
			if (empty($dateOfBirth) || $dateOfBirth=="0000-00-00") {
				$dateOfBirth			= $em_contact_Array[$i]['dateOfBirth'];
			}
			$physicalAddressId			= $em_contact_Array[$i]["physicalAddressId"];
			$netcubehub_db				-> where("physicalAddressId", $physicalAddressId);
			$em_physicalAddress_Array	= $netcubehub_db -> get("em_physicalAddress");
			echo "Table em_physicalAddress: "; var_dump($em_physicalAddress_Array);
	
			$netcubehub_db				-> where("parentId", $primaryContactId);
			$em_phoneNumber_Array		= $netcubehub_db -> get("em_phoneNumber");
			//$packagePlanIntName		= $em_packagePlan_Array[0]['packagePlanIntName'];
			//$packagePlanExtName		= $em_packagePlan_Array[0]['packagePlanExtName'];
			for ($j=0; $j < sizeof($em_phoneNumber_Array); $j++) {
				$number				= $em_phoneNumber_Array[$j]['number'];
					
				if (empty($telephone) || is_null($telephone) || substr($telephone,0,2) == "04") {
					$telephone		= $number;
				}
				if (empty($mobile) || is_null($mobile)) {
					if (substr($mobile,0,2) != "04" && substr($number,0,2) == "04") {
						$mobile		= $number;
					}
				}
				echo "Table em_contact email: $email/dateOfBirth: $dateOfBirth/number: $number/physicalAddressId: $physicalAddressId<br>";
			}
			//var_dump($em_phoneNumber_Array);
		}
		echo "<br>";
	}
}
	
/*		*/
$netcubehub_db						-> where("customerId", $emersionId);
$netcubehub_db 						-> orderBy("packageSubscriptionId", "asc");
$em_packageSubscription_Array		= $netcubehub_db -> get("em_packageSubscription");
if ($em_packageSubscription_Array 	== NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2>" .
			"$emersionId not found in table em_packageSubscription" .
			"</h2>";
	//die;
}
else {
	for ($i=0; $i < sizeof($em_packageSubscription_Array); $i++) {
		$packageSubscriptionId	= $em_packageSubscription_Array[$i]['packageSubscriptionId'];
		$packagePlanId 			= $em_packageSubscription_Array[$i]['packagePlanId'];
		$subscriptionStatus 	= strtolower($em_packageSubscription_Array[$i]['subscriptionStatus']);
		$netcubehub_db			-> where("packagePlanId", $packagePlanId);
		$em_packagePlan_Array	= $netcubehub_db -> get("em_packagePlan");
		$packagePlanIntName		= strtolower($em_packagePlan_Array[0]['packagePlanIntName']);
		$packagePlanExtName		= strtolower($em_packagePlan_Array[0]['packagePlanExtName']);
		echo "em_packageSubscription packageSubscriptionId: $packageSubscriptionId/$subscriptionStatus/packagePlanId: $packagePlanId/packagePlanIntName: $packagePlanIntName/packagePlanExtName: $packagePlanExtName<br>";
		if (empty($servicePlan)) {		//$subscriptionStatus == "active"
			if (substr_count($packagePlanIntName,"- 6m") > 0 || substr_count($packagePlanExtName,"- 6m") > 0) {
				$serviceTerm = "6";
			}
			else if (substr_count($packagePlanIntName,"- 12m") > 0 || substr_count($packagePlanExtName,"- 12m") > 0) {
				$serviceTerm = "12";
			}
			else if (substr_count($packagePlanIntName,"- 24m") > 0 || substr_count($packagePlanExtName,"- 24m") > 0) {
				$serviceTerm = "24";
			}
			else if (substr_count($packagePlanIntName,"m2m") > 0 || substr_count($packagePlanExtName,"m2m") > 0) {
				$serviceTerm = "1";
			}

			if (substr_count($packagePlanIntName,"adsl") > 0 && substr_count($packagePlanExtName,"on-net") > 0) {
				$servicePlan	= "adsl on-net";
				$monthlyPay		= "69.95";
			}
			else if (substr_count($packagePlanIntName,"adsl") > 0 && substr_count($packagePlanExtName,"off-net") > 0) {
				$servicePlan	= "adsl off-net";
				$monthlyPay		= "79.95";
			}
			else if (substr_count($packagePlanIntName,"adsl") > 0 && substr_count($packagePlanExtName,"lite") > 0) {
				$servicePlan	= "adsl lite";
				$monthlyPay		= "49.95";
			}
			else if (substr_count($packagePlanIntName,"nbn lite") > 0 || substr_count($packagePlanExtName,"nbn lite") > 0) {
				$servicePlan	= "nbn lite";
				$monthlyPay		= "49.95";
			}
			else if (substr_count($packagePlanIntName,"nbn 12") > 0 || substr_count($packagePlanExtName,"nbn 12") > 0) {
				$servicePlan	= "nbn 12";
				$monthlyPay		= "59.95";
			}
			else if (substr_count($packagePlanIntName,"nbn 25") > 0 || substr_count($packagePlanExtName,"nbn 25") > 0) {
				$servicePlan	= "nbn 25";
				$monthlyPay		= "79.95";
			}
			else if (substr_count($packagePlanIntName,"nbn 50") > 0 || substr_count($packagePlanExtName,"nbn 50") > 0) {
				$servicePlan	= "nbn 50";
				$monthlyPay		= "89.95";
			}
			else if (substr_count($packagePlanIntName,"nbn 100") > 0 || substr_count($packagePlanExtName,"nbn 100") > 0) {
				$servicePlan	= "nbn 100";
				$monthlyPay		= "99.95";
			}
			$miniCost			= sprintf("%.2f",$monthlyPay * $serviceTerm);
		}
	}
	echo "Table em_packageSubscription servicePlan: $servicePlan/serviceTerm: $serviceTerm<br>";
	//var_dump($em_packageSubscription_Array);
	echo "<br>";	
}


/*		*/
$netcubehub_db			-> where("customerId", $emersionId);
$netcubehub_db 			-> orderBy("invoiceId", "asc");
$em_invoice_Array		= $netcubehub_db -> get("em_invoice");
if ($em_invoice_Array 	== NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	echo 	"<h2>" .
			"$emersionId not found in table em_invoice" .
			"</h2>";
	//die;
}
else {
	for ($i=0; $i < sizeof($em_invoice_Array); $i++) {
		$invoiceId		= $em_invoice_Array[$i]['invoiceId'];
		$invoiceDue		= $em_invoice_Array[$i]['invoiceDue'];
		$total 			= $em_invoice_Array[$i]['currencyUnit'] . sprintf("%.2f",$em_invoice_Array[$i]['total']);
		echo "em_invoice invoiceId: $invoiceId/invoiceDue: $invoiceDue/total: $total<br>";
		if ($i==0) {
			$firstMonth	= sprintf("%.2f",$em_invoice_Array[$i]['total']);
		}
	}
	//var_dump($em_invoice_Array);
	echo "<br>";
}



/*
 * main():
 */
echo "<br>main():<br>";

$orderNumber		= str_replace("-","",substr($applicationDate,0,10)) . str_pad($emersionId, 10, "0", STR_PAD_LEFT);
echo "	orderNumber: $orderNumber<br>";

$firstName			= ucwords(strtolower($firstName));
$lastName			= ucwords(strtolower($lastName));
echo "	firstName: $firstName	lastName: $lastName<br>";
echo "	dateOfBirth: $dateOfBirth	email: $email<br>";


if ($em_physicalAddress_Array != null) {
	$addressDisplayType	= $em_physicalAddress_Array[0]['addressDisplayType'];
	if ($addressDisplayType == "Unit / Complex / Campus") {
		$unit 				= $em_physicalAddress_Array[0]['addressComplexUnitNumber'];
		$streetNumber		= $em_physicalAddress_Array[0]['streetNumberStart'];
		if (!empty($em_physicalAddress_Array[0]['streetNumberEnd'])) {
			$streetNumber	= $streetNumber . "-" . $em_physicalAddress_Array[0]['streetNumberEnd'];
		}
		$streetName			= $em_physicalAddress_Array[0]['streetName'];
		$addressStreetType	= $em_physicalAddress_Array[0]['addressStreetType'];
		$suburb				= $em_physicalAddress_Array[0]['suburb'];
		$state 				= $em_physicalAddress_Array[0]['addressPhysicalState'];
		$postcode			= $em_physicalAddress_Array[0]['postcode'];
		$streetName			= $streetName . " " . $addressStreetType;
	}
	else if ($addressDisplayType == "Unstructured Address") {
		$suburb				= $em_physicalAddress_Array[0]['suburb'];
		$state 				= $em_physicalAddress_Array[0]['addressPhysicalState'];
		$postcode			= $em_physicalAddress_Array[0]['postcode'];
		$addressLine1		= $em_physicalAddress_Array[0]['addressLine1'];
		if (substr_count($addressLine1,"/")) {
			$array			= explode("/",$addressLine1,2);
			$unit 			= $array[0];
			$array			= explode(" ",$array[1],2);
			$streetNumber	= $array[0];
			$streetName		= $array[1];
		}
		else {
			$array			= explode(" ",$addressLine1,2);
			$unit 			= "";
			$streetNumber	= $array[0];
			$streetName		= $array[1];
		}
	}
	else if ($addressDisplayType == "Standard Address (inc LOT)") {
		$unit 				= $em_physicalAddress_Array[0]['addressComplexUnitNumber'];
		$streetNumber		= $em_physicalAddress_Array[0]['streetNumberStart'];
		if (!empty($em_physicalAddress_Array[0]['streetNumberEnd'])) {
			$streetNumber	= $streetNumber . "-" . $em_physicalAddress_Array[0]['streetNumberEnd'];
		}
		$streetName			= $em_physicalAddress_Array[0]['streetName'];
		$addressStreetType	= $em_physicalAddress_Array[0]['addressStreetType'];
		$suburb				= $em_physicalAddress_Array[0]['suburb'];
		$state 				= $em_physicalAddress_Array[0]['addressPhysicalState'];
		$postcode			= $em_physicalAddress_Array[0]['postcode'];
		$streetName			= $streetName . " " . $addressStreetType;
	}
	
	$unit 				= ucwords($unit);;
	$streetName			= ucwords($streetName);
	$suburb				= ucwords(str_replace("."," ",$suburb));
	if ($state == "victoria") {
		$state			= "VIC";
	}
	else if ($state == "new south wales") {
		$state			= "NSW";
	}
	else if ($state == "south australia") {
		$state			= "SA";
	}
	else if ($state == "tasmania") {
		$state			= "TAS";
	}
	else if ($state == "northern territory") {
		$state			= "NT";
	}
	else if ($state == "queensland") {
		$state			= "QLD";
	}
	else if ($state == "australian capital t") {
		$state			= "ACT";
	}
	else if ($state == "western australia") {
		$state			= "WA";
	}
	
	$address			= ucwords(strtolower($address));
	echo "	address[$addressDisplayType]: unit: $unit/streetNumber: $streetNumber/streetName: $streetName/suburb: $suburb/state: $state/postcode: $postcode<br>";
}

$telephone				= str_replace(" ","",$telephone);
$telephone				= str_replace("-","",$telephone);
$mobile					= str_replace(" ","",$mobile);
$mobile					= str_replace("-","",$mobile);
echo "	telephone: $telephone	mobile: $mobile<br>";
echo "	servicePlan: $servicePlan/serviceTerm: $serviceTerm<br>";
echo "	monthlyPay: $monthlyPay/miniCost: $miniCost/firstMonth: $firstMonth<br>";





error_reporting(E_ALL);
ini_set('display_errors', 0);
include('./Autoloader.php');
/*
 *  Setup variables - Change these before testing
 */
if (empty($email)) {
	echo json_encode(
		array("error" => "mandatory info email is empty")
	);
	die;
}
else if (empty($firstName) || empty($lastName)) {
	echo json_encode(
		array("error" => "mandatory info customer name is empty")
	);
	die;
}
else if (empty($applicationDate)) {
	echo json_encode(
		array("error" => "mandatory info application date is empty")
	);
	die;
}
else if (empty($dateOfBirth)) {
	echo json_encode(
		array("error" => "mandatory info customer birthday is empty")
	);
	die;
}
else if (empty($streetNumber) || empty($streetName)) {
	echo json_encode(
			array("error" => "mandatory info customer address is empty")
	);
	die;
}
else if (empty($servicePlan) || empty($serviceTerm)) {
	echo json_encode(
		array("error" => "mandatory info customer service is empty")
	);
	die;
}
else if (empty($telephone) && empty($mobile)) {
	echo json_encode(
		array("error" => "mandatory info customer contact is empty")
	);
	die;
}

$api_key = 'XEM38J46E7N5L4G';
$recipient_email = 'boson.huang@novatel.com.au';
//$recipient_email = 'cmc1300@hotmail.com';
$merge_fields = array();

$merge_fields['firstname'] 	= $firstName;
$merge_fields['surname'] 	= $lastName;
$array 	= explode("-",$dateOfBirth);
$year	= $array[0];
$month	= $array[1];
$day	= $array[2];
$merge_fields['dob1'] 		= substr($day,0,1);
$merge_fields['dob2'] 		= substr($day,1,1);
$merge_fields['dob3'] 		= substr($month,0,1);
$merge_fields['dob4'] 		= substr($month,1,1);
$merge_fields['dob5']		= substr($year,0,1);
$merge_fields['dob6'] 		= substr($year,1,1);
$merge_fields['dob7'] 		= substr($year,2,1);
$merge_fields['dob8'] 		= substr($year,3,1);
$merge_fields['email']		= $email;

$merge_fields['unit'] 		= $unit;
$merge_fields['housenumber']= $streetNumber;
$merge_fields['street'] 	= $streetName;
$merge_fields['suburb'] 	= $suburb;
$merge_fields['postcode'] 	= $postcode;
$merge_fields['state'] 		= $state;

$merge_fields['phoneno'] 	= $telephone;
$merge_fields['mobile'] 	= $mobile;

$deliveryfee = 0;
if ($servicePlan == "adsl lite") {
	$merge_fields['adsl4'] = 'checked';
}
else if ($servicePlan == "adsl on-net") {
	$merge_fields['adsl2'] = 'checked';
}
else if ($servicePlan == "adsl off-net") {
	$merge_fields['adsl3'] = 'checked';
}
else if ($servicePlan == "nbn lite") {
	$merge_fields['nbn1'] 		= 'checked';
	$merge_fields['nbntype1'] 	= 'Fibre';
}
else if ($servicePlan == "nbn 12") {
	$merge_fields['nbn5'] 		= 'checked';
	$merge_fields['nbntype2'] 	= 'Fibre';
}
else if ($servicePlan == "nbn 25") {
	$merge_fields['nbn2'] 		= 'checked';
	$merge_fields['nbntype3'] 	= 'Fibre';
}
else if ($servicePlan == "nbn 50") {
	$merge_fields['nbn3'] 		= 'checked';
	$merge_fields['nbntype4'] 	= 'Fibre';
}
else if ($servicePlan == "nbn 100") {
	$merge_fields['nbn4'] 		= 'checked';
	$merge_fields['nbntype5'] 	= 'Fibre';
}

if ($serviceTerm=="1") {
	$merge_fields['serviceterm1'] = 'checked';
}
else if ($serviceTerm=="6") {
	$merge_fields['serviceterm2'] = 'checked';
}
else if ($serviceTerm=="12") {
	$merge_fields['serviceterm3'] = 'checked';
}
else if ($serviceTerm=="24") {
	$merge_fields['serviceterm4'] = 'checked';
}

$merge_fields['servicevalue1'] = $monthlyPay;
$merge_fields['servicevalue2'] = $miniCost;	
$merge_fields['servicevalue3'] = $firstMonth;

$merge_fields['installationaddress'] 	= "";
if (!empty($merge_fields['unit'])) {
	$merge_fields['installationaddress'] = $merge_fields['unit'] . "/";
}
$merge_fields['installationaddress'] .= $merge_fields['housenumber'] . " " . $merge_fields['street'];
$merge_fields['suburb1'] = $merge_fields['suburb'];
$merge_fields['state1'] = $merge_fields['state'];
$merge_fields['postcode1'] = $merge_fields['postcode'];


$merge_fields['customername'] = $firstName . " " . $lastName;
date_default_timezone_set('Australia/Melbourne');
$array 	= explode("-",substr($applicationDate,0,10));
$year	= $array[0];
$month	= $array[1];
$day	= $array[2];
$merge_fields['date1'] = substr($day,0,1);
$merge_fields['date2'] = substr($day,1,1);
$merge_fields['date3'] = substr($month,0,1);
$merge_fields['date4'] = substr($month,1,1);
$merge_fields['date5'] = substr($year,0,1);
$merge_fields['date6'] = substr($year,1,1);
$merge_fields['date7'] = substr($year,2,1);
$merge_fields['date8'] = substr($year,3,1);
$merge_fields['recording'] = $orderNumber;

var_dump($merge_fields); 

$dealer = "nc-amber";
$dealerFirstThree = "";
if (!empty($dealer)) {
	$dealerFirstThree = strtolower(substr($dealer, 0, 3));
}
if (!empty($dealer) && $dealerFirstThree == "nc-") {
	$filepath = "AgentApplication-Form";
}
else {
	$filepath = "NetCube_Application_form";
}
//end setup variables

$ESLoader = new SplClassLoader('EchoSign', realpath(__DIR__.'/./lib').'/');
$ESLoader->register();

$client = new SoapClient(EchoSign\API::getWSDL());
$api = new EchoSign\API($client, $api_key);

/* Coding for choosing echo-sign template */
$file = EchoSign\Info\FileInfo::createFromLibraryDocumentName($filepath);

$recipients = new EchoSign\Info\RecipientInfo;
if (!empty($dealer) && $dealerFirstThree == "nc-") {
	$recipients->addRecipient($recipient_email, 'APPROVER');
	$document = new EchoSign\Info\DocumentCreationInfo('Application Form', $file);
	$document->setRecipients($recipients)
		->setMessage("Please review and approve this application form.")
    	->setMergeFields(new EchoSign\Info\MergeFieldInfo($merge_fields));
}
else {
	$recipients->addRecipient($recipient_email, 'SIGNER');
	$document = new EchoSign\Info\DocumentCreationInfo('Application Form', $file);
   	$document->setRecipients($recipients)
	   	->setMessage("Please review and sign this application form.")
    	->setMergeFields(new EchoSign\Info\MergeFieldInfo($merge_fields));
}

try{
	$result 	= $api->sendDocument($document);
	$message 	= json_encode((array)$result->documentKeys->DocumentKey);
}
catch(Exception $e){
	$message 	= json_encode( array("error" => $e->getMessage()) );
}


echo "</pre>";
echo "<h2 id='result' name='result'>" . $message . "</h2>";
?>