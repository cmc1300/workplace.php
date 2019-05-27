	var timer;
	var progressBarTimer = 80;
	
	function showMyModalErrorMsg(errorMsg){
		$("#myModalErrorMsgOpen").eq(0).trigger("click");
		$("#myModalErrorMsgInfo").html(errorMsg);
	}
    
    function selectFromBankAccount(value) {
    	document.getElementById("inputFromBankAccount").value = value;
    }
    
    function selectFromOperatorStatusList(value) {
    	document.getElementById("inputFromOperatorStatusList").value = value;
    }
    
    function selectCreateFromOperatorStatusList(value) {
    	document.getElementById("inputCreateFromOperatorStatusList").value = value;
    }
    
    function checkOperatorPassword() {
		var Username  	= $("#Username").val().trim();
		var Password	= $("#Password").val().trim();
		
		if (!Username) {
    		showMyModalErrorMsg("Please input operator name!");
    		return false;
    	}
		else if (!Password) {
    		showMyModalErrorMsg("Please input operator password!");
    		return false;
    	}
		
		$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"checkOperatorPassword",
    				Username:Username,
    				Password:Password,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured in function updateAttendanceRecords(): " + xhr.responseText);
    		    },
    		success: function(response){
    			console.log(response);
    			
    			if(response == "valid"){
    				window.location="main.php";
    			}
    			else
    			{
    				showMyModalErrorMsg("Login failed due to " + response + "!");
    			}
        }});
    	return false;
    }
    
    function WriteTransactionToTableOrders() {
    	var inputClientName 		= $("#inputClientName").val().trim();
		var inputBankBSB 			= $("#inputBankBSB").val().trim();
		var inputBankAccount 		= $("#inputBankAccount").val().trim();
		var inputBankComments 		= $("#inputBankComments").val().trim();
		var inputAmountBefore		= $("#inputAmountBefore").val().trim();
		var inputAmountAfter		= $("#inputAmountAfter").val().trim();
		var inputCancelTag			= $("#inputCancelTag").val().trim();
		
		if (inputCancelTag == 'True') {
			return false;
		}
		
		var inputAmount = inputAmountBefore;
		if (!inputAmount) {
			inputAmount = "0";
		}
		if (inputAmountAfter) {
			inputAmount = inputAmount + "." + inputAmountAfter;
		}
		inputFromBankAccount 	= $("#inputFromBankAccount").val().trim();
		InputLoginName 			= $("#InputLoginName").val().trim();
		InputComputerName 		= $("#InputComputerName").val().trim();
		if (!inputClientName) {
    		showMyModalErrorMsg("Please input customer name to transfer!");
    		return false;
    	}
		else if (!inputBankBSB) {
    		showMyModalErrorMsg("Please input bank BSB to transfer!");
    		return false;
    	}
		else if (!inputBankAccount) {
    		showMyModalErrorMsg("Please input bank account to transfer!");
    		return false;
    	}
		else if (inputAmount == "0") {
    		showMyModalErrorMsg("Please input the amount of money to transfer!");
    		return false;
    	}
    	
        
    	$('button[type="submit"]').attr('disabled','disabled');
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"WriteTransactionToTableOrders",
        			inputClientName:inputClientName,
        			inputBankBSB:inputBankBSB,
        			inputBankAccount:inputBankAccount,
        			inputBankComments:inputBankComments,
        			inputAmount:inputAmount,
        			inputFromBankAccount:inputFromBankAccount,
        			InputLoginName:InputLoginName,
        			InputComputerName:InputComputerName,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured: " + xhr.responseText);
    			  $("#databaseResult").html("An ajax error occured: " + xhr.responseText);
    			  $("#detailedResult1").html("");
    			  /*
    			  showMyModalErrorMsg("An ajax error occured: " + xhr.responseText);
    			  return false;*/
    		    },
    		success: function(response){
    			console.log(response);
    			$("#databaseResult").html(response);
    			var substr = response.split(' ');
    			console.log("Order ID: " + substr[1].trim());
    			$("#detailedResult1").html("Order " + substr[1].trim() + " is to be processed, so please wait in patience.");
    			$("#detailedResult2").html("");
    			timer = setTimeout(function(){
    				timerExpired(1,substr[1].trim());
					}, 1000);
        }});

        return false;
    }

    function timerExpired(count,ID) {
        var nextCount = count + 1;
        if (nextCount > progressBarTimer) 
            nextCount = count % progressBarTimer;
    	console.log("function timerExpired(): " + count + " " + ID);
    	$("div.progress-bar.progress-bar-success.progress-bar-striped.active").attr("style", "width:" + nextCount*100/progressBarTimer + "%");

		/*		*/
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "json",
    		data:{	action:"checkOrderStatus",
        			orderID:ID
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured: " + xhr.responseText);
    			  $("#databaseResult").html("An ajax error occured: " + xhr.responseText);
    			  $("#detailedResult1").html("");
    		    },
    		success: function(data){
    			console.log(data['tag']);
    			if (data['tag'] == "new") {
    				if (count > 5) {
        				$("#databaseResult").html("Order " + ID + " is under processing now");
        				$("#detailedResult1").html("Order " + ID + " is being processed, so please wait in patience.");
        				$("#detailedResult2").html("");
        			}
    			}
    			else {
    				clearTimeout(timer);
    				$("div.progress-bar.progress-bar-success.progress-bar-striped.active").attr("style", "width:100%");
    				if (data['tag'] == "Completed") {
    					$("#databaseResult").html("Order " + ID + " is successfully processed");
    					$("#detailedResult1").html("Execution result: " + data['tag']);
    					$("#detailedResult2").html("Receipt number: " + data['result']);
    					setTimeout(function(){
    						window.location.href ='main.php';
    	    				}, 5000);
        			}
    				else {
    					$("#databaseResult").html("Order " + ID + " process is failed");
    					$("#detailedResult1").html("Execution result: " + data['tag']);
    					$("#detailedResult2").html("Failure reason: " + data['result']);
    					setTimeout(function(){
    						window.location.href ='main.php';
    	    				}, 5000);
        			}
    			}
    			
        }});

    	timer = setTimeout(function(){
			timerExpired(count+1,ID);
			}, 1000);
    }
    
    function generateNewOperatorAccount() {
    	
    	var operator  							= $("#inputOperatorName").val().trim();
    	var password1 							= $("#inputOperatorPassword").val().trim();
    	var password2 							= $("#inputOperatorPassword2").val().trim();
    	var inputNewOperatorAccountCancelTag	= $("#inputNewOperatorAccountCancelTag").val().trim();
    	var inputCreateFromOperatorStatusList	= $("#inputCreateFromOperatorStatusList").val().trim();
    	
    	if (inputNewOperatorAccountCancelTag == 'True') {
			return false;
		}
    	
    	if (!operator) {
    		showMyModalErrorMsg("Please input operator name!");
    		return false;
    	}
    	else if (!password1) {
    		showMyModalErrorMsg("Please set password!");
    		return false;
    	}
    	else if (password1 != password2) {
    		showMyModalErrorMsg("Mismatched password!");
    		return false;
    	}
    	else if (!inputCreateFromOperatorStatusList) {
    		showMyModalErrorMsg("Please select operator status!");
    		return false;
    	}
        
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"generateNewOperatorAccount",
    				inputOperatorName:operator,
    				inputOperatorPassword:password1,
    				inputCreateFromOperatorStatusList:inputCreateFromOperatorStatusList,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured: " + xhr.responseText);
    			  $("#generateNewOperatorAccountResult").html("An ajax error occured: " + xhr.responseText);
    			  /*
    			  showMyModalErrorMsg("An ajax error occured: " + xhr.responseText);
    			  return false;*/
    		    },
    		success: function(response){
    			console.log(response);
    			$("#generateNewOperatorAccountResult").html(response);
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
        }});

        return false;
    }
    
    function setActivatePage(str)
    {
    	$("#page_main_php").removeClass("active");
    	$("#page_transfermoney_php").removeClass("active");
    	$("#page_accounts_php").removeClass("active");
    	$("#page_profile_php").removeClass("active");
    	$("#" + str).addClass("active");
    }
    
    function setOperatorPassword(UserNameID,userName)
    {
    	$("#formGenerateNewOperatorAccount").hide();
    	$("#formChangeOperatorStatus").hide();
    	$("#formChangeBankAccount").hide();
    	$("#formChangeOperatorPassword").show();
    	$("#inputChangeOperatorPasswordID").val(UserNameID);
    	$("#inputChangeOperatorPasswordID").attr('disabled','disabled');
    	$("#inputChangeOperatorPasswordName").val(userName);
    	$("#inputChangeOperatorPasswordName").attr('disabled','disabled');
    }
    
    function changeOperatorPassword() {
    	
    	var password1 							= $("#inputChangeOperatorPasswordPassword").val().trim();
    	var password2 							= $("#inputChangeOperatorPasswordPassword2").val().trim();
    	var inputChangeOperatorPassworCancelTag	= $("#inputChangeOperatorPassworCancelTag").val().trim();
    	
    	if (inputChangeOperatorPassworCancelTag == 'True') {
			return false;
		}
    	
    	if (!password1) {
    		showMyModalErrorMsg("Please set password!");
    		return false;
    	}
    	else if (password1 != password2) {
    		showMyModalErrorMsg("Mismatched password!");
    		return false;
    	}
        
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"changeOperatorPassword",
    				inputChangeOperatorPasswordName:$("#inputChangeOperatorPasswordName").val().trim(),
    				inputChangeOperatorPasswordID:$("#inputChangeOperatorPasswordID").val().trim(),
    				inputChangeOperatorPasswordPassword:$("#inputChangeOperatorPasswordPassword").val().trim(),
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured: " + xhr.responseText);
    			  $("#generateChangeOperatorPasswordResult").html("An ajax error occured: " + xhr.responseText);
    			  /*
    			  showMyModalErrorMsg("An ajax error occured: " + xhr.responseText);
    			  return false;*/
    		    },
    		success: function(response){
    			console.log(response);
    			$("#generateChangeOperatorPasswordResult").html(response);
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
        }});

        return false;
    }
    
    function setOperatorstatus(UserNameID,userName,status)
    {
    	$("#formGenerateNewOperatorAccount").hide();
    	$("#formChangeOperatorPassword").hide();
    	$("#formChangeBankAccount").hide();
    	$("#formChangeOperatorStatus").show();
    	$("#inputChangeOperatorStatusID").val(UserNameID);
    	$("#inputChangeOperatorStatusID").attr('disabled','disabled');
    	$("#inputChangeOperatorStatusName").val(userName);
    	$("#inputChangeOperatorStatusName").attr('disabled','disabled');
    	$("#inputChangeOperatorStatusPrevious").val(status);
    	$("#inputChangeOperatorStatusPrevious").attr('disabled','disabled');
    }
    
    function changeOperatorStatus() {
    	
    	var inputChangeOperatorStatusID 		= $("#inputChangeOperatorStatusID").val().trim();
    	var inputChangeOperatorStatusPrevious 	= $("#inputChangeOperatorStatusPrevious").val().trim();
    	var inputFromOperatorStatusList 		= $("#inputFromOperatorStatusList").val().trim();
    	var inputChangeOperatorStatusCancelTag	= $("#inputChangeOperatorStatusCancelTag").val().trim();
    	
    	if (inputChangeOperatorStatusCancelTag == 'True') {
			return false;
		}
    	
    	if (!inputFromOperatorStatusList) {
    		showMyModalErrorMsg("Please select operator's new status!");
    		return false;
    	}
    	else if (inputChangeOperatorStatusPrevious == inputFromOperatorStatusList) {
    		showMyModalErrorMsg("Operator status had not been changed!");
    		return false;
    	}
        
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"changeOperatorStatus",
    				inputChangeOperatorStatusName:$("#inputChangeOperatorStatusName").val().trim(),
    				inputChangeOperatorStatusID:inputChangeOperatorStatusID,
    				inputFromOperatorStatusList:inputFromOperatorStatusList,
        		},
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
    			  //console.log("An ajax error occured: " + err.message);
    			  //$("#generateChangeOperatorStatusResult").html("An ajax error occured: " + error);
    			  /*
    			  showMyModalErrorMsg("An ajax error occured: " + xhr.responseText);
    			  return false;*/
    		    },
    		success: function(response){
    			console.log(response);
    			$("#generateChangeOperatorStatusResult").html(response);
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
    			
        }});

        return false;
    }
    
    function setBankAccount(UserNameID,userName)
    {
    	$("#formGenerateNewOperatorAccount").hide();
    	$("#formChangeOperatorPassword").hide();
    	$("#formChangeOperatorStatus").hide();
    	$("#formChangeBankAccount").show();
    	$("#inputChangeBankAccountID").val(UserNameID);
    	$("#inputChangeBankAccountID").attr('disabled','disabled');
    	$("#inputChangeBankAccountName").val(userName);
    	$("#inputChangeBankAccountName").attr('disabled','disabled');
    	
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "json",
    		data:{	action:"setBankAccount",
    				inputChangeBankAccountID:$("#inputChangeBankAccountID").val().trim(),
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured in setBankAccount: " + xhr.responseText);
    		    },
    		success: function(data){
    			console.log(data);
    			$('input[type=checkbox]').each(function () {
    		           if (this.checked) {
    		               $(this).prop( "checked", false ); 
    		           }
    			});
    			$.each( data, function( key, value ) {
    				  $( "#" + value ).prop( "checked", true );
    				});
    			
        }});
    }
    
    function changeBankAccount() {
    	
    	var inputChangeBankAccountID 			= $("#inputChangeBankAccountID").val().trim();
    	var inputChangeBankAccountName 			= $("#inputChangeBankAccountName").val().trim();
    	var inputChangeBankAccountCancelTag		= $("#inputChangeBankAccountCancelTag").val().trim();
    	
    	if (inputChangeBankAccountCancelTag == 'True') {
			return false;
		}
    	
    	if (true) {
    		//showMyModalErrorMsg(inputChangeBankAccountID);
    		//return false;
    	}
    	
    	var selectedBankAccountID = "";
    	$('input[type=checkbox]').each(function () {
	           if (this.checked) {
	        	   if (!selectedBankAccountID) {
	        		   selectedBankAccountID = $(this).prop("id");
	        	   }
	        	   else {
	        		   selectedBankAccountID += " " + $(this).prop("id");
	        	   }
	           }
		});
    	
    	//console.log(selectedBankAccountID);
        
    	/*		*/
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"changeBankAccount",
    				inputChangeBankAccountName:inputChangeBankAccountName,
    				inputChangeBankAccountID:inputChangeBankAccountID,
    				selectedBankAccountID:selectedBankAccountID,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured: " + xhr.responseText);
    			  $("#generateChangeBankAccountResult").html("An ajax error occured: " + xhr.responseText);
    		    },
    		success: function(response){
    			console.log(response);
    			$("#generateChangeBankAccountResult").html(response);
    			/*		*/
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
    			
        }});

        return false;
    }

    function generateNewBankAccount() {    
    	var inputBankAccountLogin 			= $("#inputBankAccountLogin").val().trim();
		var inputBankUserName 				= $("#inputBankUserName").val().trim();
		var inputBankAccountPassword 		= $("#inputBankAccountPassword").val().trim();
		var inputBankAccountPassword2 		= $("#inputBankAccountPassword2").val().trim();
		var inputBankMobileIMEI 			= $("#inputBankMobileIMEI").val().trim();
		var inputBankAccountStatus 			= $("#inputBankAccountStatus").val().trim();
		var inputBankAccountCancelTag		= $("#inputBankAccountCancelTag").val().trim();
    	
    	if (inputBankAccountCancelTag == 'True') {
			return false;
		}
		/*		*/
    	if (!inputBankAccountLogin) {
    		showMyModalErrorMsg("Please enter bank account login!");
    		return false;
    	}
    	else if (!inputBankUserName) {
    		showMyModalErrorMsg("Please enter bank account name!");
    		return false;
    	}
    	else if (!inputBankAccountPassword) {
    		showMyModalErrorMsg("Please enter password!");
    		return false;
    	}
    	else if (!inputBankAccountPassword2) {
    		showMyModalErrorMsg("Please repeat password!");
    		return false;
    	}
    	else if (inputBankAccountPassword != inputBankAccountPassword2) {
    		showMyModalErrorMsg("Please repeat the same password!");
    		return false;
    	}
    	else if (!inputBankMobileIMEI) {
    		showMyModalErrorMsg("Please enter mobile IMEI!");
    		return false;
    	}
    	else if (!inputBankAccountStatus) {
    		showMyModalErrorMsg("Please select bank account status!");
    		return false;
    	}
    	
    			
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"generateNewBankAccount",
    				inputBankAccountLogin:inputBankAccountLogin,
    				inputBankUserName:inputBankUserName,
    				inputBankAccountPassword:inputBankAccountPassword,
    				inputBankAccountPassword2:inputBankAccountPassword2,
    				inputBankMobileIMEI:inputBankMobileIMEI,
    				inputBankAccountStatus:inputBankAccountStatus,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured: " + xhr.responseText);
    			  $("#generateChangeBankAccountResult").html("An ajax error occured: " + xhr.responseText);
    		    },
    		success: function(response){
    			console.log(response);
    			$("#generateNewBankAccountResult").html(response);
    			/*		*/
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
    			
        }});

        return false;
    }
    
    function setBankAccountProfile(ID,bankLoginName,bankUserName,IMEI)
    {
    	$("#formGenerateNewBankAccount").hide();
    	$("#formSetBankAccountStatus").hide();
    	$("#formSetBankAccountProfile").show();
    	
    	/*		*/
    	$("#inputChangeProfileBankAccountLoginID").val(ID);
    	$("#inputChangeProfileBankAccountLoginID").attr('disabled','disabled');
    	$("#inputChangeProfileBankAccountLogin").val(bankLoginName);
    	$("#inputChangeProfileBankAccountLogin").attr('disabled','disabled');
    	$("#inputChangeProfileBankUserName").val(bankUserName);
    	$("#inputChangeProfileBankMobileIMEI").val(IMEI);
    }
    
    function changeBankAccountProfile() {   
    	var inputChangeProfileBankAccountLoginID 	= $("#inputChangeProfileBankAccountLoginID").val().trim();
    	var inputChangeProfileBankAccountLogin 		= $("#inputChangeProfileBankAccountLogin").val().trim();
    	var inputChangeProfileBankUserName 			= $("#inputChangeProfileBankUserName").val().trim();
    	var inputChangeProfileBankAccountPassword 	= $("#inputChangeProfileBankAccountPassword").val().trim();
    	var inputChangeProfileBankAccountPassword2 	= $("#inputChangeProfileBankAccountPassword2").val().trim();
    	var inputChangeProfileBankMobileIMEI 		= $("#inputChangeProfileBankMobileIMEI").val().trim();
    	var inputChangeProfileCancelTag				= $("#inputChangeProfileCancelTag").val().trim();
    	
    	if (inputChangeProfileCancelTag == 'True') {
			return false;
		}
    	
    	if (!inputChangeProfileBankUserName) {
    		showMyModalErrorMsg("Bank account name can't be empty!");
    		return false;
    	}
    	else if (!inputChangeProfileBankMobileIMEI) {
    		showMyModalErrorMsg("Mobile IMEI can't be empty!");
    		return false;
    	}
    	else if (inputChangeStatusBankAccountStatus && inputChangeProfileBankAccountPassword != inputChangeProfileBankAccountPassword2) {
    		showMyModalErrorMsg("Please repeat the same password!");
    		return false;
    	}
    	
    	/*		*/
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"changeBankAccountProfile",
    			/*		*/
    				inputChangeProfileBankAccountLoginID:inputChangeProfileBankAccountLoginID,
    				inputChangeProfileBankAccountLogin:inputChangeProfileBankAccountLogin,
    				inputChangeProfileBankUserName:inputChangeProfileBankUserName,
    				inputChangeProfileBankAccountPassword:inputChangeProfileBankAccountPassword,
    				inputChangeProfileBankAccountPassword2:inputChangeProfileBankAccountPassword2,
    				inputChangeProfileBankMobileIMEI:inputChangeProfileBankMobileIMEI,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured: " + xhr.responseText);
    			  $("#generateChangeProfileBankAccountResult").html("An ajax error occured: " + xhr.responseText);
    		    },
    		success: function(response){
    			console.log(response);
    			$("#generateChangeProfileBankAccountResult").html(response);
    			/*		*/
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
    			
        }});

        return false;
    }
    
    function setBankAccountStatus(ID,bankLoginName,bankUserName,bankStatus)
    {
    	$("#formGenerateNewBankAccount").hide();
    	$("#formSetBankAccountProfile").hide();
    	$("#formSetBankAccountStatus").show();
    	
    	/*		*/
    	$("#inputChangeStatusBankAccountLoginID").val(ID);
    	$("#inputChangeStatusBankAccountLoginID").attr('disabled','disabled');
    	$("#inputChangeStatusBankAccountLogin").val(bankLoginName);
    	$("#inputChangeStatusBankAccountLogin").attr('disabled','disabled');
    	$("#inputChangeStatusBankUserName").val(bankUserName);
    	$("#inputChangeStatusBankUserName").attr('disabled','disabled');
    	$("#inputChangeStatusBankAccountCurStatus").val(bankStatus);
    	$("#inputChangeStatusBankAccountCurStatus").attr('disabled','disabled');
    }
    
    function changeBankAccountStatus() {    	
    	
    	var inputChangeStatusBankUserName			= $("#inputChangeStatusBankUserName").val().trim();
    	var inputChangeStatusBankAccountLoginID		= $("#inputChangeStatusBankAccountLoginID").val().trim();
    	var inputChangeStatusBankAccountStatus 		= $("#inputChangeStatusBankAccountStatus").val().trim();
    	var inputChangeStatusBankAccountCurStatus 	= $("#inputChangeStatusBankAccountCurStatus").val().trim();
    	var inputChangeStatusBankAccountCancelTag	= $("#inputChangeStatusBankAccountCancelTag").val().trim();
    	
    	if (inputChangeStatusBankAccountCancelTag == 'True') {
			return false;
		}
    	
    	if (!inputChangeStatusBankAccountStatus) {
    		showMyModalErrorMsg("Please select a new status other than " + inputChangeStatusBankAccountCurStatus + "!");
    		return false;
    	}
    	else if (inputChangeStatusBankAccountStatus == inputChangeStatusBankAccountCurStatus) {
    		showMyModalErrorMsg("Bank account status had not been changed!");
    		return false;
    	}
        
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"changeBankAccountStatus",
    				inputChangeStatusBankUserName:inputChangeStatusBankUserName,
    				inputChangeStatusBankAccountLoginID:inputChangeStatusBankAccountLoginID,
    				inputChangeStatusBankAccountStatus:inputChangeStatusBankAccountStatus,
        		},
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
    			$("#generateChangeStatusBankAccountResult").html("An ajax error occured: " + error);
    		},
    		success: function(response){
    			console.log(response);
    			$("#generateChangeStatusBankAccountResult").html(response);
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
    			
        }});

        return false;
    }

    $(document).ready(function(){
    	try
        {
            var network = new ActiveXObject('WScript.Network');
            // Show a pop up if it works
            //showMyModalErrorMsg(network.computerName);
        }
        catch (e) { 
            //showMyModalErrorMsg("Wrong: " + e.message);
        }

        $("button").click(function(){
    	});
        
        jQuery('.numbersOnly').keyup(function () { 
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });
        
    });

