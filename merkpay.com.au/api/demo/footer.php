    </div>
  </body>
  <script>
    $(document).ready(function() {
      var logoBlock        = $("#logoRow");
      var productBlock     = $("#product");
      var paymentFormBlock = $("#paymentForm");
      var processFormBlock = $("#processForm");
      var loadingBlock     = $("#loading");
      var resultBlock      = $("#result");
      var submitForm       = $("#submitForm");
      
      // productBlock.hide();
      paymentFormBlock.hide();
      processFormBlock.hide();
      loadingBlock.hide();
      resultBlock.hide();
      
      var productBtn       = $("#product_btn");
      var confirmBtn       = $("#confirm_btn");
      var takePaymentBtn   = $("#take_payment");
      var refreshBtn       = $("#refresh");
      
      
      $(productBtn).on("click", function() {
        productBlock.hide();
        paymentFormBlock.fadeIn("slow");
      });
      
      $(confirmBtn).on("click", function() {
        paymentFormBlock.hide();
        processFormBlock.fadeIn("slow");
      });
      
      // $(takePaymentBtn).on("click", function() {
      $(submitForm).on("submit", function(e) {
        e.preventDefault();
        processFormBlock.hide();
        loadingBlock.show();
        
        var auth_code        = $("#auth_code");
        var currency         = $("#currency");
        var mode             = $("#mode");
        var merchantId       = $("#merchantId");
        var attach           = $("#attach");
        var device_info      = $("#device_info");
        var desc             = $("#desc");
        var detail           = $("#detail");
        var goods_tag        = $("#goods_tag");
        var order_amount     = $("#order_amount");
        var out_trade_no     = $("#out_trade_no");
        var transaction_id   = $("#transaction_id");

        
        var dataField = {
          auth_code      : auth_code.val(),
          currency       : currency.val(),
          mode           : mode.val(),
          merchantId     : merchantId.val(),
          attach         : attach.val(),
          device_info    : device_info.val(),
          desc           : desc.val(),
          detail         : detail.val(),
          goods_tag      : goods_tag.val(),
          order_amount   : order_amount.val(),
          out_trade_no   : out_trade_no.val(),
          transaction_id : transaction_id.val()
        };
        
        $.ajax ({
          method   : "POST",
          url      : "./process.php",
          datatype : "JSON",
          data     : {
            data : dataField
          },
          success  : function(response) {
            console.log(response);
          }
        });
      });
    });
  </script>
</html>

