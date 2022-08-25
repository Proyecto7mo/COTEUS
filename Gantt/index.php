<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" type="image/png" href="../img/COTEUS_Emblema_Azul.svg">

  <title>COTEUS | Gantt</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />

  <?php
    require '../partials/linkCSS.php';
  ?>
</head>

<body>
    
  <header class="header">
    <?php
      include "../partials/HTML/header/header.php";
    ?>
  </header>

  <div class="pages">
    <?php
      include "../partials/HTML/nav/nav.php";
    ?>
  </div>

  <h1 class="mt-5">DIAGRAMA DE GANTT</h1>
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

  <?php
    require ("../partials/HTML/footer/footer.php");
  ?>

  <!-- <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script> -->
</body>
</html>
