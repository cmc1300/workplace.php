<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 10:00:38
         compiled from "theme/default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15512257594fa72cc68c1db6-14214133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f92849845e9660aab545b654bfa5b79e0a7209b' => 
    array (
      0 => 'theme/default/index.tpl',
      1 => 1334835004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15512257594fa72cc68c1db6-14214133',
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
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['VIDEO_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['USER_LOGIN_NAME'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['VIDEO_COUNT'];?>
</th>
								   <th><?php echo $_smarty_tpl->getVariable('LANG')->value['DEPARTMENT_NAME'];?>
</th>
								</tr>
							</thead>
							<tbody>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['history']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['name'] = 'history';
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('history')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['history']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['history']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['history']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['history']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['history']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['history']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['history']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['history']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['history']['index']]->view_id;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['history']['index']]->video_title;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['history']['index']]->user_login_name;?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['history']['index']]->user_count;?>
</td>
									<?php if ($_smarty_tpl->getVariable('history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['history']['index']]->department_name==''){?>
										<td><?php echo $_smarty_tpl->getVariable('LANG')->value['MANAGER'];?>
</td>
									<?php }else{ ?>
									<td><?php echo $_smarty_tpl->getVariable('history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['history']['index']]->department_name;?>
</td>
									<?php }?>
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
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
		
			<div class="clear"></div>
			

			
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/foot.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
