<?php

  class user {
    
    public $id;
    public $username;
    public $password;
    public $apiKey;
    public $senderId;
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
    public $credit;
    
    public $db;
    
    public function __CONSTRUCT($db_connection = null) {
      
      $this->db = $db_connection;
      
    }
    
    public function setUsername($username) {
      $this->username = $username;
    }
    
    public function setPassword($password) {
      $this->password = $password;
    }
    
    public function setApiKey($apiKey) {
      $this->apiKey = $apiKey;
    }
    
    public function setSenderId($senderId) {
      $this->senderId = $senderId;
    }
    
    public function setFirstName($firstName) {
      $this->firstName = $firstName;
    }
    
    public function setLastName($lastName) {
      $this->lastName = $lastName;
    }
    
    public function setPhone($phone) {
      $this->phone = $phone;
    }
    
    public function setEmail($email) {
      $this->email = $email;
    }
    
    public function setAddress($address) {
      $this->address = $address;
    }
    
    public function setSuburb($suburb) {
      $this->suburb = $suburb;
    }
    
    public function setState($state) {
      $this->state = $state;
    }
    
    public function setPostcode($postcode) {
      $this->postcode = $postcode;
    }
    
    public function setCountry($country) {
      $this->country = $country;
    }
    
    public function setStatus($status) {
      $this->status = $status;
    }
    
    public function setCredit($credit) {
      $this->credit = $credit;
    }
    
    
    /* 
     * GET FUNCTIONS
    */
    public function getUser($userId) {
      
    }
    
    
    /* 
     * ACTION FUNCTIONS
    */
    public function validateAPI($apiKey) {
      
      if(!empty($apiKey)) {
        
        $this->db->where('apiKey', $apiKey);
        $result = $db->get('sms_users');
        
        if(!empty($result))
          return TRUE;
        else {
          $error_message = array(
            'result'  => 'error',
            'message' => 'API key invalid'
          );
          
          return json_encode($error_message);
        }
        
      } else {
        
        $error_message = array(
          'result'  => 'error',
          'message' => 'API key missing'
        );
        
        return json_encode($error_message);
        
      }
      
    }
    
    public function validateUser($apiKey) {
      
      if(!empty($apiKey)) {
        
        $this->db->where('apiKey', $apiKey);
        $result = $db->get('sms_users');
        
        if(!empty($result))
          return TRUE;
        else {
          $error_message = array(
            'result'  => 'error',
            'message' => 'API key invalid'
          );
          
          return json_encode($error_message);
        }
        
      } else {
        
        $error_message = array(
          'result'  => 'error',
          'message' => 'API key missing'
        );
        
        return json_encode($error_message);
        
      }
    }
    
    
  }