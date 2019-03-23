
<?php

/*
 * http://api.netcube.com.au/projects/netcube/sms/test.php
 */

//include mysms class
include_once('class.mysms.php');

//API Key
$api_key = 'Z5oOQg0SDu8xiWkicXr-ew';

//initialize class with apiKey and AuthToken(if available)
$mysms = new mysms($api_key);

//lets login user to get AuthToken
$login_data = array('msisdn' => '61456888988', 'password' => '8333');

$login = $mysms->ApiCall('json', '/user/login', $login_data);  //providing REST type(json/xml), resource from http://api.mysms.com/index.html and POST data

print $login;  //debug login data

$user_info = json_decode($login); //decode json string to get AuthToken

$AuthToken = $user_info->authToken;

?>