<?php

class quickpay_conf
{

    const VERIFY_HTTPS_CERT = false;

    static $timezone        = "Pacific/Auckland"; //time zone
    static $sign_method     = "MD5"; //signature algorithm, only md5 supported now (2011-08-22)

   	//static $security_key    = "VGffPpN7MzYO"; //merchant encryption key

  	static $security_key    = "88888888";
    //the pre-defined fields of payment request
    static $pay_params  = array(
        'version'       => '1.0.0',
        'charset'       => 'UTF-8', //UTF-8, GBK
        'merId'         => '620003653310001', //for merchant
        'acqCode'       => '',  //for acquirer
        'merCode'       => '5331',  //for acquirer
        'merAbbr'       => 'MerkGroup',
    );

    //* Test environment
    static $front_pay_url   = "http://202.82.58.122:5555/DPGW/MerchantSrv/Payment.action";
    static $back_pay_url    = "http://202.82.58.122:5555/DPGW/MerchantSrv/AutoPayment.action";
    static $query_url       = "http://202.82.58.122:5555/DPGW/MerchantSrv/Query.action";
    
    //production environment
/* 	 static $front_pay_url   = "https://dopp.dynamicg.com/DPGW/MerchantSrv/Payment.action";
    static $back_pay_url    = "https://dopp.dynamicg.com/DPGW/MerchantSrv/AutoPayment.action";
    static $query_url       = "https://dopp.dynamicg.com/DPGW/MerchantSrv/Query.action"; */
    
    //

    
    const FRONT_PAY = 1;
    const BACK_PAY  = 2;
    const RESPONSE  = 3;
    const QUERY     = 4;

    const CONSUME                = "01";
    const CONSUME_VOID           = "31";
    const PRE_AUTH               = "02";
    const PRE_AUTH_VOID          = "32";
    const PRE_AUTH_COMPLETE      = "03";
    const PRE_AUTH_VOID_COMPLETE = "33";
    const REFUND                 = "04";
    const REGISTRATION           = "71";

    const CURRENCY_AUS      = "036";

    //payment request fields could be null (but must complete)
    static $pay_params_empty = array(
        "origQid"           => "",
        "acqCode"           => "",
        "merCode"           => "",
        "commodityName"     => "",
        "transTimeout"      => "300000",
        "merReserved"       => "",
    );

    //required fields check of payment request
    static $pay_params_check = array(
        "version",
        "charset",
        "transType",
        "origQid",
        "merId",
        "merAbbr",
        "acqCode",
        "merCode",
        "commodityName",
        "orderNumber",
        "orderAmount",
        "orderCurrency",
        "orderTime",
        "customerIp",
        "transTimeout",
        "frontEndUrl",
        "backEndUrl",
        "merReserved",
    );

/*     //required fields check of inquiry request
    static $query_params_check = array(
        "version",
        "charset",
        "transType",
        "merId",
        "commodityName",
        "orderNumber",
        "orderTime",
        "merReserved",
    ); */

    //required fields check of inquiry request
    static $query_params_check = array(
    		"version",
    		"charset",
    		"transType",
    		"merId",
    		"orderNumber",
    		"orderTime",
    		"merReserved",
    );
    //possible merchant reserved fields
    static $mer_params_reserved = array(
    //  NEW NAME            OLD NAME
        "cardNumber",       "pan",
        "cardPasswd",       "password",
        "credentialType",   "idType",
        "cardCvn2",         "cvn",
        "cardExpire",       "expire",
        "credentialNumber", "idNo",
        "credentialName",   "name",
        "phoneNumber",      "mobile",
        "merAbstract",

        //tdb only
        "orderTimeoutDate",
        "origOrderNumber",
        "origOrderTime",
    );

    static $notify_param_check = array(
        "version",
        "charset",
        "transType",
        "respCode",
        "respMsg",
        "respTime",
        "merId",
        "merAbbr",
        "orderNumber",
        "traceNumber",
        "traceTime",
        "qid",
        "orderAmount",
        "orderCurrency",
        "settleAmount",
        "settleCurrency",
        "settleDate",
        "exchangeRate",
        "exchangeDate",
        "cupReserved",
        "signMethod",
        "signature",
    );

    static $sign_ignore_params = array(
        "bank",
    );
}

?>
