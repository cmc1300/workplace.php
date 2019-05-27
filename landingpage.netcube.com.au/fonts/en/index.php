<?php
 echo "<script>";
 echo "location='../../index.php'";
 echo "</script>";
?>
<?php include 'include/header.php';?>
<?php include 'biz/subDomainAction.php';?>
<!--slider start-->
<div class="flexslider hidden-xs">
  <ul class="slides">
    <li>
      <div class="container sliderBox"><img src="<?php echo SITE_PATH;?>/images/slide-1.jpg" />
        <div class="flex-caption row sliderBtn hidden-xs">
          <!-- <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 sliderBtnOrange"> <a class="fancybox1" href="#inline1">CHECK AVAILABILITY</a> </div> -->
           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 sliderBtnOrange"> <a href="#" data-toggle="modal" data-target="#myModal1" onclick="return cleanAddreeVal()">CHECK AVAILABILITY</a> </div> 
        </div>
      </div>
    </li>
    <!--<li>
      <div class="container sliderBox"><img src="<?php echo SITE_PATH;?>/images/slide-1.png" /></div>
    </li>-->
  </ul>
</div>
<!--slider over--> 
<!--phoneBtn slider start-->
<div class="clearfix visible-xs container1">
<div class="flexslider">
  <ul class="slides">
    <li>
      <div class="container sliderBox">
         <img src="<?php echo SITE_PATH;?>/images/landing_iphone_800.png" />
      </div>
    </li>
  </ul>
</div>
</div>
<!--phoneBtn slider over-->
<!--phoneBtn start-->
<div class="clearfix visible-xs container">
  <div class="row sliderBtn">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 sliderBtnOrange" style="padding:0;"> 
       <a href="#" data-toggle="modal" data-target="#myModal1"  onclick="return cleanAddreeVal()">CHECK AVAILABILITY</a> 
    </div>
  </div>
</div>
<!--phoneBtn over--> 
<!--server start-->
<div class="serverBox">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 serverLi serverLiMd serverLiXs"> <a href="price_adsl2.php"> <img src="<?php echo SITE_PATH;?>/img/server (1).png" />
        <h6>Broadband</h6>
        </a></div>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 serverLi serverLiMd serverLiXs XsBr0"> <a href="price_nbn.php"> <img src="<?php echo SITE_PATH;?>/img/server (2).png" />
        <h6>NBN</h6>
        </a> </div>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 serverLi serverLiMd br0 serverLiXs "> <a href="bundle.php"> <img src="<?php echo SITE_PATH;?>/img/server (3).png" />
        <h6>Bundle</h6>
        </a> </div>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 serverLi serverLiXs XsBr0"> <a href="#" data-toggle="modal" data-target="#workingonit"> <img src="<?php echo SITE_PATH;?>/img/server (4).png" />
        <h6>Phone</h6>
        </a> </div>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 serverLi serverLiXs bb0"> <a href="#" data-toggle="modal" data-target="#workingonit"> <img src="<?php echo SITE_PATH;?>/img/server (5).png" />
        <h6>Mobile</h6>
        </a> </div>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 serverLi serverLiLg serverLiXs XsBr0 bb0"> <a href="smart-tv.php"> <img src="<?php echo SITE_PATH;?>/img/server (6)_2.png" />
        <h6>Smart TV</h6>
        </a> </div>
    </div>
  </div>
</div>
<div class="shadow"></div>
<!--server over--> 
<!--mid1 start-->
<!--  
<div class="midBox">
  <div class="container">
    <div class="row indexMid">
      <div class="col-xs-12 col-sm-12 col-lg-4">
        <h1>A better Internet ExperIence</h1>
        <p>We listen what you say and help you to find out the package suitable for you. how easy it is to start getting good, honest, and stable broadband.</p>
        <a href="#" class="btn">VIEW  PACKAGES</a> </div>
      <div class="col-xs-12 col-sm-6 col-lg-4"> <img src="<?php echo SITE_PATH;?>/img/midImg01.png" class="img-responsive midImg" /> </div>
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <h3>Why NetCube?</h3>
        <img src="<?php echo SITE_PATH;?>/img/midImg02.png" class="img-responsive midImg" /> </div>
    </div>
  </div>
