<?php 
$HOME = "../";
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
    border-spacing: 1;
    width: 100%;
    border: 1px solid black;
}

th, td {
    text-align: left;
    border: 1px solid black;
    padding: 2px;
}

tr.outtable:nth-child(even){background-color: #f2f2f2}
</style>
    
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="http://www.tiens-anz.com">
                	<b>
                	<img src="http://www.tiens-anz.com/img/logos/logo.jpg" style="width:45px;height:45px;">&nbsp;&nbsp;Tiens Australia & New Zealand
                	</b>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $HOME;?>#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $HOME;?>#portfolio">Product</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $HOME;?>#training">Training</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $HOME;?>#services">Order</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $HOME;?>#staff">Staff</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $HOME;?>#contact">Contact US</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <section id="pricelist">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Tiens ANZ Product Price</h2>
                    <h3 class="section-subheading text-muted">Tiens ANZ product price</h3>
                    <div style="overflow-x:auto;">
					  <table>
					    <tr class="outtable">
					      <th style="width: 10%">Product Code<br>产品编码</th>
					      <th style="width: 20%">Product Name<br>产品名称</th>
					      <th style="width: 10%">Product Origin<br>产品产地</th>
					      <th style="width: 15%">Retail Price<br>产品价格</th>
					      <th style="width: 15%">Silver Price<br>银卡优惠</th>
					      <th style="width: 15%">Gold Price<br>金卡优惠</th>
					      <th style="width: 15%">Platinum Price<br>白金卡优惠</th>
					    </tr>
					    
					    <tr class="outtable">
					      <td>DQ02H0189</td>
					      <td>TIENS Multifunctional Headcare Apparatus 天狮宜首康多功能保健仪</td>
					      <td>China<br>中国</td>
					      <td>
						   	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$290</td> <td>131</td> <td>131</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$290</td> <td>131</td> <td>131</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$290</td> <td>131</td> <td>131</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$290</td> <td>131</td> <td>131</td> </tr>
							</table>
					      </td>
					    </tr>
					    
					    <tr class="outtable">
					      <td>DQ02H0190</td>
					      <td>TIENS Hyper-H Health Cup 天狮宜康源水素健康水杯</td>
					      <td>China<br>中国</td>
					      <td>
						   	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$890</td> <td>400</td> <td>400</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$890</td> <td>400</td> <td>400</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$890</td> <td>400</td> <td>400</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$890</td> <td>400</td> <td>400</td> </tr>
							</table>
					      </td>
					    </tr>
					    
					    <tr class="outtable">
					      <td>DQ02H0191</td>
					      <td>Tiens Multi-function Fridge Purifier TQ-Z12 天狮多功能冰箱宝TQ-Z12</td>
					      <td>China<br>中国</td>
					      <td>
						   	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					    </tr>
					    
					    <tr class="outtable">
					      <td>DQ02H0195</td>
					      <td>TIENS Ti- Energy Bracelet (Magic White Women's Extended Edition) 天狮钛金能量手链（魔力白 女士加⻓版）</td>
					      <td>China<br>中国</td>
					      <td>
						   	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					    </tr>
					    
					    <tr class="outtable">
					      <td>DQ02H0196</td>
					      <td>TIENS Ti- Energy Bracelet（Crystal Black Men's Extended Edition）天狮钛金能量手链（炫晶黑 男士加⻓版）</td>
					      <td>China<br>中国</td>
					      <td>
						   	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					      <td>
					      	<table>
							    <tr> <th>Price</th> <th>BV</th> <th>PV</th> </tr>
							    <tr> <td>$230</td> <td>100</td> <td>100</td> </tr>
							</table>
					      </td>
					    </tr>
					    
					  </table>
					</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="dietary" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dietary Supplement</h2>
                    <h3 class="section-subheading text-muted">Please find below documents to help new Distributors get registered and started quickly in the business.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Love Your Liver this Summer 23 Nov 2017.pdf" target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Love Your Liver this Summer.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Love Your Liver<br>&nbsp;<br>this Summer</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Tiens ANZ - Product and Retail Price List - Effective 12 Nov 2017.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Tiens ANZ - Product and Retail Price List.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tiens ANZ Product<br>and<br>Retail Price List</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Product Manual Australia & NZ all products Nov 2017 V2.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Product Manual Australia & NZ all products.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Product Manual<br>Australia & NZ<br>all products</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Weekly and Monthly Closing Dates.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Weekly and Monthly Closing Dates.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Weekly and Monthly<br>&nbsp;<br>Closing Dates</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Portfolio Grid Section -->
    <section id="skincare">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Skin Care</h2>
                    <h3 class="section-subheading text-muted">Please find below documents to help new Distributors get registered and started quickly in the business.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Love Your Liver this Summer 23 Nov 2017.pdf" target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Love Your Liver this Summer.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Love Your Liver<br>&nbsp;<br>this Summer</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Tiens ANZ - Product and Retail Price List - Effective 12 Nov 2017.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Tiens ANZ - Product and Retail Price List.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tiens ANZ Product<br>and<br>Retail Price List</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Product Manual Australia & NZ all products Nov 2017 V2.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Product Manual Australia & NZ all products.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Product Manual<br>Australia & NZ<br>all products</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Weekly and Monthly Closing Dates.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Weekly and Monthly Closing Dates.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Weekly and Monthly<br>&nbsp;<br>Closing Dates</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<!-- Portfolio Grid Section -->
    <section id="wellness" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Wellness Equipment</h2>
                    <h3 class="section-subheading text-muted">Please find below documents to help new Distributors get registered and started quickly in the business.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Love Your Liver this Summer 23 Nov 2017.pdf" target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Love Your Liver this Summer.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Love Your Liver<br>&nbsp;<br>this Summer</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Tiens ANZ - Product and Retail Price List - Effective 12 Nov 2017.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Tiens ANZ - Product and Retail Price List.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tiens ANZ Product<br>and<br>Retail Price List</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Product Manual Australia & NZ all products Nov 2017 V2.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Product Manual Australia & NZ all products.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Product Manual<br>Australia & NZ<br>all products</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="<?php echo $HOME;?>training/document/Weekly and Monthly Closing Dates.pdf"  target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $HOME;?>img/training/Weekly and Monthly Closing Dates.png" border="2" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Weekly and Monthly<br>&nbsp;<br>Closing Dates</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted bottom-margin-sm">
                    	Tiens Bio Tech Australia Pty Ltd
                    	<br>
						Level 14, 330 Collins Street, Melbourne, VIC 3000, Australia
						<br>
						customercare.au@tiens.com
                    </h3>
                    <h3 class="section-subheading text-muted bottom-margin-sm">
                    	Tiens Bio Tech New Zealand Pty Ltd
                    	<br>
						Level 9, 45 Queen Street East, Auckland 1010, New Zealand
						<br>
						customercare.nz@tiens.com
                    </h3>
                </div>
            </div>
           
        
        </div>
    </section>

    <footer>
        <div class="container1" class="bg-light-gray">
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