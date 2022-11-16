<?php

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

/*function get_number_of_copies($directroy, $file_name){

  $files = scandir($directroy);
  $number = 0;

    foreach($files as $file){
      if($file_name == $file){
        $number++;
      }
    }
    
    return $number;
  }
      
        foreach($_FILES["files"] as $file){

          foreach($file as $property){
            echo $property . " | ";
          }
          echo "<br>";
         }
      */
