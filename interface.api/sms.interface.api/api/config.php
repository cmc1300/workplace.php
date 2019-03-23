<?php

  // include_once __DIR__ . '/../../../includes/config.php';
  
  
  define('DB_NAME', 'BANKING');
  define('AUTH_TOKEN', 'Zkzw1k5_jrDVvDy49e5FXOGrVbXrMbKbRcNCEHAtpFrh1TzLjIHnGCBV3ah1Kq0vqMcxY');
  
  
  // mysql connection to banking server AUCPANEL 09
  $servername_banking = '103.26.62.207';
  $username_banking   = 'bankingn_jerry';
  $password_banking   = 'u_b2z_y5wHEK';
  $dbname_banking     = 'bankingn_netcubeHub';
  define('DB_HOST_BANKING'    , $servername_banking);
  define('DB_USERNAME_BANKING', $username_banking);
  define('DB_PASSWORD_BANKING', $password_banking);
  define('DB_DATABASE_BANKING', $dbname_banking);
  
  
  // function to initial db connection
  function initDB($serverName) {
 
    $db = new MysqliDb(
      constant('DB_HOST_' . $serverName),
      constant('DB_USERNAME_' . $serverName),
      constant('DB_PASSWORD_' . $serverName),
      constant('DB_DATABASE_' . $serverName)
    );
 
    return $db;
 
  }
 
  // function to get table fileds
  function readFields($db, $tableName) {
 
    $result = $db->get($tableName, 1);
 
    $return = array();
    foreach($result[0] as $index => $value) {
      $return[] = $index;
    }
 
    return $return;
  }
  
  
  function debug() {
    $trace     = debug_backtrace();
    $rootPath  = dirname(dirname(__FILE__));
    $file      = str_replace($rootPath, '', $trace[0]['file']);
    $line      = $trace[0]['line'];
    $var       = $trace[0]['args'][0];
    $lineInfo  = sprintf('<div><strong>%s</strong> (line <strong>%s</strong>)</div>', $file, $line);
    $debugInfo = sprintf('<pre>%s</pre>', print_r($var, true));
    print_r($lineInfo.$debugInfo);
  }