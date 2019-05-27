<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NetCube - Exclusive Unlimited internet just got smarter</title>
<!--  -->
<meta name="description" content="With the world first smart router, NetCube give you the Unlimited Internet service, with absolute freedom!">
<meta name="keywords" content="ADSL2+, ADSL, Unlimited, NBN, Internet, Mobile, IPTV, Broadband, Router, Phone">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link rel="icon" href="http://netcube.com.au/favicon.ico" />
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/flexSlider/flexslider.css" />
<link rel="stylesheet" href="css/iCheck/minimal.css" />
<link rel="stylesheet" href="css/dateTime/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<!--[if IE 7]>


<link rel="stylesheet" href="css/ie7.css">
<![endif]-->
 		
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54649736-12', 'auto');
  ga('send', 'pageview');

</script>		
 		 		
<script>

$(function() {
    $( "#succ-dialog-message" ).dialog({
    	autoOpen: false,
		width:  screen.width/3,
		height: screen.height/4, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 1000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
        	$( "#form1" ).submit();
        }
    });

    $( "#fail-dialog-message" ).dialog({
    	autoOpen: false,
		width:  screen.width/3,
		height: screen.height*3/10, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 1000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
        	window.location.href = '../index.php';
        }
    });

    $( "#name-dialog-message" ).dialog({
    	autoOpen: false,
		width:  screen.width/3,
		height: screen.height/4, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 1000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
        	$("#name").focus();
        }
    });
    
    $( "#phone-dialog-message" ).dialog({
    	autoOpen: false,
		width:  screen.width/3,
		height: screen.height/4, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 1000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
        	$("#phone").focus();
        }
    });

    $( "#correct-phone-dialog-message" ).dialog({
    	autoOpen: false,
		width:  screen.width/3,
		height: screen.height/4, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 1000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
        	$("#phone").val("");
        	$("#phone").focus();
        }
    });

    $( "#email-dialog-message" ).dialog({
    	autoOpen: false,
		width:  screen.width/3,
		height: screen.height/4, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 1000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
        	$("#email").focus();
        }
    });

    $( "#correct-email-dialog-message" ).dialog({
    	autoOpen: false,
		width:  screen.width/3,
		height: screen.height/4, 
		modal: true,
		show: {
	        effect: "blind",
	        duration: 1000
	    },
		hide: {
	        effect: "explode",
	        duration: 2000
		},
		buttons: {
        	Ok: function() {
          	$( this ).dialog( "close" );
        	}
     	},
        close: function() {
        	$("#email").val("");
			$("#email").focus();
        }
    });
    
       
  });
  
function checkInputParameters() {
		
	if( $("#name").val()== ""){
		//alert("Please enter your name!");
		setTimeout(function(){
			$( "#name-dialog-message" ).dialog( "open" );
			}, 500);
		return false;
	}

	if( $("#phone").val()== ""){
		//alert("Please enter your phone!");
		setTimeout(function(){
			$( "#phone-dialog-message" ).dialog( "open" );
			}, 500);
		return false;
	}
	else if ($("#phone").val().length < 10 || $.isNumeric($("#phone").val())==false  || $("#phone").val().charAt(0)!='0') {
		setTimeout(function(){
			$( "#correct-phone-dialog-message" ).dialog( "open" );
			}, 500);
		return false;
	}

	if( $("#email").val()== ""){
		//alert("Please enter your email!");
		setTimeout(function(){
			$( "#email-dialog-message" ).dialog( "open" );
			}, 500);
		return false;
	} 
	else {
		var email_re = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
		if (!email_re.test($("#email").val())) {
			//alert("Please enter email of correct format!");
			setTimeout(function(){
			$( "#correct-email-dialog-message" ).dialog( "open" );
			}, 500);
			return false;
		}
	}

	if( $("#code").val()== ""){
		alert("Please enter your code!");
		$("#code").focus();
		return false;
	}

    $.ajax({
    	type: "post",
		url: "./landpageSeptCheck.php",
		dataType: "html",
		data:{action:"check",phone:$("#phone").val(),email:$("#email").val()},
		error: function(xhr){
			  $("#ajaxResult").val("An error occured: " + xhr.responseText);
			  console.log("An ajax error occured: " + xhr.responseText);
			  /*
			  alert("An ajax error occured: " + xhr.responseText);
			  return false;*/
		    },
		success: function(response){
			var verify = "Result of successful verifying landing page: "+ response;
			$("#ajaxResult").val(verify.trim());
			console.log(verify);
			var pos1 = verify.search("Phone or E-mail did not exist");
			var pos2 = verify.search("Email and/or phone number already taken");
			//alert("pps1: " + pos1 + " pos2: " + pos2);
			if (pos1 > 0) {
				//alert("Thank you for selecting NetCube. \n\nOur sales team will be in contact with you soon to complete the sign up.");		
				setTimeout(function(){
					$("#ajaxResult").val("successful");
					$( "#succ-dialog-message" ).dialog( "open" );
					}, 500);					
			}
			else if (pos2 > 0) {
				//alert("Phone or E-mail has already existed!");
				setTimeout(function(){
					$("#ajaxResult").val("fail");
					$( "#fail-dialog-message" ).dialog( "open" );
					}, 500);
			}
			else {
				//alert("Failed to submit your sign up!");
				return false;
			}
    }});

    if ($("#ajaxResult").val() == "successful") {
    	console.log("successful");
    	return true;
    }
    else {
    	console.log("failed");
        return false;
    }
}


