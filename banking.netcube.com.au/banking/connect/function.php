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
	
	function addUser($name,$password){
		
		$pass=md5($password);
		
		if($stmt = $this->connection->prepare("INSERT INTO Users(userName,pass) values(?,?)"))
			{
				
			$t=$stmt->bind_param("ss", $name,$pass);
			$result = $stmt->execute();
			$stmt->close();
			var_dump($result);
			
		}
		
		/* 		$q="INSERT INTO Users(userName,pass)  VALUES('$name','$pass')";
		 $result=mysqli_query($this->connection, $q);
		 mysqli_errno($this->connection); */
		
	return  $result;
	}

	function checkUser($name,$password){
		
		$pa = md5($password);
		
		if($stmt = $this->connection->prepare("SELECT pass FROM Users WHERE userName = ?"))
		{
			$t=$stmt->bind_param("s", $name);
			$stmt->execute();
			$stmt->bind_result($result);
			$stmt->fetch();
			//var_dump($result);
			
			if($pa==$result){
				
				return true;
			}else{
				return false;
			}
			
			$stmt->close();
			
				
		}else{
			
			return false;
		}
		
/* 		// Verify that user is in database
		$q = "SELECT password FROM Users WHERE username = '$name'";
		$result = mysql_query($q, $this->connection);
		if(!$result || (mysql_numrows($result) < 1)){
			return 1; //Indicates username failure
		}
		 
		// Retrieve password from result
		$dbarray = mysql_fetch_array($result);
		 
		// Validate that password is correct
		if($password == $dbarray['password']){
			return 0; //Success! Username and password confirmed
		}
		else{
			return 1; //Indicates password failure
		} */
		
	}
		
		
	

	
}

?>