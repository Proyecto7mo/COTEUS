<?php
  class user{
    public $name;
    public $surname;
    public $nameuser;
    public $telephono;
    public $email;
    public $password;
    public $fileName;
    public $filePath;
    
    function __construct($name_p = "", $surname_p = "", $nameuser_p = "", $telephono_p = 0, $email_p = "q@q", $password_p = "", $fileName = "", $filePath = ""){
      $this->name = $name_p;
      $this->surname = $surname_p;
      $this->nameuser = $nameuser_p;
      $this->telephono = $telephono_p;
      $this->email = $email_p;
      $this->password = $password_p;
      $this->fileName = $fileName_p;
      $this->filePath = $filePath_p;
    }

    public function Login($name_p, $password_p){
      
    }

    public function Logout(){
      
    }

    public function SignUp(){
      
    }

    public function UpFiles(){
      
    }

    public function AddChort(){
      
    }

    public function FindFiles(){
      
    }

    public function CreateGroup(){
      
    }
    
    public function JoinGroup(){

    }
  };
?>