$(document).ready(function(){

	$zopim(function() {
		$zopim.livechat.window.setPosition('br');
		$zopim.livechat.button.setPosition('br')
		$zopim.livechat.window.setOffsetHorizontal(screen.width*3/10 - 314);
	});
	  
	  $("button").click(function(){
		
		if (false) {
		//if (checkInputParameters()) {	

			/*
		    $.ajax({
		    	type: "post",
		    	crossDomain: true,
	    		//url: "../sq/sqquery.php",
	    		url: "../biz/common.php",
	    		dataType: "text",
	    		data:{'action':'emailnewsletter','formVal':'11',name:$("#name").val(),phone:$("#phone").val(),email:$("#email").val(),code:$("#code").val()},
	    		error: function(xhr){
	     		      alert("An error occured first: " + xhr);
	    		      console.log(xhr);
	    		    },
	    		success: function(data){
					if(data==""){
						alert("Thank you for selecting NetCube. \n\nOur sales team will be in contact with you soon to complete the sign up.");
					}else if(data.indexOf("You are already subscribed")>0){
						alert("You are already subscribed to list.");	
					}
					console.log(data);
					//window.location.href = '../index.php';
		    	}
	    	});  */
			
			/*		
		    $.ajax({
		    	type: "post",
	    		url: "dave.php",
	    		dataType: "text",
	    		data:{name:$("#name").val(),phone:$("#phone").val(),email:$("#email").val(),code:$("#code").val()},
	    		error: function(xhr){
	     		      alert("An error occured first: " + xhr);
	    		      console.log(xhr);
	    		    },
	    		success: function(data){
					if(data==""){
						//alert("Thank you for selecting NetCube. \n\nOur sales team will be in contact with you soon to complete the sign up.");
					}else if(data.indexOf("You are already subscribed")>0){
						alert("You are already subscribed to list.");	
					}
					console.log(data);
					//window.location.href = '../index.php';
		    	}
	    	}); */

			/*		*/
		    $.post("dave.php",
	    		{name:$("#name").val(),phone:$("#phone").val(),email:$("#email").val(),code:$("#code").val()},
	    		function(data,status){
	    			//alert("Data: " + data + "\nStatus: " + status);
					console.log("Data: " + data + "\nStatus: " + status);
					//window.location.href = '../index.php';
		    	}); 
		    	
		    	
	    	/*    
		    $.ajax({
		    	type: "post",
	    		//url: "../thorn/admin/landpageAdd.php",
	    		url: "http://netcube.com.au/thorn/admin/landpageAdd.php",
	    		dataType: "html",
	    		data:{action:"add",name:$("#name").val(),phone:$("#phone").val(),email:$("#email").val(),code:$("#code").val()},
	    		//data:{action:"add",method:"loginByUser",email:$("#blank-box #emailAddress").val(),password:$("#blank-box #password").val()},
	    		error: function(xhr){
	    		      //alert("An error occured first: " + xhr);
	    		      console.log(xhr);
	    		    },
	    		success: function(response){
					var pos1 = response.search("Landpage has been added successfully");
					var pos2 = response.search("Phone or E-mail has already existed");
					$("#save_result").val("YES");
					console.log(response);
					if (pos1 > 0) {
						alert("Thank you for selecting NetCube. \n\nOur sales team will be in contact with you soon to complete the sign up.");
						//window.location.href = '../index.php';
					}
					else if (pos2 > 0) {
						alert("Phone or E-mail has already existed!");
					}
					else {
						alert("Failed to submit your sign up!");
					}
		    }});*/
		    
		} 
			
	  });
	});
