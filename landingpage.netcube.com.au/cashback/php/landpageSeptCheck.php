<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html; charset=UTF-8");
error_reporting(E_ALL & ~E_NOTICE);
?>

<?php
require_once("../../../api/etc/configuration.php");

$action = trim($_REQUEST['action']);
$name = trim($_REQUEST['name']);
$phone = trim($_REQUEST['phone']);
$email = trim($_REQUEST['email']);
$code = trim($_REQUEST['code']);
if (empty($code)) {
	$code= "CASHBACK";
}


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