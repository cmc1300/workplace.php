<?php /* Smarty version Smarty-3.0.8, created on 2012-05-07 10:00:38
         compiled from "theme/default/include/js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4016442114fa72cc6ca0916-75864571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b21d86a9846f729ea50573ac0524fb1382fc9829' => 
    array (
      0 => 'theme/default/include/js.tpl',
      1 => 1336045298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4016442114fa72cc6ca0916-75864571',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
<?php if ($_smarty_tpl->getVariable('method')->value=='add'||$_smarty_tpl->getVariable('method')->value=='update'){?>
$(document).ready(function () { 
$(".tab").click(); 
$("#video_date").datepicker();
}); 			
<?php }?>

$(document).ready(function () { 
	$("#contact_birth_date").datepicker({
		dateFormat:'yy-mm-dd',	
	});
	//contact list
	$("#contact_list_create_time").datepicker({
		dateFormat:'yy-mm-dd',	
	});
}); 	
function del(url){
	if(!confirm("<?php echo $_smarty_tpl->getVariable('LANG')->value['DELETE_THIS_RECORD'];?>
")){
		return;
	}else{				
		window.location=url;
	}
}
</script>