	var timer;
	var progressBarTimer = 80;
	
	function showMyModalErrorMsg(errorMsg){
		$("#myModalErrorMsgOpen").eq(0).trigger("click");
		$("#myModalErrorMsgInfo").html(errorMsg);
	}
	
	function setComponentValue(value,component) {
    	document.getElementById(component).value = value;
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
	
	function updateAttendanceRecords(ID,name){
		
		$("#attendanceRecordTitle").html("Attendance records of " + name);
		
		$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"updateAttendanceRecords",
        			ID:ID,
        			name:name,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured in function updateAttendanceRecords(): " + xhr.responseText);
    		    },
    		success: function(response){
    			console.log(response);
    			
    			var trHTML = '';
    			response = $.parseJSON(response);
    			$.each(response, function(i, item) {
    				if (response[i].weekday!="Sat" && response[i].weekday!="Sun") {
    					trHTML += "<tr class='danger'>";
    				}
    				else {
    					trHTML += "<tr class=''>";
    				}
    				trHTML += "<td>" + (i+1) + "</td><td>" + response[i].tag + "</td>" +
    						"</td><td>" + response[i].date + " (" + response[i].weekday + ")" + "</td>" +
    						"<td>" + response[i].time + "</td><td>" + response[i].comments + "</td>" +
    						"</tr>";
    			});
    			$("#contentOfRecords tr:has(td)").remove();
    			$('#contentOfRecords').append(trHTML);
    			//$("#contentOfRecords").html(response);
        }});

	}
	
	function selectTypeOfReport(type){
		var inputsearchForMatchedRecordsSaveID		= $("#inputsearchForMatchedRecordsSaveID").val().trim();
		var inputsearchForMatchedRecordsSaveName	= $("#inputsearchForMatchedRecordsSaveName").val().trim();
		if (!inputsearchForMatchedRecordsSaveID) {
    		showMyModalErrorMsg("Please select one account in the left!");
    	}
		
		if (type == 'daily') {
	    	$("#idRadioWeeklyReport").prop('checked', false);
	    	$("#idRadioMonthlyReport").prop('checked', false);
	    	$("#idRadioBgDailyReport").css("background-color","lightblue");
	    	$("#idInputDailyReport").css("background-color","lightblue");
	    	$("#idRadioBgWeeklyReport").css("background-color","#eee");
	    	$("#idInputWeeklyReport").css("background-color","#eee");
	    	$("#idRadioBgMonthlyReport").css("background-color","#eee");
	    	$("#idInputMonthlyReport").css("background-color","#eee");
		}
		else if (type == 'weekly') {
	    	$("#idRadioDailyReport").prop('checked', false);
	    	$("#idRadioMonthlyReport").prop('checked', false);
	    	$("#idRadioBgDailyReport").css("background-color","#eee");
	    	$("#idInputDailyReport").css("background-color","#eee");
	    	$("#idRadioBgWeeklyReport").css("background-color","lightblue");
	    	$("#idInputWeeklyReport").css("background-color","lightblue");
	    	$("#idRadioBgMonthlyReport").css("background-color","#eee");
	    	$("#idInputMonthlyReport").css("background-color","#eee");
		}
		else if (type == 'monthly') {
	    	$("#idRadioDailyReport").prop('checked', false);
	    	$("#idRadioWeeklyReport").prop('checked', false);
	    	$("#idRadioBgDailyReport").css("background-color","#eee");
	    	$("#idInputDailyReport").css("background-color","#eee");
	    	$("#idRadioBgWeeklyReport").css("background-color","#eee");
	    	$("#idInputWeeklyReport").css("background-color","#eee");
	    	$("#idRadioBgMonthlyReport").css("background-color","lightblue");
	    	$("#idInputMonthlyReport").css("background-color","lightblue");
		}
		if (inputsearchForMatchedRecordsSaveID) {
			readFirstLastRecordListing(inputsearchForMatchedRecordsSaveID,inputsearchForMatchedRecordsSaveName);
    	}
	}
	
	function readFirstLastRecordListing(ID,name){
		
		$("#reportRecordTitle").html("First record and last record of " + name);
		$("#inputsearchForMatchedRecordsSaveID").val(ID);
		$("#inputsearchForMatchedRecordsSaveName").val(name);
		
		var reportType  = "";
		if($('#idRadioDailyReport').is(':checked')) { 
			reportType  = "daily";
		}
		else if($('#idRadioWeeklyReport').is(':checked')) { 
			reportType  = "weekly"; 
		}
		else if($('#idRadioMonthlyReport').is(':checked')) { 
			reportType  = "monthly";
		}
		
		$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"readFirstLastRecordListing",
        			ID:ID,
        			name:name,
        			reportType:reportType,
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
    		    },
    		success: function(response){
    			console.log("readFirstLastRecordListing: " + response);
    			
    			var trHTML = '';
    			response = $.parseJSON(response);
    			if (reportType  == "daily") {
    				trHTML = "<tr class='info'>" 
	                + "<th>Index</th>"
	                + "<th>Date</th>"
	                + "<th>Start record</th>"
	                + "<th>End record</th>"
	                + "<th>Total hour</th>"
	                + "<th>Break hour</th>"
	                + "<th>Net hour</th>"
	                + "</tr>";
    				$.each(response, function(i, item) {
    				if (response[i].weekday!="Sat" && response[i].weekday!="Sun") {
    					trHTML += "<tr class='danger'>";
    				}
    				else {
    					trHTML += "<tr class=''>";
    				}
    				
    				trHTML += "<td>" + (i+1) + "</td>" +
    						"<td>" + response[i].date + " (" + response[i].weekday + ")" + "</td>" +
    						"<td>" + response[i].first + "</td><td>" + response[i].last + "</td>" +
    						"<td>" + response[i].timeTotal + "</td>" +
    						"<td>" + response[i].timeDeduct + "</td>" +
    						"<td>" + response[i].timeNet + "</td>" +
    						"</tr>";
	    			});
    				$("#reportContentOfRecords th").remove();
	    			$("#reportContentOfRecords tr:has(td)").remove();
	    			$('#reportContentOfRecords').append(trHTML);
	    			//$("#reportContentOfRecords").html("daily report is under construction!");
    			}
    			else if (reportType  == "weekly") {
    				trHTML = "<tr class='info'>" 
    	                + "<th>Index</th>"
    	                + "<th>Week</th>"
    	                + "<th>Duty days</th>"
    	                + "<th>Start date</th>"
    	                + "<th>End date</th>"
    	                + "<th>Total hour</th>"
    	                + "<th>Break hour</th>"
    	                + "<th>Net hour</th>"
    	                + "</tr>";
    				$.each(response, function(i, item) {
    				if (response[i].weekday!="Sat" && response[i].weekday!="Sun") {
    					trHTML += "<tr class='danger'>";
    				}
    				else {
    					trHTML += "<tr class=''>";
    				}
    				
    				trHTML += "<td>" + (i+1) + 
    						"<td>Week" + response[i].week + "</td>" +
    						"<td>" + response[i].active + "</td>" +
    						"<td>" + response[i].weekFirstDay + "</td>" +
    						"<td>" + response[i].weekEndDay + "</td>" +
    						"<td>" + response[i].timeTotal + "</td>" +
    						"<td>" + response[i].timeDeduct + "</td>" +
    						"<td>" + response[i].timeNet + "</td>" +
    						"</tr>";
	    			});
    				/*
    				trHTML = "<tr class='info'>" 
    	                + "<th>Weekly report is under construction!</th>"
    	                + "</tr>";*/
    				$("#reportContentOfRecords th").remove();
	    			$("#reportContentOfRecords tr:has(td)").remove();
	    			$('#reportContentOfRecords').append(trHTML);
	    			//$("#reportContentOfRecords").html("Weekly report is under construction!");
    			}
    			else if (reportType  == "monthly") {
    				trHTML = "<tr class='info'>" 
    	                + "<th>Index</th>"
    	                + "<th>Month</th>"
    	                + "<th>Duty days</th>"
    	                + "<th>Total hour</th>"
    	                + "<th>Break hour</th>"
    	                + "<th>Net hour</th>"
    	                + "</tr>";
    				$.each(response, function(i, item) {
    				if (response[i].weekday!="Sat" && response[i].weekday!="Sun") {
        				trHTML += "<tr class='danger'>";
        			}
        			else {
        				trHTML += "<tr class=''>";
        			}  				
    				trHTML += "<td>" + (i+1) + "</td>" + 
    						"<td>" + response[i].month + "</td>" +
    						"<td>" + response[i].active + "</td>" +
    						"<td>" + response[i].timeTotal + "</td>" +
    						"<td>" + response[i].timeDeduct + "</td>" +
    						"<td>" + response[i].timeNet + "</td>" +
    						"</tr>";
	    			});
    				/*
    				trHTML = "<tr class='info'>" 
    	                + "<th>monthly report is under construction!</th>"
    	                + "</tr>";
    				*/
    				$("#reportContentOfRecords th").remove();
	    			$("#reportContentOfRecords tr:has(td)").remove();
	    			$('#reportContentOfRecords').append(trHTML);
	    			//$("#reportContentOfRecords").html("monthly report is under construction!");
    			}
        }});

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
	
    function updateSearchIDandName(ID,name){
		
		$("#attendanceSearchTitle").html("Attendance records of " + name);
		$("#inputsearchForMatchedRecordsSaveID").val(ID);
		$("#contentOfRecords tr:has(td)").remove();
		$("#btnsearchForMatchedRecords").html("Submit Query " + name);
	}
	
    function searchForMatchedRecords() {
    	/*		*/
    	var inputFromYearList 						= $("#inputFromYearList").val().trim();
    	var inputFromMonthList 						= $("#inputFromMonthList").val().trim();
    	var inputFromDate 							= $("#inputFromDate").val().trim();
    	var inputTillYearList 						= $("#inputTillYearList").val().trim();
    	var inputTillMonthList 						= $("#inputTillMonthList").val().trim();
    	var inputTillDate 							= $("#inputTillDate").val().trim();
    	var inputsearchForMatchedRecordsSaveID		= $("#inputsearchForMatchedRecordsSaveID").val().trim();
    	var inputsearchForMatchedRecordsCancelTag	= $("#inputsearchForMatchedRecordsCancelTag").val().trim();
    	
    	if (inputsearchForMatchedRecordsCancelTag == 'True') {
			return false;
		}
    	
    	if (!inputFromDate) {
    		showMyModalErrorMsg("Please select start day!");
    		return false;
    	}
    	else if (!inputTillDate) {
    		showMyModalErrorMsg("Please select end day!");
    		return false;
    	}
    	else if (!inputsearchForMatchedRecordsSaveID) {
    		showMyModalErrorMsg("Please select one account in the left!");
    		return false;
    	}
    	
    	if (inputFromDate.length == 1) {
    		inputFromDate = "0" + inputFromDate;
    	}
    	if (inputTillDate.length == 1) {
    		inputTillDate = "0" + inputTillDate;
    	}
    	
    	var queryStartDate = inputFromYearList + "-" + inputFromMonthList + "-" + inputFromDate;
    	var queryEndDate = inputTillYearList + "-" + inputTillMonthList + "-" + inputTillDate;
        
    	$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"searchForMatchedRecords",
    				queryStartDate:queryStartDate,
    				queryEndDate:queryEndDate,
    				inputsearchForMatchedRecordsSaveID:inputsearchForMatchedRecordsSaveID,
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
    		    },
    		success: function(response){
    			console.log("Action: "+ "searchForMatchedRecords" + " StartDate: "+ queryStartDate + " EndDate: "+ queryEndDate + " ID: "+ inputsearchForMatchedRecordsSaveID);
    			console.log(response);    	
    			
    			var trHTML = '';
    			response = $.parseJSON(response);
    			var count = 0;
    			$.each(response, function(i, item) {
    				count++;
    				if (response[i].weekday!="Sat" && response[i].weekday!="Sun") {
    					trHTML += "<tr class='danger'>";
    				}
    				else {
    					trHTML += "<tr class=''>";
    				}
    				trHTML += "<td>" + (i+1) + "</td><td>" + response[i].tag + "</td>" +
    						"</td><td>" + response[i].date + " (" + response[i].weekday + ")" + "</td>" +
    						"<td>" + response[i].time + "</td><td>" + response[i].comments + "</td>" +
    						"</tr>";
    			});
    			if (count == 0) {
    				trHTML += "<tr class='warning'>" +
    				"<td>" + "No record found!" + "</td>" +
					"</tr>";
    				$("#contentOfRecords tr").remove();
    			}
    			else {
    				$("#contentOfRecords tr:has(td)").remove();
    			}
    			
    			$('#contentOfRecords').append(trHTML);
        }});

        return false;
    }
	
    function updateAccountStatus(ID,name,tag){
		
		$.ajax({
        	type: "post",
    		url: "./CommunicationWithDB.php",
    		dataType: "html",
    		data:{	action:"updateAccountStatus",
        			ID:ID,
        			name:name,
        			tag:tag,
        		},
    		error: function(xhr){
    			  console.log("An ajax error occured in function updateAttendanceRecords(): " + xhr.responseText);
    		    },
    		success: function(response){
    			console.log(response);
    			showMyModalErrorMsg(response);
    			setTimeout(function(){
    				location.reload();
    				}, 5000);
        }});

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

