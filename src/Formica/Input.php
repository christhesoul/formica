<?php
namespace Formica;

class Input {
  
  public $name;
  public $label;
  public $input_type;
  public $posted_value;
  public $errors;
  
  function __construct($name, $label, $input_type = 'text', $required = true){
    $this->name = (string) $name;
    $this->label = (string) $label;
    $this->input_type = (string) $input_type;
    $this->required = (boolean) $required;
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
  
}