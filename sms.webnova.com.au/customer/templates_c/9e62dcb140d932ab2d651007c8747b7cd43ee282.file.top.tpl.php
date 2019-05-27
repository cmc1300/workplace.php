<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 10:01:07
         compiled from "theme/default/include/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12969385344fa72ce3d739a0-20783719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e62dcb140d932ab2d651007c8747b7cd43ee282' => 
    array (
      0 => 'theme/default/include/top.tpl',
      1 => 1334848404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12969385344fa72ce3d739a0-20783719',
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
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('ROOT_URL')->value;?>
/include/ckeditor/ckeditor.js"></script>
		<script type="text/javascript">                                                                                     window.onload = function()
		　　      {
		　      　 CKEDITOR.replace('content');
		　　      };
		</script>
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/js.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	</head>
  
	<body>
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->