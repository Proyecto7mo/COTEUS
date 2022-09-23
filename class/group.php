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

        public static function getgroups($user_id){
            require_once "../datos/datos.php";
            $groups_list=datos::get_groups($user_id);
            //$res=group::to_String($groups_list);

            return $groups_list;
        }

        public static function to_String($groups_list){
            $res="";
            foreach($groups_list as $key) {
            //while($key=$groups_list){
                $res=$res."<p>"."Nombre de grupo: ".$key->name."</p>";
            }
            //}
            return $res;
        }
    }
?>