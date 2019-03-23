
function setActiveOne(active) {
	$( "li" ).removeClass( "active" );
	$( "#divmicropay" ).hide();
	$( "#divorderquery" ).hide();
	$( "#divreverse" ).hide();
	$( "#divrefund" ).hide();
	$( "#divrefundquery" ).hide();
	$( "#divmchdown" ).hide();

	$( "#" + active ).addClass( "active" );
	$( "#div" + active ).show();
	return;
}

function checkPaymentStatus(merchantId, out_trade_no) {
	console.log("function checkPaymentStatus(" + merchantId + ", " + out_trade_no+ ")");

	$.ajax({
		type: "post",
		url : "orderquery.php",				    
		data:{merchantId:merchantId,out_trade_no:out_trade_no,mode:"interface"},
		dataType: "xml",
		beforeSend : function() {	
			
		},
		error: function(xhr, errorType, exception){
		
		},
		success: function(xml){
			//console.log(xml);
			var return_code 	= $(xml).find('return_code').text();
			var return_msg		= $(xml).find('return_msg').text();
			var result_code 	= $(xml).find('result_code').text();
			var err_code		= $(xml).find('err_code').text();
			var err_code_des	= $(xml).find('err_code_des').text();
			var trade_state		= $(xml).find('trade_state').text();
			var response		= "";
			console.log(	"return_code/" + return_code + 
							" return_msg/" + return_msg + 
							" result_code/" + result_code + 
							" err_code/" + err_code + 
							" err_code_des/" + err_code_des + 
							" trade_state/" + trade_state);
			
			if (return_code == "FAIL") {
				response = "查询支付状态失败！" + "错误原因" + "（" + return_msg + "）";
			}
			else if (return_code == "SUCCESS") {
				if (result_code == "SUCCESS") {
					if (trade_state == "SUCCESS") {
						var currency				= $(xml).find('currency').text();
						var customer_payment_amount	= $(xml).find('customer_payment_amount').text();
						response = currency + (customer_payment_amount/100)  + "已经成功支付！";
					}
					else if (trade_state == "REFUND") {
						response = "本次支付已经转入退款！";
					}
					else if (trade_state == "NOTPAY") {
						response = "本次支付没有付款！";
					}
					else if (trade_state == "CLOSED") {
						response = "本次支付已经关闭！";
					}
					else if (trade_state == "REVOKED") {
						response = "本次支付已经撤消！";
					}
					else if (trade_state == "USERPAYING") {
						response = "支付尚未完成，请继续检查付款状态！";
					}
					else if (trade_state == "PAYERROR") {
						response = "本次支付失败，请重新提交付款申请！";
					}
				}
				else if (result_code == "FAIL") {
					if (err_code == "ORDERNOTEXIST") {
						response = "商户订单（" + out_trade_no + "）" + "不存在！";
					}
					else {
						response = "支付结果错误！" + "（" + err_code_des + "）";
					}
				}
			}
			var trade_state = $(xml).find('trade_state').text();
			
			$('#divPaymentStatus').css("display","block");
			document.getElementById("paymentStatus").innerHTML = "支付状态信息：" + response;
		}
	});
}

