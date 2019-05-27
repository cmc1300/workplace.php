<!doctype html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Netcube Attendance System</title>
    

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<script src="js/function.js"></script>

<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"
	type="text/css">

<link href="css/bnkcss.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<?php 
session_start();
?>

</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html"><b>Netcube Attendance System</b></a>
		</div>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">
			<li class="dropdown"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['activeLoginUser'];?> <b
					class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="account.php"><i class="fa fa-fw fa-user"></i> Password</a></li>
					<li class="divider"></li>
					<li><a href="logoff.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
				</ul></li>
		</ul>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<!-- /.navbar-collapse -->
	</nav>

<!--  -->
<div id="page-wrapper">
	<div class="container" style="margin-top: 0%;">
		<div class="row">
		<div class="col-lg-12">
			<ul class="nav nav-pills nav-justified" id="ul_home_pages">
			  <li id="page_main_php" class="<?php if ($_SESSION['activePage'] == "main.php") echo "active";?>"><a href="main.php">Home page</a></li>
			  <li id="page_search_php" class="<?php if ($_SESSION['activePage'] == "search.php") echo "active";?>"><a href="search.php">Attendance search</a></li>
			  <li id="page_report_php" class="<?php if ($_SESSION['activePage'] == "report.php") echo "active";?>"><a href="report.php">Attendance report</a></li>
			  <li id="page_account_php" class="<?php if ($_SESSION['activePage'] == "account.php") echo "active";?>"><a href="account.php">Maintenance</a></li>
			</ul>
		</div>
		</div>
	</div>
</div>
