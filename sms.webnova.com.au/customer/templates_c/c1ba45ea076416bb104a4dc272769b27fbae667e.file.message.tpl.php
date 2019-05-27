<?php /* Smarty version Smarty-3.0.8, created on 2014-07-01 12:21:53
         compiled from "theme/default/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9908967653b2376160a224-86074716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1ba45ea076416bb104a4dc272769b27fbae667e' => 
    array (
      0 => 'theme/default/message.tpl',
      1 => 1404188512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9908967653b2376160a224-86074716',
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
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
						<form action="message.php?method=add" name="form" method="post" onsubmit="return checkMessage()">
										
			
						<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
							<?php echo $_smarty_tpl->getVariable('LANG')->value['SEND_MESSAGES'];?>

							</div>
						</div>
					
							<?php if ($_smarty_tpl->getVariable('error_message')->value){?>
								<div class="notification error png_bg">
									<a href="#" class="close"><img src="<?php echo $_smarty_tpl->getVariable('admin_image')->value;?>
/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
									<div>
									<?php echo $_smarty_tpl->getVariable('error_message')->value;?>

									</div>
								</div>
								<?php }?>
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['MESSAGE_CONTENT'];?>
</label>
									<textarea  name="message_content" id="message_content" cols="70" rows="12"  onkeyup="javascript:checkCharacters(this.value);"></textarea><br />
									<input type="text" class="text-input" id="count" value="0" readonly size="1" maxlength="4"/>/<span id="max">160</span> <span id="des"><?php echo $_smarty_tpl->getVariable('LANG')->value['CHARACTERS_ALLOWED'];?>
  </span><span id="credit" style="margin-left:30px;">1</span> <?php echo $_smarty_tpl->getVariable('LANG')->value['CREDIT'];?>
 
								</p>
								<p id="contact_list" style="display:none;">
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['CHOOSE_CONTACT_LIST'];?>
<span style="margin-left:150px;color:red;"><a href="javascript:show(2);"><?php echo $_smarty_tpl->getVariable('LANG')->value['ORDINARY_MOBILE_LIST'];?>
</a></span></label>
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
 (<?php echo $_smarty_tpl->getVariable('contact_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['contact']['index']]->contact_list_count;?>
)<br>
									<?php endfor; endif; ?>
								</p>
								<p id="ordinary_list" >
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['ORDINARY_MOBILE_LIST'];?>
<span style="margin-left:150px;"><a href="javascript:show(1);"><?php echo $_smarty_tpl->getVariable('LANG')->value['CHOOSE_CONTACT_LIST'];?>
</a></span></label>
									<textarea cols="70" rows="12" name="mobile_list" id="mobile_list"></textarea>
									
								</p>
								<p>
									<label><?php echo $_smarty_tpl->getVariable('LANG')->value['SEND_MESSAGES_FROM'];?>
</label>
									<select name="userapi_id">
									<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['api']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['name'] = 'api';
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('api_list')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['api']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['api']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['api']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['api']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['api']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['api']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['api']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['api']['total']);
?>
											<?php if ($_smarty_tpl->getVariable('api_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['api']['index']]->api_type==0){?>
											<option value="<?php echo $_smarty_tpl->getVariable('api_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['api']['index']]->userapi_id;?>
" selected="selected"><?php echo $_smarty_tpl->getVariable('LANG')->value['SYSTEM_DEFAULT'];?>
</option>
											<?php }else{ ?>
											<option value="<?php echo $_smarty_tpl->getVariable('api_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['api']['index']]->userapi_id;?>
"><?php echo $_smarty_tpl->getVariable('api_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['api']['index']]->sender_name;?>
</option>
											<?php }?>
									<?php endfor; endif; ?>
									</select>
									
										
								</p>
								<p>
								<label><?php echo $_smarty_tpl->getVariable('LANG')->value['NO_REPEAT_PHONE_NUMBER'];?>
</label>
								<input type="checkbox" checked="checked" name="norepeat" id="norepeat" value="1"/><?php echo $_smarty_tpl->getVariable('LANG')->value['YES'];?>

								</p>
								<p>
								<input class="button" name="isentry" id="isentry" type="hidden" />
									<input class="button" name="submit" id="submit" type="submit" value="<?php echo $_smarty_tpl->getVariable('LANG')->value['SUBMIT'];?>
" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
			</div> <!-- End .content-box -->
		
			<div class="clear"></div>
			

			
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('admin_theme')->value)."/include/foot.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script type="text/javascript">
function show(i){
	$("#contact_list").slideToggle();
	$("#ordinary_list").slideToggle();
}

function checkCharacters(text){
	/*var reg=/^[0-9\,]+$/;*/
		
	var reg=/[\u4e00-\u9fa5]+/;
	var chareacter_type="en";
	if(reg.test(text)){
		chareacter_type="unicode";
	}
	countCharacters($("#message_content").val(),chareacter_type);
}
function countCharacters(text,chareacter_type){

	var i=text.length;
		if(chareacter_type=="unicode"){
		if(i<=70){
			$("#count").attr("value",text.length);
			$("#max").text(70);
			$("#credit").text(1);
		}else if(i>70&&i<=140){
			$("#count").attr("value",text.length);
			$("#max").text(140);
			$("#credit").text(2);
		}else if(i>140&&i<=210){
			$("#count").attr("value",text.length);
			$("#max").text(210); 
			$("#credit").text(3);
		}else if(i>210&&i<=280){
			$("#count").attr("value",text.length);
			$("#max").text(280);
			$("#credit").text(4); 
		}else if(i>280){
		$("#count").attr("value",text.length);
			$("#count").attr("content",$("#message_content").attr("value",text.substr(0,612)));
			$("#count").attr("value",612);
			alert("Too long to sent");
			return false;
		}
	}else if(chareacter_type=="en"){
		if(i<=160){
			$("#count").attr("value",text.length);
			$("#max").text(160);
			$("#credit").text(1);
		}else if(i>160&&i<=306){
			$("#count").attr("value",text.length);
			$("#max").text(306);
			$("#credit").text(2);
		}else if(i>306&&i<=459){
			$("#count").attr("value",text.length);
			$("#max").text(459); 
			$("#credit").text(3);
		}else if(i>459&&i<=612){
			$("#count").attr("value",text.length);
			$("#max").text(612);
			$("#credit").text(4); 
		}else if(i>612){
		$("#count").attr("value",text.length);
			$("#count").attr("content",$("#message_content").attr("value",text.substr(0,612)));
			$("#count").attr("value",612);
			alert("Too long to sent");
			return false;
		}
	}
	//alert(i);
}
$("#ordinary_list").onkeyup(function(){
	//alert("123");
});           
function checkMessage(){
	if($("#message_content").val()==""){
		alert("Please entry the message content");
		$("#message_content").focus();
		return false;
	}
	if(document.getElementById("contact_list").style.display!="none"){
		var i=0;
		$("[name='contact_list_id[]']").each(function(m){				
				if($(this).attr("checked")==true){	
					i=i+1;
				}
		});
		if(i==0){
			alert("Please choose the contact list!");
			return false;
		}
		$("#isentry").attr("value","no");
	}else if(document.getElementById("ordinary_list").style.display!="none"){
		var reg=/^[0-9\,]+$/;	
		if(!reg.test($("#mobile_list").val())){
		   alert("Sorry,you must entry validate number.");
		   $("#mobile_list").focus();
		   return false;
		}
		$("#isentry").attr("value","yes");
	}
	
	return true;
}                                                                    
</script>
