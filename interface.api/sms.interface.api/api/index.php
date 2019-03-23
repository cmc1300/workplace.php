<?php

  set_time_limit(0);
  
  date_default_timezone_set('Australia/Melbourne');
  
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  
  require __DIR__ . '/config.php';
  require __DIR__ . '/vendor/autoload.php';
  
  use Clickatell\Api\ClickatellRest;
  use Ideea\Unicode\Unicode;
  
  extract($_REQUEST);
  
  
  /* 
   * Main Function
  */
  if(checkAPIKey($apiKey)) {
    
    $decodedString = decode($apiKey);
    $decodedString = explode(':', $decodedString);
    
    $d_username = $decodedString[0];
    $d_password = $decodedString[1];
    
    
    if($d_username === $username) {
      $user = getUserInfo($username, $d_password);      
    }
    
    if(!$user) {
      $error_message = array(
        'result'  => 'error',
        'message' => 'username wrong or does not exist'
      );
      
      echo json_encode($error_message);
      die();
    }
    
    $unicode_message = unicode_encode($message);
    $send_array = array(
      'senderId'  => $senderId,
      'recipient' => $recipient,
      'message'   => $unicode_message
    );
    
    /* var_dump($unicode_message);
    die(); */
    sendSMS($send_array);
    
  } else {
    $error_message = array(
      'result'  => 'error',
      'message' => 'Wrong API Key'
    );
    
    echo json_encode($error_message);
  }
  
  
  
  function decode($encodedString) {
    $secretKey    = '!NetCube_*(';
    $secretVector = 'hoGQkfuQgPp6X53m';
    
    $decodedString = base64_decode($encodedString);
    $decodedString = mcrypt_decrypt(
      MCRYPT_RIJNDAEL_128,
      md5($secretKey),
      $decodedString,
      MCRYPT_MODE_CFB,
      $secretVector
    );
    
    return $decodedString;
  }
  
  function checkAPIKey($apiKey) {
    
    $db = initDB(DB_NAME);
    
    $db->where('apiKey', $apiKey);
    $result = $db->get('sms_userAPI');
    
    return (!empty($result)) ? TRUE : FALSE;
    
  }
  
  function getUserInfo($uname, $pws) {
    
    $db = initDB(DB_NAME);
    
    $db->where('username', $uname);
    $db->where('password', $pws);
    $result = $db->get('sms_users');
    
    return (!empty($result)) ? $result : FALSE;
    
  }
  
  function getSMSGateway() {
    
    $db = initDB(DB_NAME);
    
    $result = $db->get('sms_gateways', 1);
    
    return (!empty($result)) ? $result[0] : FALSE;
    
  }
  
  function validUser() {
    
  }
  
  function unicode_encode($message) {
    $message = iconv('UTF-8', 'UCS-2', $message);
    $len = strlen($message);
    $str = '';
    
    for($i = 0; $i < $len - 1; $i = $i + 2) {
      $c  = $message[$i];
      $c2 = $message[$i + 1];

      $prefix = (string)base_convert(ord($c2), 10, 16);
      $suffix = (string)base_convert(ord($c), 10, 16);

      if(ord($c) >= 0) {
        // 两个字节的文字
        if(empty($prefix)) {      
          // $prefix = '0' . $prefix;
          $prefix = str_pad($prefix, 2, '00', STR_PAD_LEFT);
        }
        
        if(empty($suffix)) {
          $suffix = str_pad($suffix, 2, '00', STR_PAD_RIGHT);
        }
        
        $str .= $prefix . $suffix;
      
      }else {
        $str .= $c2;
      }
      
      /* var_dump( ord($c) . ' ' . ord($c2) );
      var_dump( $prefix . ' ' . $suffix ); */
    }
    
    return html_entity_decode($str);
  }
  
  /* 
   * @variable array
  */
  function sendSMS($send_array) {
  
    $clickatell = new ClickatellRest(AUTH_TOKEN);
    $clickatell->secure(true);
    
    /* 
     * function sendMessage($to, $message, $extra = array())
    */
    $extra = array(
      'from'     => $send_array['senderId'],
      'unicode'  => 1,
      'callback' => 7
    );
    $response = $clickatell->sendMessage(
      array($send_array['recipient']),
      $send_array['message'],
      $extra
    );

    echo json_encode($response);
  }
  