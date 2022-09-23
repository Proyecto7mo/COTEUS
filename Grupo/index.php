<?php

  session_start();
  if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  if(isset($_POST['groupname'])){
    $groupname=$_POST['groupname'];
    require '../class/group.php';
    $grcreated=new group($user_id, $groupname);
    $result=$grcreated->newgroup();
    if($result>0){
      echo $result;
    }
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
      <h2 class="titulo">Grupo</h2>
    </div>

    <!-- titulo -->

    <!-- PRUEBA DE GRUPOS -->
    <div class="new-group">
      <form action="./" method="post">
        <label for="groupname"></label>
        <input type="text" name="groupname" id="groupname">
        <br>
        <input type="submit" value="Crear Grupo">
      </form>
    </div>
    <div class="enter-group">
      <form action=""></form>
    </div>
  <!-- PRUEBA DE GRUPOS -->

    <div class="functions">
      <?php
        include '../partials/upload_files/upload_files.html';
      ?>
    </div>

    <div class="functions" id="DGbutton">
      <?php
    include '../partials/task/add_task.html';
    ?>
  </div>

    <!--BUSCADOR -->

    <?php require ("../partials/HTML/seeker/seeker.php"); 
    //BUSCAR GRUPOS
    require_once '../class/group.php';
    $groups_list=group::getgroups($user_id);
    $res=group::to_String($groups_list);
    echo $res;
    //FIN DE BUSCAR GRUPOS
    ?>
    
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
