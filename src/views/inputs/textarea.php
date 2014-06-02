<div class="form-group <?php if($this->has_errors()) echo 'has-error has-feedback'; ?>">
  <label for="inputEmail3" class="col-sm-3 control-label"><?= $this->label ?></label>
  <div class="col-sm-9">
    <textarea name="<?= $this->name ?>" class="form-control" id="inputEmail3" rows="5"><?php if(isset($_POST['trade_description']))  echo $_POST['trade_description'];?></textarea>
    <?php if($this->has_errors()): ?>
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      <?php foreach($this->errors as $error_msg): ?>
        <p class="help-block"><?php echo $error_msg ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>