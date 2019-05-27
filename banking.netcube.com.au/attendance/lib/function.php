<?php
require 'connect.php';
class DB_Function{
	
	private $connection;
	private $traceBackDays = 365;
	private $traceBackWeeks = 52;
	private $traceBackMonths = 12;
	
	function __construct() {
		$test=new DB_Connect();
		$this->connection=$test->getConnection();
		//var_dump($test->getConnection());
		
		//var_dump($this->connection);
		
	}
	
	function readAccountListingFromDB($name){
	
		$sql = "SELECT ID,name,status FROM account WHERE 1=1 order by ID asc";
		if($stmt = $this->connection->prepare($sql))
		{
			$res=array();
			$stmt->execute();
			$stmt->bind_result($ID,$name,$status);
			while($stmt->fetch())
			{
				$temp=array();
				$temp["ID"]=$ID;
				$temp["name"]=$name;
				$temp["status"]=$status;
				array_push($res,$temp);
			}
			$stmt->close();
			return $res;
		}
	}
	
	function readAttendanceRecordsByName($ID){
	
		$sql = "SELECT ID,accountID,tag,weekday,date,time,comments FROM record WHERE accountID = " . $ID . " order by date desc, time desc LIMIT 50";
		if($stmt = $this->connection->prepare($sql))
		{
			$res=array();
			$stmt->execute();
			$stmt->bind_result($ID,$accountID,$tag,$weekday,$date,$time,$comments);
			while($stmt->fetch())
			{
				$temp=array();
				$temp["ID"]=$ID;
				$temp["accountID"]=$accountID;
				$temp["tag"]=$tag;
				$temp["weekday"]=$weekday;
				$temp["date"]=$date;
				$temp["time"]=$time;
				$temp["comments"]=$comments;
				array_push($res,$temp);
			}
			$stmt->close();
			return $res;
		}
	}
	
