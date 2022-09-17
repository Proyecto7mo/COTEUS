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
      
      mkdir("../files_users/" . $record_employee['nameuser'], 0777, true);
      
      $_SESSION['user_id'] = $record_employee['id_user'];
      echo $record_employee['id_employee'];
      header("Location: ../Home");
      
    }else{
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
    
    <form action='index.php' method="post">
      <div class="Columns">
        <label for="Name">Nombre</label>
        <input type='text' name='name' placeholder='Nombre' require>
        <label for="Mail">Ingrese Email</label>
        <input type='email' name='email' placeholder='Email' require>
        
        <!--Capcha-->
        <label >Aqui va el captcha</label>
        
      </div>
      <div class="Columns">
        <label for="Last-Name">Apellido</label>
        <input type='text' name='surname' placeholder='Apellido' require>
        <label for="Username">Nombre de Usuario</label>
        <input type='text' name='nameuser' placeholder='Usuario' require>
        <label for="number">Teléfono</label>
        <input type='number' name='telephono' require>
      </div>
      <div class="Columns">
        <label for="Birth">Fecha de Nacimiento</label>
        <input type="date" style="color: rgb(53, 50, 50);">
        <label for="Password">Contraseña</label>
        <input type='password' name='password' require>
        <label for="confirm_password">Confirmar Contraseña</label>
        <input type='password' name='confirm_password' require>
      </div> 
      <input type="submit" value="Crear cuenta" id="Registerbutton">
    </form>
    <a href="../Login" style="color: black;" id="Textquestion">¿Ya tienes una cuenta?</a>
    <input onclick="window.location.href = '../index.php'"  type="submit" value="Volver" id="backbutton">

  </div>
</center>

  <?php
    echo include $messeage;
    require '../partials/HTML/footer/footer.php';
  ?>
</body>
</html>
