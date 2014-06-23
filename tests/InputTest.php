<?php
class InputTest extends PHPUnit_Framework_TestCase
{
  public function test_construct(){
    // Arrange without constructor
    $classname = '\Formica\Input';
    $input = $this->getMockBuilder($classname)->disableOriginalConstructor()->getMock();
    // Set expectations
    $input->expects($this->once())->method('process_options')->with($options);
    // Meet expectations
    $reflectedClass = new ReflectionClass($classname);
    $constructor = $reflectedClass->getConstructor();
    $constructor->invoke($input, $options);
  }
  
  public function test_process_options(){
    // Arrange
    $input = new \Formica\Input(
      array(
        'name' => 'my_email',
        'label' => 'Email'
      )
    );
    $another_input = new \Formica\Input(
      array(
        'name' => 'my_address',
        'label' => 'Address',
        'input_type' => 'textarea',
        'required' => false
      )
    );
    
    // Assert
    $this->assertEquals($input->name, 'my_email');
    $this->assertEquals($input->label, 'Email');
    $this->assertEquals($input->input_type, 'text');
    $this->assertTrue($input->required);
    
    $this->assertEquals($another_input->input_type, 'textarea');
    $this->assertFalse($another_input->required);
  }
}