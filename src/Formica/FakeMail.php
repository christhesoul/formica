<?php
namespace Formica;

class FakeMail {
  
  private $success;
  
  function __construct(){
    $this->success = true;
  }
  
  public function sent_successfully(){
    return $this->success;
  }
  
}