	function readFirstLastRecordListingFromDB($inputID,$reportType) {
		
		$functionReturnArray = array();
		
		if ($reportType == 'daily') {
			$currentDateString 	= date("Y") . "-" . date("m") . "-" . date("d");
			$earliestDateString	= "";
			$sql_earliest 	= "SELECT ID,accountID,tag,weekday,date,time,comments FROM record WHERE accountID = " . $inputID . "  order by ID asc limit 1";
			$sql_latest 	= "SELECT ID,accountID,tag,weekday,date,time,comments FROM record WHERE accountID = " . $inputID . "  order by ID desc limit 1";
			
			if($stmt = $this->connection->prepare($sql_latest))	{
				$stmt->execute();
				$stmt->bind_result($ID,$accountID,$tag,$weekday,$date,$time,$comments);
				if($stmt->fetch()) {
					$currentDateString 		= $date;
				}
			}
			$stmt->close();
			if($stmt = $this->connection->prepare($sql_earliest))	{
				$stmt->execute();
				$stmt->bind_result($ID,$accountID,$tag,$weekday,$date,$time,$comments);
				if($stmt->fetch()) {
					$earliestDateString 	= $date;
				}
			}
			$stmt->close();
				
			$dateLoop 			= date_create($currentDateString);
			$loopCount 			= 0;
			while ($loopCount < $this->traceBackDays) {
				$loopCount++;
				$res = array();
				$timeToBeDeducted      = 0;
				$timeToBeDeductedCount = 0;
					
				$sql = "SELECT ID,accountID,tag,weekday,date,time,comments FROM record WHERE accountID = " . $inputID . " AND date = '" . date_format($dateLoop,"Y-m-d") . "'  order by time asc";
				if($stmt = $this->connection->prepare($sql))	{
					$stmt->execute();
					$stmt->bind_result($ID,$accountID,$tag,$weekday,$date,$time,$comments);
					$count = 0;
					while($stmt->fetch())
					{
						$count++;
						$temp["ID"]=$ID;
						$temp["accountID"]=$accountID;
						$temp["tag"]=$tag;
						$temp["weekday"]=$weekday;
						$temp["date"]=$date;
						$temp["time"]=$time;
						$temp["comments"]=$comments;
						array_push($res,$temp);
					}
					$stmt->close();
					
					if ($earliestDateString == $date) {
						$loopCount = $this->traceBackDays + 1;
					}
			
					if ($count == 0) {
						$temp["count"]= 0;
						$temp["weekday"]= date_format($dateLoop,"D");;
						$temp["date"]= date_format($dateLoop,"Y-m-d");
						$temp["first"] = "--";
						$temp["last"] = "--";
						$temp["timeTotal"] = "--";
						$temp["timeNet"] = "--";
						$temp["timeDeduct"] = "--";
						array_push($functionReturnArray,$temp);
					}
					else if ($count == 1) {
						$temp["count"]= 1;
						$temp["weekday"]= date_format($dateLoop,"D");;
						$temp["date"]= date_format($dateLoop,"Y-m-d");
						$temp["first"] = $res[0]['time'];
						$temp["last"] = $res[0]['time'];
						$temp["timeTotal"] = "--";
						$temp["timeNet"] = "--";
						$temp["timeDeduct"] = "--";
						array_push($functionReturnArray,$temp);
					}
					else if ($count >= 2) {
						{
							$previousTag  = $res[0]['tag'];
							$previousTime = $res[0]['time'];
							for ($i=1; $i < sizeof($res); $i++) {
								$currentTag = $res[$i]['tag'];
								$currentTime = $res[$i]['time'];
								if ($previousTag=="Exit" && $currentTag=="Entry") {
									$timeToBeDeducted += strtotime($currentTime) - strtotime($previousTime);
									$timeToBeDeductedCount++;
								}
								$previousTag  = $currentTag;
								$previousTime = $currentTime;
							}
						}
						$temp["count"]= $count;
						$temp["weekday"]= date_format($dateLoop,"D");
						$temp["date"]= date_format($dateLoop,"Y-m-d");
						$temp["first"] = $res[0]['time'];
						$temp["last"] = $res[$count-1]['time'];
						$timeLapse = strtotime($res[$count-1]['time']) - strtotime($res[0]['time']);
						$temp["timeTotal"]  =  $this->convertSecondToTimeString($timeLapse,2);
						$timeLapse = strtotime($res[$count-1]['time']) - strtotime($res[0]['time']) - $timeToBeDeducted;
						$temp["timeNet"]    = $this->convertSecondToTimeString($timeLapse,2);
						if ($timeToBeDeductedCount==0) {
							$temp["timeDeduct"] = "--";
						}
						else {
							$temp["timeDeduct"] = sprintf("%02d", $timeToBeDeductedCount) . "&nbsp;&nbsp;&nbsp;" . $this->convertSecondToTimeString($timeToBeDeducted,2);
						}
						array_push($functionReturnArray,$temp);
					}
				}
				date_sub($dateLoop,date_interval_create_from_date_string("1 days"));
			}
			/*		
			$temp["earliest"]= $earliestDateString;
			$temp["current"]= $currentDateString;
			array_push($functionReturnArray,$temp);
			*/
		}
		else if ($reportType == 'weekly') {
			$currentDateString 		= date("Y") . "-" . date("m") . "-" . date("d");
			$dateLoop 				= date_create($currentDateString);
			$weekEndDay 			= date_format($dateLoop,"Y-m-d");
			$weekFirstDay 			= date_format($dateLoop,"Y-m-d");
			$weekNumberCurrent		= date_format($dateLoop,"W");
			$weekloopCount 			= 1;
			$weekAvailDays			= 0;
			$weekTimeCountInSecond 	= 0;
			$weeklyTimeToBeDeducted      = 0;
			$weeklyTimeToBeDeductedCount = 0;
			
			while ($weekloopCount <= $this->traceBackWeeks) {
				$res = array();
				$weekFirstDay = date_format($dateLoop,"Y-m-d");
				
					
				$sql = "SELECT ID,accountID,tag,weekday,date,time,comments FROM record WHERE accountID = " . $inputID . " AND date = '" . date_format($dateLoop,"Y-m-d") . "'  order by time asc";
				if($stmt = $this->connection->prepare($sql))	{
					$stmt->execute();
					$stmt->bind_result($ID,$accountID,$tag,$weekday,$date,$time,$comments);
					$count = 0;
					while($stmt->fetch())	{
						$count++;
						$temp["ID"]=$ID;
						$temp["accountID"]=$accountID;
						$temp["tag"]=$tag;
						$temp["weekday"]=$weekday;
						$temp["date"]=$date;
						$temp["time"]=$time;
						$temp["comments"]=$comments;
						array_push($res,$temp);
					}
					$stmt->close();
						
					if ($count == 0) {
					}
					else if ($count == 1) {
						$weekAvailDays++;
					}
					else if ($count >= 2) {
						{
							$previousTag  = $res[0]['tag'];
							$previousTime = $res[0]['time'];
							for ($i=1; $i < sizeof($res); $i++) {
								$currentTag = $res[$i]['tag'];
								$currentTime = $res[$i]['time'];
								if ($previousTag=="Exit" && $currentTag=="Entry") {
									$weeklyTimeToBeDeducted += strtotime($currentTime) - strtotime($previousTime);
									$weeklyTimeToBeDeductedCount++;
								}
								$previousTag  = $currentTag;
								$previousTime = $currentTime;
							}
						}
						$weekAvailDays++;
						$temp["first"] = $res[0]['time'];
						$temp["last"] = $res[$count-1]['time'];
						$timeLapse = strtotime($res[$count-1]['time']) - strtotime($res[0]['time']);
						$weekTimeCountInSecond = $weekTimeCountInSecond + $timeLapse;
					}
					date_sub($dateLoop,date_interval_create_from_date_string("1 days"));
					if ($weekNumberCurrent != date_format($dateLoop,"W")) {
						$temp["week"]			= $weekNumberCurrent;
						$temp["active"]			= $weekAvailDays;
						$temp["weekFirstDay"] 	= $weekFirstDay;
						$temp["weekEndDay"] 	= $weekEndDay;
						$temp["timeTotal"] 		= $this->convertSecondToTimeString($weekTimeCountInSecond,2);
						$timeLapse 				= $weekTimeCountInSecond - $weeklyTimeToBeDeducted;
						$temp["timeNet"] 		= $this->convertSecondToTimeString($timeLapse,2);
						if ($weeklyTimeToBeDeductedCount==0) {
							$temp["timeDeduct"] = "--";
						}
						else {
							$temp["timeDeduct"] 	= sprintf("%02d", $weeklyTimeToBeDeductedCount) . "&nbsp;&nbsp;&nbsp;" . $this->convertSecondToTimeString($weeklyTimeToBeDeducted,2);
						}
						array_push($functionReturnArray,$temp);
						$weekloopCount ++;
						$weekNumberCurrent = date_format($dateLoop,"W");
						$weekEndDay = date_format($dateLoop,"Y-m-d");
						$weekTimeCountInSecond 			= 0;
						$weekAvailDays 					= 0;
						$weeklyTimeToBeDeducted      	= 0;
						$weeklyTimeToBeDeductedCount 	= 0;
					}
				}
			}
		}
		else if ($reportType == 'monthly') {
			$currentDateString 			= date("Y") . "-" . date("m") . "-" . date("d");
			$dateLoop 					= date_create($currentDateString);
			$monthNumberCurrent			= date_format($dateLoop,"M");
			$monthloopCount 			= 1;
			$monthAvailDays				= 0;
			$monthTimeCountInSecond 	= 0;
			$monthTimeToBeDeducted      = 0;
			$monthTimeToBeDeductedCount = 0;
				
			while ($monthloopCount <= $this->traceBackMonths) {
				$res = array();
					
				$sql = "SELECT ID,accountID,tag,weekday,date,time,comments FROM record WHERE accountID = " . $inputID . " AND date = '" . date_format($dateLoop,"Y-m-d") . "'  order by time asc";
				if($stmt = $this->connection->prepare($sql))	{
					$stmt->execute();
					$stmt->bind_result($ID,$accountID,$tag,$weekday,$date,$time,$comments);
					$count = 0;
					while($stmt->fetch())	{
						$count++;
						$temp["ID"]=$ID;
						$temp["accountID"]=$accountID;
						$temp["tag"]=$tag;
						$temp["weekday"]=$weekday;
						$temp["date"]=$date;
						$temp["time"]=$time;
						$temp["comments"]=$comments;
						array_push($res,$temp);
					}
					$stmt->close();
			
					if ($count == 0) {
					}
					else if ($count == 1) {
						$monthAvailDays++;
					}
					else if ($count >= 2) {
						{
							$previousTag  = $res[0]['tag'];
							$previousTime = $res[0]['time'];
							for ($i=1; $i < sizeof($res); $i++) {
								$currentTag = $res[$i]['tag'];
								$currentTime = $res[$i]['time'];
								if ($previousTag=="Exit" && $currentTag=="Entry") {
									$monthTimeToBeDeducted += strtotime($currentTime) - strtotime($previousTime);
									$monthTimeToBeDeductedCount++;
								}
								$previousTag  = $currentTag;
								$previousTime = $currentTime;
							}
						}
						$monthAvailDays++;
						$temp["first"] = $res[0]['time'];
						$temp["last"] = $res[$count-1]['time'];
						$timeLapse = strtotime($res[$count-1]['time']) - strtotime($res[0]['time']);
						$monthTimeCountInSecond = $monthTimeCountInSecond + $timeLapse;
					}
					$yearSave = date_format($dateLoop,"Y");
					date_sub($dateLoop,date_interval_create_from_date_string("1 days"));
					if ($monthNumberCurrent != date_format($dateLoop,"M")) {						
						$temp["month"]			= $yearSave . "-" . $monthNumberCurrent;
						$temp["active"]			= $monthAvailDays;
						$temp["timeTotal"] 		= $this->convertSecondToTimeString($monthTimeCountInSecond,3);
						$timeLapse 				= $monthTimeCountInSecond - $monthTimeToBeDeducted;
						$temp["timeNet"] 		= $this->convertSecondToTimeString($timeLapse,3);
						if ($monthTimeToBeDeductedCount==0) {
							$temp["timeDeduct"] = "--";
						}
						else {
							$temp["timeDeduct"] 	= sprintf("%03d", $monthTimeToBeDeductedCount) . "&nbsp;&nbsp;&nbsp;" . $this->convertSecondToTimeString($monthTimeToBeDeducted,2);
						}
						array_push($functionReturnArray,$temp);
						$monthloopCount ++;
						$monthNumberCurrent = date_format($dateLoop,"M");
						$monthTimeCountInSecond = 0;
						$monthAvailDays = 0;
						$monthTimeToBeDeducted      = 0;
						$monthTimeToBeDeductedCount = 0;
					}
				}
			}
		}
		return $functionReturnArray;
	}
	
