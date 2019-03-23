   <!-- Responsive part -->

<?php $this->load->view("inc/adminheader");
//print_r( $data);
//echo count($data);
?>
<div id="main">
  <div class="container">
    
	<?php 
	$titles =array();
	$titles['title']="User Management";
	$this->load->view ( "inc/topbar", $titles);?>
  <div id="container2">
  
      
<div class="row-fluid">
    <div class="box gradient">

      <div class="title">
           
                <h3>
                  <i class=" icon-bar-chart"></i> <span>User List <small></small></span>
                </h3>
            
        </div><!-- End .title -->
     <!-- start table -->
        <div class="content top">
          <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
            <thead>
              <tr>
                <th class="jv no_sort"><label class="checkbox "><input type="checkbox"></label></th>

                <th class="to_hide_phone  no_sort">user name</th>
                <th class="to_hide_phone  no_sort" style="width: 10%">merchat id</th>
                 <th class="to_hide_phone  no_sort">email</th>
                 <th class="to_hide_phone ue no_sort">address</th>
                 <th class="to_hide_phone ue no_sort">phone</th>
                 <th class="to_hide_phone ue no_sort">create_date</th>                                  
                 <th class="jv no_sort">type</th>                               
                 <th class="jv no_sort"></th>

              </tr>
            </thead>
            <tbody>

                
                <?php 
                for($i = 0; $i < count($data->result()); $i++) {
                $item = $data->result()[$i];

				echo '
               <tr>

               <td><label class="checkbox "><input type="checkbox"></label></td>
                <td>'.$item->user_id.'</td>
                <td>'.$item->merchat_id.'</td>
                 <td>'.$item->email.'</td>
                 <td>'.$item->address.'</td>
                 <td>'.$item->phone.'</td>
                 <td>'.$item->create_date.'</td>                                  
                 <td>'.$item->type.'</td>                               
                 <td><a class="btn btn-secondary" href="'. site_url('registry/edit').'/'.$item->id.'">Edit</a></td>
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


<?php $this->load->view("inc/footer");