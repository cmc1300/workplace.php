

<?php $this->load->view("inc/header");?>

<div id="main">
  <div class="container">
    <
	<?php 
	$titles =array();
	$titles['title']="Bank Account Management";
	$this->load->view ( "inc/topbar", $titles);?>
    <!-- End container_top -->
    <div class="row-fluid">
      <div class="span7">
        <div class="box gradient">
          <div class="title">
            <h3>
            <i class="icon-book"></i><span>Add a bank account in Australia</span>
            </h3>
          </div>
          
          <div class="content">
            <?php echo form_open('payment/addpaymentcard'); ?>
            <!-- 
            <form class="form-horizontal row-fluid" action="#">
             -->
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Country</label>
                <div class="controls span7">
                	<select name="country">
                		<option value="australia">Australia</option>
                	</select>
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Bank Name</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="bank_name">
                </div>
              </div>
              
              <div class="form-row control-group row-fluid">
                <label class="control-label span3">Account Type</label>
                <div class="controls span7">
                  <label class="radio ">
                  <input type="radio" name="radio" value="Cheque"/> Cheque</label>
                  <label class="radio ">
                  <input type="radio" name="radio" value="Saving"/> Saving</label>
                </div>
              </div>
              
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="hint-field">Bank/State/Branch Number<span class="help-block">(BSB)</span>
                </label>
                <div class="controls span7">
                  <input type="text" name="bank_bsb">
                </div>
              </div>
              
              
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Account Number</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="bank_account">
                </div>
              </div>
              
              
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Re-enter Account Number</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="bank_account1">
                </div>
              </div>

              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Account Holder</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="card_holder">
                </div>
              </div>
              <div class="form-row control-group row-fluid">
                <label class="control-label span3" for="normal-field">Description</label>
                <div class="controls span7">
                  <input type="text" id="normal-field" class="row-fluid" name="card_desc">
                </div>
              </div>                            
              
              <div class="form-actions row-fluid">
                <div class="span7 offset3">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
              </div>
              <!--  
            </form>
            -->
            <?php echo form_close(); ?>
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