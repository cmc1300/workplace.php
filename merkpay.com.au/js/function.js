function inputValidate(){		
if($("#card_number").val()== ""){
alert("Please type your card number！");		
$("#card_number").focus();		
return false;	}	
if($("#card_number").val().length != 16){	
	alert("Please type your card number！");	
$("#card_number").focus();		
return false;	}	
var cardReg = /^\d{16}$/;	
if(!cardReg.test($("#card_number").val())){		
	alert("Please type your card number！");	
$("#card_number").focus();		
return false;	}		
if($("#card_name").val()== ""){		
	alert("Please type your card name！");	
$("#card_name").focus();		
return false;	}	
var str_card=/^[a-zA-Z ]+$/　;	
if(!str_card.test($("#card_name").val())){		
	alert("Please type your card name！");	
$("#card_name").focus();		
return false;	}		
if($("#card_type_month").val()== ""){		
	alert("Please type your card expire day！");	
$("#card_type_month").focus();		
return false;	}	
if($("#card_type_year").val()== ""){		
	alert("Please type your card expire day！");	
$("#card_type_year").focus();		
return false;	}		
if($("#payment_cvv2").val()== ""){		
	alert("Please type your card CVV！");	
$("#payment_cvv2").focus();		
return false;	}	
var cvvReg = /^\d{3}$/;	
if(!cvvReg.test($("#payment_cvv2").val())){		
	alert("Please type your card CVV！");	
$("#payment_cvv2").focus();		
return false;	}	
//<input name="recaptcha_response_field" id="recaptcha_response_field" type="text" autocorrect="off" autocapitalize="off" placeholder="Type the text" autocomplete="off">		

$("#payform").submit();	
console.log("111111111111111111111111");
//$("input[name='myDetails_Name']").val()
};

function inputValidate1(){		
	if($("#card_number").val()== ""){
	alert("请输入您的卡号！");		
	$("#card_number").focus();		
	return false;	}	
	if($("#card_number").val().length != 16){		
	alert("请输入16位数字号码！");		
	$("#card_number").focus();		
	return false;	}	
	var cardReg = /^\d{16}$/;	
	if(!cardReg.test($("#card_number").val())){		
	alert("请输入一个正确的卡号！");		
	$("#card_number").focus();		
	return false;	}		
	if($("#card_name").val()== ""){		
	alert("请输入您卡上的名字。");		
	$("#card_name").focus();		
	return false;	}	
	var str_card=/^[a-zA-Z ]+$/　;	
	if(!str_card.test($("#card_name").val())){		
	alert("请输入正确的字符。");		
	$("#card_name").focus();		
	return false;	}		
	if($("#card_type_month").val()== ""){		
	alert("请输入您卡号的过期月份！");		
	$("#card_type_month").focus();		
	return false;	}	
	if($("#card_type_year").val()== ""){		
	alert("请输入您卡号的过期年份！");		
	$("#card_type_year").focus();		
	return false;	}		
	if($("#payment_cvv2").val()== ""){		
	alert("请输入您的 cvv2 号码！");		
	$("#payment_cvv2").focus();		
	return false;	}	
	var cvvReg = /^\d{3}$/;	
	if(!cvvReg.test($("#payment_cvv2").val())){		
	alert("请输入3位数字号码！");		
	$("#payment_cvv2").focus();		
	return false;	}	
	//<input name="recaptcha_response_field" id="recaptcha_response_field" type="text" autocorrect="off" autocapitalize="off" placeholder="Type the text" autocomplete="off">		
	if($("#recaptcha_response_field").val()== ""){		
	alert("请输入您校验码！");		
	$("#recaptcha_response_field").focus();		
	return false;	}		
	//$("input[name='myDetails_Name']").val()
	};