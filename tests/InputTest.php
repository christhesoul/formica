<?php
class InputTest extends PHPUnit_Framework_TestCase
{
  public function test_construct(){
    // Arrange
    $input = new \Formica\Input('my_email','Email');
    $another_input = new \Formica\Input('my_address','Address','textarea',false);
    
    // Assert
    $this->assertEquals($input->name, 'my_email');
    $this->assertEquals($input->label, 'Email');
    $this->assertEquals($input->input_type, 'text');
    $this->assertTrue($input->required);
    
    $this->assertEquals($another_input->input_type, 'textarea');
    $this->assertFalse($another_input->required);
  }
}