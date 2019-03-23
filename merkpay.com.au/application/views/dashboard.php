<?php

$this->load->view ( "inc/header" );
// print_r($withdraw);
?>
<div id="main">
	<div class="container">
	<?php 
	$titles =array();
	$titles['title']="Dashboard";
	$this->load->view ( "inc/topbar", $titles);?>
		<!-- End container_top -->
		<div class="row-fluid">
			
      <div class="span5">
        <div class="box gradient">
          <div class="title">
            <h3>
            <i class="icon-book"></i><span>Account Summary</span>
            </h3>
          </div>
          <div class="content">
          	<?php echo date("D M j G:i:s T Y"); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img alt="aud" width="27px" src="<?php echo base_url();?>/images/audflag.jpg">  AUS   
          	     <div class="box gradient">
		          <div class="content">
		          		<table class="responsive table table-striped table-bordered" style="width: 100%; margin-bottom: 0;">
							<tbody>
								<tr>
									<td width="40%">Net Accounts Received:</td>
									<td style="text-align: right">$<?php  
									if(isset($withdraw[0]->available_amount)) {echo $withdraw[0]->available_amount;} else {echo "0.00";} ?> AUD </td>
								</tr>
								<tr>
									<td width="40%">Net Accounts Pending:</td>
									<td style="text-align: right">$<?php  
									if(isset($withdraw[0]->available_amount)) {echo $withdraw[0]->available_amount;} else {echo "0.00";} ?> AUD </td>
								</tr>
								<tr>
									<td>Net Accounts Paid:</td>
									<td style="text-align: right">$<?php  
									if(isset($withdraw[0]->withdrawed_amount)) {echo $withdraw[0]->withdrawed_amount;} else {echo "0.00";}
									//echo $withdraw[0]->withdrawed_amount ?> AUD</td>
								</tr>
							</tbody>
						</table>
		          </div>
		        </div>
          </div>
        </div>
        <!-- End .box -->
       
        </div>
			<div class="span7">
				<div class="box gradient">
					<div class="title">
						<h3>
							<i class="icon-book"></i><span>Recent Transactions</span>

						</h3>
					</div>
					<div class="content">
						<table id="datatable_example"
							class="responsive table table-striped table-bordered"
							style="width: 100%; margin-bottom: 0;">
							<thead>
								<tr>
									<th class="to_hide_phone no_sort" style="width: 10%"><label class="checkbox "><input
											type="checkbox"></label></th>
									<th class="to_hide_phone no_sort" style="width: 30%">Reference</th>
									<th class="to_hide_phone no_sort" style="width: 30%">Amount</th>
									<th class="to_hide_phone  no_sort" style="width: 30%">Date</th>
								</tr>
							</thead>
							<tbody>                
                <?php
																for($i = 0; $i < count ( $data ); $i ++) {
																	$item = $data [$i];
																	echo '
	               <tr>
	               <td><label class="checkbox "><input type="checkbox"></label></td>
	    		    <td>' . $item->id . '</td>
	    		    <td>' . $item->amount . '</td>  
	               <td>' . $item->created_date . '</td>
	   		        </tr>';
																}
																;
																?>
            </tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- End #container -->
<div id="footer">
		<p>&copy; Tenpay.com.au 2014</p>
		<span class="company_logo"><a href="http://tenpay.com.au"></a></span>
</div>
<!-- End #footer -->
<?php $this->load->view("inc/footer");?>