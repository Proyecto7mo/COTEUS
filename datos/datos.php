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
  
  public static function public_file_in_group($employee, $id_file, $id_group){
    
    // verificar si el archivo ya se esta compartiendo con otro grupo.
    // caso verdadero: insertar otro registro del mismo archivo 
    //    y empleado pero con el nuevo grupo
    // case falso: actualizar el registro de la encapsulacion del
    //    archivo. cambiar el campo id_grupo de NULL al grupo nuevo.
    
    require "../database/database.php";

    /*
      SELECT
        *
      FROM `files_encapsulation_t`
      WHERE
        `files_encapsulation_t`.`id_file` = '1' AND
        `files_encapsulation_t`.`id_employee` = '98' AND
        `files_encapsulation_t`.`id_group` IS NULL;
    */
    $query = "
      SELECT
        *
      FROM `files_encapsulation_t`
      WHERE
        `files_encapsulation_t`.`id_file` = '$id_file' AND
        `files_encapsulation_t`.`id_employee` = '$employee->id_employee' AND
        `files_encapsulation_t`.`id_group` IS NULL;
    ";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $exists_file_shared = count($stmt->fetchAll(PDO::FETCH_ASSOC)) > 0;

    if(!$exists_file_shared){

      $query = "
        INSERT INTO `files_encapsulation_t`
        (`id_file`, `id_employee`, `id_group`) VALUES
        ($id_file, $employee->id_employee, $id_group)
      ";

      $stmt = $conexion->prepare($query);
      return $stmt->execute();
    }
    else{
      // actualizar el archivo privado a publico
      $query = "
        UPDATE `files_encapsulation_t`
        SET
          `id_group` = '$id_group'
        WHERE
          `id_file` = $id_file AND
          `id_employee` = '$employee->id_employee' AND
          `id_group` IS NULL
      ";
      $stmt = $conexion->prepare($query);
      return $stmt->execute();
      /* $sql = "
        SELECT
          files_t.name,
          employees_t.name,
          groups_t.name
        FROM files_encapsulation_t
          RIGHT JOIN files_t
            ON files_encapsulation_t.id_file = files_t.id_file
          LEFT JOIN employees_t
            ON files_encapsulation_t.id_employee = employees_t.id_employee
          LEFT JOIN groups_t
            ON files_encapsulation_t.id_group = groups_t.id_group
      "; */
    }
  }
  public static function get_file_groups($file){
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
  public static function employee_has_file($employee, $id_file){
    
    require "../database/database.php";

    $query = "
      SELECT
        `files_t`.`id_file`
      FROM `files_encapsulation_t`
        INNER JOIN `files_t`
          ON `files_encapsulation_t`.`id_file` = `files_t`.`id_file`
        INNER JOIN `employees_t`
          ON `files_encapsulation_t`.`id_employee` = `employees_t`.`id_employee`
      WHERE
        `files_encapsulation_t`.`id_employee` = $employee->id_employee AND
        `files_encapsulation_t`.`id_file` = $id_file
    ";
    
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC) > 0; 
  }

  public static function get_file($id_file){
    require "../database/database.php";
    
    $query = "
      SELECT * FROM `files_t`
      WHERE `files_t`.`id_file` = $id_file
    ";
    
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
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
  public static function get_groups_of_file_without_sharing($employee, $file){
    // los archivos comparten grupos en los que esta el empleado.
    // cada archivo puede ser compartido por varios grupos, este metodo obtiene
    // aquellos grupos a los que no tiene el archivo compartiendo.

    // obtener todos los grupos que estan compartidos con el archivo. guardarlos en un arreglo de las id.
    // obtener todos los grupos que esten compartidos o no con el archivo. guardarlos en un arreglo de las id.
    // obtener en base a los dos arreglos la diferencia. desde todos los grupos en referencia a los que
    // se comparten el archivo

    require "../database/database.php";
    
    $employee_groups = datos::get_groups($employee->id_employee); // records objects
    $groups_ids_array = [];
    foreach ($employee_groups as $employee_group) {
      $groups_ids_array[] = $employee_group->id_group;
    }
    
    $query = "
      SELECT
        `groups_t`.`id_group`
      FROM `files_encapsulation_t`
        INNER JOIN `files_t`
          ON `files_encapsulation_t`.`id_file` = `files_t`.`id_file`
        INNER JOIN `groups_t`
          ON `files_encapsulation_t`.`id_group` = `groups_t`.`id_group`
      WHERE
        `files_t`.`id_file` = $file->id_file AND
        `files_encapsulation_t`.`id_group` IS NOT NULL;
    ";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $groups_sharing_records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $shared_groups_ids_array = [];
    foreach ($groups_sharing_records as $group_sharing_record) {
      $shared_groups_ids_array[] = $group_sharing_record['id_group'];
    }

    $ids_de_grupos_no_compartiendo = [];
    
    if(count($shared_groups_ids_array) > 0){
      foreach ($groups_ids_array as $id) {
        if (!in_array($id, $shared_groups_ids_array)) {
          $ids_de_grupos_no_compartiendo[] = $id;
        }
      }
    } else $ids_de_grupos_no_compartiendo = $groups_ids_array;
    
    $query = "
      SELECT
        *
      FROM `groups_t`
      WHERE
    ";

    if(count($ids_de_grupos_no_compartiendo) > 0){
      foreach ($ids_de_grupos_no_compartiendo as $key => $id) {
        if($key != 0){ // no es la primera ves
          $query .= " OR ";
        }
        $query .= "`groups_t`.`id_group` = $id";
      }
    } else $query .= "0";

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($records);
    // echo "groups_ids_array: " . datos::to_string_array($groups_ids_array);
    // echo "shared_groups_ids_array: " . datos::to_string_array($shared_groups_ids_array);
    // echo "ids_de_grupos_no_compartiendo: " . datos::to_string_array($ids_de_grupos_no_compartiendo);
    
    return $records;
  }

  public static function to_string_array($array){
    $result = "<br>";

    foreach ($array as $key => $value) {
      $result .= "[" . $key . "]" . ": " . $value . "<br>";
    }

    return $result;
  }

  public static function get_files_employee($employee, $Search){
    require "../database/database.php";
    
    $query = "
      SELECT
        `employees_t`.`id_employee`, 
        `files_t`.`id_file`,
        `files_t`.`name`,
        `files_t`.`last_modification`
      FROM `files_encapsulation_t`
        INNER JOIN `files_t`
          ON `files_encapsulation_t`.`id_file` = `files_t`.`id_file`
        INNER JOIN `employees_t`
          ON `files_encapsulation_t`.`id_employee` = `employees_t`.`id_employee`
        WHERE `employees_t`.`id_employee` = $employee->id_employee AND files_t.name LIKE '%$Search%' GROUP BY `files_t`.`name`;
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
  public static function insert_file($employee, $file){
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

  public static function get_files_from_user($idGroup){
    require '../../database/database.php'; // para obtener la variable conexion

    $query="SELECT e.id_employee, e.username as nameuser, f.id_file, f.name, f.last_modification FROM files_t f INNER JOIN files_encapsulation_t fe ON f.id_file=fe.id_file INNER JOIN employees_t e ON fe.id_employee=e.id_employee WHERE fe.id_group=:idGroup;";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':idGroup',$idGroup);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function delete_File_From_Group($idFile, $idGroup){
    require '../../database/database.php'; // para obtener la variable conexion

    $query="UPDATE files_encapsulation_t SET id_group=NULL WHERE id_file=:idFile AND id_group=:idGroup;";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':idFile',$idFile);
    $stmt->bindParam(':idGroup',$idGroup);
    $stmt->execute();
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

    return $result;
  }
  public static function get_group($value, $key = "id_group"){
    require "../database/database.php";
    
    $query = "
      SELECT * FROM `groups_t`
      WHERE `groups_t`.`$key` = '$value';
    ";
    
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public static function get_groups($user_id){
    require '../database/database.php'; // para obtener la variable conexion
    $result;

    $query="
      SELECT
        `groups_t`.`id_group`,
        `groups_t`.`id_admin`,
        `groups_t`.`name`,
        `groups_t`.`description`,
        `groups_t`.`date_created`,
        `groups_t`.`key`
      FROM `groups_t`
        INNER JOIN `members_t`
          ON `groups_t`.`id_group` = `members_t`.`id_group`
        INNER JOIN `employees_t`
          ON `employees_t`.`id_employee` = `members_t`.`id_employee`
      WHERE `employees_t`.`id_employee` = :id_employee
      ORDER BY `groups_t`.`id_group` DESC
    ";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_employee', $user_id);
    $stmt->execute();
    $resp = $stmt->fetchAll(PDO::FETCH_OBJ);

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

  public static function add_formula($nFormula, $formula, $id_employee){
    require '../../../database/database.php'; // para obtener la variable conexion

    $query="insert into calculators_t(name_function, formula_function, id_employee) values (:nFormula, :formula, :id_employee)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nFormula', $nFormula);
    $stmt->bindParam(':formula', $formula);
    $stmt->bindParam(':id_employee', $id_employee);
    $stmt->execute();
  }

  public static function list_formulas($id_employee){
    require '../../../database/database.php'; // para obtener la variable conexion

    $query="select id_calculator, name_function, formula_function from calculators_t where id_employee=:id_employee";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_employee', $id_employee);
    $stmt->execute();

    return $stmt;
  }

  public static function delete_formulas($id_calc){
    require '../../../database/database.php'; // para obtener la variable conexion

    $query="delete from calculators_t where id_calculator=:id_calc";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_calc', $id_calc);
    $stmt->execute();
  }
}
