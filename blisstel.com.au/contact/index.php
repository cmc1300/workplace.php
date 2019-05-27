<?php // include_once __DIR__ . ('/email.php'); ?>
<?php require __DIR__ . '/../includes/classes/PHPMailerAutoload.php'; ?>
<?php include_once __DIR__ . ('/../includes/php/header.php'); ?>


<?php

  if(!empty($_REQUEST)) {
    
    $contact_name    = $_REQUEST['your-name'];
    $contact_email   = $_REQUEST['your-email'];
    $contact_subject = $_REQUEST['your-subject'];
    $contact_message = $_REQUEST['your-message'];
    
    if(!empty($contact_message) && !empty($contact_email)) {
      
      $email = new PHPMailer;
      
      $email->setFrom($contact_email, $contact_name);
      $email->addAddress('customerservice@blisstel.com.au', 'Blisstel');
      $email->Subject = $contact_subject;
      $email->Body = $contact_message;
      $result = $email->send();
    }
    
  }

?>

<!-- body -->
<body class="page page-id-10618 page-template-default  color-custom style-default layout-full-width nice-scroll-on mobile-tb-left header-plain header-fw sticky-header sticky-white ab-show subheader-title-left wpb-js-composer js-comp-ver-4.6.2 vc_responsive">




    <!-- mfn_hook_top -->
    <!-- mfn_hook_top -->


    <!-- #Wrapper -->
    <div id="Wrapper">



        <!-- #Header_bg -->
        <?php include_once __DIR__ . '/../includes/php/menu.php'; ?>

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
                        <div class="section    " id="details" style="padding-top:50px; padding-bottom:50px; background-color:; background-image:url(../includes/images/home_slider.jpg); background-repeat:no-repeat; background-position:center top; background-attachment:; background-size:; -webkit-background-size:">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <div class="column one column_fancy_heading contact-title">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Contact</h2></div>
                                    </div>
                                    <div class="column one-sixth column_column ">
                                        <div class="column_attr" style=""></div>
                                    </div>
                                    <div class="column one-third column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_icon"><i class=" icon-comment-line"></i></div>
                                            <div class="list_right">
                                                <div class="desc"><big style="padding-top: 12px; display: block">Customer Service & Sales Enquires</big>
                                                    <h4><a href="tel:1300254777">1300 254 777</a></h4>
                                                    <small>Mon – Fri: 10:00am – 7:00pm (AEST)</small><br>
                                                    <small>Sat: 10:00am – 6:00pm (AEST)</small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column one-third column_list ">
                                        <div class="list_item lists_2 clearfix">
                                            <div class="list_left list_icon"><i class=" icon-mail-line"></i></div>
                                            <div class="list_right">
                                                <div class="desc"><big style="padding-top: 12px; display: block">Address</big>
                                                    <h4>1125 / 401 Docklands Drive<br>Docklands VIC 3008<br>Australia</h4></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column one-sixth column_column ">
                                        <div class="column_attr" style=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section   section-border-top " id="form" style="padding-top:40px; padding-bottom:0px; background-color:#dbe2e6">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <div class="column one-third column_column ">
                                        <div class="column_attr" style="">
                                            <div style="text-align: right;">
                                                <h2>Write a message</h2>
                                                <p><big>Simply fill out this form and we'll be happy to answer any queries. We respond within <span class="tooltip tooltip-txt" data-tooltip="Mon-Fri 9:00am-8:00pm (AEST) Saturday 9:00am-5:00pm (AEST)">1 business day</span>!</big></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column two-third column_column ">
                                        <div class="column_attr" style="">
                                            <div role="form" class="wpcf7" id="wpcf7-f10613-p10600-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response"></div>
                                                <form action="http://blisstel.com.au/contact/" method="post" class="wpcf7-form" novalidate="novalidate">
                                                    <div style="display: none;">
                                                        <input type="hidden" name="_wpcf7" value="10613" />
                                                        <input type="hidden" name="_wpcf7_version" value="4.3" />
                                                        <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f10613-p10600-o1" />
                                                        <input type="hidden" name="_wpnonce" value="e0ad34dac4" />
                                                    </div>
                                                    <div role="form" class="wpcf7" id="wpcf7-f447-p378-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <form action="http://blisstel.com.au/contact/" method="post" class="wpcf7-form" novalidate="novalidate">
                                                            <div style="display: none;"> <input type="hidden" name="_wpcf7" value="447"> <input type="hidden" name="_wpcf7_version" value="4.2.2"> <input type="hidden" name="_wpcf7_locale" value="en_US"> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f447-p378-o1"> <input type="hidden" name="_wpnonce" value="ecb87121b4"></div>
                                                            <div class="column one-third"><label>Name:</label><span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span></div>
                                                            <div class="column one-third"><label>E-mail address:</label><span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span></div>
                                                            <div class="column one-third"><label>Subject:</label><span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span></div>
                                                            <div class="column one"><label>Message:</label><span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span></div>
                                                            <div class="column one"><input type="submit" value="Send message" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://blisstel.com.au/includes/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;"></div>
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                        </form>
                                                    </div>
                                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- .four-columns - sidebar -->

            </div>
        </div>

<!-- WordPressSEOPlugin -->
<!-- mfn_hook_content_after --><!-- mfn_hook_content_after -->
<!-- #Footer -->		
<?php include_once __DIR__ . ('/../includes/php/footer.php'); ?>
