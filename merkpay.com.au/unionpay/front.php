<?php

//frontend interface example

require_once('quickpay_service.php');

$param['transType']             = quickpay_conf::CONSUME;  //transaction type, CONSUME or PRE_AUTH

$param['orderAmount']           = 10;        //Amount of the transaction (1000 = 10.00)

// $param['orderNumber']           = date('YmdHis') . strval(mt_rand(100, 999)); //order number, must be unique

$param['orderNumber']           = date('YmdHis') . strval(mt_rand(100, 999));
$param['orderTime']             = date('YmdHis');   //transaction time, YYYYmmhhddHHMMSS
$param['orderCurrency']         = quickpay_conf::CURRENCY_AUS;  //transaction currency
$param['customerIp']            = $_SERVER['REMOTE_ADDR'];  //User IP
$param['frontEndUrl']           = "https://merkpay.com.au/unionpay/front_notify.php";    //Frontend callback URL
$param['backEndUrl']            = "https://merkpay.com.au/unionpay/back_notify.php";    //Backend callback URL

$param['merAbbr']="Netcube Telecommunication";
$param['commodityName']='TESTER';
//$param['orderTimeoutDate']=$param['orderTime'] +300;

$pay_service = new quickpay_service($param, quickpay_conf::FRONT_PAY);


$html = <<<eot
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset={$pay_service->args['charset']}" />
</head>
<body>
    <form id="pay_form" name="pay_form" action="{$pay_service->api_url}" method="post">

eot;
        foreach ($pay_service->args as $key => $value) {
            $html .= "  {$key}:  <input type=\"text\" name=\"{$key}\" id=\"{$key}\" value=\"{$value}\" /><br>\n";
        }
        $html .= <<<eot
    <input type="submit">
    </form>
</body>
</html>
eot;




header("Content-Type: text/html; charset=" . quickpay_conf::$pay_params['charset']);
echo $html;

?>
