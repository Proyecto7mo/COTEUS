<?php

  function get_employee($user_id){

    require("../database/database.php");

    $records = $conexion->prepare('SELECT * FROM users_t WHERE id_user = :id_user');
    $records->bindParam(':id_user', $user_id);
    $records->execute();

    $results = $records->fetch(PDO::FETCH_ASSOC);

    return $results;    
  }

  function insert_employee($name, $surname, $nameuser, $email, $telephono, $name_enterprise){
    
    require("../database/database.php");

    $query = "INSERT INTO users_t (name, surname, nameuser, password, email, telephono) VALUES (:name, :surname, :nameuser, :password, :email, :telephono)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':nameuser', $nameuser);

    // hasheando la password
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);
    // insertando en la base de datos la password hasheada
    $stmt->bindParam(':password', $password_hashed);
    
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephono', $telephono);

    return $stmt->execute();
  }

  function upload_file($file_path, $file_name, $employee_name, $last_modification, $state)
  {
    require("../database/database.php");
    
    $query = "INSERT INTO files_t (name, path, owner, lastModification, state) VALUES (:name, :path, :owner, :lastModification, :state)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':path', $path);
    $stmt->bindParam(':owner', $owner);
    $stmt->bindParam(':lastModification', $last_modification);
    $stmt->bindParam(':state', $state);
    
    return $stmt->execute();
  }
?>
