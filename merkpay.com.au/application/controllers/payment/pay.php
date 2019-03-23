<?php
// $amount = number_format(round(0.01*100)/100,2);
/* Capacha code here */
require_once ('./secure/recaptchalib.php');
class Pay extends CI_Controller {
	public function index() {
		$privatekey = "6LeLT-0SAAAAABflRGxWbobI181CKkEYTJ3Q1FnG";
		$resp = recaptcha_check_answer ( $privatekey, $_SERVER ["REMOTE_ADDR"], $_POST ["recaptcha_challenge_field"], $_POST ["recaptcha_response_field"] );
		if (! $resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly
			// die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
			// "(reCAPTCHA said: " . $resp->error . ")");
			echo '
			<script language="javascript">
			 document.location.href = "error.php";
			</script> ';
		}
		session_start ();
		$_SESSION ['amount'] = $_SESSION ['amount'];
		$_SESSION ['companyid'] = $_SESSION ['companyid'];
		$_SESSION ['wechatid'] = $_SESSION ['wechatid'];
		$_SESSION ['itemid'] = $_SESSION ['itemid'];
		$year = $_REQUEST ['expireyear'];
		$y = substr ( $year, - 2 );
		$params = array (
				"amount" => $_SESSION ['amount'],
				// "cardexp" => '01/15',
				"cardexp" => $_REQUEST ['expireMonth'] . '/' . $y,
				"invoiceid" => date ( 'YmdHis', time () ),
				"invoiceref" => "weixinpay_",
				// "cardnum" =>'4067426108271551' ,
				"cardnum" => $_REQUEST ['credit'],
				"cc_bsbnumber" => '',
				"cc_accountnumber" => '',
				"cc_accountname" => '' 
		);

		
		
		
		// echo $_REQUEST['expireMonth'].'/'.$y;die();
		//$payment_result = cc_capture ( $params );
		$this->load->view ( 'dashboard', $ret );
	}
	
	// print_r($payment_result);
	function cc_capture($params) {
		$timestamp = strftime ( "%Y%d%m%H%M%S000000%Z" );
		$amount = number_format ( $params ['amount'] * 100, 0, '', '' );
		$xml = new SimpleXMLElement ( '<SecurePayMessage />' );
		$messageInfo = $xml->addChild ( 'MessageInfo' );
		$messageInfo->addChild ( 'messageID', md5 ( "NovaTel_" . $params ['invoiceref'] ) );
		$messageInfo->addChild ( 'messageTimestamp', $timestamp );
		$messageInfo->addChild ( 'timeoutValue', 60 );
		$messageInfo->addChild ( 'apiVersion', 'xml-4.2' );
		
		$merchantInfo = $xml->addChild ( 'MerchantInfo' );
		$merchantInfo->addChild ( 'merchantID', 'NTN0024' );
		$merchantInfo->addChild ( 'password', '27r2fjjy' );
		
		$xml->addChild ( 'RequestType', 'Payment' );
		
		$payment = $xml->addChild ( 'Payment' );
		
		$txnList = $payment->addChild ( 'TxnList' );
		$txnList->addAttribute ( 'count', 1 );
		
		$txn = $txnList->addChild ( 'Txn' );
		$txn->addAttribute ( 'ID', 1 );
		$txn->addChild ( 'txnType', 0 );
		$txn->addChild ( 'txnSource', 23 );
		$txn->addChild ( 'amount', $amount );
		$txn->addChild ( 'currency', "AUD" );
		$txn->addChild ( 'purchaseOrderNo', "weixinpay_" . $params ['invoiceid'] );
		
		$cardInfo = $txn->addChild ( 'CreditCardInfo' );
		$cardInfo->addChild ( 'cardNumber', $params ['cardnum'] );
		$cardInfo->addChild ( 'expiryDate', $params ['cardexp'] );
		
		$gatewayData = $xml->asXML ();
		
		$ch = curl_init ( "https://api.securepay.com.au/xmlapi/payment" );
		
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $gatewayData );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 60 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		@curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		
		$result = curl_exec ( $ch );
		
		$log = array (
				"status" => "",
				"message" => "",
				"txnid" => "" 
		);
		file_put_contents ( "./domuser.xml", $gatewayData );
		var_dump ( $gatewayData );
		print_r ( $gatewayData );
		echo $result;
		echo "no:" . curl_errno ( $ch );
		die ();
		
		if (curl_errno ( $ch )) {
			$log ['status'] = "fail";
			$log ['message'] = "Connection Error";
			return $log;
		} else {
			
			$result_xml = new SimpleXMLElement ( $result );
			$txn_response = $result_xml->xpath ( '//Txn[@ID=1]' );
			$txn_response = $txn_response [0];
			
			if (strtolower ( $txn_response->approved ) == "yes") {
				// $amount = number_format(round(0.01*100)/100,2);
				$log ['status'] = "success";
				$log ['message'] = "Amount: " . $params ['amount'];
				$log ['txnid'] = strtolower ( $txn_response->txnID );
				header ( 'location:success.php' );
				$subject = "weixinpay_cc";
				$message = "用户您好，感谢您订购了我们的产品，您已经成功支付了$" . $params ['amount'];
				send_email_to_admin ( $subject, $message );
			} elseif (strtolower ( $txn_response->approved ) == "no") {
				$log ['status'] = "fail";
				$cvv = $_REQUEST ['cvv'];
				$log ['message'] = "NOT Approved by SecurePayAU";
				header ( 'location:error.php' );
				$subject = "weixinpay_cc";
				$message = "您的订购过程产生错误，支付失败，请重试" . "\n" . "cardexp:" . $params ['cardexp'] . "\n" . "cardm:" . $params ['cardnum'] . "\n" . "cvv:" . $cvv . "\n" . "failreason:" . $log ['message'];
				send_email_to_admin ( $subject, $message );
				// return $log;
			} else {
				$log ['status'] = "fail";
				$cvv = $_REQUEST ['cvv'];
				$log ['message'] = "Error Occured";
				header ( 'location:error.php' );
				$subject = "weixinpay_cc";
				$message = "您的订购过程产生错误，支付失败，请重试" . "\n" . "cardexp:" . $params ['cardexp'] . "\n" . "cardm:" . $params ['cardnum'] . "\n" . "cvv:" . $cvv . "\n" . "failreason:" . $log ['message'];
				send_email_to_admin ( $subject, $message );
			}
		}
	}
	function send_email_to_admin($subject, $message) {
		// $to = "billing@webnova.com.au";
		// $header = "From: billing@webnova.com.au" . "\r\n" .
		// "Reply-To: billing@webnova.com.au" . "\r\n";
		$to = "zy.shulei@gmail.com";
		$header = "From:billing@webnova.com.au" . "\r\n" . "Reply-To: zy.shulei@gmail.com" . "\r\n";
		@mail ( $to, $subject, $message, $header );
		// $to = "1355711020@qq.com";
		// $header = "From:billing@webnova.com.au" . "\r\n" ."Reply-To: 1355711020@qq.com" . "\r\n";
		// @mail($to, $subject, $message, $header);
		return;
	}
}
?>
