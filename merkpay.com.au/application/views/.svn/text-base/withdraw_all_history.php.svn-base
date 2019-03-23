   <!-- Responsive part -->

<?php $this->load->view("inc/header");
//print_r( $data);
//echo count($data);
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
                  <i class=" icon-bar-chart"></i> <span>Admin Withdraw history <small></small></span>
                </h3>
            
        </div><!-- End .title -->
     <!-- start table -->
        <div class="content top">
          <?php echo form_open('withdraw/export_part_to_csv'); ?>
          <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
            <thead>
              <tr>
                <th class="jv no_sort"><label class="checkbox "><input type="checkbox"></label></th>

                <th class="to_hide_phone no_sort">Date</th>
                <th class="to_hide_phone no_sort">Merchant ID</th>                
                <th class="to_hide_phone no_sort">Amount</th>
                <th class="to_hide_phone  no_sort">Bank Account</th>
                <th class="to_hide_phone ue no_sort">Bank BSB</th>
              </tr>
            </thead>
            <tbody>

                
                <?php 
                for($i = 0; $i < count($data); $i++) {
                $item = $data[$i];

				echo '
               <tr>

               <th><input type="checkbox" name="index[]" value="'.$item->id .'" ></th>
               <th>' . $item->created_date . '</th>
                <th>' . $item->merchat_id . '</th>		
                <th>' . $item->amount  . '</th>

                <th>' . $item->bank_account .  '</th>
                <th>' . $item->bank_bsb .  '</th>

   		        </tr>';
				
			
				};

                ?>
                
                

             
            </tbody>
            
          </table>
          <div class="form-row control-group row-fluid">
                  <button type="submit" class="btn btn-primary">Export selected to CSV</button>                  
                  <!-- <a href="<?php echo site_url("withdraw/export_to_csv");?>"><button type="button" class="btn btn-primary">Export All To CSV</button> </a> -->
               
              </div> 
        </div><!-- End .content -->
          <?php echo form_close(); ?>
</div> <!-- End box -->
</div> <!-- End .row-fluid -->


</div><!-- End #container -->
</div>

<div id="footer">
  		<p>&copy; Tenpay.com.au 2014</p>
		<span class="company_logo"><a href="http://tenpay.com.au"></a></span>
		</div>
</div>
<?php $this->load->view("inc/footer");