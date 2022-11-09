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
  </head>
  <body>

    <p>
      <?php if($_POST) include $message ?>
    </p>
    
    <div class="login-box">
      <img src="img/emblemaBlanco.svg" class="avatar" alt="Avatar Image">
      <h1>Inicio de sesión</h1>
      <form action="index.php" method="post" autocomplete="off">
        <!-- USERNAME INPUT -->
        <label for="Username">Email</label>
        <input type="text" placeholder="Ingrese Usuario" name="email">
        <!-- PASSWORD INPUT -->
        <label for="Password">Contraseña</label>
        <input type="password" placeholder="Ingrese Contraseña" name="password">
        <input type="submit" value="Log In">
        <a href="#">¿No recuerdas tu Contraseña?</a><br>
        <a href="../Registrarme/">¿No tienes una Cuenta?</a>
      </form>
      </div>
  </body>

  <?php
    require '../partials/HTML/footer/footer.php';
  ?>

</html>
