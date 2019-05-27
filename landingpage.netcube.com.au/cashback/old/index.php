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

<style>
input.invalid {
    border: 3px solid #ec8200;
}
</style>

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

function checkNameInput() {
	var windowsize = $(window).width();
	if( windowsize>=1024) {
		if( $("input.namedesktop").val()== ""){
			$("input.namedesktop").addClass("invalid");
			$("span.namedesktop").html("Please enter your name!");
			$("span.namedesktop").css({ display: "block" });
		}
		else {
			$("input.namedesktop").removeClass("invalid");
			$("span.namedesktop").css({ display: "none" });
			return true;
		}
	}
	else if( windowsize<1024 && windowsize>=768) {
		if( $("input.nametablet").val()== ""){
			$("input.nametablet").addClass("invalid");
			$("span.nametablet").html("Please enter your name!");
			$("span.nametablet").css({ display: "block" });
		}
		else {
			$("input.nametablet").removeClass("invalid");
			$("span.nametablet").css({ display: "none" });
			return true;
		}
	}
	else {
		if( $("input.namemobile").val()== ""){
			$("input.namemobile").addClass("invalid");
			$("span.namemobile").html("Please enter your name!");
			$("span.namemobile").css({ display: "block" });
		}
		else {
			$("input.namemobile").removeClass("invalid");
			$("span.namemobile").css({ display: "none" });
			return true;
		}
	}
	return false;
}


function checkPhoneInput() {
	var windowsize = $(window).width();
	if( windowsize>=1024) {
		if( $("input.phonedesktop").val()== ""){
			$("input.phonedesktop").addClass("invalid");
			$("span.phonedesktop").html("Please enter your phone!");
			$("span.phonedesktop").css({ display: "block" });
		}
		else if ($("input.phonedesktop").val().length < 10 || $.isNumeric($("input.phonedesktop").val())==false || $("input.phonedesktop").val().charAt(0)!='0') {
			$("input.phonedesktop").addClass("invalid");
			$("span.phonedesktop").html("Please enter phone of correct format!");
			$("span.phonedesktop").css({ display: "block" });
		}
		else {
			$("input.phonedesktop").removeClass("invalid");
			$("span.phonedesktop").css({ display: "none" });
			return true;
		}
	}
	else if( windowsize<1024 && windowsize>=768) {
		if( $("input.phonetablet").val()== ""){
			$("input.phonetablet").addClass("invalid");
			$("span.phonetablet").html("Please enter your phone!");
			$("span.phonetablet").css({ display: "block" });
		}
		else if ($("input.phonetablet").val().length < 10 || $.isNumeric($("input.phonetablet").val())==false || $("input.phonetablet").val().charAt(0)!='0') {
			$("input.phonetablet").addClass("invalid");
			$("span.phonetablet").html("Please enter phone of correct format!");
			$("span.phonetablet").css({ display: "block" });
		}
		else {
			$("input.phonetablet").removeClass("invalid");
			$("span.phonetablet").css({ display: "none" });
			return true;
		}
	}
	else {
		if( $("input.phonemobile").val()== ""){
			$("input.phonemobile").addClass("invalid");
			$("span.phonemobile").html("Please enter your phone!");
			$("span.phonemobile").css({ display: "block" });
		}
		else if ($("input.phonemobile").val().length < 10 || $.isNumeric($("input.phonemobile").val())==false || $("input.phonemobile").val().charAt(0)!='0') {
			$("input.phonemobile").addClass("invalid");
			$("span.phonemobile").html("Please enter phone of correct format!");
			$("span.phonemobile").css({ display: "block" });
		}
		else {
			$("input.phonemobile").removeClass("invalid");
			$("span.phonemobile").css({ display: "none" });
			return true;
		}
	}
	return false;
}

function checkEmailInput() {
	var windowsize = $(window).width();
	var email_re = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;

	if( windowsize>=1024) {
		if( $("input.emaildesktop").val()== ""){
			$("input.emaildesktop").addClass("invalid");
			$("span.emaildesktop").html("Please enter your email!");
			$("span.emaildesktop").css({ display: "block" });
		}
		else if ( !email_re.test($("input.emaildesktop").val()) ) {
			$("input.emaildesktop").addClass("invalid");
			$("span.emaildesktop").html("Please enter email of correct format!");
			$("span.emaildesktop").css({ display: "block" });
		}
		else {
			$("input.emaildesktop").removeClass("invalid");
			$("span.emaildesktop").css({ display: "none" });
			return true;
		}
	}
	else if( windowsize<1024 && windowsize>=768) {
		if( $("input.emailtablet").val()== ""){
			$("input.emailtablet").addClass("invalid");
			$("span.emailtablet").html("Please enter your email!");
			$("span.emailtablet").css({ display: "block" });
		}
		else if ( !email_re.test($("input.emailtablet").val()) ) {
			$("input.emailtablet").addClass("invalid");
			$("span.emailtablet").html("Please enter email of correct format!");
			$("span.emailtablet").css({ display: "block" });
		}
		else {
			$("input.emailtablet").removeClass("invalid");
			$("span.emailtablet").css({ display: "none" });
			return true;
		}
	}
	else {
		if( $("input.emailmobile").val()== ""){
			$("input.emailmobile").addClass("invalid");
			$("span.emailmobile").html("Please enter your email!");
			$("span.emailmobile").css({ display: "block" });
		}
		else if ( !email_re.test($("input.emailmobile").val()) ) {
			$("input.emailmobile").addClass("invalid");
			$("span.emailmobile").html("Please enter email of correct format!");
			$("span.emailmobile").css({ display: "block" });
		}
		else {
			$("input.emailmobile").removeClass("invalid");
			$("span.emailmobile").css({ display: "none" });
			return true;
		}
	}
	return false;
}

