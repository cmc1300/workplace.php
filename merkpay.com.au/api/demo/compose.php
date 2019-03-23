<?php

function getLogo() {
  $content = '';
  
  $content .= '
    <div id="logoRow">
    <div class="row center">
      <div class="col s12 m12 l12">
        <img src="//api.merkpay.com.au/demo/logo.png" />
        <img src="//api.merkpay.com.au/demo/wechat_pay_logo.png" />
      </div>
    </div>
    </div>
  ';
  
  return $content;
}

function getProducts() {
  $content = '';
  
  $content .= '
    <div id="product">
    <div class="row center">
      <div class="col s12 m6 l6 offset-m3 offset-l3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <h4>Product</h4>
            <h5>NetCube Premium Router</h5>
          </div>
          <div class="card-content">
            <a class="waves-effect waves-light btn-large blue" id="product_btn"><i class="material-icons left">shopping_cart</i>Purchase</a>
          </div>
        </div>
      </div>
    </div>
    </div>
  ';
  
  return $content;
}

function getPaymentForm() {
  $content = '';
  
  $content .= '
    <div id="paymentForm">
    <div class="row center">
      <div class="col s12 m6 l6 offset-m3 offset-l3">
        <div class="card">
          <div class="row">
            <h4>Secure Payment</h4>
            <form class="col s10 offset-s1" >
              <div class="row">
                <h2 class="green-text">AUD $ 1.23</h2>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix blue-text">account_circle</i>
                  <input id="merchantName" type="text" class="blue-text" value="Novatel Merkpay Online Store">
                  <label for="merchantName">Merchant Name</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix blue-text">info_outline</i>
                  <input id="orderDes" type="text" class="blue-text" value="Novatel Premium Router">
                  <label for="orderDes">Order Description</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix blue-text">description</i>
                  <textarea id="productDes" type="text" class="materialize-textarea blue-text" value="NetCube Premium Router, NBN, ADSL compatable">NetCube Premium Router, NBN, ADSL compatable</textarea>
                  <label for="productDes">Product Description</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <a class="waves-effect waves-light btn-large blue" id="confirm_btn">Confirm</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  ';
  
  return $content;
}

function processForm() {
  date_default_timezone_set('Australia/Melbourne');
  $out_trade_no = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s") . rand(100, 999) . "AT123456";
  
  $content = '';
  
  $content .= '
  <div id="processForm">
    <div class="row center">
      <div class="col s12 m6 l6 offset-m3 offset-l3">
        <div class="card">
          <div class="row">
            <h4>Secure Payment</h4>
            <form class="col s10 offset-s1" action="../northbound/wechat/micropay.php" method="get" target="" id="submitForm">
              <div class="row">
                <h2 class="green-text">AUD $ 1.23</h2>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix blue-text">aspect_ratio</i>
                  <input type="text" name="auth_code" id="auth_code" class="blue-text" value="" >
                  <label for="auth_code">Bar Code / QR Code Number</label>
                </div>
                <div class="input-field col s12">
                  <input type="hidden" name="currency" id="currency" value="AUD" />
                  <input type="hidden" name="mode" id="mode" value="run" />
                  <input type="hidden" name="merchantId" id="merchantId" value="123456" />
                  <input type="hidden" name="attach" id="attach" value="Novatel Merkpay Online Store" />
                  <input type="hidden" name="device_info" id="device_info" value="013467007045764" />
                  <input type="hidden" name="desc" id="desc" value="Novatel Premium Router" />
                  <input type="hidden" name="detail" id="detail" value="NetCube Premium Router, NBN, ADSL compatable" />
                  <input type="hidden" name="goods_tag" id="goods_tag" value="tagAT123456" />
                  <input type="hidden" name="order_amount" id="order_amount" value="123" />
                  <input type="hidden" name="out_trade_no" id="out_trade_no" value="' . $out_trade_no . '" />
                  <input type="hidden" name="transaction_id" id="transaction_id" value="" />
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light btn-large blue" type="submit" name="take_payment" id="take_payment">Take Payment</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  ';
  
  return $content;
}

function getLoading() {
  $content = '';
  
  $content .= '
    <div id="loading">
      <div class="row center">
        <div class="col s12 m12 l12">
          <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  ';
  
  return $content;
}


function getResult() {
  $content = '';
  
  $content .= '
    <div id="result">
      <div class="row center">
        <div class="col s12 m6 l6 offset-m3 offset-l3">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <h4>Secure Payment</h4>
              <h5 id="return_code" class="green-text">Succss</h5>
            </div>
            <div class="card-content">
              <div class="row">
                <h5 id="" class="">You Have Received</h3>
              </div>
              <div class="row">
                <h3 id="" class="green-text">AUD $ 1.23</h3>
              </div>
              <a class="waves-effect waves-light btn-large blue" id="refresh"><i class="material-icons left">done</i>Confirm</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  ';
  
  return $content;
}