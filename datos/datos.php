<?php

class datos{
  
  public static function get_employee($employee){

    // de $employee se usa la columna primary key de la tabla.

    require("../database/database.php");

    $stmt = $conexion->prepare('SELECT * FROM employees_t WHERE nameuser = :nameuser');
    $stmt->bindParam(':nameuser', $employee->username);
    $stmt->execute();

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    return $record;
  }

  public static function insert_employee($employee){
    
    require '../database/database.php'; // para obtener la variable conexion
    $result = 0;

    $query = "INSERT INTO employees_t (name, surname, nameuser, password, email, telephono, cuil) VALUES (:name, :surname, :nameuser, :password, :email, :telephono, :cuil)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':name', $employee->name);
    $stmt->bindParam(':surname', $employee->surname);
    $stmt->bindParam(':nameuser', $employee->username);
    $stmt->bindParam(':email', $employee->email);
    $stmt->bindParam(':telephono', $employee->telephono);
    $stmt->bindParam(':cuil', $employee->cuil);

    // hasheando la password
    $password_hashed = password_hash($employee->password, PASSWORD_BCRYPT);
    // insertando en la base de datos la password hasheada
    $stmt->bindParam(':password', $password_hashed);

    if($stmt->execute())
    {
      $result = 1;
    }
    else{
      $result = -1;
    }

    return $result;
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

/*   public static function employee_registered($employee){

    // indica si esta registrado <<el nameuser>> del empleado.

    require "../database/database.php"; // para obtener la variable de conexion
    $registered = false;

    $stmt = $conexion->prepare('SELECT id_user, nameuser, password FROM employees_t WHERE nameuser = :nameuser');
    $stmt->bindParam(':nameuser', $employee->email);
    $stmt->execute();
    
    $records = $stmt->fetch(PDO::FETCH_ASSOC);

    if($records > 0){
      $registered = true;
    }else{
      $registered = false;
    }

    return $registered;
  } */

  public static function insert_group($group){
    require '../database/database.php'; // para obtener la variable conexion
    $result=0;

    $DateCreated=date('y-m-d h:i:s', time());
    $query="INSERT INTO groups_t (admin, name, fecha) VALUES (:id_user, :groupname, :fecha)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_user',$group->admin);
    $stmt->bindParam(':groupname',$group->groupname);
    $stmt->bindParam(':fecha',$DateCreated);

    if($stmt->execute())
    {
      $result = 1;
    }
    else{
      $result = -1;
    }

    return $result;
  }
}
