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
<!--<link rel="stylesheet" href="css/style.css">-->
<link rel="stylesheet" href="css/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<!--[if IE 7]>


<link rel="stylesheet" href="css/ie7.css">
<![endif]-->
 		 		
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
	else if ($("#phone").val().length < 10 || $.isNumeric($("#phone").val())==false || $("#phone").val().charAt(0)!='0') {
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
		$zopim.livechat.button.setPosition('br');
		//$zopim.livechat.window.setOffsetHorizontal(screen.width*3/10 - 314);
		$zopim.livechat.window.setOffsetHorizontal(10);
	});
	  
	  $("button").click(function(){
		
		if (false) {
			/*		*/
		    $.post("dave.php",
	    		{name:$("#name").val(),phone:$("#phone").val(),email:$("#email").val(),code:$("#code").val()},
	    		function(data,status){
	    			//alert("Data: " + data + "\nStatus: " + status);
					console.log("Data: " + data + "\nStatus: " + status);
					//window.location.href = '../index.php';
		    	}); 
		    	
		    			    
		} 
			
	  });
	});
</script>



</head>

<body>

<!-- Offer Conversion: AU CPL - Netcube -->
<!--  -->
<iframe src="http://tracking.umdirect.com.au/SLkQ?adv_sub=<?php 
	if (!empty($_REQUEST['email'])) {
		echo $_REQUEST['email'];
	}
	else if (!empty($_COOKIE["savelandingemail"])) {
		echo $_COOKIE["savelandingemail"];
	}
	else {
		echo "antonio.diiorio@novatel.com.au";
	}?>" scrolling="no" frameborder="0" width="1" height="1">
</iframe>
<!-- // End Offer Conversion -->

<div style="height:10px; background-color:#00a1df; border:0;"></div>

<div style="Text-align:center;"> 
	<img src="img/NC-dealer-Recreational-LP-logo.png" style="padding-left:18px; width:290px; height:62px; margin:30px 61px 50px 0;" alt="" border="0">
    <h1 style="color:#00a1df">Thank You</h1>
    <p style="">One of our team members will contact you shortly.</p> 
    <a  href="http://www.netcube.com.au" target="_blank" style="text-decoration:underline">
		<strong style="color:#00a1df; font-size:16px; display:block;">You can check other plans here</strong>
	</a> 
    <img src="img/mr-cube.jpg" alt="" border="0">

</div>



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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54649736-6', 'auto');
  ga('send', 'pageview');

</script>
<!--content over-->

<!-- Google Code for lp-conversion Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 969568108;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "9uKnCOzuiloQ7N6pzgM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/969568108/?label=9uKnCOzuiloQ7N6pzgM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body></html>