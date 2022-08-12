<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }

  require '../database/database.php';

  $message = '';

  if (!empty($_POST['nameuser']) && !empty($_POST['password'])) {
    $records = $conexion->prepare('SELECT id_user, nameuser, password FROM users_t WHERE nameuser = :nameuser');
    $records->bindParam(':nameuser', $_POST['nameuser']);
    
    $records->execute();
    
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (count($results) > 0 && $_POST['password'] == $results['password']) {
      $_SESSION['user_id'] = $results['id_user'];
      header("Location: ../Home");
    } else {
      $message = 'las credenciales no matchean';
    }
  }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8"/>
        <?php
          require '../partials/linkCSS.php'
        ?>
    </head>
    <body>

      <p>
        <?= $message ?>
      </p>
      
        <div class="login-box">
            <img src="img/emblemaBlanco.svg" class="avatar" alt="Avatar Image">
            <h1>Login Here</h1>
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
