<?php
namespace Formica;

class Form {
  
  public $inputs;
  
  function __construct($inputs){
    $this->inputs = $inputs;
  }
  
  public function render_all(){
    include realpath(__DIR__ . '/../views/all.php');
  }
  
  public function render_form(){
    include realpath(__DIR__ . '/../views/form.php');
  }
  
  public function render_success(){
    include realpath(__DIR__ . '/../views/success.php');
  }
  
  public function process($post){
    foreach($this->inputs as $input){
      $input->process($post);
    }
  }
  
  public function has_errors(){
    $errors = false;
    foreach($this->inputs as $input){
      if($input->has_errors()) {
        $errors = true;
      }
    }
    return $errors;
  }
  
  public function data_for_email(){
    $message = '';
    foreach($this->inputs as $input){
      $message.= $input->label . ': ' . $input->nice_posted_value() . "\r\n";
    }
    return $message;
  }
  
}
?>