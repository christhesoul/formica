<div class="form-group <?php if($this->has_errors()) echo 'has-error has-feedback'; ?>">
  <label for="<?= $this->name ?>" class="col-sm-3 control-label"><Your name><?= $this->label ?></label>
  <div class="col-sm-9">
    <input name="<?= $this->name ?>" type="text" class="form-control" value="<?= $this->posted_value ?>">
    <?php if($this->hint): ?>
      <p class="help-block"><?= $this->hint ?></p>
    <?php endif; ?>
    <?php if($this->has_errors()): ?>
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      <?php foreach($this->errors as $error_msg): ?>
        <p class="help-block"><?php echo $error_msg ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>