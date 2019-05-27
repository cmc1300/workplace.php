<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html; charset=UTF-8");

function sendEmail($name,$phone,$email,$code,$message){
	$email_message='
				<html>
					<head>
						<title>Google Landing New Sign Ups</title>
					</head>
					<body>
						Hi Team,<br/><br/>' .
						'Please follow up with a call to the following sign up on the Google Landing Page Cash Back<br/><br/>
						<table style=\"border:1px solid black;text-align:left\"> '. displayInfo($name,$phone,$email,$code) .' </table>
						Customer message: ' . $message . '
						<br /><br />
						Regards<br/>
					</body>
				</html>
				';
	/*	Modified on Apr 1, 2015
	$email_to = 'sales@netcube.com.au,antonio.diiorio@netcube.com.au,j.woo@netcube.com.au,noorul.sabha@netcube.com.au,senna.mansour@netcube.com.au,natasha.ivanovska@netcube.com.au,m.lim@netcube.com.au,jerry.xu@netcube.com.au';
	*/
	$email_to = 'sales@netcube.com.au,antonio.diiorio@netcube.com.au,noorul.sabha@netcube.com.au,natasha.ivanovska@netcube.com.au,eric.liang@netcube.com.au,eram@netcube.com.au,lucy@netcube.com.au,boson.huang@novatel.com.au,jerry.xu@netcube.com.au';
	//$email_to = 'jerry.xu@netcube.com.au';
	$email_subject  = "NetCube Landing Page 2015 Cash Back New Sign Up";
	$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: noreply<noreply@netcube.com.au>' . "\r\n";
	$headers .= "Reply-To: ". strip_tags('noreply@netcube.com.au') . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
	$i=@mail($email_to, $email_subject, $email_message, $headers);
}

function sendReply($name,$email){
	$email_message='
				<html>
					<head>
						<title>Netcube Internet Cashback Offer</title>
					</head>
					<body>
						Hi ' . $name . ',<br/><br/>' .
						'thanks for your query. <br/><br/>
						One of our sales consultants will be in touch with you shortly. if you have any enquiries you can also contact us on 1300 58 68 78 within the below business hours.<br/><br/>
						Monday to Friday 9am to 8pm<br />
						Saturday 10am to 6pm<br /><br />
						kind Regards<br /><br />
						Antonio Di Iorio<br/>
						National Sales Manager<br/>
					</body>
				</html>
				';
	$email_to = $email;// . ',jerry.xu@netcube.com.au';
	$email_subject  = "Netcube Internet Cashback Offer";
	$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: noreply<noreply@netcube.com.au>' . "\r\n";
	$headers .= "Reply-To: ". strip_tags('noreply@netcube.com.au') . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
	$i=@mail($email_to, $email_subject, $email_message, $headers);
}

function displayInfo($name,$phone,$email,$code) {
		
	$returnString  = "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Client Name</td><td style=\"border:1px solid black;text-align:left\">" . "'" . $name . "'" . "</td></tr>";
	$returnString .= "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Mobile</td><td style=\"border:1px solid black;text-align:left\">" . "'" . $phone . "'" . "</td></tr>";
	$returnString .= "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Email</td><td style=\"border:1px solid black;text-align:left\">" . "'" . $email . "'" . "</td></tr>";
	$returnString .= "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Code</td><td style=\"border:1px solid black;text-align:left\">" . "'" . $code . "'" . "</td></tr>";
	return $returnString;
}
?>

<?php
require_once("../../api/etc/configuration.php");

$action = $_REQUEST['action'];
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$code = $_REQUEST['code'];
$message = "";
if (!empty($_REQUEST['message'])) {
	$message = $_REQUEST['message'];
}
if (empty($code) || $code=="Promo Code: CASHBACK") {
	$code= "CASHBACK";
}

if($action == "add"){
	if (LandpageSept::checkPhoneAndEmail($phone,$email)) {
		print "<script>alert(\"Email and/or phone number already taken, please try again\");</script>";
		print "<script>history.back()</script>";
		exit;
	}
	else if(LandpageSept::addLandpage($name,$phone,$email,$code,$adminUserID)) {
		sendEmail($name,$phone,$email,$code,$message);
		sendReply($name,$email);
	}
}
?>
 
<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	document.form1.submit();
	//alert("Thank you for selecting NetCube. \n\nOur sales team will be in contact with you soon to complete the sign up.");
});
</script>
</head>

<body>

<form method="post" action="http://mynewsletter.asia/form.php?form=13" id="form1" name="form1">
<input type="hidden" name="email" value="<?php print $email; ?>" />
<input type="hidden" name="format" value="h" />
<input type="hidden" name="CustomFields[2]" value="<?php print $name; ?>">
<input type="hidden" name="CustomFields[4]" value="<?php print $phone; ?>">
<input type="hidden" name="CustomFields[9]" value="<?php print $code; ?>">
</form>

</body>
</html>