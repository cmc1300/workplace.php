<?php
//var_dump($_REQUEST);
//var_dump($_SERVER);
session_start();
require 'etc/configuration.php';
$action = $_REQUEST["action"];

function encrypt($message) {
	$secretKey = "Encrypt with PHP Decrypt with Java";
	$initialVector = "0123456789123456";
	
	return base64_encode(
			mcrypt_encrypt(
					MCRYPT_RIJNDAEL_128,
					md5($secretKey),
					$message,
					MCRYPT_MODE_CFB,
					$initialVector
			)
	);
}

if ($action == "WriteTransactionToTableOrders") {
	$inputClientName 		= $_REQUEST["inputClientName"];
	$inputBankBSB 			= $_REQUEST["inputBankBSB"];
	$inputBankAccount 		= $_REQUEST["inputBankAccount"];
	$inputBankComments		= $_REQUEST["inputBankComments"];
	$inputAmount 			= $_REQUEST["inputAmount"];
	$inputFromBankAccount	= $_REQUEST["inputFromBankAccount"];
	$InputLoginName 		= $_REQUEST["InputLoginName"];
	$InputComputerName 		= $_REQUEST["InputComputerName"];
	
	// Create connection
	$con = new mysqli("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql = "INSERT INTO bank_orders (name, bank_bsb, bank_account, bank_desc, amount, tag, operator, operatedAt, bankLoginNameID)
	VALUES ('$inputClientName', '$inputBankBSB', '$inputBankAccount', '$inputBankComments', '$inputAmount', 'new', '$InputLoginName', '$InputComputerName', $inputFromBankAccount)";
	
	/*		*/
	if (mysqli_query($con,$sql)) {
		echo "Order " . mysqli_insert_id($con) . " is waiting in queue";
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_connect_error();
	}
	
	mysqli_close($con);
}
else if ($action == "checkOperatorPassword") {
	$Username 	= $_REQUEST["Username"];
	$Password 	= $_REQUEST["Password"];

	$db=new DB_Function();
	$result = $db->checkUser($Username, $Password);
	if($result == "valid"){
		$_SESSION['activeLoginUser'] = $Username;
	}
	echo $result;
}
else if ($action == "checkOrderStatus") {
	$orderID 		= $_REQUEST["orderID"];

	// Create connection
	$con = new mysqli("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql = "select * from bank_orders where orderID = '$orderID'";
	
	/*		*/
	if ($result=mysqli_query($con,$sql)) {
		$row=mysqli_fetch_assoc($result);
		echo json_encode($row);
	} 
	
	mysqli_close($con);
}
else if ($action == "generateNewOperatorAccount") {
	$inputOperatorName 					= $_REQUEST["inputOperatorName"];
	$inputOperatorPassword 				= $_REQUEST["inputOperatorPassword"];
	$inputCreateFromOperatorStatusList 	= $_REQUEST["inputCreateFromOperatorStatusList"];
	
	$db=new DB_Function();
	$result = $db->addUser($inputOperatorName,$inputOperatorPassword,$inputCreateFromOperatorStatusList);
	if ($result) {
		echo "Operator " . $inputOperatorName . " has been created successfully";
	}
}
else if ($action == "changeOperatorPassword") {
	$inputChangeOperatorPasswordName 		= $_REQUEST["inputChangeOperatorPasswordName"];
	$inputChangeOperatorPasswordID 			= $_REQUEST["inputChangeOperatorPasswordID"];
	$inputChangeOperatorPasswordPassword 	= $_REQUEST["inputChangeOperatorPasswordPassword"];
	
	$db=new DB_Function();
	$result = $db->changeOperatorPassword($inputChangeOperatorPasswordID,$inputChangeOperatorPasswordPassword);
	if ($result) {
		echo "Operator ". $inputChangeOperatorPasswordName . "'s Password" . " has been changed successfully";
	}
}
else if ($action == "changeOperatorStatus") {
	$inputChangeOperatorStatusName 	= $_REQUEST["inputChangeOperatorStatusName"];
	$inputChangeOperatorStatusID 	= $_REQUEST["inputChangeOperatorStatusID"];
	$inputFromOperatorStatusList 	= $_REQUEST["inputFromOperatorStatusList"];

	$db=new DB_Function();
	$result = $db->changeOperatorStatus($inputChangeOperatorStatusID,$inputFromOperatorStatusList);
	if ($result) {
		echo "Operator " . $inputChangeOperatorStatusName . " status has been changed to " . $inputFromOperatorStatusList . " successfully";
	}
}
else if ($action == "setBankAccount") {
	$inputChangeBankAccountID 		= $_REQUEST["inputChangeBankAccountID"];

	// Create connection
	$con = new mysqli("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql = "select * from userBankAccounts where userNameID = '$inputChangeBankAccountID'";

	/*		*/
	$res=array();
	if ($result=mysqli_query($con,$sql)) {
		while ($row=mysqli_fetch_assoc($result)) {
			array_push($res,$row['bankLoginNameID']);
		}		
		echo json_encode($res);
	}

	mysqli_close($con);
}
else if ($action == "changeBankAccount") {
	$inputChangeBankAccountName 	= $_REQUEST["inputChangeBankAccountName"];
	$inputChangeBankAccountID 		= $_REQUEST["inputChangeBankAccountID"];
	$selectedBankAccountID 			= trim($_REQUEST["selectedBankAccountID"]);
	
	/*		*/
	if (!empty($selectedBankAccountID)) {
		$BankAccountIDArray = split(" ", trim($selectedBankAccountID));
	}
	else {
		$BankAccountIDArray = array();
	}

	// Create connection
	$con = new mysqli("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql = "delete from userBankAccounts where userNameID = '$inputChangeBankAccountID'";
	$result=mysqli_query($con,$sql);
	
	$failed = false;
	for ($i=0; $i < count($BankAccountIDArray); $i++) {
		$BankAccountID = $BankAccountIDArray[$i];
		$sql = "insert userBankAccounts ( userNameID,bankLoginNameID) values ('$inputChangeBankAccountID', '$BankAccountID')";
		if (! $result=mysqli_query($con,$sql)) {
			$failed = true;
		}
	}
	if ($failed) {
		echo "Something wrong when updating database tables!";
	}
	else {
		echo "Operator " . $inputChangeBankAccountName . " has been processed successfully";
	}
	
	mysqli_close($con);
}
else if ($action == "generateNewBankAccount") {
	$inputBankAccountLogin 			= $_REQUEST["inputBankAccountLogin"];
	$inputBankUserName 				= $_REQUEST["inputBankUserName"];
	$inputBankAccountPassword 		= $_REQUEST["inputBankAccountPassword"];
	$inputBankMobileIMEI 			= $_REQUEST["inputBankMobileIMEI"];
	$inputBankAccountStatus 		= $_REQUEST["inputBankAccountStatus"];
	
	/*		*/
	$db=new DB_Function();
	$result = $db->generateNewBankAccount($inputBankAccountLogin,$inputBankUserName,encrypt($inputBankAccountPassword),$inputBankMobileIMEI,$inputBankAccountStatus);
	if ($result) {
		echo "Bank account " . $inputBankAccountLogin . " of " . $inputBankUserName . " has been created successfully";
	}
}
else if ($action == "changeBankAccountProfile") {
	$inputChangeProfileBankAccountLoginID 	= $_REQUEST["inputChangeProfileBankAccountLoginID"];
	$inputChangeProfileBankAccountLogin 	= $_REQUEST["inputChangeProfileBankAccountLogin"];
	$inputChangeProfileBankUserName 		= $_REQUEST["inputChangeProfileBankUserName"];
	$inputChangeProfileBankAccountPassword 	= $_REQUEST["inputChangeProfileBankAccountPassword"];
	$inputChangeProfileBankMobileIMEI 		= $_REQUEST["inputChangeProfileBankMobileIMEI"];
	
	// Create connection
	$con = new mysqli("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if (empty($inputChangeProfileBankAccountPassword)) {
		$sql = "UPDATE bank_accounts set bankUserName='$inputChangeProfileBankUserName', IMEI='$inputChangeProfileBankMobileIMEI' where ID = '$inputChangeProfileBankAccountLoginID'";
	}
	else {
		$encrypted = encrypt($inputChangeProfileBankAccountPassword);
		$sql = "UPDATE bank_accounts set bankUserName='$inputChangeProfileBankUserName', IMEI='$inputChangeProfileBankMobileIMEI', bankLoginPassword='$encrypted' where ID = '$inputChangeProfileBankAccountLoginID'";
	}
	
	/*		*/
	if ($result=mysqli_query($con,$sql)) {
		echo "Bank account profile of " . $inputChangeProfileBankAccountLoginID . " has been changed successfully";
	}
	
	mysqli_close($con);

}
else if ($action == "changeBankAccountStatus") {
	$inputChangeStatusBankUserName 			= $_REQUEST["inputChangeStatusBankUserName"];
	$inputChangeStatusBankAccountLoginID 	= $_REQUEST["inputChangeStatusBankAccountLoginID"];
	$inputChangeStatusBankAccountStatus 	= $_REQUEST["inputChangeStatusBankAccountStatus"];

	$db=new DB_Function();
	$result = $db->changeBankAccountStatus($inputChangeStatusBankAccountLoginID,$inputChangeStatusBankAccountStatus);
	if ($result) {
		echo "Bank account of " . $inputChangeStatusBankUserName . " has been changed to " . $inputChangeStatusBankAccountStatus . " successfully";
	}
}
?>