<?php
  
  session_start();
  
  // validando sesion abirta de empleado
  if (!isset($_SESSION['user_id'])) {
    echo "
      <script>
        alert('Parece que no iniciaste sesion. Te vamos a redireccionar al Login.');
        window.location.href = 'http://localhost/COTEUS/Login';
      </script>
    ";
  }
  // si tiene una invitacion de un grupo por un link, lo redirecciona a ese grupo
  if(isset($_SESSION['url'])){

    // si tiene una invitacion de un grupo por link, se va a ese grupo
    $locate = 'Location: http://localhost' . $_SESSION['url'];
    header($locate);
    unset($_SESSION['url']);
  }

  require_once "../partials/upload_files/upload_files.php";
  require_once "../class/employee.php";
  require_once "../class/files.php";
  require_once '../class/group.php';
  $message = "";
  
  $employee_record = employee::get_by_id($_SESSION['user_id']);
  $employee = employee::record_to_object($employee_record);
  $file_records = $employee->get_files();
  
  $files = []; // array of objects of type files
  foreach ($file_records as $key => $file_record) {
    $files[$key] = new files($file_record);
  }
  
  $folder = "../files_users/$employee->username/";      
  $groups_employee = group::getgroups($employee->id_employee);
  
  if($_POST){
    
    $id_group = $_POST['id_group'];
    $id_file = $_POST['submit'];

    $record_file = files::get($id_file);

    if($id_group > 0 && $employee->has_file($record_file['id_file'])){
      // selecciono un grupo y el archivo le pertenece al empleado
      
      $group_record = group::get($id_group);

      $message .= "<script> alert('grupo " . $group_record['name'] . " seleccionado.'); </script> ";
      $message .= "<script> alert('archivo " . $record_file['name'] . " seleccionado.'); </script> ";

      $result = $employee->public_file($id_file, $group_record['id_group']);

      $message .= $result ? "<script> alert('Archivo publicado'); </script> " : "<script> alert('Ocurrio un error. Archivo no publicado'); </script> ";
    }
    else{
      // no hay grupo seleccionado
      $message .= "<script> alert('No hay grupo seleccionado o el archivo no le pertenece.'); </script> ";
    }
  }
?>
<?= $message ?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- bootstrap -->

    <?php include "../partials/linkCSS.php"; ?>
  </head>

  <body>
    <!-- INICIO HEADER -->
    <div class="header">
      <?php include "../partials/HTML/header/header.php"; ?>
    </div>
    <!-- FIN HEADER -->
    <div class="pages">
      <?php include "../partials/HTML/nav/nav.php"; ?>
    </div>
    <!-- FIN NAV -->

    <!-- INICIO CARD USUARIO -->
    <div class="d-flex justify-content-center">
      <div class="mb-3 mt-4" style="max-width: 540px">
        <div class="row">
          <div class="col-md-4">
            <img src="../img/users/ProfilePhoto.png" class="img-fluid img-card1 rounded-pill shadow p-2 bg-body" id="user-photo" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">
                <?= "Hola " . $employee_record['name']; ?>!
              </h5>
              <p class="card-text">
                <?= $employee_record['username'] ?>
              </p>
              <p class="card-text">
                <small class="text-muted"> <?= $employee_record['email']; ?></small>
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
                  <?= "Archivo <a href='$path' target='_blank'> " . $file->name . " </a> "; ?>
                </h5>
                <?php if(count($file->get_groups()) > 0): ?>
                  <p class="card-text">
                    Compartiendo archivo con:
                    <ul>
                      <?php foreach ($file->get_groups() as $key => $group_name): ?>
                        <li> <?= $group_name ?> </li>
                      <?php endforeach; ?>
                    </ul>
                  </p>
                <?php else: ?>
                  <div>
                    <p> Privado. </p>
                  </div>
                <?php endif; ?>
                <?php if(count($file->get_groups_without_sharing($employee)) > 0): ?>
                  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <select name="id_group">
                      <option value="-1">Seleccionar</option>
                      <?php foreach ($file->get_groups_without_sharing($employee) as $group_record): ?>
                        <option value="<?= $group_record['id_group'] ?>"><?= $group_record['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <button type="submit" name="submit" value="<?= $file->id_file ?>">
                      Hacer público
                    </button>
                  </form>
                <?php endif; ?>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                  <?= $file->last_modification ?>
                </small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else:?>
      <p> No tenes Archivos </p>
    <?php endif; ?>
    <!-- ARCHIVOS -->

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" ></script>
    <!-- bootstrap -->

    <!-- INICIO FOOTER -->
    <?php include "../partials/HTML/footer/footer.php"; ?>
    <!-- FIN FOOTER -->

  </body>
</html>
