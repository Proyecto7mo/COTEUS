<?php

class files{
  public $id_files;
  public $name;
  public $lastmodification;

  public static function get_record($file) {
    require "../datos/datos.php";
    $file_record = false;

    $file_record = datos::get_file($file);

    return $file;
  }
}

?>