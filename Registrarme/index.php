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
<html>
  <head>
    <title>Register</title>
    <meta charset="UTF-8"/>
    
    <?php
      require("../partials/linkCSS.php");
    ?>
    
  </head>
  <body>
    <div class="Register-box">
        
        <?php
          require("../partials/linkCSS.php");
        ?>

    </head>
    <body>
        <div class="Register-box">  
          <img src="img/emblema.svg" class="avatar" alt="Emblema COTEUS">
          
          <form action='index.php' method="post">
            <div class="Columns">
              <label for="Name">Nombre</label><br>
              <input type='text' name='name' placeholder='Nombre' require><br>
              <label for="Mail">Ingrese Email</label><br>
              <input type='email' name='email' placeholder='Email' require>
              
              <!--Capcha-->
              <label >Aqui va el captcha</label>
              <br><br><br><br><br><br>
              <a href="../Login" style="color: black;">¿Tienes una cuenta?</a><br>
            </div>
            <div class="Columns">
              <label for="Last-Name">Apellido</label><br>
              <input type='text' name='surname' placeholder='Apellido' require><br>
              <label for="Username">Nombre de Usuario</label><br>
              <input type='text' name='nameuser' placeholder='Usuario' require>
              
              <br><br><br><br>

              <input type="submit" value="Sign in">
            </div>
            <div class="Columns">
              <label for="Birth">Fecha de Nacimiento</label><br>
              <input type="date" style="color: rgb(53, 50, 50);"><br>
              <label for="Password">Contraseña</label><br>
              <input type='password' name='password' require>
              <label for="confirm_password">Repita Contraseña</label>
              <input type='confirm_password' name='confirm_password' require>
              <label for="number">Telefono</label>
              <input type='number' name='telephono' placeholder='Celular' require>
            </div> 
          </form>
        </div>
  </body>
</html>
</body>
</html>
