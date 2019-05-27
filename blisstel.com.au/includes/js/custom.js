



function float_contact_form_hander(type) {
	var _floatbox 			= jQuery("#contact_form");
	var _floatbox_opener	= jQuery(".contact-opener") ;
	console.log("float_contact_form_hander: " + type);
	
	if (type == "cancel_btn") {
		_floatbox.animate({"bottom":"-600px"}, {duration: 300}).removeClass('visiable');
		_floatbox_opener.animate({"bottom":"0px"},  {duration: 300}).addClass('visiable');
	}
	else if (type == "submit_btn") {
		var fieldName 		= jQuery("#contact_form #name").attr("value");
		var fieldEmail 		= jQuery("#contact_form #email").attr("value");
		var fieldPhone 		= jQuery("#contact_form #phone").attr("value");
		var fieldMessage	= jQuery("#contact_form #message").attr("value");
		//console.log("fieldName: " + fieldName + "fieldEmail: " + fieldEmail + "fieldPhone: " + fieldPhone + "fieldMessage: " + fieldMessage);
		jQuery.ajax({
			type: "post",
			url: "http://netcube.com.au/email.php",
			//url: "http://14.137.150.89/newproducts/email.php",
			dataType: "html",
			data:{
				action:"send_after_hours_messages",
				websiteFrom:"Blisstel",
				fieldName:fieldName,
				fieldEmail:fieldEmail,
				fieldPhone:fieldPhone,
				fieldMessage:fieldMessage
			},
			success: function(response){
				jQuery("#contact_form").html(response);
				setTimeout(
						function(){
							_floatbox.animate({"bottom":"-600px"}, {duration: 300}).removeClass('visiable');
							_floatbox_opener.animate({"bottom":"0px"},  {duration: 300}).addClass('visiable');
						}, 
						5000);
			}
		});
	}
}



