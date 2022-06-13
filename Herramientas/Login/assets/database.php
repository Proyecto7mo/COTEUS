<<<<<<< HEAD:Herramientas/Login/assets/database.php
<?php
  $server = 'localhost';
  $username = 'root';
  $password = 'jerekpo289';
  $database = 'coteus';

  try{
    $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  }catch(PDOException $e){
    die('Conexion a Base de Datos Fallida' . $e->getMesseage());
  }

?>
=======
<?php
  $server = 'localhost';
  $username = 'root';
  $password = 'jerekpo289';
  $database = 'coteus';

  try{
    $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  }catch(PDOException $e){
    die('Conexion a Base de Datos Fallida' . $e->getMesseage());
  }

?>
>>>>>>> 92fad7a9998368220492c22770b5e391a372a910:COTEUS/assets/database.php
