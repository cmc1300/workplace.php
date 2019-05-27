<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 11:19:15
         compiled from "theme/default/include/pageheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10711344674fa73f33c6f765-38805146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '456f0e346dfcb59ccfc9c47c5ff045d37841d466' => 
    array (
      0 => 'theme/default/include/pageheader.tpl',
      1 => 1336360742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10711344674fa73f33c6f765-38805146',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
			<!-- Page Head -->
			<h2><?php echo $_smarty_tpl->getVariable('LANG')->value['WELCOME'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['customer']->user_login_name;?>
,Credit <?php echo $_smarty_tpl->getVariable('balance')->value;?>
</h2>
			<p id="page-intro"><?php echo $_smarty_tpl->getVariable('LANG')->value['WHAT_WOULD_YOU_LIKE_TO_DO'];?>
</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="message.php"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/pencil_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['SEND_MESSAGE'];?>

				</span></a></li>
				
				<li><a class="shortcut-button" href="contact.php"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/paper_content_pencil_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['MY_CONTACTS'];?>

				</span></a></li>
				
				<li><a class="shortcut-button" href="buy.php"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/image_add_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['BUY'];?>

				</span></a></li>
				
				<li><a class="shortcut-button" href="login.php?method=out"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/clock_48.png" alt="icon" /><br />
					<?php echo $_smarty_tpl->getVariable('LANG')->value['SIGN_OUT'];?>

				</span></a></li>
				
				<!--<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>-->
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->