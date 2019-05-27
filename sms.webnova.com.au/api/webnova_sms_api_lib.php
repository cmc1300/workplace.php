<?php 
$method=$_REQUEST["method"];
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
$mobile=$_REQUEST["mobile"];
$api_id=$_REQUEST["api_id"];
$text=$_REQUEST["text"];
$post_data = array(
    'method' => $method,
    'username' => $username,
    'password' =>$password,
	'mobile' => $mobile,
	'api_id' => $api_id,
	'text' =>$text
);
$url="http://sms.webnova.com.au/api/sendMessage.php";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url );  
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);     
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$output = curl_exec($ch);
if ($output === FALSE) {
    $output="cURL Error: " . curl_error($ch);
}
curl_close($ch);
print_r ($output);
?>