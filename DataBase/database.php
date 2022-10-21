<?php
  $server = 'localhost';
  $username = 'root';
  $password = '123456789';
  $database = 'coteus';

  try{
    $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } catch(PDOException $e){
    die('Conexion a Base de Datos Fallida' . $e->getMessage());
  }
?>
