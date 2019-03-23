
<?php

/*
 * https://api.mysms.com/
 * https://api.mysms.com/resource_SmsEndpoint.html
 * http://api.netcube.com.au/projects/netcube/sms/smsSendRequest.php
 * 
 * How do I get API credentials?
 * You need to contact MySMS's dev team sending a mail to dev@mysms.com for API credentials of your MySMS account.
 */

//include mysms class
include_once('class.mysms.php');

//API Key
$api_key = 'Z5oOQg0SDu8xiWkicXr-ew';

//lets login user to get AuthToken
$login_data = array('msisdn' => '61456888988', 'password' => '8333');

//initialize class with apiKey and AuthToken(if available)
$mysms = new mysms($api_key);

$login = $mysms->ApiCall('json', '/user/login', $login_data);  //providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data

print $login;  //debug login data

$user_info = json_decode($login); //decode json string to get AuthToken

$AuthToken = $user_info->authToken;

print "<br><br>";

$service_data = array(
		"recipients" => [ "61467741379", "8615900862521" ],
		"message" => "Test from mysms website API",
		"encoding" => "",
		"cod" => false,
		"deviceId" => "",
		"test" => false,
		"authToken" => $AuthToken,
		"apiKey" => $api_key
);

$service = $mysms->ApiCall('json', '/sms/send', $service_data);  //providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data

print $service;  


?>