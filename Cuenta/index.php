<?php
  session_start();
    
  if(!isset($_SESSION['user_id'])){
    header('Location: ../');
  }
  require_once '../class/employee.php';
  $employee_record=new employee();
  $empOld=employee::record_to_object($employee_record->get($_SESSION['user_id']));
  $empUsNameOld=$empOld->username;
  //Verifico si lo recibido es por metodo post
  if($_POST){
    if(isset($_POST['sbmtmod'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['phone'])){
        employee::Modify("username", $_POST['username'], $_SESSION['user_id']);
        employee::Modify("email", $_POST['email'], $_SESSION['user_id']);
        employee::Modify("telephone", $_POST['phone'], $_SESSION['user_id']);
        if($_POST['password']!=""){
            //Hasheando la password
            $password_hashed=password_hash($_POST['password'], PASSWORD_BCRYPT);

            employee::Modify("password", $password_hashed, $_SESSION['user_id']);
        }
        header('Location: ../Cuenta');
    }
    if(isset($_POST['del'])){
        employee::Delete($_SESSION['user_id']);
        session_unset();

        session_destroy();

        header('Location: ../');
    }
  }
  $employee_record=new employee();
  $emp=employee::record_to_object($employee_record->get($_SESSION['user_id']));
  $empUsName=$emp->username;
  if(!file_exists("../files_users/$empUsNameOld")){ // si existe una carpeta/archivo
    // en el caso de que no exista la carpeta, se crea.

    // crea la carpeta del usuario con los permisos 0777
    mkdir("../files_users/$empUsNameOld", 0777);
  }
  if($empUsNameOld!=$empUsName){
    rename ("../files_users/$empUsNameOld", "../files_users/$empUsName");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
  <title>Cuenta</title>
  <?php
      require '../partials/linkCSS.php'
  ?>
  <script src="js/index.js"></script>
  <link rel="stylesheet" href="styles/main.css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- bootstrap -->
</head>
<body>
  <!-- INICIO HEADER -->

  <div class="header">
    <?php
      require "../partials/HTML/header/header.php";
    ?>
  </div>

  <!-- FIN HEADER -->

  <!-- INICIO NAV -->

  <div class="pages">
    <?php
      include "../partials/HTML/nav/nav.php";
    ?>
  </div>

  <!-- FIN NAV -->
  <header>
  </header>
  <!--style="display:grid; justify-items: center;"-->
  <form style="margin: 0px, 48px, 48px, 48px;" class="row g-3 p-5" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <h2>Modificacion de datos</h2>
        <div class="col-md-6">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" value="<?php echo $emp->name;?>" readonly>
        </div>
        <div class="col-md-6">
        <label for="surname" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="surname" value="<?php echo $emp->surname;?>" readonly>
        </div>
        <div class="col-md-6">
        <label for="cuil" class="form-label" style="">CUIL</label>
        <input type="number" class="form-control" id="cuil" value="<?php echo $emp->cuil;?>" readonly>
        </div>
        <div class="col-md-6">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" name="username" id="username" value="<?php echo $emp->username;?>">
        </div>
        <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $emp->email;?>">
        </div>
        <div class="col-md-6">
        <label for="phone" class="form-label" style="">Telefono</label>
        <input type="number" class="form-control" name="phone" id="phone" value="<?php echo $emp->telephone;?>">
        </div>
        <div class="col-md-12">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
        </div>
        
        <div class="col-12">
        <button type="submit" class="btn btn-primary" name="sbmtmod" value="librarian">Modificar datos</button>
        </div>
    </form>
    <form style="margin: 0px, 48px, 48px, 48px;" class="row g-3 p-5" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" name="mod">
        <h2>Eliminar cuenta</h2>
        <div class="col-12">
        <input type="hidden" name="del" value="Delete">
        <button type="button" onclick="confirmar()" class="btn btn-primary" id="delete" name="sbmtdel" value="Delete" style="background-color: red; border-color: red;">Eliminar cuenta</button>
        </div>
    </form>
<!--
  <div class="contenedor">
    <div class="contenedor__profilePhoto">
      <p class="profilePhoto__name-user"> fulano0903 </p>
      <img class="profilePhoto__photo" src="../Home/img/ProfilePhoto.JPG" alt="" height="300">
    </div>

    <div class="contenedor__group">
      <ul class= "group__integrantes">
        <p class="group__name"> NombreGrupo </p>
        <li class= "group__integrante"> Fulano </li>
        <li class= "group__integrante"> Mengano </li>
        <li class= "group__integrante"> Sultano </li>
      </ul>
    </div>
  </div>
  <div class="contenedor">
    <div class="contenedor__account">
      <ul class="account__settings">
        <li class="account__property">
          <p class="account__nameuser"> rodo0903 </p>
          <button> Cambiar </button>
        </li>
        <li class="account__property">
          <p class="account__name"> Rodolfo </p>
          <button> Cambiar </button>
        </li>
        <li class="account__property">
          <p class="account__surname"> Gomez </p>
          <button> Cambiar </button>
        </li>
      </ul>
    </div>
  </div>
-->
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> 
  <!-- bootstrap -->

</body>
</html>