</div>
-->
<!--mid1 over--> 
<!--mid2 start-->
<!-- 
<div class="midBox">
  <div class="container">
    <div class="row indexMid" style="border:none; margin-bottom:70px;">
      <div class="col-xs-12 col-sm-12 col-lg-4">
        <h1>SWITCHING TO NETCUBE IS EASY</h1>
        <p>We've made switching to NetCube a doddle. Find out how easy it is to start getting good honest broadband. We'll let you know when the switch is finished</p>
        <a href="#" class="btn">VIEW  PACKAGES</a> </div>
      <div class="col-xs-12 col-sm-6 col-lg-4"> <img src="<?php echo SITE_PATH;?>/img/midImg03.png" class="img-responsive midImg" /> </div>
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="indexEvaluate">
          <div class="textScrollBox">
            <ul>
              <li> <i>"NetCube is the perfect fit for us because of its ease of setup and self-service.."</i>
                <div class="shadow"></div>
                <div class="indexEvaluateUser">
                  <div class="img"> <img src="<?php echo SITE_PATH;?>/img/dell.png" /> </div>
                  <h6>DellComputer</h6>
                  <p>@dellcomputer</p>
                </div>
              </li>
              <li> <i>"NetCube is the perfect fit for us because of its ease of setup and self-service.."</i>
                <div class="shadow"></div>
                <div class="indexEvaluateUser">
                  <div class="img"> <img src="<?php echo SITE_PATH;?>/img/dell.png" /> </div>
                  <h6>DellComputer</h6>
                  <p>@dellcomputer</p>
                </div>
              </li>
              <li> <i>"NetCube is the perfect fit for us because of its ease of setup and self-service.."</i>
                <div class="shadow"></div>
                <div class="indexEvaluateUser">
                  <div class="img"> <img src="<?php echo SITE_PATH;?>/img/dell.png" /> </div>
                  <h6>DellComputer</h6>
                  <p>@dellcomputer</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
<?php include 'include/mid_one.php';?>
<?php include 'include/mid_two.php';?>
<!--mid2 over-->
<?php $displaySSL = true; //Disply the SSL from GeoTrust
include 'include/footer.php';?>
<?php include 'include/nbnvedioPopup.php';?>
<!-- Modal start-->
<div class="modal fade popupBox" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <div class="modal-body" style="background:url(img/bg4.png) no-repeat right bottom">
        <!--popupBox1 start-->
        <div style="display:;">
          <h3>Let's get your order started</h3>
          <p>We will simply check your address, and let you know which broadband package is available for you.<br />
            Please enter the installation address.</p>
          <div class="input-group inputBox"><span class="input-group-addon">Address</span>
          <div class="clearfix visible-sm visible-md"></div>
            <input type="text" class="form-control" placeholder="e.g. 1125 Docklands Drive, Docklands, VIC 3008">
          </div>
          <h3>Or are you already with us?</h3>
          <p>Go to<a href="#">My Account</a>to see existing customer offers or relocate your service.</p>
        </div>
        <!--popupBox1 over-->
        <!--popupBox2 start-->
        <div style="display:;">
          <h3>Checking your address</h3>
          <div class="row">
            <div class="col-xs-12 col-sm-4 loadingBox"><img class="img-responsive" src="<?php echo SITE_PATH;?>/img/loading.gif" /></div>
            <div class="col-xs-12 col-sm-8">
              <p>We are checking if this product is available at your address.<br />
                This process may take serveral minutes.</p>
              <p>We want to make sure give you the most detailed information we can.<br />
                Your address helps us to provide this.</p>
              <p>Your Address:</p>
              <a href="#" class="blackBtn">Change Address</a><div class="clear"></div></div>
          </div>
        </div>
        <!--popupBox2 over-->
        <!--popupBox3 start-->
        <div style="display:;">
          <h3>Great News, this is your perfect plan.</h3>
          <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <div class="pd20Box blackBg pirceBox">
                <h4>Unlimited ADSL2+ ON-NET</h4>
                <div class="pirce">$69.95<small>/month</small></div>
                <h4 class="blue">Internet+Home phone line</h4>
              </div>
              <p style="font-size:12px;">Minimum total cost for the selected products on a 24-month contract is $1997.80 ($69.95 monthly Unlimited ADSL2+ Plan fee+ $10 monthly phone line fee + $79 setup fee for ADSL2+ Plan). Please note a telephone connection fee may apply.</p>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
              <h3>Customise your plan</h3>
              <div class="checkBox">
                <div class="checkbox">
                  <label>
                  <input type="checkbox" id="" onclick=""/>
                  <label>Bundle with your <a href="#">home phone</a> for great benefits like discounted broadband and quota boosts!</label>
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                  <input type="checkbox" id="" onclick=""/>
                  <label>Plus $9.95 with netphone1<small class="gray">(unlimited local & national calls)</small></label>
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                  <input type="checkbox" id="" onclick=""/>
                  <label>Plus $15 with netphone2<small class="gray">(unlimited local, national and mobile calls)</small></label>
                  </label>
                </div>
              </div>
              <a href="#" class="orangeBtn">SIGN UP NOW</a>
              <div class="clear"></div>
              <p><a href="#">View the plan detial</a></p>
            </div>
          </div>
        </div>
        <!--popupBox3 over-->
      </div>
    </div>
  </div>
</div>
<!--modal over-->
