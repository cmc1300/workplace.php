<?php include_once __DIR__ . ('/../includes/php/header.php'); ?>

<!-- body -->
<body class="page page-id-10602 page-template-default template-slider  with_aside aside_right color-custom style-default layout-full-width mobile-tb-left header-plain header-fw sticky-header sticky-white ab-show subheader-title-left wpb-js-composer js-comp-ver-4.6.2 vc_responsive nice-scroll">




  <!-- mfn_hook_top -->
  <!-- mfn_hook_top -->


  <!-- #Wrapper -->
  <div id="Wrapper">



    <!-- #Header_bg -->
    <?php include_once __DIR__ . '/../includes/php/menu.php'; ?>

	
	<div class="mfn-main-slider" id="mfn-rev-slider">
          <div id="rev_slider_2_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#0f0a6c;padding:0px;margin-top:0px;margin-bottom:0px;max-height:300px;">
            <!-- START REVOLUTION SLIDER 4.6.93 fullwidth mode -->
            <div id="rev_slider_2_2" class="rev_slider fullwidthabanner" style="display:none;max-height:300px;height:300px;">
              <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                  <!-- MAIN IMAGE -->
                  <img src="../includes/images/home_slider.jpg" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                  <!-- LAYERS -->

                  <!-- LAYER NR. 1 -->
                  <div class="tp-caption black tp-fade tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="0" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                    <h1 class="white">Support</h1>
                  </div>
                </li>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                  <!-- MAIN IMAGE -->
                  <img src="../includes/images/home_slider.jpg" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                  <!-- LAYERS -->

                  <!-- LAYER NR. 1 -->
                  <div class="tp-caption black tp-fade tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="0" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                    <h1 class="white">Support</h1>
                  </div>
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
              /******************************************
              					-	PREPARE PLACEHOLDER FOR SLIDER	-
              				******************************************/


              var setREVStartSize = function() {
                var tpopt = new Object();
                tpopt.startwidth = 960;
                tpopt.startheight = 300;
                tpopt.container = jQuery('#rev_slider_2_2');
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

              /* CALL PLACEHOLDER */
              setREVStartSize();


              var tpj = jQuery;
              tpj.noConflict();
              var revapi2;

              tpj(document).ready(function() {

                if (tpj('#rev_slider_2_2').revolution == undefined) {
                  revslider_showDoubleJqueryError('#rev_slider_2_2');
                } else {
                  revapi2 = tpj('#rev_slider_2_2').show().revolution({
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
              }); /*ready*/
            </script>


          </div>
          <!-- END REVOLUTION SLIDER -->
        </div>
	
	
	
	
	
	
	
	
    <!-- mfn_hook_content_before -->
    <!-- mfn_hook_content_before -->
    <input type="hidden" value="" id="session_network">
    <input type="hidden" value="" id="session_address">
    <input type="hidden" value="" id="session_customer">



    <!-- #Content -->
    <div id="Content">
      <div class="content_wrapper clearfix">

        <!-- .sections_group -->
        <div class="sections_group">

          <div class="entry-content" itemprop="mainContentOfPage">
            <div class="section    " style="padding-top:50px; padding-bottom:0px; background-color:">
              <div class="section_wrapper clearfix">
                <div class="items_group clearfix">
                  <div class="column one column_column support-icons">
                    <div class="column_attr" style=""><a class="content_link scroll" href="#general"><span class="icon"><i class="icon-globe-line"></i></span><span class="title">General</span></a>
                      <a class="content_link scroll" href="#policies-and-forms"><span class="icon"><i class="icon-pencil-line"></i></span><span class="title">Policies and Forms</span></a>
                      <a class="content_link scroll" href="#myjustrewards"><span class="icon"><i class="icon-money-line"></i></span><span class="title">MyJustRewards</span></a>

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
                      <h4 class="title"><span id="general">General</span></h4>
                      <div class="mfn-acc faq_wrapper ">
                        <div class="question">
                          <div class="title"><span class="num">1</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Can I move my services if I move my house/office?</div>
                          <div class="answer">Yes, you can move your services to the new location, However you would need to confirm with our customer service team if your required services are available at the new premises.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">2</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How long does the relocation process take?</div>
                          <div class="answer">Relocation of your fixed line services can take anywhere Between 2 to 20 working days, depending on the infrastructure at you property and the area you are in. The broadband service can only be connected once, the fixed line is activated. Your Broadband service will be connected 7-10 working days after your phone line is connected, depends on the networks infrastructure at the new premise.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">3</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Will a technician visit be required when relocating?</div>
                          <div class="answer">If technician visit is required at the new premises, we will notify you and make an appointment. Whenever a tech visit is require it is mandatory that someone over the age of 18 must be at available to allow the Technician access to the property at the commencement of the appointment window and must also be in attendance for the duration of the appointment period.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">4</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>What type of information do you need to have my services relocated successfully?</div>
                          <div class="answer">Blisstel will require the full address of the new location including the LOT number, property name or the street address of the new premise in order for us to successfully connect your service.<br /><br /> If you are moving to a location that has been recently occupied by someone, it is likely that there is an existing phone line that we can connect to. In such cases, most of the times no technician is required. However, due to certain circumstances a technician visit may be required to reconnect your services. There will be a charge whenever a technician visit is required.<br /> If you move into either a newly constructed or a renovated site, please confirm that lead in cable is completed and if the sockets are installed and you can detect a dial tone. If the lead in cable is not completed, you may have to organise the installation with your contractor or a Telstra approved contractor will need to contact you to discuss your installation and it might take up to 4 weeks to complete. In these circumstances please call our customer care number at 1300 254 777.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">5</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>When should I contact Blisstel to organize the relocation of my services?</div>
                          <div class="answer">We recommend that you contact Blisstel at least 15 working days before you move house/office to ensure that all available services at your new location are reconnected and ready to go before you move.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">6</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Will I be able to keep my current phone number if I move my premises?</div>
                          <div class="answer">It depends on your new site address and exchange. If the new property is situated in the same exchange you may be able to keep the same number, if it is not in the same exchange you will get a different number. However if you are unable to keep the same number, you will be able to set up auto redirection for a nominal fee/month.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">7</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Will there be any fee for relocating the services?</div>
                          <div class="answer">There may be a fee for relocation. It depends on the type of relocation and the status of the connection at the new premises. Please refer to our customer services team to find out more about the charges.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">8</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Will I be able to continue with my current plan after the relocation?</div>
                          <div class="answer">We will try our best to keep you on the same plan when you relocate. However, this will be determined by the serviceability at your new premise. Blisstel plans may not be available in all areas. We will try to help you with best of our abilities and provide you with alternatives.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">9</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Which Networks does Blisstel utilise?</div>
                          <div class="answer">Blisstel Fixed Phone and Data services are delivered over Telstra network using wholesale services supplied to us by Telstra or AAPT depending on the plan you select and subject to network availability.<br /> Blisstel Fibre services are delivered predominately using the NBNCo Ltd Fibre network.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">10</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How do I change the name on this account?</div>
                          <div class="answer">You will need to fill in the change of authority form. We suggest you to contact our customer services team and they would be able to guide you through the process.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">11</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Will I be charged if I cancel my account?</div>
                          <div class="answer">If you are in your contract term, then the early termination fee will apply.<br /> If your services are out of contract then there will not be any cancellation fee.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">12</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How do I get a fault fixed on my telephone line?</div>
                          <div class="answer">You will need to call our customer services team to report any fault.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">13</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>What payment options are available for my monthly invoices?</div>
                          <div class="answer">Your Blisstel bill can be paid by any of the following methods.<br /><br />
                            <table class="sf-table striped_minimal" width="481" border="0" cellspacing="0" cellpadding="0">
                              <colgroup>
                                <col width="25%" />
                                <col width="75%" />
                              </colgroup>
                              <tbody>
                                <tr>
                                  <th>Payment Service</th>
                                  <th>Description</th>
                                </tr>
                                <tr>
                                  <td>Online Portal</td>
                                  <td>Existing Blisstel customers can pay via our Online Billing Portal at <a href="https://customerportal.blisstel.com.au/" onclick="__gaTracker('send', 'event', 'outbound-article', 'https://customerportal.blisstel.com.au/', 'Online Billing Portal');" title="Online Billing Portal" target="_blank">Online Billing Portal</a></td>
                                </tr>
                                <tr>
                                  <td>BPay</td>
                                  <td>Contact your participating Bank, Credit Union or Building Society, either by internet or telephone, to make this payment with BPay from your cheque, savings or credit card account. When prompted, enter the following information:<br /> Biller Code: 197723<br /> Ref: on your current invoice</td>
                                </tr>
                                <tr>
                                  <td>Direct Debit</td>
                                  <td>Direct debit is a convenient way to pay your account. To arrange for a payment from your credit card or ban kaccount, please contact 1300 BLISSS (1300 254 777) or return the completed Direct Debit form on our website <a title="Blisstel Policies" href="http://blisstel.com.au/support/#policies-and-forms" target="_blank">http://www.blisstel.com.au/policies/</a>.</td>
                                </tr>
                                <tr>
                                  <td>Credit Card via Phone</td>
                                  <td>To pay via credit card, contact our accounts department on 1300 BLISSS (1300 254 777) and follow the prompts.</td>
                                </tr>
                                <tr>
                                  <td>Mail</td>
                                  <td>To pay via mail, detach the payment slip from the bottom of your current bill and return it together with a cheque made payable to:<br /> Blisstel (CloudComm Pty. Ltd.)<br />1125 / 401 Docklands Drive<br />Docklands, VIC 3008</td>
                                </tr>
                                <tr>
                                  <td>Direct Deposit</td>
                                  <td>Account Name: Blisstel (CloudComm Pty. Ltd.) <br /> Bank Name: Commonwealth Bank of Australia<br /> BSB: 063 000<br /> Account No: 1273 0056<br /> Please ensure you use your account number as the reference number so we can track your payment.</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">14</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>When is my bill generated and when is it due?</div>
                          <div class="answer">Your bill with Blisstel is generated on the 3rd of every month. Your bill is then payable by the due date of the 17th of every month.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">15</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How does the billing cycle work?</div>
                          <div class="answer">Blisstel will invoice you every month. Your billing cycle starts and ends on the same date every month. i.e 1st of every month until the last day of the month. When a billing cycle ends , your monthly base fees are charged for the month of service in advance, plus whatever usage charges, if any, accrued for the last month.<br><br> Failure to settle your account by the due date, can lead to late payment fees, account suspension and possible account termination fees.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">16</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How can I receive my invoices?</div>
                          <div class="answer">You can receive your monthly invoices via email or Post. Email invoices are free of cost and the printed invoices will incur a $2.50 charge per invoice.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">17</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How much data do i need?</div>
                          <div class="answer">During each month, we allocate you a data that applies to that time period. Blisstel plans start at 100GB. To help you calculate your usage data, consider this example of how you could use 5GB:<br /><br />
                            <ul>
                              <li>Stream 2.5 hours of HD video.</li>
                              <li>Download 100 iTunes songs.</li>
                              <li>Upload 500 photos.</li>
                              <li>Stream 100 hours of music.</li>
                              <li>Browse the internet for 20 hours.</li>
                              <li>Send and receive 100 emails.</li>
                            </ul>
                            Below are some examples that you can use a guide. Please note that your usage may vary.<br /><br />
                            <table class="sf-table striped_minimal" width="481" border="0" cellspacing="0" cellpadding="0">
                              <colgroup>
                                <col width="25%" />
                                <col width="75%" />
                              </colgroup>
                              <tbody>
                                <tr>
                                  <th>Activity</th>
                                  <th>Data Consumption</th>
                                </tr>
                                <tr>
                                  <td>Browsing Internet</td>
                                  <td>Browsing could utilise 15-30MB per hour, depending on the site.</td>
                                </tr>
                                <tr>
                                  <td>Sending Email</td>
                                  <td>Varying with attachments, emails would average 100-500kB per email.</td>
                                </tr>
                                <tr>
                                  <td>Download Song</td>
                                  <td>Downloading from iTunes averages 6MB per song.</td>
                                </tr>
                                <tr>
                                  <td>Steaming Video</td>
                                  <td>A (360p) Standard definition Youtube video of 5 minutes is around 14MB.</td>
                                </tr>
                                <tr>
                                  <td>Steaming Video (HD)</td>
                                  <td>A (720p) high definition Youtube video of 5 minutes is around 37.5MB.</td>
                                </tr>
                                <tr>
                                  <td>Music Streaming</td>
                                  <td>Streaming a music service like Spotify (free), will download around 72MB per hour.</td>
                                </tr>
                                <tr>
                                  <td>Uploading a photo</td>
                                  <td>iPhone photos at 5 megapixel are around 2MB to upload.</td>
                                </tr>
                              </tbody>
                            </table>
                            <strong><br /><br />
Things you should know.</strong> This data usage chart is for illustrative purposes only. The data usages examples are based on information from a range of sources, but your individual usage will vary and is subject to change in the future. Data usage examples should only be used as a guide.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column one column_faq ">
                    <div class="faq">
                      <h4 class="title"><span id="policies-and-forms">Policies & Forms</span></h4>
                      <div class="mfn-acc faq_wrapper ">
                        <div class="question">
                          <div class="title"><span class="num">1</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Critical Information Summaries</div>
                          <div class="answer">View our dedicated page on Critical Information Summaries
                            <a target="_blank" href="http://blisstel.com.au/critical-information-summaries">here</a>.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">2</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Complaint Handling Policy</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel-Complaint-Handling-Policy.pdf">here</a> to view our Complaint Handling Policy.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">3</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Financial Hardship Policy</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel-Financial-Hardship-Policy.pdf">here</a> to view our Financial Hardship Policy.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">4</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Standard Form of Agreement</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel-SFoA.pdf">here</a> to view our Standard Form of Agreement.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">5</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Standard Form of Agreement Summary</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel-SFoA-Summary.pdf">here</a> to view our Standard Form of Agreement Summary.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">6</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Schedule of Fees and Charges</div>
                          <div class="answer">Click <a target="_blank" href="../data/Schedule-of-Fees-and-Charges.pdf">here</a> to view our Schedule of Fees and Charges.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">7</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Direct Debit Application Form</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel_Direct_Debit_Form.pdf">here</a> to view our Direct Debit Application Form.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">8</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Appointment of Advocate of Authorised Representative Form</div>
                          <div class="answer">Click <a target="_blank" href="../data/Appointment-of-Advocate-or-Authorised-Representative.pdf">here</a> to view our Appointment of Advocate of Authorised Representative Form.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">9</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Fair Use Policy</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel-Fair-Use-Policy.pdf">here</a> to view our Fair Use Policy.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">10</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Privacy Policy</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel-Privacy-Policy.pdf">here</a> to view our Privacy Policy.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">11</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Warranty</div>
                          <div class="answer">Click <a target="_blank" href="../data/Blisstel-Warranty.pdf">here</a> to view our Warranty.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column one column_faq ">
                    <div class="faq">
                      <h4 class="title"><span id="myjustrewards">MyJustRewards</span></h4>
                      <div class="mfn-acc faq_wrapper ">
                        <div class="question">
                          <div class="title"><span class="num">1</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Can I use Blisstel Rewards Dollars at any resort, tour, hotel or cruise?</div>
                          <div class="answer">You can use your Blisstel Rewards Dollars on a <strong>specific selection</strong> of worldwide resorts, tours, hotels and cruises offered through the Blisstel MyJustRewards program, although not all resorts, hotels, cruises or tours are available. There are regular updates made to the site including additional resort, hotel, cruise and tour inventory and prices. Please logon to <a title="Blisstel MyJustRewards" href="http://blisstel.com.au/rewards" target="_blank">http://blisstel.com.au/rewards</a> to see the extensive selection available or call 1300 830 786 to find out more.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">2</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Can I pay for the whole amount using my Blisstel Rewards Dollars?</div>
                          <div class="answer">No. You may utilise your available Blisstel Rewards Dollars only up to the ‘Max Savings” displayed on the website.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">3</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How long do I have to use my Blisstel Rewards Dollars?</div>
                          <div class="answer">Your Blisstel Rewards Dollars will expire 12 months after the date of issue. You must book your resort, hotel, tour or cruise within this timeframe but you can travel any time after that 12 month period.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">4</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Can I use my Blisstel Rewards Dollars on additional travel products?</div>
                          <div class="answer">No. Although we can give you competitive pricing on flights, car hire and other travel related products, your Blisstel Rewards Dollars are only available to use on the specified selection of resorts, hotels, tours and cruises.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">5</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Can I use all my Blisstel Rewards Dollars together, to take my children or friends on holiday with me?</div>
                          <div class="answer">Yes. You can book multiple resort or hotel rooms, tours or cruise cabins utilising your Blisstel Rewards Dollars up to the maximum savings displayed against each deal.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">6</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Does the Blisstel MyJustRewards website have “live” pricing?</div>
                          <div class="answer">The website is updated on a regular basis and should be used as a guideline for the Blisstel MyJustRewards offers available. You can also call 1300 830 786 to confirm the pricing.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">7</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How do I book a holiday using my Blisstel Rewards Dollars?</div>
                          <div class="answer">You can book your holiday online via <a href="http://blisstel.myjustrewards.com.au/" onclick="__gaTracker('send', 'event', 'outbound-article', 'http://blisstel.myjustrewards.com.au', 'http://blisstel.myjustrewards.com.au');" title="Blisstel MyJustRewards" target="_blank">http://blisstel.myjustrewards.com.au</a> or by calling at 1300 830 786 to speak to one of the experienced Travel Consultant</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">8</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Can someone else use my Blisstel Rewards Dollars?</div>
                          <div class="answer">Yes. Your Blisstel Rewards Dollars are fully transferable to family and friends.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">9</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>What if I utilize all my Blisstel Rewards Dollars?</div>
                          <div class="answer">You can call up Blisstel customer services team at 1300254777 to find out about the more ways you can earn the Blisstel Rewards Dollars.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">10</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>How do I activate my Blisstel Rewards Dollars?</div>
                          <div class="answer">To activate your Blisstel MyJustRewards account, simply follow the instruction sent in your welcome email.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">11</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>If I see a resort, hotel, tour or cruise advertised in the paper, can I use my Blisstel Rewards Dollars towards that price?</div>
                          <div class="answer">Unfortunately no, Blisstel MyJustRewards Program is based on a selected range of resorts, hotels, tours and cruises. However we do have a price match policy, so always feel free to bring any price enquiries to us by calling 1300 830 786.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">12</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>What If I do not have an email address?</div>
                          <div class="answer">Unfortunately we cannot sign you up with the Blisstel MyJustRewards Program without an email address.
                          </div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">13</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>Can I use Blisstel Rewards Dollars to pay for my Blisstel phone account?</div>
                          <div class="answer">No, you cannot use Blisstel Rewards Dollars to pay for your Blisstel Phone account.</div>
                        </div>
                        <div class="question">
                          <div class="title"><span class="num">14</span><i class="icon-plus acc-icon-plus"></i><i class="icon-minus acc-icon-minus"></i>What happens if I transfer away from Blisstel?</div>
                          <div class="answer">If you transfer away from Blisstel, your Blisstel MyJustRewards account will be deactivated, and you will not be able to make any more reservations.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="section the_content no_content"></div>
          </div>


        </div>

        <!-- .four-columns - sidebar -->
        <div class="sidebar sidebar-1 four columns">
          <div class="widget-area clearfix ">
            <aside id="text-6" class="widget widget_text">
              <h3>Customer Support &#038; Sales Enquiries</h3>
              <div class="textwidget"><big><a href="tel:1300254777">1300 254 777</a></big>

                <p style="margin-bottom: 0; text-align: center;">
                  Hours of operation
                  <br><b><i class="icon-clock"></i> Mon - Fri 10:00am - 7:00pm <span class="tooltip tooltip-txt" data-tooltip="We are located in Melbourne">(AEST)</span> </b><br><b>Sat 10:00am - 6:00pm <span class="tooltip tooltip-txt" data-tooltip="We are located in Melbourne">(AEST)</span> </b></p>
              </div>
            </aside>
            <!--<aside id="search-2" class="widget widget_search">
              <h3>Search</h3>
              <form method="get" id="searchform" action="http://blisstel.com.au/">
                <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
                <input type="submit" class="submit" value="Search" />
              </form>
            </aside>-->
          </div>
        </div>
      </div>
    </div>

<!-- WordPressSEOPlugin -->
<!-- mfn_hook_content_after --><!-- mfn_hook_content_after -->
<!-- #Footer -->		
<?php include_once __DIR__ . ('/../includes/php/footer.php'); ?>

