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
      <title>Login</title>
      <meta charset="UTF-8"/>
      <link rel="stylesheet" href="../style-login.css">
    </head>
    <body>

    <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
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
