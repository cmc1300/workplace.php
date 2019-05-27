<?php 
/*		*/
if(true) {
	header("Location: http://netcube.com.au");
	die();
}
?>
<!DOCTYPE html>
<!--[if IE 8]>      <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>      <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <!--<![endif]-->
<html>
  <head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="description" content="NetCube give you the Unlimited Internet service, with absolute freedom!">
    <meta name="keywords" content="ADSL2+, ADSL, Unlimited, NBN, Internet, Mobile, IPTV, Broadband, Router, Phone">

    <title>NetCube Unlimited Internet</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="http://netcube.com.au/favicon.ico" />

    <!-- Google Webfont -->
    <link href='http://fonts.googleapis.com/css?family=Vampiro+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,600,700' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/slick/slick.css"/>
    <link rel="stylesheet" href="js/flex-slider/flexslider.css"/>
    <link rel="stylesheet" href="js/owl-carousel/owl.carousel.css"/>
    <link rel="stylesheet" href="js/owl-carousel/owl.theme.css"/>
    <link rel="stylesheet" href="js/owl-carousel/owl.transitions.css"/>
    <!--  -->
    <link rel="stylesheet" href="css/prettyphoto.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- SKIN -->
    <link rel="stylesheet" title="blue" href="css/colors/skin-blue.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

    <!-- MODERNIZR -->
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-54649736-6', 'auto');
      ga('send', 'pageview');

    </script>

    <script>
      function checkInputParameters(type) {
        var name    = "";
        var phone   = "";
        var email   = "";
        var message = "";

        if (type == 'invite') {
          name    = $("#name").val();
          phone   = $("#phone").val();
          email   = $("#email").val();
          message = $("#message").val();
        }
        else if (type == 'contactForm') {
          name    = $("#senderName").val();
          phone   = $("#senderPhone").val();
          email   = $("#senderEmail").val();
          message = $("#senderMessage").val();
        }

        console.log("index.php checkInputParameters calls type: " + type);
        if ( $("#ajaxState").val() == "successful"  ){
          console.log("index.php checkInputParameters exit automatically!");
          $("#ajaxState").val("successful");
          return true;
        }

        $.ajax({
          type: "post",
          url: "php/landpageSeptCheck.php",
          dataType: "html",
          data:{action:"check",phone:phone,email:email},
          error: function(xhr){
            $("#ajaxResult").val("An error occured in landpageSeptCheck.php: " + xhr.responseText);
            console.log("An ajax error occured: " + xhr.responseText);
          },
          success: function(response){
            var verify = "Result of successful verifying landing page landpageSeptCheck.php: "+ response.trim();
            $("#ajaxResult").val(verify.trim());
            console.log(verify);
            var pos1 = verify.search("Phone or E-mail did not exist");
            var pos2 = verify.search("Email and/or phone number already taken");
            if (pos1 > 0) {
              console.log("checkInputParameters submit form #" + type);
              $("#ajaxResult").val("successful");
              $("#ajaxState").val("successful");
              setTimeout(function(){
                $("#" + type).submit();
              }, 500);
            }
            else if (pos2 > 0) {
              $("#ajaxResult").val("fail");
              window.location.href = "http://landing.netcube.com.au/thank-you.php" + "?email=" + $("#email").val();
            }
            else {
              console.log("Failed to submit your sign up!");
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
    		});
    </script>
  </head>
  <body id="page-top">
	<input type="hidden" name="ajaxResult" id="ajaxResult" value="none" />
	<input type="hidden" name="ajaxState" id="ajaxState" value="none" />
    <div id="body">
      <!-- HEADER -->
      <header>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-top">
          <div class="container">
            <div class="col-md-12">
              <div class="col-xs-7">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                  <a class="navbar-brand" href="./index.html"><img src="images/netcube-logo.png" class="img-responsive" alt="NetCube Logo"/></a>
                </div>
              </div>
              <div class="col-xs-5">
                <!-- Phone Number -->
                <div id="offer"><span style="color:#3498db;">Today's offer</span> <strong>$50</strong> cash back</div>
              </div>
            </div>
          </div>
        </nav>
      </header>

      <!-- INTRO -->
      <section id="intro">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-7">
                  <h1>Unlimited NBN / ADSL2+</h1>
                  <img src="images/banner.png" class="img-responsive" alt="$50 cash back"/>
                  <h2>Why pay for big names? <span class="network">when you can use THE SAME NETWORK!</span></h2>
                  <p class="disclaimer">Min. price $148.95, includes $99 set-up fee. ADSL2+ requires an active phone line. BYO Modem.</p>

                </div>
                <div class="col-md-5 sub-form">
                  <div id="sub-form">
                    <form class="subscribe" action="php/landpageSeptAdd.php" id="invite" name="invite" onsubmit="return checkInputParameters('invite')" method="POST">
                      <h4>Submit your details below and we'll get back to you with more details</h4>
                      <h5>Get Started Now</h5>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" name="name" id="name" class="name" placeholder="Name*" required="required">
                        </div>
                        <div class="col-md-6">
                          <input type="text" name="phone" id="phone" class="phone" placeholder="Phone*" required="required">
                        </div>
                      </div>
                      <input type="email" class="e-mail" placeholder="Email*" name="email" id="email" required="required">
                      <textarea class="message" id="message" name='message' rows="3" placeholder="Message"></textarea>
                      <div class="clearfix"></div>
                      <div class="space40"></div>
                      <button type="submit" name="inviteBtn" id="inviteBtn" class="btn-main btn-center">Get Started</button>
                    </form>
                  </div>
                  <span id="result"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- INTRO -->

      <!-- SERVICES -->
      <section id="services">
        <div class="container">
          <div class="row">
            <div class="col-md-2 service-content sc1">
              <span><i class="fa fa-usd"></i></span>
              <h4>No excess charges</h4>
            </div>
            <div class="col-md-2 service-content sc2">
              <span><i class="fa fa-line-chart"></i></span>
              <h4>No peak/off-peak times</h4>
            </div>
            <div class="col-md-2 service-content sc3">
              <span>
                <img src="images/map-blue.png" class="blue-front" alt="Australia Map" >
                <img src="images/map-white.png" class="white-front" alt="Australia Map" >
              </span>
              <h4>Powered by Australia's largest network</h4>
            </div>
            <div class="col-md-2 service-content sc1">
              <span><i class="fa fa-globe"></i></span>
              <h4>Multilingual customer support</h4>
            </div>
            <div class="col-md-2 service-content sc2">
              <span><i class="fa fa-hdd-o"></i></span>
              <h4>Free 15G Google drive storage</h4>
            </div>
            <div class="col-md-2 service-content sc3">
              <span><i class="fa fa-user-plus"></i></span>
              <h4>Refer a friend and receive another free month</h4>
            </div>
          </div>
        </div>
      </section>
      <!-- SERVICES -->

      <!-- Why choose NetCube -->
      <section class="dual-info">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h4>Why choose NetCube</h4>
              <p>Our team at NetCube is here to help you get the product that meets your need and budget with the after sale customer service that you deserve. </p>
              <ul class="space40">
                <li><i class="fa fa-check"></i> Unlimited high speed internet without restriction </li>
                <li><i class="fa fa-check"></i> Powered by Australia’s largest network</li>
                <li><i class="fa fa-check"></i> 7 days customer support based in Australia</li>
                <li><i class="fa fa-check"></i> Multilingual customer support</li>
              </ul>
            </div>
          <div class="col-md-6">
            <img src="images/team.png" class="img-responsive team" alt="our team"/>
          </div>
        </div>
        </div>
      </section>
      <!-- Why choose NetCube -->

      <!-- TESTIMONIALS -->
      <div class="testimonials">
        <div class="container">
          <div class="row">
            <div id="quote-slider" class="owl-carousel owl-theme">
              <div class="item">
                <div class="col-md-12">
                  <div class="quote-info">
                    <p>No hassle setup system with wonderful technical support is really good.</p>
                    <cite>- Bret Shaw<span><img src="images/testimonial/bret.png" class="img-responsive" alt="happy customer"/></span></cite>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-12">
                  <div class="quote-info">
                    <p>I think ample of services with good quality and high performance has made NetCube one of the best ISPs.</p>
                    <cite>- Guneet Singh<span><img src="images/testimonial/guneet.png" class="img-responsive" alt="happy customer"/></span></cite>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-12">
                  <div class="quote-info">
                    <p>Absolutely the best for service and value! Love my ISP + phone service provider.</p>
                    <cite>- Khanh Nguyen<span><img src="images/testimonial/Khanh.png" class="img-responsive" alt="happy customer"/></span></cite>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-12">
                  <div class="quote-info">
                    <p>NetCube is reliable with great performance, I’m glad that I made the switch.</p>
                    <cite>- Zan Ge<span><img src="images/testimonial/zan.png" class="img-responsive" alt="happy customer"/></span></cite>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- TESTIMONIALS -->

      <!-- FOOTER -->
      <footer id="footer">
        <div class="container">
          <div class="row">
            <div class="content-head content-head-lite">
              <h3>Get Started Now</h3>
              <h4>Submit your details below and we'll get back to you with more details</h4>
            </div>
          </div>
          <div class="row">
            <!-- Contact Form -->
            <div class="col-md-12">
              <!--<h5>Enquire Now</h5>-->
              <form action="php/landpageSeptAdd.php" name="contactForm" id="contactForm" onsubmit="return checkInputParameters('contactForm')" method="post">
                <div class="row">
                  <div class="form-width">
                    <input name="senderName" id="senderName" type="text" placeholder="Name*" required="required" />
                    <input type="phone" name="senderPhone" id="senderPhone" placeholder="Phone*" required="required"/>
                    <input type="email" name="senderEmail" id="senderEmail" placeholder="Email*" required="required"/>
                    <textarea rows="4" name="senderMessage" id="senderMessage" placeholder="Message"></textarea>
                    <button  name="contactFormBtn" id="contactFormBtn" type="submit" class="btn-main pull-right">Get Started</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6"></div>
                </div>
              </form>
              <div id="sendingMessage" class="statusMessage">
                <p><i class="fa fa-spin fa-spinner"></i> Sending your message. Please wait...</p>
              </div>
              <div id="successMessage" class="successmessage">
                <p><i class="fa fa-check"></i> Thanks for sending your message! We'll get back to you shortly.</p>
              </div>
              <div id="failureMessage" class="errormessage">
                <p><i class="fa fa-close"></i> There was a problem sending your message. Please try again.</p>
              </div>
              <div id="incompleteMessage" class="statusMessage">
                <p><i class="fa fa-warning"></i> Please complete all the fields in the form before sending.</p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- FOOTER -->

      <!-- FOOTER / COPYRIGHT -->
      <div class="footer-copy">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <p>&copy; 2015. NetCube. All rights reserved. <a href="http://netcube.com.au/help/termsAndConditions.php" target="_blank">Privacy Policy</a>.</p>
            </div>

            <div class="col-md-5">
              <a class="backtotop page-scroll" href="#page-top">Back to top &Delta;</a>
            </div>
          </div>
        </div>
      </div>
      <!-- FOOTER / COPYRIGHT -->
    </div>

  <!-- Javascript -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/flex-slider/jquery.flexslider.js"></script>
  <script src="js/owl-carousel/owl.carousel.js"></script>
  <script src="js/slick/slick.js"></script>
  <script src="js/mc/jquery.ketchup.all.min.js"></script>
  <script src="js/main.js"></script>

<script>
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
  </body>
</html>
