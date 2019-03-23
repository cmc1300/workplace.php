<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
<title>Tenpay - Accept online payments safely with Tenpay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Le styles -->
  <link href="<?=base_url()?>/css/twitter/bootstrap.css" rel="stylesheet">
  <link href="<?=base_url()?>/css/base.css" rel="stylesheet">
  <link href="<?=base_url()?>/css/twitter/responsive.css" rel="stylesheet">
  <link href="<?=base_url()?>/css/main.css" rel="stylesheet">
  <link href="<?=base_url()?>/css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
  <script src="<?=base_url()?>/js/plugins/modernizr.custom.32549.js"></script>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
  
<link rel="shortcut icon" href="<?php echo base_url();?>/favicon.ico">
</head>

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
           <!-- 
            <div id="arrow_register"></div>
             -->
            <div class="logo" class="pull-left">
			<a href="#"style="background: url(<?=base_url()?>/images/tenpay3.png) 0 0 no-repeat;"></a></div>
           <!--  
            <div class="pull-right spacer-medium not-member members right_offset">Not a member? <a href="#" id="bb-nav-next" class="members_button">Sign up <i class="icon-magic"></i></a></div>
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
          <?php 
          	if(isset($message) && $message="failed"){
          		?>
          		<h4>Your username or password is invalid, please re enter.</h4>
          		<?php
          	}else{?>
				<h4>Please enter your username and password.</h4>
			<?php }?>
              
            </div>
          <form class="form-horizontal row-fluid" action="<?=site_url("login/login_process")?>" method="post">
            <div class="control-group row-fluid">
              <label class="row-fluid " for="inputEmail">Username</label>
              <div class="controls row-fluid input-append">
                <input type="text" id="inputEmail" placeholder="Your Username"  class="row-fluid" value="" name="login_name"> <span class="add-on"><i class="icon-user"></i></span>
              </div>
            </div>
              <div class="control-group row-fluid">
              <label class="row-fluid " for="inputPassword">Password<div class="pull-right"><a class="muted"><small>Forgot your password&nbsp;?</small></a></div></label>
              <div class="controls row-fluid input-append">
                <input type="password" id="inputPassword" placeholder="Your Password"  class="row-fluid" value="" name="password"> <span class="add-on"><i class="icon-lock"></i></span>
              </div>
            </div>
            <div class="control-group row-fluid"></div>
            <div class="control-group row-fluid fluid">
              <div class="controls span6">
                <label class="checkbox">
                  <input type="checkbox"> Remember me
                </label>
              </div>
              <div class="controls span5 offset1">
              <input type="submit" value="Login" class="login_submit"/>
               <!-- <a href="index.html" class="btn btn-primary btn-larg1e row-fluid">Take me in <i class="gicon-chevron-right icon-white"></i></a> --> 
              </div>
            </div>
          </form>
          </div><!-- End .container -->
          </div> <!-- End .row-fluid -->
        </div> <!-- .bb-item  -->

       <div class="bb-item row-fluid register">
         <div class="top-background row-fluid fluid">
          <div class="fill-background "><div class="bg row-fluid"></div></div>
          <div id="login-corner-shadow" class="left"></div>
        </div>
        <div class="row-fluid fluid container">
          <div class="content">
            <div class="message row-fluid ">
             <h4>Register and Have Fun!</h4>              
            </div>
          <form class="form-horizontal row-fluid" action="<?=site_url("login/register")?>" method="post">
               <div class="control-group row-fluid">
              <label class="row-fluid " for="inputEmail">Enter your Email</label>
              <div class="controls row-fluid input-append">
                <input type="text" id="inputEmail" placeholder="email.."  class="row-fluid" name="email"> <span class="add-on"><i class="icon-globe"></i></span>
              </div>
            </div>
            <div class="control-group row-fluid">
              <label class="row-fluid " for="inputEmail">Pick a username</label>
              <div class="controls row-fluid input-append">
                <input type="text" id="inputEmail" placeholder="username.."  class="row-fluid" autocomplete="off" name="username"> <span class="add-on"><i class="icon-user"></i></span>
              </div>
            </div>
            <!-- 
              <div class="control-group row-fluid">
              <label class="row-fluid " for="inputPassword">And a password </label>
              <div class="controls row-fluid input-append">
                <input type="password" id="inputPassword" placeholder="password.."  class="row-fluid" autocomplete="off"> <span class="add-on"><i class="icon-lock"></i></span>
              </div>
            </div> -->
            <div class="control-group row-fluid fluid">
             
              <div class="controls span5 offset7">
                <!--  <a href="index.html" class="btn btn-info row-fluid">Register <i class="gicon-chevron-right icon-white"></i></a>-->
                <input type="submit" value="Register"/>
              </div>
            </div>
          </form>
          </div><!-- End .container -->
          </div> <!-- End .row-fluid -->
        </div> <!-- .bb-item  -->

      
        </div> <!-- End #bb-bookblock -->
<!--  
          <div class="row-fluid spacer">
            <p class="row-fluid pagination-centered "><span class="muted">Or sign in using</span></p>
            <ul class="row-fluid fluid general_statistics alternative_login">
                <li class="box gradient span6 twitter">
                   <a href="#"n class="btn btn-twitter row-fluid"><i class="icon-twitter"></i>Login with Twitter</a>
                </li>
                <li class="box gradient span6 facebook">
                 <a href="#" class="btn btn-facebook row-fluid"><i class="icon-facebook"></i>Login with Facebook</a>
              </li>
            </ul>
          </div>--><!-- End .row-fluid -->

        </div> <!-- End .row-fluid -->

    </div> <!-- End #login -->
        <!-- <img src="img/ajax-loader.gif"> -->
    </div> <!-- End #loading -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    
    <!-- Flip effect on login screen -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/js/plugins/jquerypp.custom.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/js/plugins/jquery.bookblock.js"></script>
    <script language="javascript" type="text/javascript" src="<?=base_url()?>/js/plugins/jquery.uniform.min.js"></script>

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
//              $slides.on( {
//                'swipeleft'   : function( event ) {                
//                  config.bb.next();
//                  return false;
//                },
//                'swiperight'  : function( event ) {                
//                  config.bb.prev();
//                  return false;                  
//                }
//              } );

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
