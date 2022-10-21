<?php
  require '../class/groups.php';
  $groupname=$_POST['groupname'];
  $admin=$_POST['adminname'];
  if(isset($groupname)){
  $grcreated=new groups($groupname, $admin);
  //$grcreated->newgroup();
  //require("../database/database.php");
  /*$query="select * from groups_t where name = 'B'";
  $stmt=$conexion->prepare($query);
  $stmt->execute();
  $reg=$stmt->fetch(PDO::FETCH_ASSOC);*/

  /*if(is_null($reg['id_groups']))
  {
    echo "nada";
  }*/

  $server = 'localhost';
  $username = 'root';
  $password = '123456789';
  $database = 'pruebagrupo';

  //require '../database/database.php';
  
  try{
    $conexion = new PDO("mysql: host = $server; dbname = $database;", $username, $password);
  }catch(PDOException $e){
    echo "FALLE";
    die('Conexion a Base de Datos Fallida ' . $e->getMessage());
  }

  $query="INSERT INTO groups_t (id_groups, name, admin) VALUES (93, 'z', 'z')";
  $stmt=$conexion->prepare($query);
  if(!$stmt)
  {
    echo "NO SE PREPARO";
  }
  /*$groupname="aa";
  $admin="bb";
  $id=32;
  $idfi=22;
  $idch=45;
  $stmt->bindParam(':id', $id);*/
  //$stmt->bindParam(':names', $groupname);
  //$stmt->bindParam(':admins', $admin);
  /*$stmt->bindParam(':idfi', $idfi);
  $stmt->bindParam(':idch', $idch);*/
  $stmt->execute();
  if($stmt->execute()){
    echo "ejecute consulta";
  }
  else{
    echo "FALLEEE EN EL EXECUTE()";
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="styles/main.css">
  <link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
  <title>COTEUS | Grupo</title>

  <!-- font awesome -->
  <script
    src="https://kit.fontawesome.com/3a5da5265b.js"
    crossorigin="anonymous"
  ></script>
  <!-- font awesome -->
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
  
  <header class="header">
    <?php
      require "../partials/HTML/header/header.php";
    ?>
  </header>

  <!-- FIN HEADER -->

  <!-- INICIO NAV -->

  <div class="pages">
    <?php
      include "../partials/HTML/nav/nav.php";
    ?>
  </div>

    <!-- FIN HEADER -->

  <!-- titulo -->

  <div class="grupos m-5">
    <h2 class="titulo">Grupo</h2>
  </div>

  <!-- titulo -->

  <!-- PRUEBA DE GRUPOS -->
  <div class="group-list">
    <form action="./" method="post">
      <label for="groupname"></label>
      <input type="text" name="groupname" id="groupname">
      <br>
      <label for="adminname"></label>
      <input type="text" name="adminname" id="adminname">
      <input type="submit" value="Crear Grupo">
    </form>
  </div>
  <!-- PRUEBA DE GRUPOS -->

  <div class="functions">
    <?php
      include '../partials/upload_files/upload_files.html';
      include '../partials/task/add_task.html';
    ?>
  </div>

    <!--BUSCADOR -->

  <?php require ("../partials/HTML/seeker/seeker.php"); ?>
  
  <!--FIN BUSCADOR -->

    <!-- bootstrap -->

  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>

  <?php
    require ("../partials/HTML/footer/footer.php");
  ?>

  <!-- bootstrap -->
</body>
</html>
