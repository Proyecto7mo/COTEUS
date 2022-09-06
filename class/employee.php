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
  
  public static function get($id_employee){
    
    $employee = datos::get_employee($id_employee);
    
    return (isset($employee)) ? $employee : null;
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

  public function login(){
    
  }

  public function uploadfile(){
    
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
}
