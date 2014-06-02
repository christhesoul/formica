<?php
$this->process($_POST);

//debug print_r($this);

if(!$this->has_errors() && $_POST):
  $this->render_success();
else:
  $this->render_form();
endif;