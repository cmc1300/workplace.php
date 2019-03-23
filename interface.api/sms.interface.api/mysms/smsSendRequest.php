<?php
/*
 * http://api.netcube.com.au/projects/netcube/sms/mysms/smsSendRequest.php?
 * customer=boson.huang&outlet=remotesms&recipient=61467741379&message=Test from NetCube 测试中文 as a test
 * customer=boson.huang&outlet=remotesms&recipient=8615900862521&message=Test from NetCube 测试中文 as a test
 * customer=boson.huang&outlet=sms&recipient=61467741379&message=Test from NetCube 测试中文 as a test
 * customer=boson.huang&outlet=message&recipient=61467741379&message=Test from NetCube 测试中文 as a test
 * customer=boson.huang&recipient=61467741379&message=Test from NetCube 测试中文 as a test
 * 
 * https://api.mysms.com/resource_UserEndpoint.html
 * https://api.mysms.com/resource_SmsEndpoint.html
 * https://api.mysms.com/resource_MessageEndpoint.html
 * https://api.mysms.com/json/message/send?api_key=t6G2GixdXnHpDbX9XaoCgw&msisdn=61478655883&password=950254&recipient=61467741379&message=Test from NetCube 测试中文 as a test
 */
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

$recipient 				= "";
if (isset($_REQUEST['recipient']) && !empty($_REQUEST['recipient'])) {
	$recipient			= trim($_REQUEST['recipient']);
}
else {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "Failed to get mandatory parameter recipient";
	echo json_encode ( $ret );	die ();
}

$message 				= "";
if (isset($_REQUEST['message']) && !empty($_REQUEST['message'])) {
	$message			= trim($_REQUEST['message']);
}
else {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "Failed to get mandatory parameter message";
	echo json_encode ( $ret );	die ();
}

$outlet 				= "";
if (isset($_REQUEST['outlet']) && !empty($_REQUEST['outlet'])) {
	$outlet				= strtolower(trim($_REQUEST['outlet']));
	if ($outlet != "remotesms" && $outlet != "sms" && $outlet != "message") {
		$ret ['result'] 	= "NOK";
		$ret ['info'] 		= "Parameter outlet should be remotesms, sms or message";
		echo json_encode ( $ret );	die ();
	}
	
}

$aapt['customer'] 		= $customer;
$result_url				= "http://api.netcube.com.au/projects/netcube/sms/mysms/authenticate_customer.php";
$ch 					= curl_init();
curl_setopt($ch,CURLOPT_URL,$result_url );
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $aapt);
$output 				= curl_exec($ch);
$returnArray 			= json_decode($output, true);
if ($returnArray['result'] != "OK") {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= trim($returnArray['info']);
	echo json_encode ( $ret );	die ();
}


$apiKey					= trim($returnArray['sms']['apiKey']);
$msisdn					= trim($returnArray['sms']['msisdn']);
$password				= trim($returnArray['sms']['password']);
//echo "apiKey: $apiKey <br>msisdn: $msisdn <br>password: $password <br>recipient: $recipient <br>message: $message <br>"; die;


include_once('class.mysms.php');
$api_key 				= $apiKey;
$login_data 			= array('msisdn' => $msisdn, 'password' => $password);
$mysms 					= new mysms($api_key);

/*		*/
$login 					= $mysms->ApiCall('json', '/user/login', $login_data);  //providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data
$user_array				= json_decode($login, true); //decode json string to get AuthToken
//echo "<pre>"; var_dump(json_decode($login, true)); echo "</pre>"; die;
$errorCode				= $user_array['errorCode'];
if (!empty($errorCode)) {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "$msisdn failed to be authenticated by mysms with errorCode($errorCode)";
	echo json_encode ( $ret );	die ();
}


if (empty($outlet) || $outlet == "remotesms") {
	$AuthToken 				= $user_array['authToken'];
	$service_data = array(
			"recipients" 	=> [ "+" . $recipient ],
			"message" 		=> $message,
			//"encoding" 		=> "",
			"store" 		=> true,
			"smsConnectorId"=> 0,
			"authToken" 	=> $AuthToken,
			"apiKey" 		=> $api_key
	);
	//echo "<pre>"; var_dump($service_data); echo "</pre>";
	//providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data
	$service 				= $mysms->ApiCall('json', '/remote/sms/send', $service_data);
	//echo $service . "<br>"; //die;
	$service_array 			= json_decode($service, true);
	$errorCode				= $service_array['errorCode'];
	if (empty($errorCode)) {
		$ret ['result'] 	= "OK";
		$ret ['outlet'] 	= "remotesms";
		$ret ['info'] 		= "Text has been sent successfully to +$recipient as mysms remotesms";
		$ret ['remote'] 	= $service_array;
		echo json_encode ( $ret );	die ();
	}
	else if ($outlet == "remotesms") {
		$ret ['result'] 	= "NOK";
		$ret ['info'] 		= "Text failed to be sent to +$recipient with errorCode($errorCode)";
		echo json_encode ( $ret );	die ();
	}
}


if (empty($outlet) || $outlet == "sms") {
	$AuthToken 				= $user_array['authToken'];
	$service_data = array(
			"recipients" 	=> [ $recipient ],
			"message" 		=> $message,
			"encoding" 		=> "",
			"cod" 			=> false,
			"deviceId" 		=> "",
			"test" 			=> false,
			"authToken" 	=> $AuthToken,
			"apiKey" 		=> $api_key
	);
	//echo "<pre>"; var_dump($service_data); echo "</pre>";
	//providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data
	$service 				= $mysms->ApiCall('json', '/sms/send', $service_data);  
	$service_array 			= json_decode($service, true);
	$errorCode				= $service_array['errorCode'];
	if (empty($errorCode)) {
		$ret ['result'] 	= "OK";
		$ret ['outlet'] 	= "sms";
		$ret ['info'] 		= "Text has been sent successfully to $recipient as mysms sms";
		echo json_encode ( $ret );	die ();
	}
	else if ($outlet == "sms") {
		$ret ['result'] 	= "NOK";
		$ret ['info'] 		= "Text failed to be sent to $recipient with errorCode($errorCode)";
		echo json_encode ( $ret );	die ();
	}
}


$service_data 			= array(
		"recipient" 	=> $recipient,
		"message" 		=> $message,
		"msisdn" 		=> $msisdn,
		"password" 		=> $password,
		"apiKey" 		=> $api_key
);
//echo "<pre>"; var_dump($service_data); echo "</pre>";
//providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data
$service 				= $mysms->ApiCall('json', '/message/send', $service_data);
$service_array 			= json_decode($service, true);
$errorCode				= $service_array['errorCode'];
if (empty($errorCode)) {
	$ret ['result'] 	= "OK";
	$ret ['outlet'] 	= "message";
	$ret ['info'] 		= "Text has been sent successfully to $recipient as mysms message";
	echo json_encode ( $ret );	die ();
}
else {
	$ret ['result'] 	= "NOK";
	$ret ['info'] 		= "Text failed to be sent to $recipient with errorCode($errorCode)";
	echo json_encode ( $ret );	die ();
}

?>