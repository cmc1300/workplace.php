<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html; charset=UTF-8");

function sendDealerEmail($name,$phone,$email,$code){
	$email_message='
				<html>
					<head>
						<title>NetCube Google landing New Sign Ups</title>
					</head>
					<body>
						Hi Team,<br/><br/>' .
						'Please follow up with a call to the following sign up on the Google Landing Page<br/><br/>
						<table style=\"border:1px solid black;text-align:left\"> '. displayDealerInfo($name,$phone,$email,$code) .' </table>
						<br />
						Regards<br/>
					</body>
				</html>
				';
	//$email_to = 'sales@netcube.com.au,antonio.diiorio@netcube.com.au,john.mila@netcube.com.au,jerry.xu@netcube.com.au';
	$email_to = 'antonio.diiorio@netcube.com.au,jerry.xu@netcube.com.au';
	$email_subject  = "NetCube Google landing New Sign Ups";
	$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: noreply<noreply@netcube.com.au>' . "\r\n";
	$headers .= "Reply-To: ". strip_tags('noreply@netcube.com.au') . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
	$i=@mail($email_to, $email_subject, $email_message, $headers);
}

function displayDealerInfo($name,$phone,$email,$code) {
		
	$returnString  = "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Client Name</td><td style=\"border:1px solid black;text-align:left\">" . $name . "</td></tr>";
	$returnString .= "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Mobile</td><td style=\"border:1px solid black;text-align:left\">" . $phone . "</td></tr>";
	$returnString .= "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Email</td><td style=\"border:1px solid black;text-align:left\">" . $email . "</td></tr>";
	$returnString .= "<tr style=\"border:1px solid black;text-align:left\">" . "<td style=\"border:1px solid black;text-align:left\">Code</td><td style=\"border:1px solid black;text-align:left\">" . $code . "</td></tr>";
	return $returnString;
}
?>

<?php
require_once("../etc/configuration.php");

$action = $_REQUEST['action'];
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$code = $_REQUEST['code'];
if (empty($code)) {
	$code= "GOOADW";
}

if($action == "add"){
	if (Landpage::checkPhoneAndEmail($phone,$email)) {
		$msg = "<h3 style=\"color: green\">Phone or E-mail has already existed</h3>";
	}
	else if(Landpage::addLandpage($name,$phone,$email,$code,$adminUserID)) {
		sendDealerEmail($name,$phone,$email,$code);
		$msg = "<h3 style=\"color: green\">Information has been added successfully</h3>";
	} else {
		$msg = "<h3 style=\"color: red\">Information hasn't been added</h3>";
	}
}

 print $msg; 
 ?>
 
<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	document.form1.submit();
	alert("Thank you for selecting NetCube. \n\nOur sales team will be in contact with you soon to complete the sign up.");
});
</script>

</head>

<body>
<form method="post" action="http://mynewsletter.asia/form.php?form=11" id="form1" name="form1">
<input type="hidden" name="email" value="<?php print $email; ?>" />
<input type="hidden" name="format" value="h" />
<input type="hidden" name="CustomFields[2]" id="CustomFields_2_11" value="<?php print $name; ?>">
<input type="hidden" name="CustomFields[4]" id="CustomFields_4_11" value="<?php print $phone; ?>">
<input type="hidden" name="CustomFields[9]" id="CustomFields_9_11" value="<?php print $code; ?>">
</form>
</body>
</html>