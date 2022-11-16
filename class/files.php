<?php

class files{
  public $id_file;
  public $name;
  public $last_modification;

  public function __construct($file_record){
    $this->id_file = $file_record['id_file'];
    $this->name = $file_record['name'];
    $this->last_modification = $file_record['last_modification'];
  }

  public function get_groups() {
    require_once "../datos/datos.php";
    $group_names = [];

    $group_names_records = datos::get_groups_of_file($this);
    
    foreach ($group_names_records as $group_name_record) {
      $group_names[] = $group_name_record['group_name'];
    }

    return $group_names;
  }
  public function get_groups_without_sharing($employee) {
    require_once "../datos/datos.php";

    $group_records = datos::get_groups_of_file_without_sharing($employee, $this);

    return $group_records;
  }

  public static function get($id_file){
    require_once "../datos/datos.php";

    return datos::get_file($id_file); // devuelve un registro de la tabla files_t | false
  }
}