</script>

</head>
<body style="background-image:url(img/NC-dealer-Recreational-LP_bg.jpg); background-repeat:no-repeat; background-color: #f5f5f5; background-size:100%;">

<div class="contentBox" align="center">

<table border="0" align="center">
  <tr>
  	  <td align="right" style="vertical-align:top;">
  		<img src="img/NC-landing-megatalk-01.png" width="915" alt="" border="0">
  		
  		<div style="width: 915px;vertical-align:top;padding-top:20px;padding-left:60px;">
			<div align="left" >
			<h1 style="color:#00a1df">Get Unlimited NBN / ADSL 2+ & Calls</h1>
			<p><strong>NetCube is powered by Australia's Largest Network Provider.</strong></p>

<p>Love the freedom to talk and download with no restrictions, Megatalk is the one to go for!</p>

<p>For <strong>only $89.95 per month</strong> you can enjoy <strong>Unlimited internet</strong> access, <strong>Unlimited phone calls</strong> within Australia plus <strong>Unlimited international calls</strong> to 29 countries*. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font style="font-size:11px"><a href="http://netcube.com.au/twenty_countries.php" target="_blank" style="text-decoration:underline">*Click here to view the 29 Countries/Regions list</a></font></p> <br>
            
            <table width="100%" border="0">
  <tr>
    <td style="background-image:url(img/NC-dealer-Recreational-LP-greybg_box.png); background-repeat:no-repeat; width:400px; height:150px; background-size:100% 100%;"><p style="padding: 10px 10px 0px 20px; font-size:16px;  line-height:2"><strong>Unlimited ADSL2+/ NBN & Calls</strong><br>
&bull; No excess charges<br>
&bull; No peak/off-peak times<br>
&bull; Line rental Included<br>
&bull; Free setup on 24 months contract</p></td>
            <td style="width:5px">&nbsp;</td>
   <td style="background-image:url(img/NC-dealer-Recreational-LP-greybg_box.png); background-repeat:no-repeat; width:400px; height:150px; background-size:100% 100%; vertical-align:top"><p style="padding: 10px 10px 0px 20px; font-size:16px; line-height:2"><strong>Features</strong><br>
&bull; FREE WiFi router<br>
&bull; FREE 15G Google drive storage<br>
&bull; FREE Google Apps email account<br>
&bull; Powered by Australia’s largest network</p></td>
  </tr>
 
</table>
			
			<br><br>
			<p>Register your interest today and we'll get back to you with more details. <br>

