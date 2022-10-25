<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../Home');
  }

  $messeage = '';

  if(ValidarCampos()){
    require '../class/employee.php';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $nameuser = $_POST['nameuser'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telephono = $_POST['telephono'];
    $cuil = 0;

    $employee = new employee($name, $surname, $nameuser, $email, $password, $telephono, $cuil);

    if($employee->signup() > 0){

      $record_employee = $employee->get();
      $messeage = "../partials/messeages/userCreated.php";
      $directory = "../files_users/" . $record_employee['nameuser'];
      mkdir($directory, 0777, true);
      $_SESSION['user_id'] = $record_employee['id_user'];
      echo $record_employee['id_employee'];
      header("Location: ../Home");
    }
    else{
      $messeage = "../partials/messeages/userNotCreated.php";
    }
  }

  function ValidarCampos(){
    return ( (!empty($_POST['name'])) && (!empty($_POST['surname'])) && (!empty($_POST['nameuser'])) && (!empty($_POST['password'])) && (!empty($_POST['confirm_password'])) && (!empty($_POST['email'])) && (!empty($_POST['telephono'])) );
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
    
    <form action='index.php' method="post" id="form">
      
    <div class="Columns">
        <label for="Name" class="logon_label">Nombre</label>
        <input type='text' class="slot" name='name' require>
              <p class="alerts" id="name_slot_alert">Caracteres inválidos para este campo</p>

        <label for="Mail" class="logon_label">Email</label>
        <input type='email' class="slot" name='email' require>
              <p class="alerts" id="email_slot_alert">Campo inválido</p>

        <label for="Cuil" class="logon_label">CUIL</label>
        <input type='number' class="slot" name='cuil' require>
              <p class="alerts" id="cuil_slot_alert">Caracteres inválidos para este campo</p>
        
        <!--Capcha-->
        <img src="https://localhost/COTEUS/Registrarme/resources/captcha.php" id="captcha">
        <input type="text" id="incaptcha" name='captcha' require>
        
      </div>
      
      <div class="Columns">
        <label for="Surname" class="logon_label">Apellido</label>
        <input type='text' class="slot" name='surname' require>
              <p class="alerts" id="surname_slot_alert">Caracteres inválidos para este campo</p>

        <label for="Username" class="logon_label">Nombre de Usuario</label>
        <input type='text' class="slot" name='nameuser' require>
              <p class="alerts" id="nameuser_slot_alert">Caracteres inválidos para este campo</p>

        <label for="Phone" class="logon_label">Teléfono</label>
        <input type='number' class="slot" name='telephone' require>
              <p class="alerts" id="telephone_slot_alert">Campo inválido</p>
      </div>

      <div class="Columns">
        <label for="Birth" class="logon_label">Fecha de Nacimiento</label>
        <input type="date" class="slot" name="birthdate" require>
              <p class="alerts" id="birthdate_slot_alert">Campo inválido</p>

        <label for="Password" class="logon_label">Contraseña</label>
        <input type='password' class="slot" name='password' id="psw" require>
              <p class="alerts" id="password_slot_alert">Caracteres insuficientes</p>

        <label for="confirm_password" class="logon_label">Confirmar Contraseña</label>
        <input type='password' class="slot" name="confirm_password" id="cfmpsw" require>
              <p class="alerts" id="confirm_password_slot_alert">Las constraseñas no coinciden</p>
          <br>
          <br>
        <input type="checkbox" id="password_view" onclick="HideShow()"/><span>Mostrar contraseña</span>
      </div>

      <input type="submit" value="Crear cuenta" id="Registerbutton">
    </form>
    
    <a href="../Login" style="color: black;" id="Textquestion">¿Ya tienes una cuenta?</a>
    <input onclick="window.location.href = '../index.php'"  type="submit" value="Volver" id="backbutton">

  </div>
</center>

  <?php
    require '../partials/HTML/footer/footer.php';
  ?>

  <script src="js/main.js"></script>
</body>
</html>
