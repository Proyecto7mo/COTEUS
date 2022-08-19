<?php

require "../datos/datos.php";

class employee{

  private $name;
  private $surname;
  private $emali;
  private $username;
  private $password;
  private $cuil;

  public function __construct($name = "n/n", $surname = "n/n", $email = "nn@nn.com", $username = "n/n", $password = "n/n", $cuil = "00-00000000-00"){
    $this->name = $name;
    $this->email = $email;
    $this->surname = $surname;
    $this->username = $username;
    $this->password = $password;
    $this->cuil = $cuil;
  }
  
  public static function get($id_employee){
    
    $employee = datos::get_employee($id_employee);
    
    return (isset($employee)) ? $employee : null;
  }

  public function signup(){
    
  }

  public function login(){
    
  }

  public function uploadfile(){
    
  }
}
