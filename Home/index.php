<?php
  
  session_start();
  
  require("../datos/datos.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/3a5da5265b.js"
      crossorigin="anonymous"
    ></script>
    <!-- font awesome -->

    <title>Home</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- bootstrap -->
  </head>
  <body>
    <!-- INICIO HEADER -->
    <header class="d-flex justify-content-center">
      <img src="../img/coteus/logoAzul.svg" alt="" />

    </header>

    <nav
      class="navbar navbar-expand-lg navbar-light d-flex justify-content-center"
    >
      <div class="container-fluid">
        <a class="navbar-brand me-5 p-4" href="./../index.html">COTEUS</a>

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
                href="../Home/"
                >HOME</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Grupo/">GRUPO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Cuenta/">CUENTA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../partials/logout.php">SALIR</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- FIN HEADER -->

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
                  $empleado = obtener_empleado($_SESSION['user_id']);
                  $empleado['name'];
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

    <!-- ARCHIVOS -->

    <div class="funcionalidades">
      <?php
        require '../partials/upLoadFiles/upLoadFile.html';
      ?>
      <?php
        // require '../partials/tasks/tasks.html';
      ?>
    </div>

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
              This card has supporting text below as a natural lead-in to
              additional content.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <div class="card-img-top icon-card">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-file-plus"
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
              <path d="M14 3v4a1 1 0 0 0 1 1h4" />
              <path
                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"
              />
              <line x1="12" y1="11" x2="12" y2="17" />
              <line x1="9" y1="14" x2="15" y2="14" />
            </svg>
          </div>

          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a wider card with supporting text below as a natural
              lead-in to additional content. This card has even longer content
              than the first to show that equal height action.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
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
              lead-in to additional content. This card has even longer content
              than the first to show that equal height action.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
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
              lead-in to additional content. This card has even longer content
              than the first to show that equal height action.
            </p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
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
              lead-in to additional content. This card has even longer content
              than the first to show that equal height action.
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

    <?php require("../partials/footer.php"); ?>

  </body>
</html>
