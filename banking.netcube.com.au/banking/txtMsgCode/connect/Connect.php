<?php
//add by indika
class DbConnect {

	private $conn;

	function __construct() {
	}

	/**
	 * Establishing database connection
	 * @return database connection handler
	 */
/* 	function connect() {
		//include_once dirname(__FILE__) . './Config.php';

		// Connecting to mysql database
		//$this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$this->conn = new mysqli("103.26.62.234", "cpnetcub_user", "iA(MeAF,7HNo", "cpnetcub_cp");
		// Check for database connection error
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		// returing connection resource
		return $this->conn;
	} */
	
	
	public function createUser($imie, $tag, $code) {
		date_default_timezone_set('Australia/Melbourne');
		$filename = "Connection-" . date("Y") . "-" . date("F") . ".txt";
		file_put_contents($filename,date("l jS \of F Y h:i:s A") . "\n", FILE_APPEND | LOCK_EX);
		file_put_contents($filename,"==============================================================\n", FILE_APPEND | LOCK_EX);
		
		$runningMode = "Banking_server";	//Banking_server	CP_server
		file_put_contents($filename,"Start to connect to MySQL database " . $runningMode . "\n" , FILE_APPEND | LOCK_EX);
		
		if ($runningMode == "CP_server") {
			// Database to CP server
			$conn = new mysqli("103.26.62.234", "cpnetcub_user", "iA(MeAF,7HNo", "cpnetcub_cp");
			
			// Check for database connection error
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				
				file_put_contents($filename,"Failed to connect to MySQL: " . mysqli_connect_error() . "\n", FILE_APPEND | LOCK_EX);
				
				die;
			}
			// insert query
			if($stmt = $conn->prepare("INSERT INTO bank_Codes(IMEI,tag,code) values(?,?,?)")){
				
					
				$t=$stmt->bind_param("sss", $imie,$tag,$code);
				
				$result = $stmt->execute();
				
				$stmt->close();
				
				// Check for successful insertion
				if ($result) {
					file_put_contents($filename,"Success\n\n", FILE_APPEND | LOCK_EX);
					// User successfully inserted
					return "Success";
				} else {
					file_put_contents($filename,"Fail\n\n", FILE_APPEND | LOCK_EX);
					// Failed to create user
					return "Fail";
				}
			}
		}
		else if ($runningMode == "Banking_server") {
			// Database to banking.netcube.com.au
			//$conn = new mysqli("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
			file_put_contents($filename,"Before function mysqli_connect()" . "\n" , FILE_APPEND | LOCK_EX);
			// Create connection
			try {
				$conn = mysqli_connect("103.26.63.246", "bankingn_jerry", "u_b2z_y5wHEK", "bankingn_banking");
			} 
			catch (Exception $e) {
				file_put_contents($filename,"Exception: " . $e->getMessage() . "\n" , FILE_APPEND | LOCK_EX);
			}
			
			// Check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();				
				file_put_contents($filename,"Failed to connect to MySQL: " . mysqli_connect_error(). "\n\n", FILE_APPEND | LOCK_EX);
				die;
			}
			// insert query
			if($stmt = $conn->prepare("INSERT INTO bank_Codes(IMEI,tag,code) values(?,?,?)")){
				
					
				$t=$stmt->bind_param("sss", $imie,$tag,$code);
				
				$result = $stmt->execute();
				
				$stmt->close();
				
				// Check for successful insertion
				if ($result) {
					file_put_contents($filename,"Success\n\n", FILE_APPEND | LOCK_EX);
					// User successfully inserted
					return "Success";
				} else {
					file_put_contents($filename,"Fail\n\n", FILE_APPEND | LOCK_EX);
					// Failed to create user
					return "Fail";
				}
			}
		}
	}

}

?>