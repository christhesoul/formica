<?php
class FormTest extends PHPUnit_Framework_TestCase
{
  public function test_construct(){
    // Arrange
    $form = new \Formica\Form(
      array(
        new \Formica\Input('my_email','Email')
      )
    );
    // Assert
    $this->assertCount(1, $form->inputs);
  }
  
  public function test_process_options()
  {
    // Arrange
    $form = new \Formica\Form(
      array(
        new \Formica\Input('my_email','Email')
      )
    );
    $form_without_defaults = new \Formica\Form(
      array(
        new \Formica\Input('my_email','Email')
      ),
      array(
        'method' => 'get'
      )
    );
    // Assert
    $this->assertEquals($form->method, 'post');
    $this->assertEquals($form->action, '/');
    $this->assertEquals($form_without_defaults->method, 'get');
  }
  
  public function test_process()
  {
    // Arrange
    $input = $this->getMockBuilder('\Formica\Input',array('process'))->disableOriginalConstructor()->getMock();
    $form = new \Formica\Form(array($input));
    
    // Set Expecations
    $input->expects($this->once())->method('process')->with($post);

    // Try to meet expectations
    $form->process($post);
  }
  
  public function test_has_errors()
  {
    // Create a stub for the Input class.
    $input = $this->getMockBuilder('\Formica\Input',array('process'))->disableOriginalConstructor()->getMock();
    $form = new \Formica\Form(array($input));

    // Configure the input stub.
    $input->expects($this->any())->method('has_errors')->will($this->returnValue(true));

    // Assert
    $this->assertTrue($form->has_errors());
  }
  
  
}