<?php
  
  session_start();
  
  if (!isset($_SESSION['user_id'])) {
    echo "
    <script>
      alert('Parece que no iniciaste sesion. Te vamos a redireccionar al Login.');
      window.location.href = 'http://localhost/COTEUS/Login';
    </script>
  ";
  }

  if(isset($_SESSION['url'])){
    // si tiene una invitacion de un grupo por link, se va a ese grupo
    $locate = 'Location: http://localhost' . $_SESSION['url'];
    header($locate);
    unset($_SESSION['url']);
  }
  
  if($_POST && $_POST['submit'] == "change_visibility"){

    $group = $_POST['group'];

    if($group > 0){
      // selecciono un grupo

    }
    else{
      // no hay grupo seleccionado
      echo "<script> alert('No hay grupo seleccionado.'); </script> ";
    }
  }

  require_once "../partials/upload_files/upload_files.php";
  require_once "../class/employee.php";
  require_once "../class/files.php";
  require_once '../class/group.php';


  $employee_record = employee::get_by_id($_SESSION['user_id']);
  $employee = employee::record_to_object($employee_record);

  $file_records = $employee->get_files();
  // array of objects
  $files = [];

  foreach ($file_records as $key => $file_record) {
    $files[$key] = new files($file_record);
  }

  $folder = "../files_users/$employee->username/";      
  $groups_employee = group::getgroups($employee->id_employee);
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
    <script src="https://kit.fontawesome.com/3a5da5265b.js" crossorigin="anonymous"></script>
    <!-- font awesome -->

    <title>COTEUS | Home</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- bootstrap -->

    <?php include "../partials/linkCSS.php"; ?>

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

    <!-- INICIO CARD USUARIO -->
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
                <?php "Hola " . $employee_record['name']; ?>
              </h5>
              <p class="card-text">
                <?= $employee_record['username'] ?>
              </p>
              <p class="card-text">
                <small class="text-muted"><?= $employee_record['email']; ?></small>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN CARD USUARIO -->

    <div class="functions">
      <?php include '../partials/upload_files/upload_files.html'; ?>
    </div>
    
  <!-- ARCHIVOS -->
  <?php if(count($files) > 0): ?>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 p-5">
        <?php foreach($files as $key => $file):
          $path = $folder . $file->name;
          $type = is_dir($path) ? "Carpeta" : "Archivo";
        ?>
          <div class="col" id="cf">
            <div class="card h-100">
              <div class="card-img-top icon-card">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                  <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                  <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                </svg>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <?= "$type <a href='$path' target='_blank'> " . $file->name . " </a> "; ?>
                </h5>
                <p class="card-text">
                  <?php if(count($file->get_groups()) > 0): ?>
                    Compartiendo archivo con:
                    <ul>
                      <?php foreach ($file->get_groups() as $group_name): ?>
                        <li> <?= $group_name ?> </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php else: ?>
                    <div>
                      <p> Privado. </p>
                      <input type="hidden" name="id_file" value="<?= $file->id_file ?>" form="change_visibility">
                      <select name="group" form="change_visibility">
                        <option value="-1">Seleccionar</option>
                        <?php foreach ($groups_employee as $key => $group): ?>
                          <option value="<?= $group->id_group ?>"><?= $group->name ?></option>
                        <?php endforeach; ?>
                      </select>
                      <button type="submit" form="change_visibility" name="submit" value="change_visibility">
                        Hacer publico
                      </button>
                    </div>
                  <?php endif; ?>
                </p>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  <?= $file->last_modification ?>
                </small>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php else:?>
      <p> No tenes Archivos </p>
    <?php endif; ?>
    <!-- ARCHIVOS -->

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="change_visibility"></form>

    <!-- bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <!-- bootstrap -->

    <!-- INICIO FOOTER -->
    <?php require ("../partials/HTML/footer/footer.php");?>
    <!-- FIN FOOTER -->

  </body>
</html>
