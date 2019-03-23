<?php
/*
 * http://api.netcube.com.au/projects/netcube/echosign/getEchosignContractBasedOnEmersion.php?emersionId=1397234
 * http://api.netcube.com.au/projects/netcube/echosign/getEchosignContractBasedOnTest.php?emersionId=1397234
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
	echo 	"<h2 id='result' name='result'>" . "Fail to connect NetCube database: " . $netcubehub_db->getLastError() . "</h2>";
	die;
}


$table_name			= "web_due_diligence_info";
$message 			= "<pre>";
$error				= "";
$source				= "";
$json				= "";
$returnInfo			= "";
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
$typeOfADSLService	= "";
$fnn				= "";
$unit 				= "";
$streetNumber		= "";
$streetName 		= "";
$suburb 			= "";
$state 				= "";
$postcode 			= "";
$monthlyPay			= "";
$miniCost			= "";
$firstMonth			= "";
$found				= false;
$nbntype			= "Fibre";
$emersionStatus		= "none";
$sourceChanged		= "";
$array				= array();

$table_documentKey		= "";
$table_documentStatus	= "";
$table_documentKeySync	= "";

/*		*/
$netcubehub_db						-> where("emersionId", $emersionId);
$web_due_diligence_info_Array		= $netcubehub_db -> get("web_due_diligence_info");
if ($web_due_diligence_info_Array 	== NULL) {
	//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
	$message .=	"<h2>" . "$emersionId not found in table web_due_diligence_info" . "</h2>";
	//die;
}
else {
	$emersionStatus			= $web_due_diligence_info_Array[0]['emersionStatus'];
	$orderNumber			= $web_due_diligence_info_Array[0]['orderNumber'];
	$table_documentKeySync	= $web_due_diligence_info_Array[0]['documentKeySync'];
}

