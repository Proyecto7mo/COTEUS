<?php

class datos{
  
  public static function get_employee($employee_key){

    // employee_key es la columna primary key de la tabla. sea el mail sea lo que sea.

    require("../database/database.php");

    $records = $conexion->prepare('SELECT * FROM employees_t WHERE id_user = :id_user');
    $records->bindParam(':id_user', $employee_key);
    $records->execute();

    $results = $records->fetch(PDO::FETCH_ASSOC);

    return $results;
  }

  public static function insert_employee($employee){
    
    require("../database/database.php");

    $query = "INSERT INTO employees_t (name, surname, nameuser, password, email, telephono, cuil) VALUES (:name, :surname, :nameuser, :password, :email, :telephono, :cuil)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':name', $employee->name);
    $stmt->bindParam(':surname', $employee->surname);
    $stmt->bindParam(':nameuser', $employee->nameuser);
    $stmt->bindParam(':email', $employee->email);
    $stmt->bindParam(':telephono', $employee->telephono);

    echo "Desde datos" . $employee->to_string();

    // hasheando la password
    $password_hashed = password_hash($employee->password, PASSWORD_BCRYPT);
    // insertando en la base de datos la password hasheada
    $stmt->bindParam(':password', $password_hashed);    

    $stmt->execute();
  }

  /* function upload_file($file_path, $file_name, $employee_name, $last_modification, $state)
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
  } */
}