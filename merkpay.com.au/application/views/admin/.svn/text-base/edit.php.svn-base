<?php $this->load->view("inc/header");
//print_r($data);
?>

<div id="main">
  <div class="container">
    <div class="container_top">
      <div class="row-fluid ">
          <div class="top_bar_stats to_hide_tablet">
          <div class="stats">
            <span class="title">User Registration Management</span>
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
    <?php $this->load->view("inc/admin_menu.php");?>
    
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
            <i class="icon-book"></i><span>User Editor</span>
            </h3>
          </div>
          <div class="content">
          	<form class="form-horizontal row-fluid" action="<?=site_url("registry/createUser")?>" method="post">
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">User Name</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="user_id" value="<?php echo $data[0]->user_id?>">
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Merchat Id</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="merchat_id" value="<?php echo $data[0]->merchat_id?>">
                </div>
              </div>
              
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Email</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="email" value="<?php echo $data[0]->email?>">
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Address</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="address" value="<?php echo $data[0]->address?>">
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Phone</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="phone" value="<?php echo $data[0]->phone?>">
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">User Type</label>
                <div class="controls span7">
                  <select name="type">
                  		<option value="user">normal user</option>
                  		<option value="admin">admin</option>
                  </select>
                </div>
              </div>
             
             
              <div class="form-actions row-fluid">
                <div class="span7 offset3">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="'. site_url('registry/delete').'/'.$item->id.'" class="btn btn-secondary">Delete</a>
                </div>
              </div>
            </form>
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
</div>
<?php $this->load->view("inc/footer");