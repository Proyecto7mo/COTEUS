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
      if(password_verify($key->id_groups, $idgrup)){
        $name=$key->name;
        $grcl=$key->id_groups."-".$key->clave;
        $grclh=password_hash($grcl, PASSWORD_BCRYPT);
        $url="http://".$_SERVER['HTTP_HOST']."/coteus/link/?grcl=".$grclh;
        $idgrup=$key->id_groups;
        unset($_SESSION['gr']);
      }
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
    <label for="link"></label>
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
    <div class="row m-5">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <?php
            $member_list=group::getmembersgr($idgrup);
            foreach ($member_list as $key) {
              $tipo="Miembro";
              if($key->tipo=="A"){
                $tipo="Administrador";
              }
            ?>
            <div class="d-flex m-3" id="mas">
              <button class="card-title p-2 flex-grow-1" id="user"><h5 class="card-title p-2 flex-grow-1"><?php echo($key->nameuser."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <div id='tip'>".$tipo."</div>");?></h5></button>
              <!--<h5 class="card-title p-2 flex-grow-1"><?php //echo($key->nameuser); ?></h5>-->

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
          <div class="card-body">
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
    </div>

    <div id="gantt"></div>
    <script type="text/javascript">
			const obj = new Gantt([
				['Action 1', '2022/05/12', '2022/05/12', '#4287f5', 80],
				['Action 2', '2022/05/12', '2022/05/14', '#c1409b', 10],
				['Action 3', '2022/05/14', '2022/05/17', '#0b9971', 20],
				['Action 4', '2022/05/18', '2022/05/20', '#d26a52', 55],
				['Action 5', '2022/05/19', '2022/05/20', '#4287f5', 100],
				['Action 6', '2022/05/12', '2022/05/20', '#0b9971', 32],
				]);
		</script>

    <p class="link">Invita a otras personas al grupo con este Link</p>
    <form action="" id="link">
      <input type="url" name="link" value="<?php echo $url; ?>" onClick="this.select();" readonly>
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
                <!-- <ul class="list-inline">
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

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
