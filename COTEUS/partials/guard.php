<?php
    $nFormula=$_REQUEST['nombre_formula'];
    $formula=$_REQUEST['formula'];
    $conexion=mysqli_connect("localhost", "root", "123456789", "coteus") or die("Problemas de conexion");
    mysqli_query($conexion,"insert into calculator_t(name_function, formula_function) values ('$nFormula', '$formula')") or die("Problemas con insercion ".mysqli_error($conexion));
    $registro=mysqli_query($conexion, "select name_function, formula_function from calculator_t") or die("Problemas de select".mysqli_error($conexion));
    
    mysqli_close($conexion);
?>