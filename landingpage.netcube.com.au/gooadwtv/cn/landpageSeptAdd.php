<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html; charset=UTF-8");

function sendEmail($name,$phone,$email,$code){
	$email_message='
				<html>
					<head>
						<title>Google Landing New Sign Ups</title>
					</head>
					<body>
						Hi Team,<br/><br/>' .
						'Please follow up with a call to the following sign up on the Google Landing Page<br/><br/>
						<table style=\"border:1px solid black;text-align:left\"> '. displayInfo($name,$phone,$email,$code) .' </table>
						<br />
						Regards<br/>
					</body>
				</html>
				';
	$email_to = 'sales@netcube.com.au,antonio.diiorio@netcube.com.au,j.woo@netcube.com.au,noorul.sabha@netcube.com.au,senna.mansour@netcube.com.au,natasha.ivanovska@netcube.com.au,m.lim@netcube.com.au,jerry.xu@netcube.com.au';
	//$email_to = 'antonio.diiorio@netcube.com.au,jerry.xu@netcube.com.au';
	$email_subject  = "NetCube Landing Page Oct, 2014 New Sign Up";
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
require_once("../../../api/etc/configuration.php");

$action = $_REQUEST['action'];
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$code = $_REQUEST['code'];
if (empty($code) || $code=="促销代码: GOOADWTV") {
	$code= "GOOADWTV";
}

if($action == "add"){
	if (LandpageSept::checkPhoneAndEmail($phone,$email)) {
		print "<script>alert(\"Email and/or phone number already taken, please try again\");</script>";
		print "<script>history.back()</script>";
		exit;
	}
	else if(LandpageSept::addLandpage($name,$phone,$email,$code,$adminUserID)) {
		sendEmail($name,$phone,$email,$code);
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