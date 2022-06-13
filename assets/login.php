<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /home');
  }
  
  require '../database/database.php';

  if (!empty($_POST['nameuser']) && !empty($_POST['password'])) {
    $records = $conexion->prepare('SELECT id_user, nameuser, password FROM users_t WHERE nameuser = :nameuser');
    
    $records->bindParam(':nameuser', $_POST['nameuser']);
    try{
      $records->execute();
    }
    catch(PDOException $e){
      echo 'no se pudo, realizar la consulta.';
      echo $e->getMesseage;
    }
    
    $results = $records->fetch(PDO::FETCH_ASSOC);

    for( $i = 0; $i < count($results); $i++)
    {
      echo '[ ' . $i . ' ]';
    }

    $message = '';

    /* echo count($results) . '<br>';
    echo $results['id_user'] . '<br>';
    echo $results['password'] . '<br>'; */

    $array = ['lastname', 'email', 'phone'];
    var_dump(implode(",", $array)); // string(20) "lastname,email,phone"
    echo "<br>";
    
    // var_dump(implode( $results ));

    echo implode(' - ', $results );
    echo "<br>";
    echo $results['password'];
    echo "<br>";
    
    var_dump(password_verify($_POST['password'], $results['password']));

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id_user'];
      $message = 'usuario logueado.';
    } else {
      $message = 'Las credenciales no coinciden.';
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

    <?php if(!empty($message)): ?>
        <p> mensaje: <?= $message ?></p>
      <?php else: ?>
        <p>Hola Fulano</p>
    <?php endif; ?>
    
    <span> or <a href="signup.php">Sign Up</a></span>
      <div class="login-box">
        <img src="../img/Coteus Emblema.png" class="avatar" alt="Avatar Image">
        <h1>Login Here</h1>        
        <form action="login.php" method="post">
          <!-- USERNAME INPUT -->
          <label for="Username">Username</label>
          <input type="text" placeholder="Enter Username" name="nameuser">
          <!-- PASSWORD INPUT -->
          <label for="Password">Password</label>
          <input type="password" placeholder="Enter Password" name="password">
          <input type="submit" value="Log In" name="submit">
          <a href="#">Lost your Password?</a><br>
          <a href="#">Don't have An account?</a>
        </form>
      </div>
    </body>
</html>
