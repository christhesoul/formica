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
  
  
}