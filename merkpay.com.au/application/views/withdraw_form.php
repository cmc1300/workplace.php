
<?php $this->load->view("inc/header");
//print_r($data);
//print_r($card);
?>

<div id="main">
  <div class="container">
    
	<?php 
	$titles =array();
	$titles['title']="Transactions Management";
	$this->load->view ( "inc/topbar", $titles);?>
    <!-- End container_top -->
    <div class="row-fluid">
      <div class="span7">
        <div class="box gradient">
          <div class="title">
            <h3>
            <i class="icon-book"></i><span>Withdraw Request</span>
            </h3>
          </div>
          <div class="content">
            <!--  
            <form class="form-horizontal row-fluid" action="form/withdraw" method="post">
            -->
            <?php echo form_open('withdraw/withdraw_action'); ?>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Form this balance</label>
                <div class="controls span7">
                  <label class="control-label span3" for="normal-field"><?php 
                  if(isset($data[0]->available_amount)) {echo $data[0]->available_amount;} else {echo '0.00';}
					//echo $data[0]->available_amount?>AUD</label>
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Amount</label>
                
                <div class="controls span3">
                  <div class="input-append row-fluid">
                    <input class="row-fluid" id="appended-input" size="16" type="text" name='amount'>
                    <span class="add-on ">AUD</span>
                  </div>
                </div>
                
              </div>              
              
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="default-select">To</label>
                <div class="controls span7">
                  <select data-placeholder="Choose your card..." class="chzn-select" id="default-select" name='toperson'>
                    <option value=""></option>
                    <?php 
                    for($i = 0; $i < count($card); $i++) {
                		$item = $card[$i];
	                    echo '<option value="Bank:' . $item->bank_name . ' Account:' . $item->bank_account . ' BSB:' . $item->bank_bsb . '">'
	    					 . 'Bank:' . $item->bank_name . ' Account:' . $item->bank_account . ' BSB:' . $item->bank_bsb . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
               <div class="form-row control-group row-fluid">
                <a href="<?php echo site_url("payment/addnewcard");?>">Add Bank Account</a>
              </div>               
              
              <div class="form-actions row-fluid">
                <div class="span7 offset3">
                  <button type="submit" class="btn btn-primary">Continute</button>
                  <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
              </div>
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
