<?php 
$HOME = "../../";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tiens Australia & New Zealand</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $HOME;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic' rel='stylesheet' type='text/css'>
    <!-- Theme CSS -->
    <link href="<?php echo $HOME;?>css/agency.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto; /* 15% from the top and centered */
    padding: 5px;
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 20px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 0px solid #dddddd;
    text-align: left;
    padding: 10px;
}

</style>
    
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand page-scroll" href="http://www.tiens-anz.com">
                	<b>
                	<img src="http://www.tiens-anz.com/img/logos/logo.jpg" style="width:30px;height:30px;">&nbsp;&nbsp;Tiens ANZ (天狮澳洲新西兰)
                	</b>
                </a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Portfolio Grid Section -->
    <section id="document" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img class="img-responsive" src="20180612BOXHILLLIBRARY.jpg" alt="20180612BOXHILLLIBRARY.jpg">
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Register for Meeting at Box Hill Library<br>博士山图书馆会议报名</h2>
                    <h3 class="section-subheading text-muted">
                    	Let's meet together at Box Hill Library at 5:30pm on Tuesday the 12th June 2018.
                    	<br>
                    	2018年6月12日下午5:30我们相聚在博士山图书馆
                    </h3>
                </div>
            </div>
            <div class="row">
            	<table>
				  	<tr>
				    	<td style="width:30%">
				    		Full Name<br>您的姓名
				    	</td>
				    	<td style="width:70%">
				    		<input type="text" id="name" class="form-control" >
				    	</td>
				  	</tr>
				  	<!--  
				  	<tr>
				    	<td>
				    		Distributor ID (optional)<br>经销商号码 (可选)
				    	</td>
				    	<td>
				    		<input type="text" class="form-control" >
				    	</td>
				  	</tr>-->
				  	<tr>
				    	<td>
				    		Mobile Number<br>联系电话
				    	</td>
				    	<td>
				    		<input type="hidden" id="keyword" value="20180612BOXHILLLIBRARY" />
				    		<input type="text" id="phone" class="form-control" >
				    	</td>
				  	</tr>
				  	<tr>
				    	<td>
				    		Email Address<br>电子邮件
				    	</td>
				    	<td>
				    		<input type="text" id="email" class="form-control" >
				    	</td>
				  	</tr>
				  	<tr>
				    	<td>
				    		Number of Attendees<br>参加会议人数
				    	</td>
				    	<td>
				    		<select id="attendee" class="form-control">
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							  <option value="5+">5+</option>
							</select>
				    	</td>
				  	</tr>
				  	
				  	<tr>
				    	<td>
				    		How did you hear about our meeting? (Please select one option)<br>您是如何知道本次会议？
				    	</td>
				    	<td>
				    		<!--  
				    		<textarea rows="2" id="comments" class="form-control" placeholder="Your comments please (如有需要请留言，谢谢)"></textarea>
				    		-->
				    		<select id="source" class="form-control" size='5'>
							  <option selected value="Vision China Times">Vision China Times （看中国）</option>
							  <option value="WeChat">WeChat （微信）</option>
							  <option value="Facebook">Facebook</option>
							  <option value="Friend">Friend （朋友推荐）</option>
							  <option value="Website Yeeyi">Website Yeeyi （亿忆网站）</option>
							  <option value="1688 AU News">1688 AU News （1688澳洲新闻网）</option>
							  <option value="Melbourne Daily">Melbourne Daily （墨尔本日报）</option>
							</select>
				    	</td>
				  	</tr>
				  	
				  	<tr>
				    	<td>
				    	</td>
				    	<td>
				    		We will only record your phone number and email address for the purpose of your attendance at this meeting and they will not be added to a mailing list. We will not use your phone number and email address for any other purpose, and will not disclose it, without your consent. 
				    	</td>
				  	</tr>
				  	
				  	<tr>
				    	<td style="text-align: center">
				    		<button type="button" onclick="myFunction()" class="btn btn-primary">Register Now (立即报名)</button>
				    	</td>
				    	<td>
				    	</td>
				  	</tr>
				  	
				  	<tr>
				    	<td>
				    	</td>
				    	<td>
				    		<h2>
					  			<span class="label label-warning" id="msgFieldVerifyError" style="display: none"></span>
					  		</h2>
					  		
					  		<h2>
					  			<span class="label label-success" id="msgCustomerCreatedOK" style="display: none"></span>
					  		</h2>
					  		
					  		<table class="table table-bordered table-hover" id="tableOfRecords" style="display: none">
								<?php 
									echo "
										<tr class='success'>
										</tr>\n";
								?>
							</table>
				    	</td>
				  	</tr>
				  	
				</table>
            </div>
            
        </div>
    </section>
    
<script>
function myFunction() {
	var keyword		= $("#keyword").val().trim();
	var name 		= $("#name").val().trim();
	var phone		= $("#phone").val().trim();
	var email		= $("#email").val().trim();
	var attendee	= $("#attendee").val().trim();
	var source		= $("#source").val().trim();
	//var comments	= $("#comments").val().trim();

	if(name == ""){
		$("#msgFieldVerifyError").html("Name can't be empty (姓名不能是空的)");
		$("#msgFieldVerifyError").show();
        $("#name").focus();
        return false;
    }
	
	if(phone == ""){
		$("#msgFieldVerifyError").html("Mobile can't be empty (电话不能是空的)");
		$("#msgFieldVerifyError").show();
        $("#phone").focus();
        return false;
    }
	var numberReg = /^[\d\+\s]+$/　
	if(!numberReg.test(phone)){
		$("#msgFieldVerifyError").html("Mobile format is wrong (电话格式错误)");
		$("#msgFieldVerifyError").show();
		$("#phone").focus();
		return false;
	}
	
	if (email == "") {
		$("#msgFieldVerifyError").html("Email can't be empty (电子邮件不能是空的)");
		$("#msgFieldVerifyError").show();
        $("#email").focus();
        return false;
	}

	//alert(keyword + "\n" + name + "\n" + phone + "\n" + email + "\n" + attendee + "\n" + source);
	//return false;

	$.ajax({
    	type: "post",
		url: "../../sq/campaign.php",
		dataType: "json",
		data:{	keyword: keyword,
				name: name,
				phone: phone,
				email: email,
				attendee: attendee,
				source: source,
				comments: ""
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
			$("#msgCustomerCreatedOK").hide();
			$("#msgFieldVerifyError").hide();
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
</script>

    <footer>
        <div class="container1">
            <div class="row">
                <div class="col-md-8">
                    <span class="copyright">For product ordering please visit: <a href="http://web.au.tiens.com">http://web.au.tiens.com</a> or <a href="http://web.nz.tiens.com">http://web.nz.tiens.com</a></span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="http://templune.com/plantilla-de-bootstrap-gratis.html">Tiens Australia & New Zealand</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="<?php echo $HOME;?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $HOME;?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo $HOME;?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo $HOME;?>js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo $HOME;?>js/agency.min.js"></script>

<script> 
var modal = null;

var vmodal = null;

function openVideoWindow(id) {
	modal = document.getElementById(id);

	vmodal = document.getElementById("v" + id);
	
	modal.style.display = "block";
}

function closeVideoWindow(id) {
	modal = document.getElementById(id);
	
	vmodal.pause();
	
	modal.style.display = "none";
	
}

/*
//Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}*/

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
    	vmodal.pause();
    	
        modal.style.display = "none";
    }
}
</script>

</body>

</html>