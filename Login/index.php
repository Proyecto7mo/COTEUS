<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }

  require "../class/employee.php";
  
  if($_POST){
    $nameuser_input = $_POST['nameuser'];
    $password_input = $_POST['password'];
    $message = "";
    
    $employee = new employee("nombne_n_n", "apellido_n_n", $nameuser_input, "email_n_@_n", $password_input, "00-0000-0000", 0);
    $record = $employee->get();

    if($record){
      // si el registro existe quiere decir que solo el nameuser_input esta registrado porque se obtiene el
      // registro a traves del nameuser_input, pero falta verificar la contraseña

      if(password_verify($employee->password, $record['password'])){
        $_SESSION['user_id'] = $record['id_user'];
        $message = '../partials/messeages/userLoged.php';
        header("Location: ../Home");
      }else{
        $message = '../partials/messeages/userNotLoged.php';
      }
    }
    else{
      $message = '../partials/messeages/userNotLoged.php';
    }
  }

?>

<!DOCTYPE html>

<html>
    <head>
        <title>COTEUS | Inicio de sesión</title>
	      <link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
        <meta charset="UTF-8"/>
        <?php
          require '../partials/linkCSS.php'
        ?>
    </head>
    <body>

        <div class="login-box">
            <img src="../img/COTEUS_Emblema_Azul.svg" class="logo">
            
            <div>
              <p class="title">Inicio de sesión</p>
            </div>

            <form action="index.php" method="post" autocomplete="off" id="form">
              <!-- USERNAME INPUT -->
              <label for="Username">Usuario</label>
              <input class="txtspace" type="text" name="nameuser" id="Iname">
              <p class="alert">Usuario y/o contraseña incorrectos</p>
              <!-- PASSWORD INPUT -->
              <label for="Password">Contraseña</label>
              <input class="txtspace" type="password" name="password" id="Ipsw">
              <p class="alert">Usuario y/o contraseña incorrectos</p>
                <br>
                <br>
                    <input type="checkbox" id="password_view" onclick="HideShow()"/>
                    <span id="checktext">Mostrar contraseña</span>
              <div>
                <input type="submit" class="buttons" value="Iniciar sesión" id="submit"></input>
              </div>
            </form>
            <div class="altern">
              <br>
              <br>
              <button onclick="window.location.href='../'" class="buttons">Volver</button>
              <a href="#">¿No recuerdas tu contraseña?</a>
              <br>
              <a href="../Registrarme/">¿No tienes una cuenta?</a>
              </div>
          </div>


    <?php
      require '../partials/HTML/footer/footer.php';
    ?>
          
    <script src="js/script.js"></script>
  
    </body>
</html>
