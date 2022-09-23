<?php

class datos{
  
  public static function get_employee($employee){

    require("../database/database.php");

    $stmt = $conexion->prepare('SELECT * FROM employees_t WHERE nameuser = :nameuser');
    $stmt->bindParam(':nameuser', $employee->username);
    $stmt->execute();

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    return $record;
  }

  public static function get_employee_id($employee_id){

    // de $employee_id se usa la columna primary key de la tabla.

    require("../database/database.php");

    $stmt = $conexion->prepare('SELECT * FROM employees_t WHERE id_user = :id_user');
    $stmt->bindParam(':id_user', $employee_id);
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
    $query="INSERT INTO groups_t (admin, name, fecha) VALUES (:id_user, :groupname, :fecha);
    INSERT INTO regisgroup_t (id_user, id_groups, fecha) VALUES (:id_user, (SELECT MAX(id_groups) idgroup FROM groups_t WHERE admin=:id_user), :fecha);";
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
    /*$conexion=null;
    require '../database/database.php'; // para obtener la variable conexion
    $query2="SELECT MAX(id_groups) idgroup FROM groups_t WHERE admin=:admin";
    $stmt2->$conexion->prepare($query2);
    $stmt2->bindParam(':admin', $group->admin);
    $stmt2->execute();
    $idgroup=$stmt2->fetch();
    $stmt->execute();
    $stmt2->execute();
    require '../database/database.php'; // para obtener la variable conexion
    $query3="INSERT INTO regisgroup_t (id_user, id_groups, fecha) VALUES (:id_user, (SELECT MAX(id_groups) idgroup FROM groups_t WHERE admin=:admin), :fecha)";
    $stmt3->$conexion->prepare($query3);
    $stmt3->bindParam(':id_user', $group->admin);
    $stmt3->bindParam(':id_group', $idgroup[0]);
    $stmt3->execute();*/

    return $result;
  }

  public static function get_groups($user_id){
    require '../database/database.php'; // para obtener la variable conexion
    $result;

    $query="SELECT groups_t.name FROM groups_t INNER JOIN regisgroup_t ON groups_t.id_groups=regisgroup_t.id_groups INNER JOIN employees_t ON employees_t.id_user=regisgroup_t.id_user WHERE employees_t.id_user=:id_user";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_user', $user_id);
    $stmt->execute();
    $resp=$stmt->fetchAll(PDO::FETCH_OBJ);
    /*if($stmt->execute())
    {
      $result = 1;
    }
    else{
      $result = -1;
    }*/

    return $resp;
  }
}
