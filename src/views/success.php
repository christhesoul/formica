<?php
$email = new \Formica\FakeMail();
if($email->sent_successfully()):
?>
  <div class="alert alert-success">
    <strong>Success!</strong> We'll be in touch very soon.
  </div>
<?php else: ?>
  <div class="alert alert-warning">
    <strong>Hmmm.</strong> You didn't do anything wrong, but it looks like we're having some problems sending that data to our servers. Sorry about that.
  </div>
<?php endif; ?>