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

    datos::insert_employee($this);
    
    /* require '../database/database.php'; // para obtener la variable conexion
    var_dump($conexion); // object(PDO)#3 (0) {}
    $query = "INSERT INTO employees_t (name, surname, nameuser, password, email, telephono, cuil) VALUES (:name, :surname, :nameuser, :password, :email, :telephono, :cuil)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':surname', $this->surname);
    $stmt->bindParam(':nameuser', $this->username);

    // hasheando la password
    $password_hashed = password_hash($this->password, PASSWORD_BCRYPT);
    // insertando en la base de datos la password hasheada
    $stmt->bindParam(':password', $password_hashed);
    
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':telephono', $this->telephono);
    $stmt->bindParam(':cuil', $this->cuil);

    if($stmt->execute())
    {
      echo "EJECUTE EXECUTE";
    }
    else{
      echo "NO EJECUTE EL EXECUTE AAAAAAAAAAAAAAAAAAAAH";
    } */
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
