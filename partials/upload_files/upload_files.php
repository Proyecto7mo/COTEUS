<?php

if($_FILES){
  for($key = 0; $key < count($_FILES["files"]["name"]); $key++) {
    if($_FILES["files"]["name"][$key]){
  
      $file_name = $_FILES["files"]["name"][$key];
      $file_tmp_name = $_FILES["files"]["tmp_name"][$key];
      
      require_once "C:/xampp/htdocs/COTEUS/datos/datos.php";
      $directorio = "C:/xampp/htdocs/COTEUS/files_users/" . datos::get_employee_id($_SESSION['user_id'])['nameuser'] . "/";
  
      if(!file_exists($directorio)){ // si existe una carpeta/archivo
        // en el caso de que no exista la carpeta, se crea.
        mkdir($directorio, 0777);
      }
  
      $opened_directory = opendir($directorio);
      $path = $directorio . $file_name;
  
      if(move_uploaded_file($file_tmp_name, $path)){
        echo "se subio el archivo $file_name correctamente. <br>";
      }else{
        echo "ocurrio un error, no se subio el archivo.";
      }
  
      closedir($opened_directory);
    }
  }
}

/* foreach($_FILES["files"] as $file){
  
  foreach($file as $property){
    echo $property . " | ";
  }
  echo "<br>";
} */