function checkInputParameters(type) {
	/*
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
	*/
	console.log("index.php checkInputParameters calls type: " + type);
	if ( $("#ajaxResult").val() == "none"  ) {
		if (!checkNameInput() || !checkPhoneInput() || !checkEmailInput()) {
			return false;
		}
	}
	else if ( $("#ajaxResult").val() == "successful"  ){
		return true;
	}

	var windowsize = $(window).width();
	var phone = "";
	var email = "";
	if( windowsize>=1024) {
		phone = $("input.phonedesktop").val();
		email = $("input.emaildesktop").val();
	}
	else if( windowsize<1024 && windowsize>=768) {
		phone = $("input.phonetablet").val();
		email =  $("input.emailtablet").val();
	}
	else {
		phone = $("input.phonemobile").val();
		email = $("input.emailmobile").val();
	}
	/*
	$.ajax({
    	type: "post",
		url: "./landpageCount.php",
		dataType: "html",
		data:{action:"check",email:email},
		error: function(xhr){
			console.log("An ajax error occured in landpageCount.php: " + xhr.responseText);
		    },
		success: function(response){
			console.log("Successful invoking of landpageCount.php: " + response);
    }});*/

	$.ajax({
    	type: "post",
		url: "http://tracking.umdirect.com.au/SLkQ",
		dataType: "html",
		data:{adv_sub:email},
		error: function(xhr){
			console.log("An ajax error occured in tracking.umdirect.com.au: " + xhr.responseText);
		    },
		success: function(response){
			console.log("Successful invoking of tracking.umdirect.com.au: " + response);
    }});

    $.ajax({
    	type: "post",
		url: "./landpageSeptCheck.php",
		dataType: "html",
		data:{action:"check",phone:phone,email:email},
		error: function(xhr){
			  $("#ajaxResult").val("An error occured in landpageSeptCheck.php: " + xhr.responseText);
			  console.log("An ajax error occured: " + xhr.responseText);
			  /*
			  alert("An ajax error occured: " + xhr.responseText);
			  return false;*/
		    },
		success: function(response){
			var verify = "Result of successful verifying landing page landpageSeptCheck.php: "+ response;
			$("#ajaxResult").val(verify.trim());
			console.log(verify);
			var pos1 = verify.search("Phone or E-mail did not exist");
			var pos2 = verify.search("Email and/or phone number already taken");
			//alert("pps1: " + pos1 + " pos2: " + pos2);
			if (pos1 > 0) {
				//alert("Thank you for selecting NetCube. \n\nOur sales team will be in contact with you soon to complete the sign up.");
				/*
				setTimeout(function(){
					$("#ajaxResult").val("successful");
					$( "#succ-dialog-message" ).dialog( "open" );
					}, 500);	*/

				$("#ajaxResult").val("successful");
				if( windowsize>=1024) {
					setTimeout(function(){
						$( "#formdesktop").submit();
						}, 500);
					//$( "#formdesktop").submit();
				}
				else if( windowsize<1024 && windowsize>=768) {
					setTimeout(function(){
						$( "#formtablet").submit();
						}, 500);
					//$( "#formtablet").submit();
				}
				else {
					setTimeout(function(){
						$( "#formmobile").submit();
						}, 500);
					//$( "#formmobile").submit();
				}
			}
			else if (pos2 > 0) {
				//alert("Phone or E-mail has already existed!");
				/*
				setTimeout(function(){
					$("#ajaxResult").val("fail");
					$( "#fail-dialog-message" ).dialog( "open" );
					}, 500);
				*/
				$("#ajaxResult").val("fail");
				window.location.href = "http://landing.netcube.com.au/thank-you.php" + "?email=" + $("#email").val();
			}
			else {
				//alert("Failed to submit your sign up!");
				return false;
			}
    }});

    if ($("#ajaxResult").val() == "successful") {
    	console.log("checkInputParameters successful");
    	return true;
    }
    else {
    	console.log("checkInputParameters failed");
        return false;
    }
}


