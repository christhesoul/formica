<?php
class FormTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultOptions()
    {
        // Arrange
        $form = new \Formica\Form(
          array(
            new \Formica\Input('my_email','Email')
          )
        );

        // Assert
        $this->assertEquals($form->method, 'post');
    }
}