<?php /* Smarty version Smarty-3.0.8, created on 2012-05-11 15:40:44
         compiled from "theme/default/contact_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16150424834facc27c213889-18466682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa2e133d01695eb17652e90753d61326a4c1eb81' => 
    array (
      0 => 'theme/default/contact_list.tpl',
      1 => 1336721790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16150424834facc27c213889-18466682',
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
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_LIST_NAME'];?>
</th> 
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_LIST_COUNT'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_LIST_UPDATE_TIME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_LIST_remark'];?>
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
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_count;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_update_time;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_remark;?>
</td>
									<td>
										<!-- Icons -->
										<a href="javascript:del('contact_list.php?method=delete&contact_list_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_id;?>
')" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
" /></a> 
										 <a href="contact_list.php?method=updateForward&contact_list_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_id;?>
&company_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->company_id;?>
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
					
						<form action="contact_list.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>add<?php }else{ ?>update<?php }?>" name="form" method="post">
										
							<fieldset><!--class="text-input medium-input datepicker"-->
							<input type="hidden" name="contact_list_id" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_list_id;?>
">
									<p>
										<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_LIST_NAME'];?>
</label>
										<input class="text-input small-input"type="text" name="contact_list_name" id="contact_list_name" value="<?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_list_name;?>
"/>
									</p>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CONTACT_LIST_remark'];?>
</label>
									<textarea  name="contact_list_remark" id="contact_list_remark" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('contactObj')->value->contact_list_remark;?>
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
			if($("#contact_list_name").val() == ""){
			alert("contact list name cannot empty!");
			return false;
		}
		});
	});
</script>
