<?php include_once __DIR__ . ('/includes/php/header.php'); ?>

<!-- body -->
<body class="home page page-id-825 page-parent page-template-default template-slider  color-custom style-default layout-full-width nice-scroll-on mobile-tb-left header-plain header-fw sticky-header sticky-white ab-show subheader-title-left wpb-js-composer js-comp-ver-4.6.2 vc_responsive">



	
	<!-- mfn_hook_top --><!-- mfn_hook_top -->	
		
		
	<!-- #Wrapper -->
	<div id="Wrapper">
	
				
			
		<!-- #Header_bg -->
		<?php include_once __DIR__ . '/includes/php/menu.php'; ?>
		

		
		
		<!-- hererererer -->
						<div class="mfn-main-slider" id="mfn-rev-slider">
<div id="rev_slider_1_2_wrapper" class="rev_slider_wrapper fullscreen-container" style="background-color:#222;padding:0px;">
<!-- START REVOLUTION SLIDER 4.6.93 fullscreen mode -->
	<div id="rev_slider_1_2" class="rev_slider fullscreenbanner" style="display:none;">
<ul>	<!-- SLIDE  -->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-link="/personal/adsl"  data-thumb="http://blisstel.com.au/includes/images/slide_content_personal.png"  data-saveperformance="off"  data-title="Slide">
		<!-- MAIN IMAGE -->
		<img src="http://blisstel.com.au/includes/images/home_slider.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption sfl rs-parallaxlevel-0" 
			 id="personal-desktop" 
			 data-x="center" data-hoffset="1" 
			 data-y="center" data-voffset="1" 
			data-speed="750" 
			data-start="500" 
			data-easing="Power3.easeInOut" 
			data-elementdelay="0.1" 
			data-endelementdelay="0.1" 
			 data-endspeed="300" 

			style="z-index: 5;"><img src="http://blisstel.com.au/includes/images/slide_content_personal.png" alt=""> 
		</div>
	</li>
  <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-link="/personal/nbn"  data-thumb="http://blisstel.com.au/includes/images/slide_content_personal-NBN.png"  data-saveperformance="off"  data-title="Slide">
		<!-- MAIN IMAGE -->
		<img src="http://blisstel.com.au/includes/images/home_slider.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption sfl rs-parallaxlevel-0" 
			 id="personal-desktop" 
			 data-x="center" data-hoffset="1" 
			 data-y="center" data-voffset="1" 
			data-speed="750" 
			data-start="500" 
			data-easing="Power3.easeInOut" 
			data-elementdelay="0.1" 
			data-endelementdelay="0.1" 
			 data-endspeed="300" 

			style="z-index: 5;"><img src="http://blisstel.com.au/includes/images/slide_content_personal-NBN.png" alt=""> 
		</div>
	</li>
</ul>
<div class="tp-bannertimer"></div>	</div>
			

			<style scoped></style>

			<script type="text/javascript">

				/******************************************
					-	PREPARE PLACEHOLDER FOR SLIDER	-
				******************************************/
				

				var setREVStartSize = function() {
					var	tpopt = new Object();
						tpopt.startwidth = 1440;
						tpopt.startheight = 575;
						tpopt.container = jQuery('#rev_slider_1_2');
						tpopt.fullScreen = "on";
						tpopt.forceFullWidth="on";

					tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
				};

				/* CALL PLACEHOLDER */
				setREVStartSize();


				var tpj=jQuery;
				tpj.noConflict();
				var revapi1;

				tpj(document).ready(function() {

				if(tpj('#rev_slider_1_2').revolution == undefined){
					revslider_showDoubleJqueryError('#rev_slider_1_2');
				}else{
				   revapi1 = tpj('#rev_slider_1_2').show().revolution(
					{	
												dottedOverlay:"none",
						delay:9000,
						startwidth:1440,
						startheight:575,
						hideThumbs:200,

						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:1,
						
												
						simplifyAll:"off",

						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"preview4",

						touchenabled:"on",
						onHoverStop:"on",
						nextSlideOnWindowFocus:"off",

						swipe_threshold: 75,
						swipe_min_touches: 1,
						drag_block_vertical: false,
						
												parallax:"mouse",
						parallaxBgFreeze:"off",
						parallaxLevels:[5,10,15,20,25,30,35,40,45,50],
												
												
						keyboardNavigation:"off",

						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,

						shadow:0,
						fullWidth:"off",
						fullScreen:"on",

												spinner:"spinner0",
												
						stopLoop:"on",
						stopAfterLoops:0,
						stopAtSlide:1,

						shuffle:"off",

						
						forceFullWidth:"on",
						fullScreenAlignForce:"on",
						minFullScreenHeight:"",
						
						hideThumbsOnMobile:"on",
						hideBulletsOnMobile:"on",
						hideArrowsOnMobile:"on",
						hideThumbsUnderResolution:0,

												fullScreenOffsetContainer: "",
						fullScreenOffset: "320px",
												hideSliderAtLimit:0,
						hideCaptionAtLimit:1001,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0					});



									}
				});	/*ready*/

			</script>


			</div><!-- END REVOLUTION SLIDER --></div>
		
		
		
		<!-- mfn_hook_content_before --><!-- mfn_hook_content_before -->
