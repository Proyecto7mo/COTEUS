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

session_start();
$id_employee=$_SESSION['user_id'];

require '../../../class/employee.php';
$stmt=employee::listformulas($id_employee);
echo "<script>";
echo "var val =' ';";
echo "var nombreform ='Seleccione o cree una formula';";
echo 'listform();';
echo "</script>";
    while ($reg = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $nombreform=$reg['name_function'];
        $formula=$reg['formula_function'];
        echo "<script>";
        echo "var val ='$formula';";
        echo "var nombreform ='$nombreform';";
        echo 'listform();';
        echo "</script>";
    }
?>