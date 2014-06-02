<?php
class FormicaMail {
  
  private $to;
  private $subject;
  private $message;
  private $headers;
  private $success;
  
  public function set_to($email){
    $this->to = $email;
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
  
  public function send_it(){
    $this->success = wp_mail($this->to, $this->subject, $this->message, $this->headers = NULL);
  }
  
  public function sent_successfully(){
    return $this->success;
  }
  
}