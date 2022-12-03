<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        if($_POST['valfor']=="GuardarF"){
            GuardarF();
        }
        if($_POST['valfor']=="EliminarF"){
            EliminarF();
        }
    }
function GuardarF(){
    require_once '../../../class/employee.php';
    $nFormula=$_REQUEST['nombre_formula'];
    $formula=$_REQUEST['formula'];
    $id_employee=$_SESSION['user_id'];
    employee::addformula($nFormula, $formula, $id_employee);
}
function EliminarF(){
    require_once '../../../class/employee.php';
    $id_calc=$_REQUEST['id_calc'];
    employee::deleteformulas($id_calc);
}
?>