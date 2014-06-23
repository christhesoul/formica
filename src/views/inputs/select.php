<div class="form-group <?php if($this->has_errors()) echo 'has-error has-feedback'; ?>">
  <label for="<?= $this->name ?>" class="col-sm-3 control-label"><Your name><?= $this->label ?></label>
  <div class="col-sm-9">
    <select name="<?= $this->name ?>" class="form-control">
      <?php foreach($this->select_options as $option_value => $option_text): ?>
        <option value="<?= $option_value ?>" <?= $this->is_selected_option($option_value); ?>><?= $option_text ?></option>
      <?php endforeach; ?>
    </select>
    <?php if($this->has_errors()): ?>
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      <?php foreach($this->errors as $error_msg): ?>
        <p class="help-block"><?php echo $error_msg ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>