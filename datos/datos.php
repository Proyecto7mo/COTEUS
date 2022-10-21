<?php
  
  //require '../database/database.php';
  
  class datos{
    
    public static function get_employee($employee_id){

      require("../database/database.php");
  
      $records = $conexion->prepare('SELECT * FROM employees_t WHERE id_employee = :id_employee');
      $records->bindParam(':id_employee', $employee_id);
      $records->execute();
  
      $results = $records->fetch(PDO::FETCH_ASSOC);
  
      return $results;
    }
  
    public static function insert_employee($employee){
      
      require("../database/database.php");
  
      $query = "INSERT INTO employees_t (name, surname, nameuser, password, email, telephono) VALUES (:name, :surname, :nameuser, :password, :email, :telephono)";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':name', $employee->name);
      $stmt->bindParam(':surname', $employee->surname);
      $stmt->bindParam(':nameemployee', $employee->nameuser);
      $stmt->bindParam(':email', $employee->email);
      $stmt->bindParam(':telephono', $employee->telephono);
  
      // hasheando la password
      $password_hashed = password_hash($employee->password, PASSWORD_BCRYPT);
      // insertando en la base de datos la password hasheada
      $stmt->bindParam(':password', $password_hashed);
  
      return $stmt->execute();
    }
  
    public static function insert_file($file)
    {
      require("../database/database.php");
      
      $query = "INSERT INTO files_t (name, path, owner, lastModification, state) VALUES (:name, :path, :owner, :lastModification, :state)";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(':name', $file->name);
      $stmt->bindParam(':path', $file->path);
      $stmt->bindParam(':owner', $file->owner);
      $stmt->bindParam(':lastModification', $file->last_modification);
      $stmt->bindParam(':state', $file->state);
      
      return $stmt->execute();
    }

    public static function insert_group(){

      require("../database/database.php");
      $query="INSERT INTO groups_t (id_groups, name, admin, id_files, id_chores) VALUES (:id, :name, :admin, :idfi, :idch)";
      $stmt=$conexion->prepare($query);
      $groupname="aa";
      $admin="bb";
      $id=32;
      $idfi=22;
      $idch=45;
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':name', $groupname);
      $stmt->bindParam(':admin', $admin);
      $stmt->bindParam(':idfi', $idfi);
      $stmt->bindParam(':idch', $idch);
      echo "estoy en insertgroupv2";
      return $stmt->execute();
    }
  }
?>
