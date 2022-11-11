<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }

  $messeage = '';

  if($_POST)
  if(validate_fields()){
    require '../class/employee.php';
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telephono = $_POST['telephono'];
    $cuil = $_POST['cuil'];

    $employee = new employee($name, $surname, $username, $email, $password, $telephono, $cuil);
    if($employee->signup() > 0){

      $record_employee = $employee->get($employee->email, "email");
      $messeage = "../partials/messeages/userCreated.php";
      $directory = "../files_users/" . $record_employee['username'];
      mkdir($directory, 0777, true);
      $_SESSION['user_id'] = $record_employee['id_employee'];
      echo $record_employee['id_employee'];
      header("Location: ../Home");
      
    }else{
      $messeage = "../partials/messeages/userNotCreated.php";
    }
  } else{
    echo "<script>alert('Campos invalidos')</script>";
  }

  function validate_fields(){
    return (
      (isset($_POST['name'])) &&
      (isset($_POST['surname'])) &&
      (isset($_POST['username'])) &&
      (isset($_POST['password'])) &&
      (isset($_POST['confirm_password'])) &&
      (isset($_POST['email'])) &&
      (isset($_POST['telephone'])) &&
      (isset($_POST['cuil'])) );
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
	<link rel="stylesheet"  type="text/css"  href="styles/main.css">
  <title>COTEUS | Registro</title>
  <meta charset="UTF-8"/>
  
  <?php
    require("../partials/linkCSS.php");
  ?>
</head>

<body class="body">
   
<center>
  <div class="Register-box">

  <div class="titulo">
    <p>Registro</p>  
  </div>

    <img src="../img/COTEUS_Emblema_Azul.svg" class="logo" alt="Emblema COTEUS">
    
    <form action='index.php' method="post">
      <div class="Columns">
        <label for="Name">Nombre</label>
        <input type='text' name='name' require>
        <label for="Last-Name">Apellido</label>
        <input type='text' name='surname' require>
        <label for="Mail">Email</label>
        <input type='email' name='email' require>
      </div>
      <div class="Columns">  <label for="Mail">CUIL</label>
        <input type='number' name='cuil' require>
        <div class="captcha">
        <label >Repite el codigo</label>
        <img src="https://localhost/COTEUS/Registrarme/resources/captcha.php" style="border-radius: 15px;">
        </div>
        <input type="text" name="captcha" id="captcha">
        <label for="Username">Nombre de Usuario</label>
        <input type='text' name='username' require>
        <label for="number">Teléfono</label>
        <input type='number' name='telephone' require>
        <a href="../index.php">
          <button id="backbuton">Volver</button>
        </a>
      </div>
      <div class="Columns">
        <label for="Password">Contraseña</label>
        <input type='password' name='password' require>
        <label for="confirm_password">Confirmar Contraseña</label>
        <input type='password' name='confirm_password' require>
        <input type="submit" value="Crear cuenta" id="Registerbutton">
      </div> 
      
    </form>
    <a href="../Login" style="color: black;" id="Textquestion">¿Ya tienes una cuenta?</a>
</center>

  <?php require ("../partials/HTML/footer/footer.php"); ?>
</body>
</html>
