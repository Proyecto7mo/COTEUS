<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tabla Grantt</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <!-- nav -->

    <header class="d-flex justify-content-center">
      <img src="./assets/Coteus Logo Blanco.png" alt="" />
    </header>

    <nav
      class="navbar navbar-expand-lg navbar-light d-flex justify-content-center"
    >
      <div class="container-fluid">
        <a class="navbar-brand me-5 p-4 text-white" href="#">COTEUS</a>

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
              <a class="nav-link text-white" aria-current="page" href="#"
                >INICIO</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./pages/grupos.html"
                >GRUPOS</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./pages/cuenta.html"
                >CUENTA</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- nav -->

    <h1 class="mt-5">DIAGRAMA DE GRANTT</h1>

    <h1 class="tarea">Agrega tu tarea aca</h1>

    <div class="container">
      <form>
        <div class="group">
          <input type="text" required />
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>TITULO</label>
        </div>

        <div class="group">
          <input type="text" required />
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>DURACION</label>
        </div>

        <div class="group">
          <input type="text" required />
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>FECHA INICIO</label>
        </div>

        <div class="group">
          <input type="text" required />
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>FECHA FIN</label>
        </div>

        <div class="group">
          <input type="text" required />
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>PREDECESORA</label>
        </div>

        <button class="btn">GUARDAR TAREA</button>
      </form>
    </div>

    <section>
      <!--for demo wrap-->

      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>TITULO</th>
              <th>DURACION</th>
              <th>FECHA INICIO</th>
              <th>FECHA FIN</th>
              <th>PREDECESORA</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <tr>
              <td>A</td>
              <td>3 DIAS</td>
              <td>1/01/22</td>
              <td>3/01/22</td>
              <td></td>
            </tr>
            <tr>
              <td>B</td>
              <td>5 DIAS</td>
              <td>1/01/22</td>
              <td>5/01/22</td>
              <td>A</td>
            </tr>
            <tr>
              <td>C</td>
              <td>2 DIAS</td>
              <td>5/03/22</td>
              <td>7/03/22</td>
              <td>E</td>
            </tr>
            <tr>
              <td>D</td>
              <td>1 DIA</td>
              <td>8/03/22</td>
              <td>9/03/22</td>
              <td>D</td>
            </tr>
            <tr>
              <td>E</td>
              <td>7 DIAS</td>
              <td>12/03/22</td>
              <td>19/03/22</td>
              <td>A</td>
            </tr>
            <tr>
              <td>F</td>
              <td>3 DIAS</td>
              <td>14/03/22</td>
              <td>17/03/22</td>
              <td>G</td>
            </tr>
            <tr>
              <td>G</td>
              <td>1 DIA</td>
              <td>18/03/22</td>
              <td>19/03/22</td>
              <td>H</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section>
      <table>
        <tr>
          <th>LUNES</th>
          <th>MARTES</th>
          <th>MIERCOLES</th>
          <th>JUEVES</th>
          <th>VIERNES</th>
          <th>SABADO</th>
          <th>DOMINGO</th>
        </tr>

        <tr>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
        </tr>

        <tr>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
        </tr>

        <tr>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
        </tr>

        <tr>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
          <td>#</td>
        </tr>
      </table>
    </section>

    <!-- FOOTER -->

    <footer class="bg-footer">
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
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <p class="footer-alt mb-0 f-14">2022 © Coteus, All Rights Reserved</p>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
