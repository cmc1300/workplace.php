<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Netcube Attendance System</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<script src="js/function.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<link href="css/bnkcss.css" rel="stylesheet">

<?php 
//session_start();
include ("footer.php");
if(!empty($_SESSION['activeLoginUser'])) {
	unset($_SESSION['activeLoginUser']);
}
?>

</head>

<div class="container">
<div class="loginDev">
<form name="loginForm" id="form" class="form" method="post" action="login.php" onsubmit="return checkOperatorPassword()" role="form" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">
    <h1 class="text-center"> <img alt="logo" src="css/images/logo.png"></h1>
    <div class="content">
            <div id="section0" >
            <div class="field"><input id="Username" name="Username" placeholder="User Name" required autofocus type="text"></div>
            <div class="field"><input id="Password" name="Password" placeholder="Password"required autofocus type="password"></div>
            <!--  
            <div class="form-group text-center"><a id="Login" class="btn btn-warning btn-block btn-lg">Login</a></div>
            -->
            <button type="submit" class="btn btn-primary form-control">Login</button>
        </div>
    </div>
</form>
</div>

</div>
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bscript.js"></script>
</body>
</html>