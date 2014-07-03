<?php
namespace Formica;

class Form {
  
  public $inputs;
  public $action;
  public $method;
  public $validate_human;
  public $validate_human_field;
  public $validate_human_char;
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
    $this->submitted_by_human();
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
  
  public function set_human_validation_field($input_name, $character, $hint){
    $this->validate_human = true;
    $this->validate_human_field = $input_name;
    $this->validate_human_char = $character;
    $this->create_anti_spam_input($hint);
  }
  
  public function create_anti_spam_input($hint){
    $anti_spam_input = new \Formica\Input(
      array(
        'name' => 'human_check',
        'label' => 'Anti-spam check'
      )
    );
    $anti_spam_input->set_hint($hint);
    $this->inputs[] = $anti_spam_input;
  }
  
  public function get_input($input_name){
    $result = array_filter(
      $this->inputs,
      function($input) use ($input_name){
        return $input->name == $input_name;
      }
    );
    return reset($result);
  }
  
  public function submitted_by_human(){
    $human_field = $this->get_input($this->validate_human_field);
    if($human_field->posted_value){
      if($human_field->posted_value[($this->validate_human_char - 1)] == $_POST['human_check']){
        return true;
      } else {
        $anti_spam_field = $this->get_input('human_check');
        $anti_spam_field->errors[] = 'That is incorrect';
        return false;
      }
    }
  }
  
}
?>