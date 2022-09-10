<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }

  require "../class/employee.php";
  
  $nameuser_input = $_POST['nameuser'];
  $password_input = $_POST['password'];
  $message = "";
  
  $employee = new employee("n/n", "n/n", $nameuser_input, "nn@nn", $password_input, "00-0000-0000", 0);
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
  }else{
    $message = '../partials/messeages/userNotLoged.php';
  }

  /* require '../database/database.php';
  $message = '';

  if (!empty($_POST['nameuser']) && !empty($_POST['password'])) {
    $records = $conexion->prepare('SELECT id_user, nameuser, password FROM employees_t WHERE nameuser = :nameuser');
    $records->bindParam(':nameuser', $_POST['nameuser']);
    
    $records->execute();
    
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id_user'];
      $message = '../partials/messeages/userLoged';
      header("Location: ../Home");
    } else {
      $message = '../partials/messeages/userNotLoged';
    }
  } */
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
        <?php echo include $message ?>
      </p>
      
        <div class="login-box">
            <img src="img/emblemaBlanco.svg" class="avatar" alt="Avatar Image">
            <h1>Inicio de sesión</h1>
            <form action="index.php" method="post" autocomplete="off">
              <!-- USERNAME INPUT -->
              <label for="Username">Usuario</label>
              <input type="text" placeholder="Ingrese Usuario" name="nameuser">
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
