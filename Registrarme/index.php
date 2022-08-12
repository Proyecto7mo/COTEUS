<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }

  require '../datos/datos.php';

  $messeage = '';

  if(ValidarCampos()){  
    $consulta = insertar_empleado($_POST['name'], $_POST['surname'], $_POST['nameuser'], $_POST['password'], $_POST['email'], $_POST['telephono']);

    if ($consulta) {
      $message = require '../partials/messeages/userCreated.php';
    } else {
      $message = require '../partials/messeages/userNotCreated.php';
  }
  }

  function ValidarCampos(){
    return ( (!empty($_POST['name'])) && (!empty($_POST['surname'])) && (!empty($_POST['nameuser'])) && (!empty($_POST['password'])) && (!empty($_POST['confirm_password'])) && (!empty($_POST['email'])) && (!empty($_POST['telephono'])) );
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarme</title>
  <meta charset="UTF-8"/>
  <?php
    require("../partials/linkCSS.php");
  ?>
</head>
<body>
  <div class="Register-box">  
    <img src="img/emblema.svg" class="avatar" alt="Emblema COTEUS">
    
    <form action='index.php' method="post">
      <div class="Columns">
        <label for="Name">Nombre</label>
        <input type='text' name='name' placeholder='Nombre' require>
        <label for="Mail">Ingrese Email</label>
        <input type='email' name='email' placeholder='Email' require>
        
        <!--Capcha-->
        <label >Aqui va el captcha</label>
        
        <a href="../Login" style="color: black;">¿Tienes una cuenta?</a>
      </div>
      <div class="Columns">
        <label for="Last-Name">Apellido</label>
        <input type='text' name='surname' placeholder='Apellido' require>
        <label for="Username">Nombre de Usuario</label>
        <input type='text' name='nameuser' placeholder='Usuario' require>
        <input type="submit" value="Sign in">
      </div>
      <div class="Columns">
        <label for="Birth">Fecha de Nacimiento</label>
        <input type="date" style="color: rgb(53, 50, 50);">
        <label for="Password">Contraseña</label>
        <input type='password' name='password' require>
        <label for="confirm_password">Repita Contraseña</label>
        <input type='confirm_password' name='confirm_password' require>
        <label for="number">Telefono</label>
        <input type='number' name='telephono' placeholder='Celular' require>
      </div> 
    </form>
  </div>

  <?php
    require '../partials/HTML/footer/footer.php';
  ?>
</body>
</html>
