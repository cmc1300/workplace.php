<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 10:12:10
         compiled from "theme/default/admin_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8067419734fa72f7a4d84f2-42988181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a0ab319a90a3c0556230cd4aa22bd8dc4f9c577' => 
    array (
      0 => 'theme/default/admin_login.tpl',
      1 => 1334938112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8067419734fa72f7a4d84f2-42988181',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->getVariable('CHARSET')->value;?>
" />
		
		<title>Welcome to <?php echo $_smarty_tpl->getVariable('LANG')->value['WEBSITE_NAME'];?>
</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('admin_css')->value;?>
/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('admin_css')->value;?>
/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('admin_css')->value;?>
/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('admin_css')->value;?>
/smoothness/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" />	
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('admin_js')->value;?>
/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('admin_js')->value;?>
/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('admin_js')->value;?>
/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('admin_js')->value;?>
/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('admin_js')->value;?>
/jquery-ui-1.8.16.custom.min.js"></script>
		
		<!--[if IE]><script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('admin_js')->value;?>
/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('admin_js')->value;?>
/DD_belatedPNG.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/js.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	</head>
  

	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="login.php?method=check" method="post">
						<?php if ($_smarty_tpl->getVariable('login_name_error_message')->value){?>
									<div class="notification error png_bg">
										<a href="#" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
										<div>
											<?php echo $_smarty_tpl->getVariable('login_name_error_message')->value;?>

										</div>
									</div>
								<?php }else{ ?>
								<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_INFOMATION'];?>
</div>
						</div>
						<?php }?>
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="admin_login_name" id="admin_login_name"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="admin_login_password" id="admin_login_password"/>
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input type="hidden" name="group" value="1" />
						<input class="button" type="submit" value="Sign In" name="submit"/>
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>