if (!empty($orderNumber)) {
	$netcubehub_db					-> where("orderNumber", $orderNumber);
	$netcubehub_db 					-> orderBy("orderNumber", "desc");
	$web_onlineOrderInfo_Array		= $netcubehub_db -> get("web_onlineOrderInfo");
	$source							= "web_onlineOrderInfo";
	if ($web_onlineOrderInfo_Array 	!= NULL) {
		$sourceChanged		= "web_onlineOrderInfo";
		$firstName			= $web_onlineOrderInfo_Array[0]['firstName'];
		$lastName			= $web_onlineOrderInfo_Array[0]['lastName'];
		$dateOfBirth		= $web_onlineOrderInfo_Array[0]['dateOfBirth'];
		$email				= $web_onlineOrderInfo_Array[0]['email'];
		$table_documentKey			= $web_onlineOrderInfo_Array[0]['documentKey'];
		$table_documentStatus		= $web_onlineOrderInfo_Array[0]['documentStatus'];
		if (is_null($table_documentStatus) || empty($table_documentStatus) ) {
			$table_documentStatus	= "OUT_FOR_SIGNATURE";
		}
		$address			= ucwords(strtolower($web_onlineOrderInfo_Array[0]['address']));
		$addressArray = explode(",",$address);
		if (count($addressArray) == 3) {
			if (stripos($addressArray[0],"/")!=0) {
				$part1Array = explode("/",trim($addressArray[0]));
				$unit = trim($part1Array[0]);
				$part12Array = explode(" ",trim($part1Array[1]));
			}
			else {
				$part12Array = explode(" ",trim($addressArray[0]));
			}
			$length = count($part12Array);
			if ($length==3) {
				$streetNumber = trim($part12Array[0]);
				$streetName = trim($part12Array[1]) . " " . trim($part12Array[2]);
			}
			else if ($length>3 && !ctype_digit($part12Array[1])) {
				$streetNumber = trim($part12Array[0]);
				$streetName = trim($part12Array[1]);
				for ($count=2; $count <= $length-1; $count++) {
					$streetName .= " " . trim($part12Array[$count]);
				}
			}
			else {
				$unit = trim($part12Array[0]);
				$streetNumber = trim($part12Array[1]);
				$streetName = trim($part12Array[2]);
				for ($count=3; $count <= $length-1; $count++) {
					$streetName .= " " . trim($part12Array[$count]);
				}
			}
			$part2Array = explode(" ",trim($addressArray[1]));
			$length = count($part2Array);
			$postcode = trim($part2Array[$length - 1]);
			$state = trim($part2Array[$length - 2]);
			$suburb = trim($part2Array[0]);
			for ($count=1; $count <= $length-3; $count++) {
				$suburb .= " " . trim($part2Array[$count]);
			}
		}
		$state 				= strtoupper($state);
		$telephone			= $web_onlineOrderInfo_Array[0]['telephone'];
		$mobile				= $web_onlineOrderInfo_Array[0]['mobile'];
		if ($web_onlineOrderInfo_Array[0]['isADSLService']) {
			$servicePlan	= $web_onlineOrderInfo_Array[0]['typeOfADSLService'];
			if (strtolower($web_onlineOrderInfo_Array[0]['typeOfADSLService'])=="adsl lite") {
				$typeOfADSLService	= "adsl lite";
				if ($web_onlineOrderInfo_Array[0]['fnn']!=null && !empty($web_onlineOrderInfo_Array[0]['fnn'])) {
					$fnn			= $web_onlineOrderInfo_Array[0]['fnn'];
				}
			}
		}
		else if ($web_onlineOrderInfo_Array[0]['isNBNService']) {
			$servicePlan	= $web_onlineOrderInfo_Array[0]['typeOfNBNService'];
		}
		else if ($web_onlineOrderInfo_Array[0]['isFibreXService']) {
			$servicePlan	= $web_onlineOrderInfo_Array[0]['typeOfFibreXService'];
		}
		$serviceTerm		= $web_onlineOrderInfo_Array[0]['serviceTerm'];
		if (empty($serviceTerm)) {
			$serviceTerm	= "1";
		}
		
		$applicationDate	= $web_onlineOrderInfo_Array[0]['applicationDate'];
		$monthlyPay			= sprintf("%.2f",$web_onlineOrderInfo_Array[0]['monthlyFee']);
		$miniCost			= sprintf("%.2f",$monthlyPay * $serviceTerm);
		$firstMonth			= sprintf("%.2f",$web_onlineOrderInfo_Array[0]['firstMonthFee']);

		//echo "<pre>"; var_dump($web_onlineOrderInfo_Array); echo "</pre>";
		//echo "monthlyPay/$monthlyPay miniCost/$miniCost firstMonth/$firstMonth<br>";
		$message .= "<br>web_onlineOrderInfo main():<br>";
	}
	else {
		$netcubehub_db							-> where("orderNumber", $orderNumber);
		$netcubehub_db 							-> orderBy("orderNumber", "desc");
		$web_cp_adsl_onlineOrderInfo_Array		= $netcubehub_db -> get("web_cp_adsl_onlineOrderInfo");
		$source									= "web_cp_adsl_onlineOrderInfo";
		if ($web_cp_adsl_onlineOrderInfo_Array 	!= NULL) {
			$sourceChanged		= "web_cp_adsl_onlineOrderInfo";
			$firstName			= $web_cp_adsl_onlineOrderInfo_Array[0]['firstName'];
			$lastName			= $web_cp_adsl_onlineOrderInfo_Array[0]['lastName'];
			$dateOfBirth		= $web_cp_adsl_onlineOrderInfo_Array[0]['dateOfBirth'];
			$email				= $web_cp_adsl_onlineOrderInfo_Array[0]['email'];
			$address			= ucwords(strtolower($web_cp_adsl_onlineOrderInfo_Array[0]['address']));
			$addressArray = explode(",",$address);
			if (count($addressArray) == 3) {
				if (stripos($addressArray[0],"/")!=0) {
					$part1Array = explode("/",trim($addressArray[0]));
					$unit = trim($part1Array[0]);
					$part12Array = explode(" ",trim($part1Array[1]));
				}
				else {
					$part12Array = explode(" ",trim($addressArray[0]));
				}
				$length = count($part12Array);
				if ($length==3) {
					$streetNumber = trim($part12Array[0]);
					$streetName = trim($part12Array[1]) . " " . trim($part12Array[2]);
				}
				else if ($length>3 && !ctype_digit($part12Array[1])) {
					$streetNumber = trim($part12Array[0]);
					$streetName = trim($part12Array[1]);
					for ($count=2; $count <= $length-1; $count++) {
						$streetName .= " " . trim($part12Array[$count]);
					}
				}
				else {
					$unit = trim($part12Array[0]);
					$streetNumber = trim($part12Array[1]);
					$streetName = trim($part12Array[2]);
					for ($count=3; $count <= $length-1; $count++) {
						$streetName .= " " . trim($part12Array[$count]);
					}
				}
				$part2Array = explode(" ",trim($addressArray[1]));
				$length = count($part2Array);
				$postcode = trim($part2Array[$length - 1]);
				$state = trim($part2Array[$length - 2]);
				$suburb = trim($part2Array[0]);
				for ($count=1; $count <= $length-3; $count++) {
					$suburb .= " " . trim($part2Array[$count]);
				}
			}
			$state 				= strtoupper($state);
			$telephone			= $web_cp_adsl_onlineOrderInfo_Array[0]['telephone'];
			$mobile				= $web_cp_adsl_onlineOrderInfo_Array[0]['mobile'];
			if ($web_cp_adsl_onlineOrderInfo_Array[0]['isADSLService']) {
				$servicePlan	= $web_cp_adsl_onlineOrderInfo_Array[0]['typeOfADSLService'];
			}
			$serviceTerm		= $web_cp_adsl_onlineOrderInfo_Array[0]['serviceTerm'];
			if (empty($serviceTerm)) {
				$serviceTerm	= "1";
			}
			$applicationDate	= $web_cp_adsl_onlineOrderInfo_Array[0]['applicationDate'];
			$monthlyPay			= sprintf("%.2f",$web_cp_adsl_onlineOrderInfo_Array[0]['monthlyFee']);
			$miniCost			= sprintf("%.2f",$monthlyPay * $serviceTerm);
			$firstMonth			= sprintf("%.2f",$web_cp_adsl_onlineOrderInfo_Array[0]['firstMonthFee']);
			if (empty($servicePlan) || is_null($servicePlan)) {
				if ($monthlyPay == "79.95") {
					$servicePlan= "adsl off-net";
				}
				else if ($monthlyPay == "69.95") {
					$servicePlan= "adsl on-net";
				}
				else {
					$servicePlan= "adsl lite";
				}
			}

			//echo "<pre>"; var_dump($web_cp_adsl_onlineOrderInfo_Array); echo "</pre>";
			$message .= "<br>web_cp_adsl_onlineOrderInfo main():<br>";
		}
		else {
			$netcubehub_db							-> where("orderNumber", $orderNumber);
			$netcubehub_db 							-> orderBy("orderNumber", "desc");
			$web_cp_nbn_onlineOrderInfo_Array		= $netcubehub_db -> get("web_cp_nbn_onlineOrderInfo");
			$source									= "web_cp_nbn_onlineOrderInfo";
			if ($web_cp_nbn_onlineOrderInfo_Array 	!= NULL) {
				$sourceChanged		= "web_cp_nbn_onlineOrderInfo";
				$firstName			= $web_cp_nbn_onlineOrderInfo_Array[0]['firstName'];
				$lastName			= $web_cp_nbn_onlineOrderInfo_Array[0]['lastName'];
				$dateOfBirth		= $web_cp_nbn_onlineOrderInfo_Array[0]['dateOfBirth'];
				$email				= $web_cp_nbn_onlineOrderInfo_Array[0]['email'];
				$address			= ucwords(strtolower($web_cp_nbn_onlineOrderInfo_Array[0]['address']));
				$addressArray = explode(",",$address);
				if (count($addressArray) == 3) {
					if (stripos($addressArray[0],"/")!=0) {
						$part1Array = explode("/",trim($addressArray[0]));
						$unit = trim($part1Array[0]);
						$part12Array = explode(" ",trim($part1Array[1]));
					}
					else {
						$part12Array = explode(" ",trim($addressArray[0]));
					}
					$length = count($part12Array);
					if ($length==3) {
						$streetNumber = trim($part12Array[0]);
						$streetName = trim($part12Array[1]) . " " . trim($part12Array[2]);
					}
					else if ($length>3 && !ctype_digit($part12Array[1])) {
						$streetNumber = trim($part12Array[0]);
						$streetName = trim($part12Array[1]);
						for ($count=2; $count <= $length-1; $count++) {
							$streetName .= " " . trim($part12Array[$count]);
						}
					}
					else {
						$unit = trim($part12Array[0]);
						$streetNumber = trim($part12Array[1]);
						$streetName = trim($part12Array[2]);
						for ($count=3; $count <= $length-1; $count++) {
							$streetName .= " " . trim($part12Array[$count]);
						}
					}
					$part2Array = explode(" ",trim($addressArray[1]));
					$length = count($part2Array);
					$postcode = trim($part2Array[$length - 1]);
					$state = trim($part2Array[$length - 2]);
					$suburb = trim($part2Array[0]);
					for ($count=1; $count <= $length-3; $count++) {
						$suburb .= " " . trim($part2Array[$count]);
					}
				}
				$state 				= strtoupper($state);
				$telephone			= $web_cp_nbn_onlineOrderInfo_Array[0]['telephone'];
				$mobile				= $web_cp_nbn_onlineOrderInfo_Array[0]['mobile'];
				if ($web_cp_nbn_onlineOrderInfo_Array[0]['isNBNService']) {
					$servicePlan	= $web_cp_nbn_onlineOrderInfo_Array[0]['typeOfNBNService'];
				}
				$serviceTerm		= $web_cp_nbn_onlineOrderInfo_Array[0]['serviceTerm'];
				if (empty($serviceTerm)) {
					$serviceTerm	= "1";
				}
				$applicationDate	= $web_cp_nbn_onlineOrderInfo_Array[0]['applicationDate'];
				$monthlyPay			= sprintf("%.2f",$web_cp_nbn_onlineOrderInfo_Array[0]['monthlyFee']);
				$miniCost			= sprintf("%.2f",$monthlyPay * $serviceTerm);
				$firstMonth			= sprintf("%.2f",$web_cp_nbn_onlineOrderInfo_Array[0]['firstMonthFee']);
					
				//echo "<pre>"; var_dump($web_cp_nbn_onlineOrderInfo_Array); echo "</pre>";
				$message .= "<br>web_cp_nbn_onlineOrderInfo main():<br>";
			}
		}
	}

	$message .= "	orderNumber: $orderNumber<br>";
	$firstName			= ucwords(strtolower($firstName));
	$lastName			= ucwords(strtolower($lastName));
	$message .= "	firstName: $firstName	lastName: $lastName<br>";
	$message .= "	dateOfBirth: $dateOfBirth	email: $email<br>";
	$address			= ucwords(strtolower($address));
	$message .= "	[$address]: unit: $unit/streetNumber: $streetNumber/streetName: $streetName/suburb: $suburb/state: $state/postcode: $postcode<br>";
	$message .= "	telephone: $telephone	mobile: $mobile<br>";
	$message .= "	servicePlan: $servicePlan/serviceTerm: $serviceTerm/applicationDate: $applicationDate<br>";
	$message .= "	monthlyPay: $monthlyPay/miniCost: $miniCost/firstMonth: $firstMonth<br>";
	$message .= "<br>";
	//echo $message; die;

	if (empty($email)) {
		$error = "mandatory info email is empty";
	}
	else if (empty($firstName) || empty($lastName)) {
		$error = "mandatory info customer name is empty";
	}
	else if (empty($streetNumber) || empty($streetName)) {
		$error = "mandatory info customer address is empty";
	}
	else if (empty($servicePlan) || empty($serviceTerm)) {
		$error = "mandatory info customer service is empty";
	}
	else if (empty($applicationDate)) {
		$error = "mandatory info application date is empty";
	}
	else if (empty($telephone) && empty($mobile)) {
		$error = "mandatory info customer contact is empty";
	}
	else if (empty($dateOfBirth)) {
		$error = "mandatory info customer birthday is empty";
	}
	else {
		$found = true;
		echo $message;
	}
}


