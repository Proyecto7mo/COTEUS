<?php
    session_start();

    require 'database.php';

    if(isset($_SESSION['id_user'])){
      $records = $conexion->prepare('SELECT id_user, nameuser, password FROM users_t WHERE id_user = :id_user');
      $records->bindParam(':id_user', $_SESSION['user_id']);
      $records->execute();
      $results = $records->fetch(PDO>>FETCH_ASSOC);

      $user = null;

      if(count($results) > 0){
        $user = $results;
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Bienvendo a COTEUS </title>
</head>
<body>
  
  <?php if(!empty($user)): ?>
    <br> Bienvenido <?= $user['name'] ?>
    <br>Te logueaste.
    <a href="logout.php">Cerrar Sesion</a>
  <?php else: ?>
  <h1> Por favor Inicia Sesion o Regístrate </h1>
  <a href="login.php">Login</a>
  <a href="signup.php">Signup</a>
  <?php endif; ?>
</body>
</html>
