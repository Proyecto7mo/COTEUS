<?php

class employee{

  public $id_employee;
  public $name;
  public $surname;
  public $email;
  public $username;
  public $password;
  public $telephone;
  public $cuil;

  public function __construct($name = "n/n", $surname = "n/n", $username = "n/n", $email = "nn@nn.com", $password = "n/n", $telephono = null, $cuil = null){
    $this->name = $name;
    $this->surname = $surname;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->telephone = $telephono;
    $this->cuil = $cuil;
  }

  public static function record_to_object($employee_record){
    $employee = new employee();
    
    foreach ($employee_record as $key => $value) {
      $employee->$key = $employee_record[$key];
    }
    
    return $employee;
  }
  
  public function get($value, $key = 'id_employee'){
    require_once "../datos/datos.php";
    
    $employee = datos::get_employee($key, $value);
    
    $result = ($employee) ? $employee : null;
    
    return $result;
  }

  public static function get_by_id($id){
    require_once "../datos/datos.php";
    
    $employee = datos::get_employee('id_employee', $id);
    
    $result = ($employee) ? $employee : null;
    
    return $result;
  }

  public function signup(){
    
    require "../datos/datos.php";
    $result = 0;

    $result = (datos::insert_employee($this) > 0) ? 1 : -1;
    
    return $result;
  }

  public static function login($email, $password){
    require_once "../datos/datos.php";
    
    $employee_record = datos::get_employee('email', $email); // devuelve false si no lo encuentra

    if($employee_record && password_verify($password, $employee_record['password'])){
      return $employee_record;
    }
    
    return false;

  }

  public function uploadfile($file_name){
    require_once "../datos/datos.php";

    datos::insert_file($this, $file_name);

  }

  public static function joingroup($user_id, $groups_id){
    datos::join_group($user_id, $groups_id);
  }

  public function to_string(){
    return
      "<p>" . 
        "ID: " . $this->id_employee . "<br>" . 
        "Nombre: " . $this->name . "<br>" . 
        "Apellido: " . $this->surname . "<br>" . 
        "Email: " . $this->email . "<br>" . 
        "NameEmployee: " . $this->username . "<br>" .
        "Password: " . $this->password . "<br>" .
        "Cuil: " . $this->cuil . "<br>" . 
      "</p>";
  }
  
  public function get_files(){
    
    require_once "../datos/datos.php";

    $files = datos::get_files_employee($this);

    return $files;
  }
}
