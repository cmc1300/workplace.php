<?php /* Smarty version Smarty-3.0.8, created on 2012-05-16 13:11:47
         compiled from "theme/default/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8765049274fb33713140a23-93648272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab08b1b046c8e0093755dd3e97ab7df0b2a3d9ff' => 
    array (
      0 => 'theme/default/admin.tpl',
      1 => 1334990688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8765049274fb33713140a23-93648272',
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
					<?php if ($_smarty_tpl->getVariable('method')->value=='add'||$_smarty_tpl->getVariable('method')->value=='update'){?>
					
						<script language="JavaScript">
							  $(document).ready(function () {
		       					 $(".tab").click();
		   						 });
						</script>
					
					<?php }?>
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
								    <th><?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_ID'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_LOGIN_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_REAL_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_REMARK'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['OPERATE'];?>
</th>
								</tr>
							</thead>
							<tbody>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['admin']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['name'] = 'admin';
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('item')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['admin']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['admin']['index']]->admin_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['admin']['index']]->admin_login_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['admin']['index']]->admin_real_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['admin']['index']]->admin_remark;?>
</td>
									<td>
										<!-- Icons -->
										 <a href="javascript:del('admin.php?method=delete&admin_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['admin']['index']]->admin_id;?>
')" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
" /></a>
										 <a href="admin.php?method=updateForward&admin_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['admin']['index']]->admin_id;?>
" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['UPDATE'];?>
"">
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
					<script type="text/javascript">
						$(document).ready(function(){
						$("#submit").click(function(){
						<!--username-->
							if($("#admin_login_name").val()==''){
								alert('Please enter the user name');
								$("#admin_login_name").focus();
								return false;
							}
							<!--password-->
							 if($("#admin_login_password1").val().length <'6' || $("#admin_login_password1").val().length >'16'){
								alert('Please enter your password length between 6-16.');
								$("#admin_login_password1").focus();
								return false;
							}
							<!--password-->
							if($("#admin_login_password2").val().length <'6' || $("#admin_login_password2").val().length >'16'){
								alert('Please enter your password length between 6-16.');
								$("#admin_login_password2").focus();
								return false;
							}
							if($("#admin_login_password1").val() != $("#admin_login_password2").val()){
								alert('Requires the same password twice');
								$("#admin_login_password1").focus();
								return false;
							}
							<!--remark-->
							if($("#admin_remark").val()==''){
								alert('Please enter the remark');
								$("#admin_remark").focus();
								return false;
							}
							});
						});
					</script>
					<div class="tab-content" id="tab2">

						<form action="admin.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>add<?php }else{ ?>update<?php }?>" name="form" method="post" onsubmit="return CheckLogin()">

						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_INFOMATION'];?>
						
							</div>
						</div>

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
									<?php if ($_smarty_tpl->getVariable('login_name_error_message')->value){?>
									<div class="notification error png_bg">
										<a href="#" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
										<div>
											<?php echo $_smarty_tpl->getVariable('login_name_error_message')->value;?>

										</div>
									</div>
								<?php }?>
								<p>
									<input class="text-input medium-input" type="hidden" id="admin_id" name="admin_id" value="<?php echo $_smarty_tpl->getVariable('adminObj')->value->admin_id;?>
"/>
								</p>

								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_LOGIN_NAME'];?>
</label>
									<?php if ($_smarty_tpl->getVariable('method')->value=='update'){?>
										<input class="text-input medium-input" type="text" disabled="false"  id="admin_login_name" name="admin_login_name" value="<?php echo $_smarty_tpl->getVariable('adminObj')->value->admin_login_name;?>
"/>
									<?php }else{ ?>
										<input class="text-input medium-input" type="text"  id="admin_login_name" name="admin_login_name" value="<?php echo $_smarty_tpl->getVariable('adminObj')->value->admin_login_name;?>
"/>
									<?php }?>
								</p>
								<?php if ($_smarty_tpl->getVariable('password_error_message')->value){?>
								<div class="notification error png_bg">
									<a href="#" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
									<div>
									<?php echo $_smarty_tpl->getVariable('password_error_message')->value;?>

									</div>
								</div>
								<?php }?>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_LOGIN_PASSWORD'];?>
</label>
									<input class="text-input medium-input" type="password" id="admin_login_password" name="admin_login_password" value="<?php echo $_smarty_tpl->getVariable('adminObj')->value->admin_login_password;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['ADMIN_REPEAT_PASSWORD'];?>
</label>
									<input class="text-input medium-input" type="password" id="admin_repeat_password" name="admin_repeat_password" value="<?php echo $_smarty_tpl->getVariable('adminObj')->value->admin_login_password;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_REAL_NAME'];?>
</label>
									<input class="text-input medium-input" type="text" id="admin_real_name" name="admin_real_name" value="<?php echo $_smarty_tpl->getVariable('adminObj')->value->admin_real_name;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</label>
									<textarea  name="admin_remark" id="admin_remark" cols="59" rows="10"><?php echo $_smarty_tpl->getVariable('adminObj')->value->admin_remark;?>
</textarea>
								</p>
								<p>
									<input class="button" name="submit" id="submit" type="submit" value="<?php echo $_smarty_tpl->getVariable('LANG')->value['SUBMIT'];?>
" />
									<?php if ($_smarty_tpl->getVariable('method')->value=='update'){?>
										<input class="button" name="return" id="return" type="button" value="<?php echo $_smarty_tpl->getVariable('LANG')->value['RETURN'];?>
" onclick="javascript:history.go(-1);"/>
									<?php }?>
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
 
<SCRIPT language="javascript">
function CheckLogin(){
var form=document.form;
if(((form.login_password1.value.length<3)||(form.login_password1.value.length>8))&&(form.login_password1.value!=""))
                  {
                  alert("密码必须是3-8位的字母或数字！");
                  form.login_password1.focus();
  return   false;
  }
  else   if(form.login_password1.value!=form.login_password2.value)
  {
  alert("两次输入的密码不同！");
  form.login_password2.focus();
  return   false;
  }
  else   if(form.login_password.value=="")
  {
  alert("登录密码不能为空！");
  form.login_password1.focus();
  return   false;
      }
  else   return   true;
}
</SCRIPT>
 
