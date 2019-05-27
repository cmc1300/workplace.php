<?php /* Smarty version Smarty-3.0.8, created on 2013-10-28 11:04:41
         compiled from "theme/default/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1644795007526dd449bc4741-30158103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed10b31e61ed7056e2368bb336e1b903dbedf8b0' => 
    array (
      0 => 'theme/default/contact.tpl',
      1 => 1382516703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1644795007526dd449bc4741-30158103',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/wnovasms/public_html/smarty/plugins/modifier.date_format.php';
?>
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
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_FIRST_NAME'];?>
</th> 
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_SURNAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_TITLE'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_MOBILE'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_UPDATE_TIME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_REMARK'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['OPERATE'];?>
</th>
								</tr>
							</thead>
							<tbody>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['name'] = 'contact';
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('item')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_first_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_surname;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_title;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_mobile;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_update_time;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_remark;?>
</td>
									<td>
										<!-- Icons -->
										<a href="javascript:del('contact.php?method=delete&contact_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_id;?>
')" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
" /></a> 
										 <a href="contact.php?method=updateForward&contact_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_id;?>
" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['UPDATE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/hammer_screwdriver.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['UPDATE'];?>
" /></a>
									</td>
								</tr>
								
							<?php endfor; endif; ?>
							</tbody>
								<script type="text/javascript">
								     function change(obj)
								     {
								     var selValue=(obj.options[obj.selectedIndex]).value;//获得选中值
								     button.href=selValue;
								   	 }
								</script>
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
										</div>
										<div class="pagination"><?php echo $_smarty_tpl->getVariable('nextpage')->value;?>
</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
						<form action="contact.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>add<?php }else{ ?>update<?php }?>" name="form" method="post">
										
							<fieldset><!--class="text-input medium-input datepicker"-->
							<input type="hidden" name="contact_id" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_id;?>
">
							
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_NAME'];?>
&nbsp;<?php echo $_smarty_tpl->getVariable('LANG')->value['WARNINGADD'];?>
</label>
									<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['name'] = 'contact';
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('contact_list')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['contact']['total']);
?>
										<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['name'] = 'contactlist';
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('contactList')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['contactlist']['total']);
?>
												<?php $_smarty_tpl->tpl_vars['checked'] = new Smarty_variable('', null, null);?>
												<?php if ($_smarty_tpl->getVariable('contact_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_id==$_smarty_tpl->getVariable('contactList')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contactlist']['index']]){?>
													<?php $_smarty_tpl->tpl_vars['checked'] = new Smarty_variable("checked=\"checked\"", null, null);?>
													<?php break 1?>
												<?php }?>
										<?php endfor; endif; ?>
									<input type="checkbox" <?php echo $_smarty_tpl->getVariable('checked')->value;?>
 name="contact_list_id[]" id="contact_list_id" value="<?php echo $_smarty_tpl->getVariable('contact_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_id;?>
"/><?php echo $_smarty_tpl->getVariable('contact_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_name;?>
&nbsp;
									<?php endfor; endif; ?>
									</p>
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_FIRST_NAME'];?>
</label>
										<input class="text-input small-input"type="text" name="contact_first_name" id="contact_first_name" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_first_name;?>
"/>
									</p>
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_SURNAME'];?>
</label>
										<input class="text-input small-input"type="text" name="contact_surname" id="contact_surname" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_surname;?>
"/>
									</p>
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_TITLE'];?>
</label>
										<select name="contact_title" id="contact_title" class="text-input small-input" >
										<?php if ($_smarty_tpl->getVariable('contactObj')->value->contact_title=='Mr.'){?>
											<option value="Mr." selected="seklected">Mr.</option>
										<?php }else{ ?>
											<option value="Mr.">Mr.</option>
										<?php }?>
										<?php if ($_smarty_tpl->getVariable('contactObj')->value->contact_title=='Miss.'){?>
											<option value="Miss." selected="seklected">Miss.</option>
										<?php }else{ ?>
											<option value="Miss.">Miss.</option>
										<?php }?>
										<?php if ($_smarty_tpl->getVariable('contactObj')->value->contact_title=='Mrs.'){?>
											<option value="Mrs." selected="seklected">Mrs.</option>
										<?php }else{ ?>
											<option value="Mrs.">Mrs.</option>
										<?php }?>
										</select>
									</p>
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_EMAIL'];?>
</label>
										<input class="text-input small-input"type="text" name="contact_email" id="contact_email" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_email;?>
"/>
									</p>
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_MOBILE'];?>
</label>
										<input class="text-input small-input"type="text" name="contact_mobile" id="contact_mobile" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_mobile;?>
"/>
									</p>
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_BIRTH_DATE'];?>
</label>
										<?php if ($_smarty_tpl->getVariable('method')->value=='update'){?>
										<input class="text-input small-input" type="text" name="contact_birth_date" id="contact_birth_date" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_birth_date;?>
"/>
										<?php }else{ ?>
										<input class="text-input small-input" type="text" name="contact_birth_date" id="contact_birth_date" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
"/>
										<?php }?>
									</p>
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_ADDRESS'];?>
</label>
										<input class="text-input small-input"type="text" name="contact_address" id="contact_address" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_address;?>
"/>
									</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_REMARK'];?>
</label>
									<textarea  name="contact_remark" id="contact_remark" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_remark;?>
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
<script type="text/javascript">
	$(document).ready(function(){
	
		$("#submit").click(function(){
			
			if($("#contact_mobile").val() == ""){
				alert("Please fill contact mobile!");
				$("#contact_mobile").focus();
				return false;
			}else{
				var regx=/^[0-9-+]+$/;
				 if(!regx.test($("#contact_mobile").val())){
					alert('Please enter a valid mobile');
					$("#contact_mobile").focus();
					return false;
					}
			}
		if($("#contact_first_name").val() == ""){
				alert("Please fill contact first name!");
				$("#contact_first_name").focus();
				return false;
		}
			
		if($("#contact_surname").val() == ""){
				alert("Please fill contact surname!");
				$("#contact_surname").focus();
				return false;
		}
			
		});
	});
</script>
