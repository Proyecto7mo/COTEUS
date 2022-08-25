<?php

  session_start();

  require "../class/employee.php";
  $loged = null;

  function validate(){
    return (count($_POST) > 0);
  }
  
  if(count($_SESSION) > 0){

    echo "CON VARIABLES DE SESION CARGADAS";

    $loged = employee::registred($_SESSION['employee_email']);
   
    if ($loged) {
      header('Location: ../Home');
    }
  }
  else{

    echo "NO TIENE VARIABLES DE SESION CARGADAS";

    if (validate()){
      
      define("EMAIL", $_POST['email']);
      define("PASSWORD", $_POST['password']);

      $employee = new employee("n/n", "n/n", EMAIL, "n/n", PASSWORD);

      // $employee_email = $employee->login();
      $records = $conexion->prepare('SELECT email, password FROM employees_t WHERE email = :email');
      $records->bindParam(':email', $employee->email);
      $records->execute();
  
      $results = $records->fetch(PDO::FETCH_ASSOC);

      $employee_email = null;

      if(count($record) > 0){
        //if ((password_verify($this->password, $record['password'])) && ($this->email == $record['email'])) {
        if (($this->password == $record['password']) && ($this->email == $record['email'])) {
          $employee_email = $record['email'];
        }
      }

      if (isset($employee_email)) {
        $_SESSION['employee_email'] = $employee_email;
        header("Location: ../Home");
      }
      else{
        $message = "../partials/messages/EmployeeNotRegistred.html";
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COTEUS | Inicio de sesión</title>
  <link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
  <meta charset="UTF-8"/>
  
  <!-- links CSS -->
  <?php require '../partials/linkCSS.php' ?>

</head>
<body>

  <?php if(validate()) require $message; ?>
  <div class="login-box">
    <img src="img/emblemaBlanco.svg" class="avatar" alt="Avatar Image">
    <h1>Inicio de sesión</h1>
    <form action="./" method="post" autocomplete="off">
      <div class="control">
        <label for="employeename">Correo Electronico</label>
        <input type="text" placeholder="Ingrese Usuario" id="inp_email" name="email">
      </div>
      <div class="control">
        <label for="Password">Contraseña</label>
        <input type="password" placeholder="Ingrese Contraseña" name="password">
      </div>
      <div class="control">
        <input type="submit" value="Log In">
        <a href="#">¿No recuerdas tu Contraseña?</a>
        <a href="../Registrarme/">¿No tienes una Cuenta?</a>
      </div>
    </form>
  </div>
  
  <?php require '../partials/HTML/footer/footer.php'; ?>

  <script>
    window.onload = () => { document.getElementById('inp_email').focus(); }
  </script>
</body>
</html>
