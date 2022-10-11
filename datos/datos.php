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
    $query="INSERT INTO groups_t (admin, name, fecha, clave) VALUES (:id_user, :groupname, :fecha, :clave);
    INSERT INTO regisgroup_t (id_user, id_groups, fecha, tipo) VALUES (:id_user, (SELECT MAX(id_groups) idgroup FROM groups_t WHERE admin=:id_user), :fecha, 'A');";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_user',$group->admin);
    $stmt->bindParam(':groupname',$group->groupname);
    $stmt->bindParam(':fecha',$DateCreated);
    $clave = random_int(0, 99999);
    $stmt->bindParam(':clave',$clave);
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

    $query="SELECT groups_t.id_groups, groups_t.admin, groups_t.name, groups_t.fecha, groups_t.clave FROM groups_t INNER JOIN regisgroup_t ON groups_t.id_groups=regisgroup_t.id_groups INNER JOIN employees_t ON employees_t.id_user=regisgroup_t.id_user WHERE employees_t.id_user=:id_user";
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

  public static function get_all_groups(){
    require '../database/database.php'; // para obtener la variable conexion

    $query="SELECT * FROM groups_t";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resp=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $resp;
  }

  public static function join_group($user_id, $group_id){
    require '../database/database.php'; // para obtener la variable conexion
    $result;

    $DateCreated=date('y-m-d h:i:s', time());
    $query="INSERT INTO regisgroup_t (id_user, id_groups, fecha, tipo) VALUES (:id_user, :id_groups, :fecha, 'M');";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_user', $user_id);
    $stmt->bindParam(':id_groups', $group_id);
    $stmt->bindParam(':fecha', $DateCreated);
    //$stmt = $conexion->prepare($query);
    $stmt->execute();
  }

  public static function get_members_gr($id_groups){
    require '../database/database.php'; // para obtener la variable conexion

    $query="SELECT * FROM employees_t e INNER JOIN regisgroup_t r ON e.id_user=r.id_user INNER JOIN groups_t g ON r.id_groups=g.id_groups WHERE g.id_groups=:id_groups ORDER BY r.tipo";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':id_groups', $id_groups);
    $stmt->execute();
    $resp=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $resp;
  }

  public static function new_Task($task){
    require '../database/database.php'; // para obtener la variable conexion

    $query="INSERT INTO chores_t (id_groups, title, assignment, duracion, startDate, endDate, predecessor) VALUES (:id_grup, :title, :asigned, :duracion, :f_inicio, :f_fin, :predecesora)";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':id_grup', $task->id_grup);
    $stmt->bindParam(':title', $task->title);
    $stmt->bindParam(':asigned', $task->asigned);
    $stmt->bindParam(':duracion', $task->duracion);
    $stmt->bindParam(':f_inicio', $task->f_inicio);
    $stmt->bindParam(':f_fin', $task->f_fin);
    $stmt->bindParam(':predecesora', $task->predecesora);
    $stmt->execute();
  }

  public static function get_Task($id_grup){
    require '../database/database.php'; // para obtener la variable conexion

    //$query="SELECT * FROM chores_t c INNER JOIN groups_t g ON c.id_groups=g.id_groups WHERE c.id_groups=:id_grup";
    $query="SELECT DISTINCT(c.id_chores), c.id_chores, c.id_groups, c.title, c.assignment, c.duracion, c.startDate, c.endDate, c.predecessor FROM chores_t c INNER JOIN groups_t g ON c.id_groups=g.id_groups INNER JOIN regisgroup_t r ON g.id_groups=r.id_groups INNER JOIN employees_t e ON r.id_user=e.id_user WHERE c.id_groups=:id_grup";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':id_grup', $id_grup);
    $stmt->execute();
    $resp=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $resp;
  }
}
