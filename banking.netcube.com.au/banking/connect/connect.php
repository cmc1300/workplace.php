<?php
require 'config.php';

class DB_Connect{
	public  $mysqli;
	function __construct() {
		$this->mysqli=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(mysqli_errno($this->$mysqli));
		//var_dump();
	}
	//get connection object 
	public function getConnection(){
		
		return $this->mysqli;
	}
	
	function __destruct() {
		//mysqli_close($this->mysqli);
	}
}
?>