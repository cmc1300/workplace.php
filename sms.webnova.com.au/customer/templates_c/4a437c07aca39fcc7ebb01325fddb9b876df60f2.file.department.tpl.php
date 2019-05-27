<?php /* Smarty version Smarty-3.0.8, created on 2012-05-11 17:39:07
         compiled from "theme/default/department.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14261406994facde3b6d8a38-75382014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a437c07aca39fcc7ebb01325fddb9b876df60f2' => 
    array (
      0 => 'theme/default/department.tpl',
      1 => 1336727807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14261406994facde3b6d8a38-75382014',
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
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['DEPARTMENT_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['DEPARTMENT_REMARK'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['OPERATE'];?>
</th>
								</tr>
								
							</thead>
							<tbody>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['department']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['name'] = 'department';
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('item')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['department']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['department']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['department']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['department']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['department']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['department']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['department']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['department']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['department']['index']]->department_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['department']['index']]->department_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['department']['index']]->remark;?>
</td>
									<td>
										<!-- Icons -->
										<?php ob_start();?><?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['department']['index']]->department_name;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!='manager'){?>
										 <a href="javascript:del('department.php?method=delete&department_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['department']['index']]->department_id;?>
')" title="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
">
										 <img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross.png" alt="<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE'];?>
" /></a>
										 <?php }?> 
										 <a href="department.php?method=updateForward&department_id=<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('smarty')->value['section']['department']['index']]->department_id;?>
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
					
						<form action="department.php?method=<?php if ($_smarty_tpl->getVariable('method')->value!='update'){?>add<?php }else{ ?>update<?php }?>" name="form" method="post">
										
			
						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['COMPANY_INFOMATION'];?>

							</div>
						</div>
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Department Name</label>
									<input class="text-input medium-input" type="text" id="department_name" name="department_name" value="<?php echo $_smarty_tpl->getVariable('departmentObj')->value->department_name;?>
" />
								</p>
								<input type="hidden" name="department_parent_id" value="0"/>
									<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['REMARK'];?>
</label>
									<textarea  name="remark" id="remark" cols="50" rows="10"><?php echo $_smarty_tpl->getVariable('departmentObj')->value->remark;?>
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
			if($("#department_name").val() == ""){
				alert("Please fill department name!");
				$("#department_name").focus();
				return false;
			}
		});
	});
</script>
