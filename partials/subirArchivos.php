<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servidor</title>
</head>
<body>
  <p>
    var_dump($_POST['formData']) = <?= var_dump($_POST['formData']); ?>
  </p>
  <br>
  <p>
    var_dump($_REQUEST['formData']) =  <?= var_dump($_REQUEST['formData']); ?>
  </p>
</body>
</html>
<?php

?>
