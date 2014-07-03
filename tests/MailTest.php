<?php
class MailTest extends PHPUnit_Framework_TestCase
{  
  public function test_construct(){
    // Arrange
    $mailer = new \Formica\Mail('abc123');
    
    // Assert
    $this->assertEquals('abc123',PHPUnit_Framework_Assert::readAttribute($mailer,'mandrill_api_key'));
  }
  
  public function test_to_field_array(){
    // Arrange
    $mailer = new \Formica\Mail('abc123',
      array(
        'to_name'=>'Team Condiment',
        'to_email'=>'chris@wearecondiment.com'
      )
    );
    $multi_mailer = new \Formica\Mail('abc123',
      array(
        'to_name'=>'Team Condiment',
        'to_email'=>'chris@wearecondiment.com,james@wearecondiment.com'
      )
    );
    
    // Assert
    $to_array = array(
      array(
        'type' => 'to',
        'name' => 'Team Condiment',
        'email' => 'chris@wearecondiment.com'
      )
    );
    $multi_to_array = array(
      array(
        'type' => 'to',
        'name' => 'Team Condiment',
        'email' => 'chris@wearecondiment.com'
      ),
      array(
        'type' => 'to',
        'name' => 'Team Condiment',
        'email' => 'james@wearecondiment.com'
      )
    );
    
    $this->assertEquals($to_array, $mailer->to_field_array());
    $this->assertEquals($multi_to_array, $multi_mailer->to_field_array());
  }
}