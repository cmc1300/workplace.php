
<?php $this->load->view("inc/header");
//print_r($data);
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
      <span class="icon"><img src="img/menu_top/profile-avatar.png"></span><span class="title">Administrator</span></a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li><a href="#"><i class=" icon-user"></i> My Profile</a></li>
        <li><a href="#"><i class=" icon-cog"></i>Settings</a></li>
        <li><a href="#"><i class=" icon-unlock"></i>Log Out</a></li>
        <li><a href="#"><i class=" icon-flag"></i>Help</a></li>
      </ul>
      </li>
      <li class="dropdown">
      <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
      <span class="icon"><img src="img/menu_top/profile-messages.png"></span><span class="notifications">3</span>
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
              <img src="img/message_avatar1.png"/>
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
              <img src="img/message_avatar2.png"/>
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
              <img src="img/message_avatar3.png"/>
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
    </div>
    <!-- End container_top -->
    <div class="row-fluid">
      <div class="span7">
        <div class="box gradient">
          <div class="title">
            <h3>
            <i class="icon-book"></i><span>Add new payment card</span>
            </h3>
          </div>
          <div class="content">
            <!--  
            <form class="form-horizontal row-fluid" action="form/withdraw" method="post">
            -->
            <?php echo form_open('withdraw/addpaymentcard'); ?>
              <div class="form-row control-group row-fluid">
                <label>Adding a payment card succeeds</label>
                <div class="controls span7">
                  <label class="control-label span3" for="normal-field"><?php //echo $data[0]->available_amount?></label>
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label>Your card numbe <?php echo $data['bank_account'];?> and BSB <?php echo $data['bank_bsb'];?> has been added successfully</label>
                
              
                
              </div>              
              
              <!--  
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="default-select">To</label>
                <div class="controls span7">
                  <select data-placeholder="Choose your card..." class="chzn-select" id="default-select" name='toperson'>
                    <option value=""></option>
                    <option value="<?php echo $data[0]->card_number;?>"><?php //echo $data[0]->card_number;?></option>
                    <option value="<?php echo $data[0]->card_number;?>"><?php //echo $data[0]->card_number;?></option>
                  </select>
                </div>
               
              </div>
             
              <div class="form-actions row-fluid">
                <div class="span7 offset3">
                  <button type="submit" class="btn btn-primary">Continute</button>
                  <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
              </div>
                -->
              <?php echo form_close(); ?>
           <!--   </form>-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End #container -->
  <div id="footer">
		<p>&copy; Tenpay.com.au 2014</p>
		<span class="company_logo"><a href="http://tenpay.com.au"></a></span>
  </div> <!-- End #footer -->
</div>
<?php $this->load->view("inc/footer");