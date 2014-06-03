<?php
namespace Formica;

class Form {
  
  public $inputs;
  public $action;
  public $method;
  private $success_path;
  
  function __construct($inputs, $options = array()){
    $this->inputs = $inputs;
    $this->process_options($options);
  }
  
  public function process_options($options){
    $defaults = array(
      'action' => '/',
      'method' => 'post'
    );
    $options = array_merge($defaults, $options);
    foreach($options as $k => $option){
      $this->$k = $option;
    }
  }
  
  public function render_all(){
    include realpath(__DIR__ . '/../views/all.php');
  }
  
  public function render_form(){
    include realpath(__DIR__ . '/../views/form.php');
  }
  
  public function render_success(){
    include $this->success_path;
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