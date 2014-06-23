<?php
namespace Formica;

class Input {
  
  public $name;
  public $label;
  public $input_type;
  public $posted_value;
  public $required;
  public $select_options;
  public $errors;
  
  function __construct($options = array()){
    $this->process_options($options);    
  }
  
  public function process_options($options){
    $defaults = array(
      'name' => '',
      'label' => '',
      'input_type' => 'text',
      'required' => true,
      'select_options' => array()
    );
    $options = array_merge($defaults, $options);
    foreach($options as $k => $option){
      $this->$k = $option;
    }
  }
  
  public function render_input(){
    include realpath(__DIR__ . '/../views/inputs/' . $this->input_type . '.php');
  }
  
  public function process($raw_post){
    if(isset($raw_post[$this->name])){
      $this->clean_and_set_post($raw_post[$this->name]);
      $this->check_for_errors();
    }
  }
  
  public function clean_and_set_post($input){
    $search = array(
      '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
      '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
      '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
      '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
    return $this->posted_value = $output;
  }

  public function nice_posted_value(){
    if($this->input_type == 'checkbox'){
      return $this->posted_value ? 'yes' : 'no';
    } else {
      return $this->posted_value;
    }
  }
  
  public function check_for_errors(){
    if($this->posted_value == ''){
      $this->errors[] = 'Cannot be blank';
    }
  }
  
  public function has_errors(){
    if(empty($this->errors)){
      return false;
    } else {
      return true;
    }
  }
  
  public function is_selected_option($value){
    if($this->posted_value == $value){
      return 'selected';
    }    
  }
  
}