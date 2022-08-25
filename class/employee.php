<?php

require "../datos/datos.php";

class employee{

  private $name;
  private $surname;
  private $email;
  private $nameemployee;
  private $password;
  private $cuil;

  public function __construct($name = "n/n", $surname = "n/n", $email = "nn@nn.com", $nameemployee = "n/n", $password = "n/n", $cuil = "00-00000000-00"){
    $this->name = $name;
    $this->email = $email;
    $this->surname = $surname;
    $this->nameemployee = $nameemployee;
    $this->password = $password;
    $this->cuil = $cuil;
  }
  
  public static function get($employee){
    
    $record_employee = datos::get_employee($employee->email);
    return (count($record_employee) > 0) ? $record_employee : null;
  }

  public function signup(){
    
  }

  public function login(){
    
    $result = null;
    echo "<br> de \$employee->login = " .  $this->to_string();
    
    echo "|INI --> ACA ANDA from login" . "<br>";
      $record = datos::get_employee($this);
    echo "|END --> ACA ANDA from login" . "<br>";

    if(count($record) > 0){
      //if ((password_verify($this->password, $record['password'])) && ($this->email == $record['email'])) {
      if (($this->password == $record['password']) && ($this->email == $record['email'])) {
        $result = $record['email'];
      }
    }
    
    $message = isset($result) ? '../partials/messages/EmployeeRegistred.html' : '../partials/messages/EmployeeNotRegistred.html';

    return $result;
  }

  public static function registred($employee_email){
    
    require "../datos/datos.php";
    $records = datos::get_employee($employee_email);

    if(count($records) > 0) echo "REGISTRADO";
    else echo "NO REGISITRADO";

    return count($records) > 0;
  }

  public function uploadfile(){
    
  }

  public function to_string(){
    return "<br>" . 
      "Nombre: " . $this->name . "<br>" . 
      "Apellido: " . $this->surname . "<br>" . 
      "Email: " . $this->email . "<br>" . 
      "NameEmployee: " . $this->nameemployee . "<br>" .
      "Password: " . $this->password . "<br>" .
      "Cuil: " . $this->cuil . "<br>";
  }
}
