<?php
    $nForm=$_REQUEST['nameform'];
    $form=$_REQUEST['form'];
    
    $connection=mysqli_connect("localhost", "root", "", "coteus") or die("Problemas de conexión");
    
    mysqli_query($connection,"INSERT INTO calculator_t(name_function, formula_function) VALUES ('$nForm', '$form')")
    or die ("Problemas con insercion ".mysqli_error($connection));
    
    $record=mysqli_query($conexion, "select name_function, formula_function from calculator_t") 
    or die("Problemas de select".mysqli_error($connection));
    
    mysqli_close($connection);
?>