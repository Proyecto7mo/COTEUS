<?php

class employee{

  public $name;
  public $surname;
  public $email;
  public $username;
  public $password;
  public $telephono;
  public $cuil;

  public function __construct($name = "n/n", $surname = "n/n", $username = "n/n", $email = "nn@nn.com", $password = "n/n", $telephono="00-0000-0000", $cuil = 0){
    $this->name = $name;
    $this->surname = $surname;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->telephono=$telephono;
    $this->cuil = $cuil;
  }
  
  public function get(){
    require_once "../datos/datos.php";
    $employee = datos::get_employee($this);
    
    $result = null;

    if($employee) {
      $result = $employee;
    }

    return $result;
  }

  public function signup(){
    
    require "../datos/datos.php";
    $result = 0;

    if(datos::insert_employee($this) > 0){
      $result = 1;
    }else{
      $result = -1;
    }

    return $result;
  }

  public function uploadfile(){
    
  }

  public static function joingroup($user_id, $groups_id){
    datos::join_group($user_id, $groups_id);
  }

  public function to_string(){
    return "<br>" . 
      "Nombre: " . $this->name . "<br>" . 
      "Apellido: " . $this->surname . "<br>" . 
      "Email: " . $this->email . "<br>" . 
      "NameEmployee: " . $this->username . "<br>" .
      "Password: " . $this->password . "<br>" .
      "Cuil: " . $this->cuil . "<br>";
  }

  public static function view_files($employee_folder){
    $lista = null;
    $directory = "C:/xampp/htdocs/COTEUS/files_users/" . $employee_folder;
    
    $directory_handler = opendir($directory);
   
    while($item = readdir($directory_handler)){
      if($item != "." && $item != ".."){
        if(is_dir($directory . $item)){
          $lista .= "<li>Carpeta <a href='https://localhost/COTEUS/files_users/$employee_folder/$item' target='_blank'>$item</a></li>";
        }
        else{
          $lista .= "<li>Archivo <a href='https://localhost/COTEUS/files_users/$employee_folder/$item' target='_blank'>$item</a></li>";
        }
      }
    }

    return $lista;
  }
}
