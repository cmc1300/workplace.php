		<?php
		$amount = number_format(round(0.01*100)/100,2);
		$params = array("amount" => $amount, 
						"cardexp" => '01/15',
						"invoiceid" => date('YmdHis',time()),
						"invoiceref" => "weixinpay_",
						"cardnum" =>'4067426108271551' ,
						"cc_bsbnumber"=>'',
						"cc_accountnumber"=>'',
						"cc_accountname"=>'',
						);	
	$payment_result=cc_capture($params);
	print_r($payment_result);
function cc_capture($params) {
	
	$timestamp = strftime("%Y%d%m%H%M%S000000%z");
	$amount = number_format($params['amount']*100,0,'','');
	
	$xml = new SimpleXMLElement('<SecurePayMessage />');
	
	$messageInfo = $xml->addChild('MessageInfo');
	$messageInfo->addChild('messageID', md5("NovaTel_" . $params['invoiceref']));
	$messageInfo->addChild('messageTimestamp', $timestamp);
	$messageInfo->addChild('timeoutValue', 60);
	$messageInfo->addChild('apiVersion', 'xml-4.2');

	$merchantInfo = $xml->addChild('MerchantInfo');
	$merchantInfo->addChild('merchantID', 'NTN00');
$merchantInfo->addChild('password', '27r2fjjy');
	
	$xml->addChild('RequestType', 'Payment');
	
	$payment = $xml->addChild('Payment');
	
	$txnList = $payment->addChild('TxnList');
	$txnList->addAttribute('count', 1);

	$txn = $txnList->addChild('Txn');
	$txn->addAttribute('ID', 1);
	$txn->addChild('txnType', 0);
	$txn->addChild('txnSource', 23);
	$txn->addChild('amount', $amount);
	$txn->addChild('currency', "AUD");
	$txn->addChild('purchaseOrderNo', "mp_"  . $params['invoiceid']);
	
	$cardInfo = $txn->addChild('CreditCardInfo');
	$cardInfo->addChild('cardNumber', $params['cardnum']);
	$cardInfo->addChild('expiryDate', $params['cardexp']);
	
	
	$gatewayData = $xml->asXML();


	$ch = curl_init("https://api.securepay.com.au/xmlapi/payment");

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $gatewayData);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);


	$result = curl_exec($ch);

	
	$log = array("status"=>"", "message"=>"", "txnid"=>"");
	echo $result;
	echo "no:" . curl_errno($ch);
	die();
	
	if(curl_errno($ch)) {
		$log['status'] = "fail";
		$log['message'] = "Connection Error";
		return $log;
	}
	else {

		$result_xml = new SimpleXMLElement($result);
		$txn_response = $result_xml->xpath('//Txn[@ID=1]');
		$txn_response = $txn_response[0];

		
		if (strtolower($txn_response->approved) == "yes") {
			$log['status'] = "success";
			$log['message'] = "Amount: " . $params['amount'];
			$log['txnid'] = strtolower($txn_response->txnID);
			return $log;
		} elseif (strtolower($txn_response->approved) == "no") {
			$log['status'] = "fail";
			$log['message'] = "NOT Approved by SecurePayAU";
        	return $log;
    	} else {
			$log['status'] = "fail";
			$log['message'] = "Error Occured";
			return $log;
		}
		
	}

}

function send_email_to_admin ($subject, $message)
{
	//$to = "billing@webnova.com.au";
//	$header = "From: billing@webnova.com.au" . "\r\n" .
//		"Reply-To: billing@webnova.com.au" . "\r\n";
$to = "zy.shulei@gmail.com";
$header = "From:billing@webnova.com.au" . "\r\n" ."Reply-To: zy.shulei@gmail.comf" . "\r\n";
	@mail($to, $subject, $message, $header);
	
	return;
}
?>
