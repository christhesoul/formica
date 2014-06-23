<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Formica Example</title>
  <!-- load Boostrap for styling, useful but not essential -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>This is my form</h1>
    <hr>
    <?php
    require_once('src/autoload.php');
    $inputs = array(
      new \Formica\Input(
        array(
          'name' => 'title',
          'label' => 'Title'
        )
      ),
      new \Formica\Input(
        array(
          'name' => 'description',
          'label' => 'Description',
          'input_type' => 'textarea'
        )
      ),
      new \Formica\Input(
        array(
          'name' => 'quality',
          'label' => 'Quality',
          'input_type' => 'select',
          'select_options' => array(
            'good' => 'Good',
            'bad' => 'Bad',
            'ugly' => 'Ugly'
          )
        )
      ),
      new \Formica\Input(
        array(
          'name' => 'sign_up',
          'label' => 'surname',
          'input_type' => 'checkbox',
          'required' => false
        )
      )
    );

    $form = new \Formica\Form($inputs,array('action' => '/formica/example.php'));
    $form->render_all();
    ?>
  </div>
</body>
</html>