<input type="hidden" value="" id="session_network">
<input type="hidden" value="" id="session_address">
<input type="hidden" value="personal" id="session_customer">
	

	
<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
		
			<div class="entry-content" itemprop="mainContentOfPage">
				<div class="section  full-width no-margin-h no-margin-v   column-margin-0px" id="portal" style="padding-top:0px; padding-bottom:0px; background-color:" ><div class="section_wrapper clearfix"><div class="items_group clearfix"><div class="column one-sixth column_column "><div class="column_attr animate"  data-anim-type="fadeIn" style=""><a href="http://blisstel.com.au/personal/adsl"><center><img class="alignnone wp-image-10635 size-full" src="http://blisstel.com.au/includes/images/icon_adsl.png" alt="" width="194" height="195" /></center>
<h3 style="text-align: center;">ADSL</h3></a></div></div><div class="column one-sixth column_column "><div class="column_attr animate"  data-anim-type="fadeIn" style=""><a href="http://blisstel.com.au/personal/nbn"><center><img class="alignnone wp-image-10641 size-full" src="http://blisstel.com.au/includes/images/icon_nbn.png" alt="" width="194" height="195" /></center>
<h3 style="text-align: center;">NBN</h3></a></div></div><div class="column one-sixth column_column "><div class="column_attr animate"  data-anim-type="fadeIn" style=""><a href="http://blisstel.com.au/personal/adsl-bundles"><center><img class="alignnone wp-image-10650 size-full" src="http://blisstel.com.au/includes/images/icon_bundle.png" alt="" width="194" height="195" /></center>
<h3 style="text-align: center;">BUNDLES</h3></a></div></div><div class="column one-sixth column_column "><div class="column_attr animate"  data-anim-type="fadeIn" style=""><a href="http://blisstel.com.au/personal/phone"><center><img class="alignnone wp-image-10643 size-full" src="http://blisstel.com.au/includes/images/icon_phone.png" alt="" width="194" height="195" /></center>
<h3 style="text-align: center;">PHONE</h3></a></div></div><div class="column one-sixth column_column "><div class="column_attr animate"  data-anim-type="fadeIn" style=""><a href="http://blisstel.com.au/rewards"><center><img class="alignnone wp-image-10652 size-full" src="http://blisstel.com.au/includes/images/icon_rewards.png" alt="" width="194" height="195" /></center>
<h3 style="text-align: center;">REWARDS</h3></a></div></div><div class="column one-sixth column_column "><div class="column_attr animate"  data-anim-type="fadeIn" style=""><a href="#"><center><img class="alignnone wp-image-10639 size-full" src="http://blisstel.com.au/includes/images/icon_business.png" alt="" width="194" height="195" /></center>
<h3 style="text-align: center;">BUSINESS</h3></a></div></div></div></div></div><div class="section the_content no_content"><div class="section_wrapper"><div class="the_content_wrapper"></div></div></div>			</div>
			
				
		</div>
		
		<!-- .four-columns - sidebar -->
		
	</div>
</div>

<!-- WordPressSEOPlugin -->
<!-- mfn_hook_content_after --><!-- mfn_hook_content_after -->
<!-- #Footer -->		

<?php include_once __DIR__ . ('/includes/php/footer.php'); ?>