<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html; charset=UTF-8");
error_reporting(E_ALL & ~E_NOTICE);
?>

<?php
require_once("../../api/etc/configuration.php");

$action = $_REQUEST['action'];
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$code = $_REQUEST['code'];
if (empty($code) || $code=="Promo Code: CASHBACK") {
	$code= "CASHBACK";
}

setcookie("savelandingemail", $email, time() + (86400 * 30), "/");

if($action == "check")	{
	if (LandpageSept::checkPhoneAndEmail($phone,$email)) {
		/*
		print "<script>alert(\"Email and/or phone number already taken in checking, please try again\");</script>";
		print "<script>history.back()</script>";*/
		echo "landpageSeptCheck.php: Email and/or phone number already taken";
		exit;
	}
	else {
		echo "landpageSeptCheck.php: Phone or E-mail did not exist";
		exit;
	}
}
?>