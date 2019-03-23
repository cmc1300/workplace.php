<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta property="qc:admins" content="154633506765435256375615" />
<script type="text/javascript"
	src="http://cp.netcube.com.au/assets/323cec3e/jquery.min.js"></script>
<script type="text/javascript"
	src="http://cp.netcube.com.au/assets/323cec3e/jquery.yiiactiveform.js"></script>
<title>Tenpay - Accept online payments safely with Tenpay</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="/css/images/favicon.png">
<!-- Le styles -->
<link href="http://cp.netcube.com.au/css/twitter/bootstrap.css"
	rel="stylesheet">
<link href="http://cp.netcube.com.au/css/base.css" rel="stylesheet">
<link href="http://cp.netcube.com.au/css/twitter/responsive.css"
	rel="stylesheet">
<link href="http://cp.netcube.com.au/css/jquery-ui-1.8.23.custom.css"
	rel="stylesheet">
<script
	src="http://cp.netcube.com.au/js/plugins/modernizr.custom.32549.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

</head>
<?php
if (isset ( $_REQUEST ['companyid'] )) {
	$companyid = $_REQUEST ['companyid'];
	$wechatid = $_REQUEST ['wechatid'];
	$itemid = $_REQUEST ['itemid'];
	$amount = $_REQUEST ['amount'];
	}else{
		$companyid = "我们";
		$wechatid = "";
		$itemid ="0";
		$amount = "0";
}
?>
<body>

	<div id="loading" class="other_pages">
		<!-- Login page -->
		<div id="login">
			<div class="row-fluid">
				<div class="row-fluid">
					<!--  <div class="logo" class="pull-left">
						<a href="index.html"></a>
					</div>-->
				</div>

				<div class="row-fluid bb-bookblock" id="bb-bookblock" >
					<div class="bb-item row-fluid login">

						<div class="top-background">
							<div class="fill-background right">
								<div class="bg row-fluid"></div>
							</div>
							<div id="login-corner-shadow"></div>
						</div>
						<div class="row-fluid container" style="height:240px">
							<div class="content">
								<div class="message row-fluid">
								<!--  <h2>用户<?php echo $wechatid?>，您好:</h2>
									<h4>您的订购过程产生错误，支付失败，请<a href="index.php">重试</a></h4>
									-->
								<h2>Dear Customer:</h2>
									<h4>Failed to process your transaction.Please check your account, and <a href="australia_telcom_pay.php">try </a>it again.</h4>
								</div>

	<!-- Flip effect on login screen -->
	<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript"
		src="http://cp.netcube.com.au/js/plugins/jquerypp.custom.js"></script>
	<script type="text/javascript"
		src="http://cp.netcube.com.au/js/plugins/jquery.bookblock.js"></script>
	<script language="javascript" type="text/javascript"
		src="http://cp.netcube.com.au/js/plugins/jquery.uniform.min.js"></script>

	<script type="text/javascript">
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
              $slides.on( {

                'swipeleft'   : function( event ) {
                
                  config.bb.next();
                  return false;

                },
                'swiperight'  : function( event ) {
                
                  config.bb.prev();
                  return false;
                  
                }

              } );

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

	<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
$('#login-form').yiiactiveform({'attributes':[{'id':'LoginForm_username','inputID':'LoginForm_username','errorID':'LoginForm_username_em_','model':'LoginForm','name':'username','enableAjaxValidation':true},{'id':'LoginForm_password','inputID':'LoginForm_password','errorID':'LoginForm_password_em_','model':'LoginForm','name':'password','enableAjaxValidation':true},{'id':'LoginForm_rememberMe','inputID':'LoginForm_rememberMe','errorID':'LoginForm_rememberMe_em_','model':'LoginForm','name':'rememberMe','enableAjaxValidation':true}]});
});
/*]]>*/
</script>
</body>
</html>
