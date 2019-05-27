<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 10:00:38
         compiled from "theme/default/include/pageheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7628363914fa72cc6dfb881-43854469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '456f0e346dfcb59ccfc9c47c5ff045d37841d466' => 
    array (
      0 => 'theme/default/include/pageheader.tpl',
      1 => 1333809456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7628363914fa72cc6dfb881-43854469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
			<!-- Page Head -->
			<h2><?php echo $_smarty_tpl->getVariable('LANG')->value['WELCOME'];?>
 <?php echo $_smarty_tpl->getVariable('admin')->value->admin_login_name;?>
</h2>
			<p id="page-intro"><?php echo $_smarty_tpl->getVariable('LANG')->value['WHAT_WOULD_YOU_LIKE_TO_DO'];?>
</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="company.php?method=addForward"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/pencil_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['Creat_AN_ACCOUNT'];?>

				</span></a></li>
				
				<li><a class="shortcut-button" href="category.php?method=addForward"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/paper_content_pencil_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['CREAT_AN_CATEGORY'];?>

				</span></a></li>
				
				<li><a class="shortcut-button" href="video_manager.php?method=addForward"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/image_add_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['CREAT_AN_VIDEO'];?>

				</span></a></li>
				
				<li><a class="shortcut-button" href="package.php?method=addForward"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/clock_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['CREATE_VIDEO_PAGCKAGE'];?>

				</span></a></li>
				
				<!--<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>-->
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->