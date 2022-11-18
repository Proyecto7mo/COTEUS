<?php
//echo $_GET['q'];
/*<form action="./group.php" method="get">
  <input type="text" name="q" id="q">
  <input type="submit" value="enviar">
</form>*/
session_start();
if(isset($_SESSION['user_id'])){
  if(isset($_POST['grup'])||isset($_SESSION['gr'])){
  if(isset($_POST['grup'])){
    $idgrup=$_POST['grup'];
  }
  else{
    $idgrup=$_SESSION['gr'];
  }

  /*echo($_POST['grup']);
  echo('          ');
  echo($_SESSION['gr']);*/
  //$_SESSION['gr']=$idgrup;
  require_once '../class/group.php';
  $groups_list=group::getgroups($_SESSION['user_id']);
  foreach($groups_list as $key){
    if(password_verify($key->id_group, $idgrup)){
    //$_SESSION['name']=$key->name;
    $name=$key->name;
    $grcl=$key->id_group."-".$key->key;
    $grclh=password_hash($grcl, PASSWORD_BCRYPT);
    $url="http://".$_SERVER['HTTP_HOST']."/coteus/link/?grcl=".$grclh;
    $idgrup=$key->id_group;
    //unset($_SESSION['gr']);
    }
  }

  if(isset($_POST['val'])){
    $val=$_POST['val'];
    $iduser=$_POST['iduser'];
    require_once '../class/group.php';
    switch ($val) {
    case 'AumentarM':
      //echo($val."-----".$iduser."----".$idgrup);
      group::modifyrank("A", $iduser, $idgrup);
      break;
    case 'EliminarM':
      group::deletemember($iduser, $idgrup);
      break;
    case 'BajarM':
      group::modifyrank("M", $iduser, $idgrup);
      break;
    default:
      # code...
      break;
    }
    header('Location: ./group.php');
  }

  }
  else{
  header('Location: index.php');
  }
}
else{
  header('Location: ../');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nav</title>
  
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="./css's/footer.css" />
  <link rel="stylesheet" href="./css's/nav.css" />

  <script src="js/index.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- bootstrap -->

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
    crossorigin="anonymous"
  />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"
  ></script>

  <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Roboto">		
    <link rel="stylesheet" type="text/css" href="styles/gantt.css">
    <script type="text/javascript" src="js/gantt.js"></script>

  <!-- bootstrap -->
  </head>
  <body>
  <header class="d-flex justify-content-center">
    <img src="./assets/Coteus Logo Blanco.png" alt="" />
  </header>

  <div class="header">
    <?php
      require "../partials/HTML/header/header.php";
    ?>
  </div>

  
  <div class="pages">
  <?php
    include "../partials/HTML/nav/nav.php";
  ?>
  <!--<label for="link"></label>-->
  </div>
<!--
  <nav
    class="navbar navbar-expand-lg navbar-light d-flex justify-content-center"
  >
    <div class="container-fluid">
    <a class="navbar-brand me-5 p-4" href="#">COTEUS</a>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
        <a
        class="nav-link btn btn-outline-info rounded-pill shadow-sm mb bg-body rounded"
        aria-current="page"
        href="#"
        >INICIO</a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./pages/grupos.html">GRUPOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./pages/cuenta.html">CUENTA</a>
      </li>
      </ul>
    </div>
    </div>
  </nav>
-->
  <!-- FIN HEADER -->

  <!-- HERO -->
  <?php
  //echo $name;
  ?>
  <h1 class="titulo"><?php echo($name);?></h1>

  <!--<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
  />-->

  

  <div class="row m-5">
    <div class="col-sm-6">
    <div class="card">
      <div class="card-body" id="cb">
      <?php
      $member_list=group::getmembersgr($idgrup);
      $useractip="M";
      foreach($member_list as $member){
        if($_SESSION['user_id'] == $member->id_employee){
        if($member->rol=="A"){
          $useractip="A";
        }
        }
      }
      foreach ($member_list as $key) {
        $rol = ($key->rol == "A") ? "Administrador" : (($key->rol == "M") ? "Miembro" : "");
      ?>
      <form method="post" id="user" onsubmit="return showFiles();">
      <div class="d-flex m-3" id="mas">
        
          <button class="card-title p-2 flex-grow-1" id="userbtn"><h5 class="card-title p-2 flex-grow-1"><?php echo($key->username."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <div id='tip'>".$rol."</div>");?></h5></button>
          <input type="hidden" name="idUser" value="<?php echo($key->id_employee);?>">
          <input type="hidden" name="idGroup" value="<?php echo($idgrup);?>">
          <input type="hidden" name="userRol" value="<?php echo($useractip);?>">
          <input type="hidden" name="valF" value="MostrarF">
          <input type="submit" value="">
        
        <!--<h5 class="card-title p-2 flex-grow-1"><?php //echo($key->username); ?></h5>-->

        <!--<button class="btn btn-primary" type="button">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-dots"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="5" cy="12" r="1" />
          <circle cx="12" cy="12" r="1" />
          <circle cx="19" cy="12" r="1" />
        </svg>
        </button>-->

        
        <?php
        if($useractip=="A"){
          echo('<button
          class="btn btn-primary"
          type="button"
          id="dropdownMenuButton1"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          Opciones
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li>
          <form id="Aumentar" action="group.php" method="POST" onsubmit="state();">
            <input type="hidden" name="val" value="AumentarM">
            <input type="hidden" name="iduser" value="'.$key->id_employee.'">
            <input class="dropdown-item" type="submit" value="Aumentar rango">
          </form>
          <!--<a id="aumentar" class="dropdown-item" href="./" onclick="alerta()">Aumentar rango</a>-->
          </li>
          <li>
          <form id="Bajar" action="group.php" method="POST" onsubmit="state();">
            <input type="hidden" name="val" value="BajarM">
            <input type="hidden" name="iduser" value="'.$key->id_employee.'">
            <input class="dropdown-item" type="submit" value="Bajar rango">
          </form>
          <!--<a id="aumentar" class="dropdown-item" href="./" onclick="alerta()">Aumentar rango</a>-->
          </li>
          <li>
          <form id="Eliminar" action="group.php" method="POST" onsubmit="state();">
            <input type="hidden" name="val" value="EliminarM">
            <input type="hidden" name="iduser" value="'.$key->id_employee.'">
            <input class="dropdown-item" type="submit" value="Eliminar miembro">
          </form>
          <!--<a id="eliminar" class="dropdown-item" href="#" onclick="alerta()">Eliminar miembro</a>-->
          </li>
        </ul>');
        }
        ?>

        <!--<div class="position-absolute">
        <div class="dropdown">
          <button
          class="btn btn-secondary dropdown-toggle"
          type="button"
          id="dropdownMenuButton1"
          data-bs-toggle="dropdown"
          aria-expanded="false"
          >
          Opciones
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li>
            <a id="aumentar" class="dropdown-item" href="#" onclick="alert()">Aumentar rango</a>
          </li>
          <li>
            <a id="eliminar" class="dropdown-item" href="#" onclick="alert()">Eliminar miembro</a>
          </li>
          </ul>
        </div>
        </div>-->

        

      </div>
      </form>
      <?php
      }
      ?>
      
<!--
      <div class="d-flex m-3">
        <h5 class="card-title p-2 flex-grow-1">Integrante: Tobias</h5>

        <button class="btn btn-primary" type="button">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-dots"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="5" cy="12" r="1" />
          <circle cx="12" cy="12" r="1" />
          <circle cx="19" cy="12" r="1" />
        </svg>
        </button>
      </div>

      <div class="d-flex m-3">
        <h5 class="card-title p-2 flex-grow-1">Integrante: Jeremias</h5>

        <button class="btn btn-primary" type="button">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-dots"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="5" cy="12" r="1" />
          <circle cx="12" cy="12" r="1" />
          <circle cx="19" cy="12" r="1" />
        </svg>
        </button>
      </div>
      <div class="d-flex m-3">
        <h5 class="card-title p-2 flex-grow-1">Integrante: Cristian</h5>

        <button class="btn btn-primary" type="button">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-dots"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="5" cy="12" r="1" />
          <circle cx="12" cy="12" r="1" />
          <circle cx="19" cy="12" r="1" />
        </svg>
        </button>
      </div>
      -->
      </div>
    </div>
    </div>

    
    <div class="col-sm-6">
    <div class="card">
      <div class="card-body" style="height: 500px;
      overflow: scroll;" id="filesContain">

      <?php
      
      ?>
    </div>
      <!--
      <div class="d-flex m-3">
        <h5 class="card-title p-2 flex-grow-1">Integrante: Tobias</h5>

        <button class="btn btn-primary" type="button">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-dots"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="5" cy="12" r="1" />
          <circle cx="12" cy="12" r="1" />
          <circle cx="19" cy="12" r="1" />
        </svg>
        </button>
      </div>

      <div class="d-flex m-3">
        <h5 class="card-title p-2 flex-grow-1">Integrante: Jeremias</h5>

        <button class="btn btn-primary" type="button">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-dots"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="5" cy="12" r="1" />
          <circle cx="12" cy="12" r="1" />
          <circle cx="19" cy="12" r="1" />
        </svg>
        </button>
      </div>
      <div class="d-flex m-3">
        <h5 class="card-title p-2 flex-grow-1">Integrante: Cristian</h5>

        <button class="btn btn-primary" type="button">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-dots"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <circle cx="5" cy="12" r="1" />
          <circle cx="12" cy="12" r="1" />
          <circle cx="19" cy="12" r="1" />
        </svg>
        </button>
      </div>
      -->
      </div>
    </div>
    </div>

    <!--<div class="col-sm-6">
    <div class="card">
      <div class="card-body" id="cb">
      <div class="d-flex">
        <h5 class="card-title p-2 flex-grow-1">Archivos</h5>

        <div class="dropdown">
        <button
          class="btn btn-secondary dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-files"
          width="30"
          height=""
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#ffffff"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 3v4a1 1 0 0 0 1 1h4" />
          <path
            d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"
          />
          <path
            d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"
          />
          </svg>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li>
          <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
        </div>
      </div>

      <p class="card-text">Archivos del integrante...</p>

      
      <div class="m-4">.</div>
      <div class="m-4">.</div>
      <div class="m-4">.</div>
      <div class="m-2">.</div>

      </div>
    </div>
    </div>
  </div>-->

  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuTask" data-bs-toggle="dropdown" aria-expanded="false">
    Agregar nueva tarea
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li>
    <div class="card card-body">
      <form method="POST" id="subTask" onsubmit="return agregarTask();">
      <div class="form-group">
        <input type="text" name="title" id="title" class="form-control" placeholder="Title" autofocus required>
      </div>
      <div class="form-group">
        <input type="text" name="asigned" id="asigned" class="form-control" placeholder="Persona designada" autofocus required>
      </div>
      <!--<div class="form-group">
        <textarea name="duracion" id="duracion" rows="2" class="form-control" placeholder="duracion"></textarea>
      </div>-->

      <!--<form action="../Gantt" method="post">
        <input type="hidden" name="idtask" value="">
        <input type="hidden" name="grup" value="<?php //echo($idgrup); ?>">
        <input type="hidden" name="val" value="Eliminar">
        <input type="submit" value="Eliminar">
      </form>-->

      <div class="form-group">
        <input type="date" name="f_inicio" id="f_inicio" class="form-control" placeholder="Fecha incio" autofocus required>
      </div>

      <div class="form-group">
        <input type="date" name="f_fin" id="f_fin" class="form-control" placeholder="Fecha incio" autofocus required>
      </div>

      <div class="form-group">
        <input type="text" name="predecesora" id="predecesora" class="form-control" placeholder="Predecesora" autofocus>
      </div>

      <input type="hidden" name="grup" id="grup" value="<?php echo($idgrup); ?>">

      <input type="hidden" name="val" id="val" value="Guardar">

      <input type="submit" name="save_task" id="save_task" class="btn btn-success btn-block" value="Guardar">
      </form>
    </div>
    </li>
    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>-->
    </ul>
  </div>

  <div id="gantt"></div>
  <div class="create-task">
    <script type="text/javascript">
    /*const obj = new Gantt([
      ['Action 1', '2022/05/12', '2022/05/12', '#4287f5', "i"],
      ['Action 2', '2022/05/12', '2022/05/14', '#c1409b', "i"],
      ['Action 3', '2022/05/14', '2022/05/17', '#0b9971', "i"],
      ['Action 4', '2022/05/18', '2022/05/20', '#d26a52', "i"],
      ['Action 5', '2022/05/19', '2022/05/20', '#4287f5', "i"],
      ['Action 6', '2022/05/12', '2022/05/20', '#0b9971', "j"],
      ]);*/
    </script>
  </div>

  <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"
        ></script>
        <!--<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"
        ></script>
        -->
        <!-- SWEET ALERT -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript" src="./js/index.js"></script>

  <br>
  <p style="font-size: 25px;" class="link">Invita a otras personas al grupo con el siguiente Link</p>
  <form action="" id="link">
    <input style="font-size: 20px;" type="url" name="link" value="<?php echo $url; ?>" onClick="this.select();" readonly>
  </form>

  <!-- HERO -->

  <!-- Footer -->

  <?php
    require ("../partials/HTML/footer/footer.php");
  ?>
  <!--
  <footer class="section bg-footer">
    <div class="container">
    <div class="row">
      <div class="col-lg-3">
      <div class="">
        <h6 class="footer-heading text-uppercase text-white">
        Informacion
        </h6>
        <ul class="list-unstyled footer-link mt-4">
        <li><a href="">Pages</a></li>
        <li><a href="">Nuestro equipo </a></li>
        </ul>
      </div>
      </div>

      <div class="col-lg-3">
      <div class="">
        <h6 class="footer-heading text-uppercase text-white">Nosotros</h6>
        <ul class="list-unstyled footer-link mt-4">
        <li><a href="">Quienes somos </a></li>
        <li><a href="">Que hacemos</a></li>
        </ul>
      </div>
      </div>

      <div class="col-lg-2">
      <div class="">
        <h6 class="footer-heading text-uppercase text-white">Ayuda</h6>
        <ul class="list-unstyled footer-link mt-4">
        <li><a href="">Sign Up </a></li>
        <li><a href="">Login</a></li>
        <li><a href="">Politica y privacidad</a></li>
        </ul>
      </div>
      </div>

      <div class="col-lg-4">
      <div class="">
        <h6 class="footer-heading text-uppercase text-white">
        Contactate con nosotros
        </h6>
        <p class="contact-info mt-4">
        Contactate con nosotros a travaes de el siguente mail
        </p>
        <p class="contact-info">example@coteus.com</p>
        <div class="mt-5">
         <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fab facebook footer-social-icon fa-facebook-f"></i></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab twitter footer-social-icon fa-twitter"></i></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab google footer-social-icon fa-google"></i></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab apple footer-social-icon fa-apple"></i></i></a></li>
              </ul> 
        </div>
      </div>
      </div>
    </div>
    </div>

    <div class="text-center mt-5">
    <p class="footer-alt mb-0 f-14">2022 © Coteus, All Rights Reserved</p>
    </div>
  </footer>
  -->

  <!-- Footer -->

  <!--<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
    crossorigin="anonymous"
  ></script>-->
  </body>
</html>
