<?php 
$method=$_REQUEST["method"];
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
$mobile=$_REQUEST["mobile"];
$api_id=$_REQUEST["api_id"];
$text=$_REQUEST["text"];
/*
$method="sendMessages";
$username="abc";
$password="123456";
$mobile="61434276021,61433020613,61430577027,61411808859,61430989141,61430068863,61425824048,61433700779,+61430221612,61433309119,61478760441,61452190370,61430352423,61430780074,61413028909,61430882790,61401770996,61425677740,61430374014,61420651282,61434517518,61420488478,61425422698,61433653195,61430810510,61433135618,61425890822,61433410604,61422423572,61425232308,61433077994,61430736321,61425551088,61430220778,04308362821,61401304765,61425609128,61425001515,61431103140,61434039102,61433195678,61425697193,61402242032,61425329518,61430335880,61433986336,61433011250,61430870127,61430933799,61425551311,61434276021,61433020613,61430577027,61411808859,61430989141,61430068863,61425824048,61433700779,+61430221612,61433309119,61478760441,61452190370,61430352423,61430780074,61413028909,61430882790,61401770996,61425677740,61430374014,61420651282,61434517518,61420488478,61425422698,61433653195,61430810510,61433135618,61425890822,61433410604,61422423572,61425232308,61433077994,61430736321,61425551088,61430220778,04308362821,61401304765,61425609128,61425001515,61431103140,61434039102,61433195678,61425697193,61402242032,61425329518,61430335880,61433986336,61433011250,61430870127,61430933799,61425551311";
$api_id="8";
$text="12312312312321";
*/
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
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1); 
// ������POST����Ŷ��
curl_setopt($ch, CURLOPT_POST, 1);
// ��post�ı�������
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$output = curl_exec($ch);
//����ʹ��
if ($output === FALSE) {
    $output="cURL Error: " . curl_error($ch);
}

curl_close($ch);
echo ($output);
?>