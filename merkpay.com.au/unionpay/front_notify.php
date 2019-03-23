<?php

require_once('quickpay_service.php');
//require_once (dirname ( __FILE__ ) . "/config.php");

//add by indika 
/* session_start();
$myconn=mysql_connect("localhost","tenpayco_db","tenpayco_db");
mysql_select_db("tenpayco_db",$myconn);
mysql_query("SET NAMES 'utf8'"); */

try {
    $response = new quickpay_service($_POST, quickpay_conf::RESPONSE); //original
    if ($response->get('respCode') != quickpay_service::RESP_SUCCESS) {
        $err = sprintf("Error: %d => %s", $response->get('respCode'), $response->get('respMsg'));
        throw new Exception($err);
    }
    $arr_ret = $response->get_args(); 
    echo "Order {$arr_ret['orderNumber']} payment success";
    //notify the user transaction completed
/*     echo "<pre>";
    print_r($arr_ret);
    echo "</pre>";
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
   
    
    /* adding data to the database by indika 
    $amount=round(($arr_ret['orderAmount']/100),2);
    
    if($myconn){
    
    	$sql = "INSERT INTO `tp_transaction_t` (
		`merchat_id`,
		`item_id`,
		`item_desc`,
		`amount`,
		`card_number`,
		`card_name`,
		`created_date`,
		`order_status`,
		`payment_status`,
		`invoice_number`
		)
		VALUES
		(
		'" . $arr_ret ['merAbbr'] . "',
		'" . 0 . "',
		'" . $arr_ret ['orderNumber'] . "',
		'" . $amount . "',
		'" . $arr_ret ['cardNumber'] . "',
		'" . "TESTER" . "',
		'" . date("Y-m-d H:i:s")  . "',
		'" . 1 . "',
		'" . 1 . "',
		'" . 0 . "'	)";
    
    	$result = mysql_query($sql, $myconn) or die(mysql_error()); */
    
   // }

}
catch(Exception $exp) {
    $str .= var_export($exp, true);
    die("error happend: " . $str);
}

?>
