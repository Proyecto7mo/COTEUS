<?=
  // Jeremias Cuello 7/5
  //   Resumen: Permite subir archivos a un directorio del dominio.
  // En la base de datos se guarda la ruta de los archivos. Asi es
  // como se hace referencia a los archivos. Este dato se formatea
  // con el siguiente formato:
  //  <directorio>/<dia>-<mes>-<anio>-<hora>-<minutos>-<segundos>-nombre
  // La orden de la realizacion de SubirArchivo y InsertarR
  
  start_session();
  require '../datos/datos.php';

  $file = $_FILES["file"];

  if($file){
    
    echo "HAY ARCHIVO <BR>";
      
    try {
      $employee_name = obtener_empleado($_SESSION['id_user'])['nameuser'];
      // crea una carpeta con el nombre del nombre de usuario del empleado
      mkdir($employee_name, 0777, true);
      // formatea la ruta del archivo
      $file_path = FormatearRuta($employee_name);

      $messeage = require '../partials/messeages/CreatedFolder.php';
    }
    catch (PDOException $e) {
      $messeage = require '../partials/messeages/NotCreatedFolder.php';
    }
    
    try {
      $subirArchivo = move_uploaded_file($file["tmp_name"], $file_path);
      
      $messeage = require '../partials/messeages/fileUpLoaded.php';
    } catch (PDOException $e) {
      $messeage = require '../partials/messeages/fileNotUpLoaded.php';
    }

    try{
      if($subirArchivo){
        
        $file_name = get_name_file($file);

        insertar_archivo($file_path, $file_name, $employee_name, date('d-m-y-H-i-s'), false);
        
        if($result){
          echo "SE REALIZO LA INSERCION DE DATOS.";
          echo "<script> alert('Se ha subido su archivo y jere es un crack.'); </script>";
        } else{
          echo "ERROR: CONSULTA NO REALIZADA.";
        }
      }
      else{
        echo "ERROR: ARCHIVO NO SUBIDO. <BR>";
      }
    }
    catch(Excepction $e){
      echo "ERROR: ARCHIVO NO SUBIDO. <BR>";
      echo $e->getMesseage();
    }
  }
  else{
      echo "ERROR: ARCHIVO NO SUBIDO.";
  }

  function FormatearRuta($name_folder){

  get_name_file($_FILES["file"]);
    
  $directory = "../" . $name_folder . "/";

  $path = $directory . date("d-m-y-H-i-s-") . $file_name;

  return $path;
  }

  function get_name_file($file){
    return basename($file["name"]);
  }
?>

<div style="display: flex; gap: 50px;">
  <a class="enlace" href="../<?php echo $employee_name ?>" class="BTNArchivos"> Ir a los archivos </a>
  <a class="enlace" href="<?php echo $file_path ?>" class="BTNArchivos"> Ir al archivo subido </a>
  <a class="enlace" href="../"> Ir al Inicio </a>
</div>

<style>
  .enlace{
    text-decoration: none;
    border: solid rgb(53, 19, 206);
    border-radius: 20px;
    background: rgb(139, 139, 139);
    padding: 15px;
  }
</style>
