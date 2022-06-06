<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  
  require 'database.php';

  if (!empty($_POST['nameuser']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_user, nameuser, password FROM users_t WHERE nameuser = :nameuser');
    $records->bindParam(':nameuser', $_POST['nameuser']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id_user'];
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>COTEUS | Inicio de sesi&oacute;n</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style-LogIn.css">
        <link rel="icon" type="image/svg" href="../Recurses/Coteus_Emblema.svg">
    </head>
    <body>
        
        <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
        
        <div class="login-box">
            <img src="../Recurses/Coteus_Emblema.png" class="avatar">
            <h1>Inicio de sesi&oacute;n</h1>
            <form action="login.html" method="post">
              <!-- USERNAME INPUT -->
              <label for="Username">Usuario</label>
              <input type="text" name="nameuser">
              <!-- PASSWORD INPUT -->
              <label for="Password">Contrase&ntilde;a</label>
              <input type="password" name="password">
              <input type="submit" name="submit" value="Iniciar sesión">
              <a href="#">¿Olvidaste tu contrase&ntilde;a?</a><br>
              <a href="../Registrarse/index.php">¿No tienes una cuenta?</a>
            </form>
          </div>
    </body>
</html>
