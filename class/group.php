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

        public static function getallgroups(){
            require_once "../datos/datos.php";
            $allgroup_list=datos::get_all_groups();

            return $allgroup_list;
        }

        public static function to_String($groups_list){
            $res="";
            foreach($groups_list as $key) {
            //while($key=$groups_list){
                //password_hash($key->id_groups, PASSWORD_BCRYPT)
                $res=$res.'<form action="group.php" method="post"><input type="hidden" name="grup" value="'.password_hash($key->id_groups, PASSWORD_BCRYPT).'"><input type="submit" value="'.$key->name.'"></form>';
                //$res=$res.'<a href='.$key->name.'>'.$key->name.'</a>';
                //'<form action="./group.php" method="post"><input type="hidden" name="grup" value="'..'"></form>';
                //$res=$res."<p>"."Nombre de grupo: ".$key->name."</p>";
            }
            //}
            return $res;
        }

        public static function getmembersgr($group_id){
            require_once "../datos/datos.php";
            $allmembers_list=datos::get_members_gr($group_id);

            return $allmembers_list;
        }
    }
?>