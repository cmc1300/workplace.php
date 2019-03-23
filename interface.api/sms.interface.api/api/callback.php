<?php
  
  set_time_limit(0);
  
  date_default_timezone_set('Australia/Melbourne');
  
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  
  require __DIR__ . '/config.php';
  require __DIR__ . '/vendor/autoload.php';
  
  
  // echo json_encode($customer);
  
  // extract($_REQUEST);
  
  if(isset($_REQUEST)) {
    
    /* write to local log text file */
    $file = 'callback.txt';
    $current = file_get_contents($file);
    
    // generating each records
    $current .= date('l jS \of F Y h:i:s A') . "\r\n";
    $current .= '==========================================' . "\r\n";
    foreach($_REQUEST as $index => $value) {
      
      $current .= $index . ': ' . $value . "\r\n";
      
    }
    $current .= '==========================================' . "\r\n\r\n";
    
    file_put_contents($file, $current);
    
    
    
    /* write to database */
    extract($_REQUEST);
    // $date = new DateTime("$timestamp");
    
    $db = $db = initDB(DB_NAME);
    $data_insert = array(
      'id'        => '',
      'api_id'    => $api_id,
      'apiMsgId'  => $apiMsgId,
      'cliMsgId'  => $cliMsgId,
      // 'timestamp' => $date->format('Y-m-d H:i:s'),
      'timestamp' => gmdate('Y-m-d H:i:s', $timestamp),
      'timezone'  => 'GMT',
      'to'        => $to,
      'from'      => $from,
      'status'    => $status,
      'charge'    => number_format($charge, 2)
    );
    
    $id = $db->insert('sms_callback', $data_insert);
  }