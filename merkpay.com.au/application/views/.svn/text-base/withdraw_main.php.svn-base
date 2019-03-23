   <!-- Responsive part -->

<?php $this->load->view("inc/header");
//print_r( $data);
//echo count($data);
?>
<div id="main">
  <div class="container">
    <div class="container_top">
      <div class="row-fluid ">
          <div class="top_bar_stats to_hide_tablet">
          <div class="stats">
            <span class="title">Sales:</span> +19,77% <span class="bar_1"></span>
          </div>
          <div class="stats">
            <span class="title">Visits:</span> +23,34% <span class="bar_2"></span>
          </div>
          <div class="stats">
            <span class="title">New Users:</span> +2,84% <span class="bar_3"></span>
          </div>
        </div>
        
   <div class="top_right">
     <ul class="nav search">
      <li>
        <form class="form-search">
            <div class="input-append">
              <input type="text" class=" search-query" placeholder="Search..">
            </div>
        </form>
      </li>
    </ul>
    <ul class="nav nav_menu">
    
      <li class="dropdown">
      <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
      <span class="icon"><img src="../img/menu_top/profile-avatar.png"></span><span class="title">Administrator</span></a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li><a href="#"><i class=" icon-user"></i> My Profile</a></li>
        <li><a href="#"><i class=" icon-cog"></i>Settings</a></li>
        <li><a href="#"><i class=" icon-unlock"></i>Log Out</a></li>
        <li><a href="#"><i class=" icon-flag"></i>Help</a></li>
      </ul>
      </li>
      <li class="dropdown">
      <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
      <span class="icon"><img src="../img/menu_top/profile-messages.png"></span><span class="notifications">3</span>
      </a>
      <ul class="dropdown-menu messages" aria-labelledby="dLabel">
        <div class="container">
          <div class="heading">
            <span class="title"><i class="icon-comments"></i>Messages</span><span class="link"><a href="#">Send a new message</a></span>
          </div>
          <ul>
            <li>
            <a href="#">
            <div class="avatar">
              <img src="../img/message_avatar1.png"/>
            </div>
            <div class="container">
              <span class="name">John Smith</span>
              <span class="message"><i class="icon-share-alt"></i>The first thing I remember.. <br/></span>
              <span class="date">Aug 8</span>
            </div>
            </a>
            </li>
            <li>
            <a href="#">
            <div class="avatar">
              <img src="../img/message_avatar2.png"/>
            </div>
            <div class="container">
              <span class="name">Celeste Holm</span>
              <span class="message"><i class="icon-share-alt"></i>What have you learned from.. <br/></span>
              <span class="date">Aug 6</span>
            </div>
            </a>
            </li>
            <li>
            <a href="#">
            <div class="avatar">
              <img src="../img/message_avatar3.png"/>
            </div>
            <div class="container">
              <span class="name">Mark Jobs</span>
              <span class="message"><i class="icon-share-alt"></i>Start it and stick with it.. <br/></span>
              <span class="date">Jul 27</span>
            </div>
            </a>
            </li>
          </ul>
          <div class="footer">
            <a class="see_all">See All Messages <i class="icon-chevron-right"></i></a>
          </div>
        </div>
      </ul>
      </li>
    </ul>
  </div> <!-- End top-right -->

        <div class="span4">
         
        </div>
      </div>
    </div><!-- End container_top -->
  <div id="container2">
  
		<div class="span2">
        <div class="box gradient">
          <div class="title">
            <h3>
            <i class="icon-sitemap"></i>
            <span>2 Columns</span>
            </h3>
          </div>
          <div class="content">
             Balance:$0.00AUD
          </div>
        </div>
        <!-- End .box -->
      </div>
      
<div class="row-fluid">
    <div class="box gradient">

      <div class="title">
           
                <h3>
                  <i class=" icon-bar-chart"></i> <span>Withdraw <small></small></span>
                </h3>
            
        </div><!-- End .title -->
     <!-- start table -->
        <div class="content top">
          <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
            <thead>
              <tr>
                <th class="jv no_sort"><label class="checkbox "><input type="checkbox"></label></th>
                <th class="jv no_sort">Merchat ID</th>
                 <th class="to_hide_phone  no_sort">WeChat ID</th>
                 <th class="to_hide_phone ue no_sort">Available Amount</th>
                 <th class="">Withdrawed_Amount</th>
                 <th class="to_hide_phone span2">Card Number</th>
                 <th class="to_hide_phone span2">Action</th>
              </tr>
            </thead>
            <tbody>

                
                <?php 
                for($i = 0; $i < count($data); $i++) {
                $item = $data[$i];

				echo '
               <tr>
	                <td><label class="checkbox "><input type="checkbox"></label></td>				
					<td>' . $item->merchat_id . '</td>
	                <td class="to_hide_phone"> ' . $item->wechat_id . '</td>
	                <td class="to_hide_phone"> ' . $item->available_amount .  '</td>
	                <td class="to_hide_phone">' . $item->withdrawed_amount . '</td>
	                <td class="to_hide_phone">' . $item->card_number . '</td>
	                <td class="ms"><div class="btn-group1">
	                    <a class="btn btn-small" href=" ' . site_url("withdraw/withdraw_form") .
	                ' " rel="tooltip" data-placement="left" data-original-title=" Withdraw "><i class="gicon-edit"></i></a>
     		
     		<a class="btn btn-small" href=" ' . site_url("withdraw/withdraw_history") .
	                ' " rel="tooltip" data-placement="left" data-original-title=" Withdraw history "><i class="gicon-eye-open"></i></a>
						</div>
	                </td>          		
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
  <p>&copy; Bird Admin Template 2012</p><span class="company_logo"><a href="http://www.pixelgrade.com"></a></span>
</div>
</div>
<?php $this->load->view("inc/footer");