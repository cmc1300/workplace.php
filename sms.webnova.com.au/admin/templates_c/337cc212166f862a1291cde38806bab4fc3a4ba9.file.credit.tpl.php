<?php /* Smarty version Smarty-3.0.8, created on 2012-05-10 10:13:15
         compiled from "theme/default/credit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20431901014fab243b141220-67859114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '337cc212166f862a1291cde38806bab4fc3a4ba9' => 
    array (
      0 => 'theme/default/credit.tpl',
      1 => 1334990688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20431901014fab243b141220-67859114',
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
								    <th><?php echo $_smarty_tpl->getVariable('LANG')->value['ID'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_VOLUME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_PRICE'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_CURRENCY'];?>
</th>
								    <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_STATUS'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_SORT'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['OPERATE'];?>
</th>
								</tr>
							</thead>
							<tbody>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['credit']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['name'] = 'credit';
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('item')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['credit']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_volume;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_price;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_currency;?>
</td>
									<td>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_status==2){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['ENABLE'];?>
								
									<?php }?>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_status==1){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['DISABLE'];?>
								
									<?php }?>
									</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_sort;?>
</td>
									<td>
										<!-- Icons -->
										 <a href="javascript:del('credit.php?method=delete&credit_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_id;?>
')" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
" /></a>
										 <a href="credit.php?method=updateForward&credit_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['credit']['index']]->credit_id;?>
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
							/*<!--username-->
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
							});*/
						});
					</script>
					<div class="tab-content" id="tab2">

						<form action="credit.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>add<?php }else{ ?>update<?php }?>" name="form" method="post" onsubmit="return CheckLogin()">

						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_INFOMATION'];?>
						
							</div>
						</div>

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_NAME'];?>
</label>
									<input class="text-input medium-input" type="text"  id="credit_name" name="credit_name" value="<?php echo $_smarty_tpl->getVariable('obj')->value->credit_name;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_VOLUME'];?>
</label>
									<input class="text-input medium-input" type="text" id="credit_volume" name="credit_volume" value="<?php echo $_smarty_tpl->getVariable('obj')->value->credit_volume;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_PRICE'];?>
</label>
									<input class="text-input small-input" type="text" id="credit_price" name="credit_price" value="<?php echo $_smarty_tpl->getVariable('obj')->value->credit_price;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_CURRENCY'];?>
</label>
									<input class="text-input small-input" type="text" id="credit_currency" name="credit_currency" value="<?php echo $_smarty_tpl->getVariable('obj')->value->credit_currency;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_STATUS'];?>
</label>								
									<select id="credit_status" name="credit_status">
									<option><?php echo $_smarty_tpl->getVariable('LANG')->value['PLEASE_SELECT'];?>
</option>
									<option value="2"  <?php if ($_smarty_tpl->getVariable('obj')->value->credit_status==2){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['ENABLE'];?>
</option>
									<option value="1"  <?php if ($_smarty_tpl->getVariable('obj')->value->credit_status==1){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['DISABLE'];?>
</option>
									</select>
								</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT_SORT'];?>
</label>
									<input class="text-input small-input" type="text" id="credit_sort" name="credit_sort" value="<?php echo $_smarty_tpl->getVariable('obj')->value->credit_sort;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</label>
									<textarea  name="credit_remark" id="credit_remark" cols="59" rows="10"><?php echo $_smarty_tpl->getVariable('obj')->value->credit_remark;?>
</textarea>
								</p>
								<p>
									<input type="hidden" name="credit_id" value="<?php echo $_smarty_tpl->getVariable('obj')->value->credit_id;?>
" />
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
 
