<?php
function FormicaAutoload($class) {
  $classfile = dirname(__FILE__).'/classes/'.strtolower($class).'.php';
  if(file_exists($classfile)){
    include $classfile;
  }
} // function TFSLAutoload
spl_autoload_register('FormicaAutoload'); 