function funcSelectMerchant(div) {
	//console.log(document.getElementById("selectMerchant").value);
	var selectMerchant = $( "#" + div + " #selectMerchant" ).val();
	console.log(selectMerchant);
	var array = selectMerchant.split("&%&"); 
	var merchantId 		= array[0];
	var merchantName	= array[2];
	var device_info		= array[1];
	console.log("merchantId: " + merchantId);	
	console.log("merchantName: " + merchantName);	
	console.log("device_info: " + device_info);
	
	$( "#" + div + " #merchantId" ).val(merchantId);
	$( "#" + div + " #attach" ).val(merchantName);
	$( "#" + div + " #device_info" ).val(device_info);
	
	if (div == "divorderquery" || div == "divreverse" || div == "divrefund") {
		//console.log("divorderquery and " + "merchantId: " + merchantId);
		$.ajax({
        	type: "post",
    		url: "./sq/sq.php",
    		dataType: "json",
    		data:{	action:"getTransOrderListBasedOnMerchant",
    				merchantId:merchantId},
    		error: function(xhr, errorType, exception){
    			try {
    				var responseText = jQuery.parseJSON(xhr.responseText);
	    			console.log(responseText.ExceptionType);
	    			console.log(responseText.StackTrace);
	    			console.log(responseText.Message);
    			}
    			catch (e) {
    				console.log("errorType: " + errorType);
    				console.log("exception: " + exception);
    				console.log("xhr: " + xhr);
    				console.log("xhr.responseText: " + xhr.responseText);
    			}
    		},
    		success: function(response){
    			console.log(response);    	
    			//response = $.parseJSON(responseJson);
    			var result		= response.result;
    			var info		= response.info;
    			if (result=="OK" && info=="2") {
	    			var trans_count			= response.transaction.count;
	    			var trans_list			= response.transaction.list;
	    			var transaction_status	= "";
	    			//console.log(result + ": " + info + ": " + list[1].transaction_id);    
	    			$("#" + div + " #transaction_id").empty();
	    			$("#" + div + " #transaction_id").append("<option value=''>--");
	    			for (var i = 0; i < trans_count; i++) {
	    				var newOption = $('<option value="' + trans_list[i].transaction_id + '">' + trans_list[i].transaction_id + '</option>');
	    				transaction_status 	= trans_list[i].transaction_status;
	    				result_code 		= trans_list[i].result_code;
	    				if (div != "divreverse" && div != "divrefund" || result_code == "SUCCESS" && transaction_status == "none") {
	    					$("#" + div + " #transaction_id").append(newOption);
	    				}
	    			}
	    			
	    			var trade_count	= response.trade.count;
	    			var trade_list	= response.trade.list;
	    			$("#" + div + " #out_trade_no").empty();
	    			$("#" + div + " #out_trade_no").append("<option value=''>--");
	    			for (var i = 0; i < trade_count; i++) {
	    				var newOption = $('<option value="' + trade_list[i].out_trade_no + '">' + trade_list[i].out_trade_no + '</option>');
	    				transaction_status 	= trade_list[i].transaction_status;
	    				result_code 		= trade_list[i].result_code;
	    				if (div != "divreverse" && div != "divrefund" || result_code == "SUCCESS" && transaction_status == "none") {
	    					$("#" + div + " #out_trade_no").append(newOption);
	    				}
	    			}
    			}
        }});
	}
	else if (div == "divrefundquery") {
		//console.log("divorderquery and " + "merchantId: " + merchantId);
		$.ajax({
        	type: "post",
    		url: "./sq/sq.php",
    		dataType: "json",
    		data:{	action:"getWeChatPaymentRefundListBasedOnMerchant",
    				merchantId:merchantId},
    		error: function(xhr, errorType, exception){
    			try {
    				var responseText = jQuery.parseJSON(xhr.responseText);
	    			console.log(responseText.ExceptionType);
	    			console.log(responseText.StackTrace);
	    			console.log(responseText.Message);
    			}
    			catch (e) {
    				console.log("errorType: " + errorType);
    				console.log("exception: " + exception);
    				console.log("xhr: " + xhr);
    				console.log("xhr.responseText: " + xhr.responseText);
    			}
    		},
    		success: function(response){
    			console.log(response);    	
    			//response = $.parseJSON(responseJson);
    			var result		= response.result;
    			if (result=="OK") {
	    			var trans_count			= response.refund.count;
	    			var trans_list			= response.refund.list;
	    			var transaction_status	= "";
	    			//console.log(result + ": " + info + ": " + list[1].transaction_id);    
	    			$("#" + div + " #transaction_id").empty();
	    			$("#" + div + " #transaction_id").append("<option value=''>--");
	    			for (var i = 0; i < trans_count; i++) {
	    				var newOption = $('<option value="' + trans_list[i].transaction_id + '">' + trans_list[i].transaction_id + '</option>');
	    				transaction_status 	= trans_list[i].transaction_status;
	    				result_code 		= trans_list[i].result_code;
	    				if (true) {
	    					$("#" + div + " #transaction_id").append(newOption);
	    				}
	    			}
	    			
	    			var trade_count	= response.refund.count;
	    			var trade_list	= response.refund.list;
	    			$("#" + div + " #out_trade_no").empty();
	    			$("#" + div + " #out_trade_no").append("<option value=''>--");
	    			for (var i = 0; i < trade_count; i++) {
	    				var newOption = $('<option value="' + trade_list[i].out_trade_no + '">' + trade_list[i].out_trade_no + '</option>');
	    				transaction_status 	= trade_list[i].transaction_status;
	    				result_code 		= trade_list[i].result_code;
	    				if (true) {
	    					$("#" + div + " #out_trade_no").append(newOption);
	    				}
	    			}
    			}
        }});
	}
}

function funcSelectGoods(div) {
	//console.log(document.getElementById("selectMerchant").value);
	var selectGoods = $( "#" + div + " #selectGoods" ).val();
	console.log(selectGoods);
	
	var array = selectGoods.split("&%&"); 
	var desc 			= array[0];
	var detail			= array[1];
	var goods_tag		= array[2];
	var order_amount	= array[3];
	console.log("order_amount: " + order_amount);
	console.log("desc: " + desc);	
	console.log("goods_tag: " + goods_tag);	
	console.log("detail: " + detail);	
		
	/*		*/
	$( "#" + div + " #order_amount" ).val(order_amount);
	$( "#" + div + " #desc" ).val(desc);
	$( "#" + div + " #goods_tag" ).val(goods_tag); 
	$( "#" + div + " #detail" ).val(detail); 
}


function funcSelectTrade(sel, div, type) {
    if (sel.value != "") {
    	$("#" + div + " #" + type).val("");
    }
 }
