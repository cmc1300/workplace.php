
{include file="$admin_theme/include/top.tpl"}
	
{include file="$admin_theme/include/left.tpl"}
		
		<div id="main-content"> <!-- Main Content Section with everything -->			
			
			{include file="$admin_theme/include/pageheader.tpl"}
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">{$LANG.SET}</a></li> <!-- href must be unique and match the id of target div -->
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<div class="notification information png_bg">
							<a href="javascirpt:void(0);" class="close"><img src="{$admin_image}/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								{$LANG.SET_UP_CHARGE_STANDARD}				
							</div>
					</div>
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<form action="setUpCharge.php?method={if $method!='update'}add{else}update{/if}" name="form" method="post" onsubmit="return Check()">
						<table>
							<tbody>
								<tr>
										<td><label>multiple</label></td>
										<td><input type="text" class="text-input small-input" name="multiple" id="multiple" value="{$setUpChargeObj->multiple}" /></td>
								</tr>
								<tr align="right">
										<td ><input class="button" name="submit" id="submit" type="submit" value="{$LANG.SUBMIT}" /></td>
								</tr>
							</tbody>
						</table>
						</form>
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
		
			<div class="clear"></div>
			

			
		{include file="$admin_theme/include/foot.tpl"}
	<script type="text/javascript">
		function Check(){
			var form=document.form;
			if(form.multiple.value==""){
			  alert("Please enter the Numbers！");
			  form.multiple.focus();
			  return false;
		    }
		}
	</script>
