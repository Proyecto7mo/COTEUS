<?=

  mkdir(BuscarEmpleado($_SESSION['id_user'])['nameuser'], 0777, true);

  var_dump($_FILES['file']);

?>
