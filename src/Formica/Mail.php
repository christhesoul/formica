<?php
namespace Formica;

class Mail {
  
  private $mandrill_api_key;
  private $from_name;
  private $from_email;
  private $to_name;
  private $to_email;
  private $subject;
  private $message;
  private $headers;
  private $success;
  
  function __construct($mandrill_api_key){
    $this->mandrill_api_key = $mandrill_api_key;
  }
  
  public function set_from_name($name){
    $this->from_name = $name;
  }
  
  public function set_from_email($email){
    $this->from_email = $email;
  }
  
  public function set_to_name($name){
    $this->to_name = $name;
  }
  
  public function set_to_email($email){
    $this->to_email = $email;
  }
  
  function set_subject($subject){
    $this->subject = $subject;
  }
  
  function set_message($message){
    $this->message = $message;
  }
  
  function set_headers($headers){
    $this->headers = $headers;
  }
  
  function mandrill_message_array(){
    $message = array(
      'from_name' => $this->from_name,
      'from_email' => $this->from_email,
      'subject' => $this->subject,
      'text' => $this->message,
      'to' => array(
        array(
          'type' => 'to',
          'name' => $this->to_name,
          'email' => $this->to_email
        )
      )
    );
    return $message;
  }
  
  public function send_it(){
    try {
      $mandrill = new \Mandrill($this->mandrill_api_key);
      $result = $mandrill->messages->send($this->mandrill_message_array(), false);
      if($result == 'sent'){
        $this->success = true;
      }
      return $result;
    } catch(Mandrill_Error $e) {
      // Mandrill errors are thrown as exceptions
      echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
      // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
      throw $e;
    }
  }
  
  public function sent_successfully(){
    return $this->success;
  }
  
}