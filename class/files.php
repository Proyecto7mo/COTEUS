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
    
    foreach ($group_names_records as $key => $group_name_record) {
      $group_names[$key] = $group_name_record['group_name'];
    }

    return $group_names;
  }
}