Contact us now on 1300 58 68 78 and quote <strong style="color:#00a1df">Our Online Promo Code: MEGATALK  </strong></p><br>
			<!--  
			<table border="0">
			  <tr>
			    <td style="font-size:26px; width: 250px"><strong style="color:#00a1df">Promo Code:</strong></td>
			    <td  align="center" style="background-image:url(img/NC-dealer-Recreational-LP-greybgpromo.png);  width:250px; height:40px; background-size:100% 100%; background-repeat:no-repeat">
			    <strong style="color:#00a1df;font-size:32px">GOOADW39</strong>
			    &nbsp;
			    </td>
			  </tr>
			</table>
			<br>	
			<br>
			-->
			<p style="font-size:12px"># Service not available in all areas.  24 months contract only.<br />
            # All calls are made via VoIP service. <br />
			#  Mininum cost for 24 months is $2178.80 ($89.95 x 24 months + $20 delivery fee + $0 setup fee). </p>
			<br><br>
		</div>
  		</div>		
  	  </td>
  	  
      <td align="left" style="vertical-align:top;">
        <img src="img/NC-dealer-Recreational-LP-logo.png" style="padding-left:18px; width:290px; height:62px" alt="" border="0">
        <br>
        <img src="img/NC-dealer-bluebar-bg.png" style="padding-left:18px;padding-top:15px;width:308px;" alt="Sign Up Now">    
        
        <form method="post" action="./landpageSeptAdd.php" onsubmit="return checkInputParameters()" id="form1" name="form1">
      	<div style="width:308px;padding-left:18px;vertical-align:top;">
		  <div class="form-group" style="background-image:url(img/NC-dealer-whiteside-bg.png); background-size:100% 100%; background-repeat:no-repeat;">
			<div style="padding-top:10px;padding-left:15px;padding-right:15px">
				<input type="text" class="form-control" style="background-color:#F0F0F0" name="name" id="name" placeholder="Name*">
			</div>
			<div style="padding-top:10px;padding-left:15px;padding-right:15px">
		    	<input type="text" class="form-control" style="background-color:#F0F0F0" name="phone" id="phone" maxlength="10" placeholder="Phone* e.g. 0412345678">
		    </div>
		    <div style="padding-top:10px;padding-left:15px;padding-right:15px">
				<input type="text" class="form-control" style="background-color:#F0F0F0" name="email" id="email" placeholder="Email address*">
			</div>
			<div style="padding-top:10px;padding-left:15px;padding-right:15px">
				<input type="text" disabled class="form-control" style="background-color:#F0F0F0" name="code" id="code" value="Promo Code: MEGATALK">
				<input type="hidden" name="action" id="action" value="add" />
				<input type="hidden" name="ajaxResult" id="ajaxResult" value="none" />
				
			</div>
			<div class="lp-element lp-pom-text nlh" style="padding-top:10px;padding-bottom:10px;padding-left:80px;padding-right:80px;align-items:center;background:transparent">
				<button type="submit" id="sign_up" style="padding:0px;border-style:none;background:transparent"" >
					<img src="img/NC-dealer-org-btn.png" >
				</button>
			</div>
			</form>
			<p style="text-align:left;font-size:9px;padding: 0px 15px 10px 15px">
			By entering your details you agree that NetCube Services Pty Ltd will use your information to market products and services to you.
			This information will be disclosed to your agents and contractors, some of whom reside outside of Australia.
			For further information about how we collect and disclose your personal information, please see our Privacy Policy and Privacy Collection Statement.
			</p>
		  </div>
		</div>
		
		<div style="padding-left:18px;padding-top:15px;vertical-align:top;"  >
			<img src="img/NC-dealer-Recreational-LP-callus.png" style="width:290px;" alt="" border="0"><br><br>
		</div>
		
		<div style="padding-left:18px;padding-top:0px;vertical-align:top;"  >
		<table border="0">
			  <tr>
			    <td style="font-size:26px; width: 250px; padding-bottom:10px; text-align:center"><strong style="color:#00a1df">Promo Code</strong></td>
			  </tr>
			  <tr>
			    <td  align="center" style="text-align:center; background-image:url(img/NC-dealer-Recreational-LP-greybgpromo.png);  width:290px; height:40px; background-size:100% 100%; background-repeat:no-repeat">
			    <strong style="color:#00a1df;font-size:32px">MEGATALK</strong>
			    &nbsp;
			    </td>
			  </tr>
		</table>
		</div>
      </td>
  </tr>
</table>
</div>

<div id="succ-dialog-message" title="Thank you">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    A member of our team will be in contact with you shortly.
  </p>
  <p>
    Please click OK and return to <b>NetCube Home Page</b>.
  </p>
</div>

<div id="fail-dialog-message" title="Thank you">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Your enquiry have already been registered.<br />A member of our team will be in contact with you shortly.
  </p>
  <p>
    Please click OK and return to <b>NetCube Home Page</b>.
  </p>
</div>

<div id="name-dialog-message" title="Please check input">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Please enter your name!
  </p>
</div>

<div id="phone-dialog-message" title="Please check input">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Please enter your phone!
  </p>
</div>

<div id="correct-phone-dialog-message" title="Please check input">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Please enter phone of correct format!
  </p>
</div>

<div id="email-dialog-message" title="Please check input">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Please enter your email!
  </p>
</div>

<div id="correct-email-dialog-message" title="Please check input">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Please enter email of correct format!
  </p>
</div>

<!--top over--> 

<!--Start of Zopim Live Chat Script--> 
  
<script>
//window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set._.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');$.src='//v2.zopim.com/?1XZ08TXlxE0QkNHJaDIoATOBxhHhdU0v';z.t=+new Date;$.type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');

window.$zopim||(
		function(d,s){
			var z=$zopim=function(c){
				z._.push(c)},
				$=z.s=d.createElement(s),
				e=d.getElementsByTagName(s)[0];
				z.set=function(o){
					z.set._.push(o)};
					z._=[];z.set._=[];
					$.async=!0;
					$.setAttribute('charset','utf-8');
					$.src='//v2.zopim.com/?1XZ08TXlxE0QkNHJaDIoATOBxhHhdU0v';
					z.t=+new Date;
					$.type='text/javascript';
					e.parentNode.insertBefore($,e)
				}
		)(document,'script');


</script>
<!--End of Zopim Live Chat Script--> 

<!--content start-->

<!--content over-->
</body></html>