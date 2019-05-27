<?php

  require __DIR__ . '/../includes/classes/PHPMailerAutoload.php';
  
  
  class email {
    
    protected $mail;
    
    protected $email_from;
    protected $name_from;
    
    protected $email_send;
    protected $name_send;
    
    protected $email_subject;
    protected $email_body;
    
    protected $result;
    
    
    public function __construct() {
      $this->mail = new PHPMailer;
    }
    
    
    /* MAIL OBJECT OPERATIONS */
    public function setFrom($email_from, $name_from) {
      $this->mail->setForm($email_from, $name_from);
    }
    
    public function addAddress($email_from, $name_from) {
      $this->mail->addAddress($email_from, $name_from);
    }
    
    public function setSubject($email_subject) {
      $this->mail->Subject = $email_subject;
    }
    
    public function setBody($email_body) {
      $this->mail->Body = $email_body;
    }
    
    public function send() {
      if(!$this->mail->send()) {
        return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
      } else {
        return 'OK';
      }
    }
    
    
    /* EMAIL CLASS OPERATIONS */
    public function setEmailForm($email_from) {
      $this->email_from = $email_from;
    }
    
    public function setNameFrom($name_from) {
      $this->name_from = $name_from;
    }
    
    public function setEmailSend($email_send) {
      $this->email_send = $email_send;
    }
    
    public function setNameSend($name_send) {
      $this->name_send = $name_send;
    }
    
    public function setEmailSubject($email_subject) {
      $this->email_subject = $email_subject;
    }
    
    public function setEmailBody($email_body) {
      $this->email_body = $email_body;
    }
    
  }
  
  