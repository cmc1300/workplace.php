<?php

//backend interface example

require_once('quickpay_service.php');


//transaction type. refund: REFUND or purchase cancellation: CONSUME_VOID, and if the original transaction is PRE_AUTH, the backend interface also supports corresponding
//  PRE_AUTH_VOID(pre-authorization cancellation), PRE_AUTH_COMPLETE(pre-authorization completion), PRE_AUTH_VOID_COMPLETE(pre-authorization completion cancellation)
$param['transType']             = quickpay_conf::REFUND;  

$param['origQid']               = '201501131702110745872'; //qid returned by original transaction, get from database

$param['orderAmount']           =50;        //Amount of the transaction
$param['orderNumber']           = date('YmdHis') . strval(mt_rand(100, 999)); //order number, must be unique(should not be same as the original transaction)
$param['orderTime']             = date('YmdHis');   //transaction time, YYYYmmhhddHHMMSS
$param['orderCurrency']         = quickpay_conf::CURRENCY_AUS;  //transaction currency

$param['customerIp']            = $_SERVER['REMOTE_ADDR'];  //User IP
$param['frontEndUrl']           = "";    //Frontend callback URL, could be null when backend transaction
$param['backEndUrl']            = "https://www.merkpay.com.au/unionpay/back_notify.php";    //Backend callback URL



//Other parameters could be null

//submit
$pay_service = new quickpay_service($param, quickpay_conf::BACK_PAY);
$ret = $pay_service->post();


                
//Synchronous return (it means the server has received the request of the background interface), whether process is successful depends on backend notification, or active inquiry
$response = new quickpay_service($ret, quickpay_conf::RESPONSE);

if ($response->get('respCode') != quickpay_service::RESP_SUCCESS) { //error handling
    echo sprintf("Error: %d => %s", $response->get('respCode'), $response->get('respMsg')) . "<br>\n";

    exit;
}

//Subsequent processing
$arr_ret = $response->get_args();

echo "Backend transaction return:\n" . var_export($arr_ret, true); //This line is only used to test output




/* //backend interface example

echo " This is merkonline server";

require_once('quickpay_service.php');


//transaction type. refund: REFUND or purchase cancellation: CONSUME_VOID, and if the original transaction is PRE_AUTH, the backend interface also supports corresponding
//  PRE_AUTH_VOID(pre-authorization cancellation), PRE_AUTH_COMPLETE(pre-authorization completion), PRE_AUTH_VOID_COMPLETE(pre-authorization completion cancellation)
$param['transType']             = quickpay_conf::CONSUME;

//$param['origQid'] =201501101752180704502; //qid returned by original transaction, get from database

$param['orderAmount']           = 100;        //Amount of the transaction
$param['orderNumber']           = date('YmdHis') . strval(mt_rand(100, 999)); //order number, must be unique(should not be same as the original transaction)
//$param['orderNumber']=20150110175218939;
$param['orderTime']             = date('YmdHis');   //transaction time, YYYYmmhhddHHMMSS
$param['orderCurrency']         = quickpay_conf::CURRENCY_AUS;  //transaction currency

$param['customerIp']            = $_SERVER['REMOTE_ADDR'];  //User IP
$param['frontEndUrl']           = "";    //Frontend callback URL, could be null when backend transaction
$param['backEndUrl']            = "https://merkpay.com.au//unionpay/back_notify.php";    //Backend callback URL


$param["version"]="1.0.0";
$param["charset"]="UTF-8";
$param["merId"]="620003653310001";
$param["acqCode"]="";
$param["merCode"]="5331";
$param["merAbbr"]="MerkGroup Pty Ltd";
$param['signature']=quickpay_service::sign(array_merge(quickpay_conf::$pay_params_empty,
		quickpay_conf::$pay_params, $param), quickpay_conf::$sign_method);
$param['signMethod']=quickpay_conf::$sign_method;
$param['cardNumber']=6200002222222222;


//Other parameters could be null


//submit

$pay_service = new quickpay_service($param, quickpay_conf::BACK_PAY);

echo "<pre>";
var_dump($pay_service);
echo "</pre>";

$ret = $pay_service->post();



//Synchronous return (it means the server has received the request of the background interface), whether process is successful depends on backend notification, or active inquiry
$response = new quickpay_service($ret, quickpay_conf::RESPONSE);

if ($response->get('respCode') != quickpay_service::RESP_SUCCESS) { //error handling
	echo sprintf("Error: %d => %s", $response->get('respCode'), $response->get('respMsg')) . "<br>\n";

	exit;
}





//Subsequent processing
$arr_ret = $response->get_args();

echo "Backend transaction return:\n" . var_export($arr_ret, true); //This line is only used to test output */


?>