if (!$found) {
	$source						= "emersion";
	/*		*/
	$netcubehub_db				-> where("emersionId", $emersionId);
	$nc_customerInfo_Array		= $netcubehub_db -> get("nc_customerInfo");
	if ($nc_customerInfo_Array 	== NULL) {
		//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
		$message .=	"<h2>" . "$emersionId not found in table nc_customerInfo" . "</h2>";
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
		$message .=	"Table nc_customerInfo firstName: $firstName/lastName: $lastName/dateOfBirth: $dateOfBirth/telephone: $telephone/mobile: $mobile/email: $email/address: $address<br>";
		//var_dump($nc_customerInfo_Array);
		$message .= "<br>";
	}
	
	/*		*/
	$netcubehub_db				-> where("customerId", $emersionId);
	$em_customerListing_Array	= $netcubehub_db -> get("em_customerListing");
	if ($em_customerListing_Array 	== NULL) {
		//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
		$message .= "<h2>" . "$emersionId not found in table em_customerListing" . "</h2>";
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
		$message .= "Table em_customerListing firstName: $firstName/lastName: $lastName/email: $email/applicationDate: $applicationDate<br>";
		//var_dump($em_customerListing_Array);
		$message .= "<br>";
	}
	
	
	$netcubehub_db				-> where("customerId", $emersionId);
	$em_customer_Array			= $netcubehub_db -> get("em_customer");
	if ($em_customer_Array 		== NULL) {
		//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
		$message .= "<h2>" . "$emersionId not found in table em_customer" .	"</h2>";
		//die;
	}
	else {
		$customerName		= $em_customer_Array[0]['customerName'];
		if ((empty($customerName) || is_null($customerName)) && empty($firstName) && empty($lastName)) {
			$array			= explode(" ",$customerName,2);
			$firstName		= trim($array[0]);
			$lastName		= trim($array[1]);
		}
		$message .= "Table em_customer firstName: $firstName/lastName: $lastName<br>";
		//var_dump($em_customer_Array);
		//echo "<br>";
	
		$primaryContactId 			= $em_customer_Array[0]['primaryContactId'];
		$billingContactId			= $em_customer_Array[0]['billingContactId'];
		$netcubehub_db				-> where("contactId", $primaryContactId);
		$em_contact_Array			= $netcubehub_db -> get("em_contact");
		if ($em_contact_Array 		== NULL) {
			//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
			$message .=	"<h2>" . "$primaryContactId not found in table em_contact" . "</h2>";
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
				//echo "Table em_physicalAddress: "; var_dump($em_physicalAddress_Array);
	
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
					$message .= "Table em_contact email: $email/dateOfBirth: $dateOfBirth/number: $number/physicalAddressId: $physicalAddressId<br>";
				}
				//var_dump($em_phoneNumber_Array);
			}
			$message .= "<br>";
		}
	}
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
				$array			= explode(" ",trim($array[1]),2);
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
			if (empty($streetNumber)) {
				$streetNumber		= $em_physicalAddress_Array[0]['streetLotNumber'];
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
		if (strtolower($state) == "victoria") {
			$state			= "VIC";
		}
		else if (strtolower($state) == "new south wales") {
			$state			= "NSW";
		}
		else if (strtolower($state) == "south australia") {
			$state			= "SA";
		}
		else if (strtolower($state) == "tasmania") {
			$state			= "TAS";
		}
		else if (strtolower($state) == "northern territory") {
			$state			= "NT";
		}
		else if (strtolower($state) == "queensland") {
			$state			= "QLD";
		}
		else if (strtolower($state) == "australian capital t") {
			$state			= "ACT";
		}
		else if (strtolower($state) == "western australia") {
			$state			= "WA";
		}
	}
	
	
	/*		*/
	$netcubehub_db						-> where("customerId", $emersionId);
	$netcubehub_db 						-> orderBy("packageSubscriptionId", "asc");
	$em_packageSubscription_Array		= $netcubehub_db -> get("em_packageSubscription");
	if ($em_packageSubscription_Array 	== NULL) {
		//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
		$message .=	"<h2>" . "$emersionId not found in table em_packageSubscription" . "</h2>";
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
			$message .=	"em_packageSubscription packageSubscriptionId: $packageSubscriptionId/$subscriptionStatus/packagePlanId: $packagePlanId/packagePlanIntName: $packagePlanIntName/packagePlanExtName: $packagePlanExtName<br>";
			if (empty($servicePlan)) {		//$subscriptionStatus == "active"
				if (substr_count($packagePlanIntName,"- 6m") > 0 || substr_count($packagePlanExtName,"- 6m") > 0) {
					$serviceTerm = "6";
				}
				else if (substr_count($packagePlanIntName,"6 months") > 0 || substr_count($packagePlanExtName,"6 months") > 0) {
					$serviceTerm = "6";
				}
				else if (substr_count($packagePlanIntName,"- 12m") > 0 || substr_count($packagePlanExtName,"- 12m") > 0) {
					$serviceTerm = "12";
				}
				else if (substr_count($packagePlanIntName,"12 months") > 0 || substr_count($packagePlanExtName,"12 months") > 0) {
					$serviceTerm = "12";
				}
				else if (substr_count($packagePlanIntName,"- 24m") > 0 || substr_count($packagePlanExtName,"- 24m") > 0) {
					$serviceTerm = "24";
				}
				else if (substr_count($packagePlanIntName,"24 months") > 0 || substr_count($packagePlanExtName,"24 months") > 0) {
					$serviceTerm = "24";
				}
				else if (substr_count($packagePlanIntName,"bundle - 24") > 0 || substr_count($packagePlanExtName,"bundle - 24") > 0) {
					$serviceTerm = "24";
				}
				else if (substr_count($packagePlanIntName,"m2m") > 0 || substr_count($packagePlanExtName,"m2m") > 0) {
					$serviceTerm = "1";
				}
				else if (substr_count($packagePlanIntName,"bundle - 1m") > 0 || substr_count($packagePlanExtName,"bundle - 1m") > 0) {
					$serviceTerm = "1";
				}
				else if (substr_count($packagePlanIntName,"lite - 1m") > 0 || substr_count($packagePlanExtName,"lite - 1m") > 0) {
					$serviceTerm = "1";
				}
				else if (substr_count($packagePlanIntName,"- m1") > 0 && substr_count($packagePlanExtName,"- 0m") > 0) {
					$serviceTerm = "1";
				}
	
				if (substr_count($packagePlanIntName,"adsl") > 0 && substr_count($packagePlanExtName,"on-net") > 0) {
					$servicePlan	= "adsl on-net";
					$monthlyPay		= "69.95";
				}
				else if (substr_count($packagePlanIntName,"spring sale") > 0 && substr_count($packagePlanExtName,"on-net") > 0) {
					$servicePlan	= "adsl on-net";
					$monthlyPay		= "69.95";
				}
				else if (substr_count($packagePlanIntName,"aapt + tv") > 0 && substr_count($packagePlanExtName,"entertainment bundle on net") > 0) {
					$servicePlan	= "adsl on-net";
					$monthlyPay		= "69.95";
				}
				else if (substr_count($packagePlanIntName,"adsl") > 0 && substr_count($packagePlanExtName,"off-net") > 0) {
					$servicePlan	= "adsl off-net";
					$monthlyPay		= "79.95";
				}
				else if (substr_count($packagePlanIntName,"adsl2") > 0 && substr_count($packagePlanExtName,"entertainment bundle off net") > 0) {
					$servicePlan	= "adsl off-net";
					$monthlyPay		= "79.95";
				}
				else if (substr_count($packagePlanIntName,"adsl") > 0 && substr_count($packagePlanExtName,"lite") > 0) {
					$servicePlan	= "adsl lite";
					$monthlyPay		= "49.95";
				}
				else if (substr_count($packagePlanIntName,"netcube one lite") > 0 && substr_count($packagePlanExtName,"telstra adsl2") > 0) {
					$servicePlan	= "adsl lite";
					$monthlyPay		= "49.95";
				}
				else if (substr_count($packagePlanIntName,"nbn lite") > 0 || substr_count($packagePlanExtName,"nbn lite") > 0) {
					$servicePlan	= "nbn lite";
					$monthlyPay		= "49.95";
				}
				else if (substr_count($packagePlanIntName,"nbn fixed wireless lite") > 0 || substr_count($packagePlanExtName,"nbn fixed wireless lite") > 0) {
					$servicePlan	= "nbn lite";
					$nbntype		= "Wireless";
					$monthlyPay		= "49.95";
				}
				else if (substr_count($packagePlanIntName,"nbn 12") > 0 || substr_count($packagePlanExtName,"nbn 12") > 0) {
					$servicePlan	= "nbn 12";
					$monthlyPay		= "59.95";
				}
				else if (substr_count($packagePlanIntName,"nbn fixed wireless 12") > 0 || substr_count($packagePlanExtName,"nbn fixed wireless 12") > 0) {
					$servicePlan	= "nbn 12";
					$nbntype		= "Wireless";
					$monthlyPay		= "59.95";
				}
				else if (substr_count($packagePlanIntName,"nbn 25") > 0 || substr_count($packagePlanExtName,"nbn 25") > 0) {
					$servicePlan	= "nbn 25";
					$monthlyPay		= "79.95";
				}
				else if (substr_count($packagePlanIntName,"nbn fixed wireless 25") > 0 || substr_count($packagePlanExtName,"nbn fixed wireless 25") > 0) {
					$servicePlan	= "nbn 25";
					$nbntype		= "Wireless";
					$monthlyPay		= "79.95";
				}
				else if (substr_count($packagePlanIntName,"nbn25 + tv") > 0 && substr_count($packagePlanExtName,"entertainment bundle nbn25") > 0) {
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
				else if (substr_count($packagePlanIntName,"mach3 bundle") > 0 && substr_count($packagePlanExtName,"mach3 bundle") > 0) {
					$servicePlan	= "nbn 100";
					$monthlyPay		= "99.95";
				}
					
				/*
				 if ($packagePlanIntName == "payg 12 std") {
				$servicePlan	= "";
				$serviceTerm 	= "";
				$monthlyPay		= "";
				}*/
					
				$miniCost			= sprintf("%.2f",$monthlyPay * $serviceTerm);
			}
		}
		$message .= "Table em_packageSubscription servicePlan: $servicePlan/serviceTerm: $serviceTerm<br>";
		//var_dump($em_packageSubscription_Array);
		$message .= "<br>";
	}
	
	
	/*		*/
	$netcubehub_db			-> where("customerId", $emersionId);
	$netcubehub_db 			-> orderBy("invoiceId", "asc");
	$em_invoice_Array		= $netcubehub_db -> get("em_invoice");
	if ($em_invoice_Array 	== NULL) {
		//echo("Error when selecting table $onlineOrderTable: " . $netcubehub_db->getLastError() . "<br>");
		$message .=	"<h2>" . "$emersionId not found in table em_invoice" . "</h2>";
		//die;
	}
	else {
		for ($i=0; $i < sizeof($em_invoice_Array); $i++) {
			$invoiceId		= $em_invoice_Array[$i]['invoiceId'];
			$invoiceDue		= $em_invoice_Array[$i]['invoiceDue'];
			$total 			= $em_invoice_Array[$i]['currencyUnit'] . sprintf("%.2f",$em_invoice_Array[$i]['total']);
			$message .=	"em_invoice invoiceId: $invoiceId/invoiceDue: $invoiceDue/total: $total<br>";
			if ($i==0) {
				$firstMonth	= sprintf("%.2f",$em_invoice_Array[$i]['total']);
			}
		}
		//var_dump($em_invoice_Array);
		$message .= "<br>";
	}
	
	
	/*
	 * main():
	*/
	$message .= "<br>emersion main():<br>";
	
	if (empty($orderNumber)) {
		$orderNumber = str_replace("-","",substr($applicationDate,0,10)) . str_pad($emersionId, 10, "0", STR_PAD_LEFT);
	}
	$message .= "	orderNumber: $orderNumber<br>";
	
	$firstName			= ucwords(strtolower($firstName));
	$lastName			= ucwords(strtolower($lastName));
	$message .= "	firstName: $firstName	lastName: $lastName<br>";
	$message .= "	dateOfBirth: $dateOfBirth	email: $email<br>";
	
	$address			= ucwords(strtolower($address));
	$message .= "	address type[$addressDisplayType]: unit: $unit/streetNumber: $streetNumber/streetName: $streetName/suburb: $suburb/state: $state/postcode: $postcode<br>";
	
	$telephone				= str_replace(" ","",$telephone);
	$telephone				= str_replace("-","",$telephone);
	$mobile					= str_replace(" ","",$mobile);
	$mobile					= str_replace("-","",$mobile);
	$message .= "	telephone: $telephone	mobile: $mobile<br>";
	$message .= "	servicePlan: $servicePlan/serviceTerm: $serviceTerm/applicationDate: $applicationDate<br>";
	$message .= "	monthlyPay: $monthlyPay/miniCost: $miniCost/firstMonth: $firstMonth<br>";
	
	
	$error = "";
	if (empty($email)) {
		$error = "mandatory info email is empty";
	}
	else if (empty($firstName) || empty($lastName)) {
		$error = "mandatory info customer name is empty";
	}
	else if (empty($streetNumber) || empty($streetName)) {
		$error = "mandatory info customer address is empty";
	}
	else if (empty($servicePlan) || empty($serviceTerm)) {
		$error = "mandatory info customer service is empty";
	}
	else if (empty($applicationDate)) {
		$error = "mandatory info application date is empty";
	}
	else if (empty($telephone) && empty($mobile)) {
		$error = "mandatory info customer contact is empty";
	}
	else if (empty($dateOfBirth)) {
		$error = "mandatory info customer birthday is empty";
	}
	else {
	}
}


