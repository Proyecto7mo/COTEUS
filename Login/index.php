<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }
  


  require '../database/database.php';

  if (!empty($_POST['nameuser']) && !empty($_POST['password'])) {
    $records = $conexion->prepare('SELECT id_user, nameuser, password FROM users_t WHERE nameuser = :nameuser');
    $records->bindParam(':nameuser', $_POST['nameuser']);
    
    $records->execute();
    
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id_user'];
      header("Location: ../Home");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="styles/main.css">
    </head>
    <body>

      <p>
        <?= $message ?>
      </p>
      
        <div class="login-box">
            <img src="img/emblemaBlanco.svg" class="avatar" alt="Avatar Image">
            <h1>Login Here</h1>
            <form action="index.php" method="post">
              <!-- USERNAME INPUT -->
              <label for="Username">Username</label>
              <input type="text" placeholder="Enter Username">
              <!-- PASSWORD INPUT -->
              <label for="Password">Password</label>
              <input type="password" placeholder="Enter Password">
              <input type="submit" value="Log In">
              <a href="#">Lost your Password?</a><br>
              <a href="../Registrarme/">Don't have An account?</a>
            </form>
          </div>
    </body>
</html>