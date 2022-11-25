<?php
//ShowF();
if(isset($_POST['valF'])){

  switch($_POST['valF']){
    case "MostrarF":
      ShowF();
      break;
    case "EliminarF":
      DeleteF();
      header('Location: http://localhost/coteus/Grupo/group.php');
      break;
    default:
      # code...
      break;
  }
  //echo($_POST['idUser']);
  //echo($_POST['idGroup']);

  /*$useractip=$_POST['userRol'];
  require_once "../../class/files.php";

  $file_records = files::getFilesFromUser($_POST['idGroup']);
  
  $files = []; // array of objects of type files
  foreach ($file_records as $key => $file_record) {
    $files[$key] = new files($file_record);
  }

  $userfiles="";
  foreach($files as $key => $file){
  $userfiles.='
      <div class="d-flex m-3" id="mas">
        <button class="card-title p-2 flex-grow-1" id="userbtn"><h5 class="card-title p-2 flex-grow-1"><a href="../files_users/'.$file->nameUserFile.'/'.$file->name.'" target="_blank">'.$file->name.'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <div id="tipf">Ultima modificacion: '.$file->last_modification.'</div></h5></button>';

        
        if($useractip=="A"){
          $userfiles.='<button
          class="btn btn-primary"
          type="button"
          id="dropdownMenuButton1"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          Opciones
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li>
          <form id="Aumentar" action="../partials/upload_files/upload_files.php" method="POST" onsubmit="state();">
            <input type="hidden" name="val" value="EliminarF">
            <input type="hidden" name="iduser" value="'.$file->id_file.'">
            <input class="dropdown-item" type="submit" value="Aumentar rango">
          </form>
          <!--<a id="aumentar" class="dropdown-item" href="./" onclick="alerta()">Aumentar rango</a>-->
          </li>
          <li>
          <form id="Bajar" action="group.php" method="POST" onsubmit="state();">
            <input type="hidden" name="val" value="BajarM">
            <input type="hidden" name="iduser" value="'.$file->id_file.'">
            <input class="dropdown-item" type="submit" value="Bajar rango">
          </form>
          <!--<a id="aumentar" class="dropdown-item" href="./" onclick="alerta()">Aumentar rango</a>-->
          </li>
          <li>
          <form id="EliminarF" action="group.php" method="POST" onsubmit="state();">
            <input type="hidden" name="val" value="EliminarF">
            <input type="hidden" name="iduser" value="'.$file->id_file.'">
            <input class="dropdown-item" type="submit" value="Eliminar archivo">
          </form>
          <!--<a id="eliminar" class="dropdown-item" href="#" onclick="alerta()">Eliminar archivo</a>-->
          </li>
        </ul>';
        }

        $userfiles.='</div>';
  }

  echo($userfiles);*/

}

function ShowF(){
  //echo($_POST['idUser']);
  //echo($_POST['idGroup']);

  $useractip=$_POST['userRol'];
  require_once "../../class/files.php";

  $file_records = files::getFilesFromUser($_POST['idGroup']);
  
  $files = []; // array of objects of type files
  foreach ($file_records as $key => $file_record) {
    $files[$key] = new files($file_record);
  }

  $userfiles="";
  foreach($files as $key => $file){
  $userfiles.='
      <div class="d-flex m-3" id="mas">
        <button class="card-title p-2 flex-grow-1" id="userbtn"><h5 class="card-title p-2 flex-grow-1"><a href="../files_users/'.$file->nameUserFile.'/'.$file->name.'" target="_blank">'.$file->name.'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <div id="tipf">Ultima modificacion: '.$file->last_modification.'</div></h5></button>';

        
        if($useractip=="A"){
          $userfiles.='<button
          class="btn btn-primary"
          type="button"
          id="dropdownMenuButton1"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          Opciones
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li>
          <form id="EliminarF" action="../partials/upload_files/upload_files.php" method="POST">
            <input type="hidden" name="valF" value="EliminarF">
            <input type="hidden" name="idfile" value="'.$file->id_file.'">
            <input type="hidden" name="userRol" value="'.$useractip.'">
            <input type="hidden" name="idGroup" value="'.$_POST['idGroup'].'">
            <input class="dropdown-item" type="submit" value="Eliminar archivo">
          </form>
          <!--<a id="eliminar" class="dropdown-item" href="#" onclick="alerta()">Eliminar archivo</a>-->
          </li>
        </ul>';
        }

        $userfiles.='</div>';
  }

  echo($userfiles);
}

function DeleteF(){
  require_once "../../class/files.php";

  $useractip=$_POST['userRol'];
  if($useractip=="A"){
    files::deleteFileFromGroup($_POST['idfile'], $_POST['idGroup']);
    ShowF();
  }
}

if($_FILES){

  require_once "./../class/employee.php";

  $employee = new employee();
  $employee_record = $employee->get($_SESSION['user_id']);
  $directory = "../files_users/" . $employee_record['username'] . "/"; // "./../files_users/a/"
  
  if(!file_exists($directory)){ // si existe una carpeta/archivo
    // en el caso de que no exista la carpeta, se crea.

    // crea la carpeta del usuario con los permisos 0777
    mkdir($directory, 0777);
  }

  for($key = 0; $key < count($_FILES["files"]["name"]); $key++) {
    if($_FILES["files"]["name"][$key]){
      
      $file_name_full = $_FILES["files"]["name"][$key]; // "01_example.txt"
      $file_tmp_name = $_FILES["files"]["tmp_name"][$key]; // "C:\xampp\tmp\phpCB40.tmp"
      $path_file = $directory . $file_name_full;

      if(file_exists($path_file)){ // si existe el archivo se le informa que dabe cambiarle el nombre
        echo "
        <script>
          alert('El archivo $file_name_full ya existe. debe cambiarle el nombre para subirlo.');
        </script>
        ";
      }
      else{ // el archivo no existe
        // se abre el directorio para mover al archivo al directorio de destino
        $opened_directory = opendir($directory);
        // mueve el archivo de un directorio temporal destino a moverlo a la carpeta del usuario
        move_uploaded_file($file_tmp_name, $path_file);
        // cerrando el directorio del usuario
        closedir($opened_directory);
        // convirtiendo el registro del empleado con la sesion iniciada a un objeto
        $employee = employee::record_to_object($employee_record);
        // inserta el archivo en la base de datos
        $employee->uploadfile($file_name_full);
      }
    }
  }
}

/* function get_number_of_copies($directroy, $file_name){

  $files = scandir($directroy);
  $number = 0;

  foreach($files as $file){
    if($file_name == $file){
      $number++;
    }
  }

  return $number;
} */

/*
foreach($_FILES["files"] as $file){
  
  foreach($file as $property){
    echo $property . " | ";
  }
  echo "<br>";
}
 */
