<?php
    session_start();
    require '../../../class/employee.php';
    $nFormula=$_REQUEST['nombre_formula'];
    $formula=$_REQUEST['formula'];
    $id_employee=$_SESSION['user_id'];
    employee::addformula($nFormula, $formula, $id_employee);
?>