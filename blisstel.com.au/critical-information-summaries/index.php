<?php include_once __DIR__ . ('/../includes/php/header.php'); ?>



<body class="page page-id-10674 page-template-default template-slider  with_aside aside_right color-custom style-default layout-full-width nice-scroll-on mobile-tb-left header-plain header-fw sticky-header sticky-white ab-show subheader-title-left wpb-js-composer js-comp-ver-4.6.2 vc_responsive">



  <div id="Wrapper">



    <!-- #Header_bg -->
    <?php include_once __DIR__ . '/../includes/php/menu.php'; ?>

	
	
	<!-- Here -->
	
	<div class="mfn-main-slider" id="mfn-rev-slider">
          <div id="rev_slider_5_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#0f0a6c;padding:0px;margin-top:0px;margin-bottom:0px;max-height:300px;">
            <div id="rev_slider_5_2" class="rev_slider fullwidthabanner" style="display:none;max-height:300px;height:300px;">
              <ul>
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off"> <img src="http://blisstel.com.au/includes/images/home_slider.jpg" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                  <div class="tp-caption black tp-fade tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="0" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                    <h1 class="white">Critical Information Summaries</h1></div>
                </li>
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off"> <img src="http://blisstel.com.au/includes/images/home_slider.jpg" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                  <div class="tp-caption black tp-fade tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="0" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                    <h1 class="white">Critical Information Summaries</h1></div>
                </li>
              </ul>
              <div class="tp-bannertimer"></div>
            </div>
            <style scoped>
              .tp-caption.black,
              .black {
                color: #000;
                text-shadow: none
              }
            </style>
            <script type="text/javascript">
              /*<![CDATA[*/
              var setREVStartSize = function() {
                var tpopt = new Object();
                tpopt.startwidth = 960;
                tpopt.startheight = 300;
                tpopt.container = jQuery('#rev_slider_5_2');
                tpopt.fullScreen = "off";
                tpopt.forceFullWidth = "on";
                tpopt.container.closest(".rev_slider_wrapper").css({
                  height: tpopt.container.height()
                });
                tpopt.width = parseInt(tpopt.container.width(), 0);
                tpopt.height = parseInt(tpopt.container.height(), 0);
                tpopt.bw = tpopt.width / tpopt.startwidth;
                tpopt.bh = tpopt.height / tpopt.startheight;
                if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw;
                if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh;
                if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw;
                if (tpopt.bh > 1) {
                  tpopt.bw = 1;
                  tpopt.bh = 1
                }
                if (tpopt.bw > 1) {
                  tpopt.bw = 1;
                  tpopt.bh = 1
                }
                tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
                if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight;
                if (tpopt.fullScreen == "on") {
                  tpopt.height = tpopt.bw * tpopt.startheight;
                  var cow = tpopt.container.parent().width();
                  var coh = jQuery(window).height();
                  if (tpopt.fullScreenOffsetContainer != undefined) {
                    try {
                      var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                      jQuery.each(offcontainers, function(e, t) {
                        coh = coh - jQuery(t).outerHeight(true);
                        if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight
                      })
                    } catch (e) {}
                  }
                  tpopt.container.parent().height(coh);
                  tpopt.container.height(coh);
                  tpopt.container.closest(".rev_slider_wrapper").height(coh);
                  tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
                  tpopt.container.css({
                    height: "100%"
                  });
                  tpopt.height = coh;
                } else {
                  tpopt.container.height(tpopt.height);
                  tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
                  tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
                }
              };
              setREVStartSize();
              var tpj = jQuery;
              tpj.noConflict();
              var revapi5;
              tpj(document).ready(function() {
                if (tpj('#rev_slider_5_2').revolution == undefined) {
                  revslider_showDoubleJqueryError('#rev_slider_5_2');
                } else {
                  revapi5 = tpj('#rev_slider_5_2').show().revolution({
                    dottedOverlay: "none",
                    delay: 9000,
                    startwidth: 960,
                    startheight: 300,
                    hideThumbs: 200,
                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 1,
                    simplifyAll: "off",
                    navigationType: "none",
                    navigationArrows: "none",
                    navigationStyle: "round",
                    touchenabled: "on",
                    onHoverStop: "off",
                    nextSlideOnWindowFocus: "off",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    drag_block_vertical: false,
                    keyboardNavigation: "off",
                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 20,
                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,
                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,
                    shadow: 0,
                    fullWidth: "on",
                    fullScreen: "off",
                    spinner: "spinner0",
                    stopLoop: "on",
                    stopAfterLoops: 0,
                    stopAtSlide: 1,
                    shuffle: "off",
                    autoHeight: "off",
                    forceFullWidth: "on",
                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResolution: 0,
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0
                  });
                }
              }); /*]]>*/
            </script>
          </div>
        </div>
	
	
	
	
	
    <input type="hidden" value="" id="session_network">
    <input type="hidden" value="" id="session_address">
    <input type="hidden" value="" id="session_customer">


    <div id="Content">
      <div class="content_wrapper clearfix">
        <div class="sections_group">
          <div class="entry-content" itemprop="mainContentOfPage">
            <div class="section    " style="padding-top:50px; padding-bottom:0px; background-color:">
              <div class="section_wrapper clearfix">
                <div class="items_group clearfix">
                  <div class="column one column_column support-icons">
                    <div class="column_attr" style="">
                      <a class="content_link scroll" href="#personal"><span class="icon"><i class="icon-home"></i></span><span class="title">Personal</span></a>
                      <!-- <a class="content_link scroll" href="#business"><span class="icon"><i class="icon-shop-line"></i></span><span class="title">Business</span></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="section    " style="padding-top:0px; padding-bottom:0px; background-color:">

              <div class="section_wrapper clearfix">
                <div class="items_group clearfix">
                  <div class="column one column_faq ">
                    <div class="faq">
                      <h4 class="title"><span id="personal">Personal</span></h4>
                      <div class="mfn-acc faq_wrapper ">
                        <div class="question">
                          <div class="title"><span class="num">1</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>ADSL</div>
                          <div class="answer">
                            <p>
                              <h3 class="ui-sortable-handle">On Net</h3>
                            </p>
                            <p>
                              <a title="Bliss Internet On Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissInternet-on-net.pdf" target="_blank">Bliss Internet</a><br>
                              <a title="Bliss Bundle On Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissBundle-on-net.pdf" target="_blank">Bliss Bundle</a><br>
                              <a title="Bliss Saver On Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissSaver-on-net.pdf" target="_blank">Bliss Saver</a><br>
                              <a title="Bliss Ultimate On Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissUltimate-on-net.pdf" target="_blank">Bliss Ultimate</a>
                            </p>
                            <p>
                              <h3 class="ui-sortable-handle">Off Net</h3>
                            </p>
                            <p>
                              <a title="Bliss Internet Off Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissInternet-off-net.pdf" target="_blank">Bliss Internet</a><br>
                              <a title="Bliss Bundle Off Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissBundle-off-net.pdf" target="_blank">Bliss Bundle</a><br>
                              <a title="Bliss Saver Off Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissSaver-off-net.pdf" target="_blank">Bliss Saver</a><br>
                              <a title="Bliss Ultimate Off Net" href="/data/cis2016/Blisstel-CIS-ADSL-BlissUltimate-off-net.pdf" target="_blank">Bliss Ultimate</a>
                            </p>

                          </div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">2</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>NBN</div>
                          <div class="answer">
                            <p>
                              <h3 class="ui-sortable-handle">NBN Plans</h3>
                            </p>
                            <p>
                              <a title="NBN 12" href="/data/cis2016/Blisstel-CIS-NBN-Unbundled-12.pdf" target="_blank">NBN 12</a><br>
                              <a title="NBN 25" href="/data/cis2016/Blisstel-CIS-NBN-Unbundled-25.pdf" target="_blank">NBN 25</a><br>
                              <a title="NBN 50" href="/data/cis2016/Blisstel-CIS-NBN-Unbundled-50.pdf" target="_blank">NBN 50</a><br>
                              <a title="NBN 100" href="/data/cis2016/Blisstel-CIS-NBN-Unbundled-100.pdf" target="_blank">NBN 100</a>
                            <p>
                            <p>
                              <h3 class="ui-sortable-handle">NBN Bundles</h3>
                            </p>
                            <p>
                              <a title="NBN 12 Bundled" href="/data/cis2016/Blisstel-CIS-NBN-Bundled-12.pdf" target="_blank">NBN 12</a><br>
                              <a title="NBN 25 Bundled" href="/data/cis2016/Blisstel-CIS-NBN-Bundled-25.pdf" target="_blank">NBN 25</a><br>
                              <a title="NBN 50 Bundled" href="/data/cis2016/Blisstel-CIS-NBN-Bundled-50.pdf" target="_blank">NBN 50</a><br>
                              <a title="NBN 100 Bundled" href="/data/cis2016/Blisstel-CIS-NBN-Bundled-100.pdf" target="_blank">NBN 100</a>
                            <p>
                          </div>
                        </div>
                        <div class="question ">
                          <div class="title "><span class="num ">3</span><i class="icon-plus acc-icon-plus "></i><i class="icon-minus acc-icon-minus "></i>Phone</div>
                          <div class="answer ">
                            <p>
                              <h3 class="ui-sortable-handle">Phone Plans</h3>
                            </p>
                            <p>
                              <a title="Bliss 30" href="/data/cis2016/Blisstel-CIS-Phone-Bliss30.pdf" target="_blank">Bliss 30</a><br>
                              <a title="Bliss 45" href="/data/cis2016/Blisstel-CIS-Phone-Bliss45.pdf" target="_blank">Bliss 45</a><br>
                              <a title="Bliss 75" href="/data/cis2016/Blisstel-CIS-Phone-Bliss75.pdf" target="_blank">Bliss 75</a>
                            <p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="column one column_faq ">
                    <div class="faq">
                      <h4 class="title"><span id="business">Business</span></h4>
                      <div class="mfn-acc faq_wrapper ">
                        <div class="question">
                          <div class="title"><span class="num">1</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>ADSL</div>
                          <div class="answer">
                            <p><a title="Blisstel Business ADSL" href="http://blisstel.com.au/data/Blisstel-Business-Broadband-28-July-15.pdf"><strong>Biz Unlimited ADSL</strong></a></p>
                          </div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">2</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>NBN</div>
                          <div class="answer">
                            <p><a title=NBN " href="http://blisstel.com.au/data/cis2016/Critical-Information-Summary-Broadband-NBN.pdf ">Biz Unlimited NBN</a><p></div></div><div class="question "><div class="title "><span class="num ">3</span><i class="icon-plus acc-icon-plus "></i><i class="icon-minus acc-icon-minus "></i>Phone</div><div class="answer "><p><a title="Blisstel Business Phone " href="http://blisstel.com.au/data/Blisstel-Business-Voice-28-July-15.pdf "><strong>Biz Phone </strong>每<strong> </strong>Broadband</a></p></div></div><div class="question "><div class="title "><span class="num ">4</span><i class="icon-plus acc-icon-plus "></i><i class="icon-minus acc-icon-minus "></i>NBN Voice</div><div class="answer "><p><a title="NBN Voice 5 " href="http://blisstel.com.au/data/cis2016/Critical-Information-Summary-NBN-Voice-5.pdf ">NBN Voice 5</a><p><p><a title=NBN Voice 10" href="http://blisstel.com.au/data/cis2016/Critical-Information-Summary-NBN-Voice-10.pdf">NBN Voice 10</a>
                              <p>
                                <p><a title="NBN Voice 25" href="http://blisstel.com.au/data/cis2016/Critical-Information-Summary-NBN-Voice-25.pdf">NBN Voice 25</a>
                                  <p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="section the_content no_content"></div>
          </div>
        </div>
        <div class="sidebar sidebar-1 four columns">
          <div class="widget-area clearfix ">
            <aside id="text-6" class="widget widget_text">
              <h3>Customer Support</h3>
              <div class="textwidget"><big>1300 254 777</big>
                <p style="margin-bottom: 0; text-align: center;"> Hours of operation <br><b><i class="icon-clock"></i> Mon - Fri 9:00am - 8:00pm <span class="tooltip tooltip-txt" data-tooltip="We are located in Melbourne">(AEST)</span> </b><br><b>Sat 9:00am - 5:00pm <span class="tooltip tooltip-txt" data-tooltip="We are located in Melbourne">(AEST)</span> </b></p>
              </div>
            </aside>
            <aside id="text-8" class="widget widget_text">
              <h3>Sales Enquiries</h3>
              <div class="textwidget"><big>1300 994 579</big>
                <p style="margin-bottom: 0; text-align: center;"> Hours of operation <br><b><i class="icon-clock"></i> Mon - Fri 9:00am - 7:00pm <span class="tooltip tooltip-txt" data-tooltip="We are located in Melbourne">(AEST)</span> </b></p>
              </div>
            </aside>
            <!--<aside id="search-2" class="widget widget_search">
              <h3>Search</h3>
              <form method="get" id="searchform" action="http://blisstel.com.au/"> <input type="text" class="field" name="s" id="s" placeholder="Enter your search" /> <input type="submit" class="submit" value="Search" /></form>
            </aside>-->
          </div>
        </div>
      </div>
    </div>

<?php include_once __DIR__ . ('/../includes/php/footer.php'); ?>
