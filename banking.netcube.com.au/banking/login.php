<?php

require 'etc/configuration.php';
session_start();

if(isset($_POST["Username"]) && isset($_POST["Password"]))
{
	$user=$_POST["Username"];
	$password=$_POST["Password"];
	
	if(!empty($user)&&!empty($password))
	{

		$db=new DB_Function();
		//var_dump($db);
		$result = $db->checkUser($user, $password);
		if($result == "valid"){
			$_SESSION['activeLoginUser'] = $user;
			sleep(1);
			print "<script>window.location=\"main.php\"</script>";
			
		}
		else
		{
			print "<script> alert('Login failed due to $result!');window.location=\"index.php\" </script>";
		}
		
	}
	else
	{
		print "<script> alert(\"username or password is empty\");window.location=\"index.php\" </script>";
	}
	
}


?>