<?php
class FormTest extends PHPUnit_Framework_TestCase
{
    public function test_form_has_correct_default_options()
    {
        // Arrange
        $form = new \Formica\Form(
          array(
            new \Formica\Input('my_email','Email')
          )
        );
        // Assert
        $this->assertEquals($form->method, 'post');
        $this->assertEquals($form->action, '/');
    }
}