<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 11:34:36
         compiled from "theme/default/userapi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4832950804fa742cc2063b0-80981987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8edb32d53b4902cf538b7a0ffe46c1a9cbf3b13' => 
    array (
      0 => 'theme/default/userapi.tpl',
      1 => 1336273602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4832950804fa742cc2063b0-80981987',
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
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['API_ID'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['API_STATUS'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['SENDER_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['SENDER_STATUS'];?>
</th>
								    <th><?php echo $_smarty_tpl->getVariable('LANG')->value['MOTIVATION'];?>
</td>
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
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->userapi_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->api_id;?>
</td>
									<td>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->api_status==2){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['ENABLE'];?>
								
									<?php }?>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->api_status==1){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['DISABLE'];?>
								
									<?php }?>
									</td>
									<td><?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->api_type==1){?>
									<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->sender_name;?>

									<?php }?>
									 <?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->api_type==0){?>
									<?php echo $_smarty_tpl->getVariable('LANG')->value['SYSTEM_DEFAULT'];?>

									<?php }?></td>
									<td>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->sender_status==1){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['DISABLE'];?>
								
									<?php }?>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->sender_status==2){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['ENABLE'];?>
								
									<?php }?>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->sender_status==3){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
								
									<?php }?>
									<?php if ($_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->sender_status==4){?>
										<?php echo $_smarty_tpl->getVariable('LANG')->value['SUBJECT_TO_AUDIT'];?>
								
									<?php }?>
									</td>
									<td width="300" style="text-overflow:ellipsis"><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->sender_motivation;?>
</td>
									<td>
										<!-- Icons -->
										<a href="javascript:del('company.php?method=deleteApi&userapi_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->userapi_id;?>
&company_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->company_id;?>
')" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
" /></a> 
										 <a href="company.php?method=updateAPIForward&userapi_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['company']['index']]->userapi_id;?>
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
					
						<form action="company.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>addUserAPI<?php }else{ ?>updateUserAPI<?php }?>" name="form" method="post">
										
			
						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['USERAPI_INFOMATION'];?>

							</div>
						</div>
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['API_USERNAME'];?>
</label>
									<input class="text-input medium-input" type="text" id="api_username" name="api_username" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->api_username;?>
" />
								</p>
								
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['API_PASSWORD'];?>
</label>
									<input class="text-input medium-input datepicker" type="text" id="api_password" name="api_password"  value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->api_password;?>
"/>
								</p>
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['API_ID'];?>
</label>
									<input class="text-input small-input" type="text" id="api_id" name="api_id" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->api_id;?>
"/>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['SENDER_NAME'];?>
</label>
									<input class="text-input small-input" type="text" id="sender_name" name="sender_name" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->sender_name;?>
"/>
								</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['MOTIVATION'];?>
</label>
								<textarea  name="sender_motivation" id="sender_motivation" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('companyObj')->value->sender_motivation;?>
</textarea>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['SENDER_STATUS'];?>
</label>
									<select id="sender_status" name="sender_status">
									<option><?php echo $_smarty_tpl->getVariable('LANG')->value['PLEASE_SELECT'];?>
</option>
									<option value="1"  <?php if ($_smarty_tpl->getVariable('companyObj')->value->sender_status==1){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['DISABLE'];?>
</option>
									<option value="2"  <?php if ($_smarty_tpl->getVariable('companyObj')->value->sender_status==2){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['ENABLE'];?>
</option>
									<option value="3"  <?php if ($_smarty_tpl->getVariable('companyObj')->value->sender_status==3){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
</option>
									<option value="4"  <?php if ($_smarty_tpl->getVariable('companyObj')->value->sender_status==4){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['SUBJECT_TO_AUDIT'];?>
</option>
									</select>
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['API_STATUS'];?>
</label>
									<select id="api_status" name="api_status">
									<option><?php echo $_smarty_tpl->getVariable('LANG')->value['PLEASE_SELECT'];?>
</option>
									<option value="2"  <?php if ($_smarty_tpl->getVariable('companyObj')->value->api_status==2){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['ENABLE'];?>
</option>
									<option value="1"  <?php if ($_smarty_tpl->getVariable('companyObj')->value->api_status==1){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('LANG')->value['DISABLE'];?>
</option>
									</select>
								</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['USERAPI_REMARK'];?>
</label>
									<textarea  name="userapi_remark" id="userapi_remark" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('companyObj')->value->userapi_remark;?>
</textarea>
								</p>
								<p>
								<input type="hidden" id="company_id" name="company_id" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->company_id;?>
" />
								<input type="hidden" id="userapi_id" name="userapi_id" value="<?php echo $_smarty_tpl->getVariable('companyObj')->value->userapi_id;?>
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
