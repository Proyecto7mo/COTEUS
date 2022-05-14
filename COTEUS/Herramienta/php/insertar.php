<?php

    // Jeremias Cuello 7/5
    //   Resumen: Permite subir archivos a un directorio del dominio.
    // En la base de datos se guarda la ruta de los archivos. Asi es
    // como se hace referencia a los archivos. Este dato se formatea
    // con el siguiente formato:
    //  <directorio>/<dia>-<mes>-<anio>-<hora>-<minutos>-<segundos>-nombre
    // La orden de la realizacion de SubirArchivo y InsertarR

    require("config.php");

    // Indica si hay conexion con la base de datos.
    TestConnectivity($conexion);
    
    ImprimirFechaHoy();

    if( ($conexion) && ($_FILES["archivo"]) ){
        
        echo "HAY ARCHIVO <BR>";
        
        try{
            $nameFile = FormatearRuta("../archivos/");
            $name = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $fecha = $_POST["fecha"];
            
            $subirArchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $nameFile);
            echo "SE SUBIO EL ARCHIVO. <BR>";
            
            if($subirArchivo){
                
                $insertarSQL = "INSERT INTO informes(nombre, apellidos, fecha, archivo) VALUES('$name', '$apellido', '$fecha', '$nameFile')";
                $result = mysqli_query($conexion, $insertarSQL);
                
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

function FormatearRuta($directory){
    
    // Jeremias Cuello 7/5
    //   Resumen: Formatea la ruta de los archivos.
    // Criterio del formato:
    //     <directorio>/<dia>-<mes>-<anio>-<hora>-<minutos>-<segundos>-<nombre>
    // formato ejemplo: 07-05-22-00-00-50-logoTecnica5.png

    $nameFile = basename($_FILES["archivo"]["name"]);
    
    return $directory . date("d-m-y-H-i-s-") . $nameFile;
}

function InsertarDatos($name, $surname, $date, $path){
    
    // Jeremias Cuello 7/5
    //   Resumen: Inserta los datos a la base de datos e indica el resultado.
    
    /*
    $insertarSQL = "INSERT INTO informes(nombre, apellidos, fecha, archivo) VALUES('$name', '$surname', '$date', '$path')";

    $result = mysqli_query($conexion, $insertarSQL);
    
    if($result){
        echo "SE REALIZO LA INSERCION DE DATOS.";
        echo "<script> alert('Se ha subido su archivo y jere es un crack.'); </script>";
    } else{
        echo "ERROR: CONSULTA NO REALIZADA.";
    }
    */
}

function TestConnectivity($conexion){
    
    if($conexion){
        echo "CONECTADO A LA BASE DE DATOS. <BR>";
    } else{
        echo "ERROR: SIN CONEXION A LA BASE DE DATOS. <BR>";
    }
}

function ImprimirFechaHoy(){
    echo "HOY ES " . date("d") . " de " . date("M") . " del " . date("Y") . "<BR>";
}

?>

<div style="display: flex; gap: 50px;">
            <a class="enlace" href="../archivos" class="BTNArchivos"> Ir a los archivos </a>
            <a class="enlace" href="<?php echo $nameFile ?>" class="BTNArchivos"> Ir al archivo subido </a>
            <a class="enlace" href="../" class="BTNInicio"> Ir al Inicio </a>
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
