
var customer_array = [];

function setActiveOne(active) {
	$( "li" ).removeClass( "active" );
	$( "#divcreatecustomer" ).hide();
	$( "#divcustomerquery" ).hide();
	$( "#divreverse" ).hide();

	$( "#" + active ).addClass( "active" );
	$( "#div" + active ).show();
	
	$("#tableOfRecords").hide();
	$("#msgFieldVerifyError").hide();
	$("#msgCustomerCreatedOK").hide();
	$("#divdetailedCustomerInfo").hide();
	return;
}

function customer_action_process(div) {
	console.log($("#" + div + " button").html());
	
	if (div == "divcreatecustomer") {
		var action = $( "#" + div + " #action" ).val().trim();
		var first_name = $( "#" + div + " #first_name" ).val().trim();
		var last_name = $( "#" + div + " #last_name" ).val().trim();
		var mobile = $( "#" + div + " #mobile" ).val().trim();
		var phone = $( "#" + div + " #phone" ).val().trim();
		var email = $( "#" + div + " #email" ).val().trim();
		var other = $( "#" + div + " #other" ).val().trim();
		var identity = $( "#" + div + " #identity" ).val().trim();
		var prospective = $( "#" + div + " #prospective" ).val().trim();
		var budget_bottom = $( "#" + div + " #budget_bottom" ).val().trim();
		var budget_top = $( "#" + div + " #budget_top" ).val().trim();
		var preferred_area = $( "#" + div + " #preferred_area" ).val().trim();
		var comment = $( "#" + div + " #comment" ).val().trim();
		console.log("action is " + action + " / " + div); 
		console.log("first_name is " + first_name); 
		console.log("last_name is " + last_name); 
		console.log("mobile is " + mobile); 
		console.log("phone is " + phone); 
		console.log("email is " + email); 
		console.log("other is " + email); 
		console.log("identity is " + identity); 
		console.log("prospective is " + prospective); 
		console.log("budget_bottom is " + budget_bottom); 
		console.log("budget_top is " + budget_top); 
		console.log("preferred_area is " + preferred_area); 
		console.log("comment is " + comment); 
		$("#tableOfRecords").hide();
		$("#msgFieldVerifyError").hide();
		$("#msgCustomerCreatedOK").hide();
		
		if(first_name==""){
			$("#msgFieldVerifyError").html("客户名字不能是空的");
			$("#msgFieldVerifyError").show();
            $("#" + div + " #first_name").focus();
            return false;
        }
		
		if(mobile==""){
			$("#msgFieldVerifyError").html("mobile不能是空的");
			$("#msgFieldVerifyError").show();
            $("#" + div + " #first_name").focus();
            return false;
        }
		
		var numberReg = /^[\d\+\s]+$/　
		if(!numberReg.test(mobile)){
			$("#msgFieldVerifyError").html("mobile输入格式错误");
			$("#msgFieldVerifyError").show();
			$("#" + div + " #mobile").focus();
			return false;
		}
		if (phone!="") {
			var numberReg = /^[\d\+\s]+$/　
				if(!numberReg.test(phone)){
					$("#msgFieldVerifyError").html("phone输入格式错误");
					$("#msgFieldVerifyError").show();
					$("#" + div + " #phone").focus();
					return false;
				}
		}
		
		$.ajax({
    	type: "post",
		url: "./sq/check_and_insert_new_customer_info.php",
		dataType: "json",
		data:{	action:action,
				first_name:first_name,
				last_name:last_name,
				mobile:mobile,
				phone:phone,
				email:email,
				other:other,
				identity:identity,
				prospective:prospective,
				budget_bottom:budget_bottom,
				budget_top:budget_top,
				preferred_area:preferred_area,
				comment:comment
    		},
		error: function(xhr, errorType, exception){
			console.log(xhr);
			console.log(errorType);
			console.log(exception);
		    },
		success: function(response){
			console.log(response);
			
			var result		= response.result;
			var info		= response.info;
			console.log("response result is: " + result + " / " + info);
			if (result == "OK") {
				$("#msgCustomerCreatedOK").html(info);
				$("#msgCustomerCreatedOK").show();
			}
			else if (result == "NOK") {
				$("#msgFieldVerifyError").html(info);
				$("#msgFieldVerifyError").show();
			}

			return false;
		}});
	}
	else if (div == "divcustomerquery") {
		var action = $( "#" + div + " #action" ).val().trim();
		var full_name = $( "#" + div + " #full_name" ).val().trim();
		var mobile = $( "#" + div + " #mobile" ).val().trim();
		var prospective = $( "#" + div + " #prospective" ).val().trim();
		var preferred_area = $( "#" + div + " #preferred_area" ).val().trim();
		console.log("action is " + action + " / " + div); 
		console.log("full_name is " + full_name); 
		console.log("mobile/phone is " + mobile); 
		console.log("prospective is " + prospective); 
		console.log("preferred_area is " + preferred_area); 
		$("#tableOfRecords").hide();
		$("#msgFieldVerifyError").hide();
		$("#msgCustomerCreatedOK").hide();
		$("#divdetailedCustomerInfo").hide();
		
		if(false && full_name=="" && mobile=="" && prospective=="" && preferred_area==""){
			$("#msgFieldVerifyError").html("需要设置查询条件，否则客户过多无法查看");
			$("#msgFieldVerifyError").show();
            $("#" + div + " #first_name").focus();
            return false;
        }
		if (mobile!="") {
			var numberReg = /^[\d\+\s]+$/　
			if(!numberReg.test(mobile)){
				$("#msgFieldVerifyError").html("mobile/phone输入格式错误");
				$("#msgFieldVerifyError").show();
				$("#" + div + " #mobile").focus();
				return false;
			}
		}
		
		$.ajax({
    	type: "post",
		url: "./sq/select_matched_customer_info.php",
		dataType: "json",
		data:{	action:action,
				full_name:full_name,
				mobile:mobile,
				prospective:prospective,
				preferred_area:preferred_area
    		},
		error: function(xhr, errorType, exception){
			console.log(xhr);
			console.log(errorType);
			console.log(exception);
		    },
		success: function(response){
			console.log(response);
			
			var result		= response.result;
			var info		= response.info;
			console.log("response result is: " + result + " / " + info);
			if (result == "NOK") {
				$("#msgFieldVerifyError").html(info);
				$("#msgFieldVerifyError").show();
				$("#tableOfRecords").hide();
				return false;
			}
			else if (result == "OK") {
				$("#msgCustomerCreatedOK").html(info);
				$("#msgCustomerCreatedOK").show();
				/*	*/
				$("#tableOfRecords").show();
				var trHTML 		= '';
				trHTML = "<tr class='success'>" 
			        + "<th style='width: 20%'>姓名</th>"
			        + "<th style='width: 20%'>电话</th>"
			        + "<th style='width: 20%'>身份</th>"
			        + "<th style='width: 20%'>诚意</th>"
			        + "<th style='width: 20%'>意向区域</th>"
			        + "</tr>";
				customer_array = response.array;
			    $.each(response.array, function(index, obj) {
			    	/*if (obj.index == "Customer Contract" && obj.value != "pdf file to be signed") {
						trHTML +=	"<tr class='danger'>" + 
									"<td style='width: 30%'>" + obj.index + "</td>" +
									"<td style='width: 70%'><a href='" + obj.value + "' target='_blank'>" + obj.value + "</a></td>";
					}
			    	else if (obj.index != "result" && obj.value != "" && obj.value != null) {*/
						trHTML +=	"<tr class='danger' onclick=\"return showCustomerInfo(" + 
										"\'" + obj.id + "\'" + 
									")\">" + 
									"<td >" + obj.full_name + "</td>" +
									"<td >" + obj.mobile + "</td>" +
									"<td >" + obj.identity + "</td>" +
									"<td >" + obj.prospective + "</td>" +
									"<td >" + obj.preferred_area + "</td>";
				});
				
				$("#tableOfRecords th").remove();
				$("#tableOfRecords tr:has(td)").remove();
				$('#tableOfRecords').append(trHTML);

				return false;
			}
		}});
	}
	else if (div == "divdetailedCustomerInfo") {
		var action = $( "#" + div + " #action" ).val().trim();
		var id = $( "#" + div + " #id" ).val().trim();
		var first_name = $( "#" + div + " #first_name" ).val().trim();
		var last_name = $( "#" + div + " #last_name" ).val().trim();
		var mobile = $( "#" + div + " #mobile" ).val().trim();
		var phone = $( "#" + div + " #phone" ).val().trim();
		var email = $( "#" + div + " #email" ).val().trim();
		var other = $( "#" + div + " #other" ).val().trim();
		var identity = $( "#" + div + " #identity" ).val().trim();
		var prospective = $( "#" + div + " #prospective" ).val().trim();
		var budget_bottom = $( "#" + div + " #budget_bottom" ).val().trim();
		var budget_top = $( "#" + div + " #budget_top" ).val().trim();
		var preferred_area = $( "#" + div + " #preferred_area" ).val().trim();
		var comment = $( "#" + div + " #comment" ).val().trim();
		console.log("action is " + action + " / " + div); 
		console.log("first_name is " + first_name); 
		console.log("last_name is " + last_name); 
		console.log("mobile is " + mobile); 
		console.log("phone is " + phone); 
		console.log("email is " + email); 
		console.log("other is " + email); 
		console.log("identity is " + identity); 
		console.log("prospective is " + prospective); 
		console.log("budget_bottom is " + budget_bottom); 
		console.log("budget_top is " + budget_top); 
		console.log("preferred_area is " + preferred_area); 
		console.log("comment is " + comment); 
		$("#msgFieldVerifyError").hide();
		$("#msgCustomerCreatedOK").hide();
		
		if(first_name==""){
			$("#msgFieldVerifyError").html("客户名字不能是空的");
			$("#msgFieldVerifyError").show();
            $("#" + div + " #first_name").focus();
            return false;
        }
		
		if(mobile==""){
			$("#msgFieldVerifyError").html("mobile不能是空的");
			$("#msgFieldVerifyError").show();
            $("#" + div + " #first_name").focus();
            return false;
        }
		
		var numberReg = /^[\d\+\s]+$/　
		if(!numberReg.test(mobile)){
			$("#msgFieldVerifyError").html("mobile输入格式错误");
			$("#msgFieldVerifyError").show();
			$("#" + div + " #mobile").focus();
			return false;
		}
		if (phone!="") {
			var numberReg = /^[\d\+\s]+$/　
				if(!numberReg.test(phone)){
					$("#msgFieldVerifyError").html("phone输入格式错误");
					$("#msgFieldVerifyError").show();
					$("#" + div + " #phone").focus();
					return false;
				}
		}
		
		$.ajax({
    	type: "post",
		url: "./sq/update_existing_customer_info.php",
		dataType: "json",
		data:{	action:action,
				id:id,
				first_name:first_name,
				last_name:last_name,
				mobile:mobile,
				phone:phone,
				email:email,
				other:other,
				identity:identity,
				prospective:prospective,
				budget_bottom:budget_bottom,
				budget_top:budget_top,
				preferred_area:preferred_area,
				comment:comment
    		},
		error: function(xhr, errorType, exception){
			console.log(xhr);
			console.log(errorType);
			console.log(exception);
		    },
		success: function(response){
			console.log(response);
			
			var result		= response.result;
			var info		= response.info;
			console.log("response result is: " + result + " / " + info);
			if (result == "OK") {
				$("#msgCustomerCreatedOK").html(info);
				$("#msgCustomerCreatedOK").show();
				
				$("#tableOfRecords").hide();
				$("#divdetailedCustomerInfo").hide();
			}
			else if (result == "NOK") {
				$("#msgFieldVerifyError").html(info);
				$("#msgFieldVerifyError").show();
			}

			return false;
		}});
	}

	return false;
}

