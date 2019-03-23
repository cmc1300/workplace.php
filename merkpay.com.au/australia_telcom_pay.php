<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
<title>Tenpay - Accept online payments safely with Tenpay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="css/images/favicon.png">
  <!-- Le styles -->
  <link href="css/twitter/bootstrap.css" rel="stylesheet">
  <link href="css/base.css" rel="stylesheet">
  <link href="css/twitter/responsive.css" rel="stylesheet">
  <link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
  <script src="js/plugins/modernizr.custom.32549.js"></script>
  
<link rel="icon" href="favicon.ico" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="http://netcube.com.au/css/style.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="./js/function.js"></script>
<script type="text/javascript" src="./js/jquery-1.9.0.js"></script> 
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
  <style type="text/css">
  
#login .container {
position: relative;
z-index: 99;
padding: 25px 35px;
-webkit-border-radius: 0 0 5px 5px;
-moz-border-radius: 0 0 5px 5px;
border-radius: 0 0 5px 5px;
height: 530px;
display: inline-block;
}

#login {
width: 400px;
height: 775px;
position: absolute;
top: 0;
left: 0;
right: 0;
bottom: 0;
margin: auto;
}

@media (max-width: 400px){
#login {
width: 290px;
height: 775px;
position: absolute;
top: 0;
left: 0;
right: 0;
bottom: 0;
margin: auto;
}
#span6 {display:none;}
}
  </style>
</head>
<?php
if (isset ( $_REQUEST ['mechanid'] )) {
	session_start ();
	$_SESSION ['mechanid'] = $_REQUEST ['mechanid'];
	$_SESSION ['serviceProviderID'] = $_REQUEST ['serviceProviderID'];
	$_SESSION ['amount'] = $_REQUEST ['amount'];
	$_SESSION ['phoneNumber'] = $_REQUEST ['phoneNumber'];
	$_SESSION ['type'] = $_REQUEST ['type'];
	// $companyid = $_REQUEST ['companyid'];
	
	$_SESSION ['companyid'] = $_REQUEST ['mechanid'];
	$_SESSION ['wechatid'] = $_REQUEST ['wechatid'];
	$_SESSION ['itemid'] = $_REQUEST ['itemid'];
	$_SESSION ['itemdesc'] = $_REQUEST ['itemid'];
	// $wechatid = $_REQUEST ['wechatid'];
	// $itemid = $_REQUEST ['itemid'];
	$_SESSION ['amount'] = $_REQUEST ['amount'];
	$wechatid = $_SESSION ['wechatid'];
	$amount = $_SESSION ['amount'];
	$companyid = $_SESSION ['companyid'];
	$phoneNumber = $_SESSION ['phoneNumber'];
} else {
session_start ();
	$_SESSION ['mechanid']="australia_telecom";
	$_SESSION ['amount']=$_REQUEST ['amount'];
	$phoneNumber = "0458826888";
	$companyid = "Australia Telcom";
	$wechatid = "member";
	$itemid = "0";
	$amount = $_SESSION ['amount'];
	$companyid = "Australia Telcom";
	$_SESSION ['companyid']=$companyid;
}
?>
    <body>

      <div id="loading" class="other_pages">
        <!-- Login page -->
        <div id="login">
          <div class="support-note"><!-- let's check browser support with modernizr -->
            <span class="no-csstransforms">CSS transforms are not supported in your browser</span>
            <span class="no-csstransforms3d">CSS 3D transforms are not supported in your browser</span>
            <span class="no-csstransitions">CSS transitions are not supported in your browser</span>
          </div>

         
     
        
     
        <div class="row-fluid">
          <div class="row-fluid">
            <div class="logo" class="pull-left">
			<a href="#"style="background: url(images/tenpay3.png) 0 0 no-repeat;"></a></div>
            <!--  <div class="pull-right spacer-medium not-member members right_offset">Not a member? <a href="#" id="bb-nav-next" class="members_button">Sign up <i class="icon-magic"></i></a></div>
            <div class="pull-right spacer-medium already-member members right_offset" style="display:none;">Already a member? <a href="#" class="members_button" id="bb-nav-prev">Log in <i class="icon-undo"></i></a></div>
          -->
          </div> 

      <div class="row-fluid bb-bookblock" id="bb-bookblock">
        <div class="bb-item row-fluid login">

         <div class="top-background">
          <div class="fill-background right"><div class="bg row-fluid"></div></div>
          <div id="login-corner-shadow"></div>
        </div>
        <div class="row-fluid container">
          <div class="content">
            <div class="message row-fluid">
					<h2>Dear Customer:</h2>
					<p>
					<?php 
					if(isset($_REQUEST ['amount'])){
					?>
					You need to pay $<?php echo  $_REQUEST ['amount']?> to <?php echo $companyid?>. 
					<?php }?>
					Please input your credit card information：</p>
            </div>
					<form id="payform" action="tenpay_cc.php" method="post">
					<?php 
					if(!isset($_REQUEST ['amount'])){
					?>
            <div class="control-group row-fluid"> 
              <div class="controls row-fluid input-append">
                <input type="text" name="amount" id="amount"  placeholder="Amount"  class="row-fluid" value=""> <span class="add-on"><i class="icon-money"></i></span>
              </div>
            </div>
					<?php
}
					?>
            <div class="control-group row-fluid">
              <div class="controls row-fluid input-append">
                <input type="text" name="card_number" id="card_number"  placeholder="Your Card Number"  class="row-fluid" value=""> <span class="add-on"><i class="icon-user"></i></span>
              </div>
            </div>
            <div class="control-group row-fluid">
              <div class="controls row-fluid input-append">
                <input type="text" name="card_name" id="card_name" placeholder="Your Card Name"  class="row-fluid" value=""> <span class="add-on"><i class="icon-user"></i></span>
              </div>
            </div>
            <div class="control-group row-fluid">
              <label class="row-fluid " for="inputEmail">Expire Day</label>
              <div class="controls row-fluid input-append">
                <select name='expireMonth' id="card_type_month" style="width: 80px">
                <option value=''>Month</option>
									<option name="expireMonth" value="01">01</option>
									<option name="expireMonth" value="02">02</option>
									<option name="expireMonth" value="03">03</option>
									<option name="expireMonth" value="04">04</option>
									<option name="expireMonth" value="05">05</option>
									<option name="expireMonth" value="06">06</option>
									<option name="expireMonth" value="07">07</option>
									<option name="expireMonth" value="08">08</option>
									<option name="expireMonth" value="09">09</option>
									<option name="expireMonth" value="10">10</option>
									<option name="expireMonth" value="11">11</option>
									<option name="expireMonth" value="12">12</option>

								</select>
								<select name='expireyear' id="card_type_year"  style="width: 80px; margin-left: 15px"><option value=''>Year</option>
											<?php
											for($i = date ( "Y" ) + 5; $i >= date ( "Y" ) ; $i --) {
												echo "<option name='expireyear' value='" . $i . "'>" . $i . "</option>";
											}
											?>
											</select>
              </div>
              
              
            </div>
              <div class="control-group row-fluid">
              <label class="row-fluid " for="inputPassword"><div class="pull-right"><a class="muted"><small>Type three number</small></a></div></label>
              <div class="controls row-fluid input-append">
                <input type="text" name="cvv" id="payment_cvv2" class="row-fluid" placeholder="Your Card CVV"/>
                <span class="add-on"><i class="icon-lock"></i></span>
              </div>
            </div>
            
              <div class="control-group row-fluid">
              <div class="controls row-fluid input-append">
                <input type="text" name="invoice_number" id="invoice_number" class="row-fluid" placeholder="Invoice Number"/>
                <span class="add-on"><i class="icon-lock"></i></span>
              </div>
            </div>
            
            <div class="control-group row-fluid fluid">
              <div class="controls span5 offset7">
                <a href="#" class="btn btn-primary btn-larg1e row-fluid" onclick="return inputValidate();">Submit<i class="gicon-chevron-right icon-white"></i></a>
              </div>
            </div>
          </form>
          </div><!-- End .container -->
          </div> <!-- End .row-fluid -->
        </div> <!-- .bb-item  -->


      
        </div> <!-- End #bb-bookblock -->
