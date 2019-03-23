
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta property="qc:admins" content="154633506765435256375615" />
<script type="text/javascript"
	src="http://cp.netcube.com.au/assets/323cec3e/jquery.min.js"></script>
<script type="text/javascript"
	src="http://cp.netcube.com.au/assets/323cec3e/jquery.yiiactiveform.js"></script>
<title>NetCube Account System</title>
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

				<div class="row-fluid bb-bookblock" id="bb-bookblock" style="height:400px">
					<div class="bb-item row-fluid login">

						<div class="top-background">
							<div class="fill-background right">
								<div class="bg row-fluid"></div>
							</div>
							<div id="login-corner-shadow"></div>
						</div>
						<div class="row-fluid container" style="height:500px">
							<div class="content">
								<div class="message row-fluid">
									<h4>用户<?php echo $companyid?>您好:</h4>
									<p>您将支付$<?php echo  $amount?>给<?php echo  $companyid?>. 请输入您的信用卡信息：</p>
								</div>
								<div class="form">

									<!-- start -->
									<form id="login-form" action="/site/login" method="post">
										<div class="control-group row-fluid">

											<label for="LoginForm_Username">信 用 卡 号:</label>
											<div class="controls row-fluid input-append">
												<input type="text" name="credit" />
											</div>
											<div class="errorMessage" id="LoginForm_username_em_"
												style="display: none"></div>
										</div>

										<div class="control-group row-fluid">
											<label for="LoginForm_Password">持 卡 人:</label>
											<div class="controls row-fluid input-append">
											<input type="text" name="account" />
											</div>
											<div class="errorMessage" id="LoginForm_password_em_"
												style="display: none"></div>
										</div>
										
										
										<div class="control-group row-fluid">
											<label for="LoginForm_Password">信用卡到期日:</label>
											<div class="controls row-fluid input-append">
											<select><option name='expireMonth' value=''>月</option>
											<?php 
											for($i=1;$i<=12;$i++){
												echo"<option name='expireMonth' value='".$i."'>".$i."</option>";
											}
											?>
											</select>
											</br>
											<select><option name='expireyear' value=''>年</option>
											<?php 
											for($i=1900;$i<=2014;$i++){
												echo"<option name='expireyear' value='".$i."'>".$i."</option>";
											}
											?>
											</select>
											
											</div>
											<div class="errorMessage" id="LoginForm_password_em_"
												style="display: none"></div>
										</div>
										
										
										<div class="control-group row-fluid">
											<label for="LoginForm_Password">信用卡到期日:</label>
											<div class="controls row-fluid input-append">
											<input type="text" name="cvv" />
											</div>
											<div class="errorMessage" id="LoginForm_password_em_"
												style="display: none"></div>
										</div>
												
										
										<div class="control-group row-fluid fluid">

											<div class="row buttons">												
												<input type="submit" value="确定" onclick="disp_alert()" style="background-color:#3276b1"/>
									
											</div>
										</div>
									</form>
										<p>
											<p>
													<!--  收    款    人:<input type="text"  name="payer"  value="WebNova"/><p>
金            额:<input type="text" name="money" value="120$"/><p>-->


								</div>
								<!-- form -->
							</div>
							<!-- End .container -->
						</div>
						<!-- End .row-fluid -->
					</div>
					<!-- .bb-item  -->

				</div>
				<!-- End #bb-bookblock -->
			</div>
			<!-- End .row-fluid -->

		</div>
		<!-- End #login -->
		<!-- <img src="img/ajax-loader.gif"> -->
	</div>
	<!-- End #loading -->


	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->


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
