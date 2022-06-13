<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }

  require '../database/database.php';

  $messeage = '';

  if(ValidarCampos()){
    $sql = "INSERT INTO users_t (name, surname, nameuser, password, email, telephono) VALUES (:name, :surname, :nameuser, :password, :email, :telephono)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':surname', $_POST['surname']);
    $stmt->bindParam(':nameuser', $_POST['nameuser']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':telephono', $_POST['telephono']);

    if ($stmt->execute()) {
      $message = '<script> alert("USUARIO CREADO"); </script>';
    } else {
      $message = '<script> alert("ERROR: usuario no creado"); </script>';
    }
  }

  function ValidarCampos(){
    return ( (!empty($_POST['name'])) && (!empty($_POST['surname'])) && (!empty($_POST['nameuser'])) && (!empty($_POST['password'])) && (!empty($_POST['email'])) && (!empty($_POST['telephono'])) );
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
            
            <img src="img/emblema.svg" class="avatar" alt="Emblema COTEUS">
            
            <form action='index.php' method="post">
                <div class="Columns">
                    <label for="Name">Name</label><br>
                    <input type='text' name='name' placeholder='nombre' require><br>
                    <label for="Mail">Enter Email</label><br>
                    <input type='email' name='email' placeholder='email' require>
                    
                    <!--Capcha-->
                    <label >Aqui va el captcha</label>
                    <br><br><br><br><br><br>
                    <a href="../Login" style="color: black;">Do you have an account?</a><br>
                </div>
                <div class="Columns">
                    <label for="Last-Name">Last Name</label><br>
                    <input type='text' name='surname' placeholder='apellido' require><br>
                    <label for="Username">Username</label><br>
                    <input type='text' name='nameuser' placeholder='nombre de usuario' require>
                    
                    <br><br><br><br>

                    <input type="submit" value="Sign in">
                </div>
                <div class="Columns">
                    <label for="Birth">Date of Birth</label><br>
                    <input type="date" style="color: rgb(53, 50, 50);"><br>
                    <label for="Password">Password</label><br>
                    <input type='password' name='password' require>
                    <label for="confirm_password">Repita Password</label>
                    <input type='confirm_password' name='confirm_password' require>
                    <label for="number">Telefono</label>
                    <input type='number' name='telephono' placeholder='celular' require>
                </div>
            </form>
        </div>
    </body>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

</html>
</body>
</html>
