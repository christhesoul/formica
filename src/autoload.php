<?php
function FormicaAutoload($class) {
  $classfile = dirname(__FILE__) . '/' . str_replace('\\', '/', $class) . '.php';
  if(file_exists($classfile)){
    require_once $classfile;
  }
}

spl_autoload_register('FormicaAutoload');