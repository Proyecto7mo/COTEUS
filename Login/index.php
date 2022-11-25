<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
  header('Location: ../Home');
  }

  require "../class/employee.php";
  
  if($_POST){
  $email_input = $_POST['email'];
  $password_input = $_POST['password'];
  $message = "";
  
  $employee_record = employee::login($email_input, $password_input);

  if($employee_record){
    
    $_SESSION['user_id'] = $employee_record['id_employee'];
    $message = '../partials/messages/userLoged.php';
    header("Location: ../Home");
  }
  else{
    $message = '../partials/messages/userNotLoged.php';
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

  <!--<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
    />-->
    <link rel="stylesheet" href="styles/bootstrap.min.css">

    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body>

  <div class="login-box">
      <img src="../img/COTEUS_Emblema_Azul.svg" class="logo">
      
      <div>
        <p class="title">Inicio de sesión</p>
      </div>

      <form action="index.php" method="post" autocomplete="off" id="form">
        <!-- USERNAME INPUT -->
        <!-- USERNAME INPUT -->
        <label for="Username" class="textform">E-mail</label>
        <input class="txtspace" type="text" name="email" id="Iname">
        <p class="alert">Usuario y/o contraseña incorrectos</p>
        <!-- PASSWORD INPUT -->
        <label for="Password" class="textform">Contraseña</label>
        <input class="txtspace" type="password" name="password" id="Ipsw">
        <p class="alert">Usuario y/o contraseña incorrectos</p>
          <br>
          <br>
            <input type="checkbox" id="password_view" onclick="HideShow()"/>
            <span id="checktext">Mostrar contraseña</span>
        <div>
          <input type="submit" class="buttons" id="submit" value="Iniciar sesión"></input>
        </div>
      </form>
        <div class="altern">
          <br>
          <br>
          <button onclick="window.location.href='../'" class="buttons">Volver</button>
          <a class="links" href="#">¿No recuerdas tu contraseña?</a>
          <br>
          <a class="links" href="../Registrarme/">¿No tienes una cuenta?</a>
        </div>
      </div>
  <?php
    //require '../partials/HTML/footer/footer.php';
  ?>
      
  <script src="js/main.js"></script>
  </body>

  <?php
  require '../partials/HTML/footer/footer.php';
  ?>

</html>