	function searchForMatchedRecords($queryStartDate,$queryEndDate,$inputsearchForMatchedRecordsSaveID) {
	
		$sql = "SELECT ID,accountID,tag,weekday,date,time,comments FROM record WHERE accountID = " . $inputsearchForMatchedRecordsSaveID . 
				" AND date>= '" . $queryStartDate . "' AND date<= '" . $queryEndDate . "'" .
				" order by date desc, time desc";
		if($stmt = $this->connection->prepare($sql))
		{
			$res=array();
			$stmt->execute();
			$stmt->bind_result($ID,$accountID,$tag,$weekday,$date,$time,$comments);
			while($stmt->fetch())
			{
				$temp=array();
				$temp["ID"]=$ID;
				$temp["accountID"]=$accountID;
				$temp["tag"]=$tag;
				$temp["weekday"]=$weekday;
				$temp["date"]=$date;
				$temp["time"]=$time;
				$temp["comments"]=$comments;
				array_push($res,$temp);
			}
			$stmt->close();
			return $res;
		}
	}
	
	function convertSecondToTimeString($timeLapseInSecondInput,$number){
		$hour = 0;
		$minute = 0;
		$second = 0;
		$timeLapse = $timeLapseInSecondInput;
		if ($timeLapse >= 3600) {
		$hour = floor($timeLapse / 3600);
			$timeLapse = $timeLapse % 3600;
		}
		if ($timeLapse >= 60) {
			$minute = floor($timeLapse / 60);
		}
		$second = $timeLapse % 60;
		if ($hour==0 && $minute==0) {
			return "--";
		}
		else {
			if ($number==2) {
				return sprintf("%02d", $hour) . ":" . sprintf("%02d", $minute); //. ":" . sprintf("%02d", $second);
			}
			else if ($number==3) {
				return sprintf("%03d", $hour) . ":" . sprintf("%02d", $minute); //. ":" . sprintf("%02d", $second);
			}
			
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	function addUser($name,$password,$status){
		
		$pass=md5($password);
		
		if($stmt = $this->connection->prepare("INSERT INTO operator(userName,pass,status) values(?,?,?)"))
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
	
		if($stmt = $this->connection->prepare("UPDATE operator SET pass = ? where ID = ?"))
		{
	
			$t=$stmt->bind_param("ss",$pass,$inputChangeOperatorPasswordID);
			$result = $stmt->execute();
			$stmt->close();
			//var_dump($result);
		}
	
		return  $result;
	}
	
	function changeOperatorStatus($inputChangeOperatorStatusID,$inputFromOperatorStatusList){
	
		if($stmt = $this->connection->prepare("UPDATE operator SET status = ? where ID = ?"))
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
		
		if($stmt = $this->connection->prepare("SELECT pass,status FROM operator WHERE userName = ?"))
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
		
	
	
	
	function getCurrentOperators($name){
	
		if($stmt = $this->connection->prepare("SELECT ID,userName,status FROM operator order by ID desc"))
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
	
	function updateAccountStatus($ID,$name,$tag){

		if ($tag == 'disabled') {
			$sql = "update account set status='disabled' where ID='$ID'";
		}
		else if ($tag == 'valid') {
			$sql = "update account set status='valid' where ID='$ID'";
		}
		
		if($stmt = $this->connection->prepare($sql))
		{
			$result = $stmt->execute();
			$stmt->close();
		}
	
		if ($result) {
			return "Account status had been changed to $tag successfully";
		}
	}
	
}

?>