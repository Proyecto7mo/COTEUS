<?php

if($_FILES){
  for($key = 0; $key < count($_FILES["files"]["name"]); $key++) {
    if($_FILES["files"]["name"][$key]){
  
      $file_name = $_FILES["files"]["name"][$key];
      $file_tmp_name = $_FILES["files"]["tmp_name"][$key];
      
      require_once "./../datos/datos.php";
      $directorio = "./../files_users/" . datos::get_employee_id($_SESSION['user_id'])['nameuser'] . "/";
  
      if(!file_exists($directorio)){ // si existe una carpeta/archivo
        // en el caso de que no exista la carpeta, se crea.
        mkdir($directorio, 0777);
      }
  
      $opened_directory = opendir($directorio);
      $path = $directorio . $file_name;
  
      if(move_uploaded_file($file_tmp_name, $path)){
        echo "EL archivo $file_name se ha subido correctamente. <br>";
      }else{
        echo "Ha occurrido un error. No se ha podido subir el archivo correctamente.";
      }
  
      closedir($opened_directory);
      
      header('Location: http://localhost/coteus/Home/');
    }
  }
}

/* foreach($_FILES["files"] as $file){
  
  foreach($file as $property){
    echo $property . " | ";
  }
  echo "<br>";
} */

