<?php
    class group{

        public $admin;
        public $groupname;

        public function __construct($admin=0, $groupname="ng"){
            $this->admin=$admin;
            $this->groupname=$groupname;
        }

        public function get(){
            require "../datos/datos.php";

        }

        public function newgroup(){
            require "../datos/datos.php";
            $result=0;

            if(datos::insert_group($this) > 0){
                $result = 1;
              }else{
                $result = -1;
              }
          
            return $result;
        }
    }
?>