<!-- End .row-fluid -->

        </div> <!-- End .row-fluid -->

    </div> <!-- End #login -->
        <!-- <img src="img/ajax-loader.gif"> -->
    </div> <!-- End #loading -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    
    <!-- Flip effect on login screen -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquerypp.custom.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.bookblock.js"></script>
        <script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>

   <script type="text/javascript">
   function submmitform(){
	   $('.payform' ).submit();
	}
      $(function() {
        var Page = (function() {

          var config = {
              $bookBlock: $( '#bb-bookblock' ),
              $navNext  : $( '#bb-nav-next' ),
              $navPrev  : $( '#bb-nav-prev' ),
              $navJump  : $( '#bb-nav-jump' ),
              bb        : $( '#bb-bookblock' ).bookblock( {
                speed       : 800,
                shadowSides : 0.8,
                shadowFlip  : 0.7
              } )
            },
            init = function() {

              initEvents();
              
            },
            initEvents = function() {

              var $slides = config.$bookBlock.children(),
                  totalSlides = $slides.length;

              // add navigation events
              config.$navNext.on( 'click', function() {
              $("#arrow_register").fadeOut();
              $(".not-member").slideUp();
              $(".already-member").slideDown();
                config.bb.next();
                return false;

              } );

              config.$navPrev.on( 'click', function() {

                 $(".not-member").slideDown();
                $(".already-member").slideUp();
                config.bb.prev();
                return false;

              } );

              config.$navJump.on( 'click', function() {
                
                config.bb.jump( totalSlides );
                return false;

              } );
              
              // add swipe events


            };

            return { init : init };

        })();

        Page.init();

      });
    </script>

    <script type='text/javascript'>
 
    $(window).load(function() {
     $('#loading1').fadeOut();
    });
      $(document).ready(function() {
           $("input:checkbox, input:radio, input:file").uniform();


      $('[rel=tooltip]').tooltip();
      $('body').css('display', 'none');
      $('body').fadeIn(500);

      $("#logo a, #sidebar_menu a:not(.accordion-toggle), a.ajx").click(function() {
        event.preventDefault();
        newLocation = this.href;
        $('body').fadeOut(500, newpage);
        });
        function newpage() {
        window.location = newLocation;
        }
      });
      
    

    </script>
   
</body>
</html>
