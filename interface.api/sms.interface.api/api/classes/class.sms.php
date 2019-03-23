<?php
  
  require_once 'config.php';
  
  class sms {
    
    // databse connection
    public $db_name;
    
    // databse sms_users
    public $userId;
    public $username;
    public $password;
    public $senderID;
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $address;
    public $suburb;
    public $state;
    public $postcode;
    public $country;
    public $status;
    
    // databse sms_userAPI
    public $apiKey;
    
    // databse sms_messages
    public $recipient;
    public $date;
    public $message;
    public $pages;
    public $status;
    public $units;
    public $ip;
    public $comment;
    
    public function __CONSTRUCT($db_name) {
    }
    
    public function setDBName($db_name) {
      $this->db_name = $db_name;
    }
    public function setUserId($userId) {
      $this->userId = $userId;
    }
    public function setUserId($username) {
      $this->userId = $userId;
    }
    public function setUserId($password) {
      $this->userId = $userId;
    }
    public function setUserId($senderID) {
      $this->userId = $userId;
    }
    public function setUserId($firstName) {
      $this->userId = $userId;
    }
    public function setUserId($phone) {
      $this->userId = $userId;
    }
    public function setUserId($email) {
      $this->userId = $userId;
    }
    public function setUserId($address) {
      $this->userId = $userId;
    }
    public function setUserId($suburb) {
      $this->userId = $userId;
    }
    public function setUserId($state) {
      $this->userId = $userId;
    }
    public function setUserId($postcode) {
      $this->userId = $userId;
    }
    public function setUserId($status) {
      $this->userId = $userId;
    }
    
    
    
    public function decode($encodedString) {
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
    
    public function checkAPIKey($apiKey) {
      
      $db = initDB($this->db_name);
      
      $db->where('apiKey', $apiKey);
      $db->get('sms_userAPI');
      
    }
  }