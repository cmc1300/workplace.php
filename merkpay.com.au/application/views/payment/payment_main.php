   <!-- Responsive part -->

<?php $this->load->view("inc/header");
//print_r( $data);
//echo count($data);
?>
<div id="main">
  <div class="container">
    
	<?php 
	$titles =array();
	$titles['title']="Bank Account Management";
	$this->load->view ( "inc/topbar", $titles);?>
  <div id="container2">
  		<div class="span2">

        <!-- End .box -->
      </div>
      
<div class="row-fluid">
    <div class="box gradient">

      <div class="title">
           
                <h3>
                  <i class=" icon-bar-chart"></i> <span>Bank Account Management <small></small></span>
                </h3>
            
        </div><!-- End .title -->
     <!-- start table -->
        <div class="content top">
          <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
            <thead>
              <tr>
                <th class="to_hide_phone no_sort"><label class="checkbox "><input type="checkbox"></label></th>
                <th class="to_hide_phone no_sort">Date</th>
                <th class="to_hide_phone no_sort">Bank Name</th>
                 <th class="">Bank Account</th>
                 <th class="to_hide_phone  no_sort">Bank BSB</th>
                 <th class="to_hide_phone ue no_sort">Card Holder</th>
                 <th class="to_hide_phone ue no_sort">Descriptions</th>
                 <th class="to_hide_phone span2">Action</th>
              </tr>
            </thead>
            <tbody>
               <?php 
                for($i = 0; $i < count($data); $i++) {
                $item = $data[$i];

				echo '
               <tr>

               <th><label class="checkbox "><input type="checkbox"></label></th>
               <th>' . $item->created_date . '</th>
                <th>' . $item->bank_name . '</th>
                <th>' . $item->bank_account . '</th>
                <th>' . $item->bank_bsb .  '</th>
                <th><a>' . $item->card_holder. '</a></th>
                <th>' . $item->card_desc .  '</th>
                <th><div class="btn-group1">
                    <a class="btn btn-small"  rel="tooltip"  href=" ' . site_url("payment/update?id=". $item->id)  . '" data-original-title=" Edit "><i class="gicon-edit"></i></a>
                    <a class="btn btn-inverse btn-small" rel="tooltip" "  href=" ' . site_url("payment/delete?id=" . $item->id )  . '" data-placement="bottom" data-original-title="Remove"><i class="gicon-remove icon-white"></i></a>
                  </div></th>  

   		        </tr>';
				
			
				};

                ?>
                <!--  
                <td><img class="thumbnail small" src="../img/message_avatar7.png"></td>
                <td class="to_hide_phone">Perfectly symmetrical violence never solved anything.</td>
                <td class="to_hide_phone">
                  <div class="row-fluid"><small><div class="span12"><strong>Size:</strong> 9.996 Kb</div></small></div>
                   <div class="row-fluid"><small><div class="span12"><strong>Format:</strong> .psd</div></small></div>
                </td>
                <td>Leela</td>
                <td class="to_hide_phone">99,67% <span class="line">5,3,2,-1,-3,-2,2,3,5,2</span></td>
                <td >93</td>
               
               
                <td class="ms"><div class="btn-group1">
                    <a class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><i class="gicon-edit"></i></a>
                    <a class="btn btn-small" rel="tooltip" data-placement="top" data-original-title="View"><i class="gicon-eye-open"></i></a>
                    <a class="btn btn-inverse btn-small" rel="tooltip" data-placement="bottom" data-original-title="Remove"><i class="gicon-remove icon-white"></i></a>
                  </div>
                </td>
                -->
                
                

             
            </tbody>
          </table>
           
        </div><!-- End .content -->
</div> <!-- End box -->
</div> <!-- End .row-fluid -->


</div><!-- End #container -->
</div>

<div id="footer">
  		<p>&copy; Tenpay.com.au 2014</p>
		<span class="company_logo"><a href="http://tenpay.com.au"></a></span></div>
</div>
<?php $this->load->view("inc/footer");