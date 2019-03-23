
<?php $this->load->view("inc/header");
//print_r($data);
?>

<div id="main">
  <div class="container">
	<?php 
	$titles =array();
	$titles['title']="Bank Account Management";
	$this->load->view ( "inc/topbar", $titles);?>
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
                <label class="control-label span3" for="normal-field">Adding a payment card</label>
                <div class="controls span7">
                  <label class="control-label span3" for="normal-field"><?php //echo $data[0]->available_amount?></label>
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Input your new cardnumber</label>
                
                <div class="controls span3">
                  <div class="input-append row-fluid">
                    <input class="row-fluid" id="appended-input" size="16" type="text" name='cardnumber'>
                  </div>
                </div>
                <label class="control-label span3" for="normal-field">Input your BSB</label>
                
                <div class="controls span3">
                  <div class="input-append row-fluid">
                    <input class="row-fluid" id="appended-input" size="16" type="text" name='cardbsb'>
                  </div>
                </div>                
                
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
               -->
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