$(document).ready(function(){

	//scroll
	var textScrollBox;
	$(".textScrollBox").hover(function(){
	clearInterval(scrtime1);
	},function(){
		scrtime1 = setInterval(function(){
		var $ul = $(".textScrollBox ul");
		var liHeight = $ul.find("li:last").height();
		$ul.animate({marginTop : liHeight+24 +"px"},1000,function(){
		$ul.find("li:last").prependTo($ul)
		$ul.find("li:first").hide();
		$ul.css({marginTop:0});
		$ul.find("li:first").fadeIn(1000);
		});
		},8000);
	}).trigger("mouseleave");

	/*
	$zopim(function() {
		$zopim.livechat.window.setPosition('br');
		$zopim.livechat.button.setPosition('br');
		//$zopim.livechat.window.setOffsetHorizontal(screen.width*3/10 - 314);
		$zopim.livechat.window.setOffsetHorizontal(10);
	});
	*/

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

<!--scroll-->
<script>
    function scrollNav() {
    $('.bottom-cta a').click(function () {
        $('.active').removeClass('active');
        $(this).closest('li').addClass('active');
        var theClass = $(this).attr('class');
        $('.' + theClass).parent('li').addClass('active');
        $('html, body').stop().animate({ scrollTop: $($(this).attr('href')).offset().top - 160 }, 400);
        return false;
    });
    $('.scrollTop a').scrollTop();
}
scrollNav();
    //@ sourceURL=pen.js
</script>



</head>

<body style="font-family: dinMedium, 'Open Sans', Helvetica, sans-serif, Arial">

<input type="hidden" name="ajaxResult" id="ajaxResult" value="none" />

<div class="contentBox" style="padding-top: 20px;" align="center">
  <div class="container">

    <div class="row visible-md visible-lg" style="max-width:1000px">
	    <table align="right" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td align="left" style="width:20%; vertical-align:middle">
						<img src="img/Desktop/logo.jpg"  class="img-responsive" style="min-width:190px;max-width:210px">
					</td>
					<td align="right" style="width:80%; vertical-align:middle">
            <div style="line-height: 1.1em; font-size: 350%; color: #2481c2; display: block; margin: 0; font-family: dinBold, 'Open Sans', Helvetica, sans-serif, Arial; text-shadow: 1px 3px 5px rgba(0,0,0,0.4);">NO LOCKED IN CONTRACT</div>
						<!-- <table align="right" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0" style="width:315px;">
						<tbody>
							<tr>
								<td align="left" style="vertical-align:middle">
									<div>
							    		<img src="img/Desktop/phone.jpg"  class="img-responsive">
									</div>
								</td>
								<td align="right" style="vertical-align:middle ">
									<div style="padding-right: 15px;">
							    		<p class="lead" style="font-size: 310%; color:#0f4879;display: inline;">
											<strong>1300 58 68 78</strong>
										</p>
							    	</div>
								</td>
							</tr>
						</tbody>
						</table> -->
					</td>
				</tr>
			</tbody>
		</table>
		<div class="clearfix"></div>
		<hr style="margin-top: 1px;margin-bottom: 20px;">
	</div>

	<div class="row visible-sm" style="max-width:1000px">
	    <table align="right" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td align="left" style="width:20%; vertical-align:middle">
						<img src="img/Tablet/logo-tablet.jpg"  class="img-responsive" style="min-width:180px;max-width:190px">
					</td>
					<td align="right" style="width:20%; vertical-align:middle">
						<table align="right" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0" style="width:300px;">
						<tbody>
							<tr>
								<td align="left" style="vertical-align:middle">
									<div>
							    		<img src="img/Tablet/phone-tablet.jpg"  class="img-responsive">
									</div>
								</td>
								<td align="right" style="vertical-align:middle ">
									<div style="padding-right: 15px;">
							    		<p class="lead" style="font-size: 280%; color:#0f4879;display: inline;">
											<strong>1300 58 68 78</strong>
										</p>
							    	</div>
								</td>
							</tr>
						</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="clearfix"></div>
		<hr style="margin-top: 1px;margin-bottom: 20px;">
	</div>

	<div class="row visible-xs" style="max-width:1000px">
	    <table align="right" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td align="left" style="width:20%; vertical-align:middle">
						<img src="img/Mobile/logo-mobile.jpg"  class="img-responsive" style="min-width:125px">
					</td>
					<td align="right" style="width:80%; vertical-align:middle">
						<table align="right" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0" style="width:190px;">
						<tbody>
							<tr>
								<td align="right" style="vertical-align:middle">
									<div>
							    		<img src="img/Mobile/phone-mobile.jpg"  class="img-responsive">
									</div>
								</td>
								<td align="right" style="vertical-align:middle ">
									<div style="padding-right: 15px;">
							    		<p class="lead" style="font-size: 200%; color:#0f4879;display: inline;">
											<strong>1300 58 68 78</strong>
										</p>
							    	</div>
								</td>
							</tr>
						</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="clearfix"></div>
		<hr style="margin-top: 1px;margin-bottom: 20px;">
	</div>

	<div class="row visible-md visible-lg" style="max-width:1000px;padding-bottom:20px">
    	<div class="col-xs-12 col-sm-7" align="left" style="vertical-align:top;">
    		<p class="lead" style="line-height: 1.1em; font-size: 864%; color:#2481c2;display: block;margin:0;font-family: dinBold, 'Open Sans', Helvetica, sans-serif, Arial;">
    			<strong>UNLIMITED</strong>
    		</p>
    		<p class="lead" style="line-height: 1.1em; font-size: 620%; color:#b2b2b2;display: block;margin:0;font-family: dinLight, 'Open Sans', Helvetica, sans-serif, Arial;">
    			<strong>NBN / ADSL2+</strong>
    		</p>
    		<form class="form-inline">
			  <div class="form-group">
			    <!--
			    <img src="img/Desktop/cash-back.png"  style="max-width:150px; max-height:150px;" class="img-responsive">
			    -->
			    <img src="img/Desktop/cash-back.png"  style="max-width:215px; max-height:215px;" class="img-responsive">
			  </div>
			  <div class="form-group" style="background-color:#efefef;padding: 36px 5px 4px 100px;margin-left: -97px;position: relative;z-index: -200;">
			    <p class="lead" style="font-size: 250%; color:#2481c2;display: block;margin:0;">
	    			<strong>$<span style="font-size: 320%">49.95</span>/m</strong>
	    		</p>
	    		<p style="font-size: 120%; color:#898989;">
	    			Min. price $148.95, includes $99 set-up fee
	    		</p>
	    		<p align="center" style="background:url(img/Desktop/no-contract-bg.png) no-repeat;background-size:100%;font-size: 218%;line-height: 122%;">
	    			NO CONTRACT
	    		</p>
			  </div>
			</form>
    	</div>

    	<div class="col-xs-12 col-sm-4 col-sm-offset-1" align="right" style="vertical-align:top;" id="enquire">
	        <form method="post" action="./landpageSeptAdd.php" onsubmit="return checkInputParameters('desktop')" id="formdesktop" class="desktop" name="formdesktop">
		      	<div style="width:300px;padding-left:0px;vertical-align:top;background-color:#0f4879; margin-top:10%;">
				  <div class="form-group"  id="section1">
				    <div align="center" style="line-height:0;">
		    			<img style="margin-top:0" src="img/Desktop/form-top.jpg" alt="" border="0">
		    		</div>
            <div align="center" style="padding-top:15px;padding-left:15px;padding-right:15px">
              <!-- <p style="line-height: 1.0em; font-size: 234%;color:#face00">LIMITED TIME OFFER</p> -->
              <p style="line-height: 1.0em; font-size: 234%;color:#face00">GET STARTED NOW</p>
            </div>
		    		<div align="center" style="padding-bottom:10px;padding-left:15px;padding-right:15px">
		    			<!-- <img src="img/Desktop/timer.jpg"  style="display: inline;max-width:32px; max-height:32px; margin-top:-10px" >&nbsp;-->
              <!-- <p style="font-size: 163%;color:white;display: inline">Don't miss this</p> -->
              <p style="font-size: 140%;color:white;display: inline">Submit your details below and we'll get back to you with more details.</p>
            </div>
					<div style="padding-top:0px;padding-left:15px;padding-right:15px">
						<input type="text" class="form-control namedesktop" onblur="checkNameInput()"  name="name" id="name" placeholder="Name*">
						<span  class="namedesktop" style="display: none;color:#ec8200; text-align:left"></span>
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px">
				    	<input type="text" class="form-control phonedesktop" onblur="checkPhoneInput()"  name="phone" id="phone" maxlength="10" placeholder="Phone*">
				    	<span  class="phonedesktop" style="display: none;color:#ec8200; text-align:left"></span>
				    </div>
				    <div style="padding-top:10px;padding-left:15px;padding-right:15px">
						<input type="text" class="form-control emaildesktop" onblur="checkEmailInput()"  name="email" id="email" placeholder="Email*">
						<span  class="emaildesktop" style="display: none;color:#ec8200; text-align:left"></span>
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px">
						<textarea class="form-control" rows="3" name="message" id="message" placeholder="Message" ></textarea>
						<input type="hidden" type="text" disabled class="form-control"  name="code" id="code" value="Promo Code: CASHBACK">
						<input type="hidden" name="action" id="action" value="add" />
						<!--
						<input type="hidden" name="ajaxResult" id="ajaxResult" value="none" />
						-->
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px;padding-bottom:10px;">
						<button type="submit" id="sign_up" class="form-control" style="padding:0px;border-style:none;bbackground: #fb830f;   background-image: -webkit-linear-gradient(top, #fb830f, #cd5302);   background-image: -moz-linear-gradient(top, #fb830f, #cd5302);   background-image: -ms-linear-gradient(top, #fb830f, #cd5302);   background-image: -o-linear-gradient(top, #fb830f, #cd5302);   background-image: linear-gradient(to bottom, #fb830f, #cd5302);-webkit-border-radius: 9px;   -moz-border-radius: 9px;margin-bottom:20px;" >
							<p style="font-size: 16pt;color:#fff">
								GET STARTED
							</p>
						</button>
					</div>
				  </div>
				</div>
	        </form>
    	</div>
    </div>

	<div class="row visible-sm" style="max-width:1000px;padding-bottom:10px">
    	<div class="col-xs-12 col-sm-7" align="left" style="vertical-align:top;">
    		<p class="lead" style="line-height: 1.1em; font-size: 600%; color:#2481c2;display: block;margin:0;padding-bottom:10px">
    			<strong>UNLIMITED</strong>
    		</p>
    		<p class="lead" style="line-height: 1.1em; font-size: 460%; color:grey;display: block;margin:0; padding-bottom:50px">
    			<strong>NBN / ADSL2+</strong>
    		</p>
    		<form class="form-inline" >
			  <div class="form-group">
			    <!--
			    <img src="img/Tablet/cash-back-tablet.png"  style="max-width:150px; max-height:150px;" class="img-responsive">
			    -->
			    <img src="img/Tablet/cash-back-tablet.png"  style="max-width:150px; max-height:150px" class="img-responsive">
			  </div>
			  <div class="form-group" style="background-color:#efefef;padding: 18px 15px 4px 93px;margin-left: -85px;position: relative;z-index: -200;">
			    <p class="lead" style="font-size: 200%; color:#2481c2;display: block;margin:0;">
	    			<strong>$<span style="font-size: 250%">49.95</span>/m</strong>
	    		</p>
	    		<p style="font-size: 100%">
	    			Min. price $148.95, includes $99 set-up fee
	    		</p>
	    		<p align="center" style="background:url(img/Tablet/no-contract-bg-tablet.png) no-repeat;background-size:100%;font-size: 193%;line-height: 110%;">
	    			NO CONTRACT
	    		</p>
			  </div>
			</form>
    	</div>

    	<div class="col-xs-12 col-sm-5" align="right" style="vertical-align:top;" id="enquire">
	        <form method="post" action="./landpageSeptAdd.php" onsubmit="return checkInputParameters('tablet')" id="formtablet" class="tablet" name="formtablet">
		      	<div style="width:285px;padding-left:0px;vertical-align:top;background-color:#0f4879">
				  <div class="form-group" >
				    <div align="center" style="line-height:0;margin-top:15px;" >
		    			<img style="margin-top:0" src="img/Desktop/form-top.jpg" alt="" border="0">
		    		</div>
		    		<div align="center" style="padding-top:10px;padding-left:15px;padding-right:15px">
		    			<img src="img/Tablet/timer-tablet.jpg"  style="display: inline;max-width:24px; max-height:24px;" >
		    			&nbsp;
						<p style="font-size: 120%;color:white;display: inline">Don't miss this</p>
					</div>
					<div align="center" style="padding-top:0px;padding-left:15px;padding-right:15px">
						<p style="line-height: 1.0em; font-size: 186%;color:#face00">LIMITED TIME OFFER</p>
					</div>
					<div style="padding-top:0px;padding-left:15px;padding-right:15px">
						<input type="text" class="form-control nametablet" onblur="checkNameInput()"  name="name" id="name" placeholder="Name*">
						<span  class="nametablet" style="display: none;color:#ec8200; text-align:left"></span>
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px">
				    	<input type="text" class="form-control phonetablet" onblur="checkPhoneInput()"  name="phone" id="phone" maxlength="10" placeholder="Phone*">
				    	<span  class="phonetablet" style="display: none;color:#ec8200; text-align:left"></span>
				    </div>
				    <div style="padding-top:10px;padding-left:15px;padding-right:15px">
						<input type="text" class="form-control emailtablet" onblur="checkEmailInput()"  name="email" id="email" placeholder="Email*">
						<span  class="emailtablet" style="display: none;color:#ec8200; text-align:left"></span>
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px">
						<textarea class="form-control" rows="2" name="message" id="message" placeholder="Message" ></textarea>
						<input type="hidden" type="text" disabled class="form-control"  name="code" id="code" value="Promo Code: CASHBACK">
						<input type="hidden" name="action" id="action" value="add" />
						<!--
						<input type="hidden" name="ajaxResult" id="ajaxResult" value="none" />
						-->
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px;padding-bottom:10px;">
						<button type="submit" id="sign_up" class="form-control" style="padding:0px;border-style:none;bbackground: #fb830f;   background-image: -webkit-linear-gradient(top, #fb830f, #cd5302);   background-image: -moz-linear-gradient(top, #fb830f, #cd5302);   background-image: -ms-linear-gradient(top, #fb830f, #cd5302);   background-image: -o-linear-gradient(top, #fb830f, #cd5302);   background-image: linear-gradient(to bottom, #fb830f, #cd5302);-webkit-border-radius: 9px;   -moz-border-radius: 9px;margin-bottom:20px;" >
							<p style="font-size: 16pt;color:#fff">
								Enquire Now
							</p>
						</button>
					</div>
				  </div>
				</div>
	        </form>
    	</div>
    </div>

	<div class="row visible-xs" style="max-width:1000px;padding-bottom:20px">
    	<div class="col-xs-12" align="center" style="vertical-align:top;">
    		<p class="lead" style="line-height: 1.1em; font-size: 450%; color:#2481c2;display: block;margin:0;">
    			<strong>UNLIMITED</strong>
    		</p>
    		<p class="lead" style="line-height: 1.1em; font-size: 360%; color:grey;display: block;margin:0;">
    			<strong>NBN / ADSL2+</strong>
    		</p>
    		<div style="">
				<table style="background-color:#efefef" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td align="left" style="width:40%; vertical-align:middle">
								 <img src="img/Tablet/cash-back-tablet.png"  class="img-responsive">
							</td>
							<td align="left" style="width:60%; vertical-align:middle;padding-bottom:10px;">
								<p class="lead" style="font-size: 180%; color:#2481c2;margin:0;padding-top:10px;">
					    			<strong>$<span style="font-size: 280%">49.95</span>/m</strong>
					    		</p>
					    		<p style="font-size: 80%;margin:0">
					    			Min. price $148.95, includes $99 set-up fee
					    		</p>
					    		<p align="center" style="margin:0;
					    			background-image:url(img/Tablet/no-contract-bg-tablet.png); background-repeat:no-repeat;background-size:100% 100%;">
					    			<strong>NO CONTRACT</strong>
					    		</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
    	</div>
    </div>

    <div class="row visible-xs" style="max-width:1000px" id="enquire">
    	<div class="col-xs-12" align="left" style="vertical-align:top;">
	        <form method="post" action="./landpageSeptAdd.php" onsubmit="return checkInputParameters('mobile')" id="formmobile" class="mobile" name="formmobile">
		      	<div style="width:100%;padding-left:0px;vertical-align:top;background-color:#0f4879">
				  <div class="form-group" >
				    <div align="center" style="line-height:0;">
		    			<img style="margin-top:0" src="img/Desktop/form-top.jpg" alt="" border="0">
		    		</div>
		    		<div align="center" style="padding-top:10px;padding-left:15px;padding-right:15px">
		    			<img src="img/Desktop/timer.jpg"  style="display: inline;max-width:24px; max-height:24px;" >
		    			&nbsp;
						<p style="font-size: 120%;color:white;display: inline">Don't miss this</p>
					</div>
					<div align="center" style="padding-top:0px;padding-left:15px;padding-right:15px">
						<p style="line-height: 1.0em; font-size: 220%;color:#face00">LIMITED TIME OFFER</p>
					</div>
					<div style="padding-top:0px;padding-left:15px;padding-right:15px">
						<input type="text" class="form-control namemobile" onblur="checkNameInput()"  name="name" id="name" placeholder="Name*">
						<span  class="namemobile" style="display: none;color:#ec8200; text-align:left"></span>
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px">
				    	<input type="text" class="form-control phonemobile" onblur="checkPhoneInput()"  name="phone" id="phone" maxlength="10" placeholder="Phone*">
				    	<span  class="phonemobile" style="display: none;color:#ec8200; text-align:left"></span>
				    </div>
				    <div style="padding-top:10px;padding-left:15px;padding-right:15px">
						<input type="text" class="form-control emailmobile" onblur="checkEmailInput()"  name="email" id="email" placeholder="Email*">
						<span  class="emailmobile" style="display: none;color:#ec8200; text-align:left"></span>
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px">
						<textarea class="form-control" rows="3" name="message" id="message" placeholder="Message" ></textarea>
						<input type="hidden" type="text" disabled class="form-control"  name="code" id="code" value="Promo Code: CASHBACK">
						<input type="hidden" name="action" id="action" value="add" />
						<!--
						<input type="hidden" name="ajaxResult" id="ajaxResult" value="none" />
						-->
					</div>
					<div style="padding-top:10px;padding-left:15px;padding-right:15px;padding-bottom:10px;">
						<button type="submit" id="sign_up" class="form-control" style="padding:0px;border-style:none;bbackground: #fb830f;   background-image: -webkit-linear-gradient(top, #fb830f, #cd5302);   background-image: -moz-linear-gradient(top, #fb830f, #cd5302);   background-image: -ms-linear-gradient(top, #fb830f, #cd5302);   background-image: -o-linear-gradient(top, #fb830f, #cd5302);   background-image: linear-gradient(to bottom, #fb830f, #cd5302);-webkit-border-radius: 9px;   -moz-border-radius: 9px;margin-bottom:20px;" >
							<p style="font-size: 16pt;color:#fff">
								Enquire Now
							</p>
						</button>
					</div>
				  </div>
				</div>
	        </form>
    	</div>
    </div>
  </div>
</div>

<div class="contentBox" style="width:100%; background-image:url(img/Desktop/dots-bg.png);padding-top: 0px; margin-top:40px;" align="center">
  <div class="container">
    <div class="row visible-md visible-lg" style="max-width:1000px;background-image:url(img/Desktop/dots-bg.png); vertical-align:middle">
    	<div class="col-xs-12" align="center" style="vertical-align:middle">
    	    <table align="center" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0" style="margin-top:-45px;margin-bottom:-45px;">
			<tbody>
				<tr>
					<td align="center" style="width:80%; vertical-align:middle">
						<div>
				    		<p class="lead" style="font-size: 280%; color:#2481c2;display: block;margin:0;">
				    			<strong>Unlimited NBN / ADSL 2+</strong>
				    		</p>
				    		<p class="lead" style="font-size: 280%; color:#2481c2;display: block;margin:0;">
				    			<strong>powered by Australia's largest network</strong>
				    		</p>
				    		<br />
				    		<p style="font-size: 150%;max-width:600px; margin-top:23px;">
								For only $49.95 per month you can now have Unlimited ADSL2+/NBN internet. <i><small>ADSL2+ requires an active phone line.</small></i>
							</p>
						</div>
					</td>
					<td align="right" style="width:20%; vertical-align:middle ">
						<div class="pull-right">
				    		<img src="img/Desktop/mr-cube.png" alt="..." class="img-responsive">
				    	</div>
					</td>
				</tr>
			</tbody>
			</table>
    	</div>
    </div>
    <div class="row visible-sm" style="max-width:1000px;background-image:url(img/Desktop/dots-bg.png); vertical-align:middle">
    	<div class="col-xs-12" align="center" style="vertical-align:middle">
    	    <table align="center" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td align="center" style="width:80%; vertical-align:middle">
						<div>
				    		<p class="lead" style="font-size: 250%; color:#2481c2;display: block;margin:0;">
				    			<strong>Unlimited NBN / ADSL 2+</strong>
				    		</p>
				    		<p class="lead" style="font-size: 250%; color:#2481c2;display: block;margin:0;">
				    			<strong>powered by Australia's largest network</strong>
				    		</p>
				    		<br />
				    		<p style="font-size: 150%;max-width:450px;">
								For only $49.95 per month you can now have Unlimited ADSL 2+/NBN internet with your BYO home phone.
							</p>
						</div>
					</td>
					<td align="right" style="width:20%; vertical-align:middle ">
						<div class="pull-right">
				    		<img src="img/Desktop/mr-cube.png" alt="..." class="img-responsive">
				    	</div>
					</td>
				</tr>
			</tbody>
			</table>
    	</div>
    </div>
    <div class="row visible-xs" style="max-width:1000px;background-image:url(img/Desktop/dots-bg.png); vertical-align:middle">
    	<div class="col-xs-12" align="center" style="vertical-align:middle">
    	    <table align="center" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td align="center" style="width:80%; vertical-align:middle">
						<div>
				    		<p class="lead" style="font-size: 170%; color:#2481c2;display: block;margin:0;">
				    			<strong>Unlimited NBN / ADSL 2+</strong>
				    		</p>
				    		<p class="lead" style="font-size: 170%; color:#2481c2;display: block;margin:0;">
				    			<strong>powered by Australia's largest network</strong>
				    		</p>
				    		<br />
				    		<p style="font-size: 120%;max-width:380px;">
								For only $49.95 per month you can now have Unlimited ADSL 2+/NBN internet with your BYO home phone.
							</p>
						</div>
					</td>
					<td align="right" style="width:20%; vertical-align:middle ">
						<div class="pull-right">
				    		<img src="img/Desktop/mr-cube.png" alt="..." class="img-responsive">
				    	</div>
					</td>
				</tr>
			</tbody>
			</table>
    	</div>
    </div>
  </div>
</div>

<div class="contentBox" style="padding-top: 0px;" align="center">
  <div class="container">
	<div class="row visible-md visible-lg" style="max-width:1000px">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center" style="vertical-align:top;">
    		<p style="font-size: 400%; color:#2481c2;padding-top:70px; margin-bottom:30px;">
    			<strong>FEATURES</strong>
    		</p>
    	</div>
    </div>
    <div class="row visible-sm" style="max-width:1000px">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center" style="vertical-align:top;">
    		<p style="font-size: 350%; color:#2481c2;padding-top:30px">
    			<strong>FEATURES</strong>
    		</p>
    	</div>
    </div>
    <div class="row visible-xs" style="max-width:1000px">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center" style="vertical-align:top;">
    		<p style="font-size: 250%; color:#2481c2;padding-top:30px">
    			<strong>FEATURES</strong>
    		</p>
    	</div>
    </div>


    <div class="row visible-md visible-lg" style="max-width:1000px">
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Desktop/charge.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>No excess charges</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Desktop/peak.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>No peak/off-peak times</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Desktop/lock.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>No lock-in contract</p>
		      </div>
		    </div>
		</div>
	</div>
	<div class="row visible-md visible-lg" style="max-width:1000px">
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Desktop/antivirus.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>Free 4 months antivirus software</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Desktop/storage.jpg" alt="..." class="img-responsive" style="margin-bottom:14px;">
		      <div class="caption">
		        <p>Free 15G Google drive storage</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Desktop/email.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>Free email account</p>
		      </div>
		    </div>
		</div>
	</div>

	<div class="row visible-sm" style="max-width:1000px">
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Tablet/charge-tablet.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>No excess charges</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Tablet/peak-tablet.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>No peak/off-peak times</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Tablet/lock-tablet.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>No lock-in contract</p>
		      </div>
		    </div>
		</div>
	</div>
	<div class="row visible-sm" style="max-width:1000px">
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Tablet/antivirus-tablet.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>Free 4 months antivirus software</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Tablet/storage-tablet.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>Free 15G Google drive storage</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Tablet/email-tablet.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p>Free email account</p>
		      </div>
		    </div>
		</div>
	</div>

	<div class="row visible-xs" style="max-width:1000px">
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Mobile/charge-mobile.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p style="font-size: 80%">No excess charges</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Mobile/peak-mobile.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p style="font-size: 80%">No peak/off-peak times</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Mobile/lock-mobile.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p style="font-size: 80%">No lock-in contract</p>
		      </div>
		    </div>
		</div>
	</div>
	<div class="row visible-xs" style="max-width:1000px">
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Mobile/antivirus-mobile.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p style="font-size: 80%">Free 4 months antivirus software</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Mobile/storage-mobile.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p  style="font-size: 80%">Free 15G Google drive storage</p>
		      </div>
		    </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
		    <div class="thumbnail" style="border: 0">
		      <img src="img/Mobile/email-mobile.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <p  style="font-size: 80%">Free email account</p>
		      </div>
		    </div>
		</div>
	</div>

	</div>
</div>

<div class="contentBox" style="width:100%; background-image:url(img/Desktop/dots-bg.png);padding-top: 0px;" align="center">
  <div class="container">
	<div class="row" style="">
    	<div class="col-xs-12" align="center" style="max-width:700px;vertical-align:top; padding:50px 0;">
    		<p class="lead visible-md visible-lg" style="font-size: 320%; color:#2481c2;display: block;margin-bottom:20px;">
    			<strong>WHAT OUR CUSTOMERS SAY</strong>
    		</p>
    		<p class="lead visible-sm" style="font-size: 280%; color:#2481c2;display: block;margin-top:15px;margin-bottom:20px;">
    			<strong>WHAT OUR CUSTOMERS SAY</strong>
    		</p>
    		<p class="lead visible-xs" style="font-size: 180%; color:#2481c2;display: block;margin-top:10px;margin-bottom:20px;">
    			<strong>WHAT OUR CUSTOMERS SAY</strong>
    		</p>
			<form class="form-horizontal">
				<div class="form-group">
					<!--
				    <img src="img/Desktop/arrow-left.png" alt="..." class="pull-left" style="width:12px; height:24px;margin-left:15px;">
				    <img src="img/Desktop/arrow-right.png" alt="..." class="pull-right" style="width:12px; height:24px;margin-right:15px;">
				    <div style="max-width:400px">
				      <label class="control-label;text-align:center" >"NetCube is that good that I don't have to call them for any issue. 'A complete peace of mind'!"</label>
				    </div>
				    -->
				    <div class="indexEvaluate">
			          <div class="textScrollBox" style="height: 100px;max-width:360px">
			            <ul>
			              <li><i>"Absolutely the best for service and value! Love my ISP + phone service provider."</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_01.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Khanh Nguyen</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>"NetCube is that good that I don’t have to call them for any issue. “A complete peace of mind”!"</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_02.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Gu Ming Hao</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>"I think ample of services with good quality and high performance has made NetCube one of the best ISPs."</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_03.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Guneet Singh</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>NBN speed in an UNLIMITED data package is more than great. I’d say it’s just brilliant…"</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_04.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Surika Baxter</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>"Unlimited NBN package, high speed with outstanding customer support is unbeatable in my eyes."</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_05.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Tim Yang</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>"Great bundles & services, reliable & brilliant performance, I would never dream of switching to any other."</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_06.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Wendy Baxter</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>"No hassle setup system with wonderful technical support is really good."</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_07.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Bret Shaw</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>"Honestly, I will not find such a service anywhere else; speed, reliability, support and affordable as well!!!"</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_08.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Surika Jayawikrama</h6>
			                  </div>
			                </div>
			              </li>
			              <li><i>"NetCube is reliable with great performance, I’m glad that I made the switch."</i>
			                <div class="shadow"></div>
			                <div class="indexEvaluateUser">
			                  <div style="display: inline" align="center">
			                  	<img src="./img/folio_09.png" />
			                  	<p style="display: inline">&nbsp;</p>
			                  	<h6 style="display: inline">Zan Ge</h6>
			                  </div>
			                </div>
			              </li>
			            </ul>
			          </div>
			        </div>
				</div>
			</form>
    	</div>
    </div>
  </div>
</div>

	<div class="visible-md visible-lg" style="width:100%; background-color:#0f4879" class="bottom-cta">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center" class="active">
	    	<table align="center" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0" style="max-width:1000px">
			<tbody>
				<tr>
					<td align="right" style="width:25%; vertical-align:middle">
						<img src="img/Desktop/cash-back.png" alt="..." class="img-responsive" style="padding:20px 0px 20px 20px;">
					</td>
					<td align="center" style="width:50%; vertical-align:middle ">
						<span style="font-size: 300%;color:white">
							Use this limited offer today
						</span>
					</td>
					<td align="left" style="width:25%; vertical-align:middle;">
						<!--
						<button type="button" class="btn btn-warning form-control" style="max-width:160px; border:none;background: #fb830f;   background-image: -webkit-linear-gradient(top, #fb830f, #cd5302);   background-image: -moz-linear-gradient(top, #fb830f, #cd5302);   background-image: -ms-linear-gradient(top, #fb830f, #cd5302);   background-image: -o-linear-gradient(top, #fb830f, #cd5302);   background-image: linear-gradient(to bottom, #fb830f, #cd5302);-webkit-border-radius: 9px;   -moz-border-radius: 9px; font-size:22px; height:44px;">Enquire Now</button>
						-->
                        <a href="#"><img title="bottom-cta.png" alt="bottom-cta.png" src="img/Desktop/bottom-cta.png"  /></a>
				</tr>
			</tbody>
			</table>
    	</div>
	</div>
	<div class="visible-sm" style="width:100%; background-color:#0f4879">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center" >
	    	<table align="center" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0" style="max-width:1000px">
			<tbody>
				<tr>
					<td align="right" style="width:40%; vertical-align:middle">
						<img src="img/Tablet/cash-back-tablet.png" alt="..." class="img-responsive" style="padding:15px 15px 15px 15px;">
					</td>
					<td align="left" style="width:60%; vertical-align:middle ">
						<div style="padding-bottom:20px">
							<span style="font-size: 250%;color:white">
								Use this limited offer today
							</span>
						</div>
						<!--
						<button type="button" class="btn btn-warning form-control" style="max-width:160px; border:none;background: #fb830f;   background-image: -webkit-linear-gradient(top, #fb830f, #cd5302);   background-image: -moz-linear-gradient(top, #fb830f, #cd5302);   background-image: -ms-linear-gradient(top, #fb830f, #cd5302);   background-image: -o-linear-gradient(top, #fb830f, #cd5302);   background-image: linear-gradient(to bottom, #fb830f, #cd5302);-webkit-border-radius: 9px;   -moz-border-radius: 9px; font-size:22px; height:44px;">Enquire Now</button>
						-->
						<a href="#" >
							<img title="bottom-cta-tablet.png" alt="bottom-cta-tablet.png" src="img/Tablet/bottom-cta-tablet.png"  />
						</a>
					</td>
				</tr>
			</tbody>
			</table>
    	</div>
	</div>
	<div class="visible-xs" style="width:100%; background-color:#0f4879">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center" >
	    	<table align="center" border="0" bordercolor="#e5e5e5" cellpadding="0" cellspacing="0" style="max-width:1000px">
			<tbody>
				<tr>
					<td align="right" style="width:40%; vertical-align:middle">
						<img src="img/Tablet/cash-back-tablet.png" alt="..." class="img-responsive" style="padding:10px 10px 10px 10px;">
					</td>
					<td align="left" style="width:60%; vertical-align:middle">
						<div style="padding-bottom:10px">
							<span style="font-size: 200%;color:white">
								Use this limited offer today
							</span>
						</div>
						<!--
						<button type="button" class="btn btn-warning form-control" style="max-width:160px; border:none;background: #fb830f;   background-image: -webkit-linear-gradient(top, #fb830f, #cd5302);   background-image: -moz-linear-gradient(top, #fb830f, #cd5302);   background-image: -ms-linear-gradient(top, #fb830f, #cd5302);   background-image: -o-linear-gradient(top, #fb830f, #cd5302);   background-image: linear-gradient(to bottom, #fb830f, #cd5302);-webkit-border-radius: 9px;   -moz-border-radius: 9px; font-size:22px; height:44px;">Enquire Now</button>
						-->
						<a href="#" >
							<img title="bottom-cta-mobile.png" alt="bottom-cta-mobile.png" src="img/Mobile/bottom-cta-mobile.png"  />
						</a>
					</td>
				</tr>
			</tbody>
			</table>
    	</div>
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

/*
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
		*/


</script>
<!--End of Zopim Live Chat Script-->

<!--content start-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54649736-18', 'auto');
  ga('send', 'pageview');

</script>
<!--content over-->


</body></html>
