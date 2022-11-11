<?php

class datos{
  
  public static function get_employee($key, $value){

    // devuelve false si no se obtiene el empleado.
    // sino, devuelve el registro.
    require("../database/database.php");

    $stmt = $conexion->prepare("SELECT * FROM `employees_t` WHERE `$key` = '$value'");
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    return $record;
  }


  public static function insert_employee($employee){
    
    require '../database/database.php'; // para obtener la variable conexion
    $result = 0;

    $query = "
      INSERT INTO employees_t
        (`name`, `surname`, `username`, `password`, `email`, `telephone`, `cuil`) VALUES
        (:name,  :surname,  :username,  :password,  :email,  :telephone,  :cuil)
    ";
    // hasheando la password
    $password_hashed = password_hash($employee->password, PASSWORD_BCRYPT);
    
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':name', $employee->name);
    $stmt->bindParam(':surname', $employee->surname);
    $stmt->bindParam(':username', $employee->username);
    $stmt->bindParam(':password', $password_hashed);
    $stmt->bindParam(':email', $employee->email);
    $stmt->bindParam(':telephone', $employee->telephono);
    $stmt->bindParam(':cuil', $employee->cuil);

    $result = ($stmt->execute()) ? 1 : -1;
    
    return $result;
  }

  public static function get_groups_of_file($file){
    require "../database/database.php";
    
    $query = "
      SELECT
        `groups_t`.`name` AS 'group_name'
      FROM `files_encapsulation_t`
        INNER JOIN `files_t`
          ON `files_encapsulation_t`.`id_file` = `files_t`.`id_file`
        INNER JOIN `groups_t`
          ON `files_encapsulation_t`.`id_group` = `groups_t`.`id_group`
      WHERE `files_t`.`id_file` = $file->id_file AND `files_encapsulation_t`.`id_employee` IS NOT NULL;
      ";
    
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function get_files_employee($employee){
    require "../database/database.php";
    
    $query = "
      SELECT
        `files_t`.`id_file`,
        `files_t`.`name`,
        `files_t`.`last_modification`
      FROM `files_encapsulation_t`
        INNER JOIN `files_t`
          ON `files_encapsulation_t`.`id_file` = `files_t`.`id_file`
        INNER JOIN `employees_t`
          ON `files_encapsulation_t`.`id_employee` = `employees_t`.`id_employee`
        WHERE `employees_t`.`id_employee` = $employee->id_employee
        GROUP BY `files_t`.`name`;
      ";
    
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function get_file_uploaded(){
    require_once "../database/database.php";
    $query = "SELECT MAX(files_t.id_file) AS id_file FROM files_t;";
    
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $id_file_recent = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $id_file_recent['id_file'];
  }

  public static function insert_file($employee, $file)
  {
    require "../database/database.php";
    
    $query = "
    INSERT INTO files_t (`name`) VALUES (:name);
    INSERT INTO files_encapsulation_t
      (`id_employee`, `id_file`) VALUES
      (:id_employee, (SELECT MAX(id_file) id_file FROM files_t WHERE name = :name));
    ";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':name', $file);
    $stmt->bindParam(':id_employee', $employee->id_employee);
    
    return $stmt->execute();
  }


  public static function insert_group($group){
    require '../database/database.php'; // para obtener la variable conexion
    $result = 0;

    $query="
    INSERT INTO groups_t
    (`name`,     `description`, `key`,   `id_admin`) VALUES
    (:groupname, :groupdesc,     :clave, :id_employee  );
    
    INSERT INTO members_t
    (`id_employee`, `id_group`,                                                          `rol`) VALUES
    (:id_employee,    (SELECT MAX(id_group) id_group FROM groups_t WHERE id_admin = :id_employee), 'A'  );
    ";
        
    $clave = random_int(0, 99999);
    
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':groupname',$group->groupname);
    $stmt->bindParam(':groupdesc',$group->groupdesc);
    $stmt->bindParam(':clave',$clave);
    $stmt->bindParam(':id_employee',$group->admin);
    
    //$query="
    if($stmt->execute())
    {
      $result = 1;
    }
    else{
      $result = -1;
    }
    /*$conexion=null;
    require '../database/database.php'; // para obtener la variable conexion
    $query2="SELECT MAX(id_group) idgroup FROM groups_t WHERE admin=:admin";
    $stmt2->$conexion->prepare($query2);
    $stmt2->bindParam(':admin', $group->admin);
    $stmt2->execute();
    $idgroup=$stmt2->fetch();
    $stmt->execute();
    $stmt2->execute();
    require '../database/database.php'; // para obtener la variable conexion
    $query3="INSERT INTO members_t (id_employee, id_group, fecha) VALUES (:id_employee, (SELECT MAX(id_group) idgroup FROM groups_t WHERE admin=:admin), :fecha)";
    $stmt3->$conexion->prepare($query3);
    $stmt3->bindParam(':id_employee', $group->admin);
    $stmt3->bindParam(':id_group', $idgroup[0]);
    $stmt3->execute();*/

    return $result;
  }

  public static function get_groups($user_id){
    require '../database/database.php'; // para obtener la variable conexion
    $result;

    $query="
    SELECT
      groups_t.id_group,
      groups_t.id_admin,
      groups_t.name,
      groups_t.description,
      groups_t.date_created,
      groups_t.key
    FROM groups_t
      INNER JOIN members_t
        ON groups_t.id_group = members_t.id_group
      INNER JOIN employees_t
        ON employees_t.id_employee = members_t.id_employee
    WHERE employees_t.id_employee=:id_employee
    ";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_employee', $user_id);
    $stmt->execute();
    $resp=$stmt->fetchAll(PDO::FETCH_OBJ);

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

    $query = "
    INSERT INTO members_t
      (id_employee, id_group, rol) VALUES
      (:id_employee, :id_group, 'M');";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_employee', $user_id);
    $stmt->bindParam(':id_group', $group_id);
    $stmt->execute();
  }

  public static function get_members_gr($id_group){
    require '../database/database.php'; // para obtener la variable conexion

    $query="
    SELECT
      *
    FROM employees_t e
      INNER JOIN members_t m
        ON m.id_employee = e.id_employee
      INNER JOIN groups_t g
        ON m.id_group = g.id_group
    WHERE g.id_group = :id_group ORDER BY m.rol";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_group', $id_group);
    $stmt->execute();
    $resp=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $resp;
  }

  public static function new_Task($task){
    require '../database/database.php'; // para obtener la variable conexion

    $query = "
    INSERT INTO chores_t
      (id_group, title, assignment, startdate, enddate, id_predecessor) VALUES
      (:id_grup, :title, :asigned, :f_inicio, :f_fin, :predecesora)
    ";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_grup', $task->id_grup);
    $stmt->bindParam(':title', $task->title);
    $stmt->bindParam(':asigned', $task->asigned);
    $stmt->bindParam(':f_inicio', $task->f_inicio);
    $stmt->bindParam(':f_fin', $task->f_fin);
    $stmt->bindParam(':predecesora', $task->predecesora);
    $stmt->execute();
  }

  public static function get_Task($id_grup){
    require '../database/database.php'; // para obtener la variable conexion

    //$query="SELECT * FROM chores_t c INNER JOIN groups_t g ON c.id_group=g.id_group WHERE c.id_group=:id_grup";
    $query = "
    SELECT
      DISTINCT(c.id_choresl),
      c.id_choresl,
      c.id_group,
      c.title,
      c.assignment,
      c.startdate,
      c.enddate,
      c.id_predecessor
    FROM chores_t c
      INNER JOIN groups_t g
        ON c.id_group = g.id_group
      INNER JOIN members_t r
        ON g.id_group = r.id_group
      INNER JOIN employees_t e
        ON r.id_employee = e.id_employee WHERE c.id_group = :id_grup
    ";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':id_grup', $id_grup);
    $stmt->execute();
    $resp=$stmt->fetchAll(PDO::FETCH_OBJ);

    return $resp;
  }

  public static function delete_task($id_choresl){
    require '../database/database.php'; // para obtener la variable conexion

    $query="DELETE FROM chores_t WHERE id_choresl=:id_choresl";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':id_choresl', $id_choresl);
    $stmt->execute();
    
  }

  public static function modify_rank($tipo, $id_employee, $id_group){
    require '../database/database.php'; // para obtener la variable conexion

    $query="UPDATE members_t SET rol=:tipo WHERE id_employee=:id_employee AND id_group=:id_group";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':id_employee', $id_employee);
    $stmt->bindParam(':id_group', $id_group);
    $stmt->execute();

  }

  public static function delete_member($id_employee, $id_group){
    require '../database/database.php'; // para obtener la variable conexion

    $query="DELETE FROM members_t WHERE id_employee=:id_employee AND id_group=:id_group";
    $stmt=$conexion->prepare($query);
    $stmt->bindParam(':id_employee', $id_employee);
    $stmt->bindParam(':id_group', $id_group);
    $stmt->execute();
  }
}