function funcSelectIdentity(div) {
	var selectIdentity = $( "#" + div + " #selectIdentity" ).val();
	console.log(selectIdentity);
	
	$( "#" + div + " #identity" ).val(selectIdentity);
}

function funcSelectProspective(div) {
	var selectProspective = $( "#" + div + " #selectProspective" ).val();
	console.log(selectProspective);
	
	$( "#" + div + " #prospective" ).val(selectProspective);
}

function showCustomerInfo(id) {
	console.log("id: " + id);
	//console.log(customer_array);
	$("#divdetailedCustomerInfo").show();
	
	$.each(customer_array, function(index, obj) {
    	if (obj.id == id) {
    		$("#divdetailedCustomerInfo #id").val(id);
    		$("#divdetailedCustomerInfo #first_name").val(obj.first_name);
    		$("#divdetailedCustomerInfo #last_name").val(obj.last_name);
    		$("#divdetailedCustomerInfo #mobile").val(obj.mobile);
    		$("#divdetailedCustomerInfo #phone").val(obj.phone);
    		$("#divdetailedCustomerInfo #email").val(obj.email);
    		$("#divdetailedCustomerInfo #other").val(obj.other);
    		$("#divdetailedCustomerInfo #identity").val(obj.identity);
    		$("#divdetailedCustomerInfo #selectIdentity").val(obj.identity).change();
    		$("#divdetailedCustomerInfo #budget_bottom").val(obj.budget_bottom);
    		$("#divdetailedCustomerInfo #budget_top").val(obj.budget_top);
    		$("#divdetailedCustomerInfo #preferred_area").val(obj.preferred_area);
    		$("#divdetailedCustomerInfo #prospective").val(obj.prospective);
    		$("#divdetailedCustomerInfo #selectProspective").val(obj.prospective);
    		$("#divdetailedCustomerInfo #comment").val(obj.comment);
		}
	});
}

