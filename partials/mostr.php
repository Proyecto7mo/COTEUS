<script>
    function listform()
    {
    var s=document.getElementById("Tformulas");
    var option=document.createElement('option');
    option.id=nombreform;
    option.value=val;
    option.text=nombreform+" "+val;
    s.appendChild(option);
    }
</script>
<?php
$conexion=mysqli_connect("localhost", "root", "123456789", "coteus") or die("Problemas de conexion");
$registros=mysqli_query($conexion, "select name_function, formula_function from calculator_t") or die("Problemas de select".mysqli_error($conexion));
    while ($reg = mysqli_fetch_array($registros))
    {
        $nombreform=$reg['name_function'];
        $formula=$reg['formula_function'];
        echo "<script>";
        echo "var val ='$formula';";
        echo "var nombreform ='$nombreform';";
        echo 'listform();';
        echo "</script>";
    }
    mysqli_close($conexion);
?>