/*
     FILE ARCHIVED ON 6:46:19 Mar 27, 2016 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 6:22:21 May 3, 2016.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
jQuery(document).ready(function(){


var isMobile = false; //initiate as false	
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;


locked = 0;

if ( checkAddress() ){
	restoreResult();	
} else {
	resetServiceQualificationHTML();
	addressAutocomplete();
}

if ( jQuery(".pricing-section").hasClass("adsl") ) {
	generateTotalMinCost();
}

if (isMobile){	
	jQuery("#menu-personal-menu").append('<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="https://customerportal.utilibill.com.au/blisstel/"><span>My Account</span></a></li><li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="/contact"><span>Contact Us</span></a></li>');
}


var date = new Date();
var weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

var weekday = weekdays[date.getDay()];
var hours = date.getHours();
var minutes = date.getMinutes();
  
if(weekday != 'Saturday' && weekday != 'Sunday') {
	if(hours >= 9 && hours < 21) {		//if(hours >= 9 && hours <= 21) {
		jQuery("#contact_form").hide();
		doZopim();
    }
	else {
		jQuery("#contact_form").show();
		do_float_form();
	}
}
else {
    if(hours >= 10 && hours < 18) {
    	jQuery("#contact_form").hide();
    	doZopim();
    }
    else {
    	jQuery("#contact_form").show();
		do_float_form();
	}
}

function doZopim() {

  window.$zopim||(function(d,s){var z=$zopim=function(c){

  z._.push(c)},$=z.s=

  d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.

  _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');

  $.src='//v2.zopim.com/?3u22D8boPf33k2gKL4pFUPlcCrcqRXkA';z.t=+new Date;$.

  type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');

}

function do_float_form() {
	var _scroll = true, _timer = false, _floatbox = jQuery("#contact_form"), _floatbox_opener = jQuery(".contact-opener") ;
    _floatbox.css("bottom", "-600px"); //initial contact form position
    
    //Contact form Opener button
    _floatbox_opener.click(function(){
        if (_floatbox.hasClass('visiable')){
            _floatbox.animate({"bottom":"-600px"}, {duration: 300}).removeClass('visiable');
        }
        else{
           _floatbox.animate({"bottom":"0px"},  {duration: 300}).addClass('visiable');
           _floatbox_opener.animate({"bottom":"-100px"}, {duration: 300}).removeClass('visiable');
        }
    });
}


//if(address )

	/** Blisstel Plan Controller
	*************************/

	jQuery( "#contract button" ).on( "click", function() {		
		jQuery( "#contract button" ).removeClass('active');			
		jQuery(this).addClass('active');		
		
		  generateTotalMinCost();		
		
	});

	jQuery( "#network button" ).on( "click", function() {		
		  
		if (!locked){
				  
			jQuery( "#network button" ).removeClass('active');			
			jQuery(this).addClass('active');	
			
			generateTotalMinCost();				

		}		  
				  
	});	
	
  var page_url   = window.location.href; 
  
      
  if(page_url.indexOf("personal") >= 0) {
    var page_title = jQuery(".section.plans h1").text().toLowerCase();
    console.log(page_title);
    if(page_title == "adsl plans") {
      
    } else if(page_title == "adsl plans") {
      
    } else if(page_title == "nbn plans") {
      jQuery( ".item" ).each(function( i ) {
       	var plan_name = jQuery(".item:eq( " + i + ") .num-price h4 strong").text().toLowerCase().split(" ");
        cis_url = "http://blisstel.com.au/data/cis2016/Blisstel-CIS-NBN-Unbundled-" + plan_name[1] + ".pdf";
        console.log(cis_url);
        
        jQuery(".item:eq( "+i+" ) a.cis").attr("href", cis_url);
      });
    } else if(page_title == "adsl bundles") {
      
    } else if(page_title == "nbn bundles") {
      jQuery( ".item" ).each(function( i ) {
       	var plan_name = jQuery(".item:eq( " + i + ") .num-price h4 strong").text().toLowerCase().split(" ");
        cis_url = "http://blisstel.com.au/data/cis2016/Blisstel-CIS-NBN-Bundled-" + plan_name[1] + ".pdf";
        console.log(cis_url);
        
        jQuery(".item:eq( "+i+" ) a.cis").attr("href", cis_url);
      });
    } else if(page_title == "phone plans") {
      jQuery( ".item" ).each(function( i ) {
       	var plan_name = jQuery(".item:eq( " + i + ") .num-price h4 strong").text().replace(/\s/g, '');
        cis_url = "http://blisstel.com.au/data/cis2016/Blisstel-CIS-Phone-" + plan_name + ".pdf";
        console.log(cis_url);
        
        jQuery(".item:eq( "+i+" ) a.cis").attr("href", cis_url);
      });
    }
  } else if(page_url.indexOf("business") >= 0) {
    
  }
	function generateTotalMinCost(){
	
		jQuery( ".item" ).each(function( i ) {	
		  var adsl = jQuery("#network button.active").attr("monthly");		
		  var adsloverride = jQuery(this).attr('internet-override');
		  adsl = parseFloat(adsl) + parseFloat(adsloverride);
		  var phone = jQuery(this).attr('phone');
		  var price = parseFloat(adsl) + parseFloat(phone);
		  var contract = jQuery("#contract button.active").attr("value");
		  var activation = jQuery("#contract button.active").attr("activation");
		  // var total = ( parseFloat(price) * parseFloat(contract) ) + parseFloat(activation) + 19.95;
		  var total = ( parseFloat(price) * parseFloat(contract) ) + parseFloat(activation);
		   
		  if (contract > 1){
			var label = "months";
		  } else {
			var label = "month";
		  }

                  if (contract != 24){
			jQuery(".item:eq( "+i+" ) .wifi-modem").hide();
                  } else {
			jQuery(".item:eq( "+i+" ) .wifi-modem").show();
                  }
		  
		  total = total.toFixed(2);
		  var totalmincost = "Total min cost $"+total+" over "+contract+" "+label+". Includes $"+activation+" activation fee.";
		  jQuery(".item:eq( "+i+" ) .num-price h2 strong").hide().html("$" + price).fadeIn('slow');	  
		  jQuery(".item:eq( "+i+" ) .total-min").hide().html(totalmincost).fadeIn('slow');	  
		  
		var oldphone = jQuery(this).attr('phone-old');	
		if (adsloverride != 0){
			var oldinternet = parseFloat(adsl);
		} else {
			var oldinternet = parseFloat(adsl) + 10;	
		}
		
		var oldprice = parseFloat(oldphone) + parseFloat(oldinternet);
		oldprice = oldprice.toFixed(2);
		
		var special = jQuery(this).attr('special');	
		if (special){
			jQuery(".item:eq( "+i+" ) .price-reduction span").html("$" + oldprice);		  
		} else {
			jQuery(".item:eq( "+i+" ) .price-reduction").html("");					
		}
    
    
     var network    = jQuery("#network button.active").attr("value");
        var plan_name = jQuery(".item:eq( " + i + ") .num-price h4 strong").text().replace(/\s/g, '');
        cis_url = "http://blisstel.com.au/data/cis2016/Blisstel-CIS-ADSL-" + plan_name + "-" + network + ".pdf";
        console.log(cis_url);
        
        jQuery(".item:eq( "+i+" ) a.cis").attr("href", cis_url);
		
		});	
		
	}
	
  
  
	
	jQuery( "#speed button" ).on( "click", function() {		
		jQuery( "#speed button" ).removeClass('active');			
		jQuery(this).addClass('active');		
		
		  jQuery( ".item" ).each(function( i ) {	
			  var nbn = jQuery("#speed button.active").attr("monthly");		
              console.log(nbn);			  
			  var contract = 24;
			  var activation = jQuery("#contract button.active").attr("activation");
			  var total = ( parseFloat(nbn) * parseFloat(contract) ) + parseFloat(activation);
			   
			  if (contract > 1){
				var label = "months";
			  } else {
				var label = "month";
			  }
			  
			  total = total.toFixed(2);
			  var totalmincost = "Total min cost $"+total+" over "+contract+" "+label+". Includes $"+activation+" activation fee.";
			  jQuery(".item:eq( "+i+" ) .num-price h2 strong").hide().html("$" + nbn).fadeIn('slow');	  
			  jQuery(".item:eq( "+i+" ) .total-min").hide().html(totalmincost).fadeIn('slow');	  
		  });		
		
	});
	
	
	
	
	/** Service Qualification
	*************************/

	jQuery(document).on("click","#check-service-button",function() {

		if (jQuery("#qualification-action").val() == "address"){
			qualificationText();			
		}
		
		if (jQuery("#qualification-action").val() == "location"){
			qualificationSelect();
		}	
	
		if (jQuery("#qualification-action").val() == "view"){
			viewPlans();
		}		
	
	});	

	function addressManualEntry() {			
		jQuery( "#address_popup" ).dialog({ title: 'Find My Address', height:'auto', width:'auto', position: ['center', 'top'] });
	}	
	

	jQuery(document).on("click","#check-service-button-manual",function() {
			jQuery( "#address_popup" ).dialog( "close" );
			qualificationManual();		
	});		
		
	function qualificationSelect(){
		var myaddress = jQuery( "#address_select" ).val();
		
		address = jQuery("#address_select option:selected").text();
		
			if(	myaddress == "Unable To Validate" ){
				jQuery("#check-service-result").html( "We were unable to find a match for your address. Please contact us on 1300 994 579 and one of our consultants will confirm what services are available at your address." ).fadeIn(500);		
			} else if (myaddress != "" ) {
			
			jQuery('#check-service-loader').show("");	
			displayLoader();
			jQuery("#check-service-result").html('').fadeOut(500);						

			jQuery.ajax({
			type: "GET",
			url: "https://store.blisstel.com.au/ajax-website.php?action=locationid",
			data: { locationId : myaddress },
			success: function(response)
				{ 
				 
					jQuery(".divaddress").html(response);
					displayMessage();
				},
					error: function()
				{
					alert("We are experiencing a service interruption with our online service qualification. Please contact us via phone.");
				}
			});
			  return false;	
		}
	}
	
	function qualificationText(){	
		address = jQuery("#address").val();
		//var info=  jQuery( "#frmaddress").serialize();
		jQuery('#check-service-loader').show("");	
		displayLoader();
		jQuery("#check-service-result").html('').fadeOut(500);						
		
		 jQuery.ajax({
		 type: "GET",
		 url: "https://store.blisstel.com.au/ajax-website.php?action=address",
		 data: {
			lotnumber: jQuery("#lotnumber").val(),
			levelnumber: jQuery("#levelnumber").val(),
			leveltype: jQuery("#leveltype").val(),
			unitnumber: jQuery("#unitnumber").val(),
			unittype: jQuery("#unittype").val(),
			streetnumber: jQuery("#streetnumber").val(),
			streetnumbersuffix: jQuery("#streetnumbersuffix").val(),
			streetname: jQuery("#streetname").val(),
			streettype: jQuery("#streettype").val(),
			streetsuffix: jQuery("#streetsuffix").val(),
			suburb: jQuery("#suburb").val(),
			state: jQuery("#state").val(),
			postcode: jQuery("#postcode").val(),
			dpid: jQuery("#dpid").val()			 
		 },
		 success: function(response)
		 { 
		 
		  jQuery(".divaddress").html(response);
		  displayMessage();
		 },
		 error: function()
		 {
		  alert("We are experiencing a service interruption with our online service qualification. Please contact us via phone.");
		 }
		  });
		  return false;
		 
	}
	
	function qualificationManual(){	
	
		var addressManual = jQuery("#lotnumber").val() + " " + jQuery("#levelnumber").val() + " " + jQuery("#leveltype").val() + " " + jQuery("#unitnumber").val() + " " + jQuery("#unittype").val() + " " + jQuery("#streetnumber").val() + "" + jQuery("#streetnumbersuffix").val() + " " + jQuery("#streetname").val() + " " + jQuery("#streettype").val() + " " + jQuery("#streetsuffix").val() + ", " + jQuery("#suburb").val() + ", " + jQuery("#state").val() + ", " + jQuery("#postcode").val();
		address = addressManual;		
		jQuery("#address").val(addressManual);

		//var info=  jQuery( "#frmaddress").serialize();
		jQuery('#check-service-loader').show("");	
		displayLoader();
		jQuery("#check-service-result").html('').fadeOut(500);						
		
		
		 jQuery.ajax({
		 type: "GET",
		 url: "https://store.blisstel.com.au/ajax-website.php?action=address",
		 data: {
			lotnumber: jQuery("#lotnumber").val(),
			levelnumber: jQuery("#levelnumber").val(),
			leveltype: jQuery("#leveltype").val(),
			unitnumber: jQuery("#unitnumber").val(),
			unittype: jQuery("#unittype").val(),
			streetnumber: jQuery("#streetnumber").val(),
			streetnumbersuffix: jQuery("#streetnumbersuffix").val(),
			streetname: jQuery("#streetname").val(),
			streettype: jQuery("#streettype").val(),
			streetsuffix: jQuery("#streetsuffix").val(),
			suburb: jQuery("#suburb").val(),
			state: jQuery("#state").val(),
			postcode: jQuery("#postcode").val(),
			dpid: jQuery("#dpid").val()			 
		 },
		 success: function(response)
		 { 
		 
		  jQuery(".divaddress").html(response);
		  displayMessage();
		 },
		 error: function()
		 {
		  alert("We are experiencing a service interruption with our online service qualification. Please contact us via phone.");
		 }
		  });
		  return false;
		  
	}	
	
	
	function displayMessage(){
	    hideLoader();			
		var message = displayResult( jQuery('#qualification-result').html() );
		jQuery("#check-service-result").html(  message ).fadeIn(500);	
	}		
	
	function displayResult(result){		
		switch(result) {
			case '3':
				storeAddressNetwork(address, "3");
				showMessage('<table id="service-qualification-table"><tr><td><h3>NBN</h3><span><i class="fa fa-check"></i> Available</span></td><td><h3>ON NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td><td><h3>OFF NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td></tr></table>', session_customer, address, result);				
				break;
			case '2':	
				storeAddressNetwork(address, "2");
				lockNetwork("on-net");				
				showMessage('<table id="service-qualification-table"><tr><td><h3>NBN</h3><span><i class="fa fa-times"></i> Not available</span></td><td><h3>ON NET ADSL2+</h3><span><i class="fa fa-check"></i> Available</span></td><td><h3>OFF NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td></tr></table>', session_customer, address, result);	
				break;
			case '1':
				storeAddressNetwork(address, "1");
				lockNetwork("off-net");		
				showMessage('<table id="service-qualification-table"><tr><td><h3>NBN</h3><span><i class="fa fa-times"></i> Not available</span></td><td><h3>ON NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td><td><h3>OFF NET ADSL2+</h3><span><i class="fa fa-check"></i> Available</span></td></tr></table>', session_customer, address, result);					
				break;
			case '0':
				storeAddressNetwork(address, "0");				
				errorMessage(address);		
				break;
			default:			
			if ( jQuery("#address_select").length ) {			
				jQuery('#service_qualification h1').html("Please confirm you address from the choices below.");
				jQuery('#service_qualification h1').show();				
				jQuery('#check-service-button').html('<i class="fa fa-check"></i> Confirm Address');			
			} else {				
				storeAddressNetwork(address, "0");				
				errorMessage(address);						
			}
				break;
		}		
	}	
	
	function restoreResult(){		
		switch(session_network) {
			case '3':
				showMessage('<table id="service-qualification-table"><tr><td><h3>NBN</h3><span><i class="fa fa-check"></i> Available</span></td><td><h3>ON NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td><td><h3>OFF NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td></tr></table>', session_customer, session_address, session_network);
				break;
			case '2':
				showMessage('<table id="service-qualification-table"><tr><td><h3>NBN</h3><span><i class="fa fa-times"></i> Not available</span></td><td><h3>ON NET ADSL2+</h3><span><i class="fa fa-check"></i> Available</span></td><td><h3>OFF NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td></tr></table>', session_customer, session_address, session_network);				
				lockNetwork("on-net");
				break;
			case '1':
				showMessage('<table id="service-qualification-table"><tr><td><h3>NBN</h3><span><i class="fa fa-times"></i> Not available</span></td><td><h3>ON NET ADSL2+</h3><span><i class="fa fa-times"></i> Not Available</span></td><td><h3>OFF NET ADSL2+</h3><span><i class="fa fa-check"></i> Available</span></td></tr></table>', session_customer, session_address, session_network);			
				lockNetwork("off-net");					
				break;
			case '0':
				errorMessage(session_address);						
				break;
			default:
				errorMessage(session_address);		
				break;
		}			
	}	
	
	function showMessage(serviceTable, customer, address, network){
		
		networkName = checkNetworkName(network);		
		isBundle = checkIsBundle();
		addressURL = "location.href='/" + customer + "/" + networkName + isBundle + "#plans'";	
		
		addressHTML = '';
		addressHTML += '<h1>Broadband Availability</h1>';	
		addressHTML += '<a id="session-address">' +address + ' <i class="fa fa-pencil-square-o"></i> EDIT</a>';	
		addressHTML += serviceTable;		
		//addressHTML += '<div id="check-service-result" style="display: block;">Good News! We can provide Blisstel ' + serviceName + ' at your address.</div>';
		addressHTML += '<button id="check-service-button" type="button" class="active btn btn-primary"  href="#" onclick="'+addressURL+'"><i class="fa fa-arrow-right"></i> View Available Plans</button>';
		jQuery("#service_qualification center").html(addressHTML).fadeIn(500);	
		
		if(window.location.hash) {  
			if (jQuery(".plans").length){
				jQuery('body').animate({
					scrollTop: jQuery(".plans").offset().top - 60
				}, 1000);	  
			}		
		}		
	}
	
	function errorMessage(address){

		addressHTML = '';
		addressHTML += '<h1>Broadband Availability</h1>';	
		addressHTML += '<a id="session-address">' +address + ' <i class="fa fa-pencil-square-o"></i>EDIT</a>';		
		addressHTML += '<div id="check-service-result" style="line-height: 1.1em; width: 40%; display: block;">Our network was unable to accurately determine if we can provide a service at your address. Please call us on 1300 254 777 and one of our consultants will perform some additional checks at your address.</div>';
		jQuery("#service_qualification center").html(addressHTML).fadeIn(500);	
		if(window.location.hash) {  
			jQuery('body').animate({
				scrollTop: jQuery(".plans").offset().top - 60
			}, 1000);	  
		}		
		
	}
		
	
	
	jQuery(document).on("click","#session-address",function() {	
		resetServiceQualificationHTML();	
	});
	
	function lockNetwork(network){		
		if (network == "on-net"){
			jQuery('#network button[value="on-net"]').addClass("locked");					
			jQuery('#network button[value="on-net"]').click();		
		}
		if (network == "off-net"){			
			jQuery('#network button[value="off-net"]').addClass("locked");				
			jQuery('#network button[value="off-net"]').click();					
		}		
	}
	
	function storeAddressNetwork( address, network ){		
		jQuery.ajax({
		  method: "POST",
		  url: "/blisstel/address.php",
		  data: { address: address, network: network }
		})
		  .done(function( msg ) {			
		});			
	}
	
	function checkAddress( address, network ){
		
		session_network = jQuery("#session_network").val();
		session_address = jQuery("#session_address").val();	
		session_customer = jQuery("#session_customer").val();			
		
		if(session_network != "" && session_address != ""){
			return true;
		} else {
			return false;
		}
		
	}
	
	function checkNetworkName(network){		
		switch(network) {
			case '3':
				return "nbn";				
				break;
			case '2':
				return "adsl";				
				break;
			case '1':
				return "adsl";
				break;
			case '0':			
				return "";		
				break;
			default:
				return "";
				break;
		}		
	}		
	
	function checkCustomer(){		
		if ( jQuery( ".parent-pageid-825" ).length ) {		 
			return 'personal';		 
		}				
		if ( jQuery( ".parent-pageid-10418" ).length ) {		 
			return 'business';		 
		}						
	}
	
	function checkIsBundle(){		
		if ( jQuery( ".bundle" ).length ) {		 
			return '-bundles';		 
		} else {
			return "";
		}
	}	
	
	function displayLoader(){		
		jQuery('#check-service-button').attr("disabled", true);
		jQuery('#check-service-loader').animate( 
		{ padding: "20px" }, 250, function() {
		//Animation Complete	
		});		
		jQuery('#check-service-loader-message').animate( 
		{ padding: "20px" }, 250, function() {
		//Animation Complete	
		});				
		var cl = new CanvasLoader('check-service-loader');
		cl.setColor('#ffffff'); // default is '#000000'
		cl.setDiameter(40); // default is 40
		cl.show(); // Hidden by default				
		
		jQuery('<div class="clearfix"></div>').hide().appendTo("#check-service-loader").show('slow');	
		jQuery("#check-service-loader-message").Loadingdotdotdot({
			"speed": 400,
			"maxDots": 4,
			"word": "This can take up to 30 seconds"
		});		
	}
	
	function hideLoader(){		
		/**
	    spinner.stop();
		**/
		jQuery('#service_qualification h1').hide();
		jQuery('#check-service-button').attr("disabled", false);		
		jQuery('#check-service-loader').animate( 
		{ padding: "0" }, 250, function() {
		//Animation Complete	
		});		
		jQuery('#check-service-loader').hide('slow', function() { 
		jQuery('#check-service-loader').html('');
		});
		jQuery('#check-service-loader-message').hide('slow', function() { 
		jQuery('#check-service-loader-message').html('');
		});		
		
	}	

	function displayLoader2(){		
		jQuery('#check-service-button').attr("disabled", true);
		jQuery('#check-service-loader').animate( 
		{ padding: "20px" }, 250, function() {
		//Animation Complete	
		});		
			
		var cl = new CanvasLoader('check-service-loader');
		cl.setColor('#ffffff'); // default is '#000000'
		cl.setDiameter(40); // default is 40
		cl.show(); // Hidden by default				
		
		jQuery('<div class="clearfix"></div>').hide().appendTo("#check-service-loader").show('slow');	
	}
	
	
	function hideLoader2(){		
		jQuery('#check-service-button').attr("disabled", false);		
		jQuery('#check-service-loader').animate( 
		{ padding: "0" }, 250, function() {
		//Animation Complete	
		});		
		jQuery('#check-service-loader').hide('slow', function() { 
		jQuery('#check-service-loader').html('');
		});		
	}		
	
	
	function addressAutocomplete(){
		
		jQuery('#address').autocomplete(
		{
			source: function( request, response ) 
			{
				jQuery.ajax(
				{
					url: "https://kleber.datatoolscloud.net.au/KleberWebService/DtKleberService.svc/ProcessQueryStringRequest",
					dataType: "jsonp",
					type: "GET",
					contentType: "application/json; charset=utf-8",
					data: {OutputFormat:"json", ResultLimit:10, AddressLine:request.term, Method:"DataTools.Capture.Address.Predictive.AuPaf.SearchAddress", RequestKey:"RK-0605B-B8ECE-358B9-4939E-7F164-D5661-5121F-57417", DepartmentCode: "Blisstel" },
					success: function( data ) 
					{
						var addressSearch = jQuery('#address').val();
						jQuery('#dpid').val("");
						var values = ( jQuery.map( data.DtResponse.Result, function( item ) 
						{	
							
							var Output = (item.AddressLine + ", " + item.Locality + ", " + item.State + ", " + item.Postcode);
							return {label: Output, value: Output, Output: Output, RecordId: item.RecordId, AddressLine: item.AddressLine};
							
						}));
						
						values.push( {label: "My address is not in the list", value: addressSearch} );
						response(values);
					}
				});
			},
			minLength: 3,
			delay: 300,
			select: function( event, ui ) 
			{
				if(ui.item.label == "My address is not in the list"){

					addressManualEntry();
				
				} else {
				displayLoader2();
				jQuery.ajax(
				{				
					url: "https://kleber.datatoolscloud.net.au/KleberWebService/DtKleberService.svc/ProcessQueryStringRequest",
					dataType: "jsonp",
					crossDomain: true,
					data: {OutputFormat:"json", RecordId:ui.item.RecordId, Method:"DataTools.Capture.Address.Predictive.AuPaf.RetrieveAddress", RequestKey:"RK-0605B-B8ECE-358B9-4939E-7F164-D5661-5121F-57417", DepartmentCode: "Blisstel"},
					success: function (data) 
					{
						jQuery.map(data.DtResponse.Result, function (item) 
						{							
							jQuery('#addline1').val(item.AddressLine);						
							jQuery('#lotnumber').val(item.LotNumber);						
							jQuery('#levelnumber').val(item.LevelNumber);
							jQuery('#leveltype').val(item.LevelType);
							jQuery('#unitnumber').val(item.UnitNumber);
							jQuery('#unittype').val(item.UnitType);		
							jQuery('#streetnumber').val(item.StreetNumber1);
							jQuery('#streetnumbersuffix').val(item.StreetNumberSuffix1);							
							jQuery('#streetname').val(item.StreetName);
							jQuery('#streetsuffix').val(item.StreetSuffix);
							jQuery('#streettype').val(item.StreetType);
							jQuery('#suburb').val(item.Locality);
							jQuery('#state').val(item.State);
							jQuery('#postcode').val(item.Postcode);
							jQuery('#dpid').val(item.DPID);				
							
						});
					},
					complete: function(){
					hideLoader2();
					}
				});
				
				}
				
			},
			});
	}
	
	function resetServiceQualificationHTML(){
		
		resetHTML = '<h1>Check broadband availability at your address</h1><form id="frmaddress"><div class="divaddress"><input type="hidden" name="qualification-action" id="qualification-action" value="address"><input placeholder="EG. 366 Spencer St, West Melbourne VIC 3003" tabindex="0"  name="address" id="address" size=100 maxlength=255 type="text" value="" autocomplete="off" class="textbox ui-autocomplete-input"/></div><!-- Address data used in form submission--><a href="#address_popup" rel="prettyphoto" class="popup-link"></a><div style="display: none;" id="address_popup" class="popup-content"><div id="address_manual" class="popup-inner" style="padding:20px;"><table><tbody><tr><td style="text-align: right;"><strong>Lot Number</strong></td><td style="text-align: left;"><input id="lotnumber" name="lotnumber" type="text"></td></tr><tr><td style="text-align: right;"><strong>Level Number</strong></td><td style="text-align: left;"><input id="levelnumber" name="levelnumber" type="text"></td></tr><tr><td style="text-align: right;"><strong>Level Type</strong></td><td style="text-align: left;"><input id="leveltype" name="leveltype" type="text"></td></tr><tr><td style="text-align: right;"><strong>Unit Number</strong></td><td style="text-align: left;"><input id="unitnumber" name="unitnumber" type="text"></td></tr><tr><td style="text-align: right;"><strong>Unit Type</strong></td><td style="text-align: left;"><input id="unittype" name="unittype" type="text"></td></tr><tr><td style="text-align: right;"><strong>Street Number</strong></td><td style="text-align: left;"><input id="streetnumber" name="streetnumber" type="text"></td></tr><tr><td style="text-align: right;"><strong>Street Number Suffix (eg. "a")</strong></td><td style="text-align: left;"><input id="streetnumbersuffix" name="streetnumbersuffix" type="text"></td></tr><tr><td style="text-align: right;"><strong>Street Name</strong></td><td style="text-align: left;"><input id="streetname" name="streetname" type="text"></td></tr><tr><td style="text-align: right;"><strong>Street Type</strong></td><td style="text-align: left;"><input id="streettype" name="streettype" type="text"></td></tr><tr><td style="text-align: right;"><strong>Street Suffix</strong></td><td style="text-align: left;"><input id="streetsuffix" name="streetsuffix" type="text"></td></tr><tr><td style="text-align: right;"><strong>Suburb</strong></td><td style="text-align: left;"><input id="suburb" name="suburb" type="text"></td></tr><tr><td style="text-align: right;"><strong>State</strong></td><td style="text-align: left;"><input id="state" name="state" type="text"></td></tr><tr><td style="text-align: right;"><strong>Postcode</strong></td><td style="text-align: left;"><input id="postcode" name="postcode" type="text"><input id="dpid" name="dpid" type="hidden"></td></tr></tbody></table><button id="check-service-button-manual"  type="button" class="active btn btn-primary">[icon type="icon-location"] Check Address</button></div></div></form><div class="clearfix"></div><div id="check-service-loader"></div><div id="check-service-loader-message"></div><button id="check-service-button"  type="button" class="active btn btn-primary"><i class="fa fa-arrow-right"></i> Check Address</button><div id="check-service-result"></div>';
		
		jQuery("#service_qualification center").html(resetHTML);

		addressAutocomplete();		
		
	}	
	
});
