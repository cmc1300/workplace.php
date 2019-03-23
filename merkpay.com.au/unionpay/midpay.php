<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php 

require_once('quickpay_service.php');

if(isset($_REQUEST['orderAmount'])){
	
	$param['transType']             = quickpay_conf::CONSUME;  //transaction type, CONSUME or PRE_AUTH
	
	$param['orderAmount']           = $_REQUEST['orderAmount']*100;        //Amount of the transaction (1000 = 10.00)
	
	// $param['orderNumber']           = date('YmdHis') . strval(mt_rand(100, 999)); //order number, must be unique
	
	$param['orderNumber']           = date('YmdHis') . strval(mt_rand(100, 999));
	$param['orderTime']             = date('YmdHis');   //transaction time, YYYYmmhhddHHMMSS
	$param['orderCurrency']         = quickpay_conf::CURRENCY_AUS;  //transaction currency
	$param['customerIp']            = $_SERVER['REMOTE_ADDR'];  //User IP
	$param['frontEndUrl']           = "https://merkpay.com.au/unionpay/front_notify.php";    //Frontend callback URL
	$param['backEndUrl']            = "https://merkpay.com.au/unionpay/back_notify.php";    //Backend callback URL
	
	$param['merAbbr']="Netcube Telecommunication";
	$param['commodityName']='TESTER';
	$param['cardNumber']='6222023602899998371';
	//$param['orderTimeoutDate']=$param['orderTime'] +300;
	file_put_contents('post2.txt', var_export($param, true));
	$pay_service = new quickpay_service($param, quickpay_conf::FRONT_PAY);
	//add by indika
	$re=$pay_service->post();
	file_put_contents('post.txt', var_export($re, true));
	var_dump($re);
	
	//$response = new quickpay_service($re, quickpay_conf::RESPONSE);
	
	//var_dump($response);
	
	
	
	
/* 	$html = <<<eot

    <form id="pay_form" name="pay_form" action="{$pay_service->api_url}" method="post">
	
eot;
	foreach ($pay_service->args as $key => $value) {
		$html .= " <input type=\"hidden\" name=\"{$key}\" id=\"{$key}\" value=\"{$value}\" /><br>\n";
	}
	$html .= <<<eot
    <input id="send" type="submit">
    </form>

eot;
	header("Content-Type: text/html; charset=" . quickpay_conf::$pay_params['charset']);
	
	echo $html; */
	
	
	
}else{
	
	echo "Order Amount can not be empty";
}



?>

<script src="//code.jquery.com/jquery-latest.min.js"></script>
<script>
$(document).ready(function(){
    //$('#foo').submit(ajax);
    $('#send').trigger("click");
});
/* function ajax(){
        $.ajax({
            url : 'front2.php',
            type : 'POST',
            data : $('#foo').serialize(),
            success: function(data){
               // $('#resultado').html(data);
                alert("Success");
            }
        });
        return false;
} */

</script>

</body>
</html>