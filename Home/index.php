<?php
  
  session_start();
  
  if (!isset($_SESSION['user_id'])) {
    echo "<script> /*alert('Parece que no iniciaste sesion. Te vamos a redireccionar al Login.');*/ window.location.href = 'http://localhost/COTEUS/Login'; </script>";
  }
  if(isset($_SESSION['url'])){
    $locate='Location: http://localhost'.$_SESSION['url'];
    header($locate);
    unset($_SESSION['url']);
  }
  
  require ("../partials/upload_files/upload_files.php");
  require("../class/employee.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">
    <link rel="stylesheet" href="styles/main.css">

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/3a5da5265b.js"
      crossorigin="anonymous"
    ></script>
    <!-- font awesome -->

    <title>COTEUS | Home</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <?php include "../partials/linkCSS.php"; ?>

    <!-- bootstrap -->
  </head>

  <body>
    <!-- INICIO HEADER -->
    
    <div class="header">
    <?php
      require "../partials/HTML/header/header.php";
    ?>
    </div>

    <!-- INICIO NAV -->

  <div class="pages">
    <?php
      include "../partials/HTML/nav/nav.php";
    ?>
</div>

    <!-- FIN NAV -->

    <!-- CARD USUARIO -->
    <div class="d-flex justify-content-center">
      <div class="mb-3 mt-4" style="max-width: 540px">
        <div class="row">
          <div class="col-md-4">
            <img
              src="../img/users/ProfilePhoto.png"
              class="img-fluid img-card1 rounded-pill shadow p-2 bg-body"
              id="user-photo"
            />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">  
                <?php
                  // echo $_SESSION['user_id'];
                  require_once "../datos/datos.php";
                  $record = datos::get_employee_id($_SESSION['user_id']);
                  echo $record['name'];
                ?>
              </h5>
              <p class="card-text">
                <?= $record['nameuser'] ?>
              </p>
              <p class="card-text">
                <small class="text-muted">Lorem, ipsum dolor.</small>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD USUARIO -->

    <div class="functions">
      <?php
        include '../partials/upload_files/upload_files.html';
      ?>
    </div>
    
    <!-- ARCHIVOS -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 p-5">
      <?php
        $directory_handler=employee::view_files($record['nameuser']);
        $employee_folder=$record['nameuser'];
        $directory = "../files_users/" . $employee_folder;
        while($item = readdir($directory_handler)){
          if($item != "." && $item != ".."){
      ?>
      <div class="col" id="cf">
        <div class="card h-100">
          <div class="card-img-top icon-card">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
            <h5 class="card-title">
              <?php if(is_dir($directory . $item)){
              echo ("<li>Carpeta <a href='https://localhost/COTEUS/files_users/$employee_folder/$item' target='_blank'>$item</a></li>");
            }
              else{
                echo("<li>Archivo <a href='https://localhost/COTEUS/files_users/$employee_folder/$item' target='_blank'>$item</a></li>");
                } ?>
                </h5>
            <p class="card-text">

            </p>
          </div>
        </div>
        <?php//employee::view_files($record['nameuser']); ?>
      </div>
      <?php
          }
        }
      ?>
    </div>

    <!-- ARCHIVOS -->

    <!-- bootstrap -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- bootstrap -->

    <!-- INICIO FOOTER -->

    <?php
      require ("../partials/HTML/footer/footer.php");
    ?>
    
    <!-- FIN FOOTER -->

  </body>
</html>
