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
	
	function readAccountListingFromDB(){
	
		$sql = "SELECT id,name,phone,email,code,creationDate,clientIP,formTag FROM LandpageSept order by id desc";
		if($stmt = $this->connection->prepare($sql))
		{
			$res=array();
			$stmt->execute();
			$stmt->bind_result($id,$name,$phone,$email,$code,$creationDate,$clientIP,$formTag);
			while($stmt->fetch())
			{
				$temp=array();
				$temp["id"]=$id;
				$temp["name"]=$name;
				$temp["phone"]=$phone;
				$temp["email"]=$email;
				$temp["code"]=$code;
				$temp["creationDate"]=$creationDate;
				$temp["clientIP"]=$clientIP;
				$temp["formTag"]=$formTag;
				array_push($res,$temp);
			}
			$stmt->close();
			return $res;
		}
	}
	
}

?>