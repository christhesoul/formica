<form class="form-horizontal" role="form" action="<?php echo home_url('/register/'); ?>" method="post">
  
  <?php
  foreach($this->inputs as $input){
    $input->render_input();
  }
  ?>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-default">Submit request</button>
    </div>
  </div>
</form>