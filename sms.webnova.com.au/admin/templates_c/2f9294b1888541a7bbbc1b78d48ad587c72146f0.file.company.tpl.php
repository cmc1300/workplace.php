<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 10:13:10
         compiled from "theme/default/company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18261022584fa72fb6d4b594-01080366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f9294b1888541a7bbbc1b78d48ad587c72146f0' => 
    array (
      0 => 'theme/default/company.tpl',
      1 => 1336333272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18261022584fa72fb6d4b594-01080366',
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
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_ADDRESS'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_PHONE'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['BALANCE'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</th>
								   
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['OPERATE'];?>
</th>
								</tr>
								
							</thead>
							<tbody>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['company']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['name'] = 'company';
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('item')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['company']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['company']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['company']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['company']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['company']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['company']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['company']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['company']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_address;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_phone;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->balance;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_remark;?>
</td>
									<td>
										<!-- Icons -->
										 <a href="company.php?method=updateForward&company_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_id;?>
&user_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->user_id;?>
" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['UPDATE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/hammer_screwdriver.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['UPDATE'];?>
" /></a>
										 <a href="company.php?method=setApi&company_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_id;?>
&user_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->user_id;?>
" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['SET_API'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/setting.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['SET_API'];?>
" /></a>
										 <a href="../customer/login.php?group=2&login_by_params=1&method=check&company_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_id;?>
" target="_blank" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['LOGIN_AS_CUSTOMER'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/customer_login.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['LOGIN_AS_CUSTOMER'];?>
" /></a>
										  <a href="javascript:tofill(<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_id;?>
);"  title="<?php echo $_smarty_tpl->getVariable('LANG')->value['FILL'];?>
" id="tofill">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/symbol_addition.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['FILL'];?>
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
					
						<form action="company.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>add<?php }else{ ?>update<?php }?>" name="form" method="post">
										
			
						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_INFOMATION'];?>

							</div>
						</div>
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_NAME'];?>
</label>
									<input class="text-input medium-input" type="text" id="company_name" name="company_name" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->company_name;?>
" />
								</p>
								<input class="text-input medium-input" type="hidden" id="company_id" name="company_id" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->company_id;?>
" />
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_ADDRESS'];?>
</label>
									<input class="text-input medium-input datepicker" type="text" id="company_address" name="company_address"  value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->company_address;?>
"/>
								</p>
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_PHONE'];?>
</label>
									<input class="text-input small-input" type="text" id="company_phone" name="company_phone" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->company_phone;?>
"/>
								</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</label>
									<textarea  name="company_remark" id="company_remark" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('companyObj')->value->company_remark;?>
</textarea>
								</p>
						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_MANAGER_INFOMATION'];?>

							</div>
						</div>	
									<input type="hidden" id="user_id" name="user_id" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_id;?>
">
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_NAME'];?>
</label>
									<?php if ($_smarty_tpl->getVariable('method')->value=='update'){?>
									<input class="text-input small-input" type="text" readOnly="false" id="user_login_name" name="user_login_name" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_login_name;?>
" />
									<?php }else{ ?>
									<input class="text-input small-input" type="text" id="user_login_name" name="user_login_name" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_login_name;?>
" />
									<?php }?>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_PASSWORD'];?>
</label>
									<input class="text-input small-input" type="password" id="user_login_password" name="user_login_password" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_login_password;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_PASSWORD_CONFIRM'];?>
</label>
									<input class="text-input small-input" type="password" id="user_repeat_password" name="user_repeat_password" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_login_password;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_REAL_NAME'];?>
</label>
									<input class="text-input small-input" type="text" id="user_real_name" name="user_real_name" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_real_name;?>
"/>
								</p>
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_EMAIL'];?>
</label>
									<input class="text-input small-input" type="text" id="user_email" name="user_email" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_email;?>
"/>
								</p>
								
								<p>
									<label>USER PHONE</label>
									<input class="text-input small-input" type="text" id="user_phone" name="user_phone" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_phone;?>
"/>
								</p>
								<p>
									<label>USER MOBILE</label>
									<input class="text-input small-input" type="text" id="user_mobile" name="user_mobile" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->user_mobile;?>
"/>
								</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</label>
									<textarea  name="user_remark" id="user_remark" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('companyObj')->value->user_remark;?>
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
			
	<div id="fillbox" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->

				<h3>Fill</h3>

				<form action="company.php?method=fill" method="post">
				
					<fieldset>
							<h4>Please Entry the credits:</h4>
							<input class="text-input small-input" type="text" id="bulance" name="bulance"/>
					</fieldset>
					
					<fieldset>
							<h4>Please choose the credit card types:</h4>
							<select name="cc_type" id="cc_type" class="text-input small-input" >
							<option value="1">VISA</option>
							<option value="2">Master Card</option>
							</select>
					</fieldset>
					<fieldset>
							<h4>Credit card account:</h4>
							<input class="text-input small-input" type="text" id="cc_number" name="cc_number"/>
					</fieldset>
					<fieldset>
							<h4>Name of Cardholder:</h4>
							<input class="text-input small-input" type="text" id="cc_name" name="cc_name"/>
					</fieldset>
					<fieldset>
							<h4>Validity:</h4>
							<input class="text-input small-input" type="text" id="cc_expirydate" name="cc_expirydate"/>
					</fieldset>
					<fieldset>
							<h4>Bank account:</h4>
							<input class="text-input small-input" type="text" id="dd_bsbnumber" name="dd_bsbnumber"/>
					</fieldset>
					<fieldset>
							<h4>Bank card number:</h4>
							<input class="text-input small-input" type="text" id="dd_accountnumber" name="dd_accountnumber"/>
					</fieldset>
					<fieldset>
							<h4>The name of the bank card:</h4>
							<input class="text-input small-input" type="text" id="dd_accountname" name="dd_accountname"/>
					</fieldset>
					<fieldset>
							<h4>Payment:</h4>
							<select name="defaultpay" id="defaultpay" class="text-input small-input" >
							<option value="1">Bank Tracnsfer</option>
							<option value="2">Credit Card</option>
							<option value="3">Derect Debit</option>
							</select>
					</fieldset>
					

					<fieldset>
						<input class="button" type="hidden" id="s_company_id" name="company_id" value="1" />
						<input class="button" type="submit" name="submit" id="submit" value="Add" />
					</fieldset>

				</form>

				

			</div> <!-- End #messages -->

			
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/foot.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script type="text/javascript">
function tofill(company_id){
jQuery("#s_company_id").attr("value",company_id);
jQuery.facebox({ div: '#fillbox' });
}
</script>