if (!empty($error)) {
	$json  = json_encode(
				array(
					"error"		=> $error,
					"message"	=> $message
				)
			);
	$web_due_diligence_table = Array (
			"source" 		=> $source,
			"syncStatus" 	=> "nok",
			"syncInfoJson"	=> $json
	);
	$netcubehub_db			-> where("emersionId", $emersionId);
	$netcubehub_db			-> update($table_name, $web_due_diligence_table );
	$message .= "</pre>";
	$message .= "<h2 id='result' name='result'>" . "($emersionId/$firstName $lastName/$emersionStatus) " . $error . "</h2>";
	echo $message;
	die;
}


/*
 *  Setup variables - Change these before testing
 */
error_reporting(E_ALL);
ini_set('display_errors', 0);
include('./Autoloader.php');
$api_key = 'XEM38J46E7N5L4G';
//$recipient_email = 'boson.huang@novatel.com.au';
$recipient_email = 'echosign@netcube.com.au';
$recipient_email = 'echosign.netcube@gmail.com';
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
	$merge_fields['nbntype1'] 	= $nbntype;
}
else if ($servicePlan == "nbn 12") {
	$merge_fields['nbn5'] 		= 'checked';
	$merge_fields['nbntype2'] 	= $nbntype;
}
else if ($servicePlan == "nbn 25") {
	$merge_fields['nbn2'] 		= 'checked';
	$merge_fields['nbntype3'] 	= $nbntype;
}
else if ($servicePlan == "nbn 50") {
	$merge_fields['nbn3'] 		= 'checked';
	$merge_fields['nbntype4'] 	= $nbntype;
}
else if ($servicePlan == "nbn 100") {
	$merge_fields['nbn4'] 		= 'checked';
	$merge_fields['nbntype5'] 	= $nbntype;
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

//if ($sourceChanged == "web_onlineOrderInfo") {
if (true) {
	if ($typeOfADSLService == "adsl lite") {
		$merge_fields['serviceinstalltion2'] = 'Choice2';
		$merge_fields['fnn'] = $fnn;
	}
	else {
		$merge_fields['serviceinstalltion1'] = 'Choice1';
	}
}

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
//$merge_fields['recording'] = $orderNumber;

//var_dump($merge_fields); 

$dealer = "jerry";
//$dealer = "nc-amber";
$dealerFirstThree = "";
if (!empty($dealer)) {
	$dealerFirstThree = strtolower(substr($dealer, 0, 3));
}
if (!empty($dealer) && $dealerFirstThree == "nc-") {
	$filepath = "AgentApplication-Form";
}
else {
	$filepath = "NetCube_Application_form";
	$filepath = "Due-diligence-template";
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
	$result 		= $api->sendDocument($document);
	//var_dump((array)$result);
	$documentKey	= $result->documentKeys->DocumentKey->documentKey;
	if (!empty($sourceChanged) && !$found){
		$temp_array = array();
		$temp_array = (array)$result->documentKeys->DocumentKey;
		$temp_array['source'] = "$sourceChanged decreases to emersion";
		$json	 	= json_encode($temp_array);
	} 
	else {
		$json	 	= json_encode(
						(array)$result->documentKeys->DocumentKey
					);
	}
	$returnInfo		= $json;
	
	echo "source: $source<br>";
	echo "sourceChanged: $sourceChanged<br>";
	echo "table_documentKey: $table_documentKey<br>";
	echo "table_documentKeySync: $table_documentKeySync<br>";
	echo "table_documentStatus: $table_documentStatus<br>";
	
	if ($source == "web_onlineOrderInfo" && !is_null($table_documentKey) && !empty($table_documentKey) && ($table_documentStatus=="OUT_FOR_SIGNATURE" || $table_documentStatus=="OUT_FOR_APPROVAL") ) {
		if (is_null($table_documentKeySync) || empty($table_documentKeySync)) {
			$web_due_diligence_table = Array (
					"orderNumber" 		=> $orderNumber,
					"source" 			=> $source,
					"documentKeySync" 	=> $documentKey,
					"syncStatus" 		=> "ok",
					"syncInfoJson"		=> $json
			);
		}
		else {
			$web_due_diligence_table = Array (
					"orderNumber" 		=> $orderNumber,
					"source" 			=> $source
			);
		}
	}
	else {
		$web_due_diligence_table = Array (
				"orderNumber" 	=> $orderNumber,
				"source" 		=> $source,
				"documentKey" 	=> $documentKey,
				"syncStatus" 	=> "ok",
				"syncInfoJson"	=> $json
		);
	}
	//var_dump($web_due_diligence_table);
	$netcubehub_db			-> where("emersionId", $emersionId);
	$netcubehub_db			-> update($table_name, $web_due_diligence_table );
}
catch(Exception $e){
	$json  		= json_encode(
					array(
							"error"		=> $e->getMessage(),
							"message"	=> $message
					)
				);
	$returnInfo	= "($emersionId/$firstName $lastName/$emersionStatus) " . $e->getMessage();
	$web_due_diligence_table = Array (
			"source" 		=> $source,
			"syncStatus" 	=> "nok",
			"syncInfoJson"	=> $json
	);
	$netcubehub_db			-> where("emersionId", $emersionId);
	$netcubehub_db			-> update($table_name, $web_due_diligence_table );
}


$message .= "</pre>";
$message .= "<h2 id='result' name='result'>" . $returnInfo . "</h2>";
echo $message;
?>