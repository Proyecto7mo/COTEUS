<?php
  //echo $_SERVER['HTTP_HOST'];
  session_start();
  if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  if(isset($_POST['groupname'])){
    $groupname=$_POST['groupname'];
    $groupdesc=$_POST['groupdesc'];
    require '../class/group.php';
    $grcreated=new group($user_id, $groupname, $groupdesc);
    $result=$grcreated->newgroup();
    if($result>0){
      echo $result;
    }
    header('Location: ../Grupo/');
  }
  //BUSCAR GRUPOS
  /*require_once '../class/group.php';
  $groups_list=group::getgroups($user_id);
  echo $groups_list;*/
  //FIN DE BUSCAR GRUPOS
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
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
    <title>COTEUS | Grupo</title>

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/3a5da5265b.js"
      crossorigin="anonymous"
    ></script>
    <!-- font awesome -->

    <title>COTEUS</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../partials/upload_files/upload_files.css">
    <!-- bootstrap -->

    <?php
      require '../partials/linkCSS.php';
    ?>
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

    <!-- titulo -->

    <div class="grupos m-5">
      <h2 class="titulo">Grupos</h2>
    </div>

    <!-- titulo -->

    <!-- PRUEBA DE GRUPOS -->
    
    <!-- PRUEBA DE GRUPOS -->

    <!--<div class="functions">
      <?php
        //include '../partials/upload_files/upload_files.html';
      ?>
    </div>-->

    <!--<div class="functions" id="DGbutton">
      <?php
    //include '../partials/task/add_task.html';
    ?>
    </div>-->

    <!--BUSCADOR -->

    <?php //require ("../partials/HTML/seeker/seeker.php"); 
    //BUSCAR GRUPOS
    require_once '../class/group.php';
    $groups_list=group::getgroups($user_id);
    $res=group::to_String($groups_list);
    //echo $res;
    //FIN DE BUSCAR GRUPOS
    ?>

    <!--<div class="new-group">
      <form action="./" method="post">
        <label for="groupname">Nombre del grupo</label>
        <input type="text" name="groupname" id="groupname" required>
        <br>
        <label for="groupdesc">Descripcion</label>
        <input type="text" name="groupdesc" id="groupdesc">
        <input type="submit" value="Crear Grupo">
      </form>
    </div>-->

    <div class="dropdown" id="ng">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuTask" data-bs-toggle="dropdown" aria-expanded="false">
        Crear un Nuevo Grupo
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li>
        <div class="card card-body">
          <form method="POST" id="subTask" action="./">
            <div class="form-group">
              <input type="text" name="groupname" id="groupname" class="form-control" placeholder="Titulo del grupo" autofocus required>
            </div><br>

            <div class="form-group">
              <textarea name="groupdesc" id="groupdesc" rows="4" class="form-control" placeholder="Descripcion del grupo"></textarea>
            </div><br>

            <input type="submit" class="btn btn-success btn-block" value="Crear Grupo!!!">
          </form>
        </div>
        </li>
        <!--<li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
      </ul>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 p-5">
      <?php
        foreach ($groups_list as $key) {
          /*$tipo="Miembro";
          if($key->tipo=="A"){
            $tipo="Administrador";
          }*/
          
        ?>
      <a href="<?php require_once '../class/group.php'; $url="yy"; $url=group::getURL($user_id, $key->id_groups); echo($url); ?>">
      <div class="col" id="cu">
        <div class="card h-100">
          <div class="card-img-top icon-card">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M15 3v4a1 1 0 0 0 1 1h4" />
              <path
                d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"
              />
              <path
                d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"
              />
            </svg>
          </div>

          <div class="card-body">
            <h5 class="card-title"><?php echo($key->name); ?></h5>
            <p class="card-text">
            <?php echo($key->descripcion); ?>
              <!--This is a wider card with supporting text below as a natural
              lead-in to additional content. This content is a little bit
              longer.-->
            </p>
          </div>
          <!--<div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>-->
        </div>
        <?php //employee::view_files($record['nameuser']); ?>
      </div>
      </a>
      <?php
        }
      ?>
    </div>
    
    <!--FIN BUSCADOR -->

    <!-- bootstrap -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- INICIO FOOTER -->

    <?php
      require ("../partials/HTML/footer/footer.php");
    ?>
    
    <!-- FIN FOOTER -->

    <!-- bootstrap -->
  </body>
</html>
