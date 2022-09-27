<?php
  
  session_start();
  
  if (!isset($_SESSION['user_id'])) {
    require "../datos/datos.php";
    
    $employee = datos::get_employee_id($_SESSION['user_id']);

    if(!$employee->username){
      echo "<script> alert('Parece que no iniciaste sesion. Te vamos a redireccionar al Login.'); window.location.href = 'http://localhost/COTEUS/Login'; </script>";
    }
  }
  
  require ("C:/xampp/htdocs/COTEUS/partials/upload_files/upload_files.php");
  require("../class/employee.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">

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

    <?php include "C:/xampp/htdocs/COTEUS/partials/linkCSS.php"; ?>
    <link rel="stylesheet" href="../partials/upload_files/upload_files.css">

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
              src="img/ProfilePhoto.JPG"
              class="img-fluid img-card1 rounded-pill shadow p-2 bg-body"
              alt="..."
            />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"> 
                Hola 
                <?php
                  // echo $_SESSION['user_id'];
                  require_once "../datos/datos.php";
                  $record = datos::get_employee_id($_SESSION['user_id']);
                  echo $record['name'];
                ?> !
              </h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing.
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
        include 'C:/xampp/htdocs/COTEUS/partials/upload_files/upload_files.html';
        include 'C:/xampp/htdocs/COTEUS/partials/task/add_task.html';
      ?>
    </div>
    
    <!-- ARCHIVOS -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 p-5">
      <div class="col">
        <div class="card h-100">
          <div class="card-img-top icon-card">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-files"
              width="100"
              height="100"
              viewBox="0 0 24 24"
              stroke-width="0.5"
              stroke="#000000"
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
          </div>

          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural
              lead-in to additional content. This content is a little bit
              longer.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
    </div>

    <!-- ARCHIVOS -->

    <!-- bootstrap -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

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
