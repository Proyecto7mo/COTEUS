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
        //$_SESSION['name']=$key->name;
        $name=$key->name;
        $grcl=$key->id_groups."-".$key->clave;
        $grclh=password_hash($grcl, PASSWORD_BCRYPT);
        $url="http://".$_SERVER['HTTP_HOST']."/coteus/link/?grcl=".$grclh;
        $idgrup=$key->id_groups;
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
    <title>COTEUS | Grupo</title>
   	<link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
    
    <link rel="stylesheet" href="styles/main.css">

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
    <!-- FIN HEADER -->

    <h1 class="titulo"><?php echo($name);?></h1>

    <div class="row m-5" class="cuadros">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body" id="cb">
            <?php
            $member_list=group::getmembersgr($idgrup);
            $useractip="M";
            foreach($member_list as $key){
              if($_SESSION['user_id']==$key->id_user){
                if($key->tipo=="A"){
                  $useractip="A";
                }
              }
            }
            foreach ($member_list as $key) {
              $tipo="Miembro";
              if($key->tipo=="A"){
                $tipo="Administrador";
              }
            ?>
            <div class="d-flex m-3" id="mas">
              <button class="card-title p-2 flex-grow-1" id="user"><h5 class="card-title p-2 flex-grow-1"><?php echo($key->nameuser."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <div id='tip'>".$tipo."</div>");?></h5></button>
              
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
                      <input type="hidden" name="iduser" value="'.$key->id_user.'">
                      <input class="dropdown-item" type="submit" value="Subir rango">
                    </form>
                    <!--<a id="aumentar" class="dropdown-item" href="./" onclick="alert()">Aumentar rango</a>-->
                  </li>
                  <li>
                    <form id="Bajar" action="group.php" method="POST" onsubmit="state();">
                      <input type="hidden" name="val" value="BajarM">
                      <input type="hidden" name="iduser" value="'.$key->id_user.'">
                      <input class="dropdown-item" type="submit" value="Bajar rango">
                    </form>
                    <!--<a id="aumentar" class="dropdown-item" href="./" onclick="alert()">Aumentar rango</a>-->
                  </li>
                  <li>
                    <form id="Eliminar" action="group.php" method="POST" onsubmit="state();">
                      <input type="hidden" name="val" value="EliminarM">
                      <input type="hidden" name="iduser" value="'.$key->id_user.'">
                      <input class="dropdown-item" type="submit" value="Eliminar miembro">
                    </form>
                    <!--<a id="eliminar" class="dropdown-item" href="#" onclick="alert()">Eliminar miembro</a>-->
                  </li>
                </ul>');
                }
                ?>

            </div>
            <?php
            }
            ?>
    
          </div>
        </div>
      </div>

      <div class="col-sm-6">
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
                  <li><a class="dropdown-item" href="#">Subir</a></li>
                  <li><a class="dropdown-item" href="#">Eliminar</a></li>
                  <li><a class="dropdown-item" href="#">Descargar</a>
                  </li>
                </ul>
              </div>
            </div>

            <p class="card-text">Archivos del integrante</p>

            <div class="m-4">.</div>
            <div class="m-4">.</div>
            <div class="m-4">.</div>
            <div class="m-2">.</div>

          </div>
        </div>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuTask" data-bs-toggle="dropdown" aria-expanded="false">
        Agregar nueva tarea
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li>
        <div class="card card-body">
          <form method="POST" id="subTask" action="./" submit="document.getElementById('subTask').reset();">
            <div class="form-group">
              <input type="text" name="title" id="title" class="form-control" placeholder="Title" autofocus required>
            </div>

            <div class="form-group">
              <input type="text" name="asigned" id="asigned" class="form-control" placeholder="Persona designada" autofocus required>
            </div>

            <!--<div class="form-group">
              <textarea name="duracion" id="duracion" rows="2" class="form-control" placeholder="duracion"></textarea>
            </div>-->

            <form action="../class/gant.php" method="post">
              <input type="hidden" name="idtask" value="">
              <input type="hidden" name="val" value="Eliminar">
              <input type="submit" value="Eliminar">
            </form>

            <div class="form-group">
              <input type="date" name="f_inicio" id="f_inicio" class="form-control" placeholder="Fecha incio" autofocus required>
            </div>

            <div class="form-group">
              <input type="date" name="f_fin" id="f_fin" class="form-control" placeholder="Fecha incio" autofocus required>
            </div>

            <div class="form-group">
              <input type="text" name="predecesora" id="predecesora" class="form-control" placeholder="Predecesora" autofocus required>
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
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

              <script type="text/javascript" src="js/index.js"></script>

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
    
  </body>
</html>
