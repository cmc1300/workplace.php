
<!-- Responsive part -->

<?php
$this->load->view ( "inc/header" );
?>
<div id="main">
	<div class="container">
		
	<?php 
	$titles =array();
	$titles['title']="Transactions Management";
	$this->load->view ( "inc/topbar", $titles);?>
		<div id="container2">
			<div class="row-fluid">
				<div class="box gradient">
				
					<div class="title">
						<h3>
							<i class=" icon-book"></i> <span>Transaction History</span>
						</h3>
					</div>
					<div class="content top">
					
		<div class="span2">
        <div class="box gradient">
          <div class="title">
            <h3>
            <i class="icon-sitemap"></i>
            <?php 
			$amount=0;
            for($i = 0; $i < count ( $data ); $i ++) {
				$amount+=$data [$i]->amount;
			}
            ?>
            <span>Total Balance:
             $<?php echo round($amount,3)?>AUD</span>
            </h3>
          </div>
        </div>
        <!-- End .box -->
      </div>
						<table id="datatable_example"
							class="responsive table table-striped table-bordered"
							style="width: 100%; margin-bottom: 0;">
							<thead>
								<tr>
									<th class="to_hide_phone  no_sort"><label class="checkbox "><input
											type="checkbox"></label></th>

									<th class="to_hide_phone  no_sort">Date</th>
									<th class="to_hide_phone  no_sort">To Name/Email</th>
									<th class="to_hide_phone  no_sort">From Name/Email</th>
									<th class="to_hide_phone  no_sort">Order Status/Action</th>
									<th class="to_hide_phone ue no_sort">Payment Status/Action</th>
									<th class="to_hide_phone ue no_sort">Views</th>

									<th class="to_hide_phone  no_sort">Amount</th>

								</tr>
							</thead>
							<tbody>

                
                <?php
                
																for($i = 0; $i < count ( $data ); $i ++) {
																	$item = $data [$i];
																	
																	echo '
               <tr>

               <td><label class="checkbox "><input type="checkbox"></label></td>
               <td>' . $item->created_date . '</td>
				<td>' . $item->merchat_id . '</td>
                <td>' . $item->card_name . '</td>
                <td>' . $item->order_status . '</td>
                <td>' . $item->payment_status . '</td>
                <td><a href="#">Views</a></td>
                <td>' . $item->amount . '</td>  

   		        </tr>';
																}
																;
																
																?>    
            </tbody>
						</table>

					</div>
					<!-- End .content -->
				</div>
				<!-- End box -->
			</div>
			<!-- End .row-fluid -->


		</div>
		<!-- End #container -->
	</div>

	<div id="footer">
		<p>&copy; Tenpay.com.au 2014</p>
		<span class="company_logo"><a href="http://tenpay.com.au"></a></span>
	</div>
</div>


<?php $this->load->view("inc/footer");