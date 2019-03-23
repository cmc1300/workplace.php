<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<title>MerkPay - Accept online payments safely with MerkPay</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url();?>/favicon.ico" />

<!-- Le styles -->
<link href="<?php echo base_url();?>js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/twitter/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/base.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/twitter/responsive.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/plugins/modernizr.custom.32549.js"></script>

<link rel="shortcut icon" href="<?php echo base_url();?>/favicon.ico">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<!--  
      <div id="loading">
        <img src="<?php echo base_url();?>/img/ajax-loader.gif">
      </div>
      -->
	<div id="responsive_part">
		<div style="background: url(../images/tenpay.png) 0 0 no-repeat;">
			<a href="index.html"></a>
		</div>
		<ul class="nav responsive">
			<li><btn class="btn btn-la1rge btn-i1nfo responsive_menu icon_item"
					data-toggle="collapse" data-target="#sidebar"> <i
					class="icon-reorder"></i> </btn></li>
		</ul>
	</div>
	<div id="sidebar" class="collapse">
		<div class="logo">
			<a href="index.html"style="background: url(<?php echo base_url();?>/images/tenpay3.png) 10 5 no-repeat;"></a>
		</div>
		<ul id="sidebar_menu" class="navbar nav nav-list sidebar_box">
			<!-- <li class="accordion-group"><a class="dashboard" href="index.html"><img
					src="<?php echo base_url();?>/img/menu_icons/dashboard.png">Dashboard</a></li> -->
			<li class="accordion-group "><a 
				class="accordion-toggle widgets collapsed" data-toggle="collapse"
				data-parent="#sidebar_menu" href="#collapse1">  <img src="<?php echo base_url();?>/img/menu_icons/tables.png">Transactions
			</a>
				<ul id="collapse1" class="accordion-body collapse">
					<li><a href="<?php echo site_url('transaction/admin');?>">Transaction Management</a></li>
					<li><a href="<?php echo site_url('payment');?>">Bank Account Management</a></li>
					<li><a href="<?php echo site_url('withdraw/withdraw_all_history');?>">Withdraw Management</a></li>
				</ul>
			</li>
			<li class="accordion-group"><a
				class="accordion-toggle widgets collapsed" data-toggle="collapse"
				data-parent="#sidebar_menu" href="#collapse2"> <img
					src="<?php echo base_url();?>/img/menu_icons/widgets.png">User Management
			</a>
				<ul id="collapse2" class="accordion-body collapse">
					<li><a href="<?php echo site_url('registry/lists');?>">User List</a></li>
					<li><a href="<?php echo site_url('registry/index');?>">New User</a></li>
				</ul>
			</li>
		</ul>
		<!-- End sidebar_box -->
		
		<!-- End sidebar_box -->
	</div>