<?php
  
  // http://api.netcube.com.au/projects/netcube/sms/api/?username=boson.huang&apiKey=hKrYuHof4HWYoQCO46lGBtITanaczg==&senderId=Boson&recipient=0430583951&message=asdasd
  
  set_time_limit(0);
  
  date_default_timezone_set('Australia/Melbourne');
  
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  
  require_once 'config.php';
  
  
  // echo json_encode($customer);
  
  extract($_REQUEST);
  
  if(!isset($username) || empty($username)) {
    echo fieldEmptyError('username');
    die();
  }
  
  if(!isset($apiKey) || empty($apiKey)) {
    echo fieldEmptyError('apiKey');
    die();
  }
  
  if(!isset($senderId) || empty($senderId)) {
    echo fieldEmptyError('senderId');
    die();
  }
  
  if(!isset($recipient) || empty($recipient)) {
    echo fieldEmptyError('recipient');
    die();
  }
  
  if(!isset($message) || empty($message)) {
    echo fieldEmptyError('message');
    die();
  }
  
  
  
  if(checkAPIKey($apiKey)) {
    
    $decodedString = decode($apiKey);
    $decodedString = explode(':', $decodedString);
    
    $username = $decodedString[0];
    $password = $decodedString[1];
    
    $user = getUserInfo($username, $password);
    
    if(!$user) {
      echo fieldNotFoundError('user');
      die();
    }
    
    $sms_gateway = getSMSGateway();
    
    // echo json_encode($sms_gateway);
    
    $send_array = array(
      'senderId'  => $senderId,
      'recipient' => $recipient,
      'message'   => $message
    );
    
    sendSMS($sms_gateway, $send_array);
    
  } else {
    echo fieldNotMatchError('apiKey');
    die();
  }
  
  
  
  
  function fieldEmptyError($field) {
    $error_message = array(
      'result'  => 'error',
      'message' => $field . ' is missing'
    );
    
    return json_encode($error_message);
  }
  
  function fieldNotMatchError($field) {
    $error_message = array(
      'result'  => 'error',
      'message' => $field . ' is wrong'
    );
    
    return json_encode($error_message);
  }
  
  function fieldNotFoundError($field) {
    $error_message = array(
      'result'  => 'error',
      'message' => $field . ' not found'
    );
    
    return json_encode($error_message);
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
  
  function getUserInfo($username, $password) {
    
    $db = initDB(DB_NAME);
    
    $db->where('username', $username);
    $db->where('password', $password);
    $result = $db->get('sms_users');
    
    return (!empty($result)) ? $result : FALSE;
    
  }
  
  function getSMSGateway() {
    
    $db = initDB(DB_NAME);
    
    $result = $db->get('sms_gateways', 1);
    
    return (!empty($result)) ? $result[0] : FALSE;
    
  }
  
  
  function sendSMS($gateway, $sendArray) {
    
    $username = urlencode($gateway['username']);
    $password = urlencode($gateway['password']);
    $api_id   = urlencode($gateway['apiId']);
    $senderId = urlencode($sendArray['senderId']);
    $to       = urlencode($sendArray['recipient']);
    $message  = urlencode($sendArray['message']);
    
    $call_url = $gateway['url'] . '?';
    $call_url .= 'user=' . $username;
    $call_url .= '&password=' . $password;
    $call_url .= '&api_id=' . $api_id;
    $call_url .= '&from=' . $senderId;
    $call_url .= '&to=' . $to;
    $call_url .= '&text=' . $message;
    $call_url .= '&callback=7';

    // echo $call_url;
    echo file_get_contents($call_url);
    
  }
  