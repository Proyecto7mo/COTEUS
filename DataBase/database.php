<?php
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'coteus';

  try{
    $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } catch(PDOException $e){
    die('Conexion a Base de Datos Fallida' . $e->getMessage());
  }
?>
