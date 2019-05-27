<?php
require 'connect.php';
class DB_Function{
	
	private $connection;
	
	function __construct() {
		$test=new DB_Connect();
		$this->connection=$test->getConnection();
		//var_dump($test->getConnection());
		
		//var_dump($this->connection);
		
	}
	
	function addUser($name,$password,$status){
		
		$pass=md5($password);
		
		if($stmt = $this->connection->prepare("INSERT INTO Users(userName,pass,status) values(?,?,?)"))
			{
				
			$t=$stmt->bind_param("sss", $name,$pass,$status);
			$result = $stmt->execute();
			$stmt->close();
			//var_dump($result);
		}
		
		return  $result;
	}

	function changeOperatorPassword($inputChangeOperatorPasswordID,$inputChangeOperatorPasswordPassword){
	
		$pass=md5($inputChangeOperatorPasswordPassword);
	
		if($stmt = $this->connection->prepare("UPDATE Users SET pass = ? where UserNameID = ?"))
		{
	
			$t=$stmt->bind_param("ss",$pass,$inputChangeOperatorPasswordID);
			$result = $stmt->execute();
			$stmt->close();
			//var_dump($result);
		}
	
		return  $result;
	}
	
	function changeOperatorStatus($inputChangeOperatorStatusID,$inputFromOperatorStatusList){
	
		if($stmt = $this->connection->prepare("UPDATE Users SET status = ? where UserNameID = ?"))
		{
	
			$t=$stmt->bind_param("ss",$inputFromOperatorStatusList,$inputChangeOperatorStatusID);
			$result = $stmt->execute();
			$stmt->close();
			//var_dump($result);
		}
	
		return  $result;
	}
	
	function checkUser($name,$password){
		
		$pa = md5($password);
		
		if($stmt = $this->connection->prepare("SELECT pass,status FROM Users WHERE userName = ?"))
		{
			$t=$stmt->bind_param("s", $name);
			$stmt->execute();
			$stmt->bind_result($result,$status);
			if (!$stmt->fetch()) {
				return "not existing account";
			}
			
			if($pa==$result){
				if ($status=="valid") {
					return $status;
				}
				else {
					return $status . " account";
				}
				
			}
			else{
				return "wrong password";
			}
			$stmt->close();
		}
		else{
			return "database error";
		}
	}
		
	function readTransactionHistory($name){
		
		if($stmt = $this->connection->prepare("SELECT orderID,name,bank_bsb,bank_account,bank_desc,amount,tag,operator,operatedAt,bankLoginNameID,bankLoginName,result,timestamp FROM bank_orders,bank_accounts WHERE bank_accounts.ID = bank_orders.bankLoginNameID AND bank_orders.operator = ? order by orderID desc"))
		{
			$res=array();
			$t=$stmt->bind_param("s", $name);
			$stmt->execute();
			$stmt->bind_result($orderID,$name,$bank_bsb,$bank_account,$bank_desc,$amount,$tag,$operator,$operatedAt,$bankLoginNameID,$bankLoginName,$result,$timestamp);
			while($stmt->fetch())
			{
				$temp=array();
				$temp["orderID"]=$orderID;
				$temp["name"]=$name;
				$temp["bank_bsb"]=$bank_bsb;
				$temp["bank_account"]=$bank_account;
				$temp["bank_desc"]=$bank_desc;
				$temp["amount"]=$amount;
				$temp["tag"]=$tag;
				$temp["operator"]=$operator;
				$temp["operatedAt"]=$operatedAt;
				$temp["bankLoginNameID"]=$bankLoginNameID;
				$temp["bankLoginName"]=$bankLoginName;
				$temp["result"]=$result;
				$temp["timestamp"]=$timestamp;
				array_push($res,$temp);
			}
			return $res;
		}
	}		
	
	
	function getCurrentOperators($name){
	
		if($stmt = $this->connection->prepare("SELECT UserNameID,userName,status FROM Users order by UserNameID desc"))
		{
			$res=array();
			$stmt->execute();
			$stmt->bind_result($UserNameID,$userName,$status);
			while($stmt->fetch())
			{
				$temp=array();
				$temp["UserNameID"]=$UserNameID;
				$temp["userName"]=$userName;
				$temp["status"]=$status;
				array_push($res,$temp);
			}
			return $res;
		}
	}
	
	function getCurrentBankAccounts($name){
	
		if($stmt = $this->connection->prepare("SELECT ID,bankLoginName,bankUserName,IMEI,bankStatus FROM bank_accounts order by ID desc"))
		{
			$res=array();
			$stmt->execute();
			$stmt->bind_result($ID,$bankLoginName,$bankUserName,$IMEI,$bankStatus);
			while($stmt->fetch())
			{
				$temp=array();
				$temp["ID"]=$ID;
				$temp["bankLoginName"]=$bankLoginName;
				$temp["bankUserName"]=$bankUserName;
				$temp["IMEI"]=$IMEI;
				$temp["bankStatus"]=$bankStatus;
				array_push($res,$temp);
			}
			return $res;
		}
	}
	
	function changeBankAccountStatus($inputChangeStatusBankAccountLoginID,$inputChangeStatusBankAccountStatus){
	
		if($stmt = $this->connection->prepare("UPDATE bank_accounts SET bankStatus = ? where ID = ?"))
		{
	
			$t=$stmt->bind_param("ss",$inputChangeStatusBankAccountStatus,$inputChangeStatusBankAccountLoginID);
			$result = $stmt->execute();
			$stmt->close();
			//var_dump($result);
		}
		return  $result;
	}
	
	function generateNewBankAccount($inputBankAccountLogin,$inputBankUserName,$inputBankAccountPassword,$inputBankMobileIMEI,$inputBankAccountStatus){
	
		if($stmt = $this->connection->prepare("INSERT INTO bank_accounts(bankLoginName,bankUserName,bankLoginPassword,IMEI,bankStatus) values(?,?,?,?,?)"))
		{
	
			$t=$stmt->bind_param("sssss", $inputBankAccountLogin,$inputBankUserName,$inputBankAccountPassword,$inputBankMobileIMEI,$inputBankAccountStatus);
			$result = $stmt->execute();
			$stmt->close();
			//var_dump($result);
		}
	
		return  $result;
	}
	
}

?>