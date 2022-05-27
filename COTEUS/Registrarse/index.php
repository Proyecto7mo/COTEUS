<?php
  require '../assets/database.php';

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
      $message = 'Usuario creado';
    } else {
      $message = 'ERROR: usuario no creado';
    }
  }

  function ValidarCampos(){
    return ( (!empty($_POST['name'])) && (!empty($_POST['surname'])) && (!empty($_POST['nameuser'])) && (!empty($_POST['password'])) && (!empty($_POST['email'])) && (!empty($_POST['telephono'])) );
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>COTEUS | Registro</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="style-LogOn.css">
        <link rel="stylesheet" href="style-register.css">
        <link rel="icon" type="image/svg" href="../Recurses/Coteus_Emblema.svg">
    </head>
    <body>
        <div class="Register-box">
            <img src="../Recurses/Coteus_Logo_Azul.svg" class="avatar">
            <h2>Registro</h2>
            <form action="" method="post">
                <div class="Columns">
                    <label for="Name">Nombre</label><br>
                    <input type="text">
                    <label for="Mail">Correo electr&oacute;nico</label><br>
                    <input type="email">
                    <!--Capcha-->
                    <img id="captcha" src="../Recurses/e12e.png">
                </div>
                <div class="Columns">
                    <label for="Last-Name">Apellido</label><br>
                    <input type="text">
                    <label for="Username">Nombre de usuario</label><br>
                    <input type="text">
                    <br><br><br><br><br>
                    <input type="text">
                    <br><br><br><br><br><br>
                    <input class="butca" type="submit" value="Crear cuenta">
                </div>
                <div class="Columns">
                    <label for="Birth">Fecha de nacimiento</label><br>
                    <input type="date" style="color: rgb(53, 50, 50);">
                    <label for="Password">Contraseña</label><br>
                    <input type="password">
                    <br>
                    <button class="bcb" onclick="volver()">Volver</button>
                    <script type="text/javascript">
                          function volver(){
                         location.href = "../LogIn/LogIn.html";
                         }
                    </script>
                </div>
            </form>
        </div>
    </body>
</html>
