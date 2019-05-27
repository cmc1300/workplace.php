<?php /* Smarty version Smarty-3.0.8, created on 2012-05-11 17:39:12
         compiled from "theme/default/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11175813884facde40d7e5b2-27857205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cf8478315e204223e736b6691081b4950e2f28a' => 
    array (
      0 => 'theme/default/user.tpl',
      1 => 1336729022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11175813884facde40d7e5b2-27857205',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/top.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/left.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		
		<div id="main-content"> <!-- Main Content Section with everything -->			
			
			<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/pageheader.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab"><?php echo $_smarty_tpl->getVariable('LANG')->value['LIST'];?>
</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2" class="tab"><?php echo $_smarty_tpl->getVariable('lang_method')->value;?>
</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							<thead>
								<tr>
								    <th><?php echo $_smarty_tpl->getVariable('LANG')->value['ID'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_REAL_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_EMAIL'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_PHONE'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_MOBILE'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['OPERATE'];?>
</th>
								</tr>
								
							</thead>
							<tbody>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['user']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['name'] = 'user';
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('item')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_login_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_real_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_email;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_phone;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_mobile;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_remark;?>
</td>
									<td>
										<!-- Icons -->
										<?php ob_start();?><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['department']['index']]->department_name;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!='manager'){?>
										 <a href="javascript:del('user.php?method=delete&user_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_id;?>
')" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
" /></a>
										 <?php }?> 
										 <a href="user.php?method=updateForward&user_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->user_id;?>
" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['UPDATE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/hammer_screwdriver.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['UPDATE'];?>
" /></a>
									</td>
								</tr>
								
							<?php endfor; endif; ?>
							</tbody>
							
							<tfoot>
								<tr>
									<td colspan="6">
										
										<div class="pagination"><?php echo $_smarty_tpl->getVariable('nextpage')->value;?>
</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="user.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>add<?php }else{ ?>update<?php }?>" name="form" method="post">
										
			
						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_MANAGER_INFOMATION'];?>

							</div>
						</div>
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							<input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_id;?>
"/>
							<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['SELECT_DEPARTMEN'];?>
</label>
									<select class="text-input small-input" name="department_id" id="department_id">
									<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['user']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['name'] = 'user';
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('department')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total']);
?>
										<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable('', null, null);?>
										<?php if ($_smarty_tpl->getVariable('department')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->department_id==$_smarty_tpl->getVariable('userObj')->value->department_id){?>
											<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable("selected=\"selected\"", null, null);?>
										<?php }?>
										<option value="<?php echo $_smarty_tpl->getVariable('department')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->department_id;?>
" <?php echo $_smarty_tpl->getVariable('selected')->value;?>
><?php echo $_smarty_tpl->getVariable('department')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]->department_name;?>
</option>
									<?php endfor; endif; ?>
								</select>
								</p>
							<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_NAME'];?>
</label>
									<?php if ($_smarty_tpl->getVariable('method')->value=='update'){?>
									<input class="text-input small-input" type="text" readOnly="false" id="user_login_name" name="user_login_name" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_login_name;?>
" />
									<?php }else{ ?>
									<input class="text-input small-input" type="text" id="user_login_name" name="user_login_name" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_login_name;?>
" />
									<?php }?>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_PASSWORD'];?>
</label>
									<input class="text-input small-input" type="password" id="user_login_password" name="user_login_password" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_login_password;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_PASSWORD_CONFIRM'];?>
</label>
									<input class="text-input small-input" type="password" id="user_repeat_password" name="user_repeat_password" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_login_password;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_REAL_NAME'];?>
</label>
									<input class="text-input small-input" type="text" id="user_real_name" name="user_real_name" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_real_name;?>
"/>
								</p>
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_EMAIL'];?>
</label>
									<input class="text-input small-input" type="text" id="user_email" name="user_email" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_email;?>
"/>
								</p>
								
								<p>
									<label>USER PHONE</label>
									<input class="text-input small-input" type="text" id="user_phone" name="user_phone" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_phone;?>
"/>
								</p>
								<p>
									<label>USER MOBILE</label>
									<input class="text-input small-input" type="text" id="user_mobile" name="user_mobile" value="<?php echo $_smarty_tpl->getVariable('userObj')->value->user_mobile;?>
"/>
								</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</label>
									<textarea  name="user_remark" id="user_remark" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('userObj')->value->user_remark;?>
</textarea>
								</p>
								<p>
									<?php if ($_smarty_tpl->getVariable('method')->value=='update'){?>
									<input class="button" name="button" id="button" type="button" value="Go Back" onclick="javascript:history.go(-1);"/>
								<?php }?>
									<input class="button" name="submit" id="submit" type="submit" value="<?php echo $_smarty_tpl->getVariable('LANG')->value['SUBMIT'];?>
" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
		
			<div class="clear"></div>
			
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/foot.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(){
			if($("#department_id").val() == ""){
				alert("Please choose department name!");
				$("#department_id").focus();
				return false;
			}
		
			if($("#user_login_name").val() == ""){
				alert("Please fill your login name!");
				$("#user_login_name").focus();
				return false;
			}
			
			if($("#user_login_password").val() == ""){
				alert("Please fill your login password!");
				$("#user_login_password").focus();
				return false;
			}
			
			if($("#user_repeat_password").val() == ""){
				alert("Please fill your repeat password!");
				$("#user_repeat_password").focus();
				return false;
			}
			
			if($("#user_login_password").val() != $("#user_repeat_password").val()){
				alert("Two password input does not match, please re-enter!");
				$("#user_repeat_password").focus();
				return false;
			}
			
			if($("#user_real_name").val() == ""){
				alert("Please fill your real name!");
				$("#user_real_name").focus();
				return false;
			}
			
			if($("#user_email").val() == ""){
				alert("Please fill your email!");
				$("#user_email").focus();
				return false;
			}else{
				var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
				 if(!reg.test($("#user_email").val())){
					alert('Please enter a valid E-mail');
					$("#user_email").focus();
					return false;
					}
			}
			
			if($("#user_phone").val() == ""){
				alert("Please fill your phone!");
				$("#user_phone").focus();
				return false;
			}else{
				var regx=/^[0-9-+]+$/;
				 if(!regx.test($("#user_phone").val())){
					alert('Please enter a valid phone');
					$("#user_phone").focus();
					return false;
					}
			}
			
			if($("#user_mobile").val() == ""){
				alert("Please fill your mobile!");
				$("#user_mobile").focus();
				return false;
			}else{
				var regx=/^[0-9-+]+$/;
				 if(!regx.test($("#user_mobile").val())){
					alert('Please enter a valid mobile');
					$("#user_mobile").focus();
					return false;
				}
			}
		});
	});
</script>
