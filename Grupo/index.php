<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grupos</title>

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/3a5da5265b.js"
      crossorigin="anonymous"
    ></script>
    <!-- font awesome -->

    <title>Coteus</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- bootstrap -->

    <!-- No existe el archivo grupos.css | Jeremias Cuello 23/5 -->
    <!-- <link rel="stylesheet" href="../css/grupos.css" /> -->
  </head>
  <body>
    <!-- INICIO HEADER -->
    <header class="d-flex justify-content-center">
      <img src="./../assets/Coteus Logo Blanco.png" alt="" />
    </header>

    <?php
      require "../partials/nav.php";
    ?>

    <!-- FIN HEADER -->

    <!-- titulo -->

    <div class="grupos m-5">
      <h2>Grupo</h2>
    </div>

    <!-- titulo -->

    <div class="funcionalidades">
      <?php
        require "../partials/UpLoadFiles/upLoadFile.html";
      ?>
    </div>

    <!--BUSCADOR -->

    <div class="container mt-5">
      <form class="d-flex">
        <input
          class="form-control rounded-pill shadow p-2 bg-body rounded"
          type="search"
          placeholder="BUSCAR"
          aria-label="Search"
        />
        <button class="btn btn-outline-info rounded-pill" type="submit">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-search"
            viewBox="0 0 16 16"
          >
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
            />
          </svg>
        </button>
      </form>
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
    <?php
      require "../partials/footer.php";
    ?>

    <!-- bootstrap -->
  </body>
</html>
